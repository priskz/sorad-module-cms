<?php namespace Priskz\SORAD\CMS\Service\Root\Processor;

use Priskz\Payload\Payload;
use Priskz\SORAD\Service\Processor\Laravel\Processor as LaravelProcessor;

class Standard extends LaravelProcessor
{
	/**
	 * Service
	 */
	protected $service;

	/**
	 *  Context Validation
	 */
	public function validateContext($data, $rules)
	{
		// Start off with a valid status.
		$status = 'valid';

		// We only need to validate context if context rules are given.
		if(array_key_exists('context', $rules))
		{
			foreach($rules['context'] as $rule)
			{
				switch($rule)
				{
					case 'example':
						// If validation fails:
						$status = 'example_failed';
					break;

					default:
					break;
				}
			}
		}

		// Remove context rules as they're no longer needed.
		unset($rules['context']);

		return new Payload($data, $status);
	}

	/**
	 * @OVERRIDE
	 * 
	 * Process the default values for the given defaults configuration.
	 * 
	 * @param  string $defaults Type of function to be processed.
	 * @param  array  $data    Data to be processed.
	 * @return array
	 */
	public function processDefaults($data, $defaults = [])
	{
		if(is_array($defaults))
		{
			// Iterate each default key set.
			foreach($defaults as $key => $value)
			{
				// If value is not false, use that directly otherwise compute it.
				if($value !== false && empty($data[$key]))
				{
					$data[$key] = $value;
				}
				// Otherwise, do some custom processing.
				elseif(empty($data[$key]))
				{
					switch($key)
					{
						case 'example':
							// If a setting exists and is not empty.
							if( ! empty($setting))
							{
								$data['example'] = 'DEFAULT_EXAMPLE_VALUE';
							}
						break;

						default:
						break;
					}
				}
			}
		}

		return $data;
	}
}