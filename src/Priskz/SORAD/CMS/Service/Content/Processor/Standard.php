<?php namespace Priskz\SORAD\CMS\Service\Content\Processor;

use Priskz\Payload\Payload;
use Priskz\SORAD\Service\Processor\Laravel\Processor as LaravelProcessor;

class Standard extends LaravelProcessor
{
	/**
	 * @OVERRIDE
	 * 
	 * Process the given data against the given rules and useable data keys.
	 *
	 * @param  array  $data
	 * @param  array  $keys
	 * @param  array  $rules
	 * @param  array  $defaults
	 * 
	 * @return Payload\Payload
	 */
	public function process($data, $keys, $rules, $defaults = null)
	{
		// Set any configured default data values.
		$processData = $this->processDefaults($data, $defaults);

		// Validate data based on the given context of the data.
		$validateContextPayload = $this->validateContext($processData, $rules);

		// Return sanitized data if no validation errors exist.
		if( ! $validateContextPayload->isStatus(Payload::STATUS_VALID))
		{
			return $validateContextPayload;
		}

		// Extract only the data that we want to validate.
		$processData = array_intersect_key($validateContextPayload->getData(), array_flip($keys));

		// If data value exists and is not null then json encode it.
		if(array_key_exists('data', $processData))
		{
			if( ! is_null($processData['data']))
			{
				$processData['data'] = json_encode($processData['data']);
			}

		}
		
		// Validate the given data and return.
		return $this->validator->validate($processData, $rules, $this->messages);
	}
}