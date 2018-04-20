<?php namespace Priskz\SORAD\CMS\Domain\Template\Data\MySQL\Eloquent;

use Priskz\Paylorm\Data\MySQL\Eloquent\SoftDeleteableModel as DataModel;
use Priskz\SORAD\CMS\Domain\Schema\Data\MySQL\Eloquent\Model as SchemaModel;

class Model extends DataModel
{
	protected $guarded = [];
	protected $table   = 'template';

	// ----------------------------------------------------------------

	/**
	 * Get this Template's Parent Key.
	 *
	 * @return integer
	 */
	public function getParentKey()
	{
		return $this->parent_id;
	}

	/**
	 * Get this Template's slug.
	 *
	 * @return string
	 */
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * Get this Template's status.
	 *
	 * @return string
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Get this Template's model type.
	 *
	 * @return string
	 */
	public function getModelType()
	{
		return $this->model_type;
	}

	/**
	 * Get this Template's type context.
	 *
	 * @return string
	 */
	public function getTypeContext()
	{
		return $this->type_context;
	}

	/**
	 * Get this Template's title.
	 *
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Get this Template's view.
	 *
	 * @return string
	 */
	public function getView()
	{
		return $this->view;
	}

	/**
	 * Get this Template's view.
	 *
	 * @param  string $context Type of view - create, update, delete, etc.
	 * @return string
	 */
	public function getFullyQualifiedView($context = 'display', $variation = 'default')
	{
		return $this->getView() . '.' . $this->getSlug() . '.'  . strtolower($context) . '.' . $variation;
	}

	/**
	 * Get this Template's definition.
	 *
	 * @return json
	 */
	public function getDefinition($decoded = false)
	{
		$definition = $this->definition;

		if($this->getParent())
		{
			$parentDefinition = $this->getParent()->getSchema();

			if($parentDefinition)
			{
				foreach(json_decode($parentDefinition, true)  as $key => $value)
				{
				    $fullDefinition[$key] = array_merge(json_decode($this->definition, true)[$key], json_decode($parentDefinition, true)[$key]);
				}

				$definition =  json_encode($fullDefinition);
			}
		}

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
		$definition = $this->getDefinition();

		if($definition != null)
		{
			// Json Decode the data.
			$definition = json_decode($definition, true);

			// If no error occured during json_decode, than we have valid json data.
			if(json_last_error() === JSON_ERROR_NONE)
			{
				if(array_key_exists($key, $definition))
				{
					return $definition[$key];
				}
			}
		}

		return null;
	}

	/**
	 * Get this Template's instance.
	 *
	 * @return json
	 */
	public function getInstance($decoded = false)
	{
		$instance = $this->instance;

		// if($this->getParent())
		// {
		// 	$parentInstance = $this->getParent()->getSchema();

		// 	if($parentInstance)
		// 	{
		// 		foreach(json_decode($parentInstance, true)  as $key => $value)
		// 		{
		// 		    $fullDefinition[$key] = array_merge(json_decode($this->instance, true)[$key], json_decode($parentInstance, true)[$key]);
		// 		}

		// 		$instance =  json_encode($fullDefinition);
		// 	}
		// }

        if($decoded)
        {
            $instance = json_decode($instance, true);
        }

        return $instance;
	}

	/**
	 * Get this Template's Instance Property Value for the given property.
	 *
	 * @param  string $property
	 * @return mixed
	 */
	public function getInstancePropertyValue($property)
	{
		$instance = $this->getDefinition();

		if($instance != null)
		{
			// Json Decode the data.
			$instance = json_decode($instance, true);

			// If no error occured during json_decode, than we have valid json data.
			if(json_last_error() === JSON_ERROR_NONE)
			{
				if(array_key_exists($property, $instance))
				{
					return $instance[$property];
				}
			}
		}

		return null;
	}

	/**
	* Get this Template's parent.
	*
	* @return Domain\Template
	*/
	public function getParent()
	{
		if ($this->getParentKey() !== null)
		{
			return $this->parent;
		}
		else
		{
			return null;
		}
	}

	/**
	* Get this Template's children.
	*
	* @return Collection of Domain\Template
	*/
	public function getChildren()
	{
		return $this->children;
	}

	/**
	* Get this Template's schema.
	*
	* @return Collection of Domain\Schema
	*/
	public function getSchema()
	{
		return $this->schema;
	}

	/* =====================================================
	* Eloquent Relationships
	* ================================================== */

	/**
	* Eloquent-specific parent category relationship.
	*
	* @return Illuminate\Database\Eloquent\Relations\HasOne
	*/
	public function parent()
	{
		return $this->hasOne(self::class, 'id', 'parent_id');
	}

	/**
	* Eloquent-specific child category relationship.
	*
	* @return Illuminate\Database\Eloquent\Relations\HasMany
	*/
	public function children()
	{
		return $this->hasMany(self::class, 'parent_id', 'id');
	}

	/**
	* Eloquent-specific parent category relationship.
	*
	* @return Illuminate\Database\Eloquent\Relations\HasOne
	*/
	public function schema()
	{
		return $this->hasOne(SchemaModel::class, 'id', 'schema_id');
	}

	/* =====================================================
	 * Query Scopes
	 * ================================================== */

	/**
	 * Status Scope
	 */
    public function scopeStatus($query, $status)
    {
	    return $query->where('status', '=', $status);
    }
}