<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['user_id', 'service_id', 'car_model_id', 'car_mark_id', 'car_type_id', 'status', 'date', 'created_by', 'modifed_by'];
    public const STATUS_DONE = 1;
    public const STATUS_CANCEL = 2;
    public const STATUS_WAITING = 3;

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }

//    public function getServiceIdAttribute($value)
//    {
//        return unserialize($value);
//    }
//    public function setServiceIdAttribute($value)
//    {
//        return serialize($value);
//    }


    public function order()
    {
        return $this;
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function service()
    {
        return $this->hasMany('App\Service', 'id', 'service_id');
    }

    public function model()
    {
        return $this->hasOne('App\CarModel', 'id', 'car_model_id');
    }

    public function mark()
    {
        return $this->hasOne('App\CarMark', 'id', 'car_mark_id');
    }

    public function type()
    {
        return $this->hasOne('App\CarType', 'id', 'car_type_id');
    }

}
