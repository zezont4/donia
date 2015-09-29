<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{

	use SoftDeletes;
	use Traits\SearchFormHelper;
	use Traits\FlashMessageAfterSaving;

	protected $table = 'clients';

	protected $dates = ['deleted_at'];

	protected $fillable = ['name1', 'name2', 'name3', 'name4', 'mobile_no', 'notes', 'is_hidden'];

	/*
	 * my custom searchable fields that came from search form
	 */
	public $searchableFields = ['mobile_no', 'name1', 'name2', 'name3', 'name4'];

	public function getFullNameAttribute()
	{
		return $this->attributes['name1'] . ' ' . $this->attributes['name2'] . ' ' . $this->attributes['name3'] . ' ' . $this->attributes['name4'];
	}

	public function getIsHiddenTextAttribute()
	{
		if ($this->attributes['is_hidden'] == 0) {
			return 'Active نشط';
		}

		return 'Deleted محذوف';
	}

	public function contracts()
	{
		return $this->hasMany('App\Contract');
	}
}