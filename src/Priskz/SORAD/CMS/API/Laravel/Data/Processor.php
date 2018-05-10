<?php namespace Priskz\SORAD\CMS\API\Laravel\Data;

use Priskz\Payload\Payload;
use Priskz\SORAD\Action\Processor\Laravel\Processor as LaravelProcessor;

class Processor extends LaravelProcessor
{
	/**
	 *  Query Parse Error
	 */
	protected $queryParseError = [];

	/**
	 * Process data.
	 *
	 * @param  array  $data
	 * @return mixed  array data || false
	 */
	public function process(array $data, array $dataKeys, array $rules)
	{
		$sanintizedData = array_intersect_key($data, array_flip($dataKeys));

		// Validate and set our errors if they exist.
		$this->errorPayload = $this->validator->validate($sanintizedData, $rules);

		// Return sanitized data if no validation errors exist.
		if( ! $this->errorPayload->isStatus(Payload::STATUS_VALID))
		{
			return $this->errorPayload;
		}

		// Sanitze data by intersecting and parsing query paramaters.
		$sanintizedData = $this->parseQueryParameters($sanintizedData);

		// Check for query parse errors.
		if(count($this->queryParseError) > 0)
		{
			return new Payload($this->queryParseError, 'invalid_query');
		}

		return new Payload($sanintizedData, 'valid');
	}

	/**
	 * Parse Embed Query Params
	 *
	 * @param  array  $data
	 * @return array
	 */
	protected function parseQueryParameters(array $data)
	{
		return $this->parseSort($this->parseFilter($this->parseEmbed($data)));
	}

	/**
	 * @todo: Clean up logic.
	 * 
	 * Parse Filter Query Params
	 *
	 * @param  array  $data
	 * @return array
	 */
	protected function parseFilter($data)
	{
		if(array_key_exists('filter', $data))
		{
			// Seperate delimited filters.
			$data['filter'] = explode(',', strtolower(trim($data['filter'], ',')));

			foreach($data['filter'] as $key => $filter)
			{
				$explodedFilter = preg_split("/(=|!=|>|>=|<|<=)/", $filter, -1, PREG_SPLIT_DELIM_CAPTURE);

				// No longer need, will be replaced.
				unset($data['filter'][$key]);

				switch(count($explodedFilter))
				{
					case 5:
						$data['filter'][$key]['field']    = $explodedFilter[0];

						unset($explodedFilter[0]);

						$data['filter'][$key]['value']    = $explodedFilter[4];

						unset($explodedFilter[4]);

						$data['filter'][$key]['operator'] = implode($explodedFilter);

						$data['filter'][$key]['or']       = false;
					break;

					case 3:
						$data['filter'][$key]['field']    = $explodedFilter[0];
						$data['filter'][$key]['operator'] = $explodedFilter[1];
						$data['filter'][$key]['value']    = $explodedFilter[2];
						$data['filter'][$key]['or']       = false;
					break;

					default:
						$this->queryParseError['filter'] = implode($explodedFilter);
					break;
				}
			}
		}

		if(array_key_exists('or', $data))
		{
			// Seperate delimited filters.
			$data['or'] = explode(',', strtolower(trim($data['or'], ',')));

			foreach($data['or'] as $key => $filter)
			{
				$explodedFilter = preg_split("/(=|!=|>|>=|<|<=)/", $filter, -1, PREG_SPLIT_DELIM_CAPTURE);

				// No longer need, will be replaced.
				unset($data['or'][$key]);

				switch(count($explodedFilter))
				{
					case 5:
						$data['or'][$key]['field']    = $explodedFilter[0];

						unset($explodedFilter[0]);

						$data['or'][$key]['value']    = $explodedFilter[4];

						unset($explodedFilter[4]);

						$data['or'][$key]['operator'] = implode($explodedFilter);
						$data['or'][$key]['or']       = true;
					break;

					case 3:
						$data['or'][$key]['field']    = $explodedFilter[0];
						$data['or'][$key]['operator'] = $explodedFilter[1];
						$data['or'][$key]['value']    = $explodedFilter[2];
						$data['or'][$key]['or']       = true;
					break;

					default:
						$this->queryParseError['filter'] = implode($explodedFilter);
					break;
				}
			}

			// Add or filters to filter.
			foreach($data['or'] as $or)
			{
				$data['filter'][] = $or;
			}

			// No longer needed.
			unset($data['or']);
		}

		return $data;
	}

	/**
	 * Parse Embed Query Params
	 *
	 * @param  array  $data
	 * @return array
	 */
	protected function parseEmbed($data)
	{
		if(array_key_exists('embed', $data))
		{
			// Seperate delimited embeds.
			$data['embed'] = explode(',', $data['embed']);
		}

		return $data;
	}

	/**
	 * Parse Sort Query Params
	 *
	 * @param  array  $data
	 * @return array
	 */
	protected function parseSort($data)
	{
		if(array_key_exists('sort', $data))
		{
			// Seperate delimited sorts.
			$data['sort'] = explode(',', strtolower(trim($data['sort'], ',')));

			foreach($data['sort'] as $key => $sort)
			{
				$explodedSort = explode(':', $sort);

				if(count($explodedSort) === 1)
				{
					$explodedSort[1] = 'asc';
				}

				// No longer need, will be replaced.
				unset($data['sort'][$key]);

				if(in_array($explodedSort[1], ['asc', 'desc']))
				{
					$data['sort'][$key]['field']     = $explodedSort[0];
					$data['sort'][$key]['direction'] = $explodedSort[1];
				}
				else
				{
					$this->queryParseError['sort'] = implode(':', $explodedSort);
				}
			}
		}

		return $data;
	}
}

