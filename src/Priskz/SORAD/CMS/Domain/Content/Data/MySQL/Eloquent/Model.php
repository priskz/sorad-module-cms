<?php namespace Priskz\SORAD\CMS\Domain\Content\Data\MySQL\Eloquent;

use Priskz\Paylorm\Data\MySQL\Eloquent\SoftDeleteableEntity as DataModel;
use Priskz\SORAD\CMS\Domain\Template\Data\MySQL\Eloquent\Model as TemplateModel;

class Model extends DataModel
{
	/**
	 * @var Eloquent Model Properties
	 */
	protected $guarded = [];
	protected $table   = 'content';

	// ----------------------------------------------------------------

	/**
	 * Get this Content's alias.
	 *
	 * @return string
	 */
	public function getAlias()
	{
		return $this->alias;
	}

	/**
	 * Get this Content's template key.
	 *
	 * @return integer
	 */
	public function getTemplateKey()
	{
		return $this->template_id;
	}

	/**
	 * Get this Content's body.
	 *
	 * @return text/html
	 */
	public function getBody()
	{
		$body = '';

		if($this->getDataValue('body'))
		{
			$body = $this->getDataValue('body');
		}

		return $body;
	}

	/**
	 * Get this Content's Template.
	 *
	 * @return Domain\Template
	 */
	public function getTemplate()
	{
		return $this->template;
	}

	/**
	 * Get this Content's data.
	 *
	 * @return json
	 */
	public function getData($decoded = false)
	{
        if($decoded)
        {
            return json_decode($this->data, true);
        }

        return $this->data;
	}

	/**
	 * Get this Content's data value for a given key..
	 *
	 * @param  string $key
	 * @return mixed
	 */
	public function getDataValue($key)
	{
		if($this->getData() != null)
		{
			// Json Decode the data.
			$array = json_decode($this->getData(), true);

			// If no error occured during json_decode, than we have valid json data.
			if(json_last_error() === JSON_ERROR_NONE)
			{
				if(array_key_exists($key, $array))
				{
					return $array[$key];
				}
			}
		}

		return null;
	}

	/**
	 * Get this Content's children Domain\Content(s).
	 *
	 * @return Collection of Domain\Content
	 */
	public function getChildren()
	{
		return $this->children;
	}

	/* =====================================================
	 * Relationship
	 * ================================================== */

	/**
	 * This Content can reference many Child Domain\Content(s).
	 *
	 * @return Illuminate\Database\Eloquent\Relations\belongsToMany
	 */
    public function children()
    {
		return $this->belongsToMany(self::class, 'entity_reference', 'entity_id', 'reference_id')
			->withPivot('order')
			->where('entity_type', '=', $this->getType())
			->where('reference_type', '=', 'CONTENT')
			->whereNull('entity_reference.deleted_at')
			->orderBy('order', 'ASC');
    }

	/**
	 * This Content can has one Domain\Template.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasOne
	 */
    public function template()
    {
		return $this->hasOne(TemplateModel::class, 'id', 'template_id');
    }
}