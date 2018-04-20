<?php namespace Priskz\SORAD\CMS\Domain\Schema\Data\MySQL\Eloquent;

use Priskz\Paylorm\Data\MySQL\Eloquent\SoftDeleteableModel as DataModel;

class Model extends DataModel
{
	/**
	 * @var Eloquent Model Properties
	 */
	protected $guarded    = [];
	protected $table      = 'schema';
	protected $connection = 'global';

	// ----------------------------------------------------------------

	/**
	 * Get this Schema's name.
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get this Schema's definition.
	 *
	 * @return json
	 */
	public function getDefinition($decoded = false)
	{
		$definition = $this->definition;

        if($decoded)
        {
            $definition = json_decode($definition, true);
        }

        return $definition;
	}

	/**
	 * Get this Template's Defintion Value for the given key.
	 *
	 * @param  string $key
	 * @return mixed
	 */
	public function getDefinitionValue($key)
	{
		$definition = $this->getDefinition(true);

		if($definition != null)
		{
			if(array_key_exists($key, $definition))
			{
				return $definition[$key];
			}
		}

		return null;
	}
}