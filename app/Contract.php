<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Input;

//use Illuminate\Http\Request;

class Contract extends Model {

    use SoftDeletes;
    use Traits\FlashMessageAfterSaving;

    protected $table = 'contracts';

    protected $guarded = ['id', 'created_at', 'updated_at', 'send_sms'];

    protected $dates = ['created_at', 'updated_at', 'fixed_at', 'delivered_at', 'deleted_at'];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function recipient()
    {
//        return $this->belongsTo('App\Technical');

        return $this->belongsTo('App\Technical', 'recipient_id', 'id');
    }

    public function technical()
    {
//        return $this->belongsTo('App\Technical');
        return $this->belongsTo('App\Technical', 'technical_id', 'id');
    }

    public function getIsRepairedImageAttribute()
    {
        if ($this->attributes['is_repaired'] == 0) {
            return '<i class="fa text-muted fa-2x fa-times-circle" alt="Not Repaired لم تتم الصيانة" data-toggle="tooltip" data-placement="top" title="Not Repaired لم تتم الصيانة"></i>';
        }

        return '<i class="fa text-success fa-2x fa-check-circle" alt="Done تمت الصيانة" data-toggle="tooltip" data-placement="top" title="Done تمت الصيانة"></i>';

    }

    public function getIsDeliveredImageAttribute()
    {
        if ($this->attributes['is_delivered'] == 0) {
            return '<i class="fa text-muted fa-2x fa-truck" alt="Not Delivered لم يتم التسليم" data-toggle="tooltip" data-placement="top" title="Not Delivered لم يتم التسليم"></i>';
        }

        return '<i class="fa text-success fa-2x fa-truck" alt="Delivered  تم التسليم" data-toggle="tooltip" data-placement="top" title="Delivered تم التسليم"></i>';
    }

    public function setIsDeliveredAttribute($value)
    {
        $this->attributes['is_delivered'] = $value;
        if (Input::get('is_delivered') == 0) {
            $this->attributes['delivered_at'] = null;
        }
    }

//    public function setDeliveredAtAttribute($value)
//    {
//        $this->attributes['delivered_at'] = ($value == "") ? null : $value;
//    }

//    public function setFixedAtAttribute($value)
//    {
//        $this->fixed_at = ($value == "") ? null : $value;
//    }


}
