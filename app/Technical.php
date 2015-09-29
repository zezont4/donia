<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//use Illuminate\Support\Facades\Input;

class Technical extends Model {
	use Traits\FlashMessageAfterSaving;
	use SoftDeletes;
    protected $table = 'technicals';

	protected $dates = ['deleted_at'];

	protected $fillable = ['name'];

//    public $timestamps = false;

    //relation with contract table
    public function recipient_id_contracts()
    {
        return $this->hasMany('App\Contract', 'recipient_id', 'id');
    }

    //relation with contract table
    public function technical_id_contracts()
    {
        return $this->hasMany('App\Contract', 'technical_id', 'id');
    }

}