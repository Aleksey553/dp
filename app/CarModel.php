<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $fillable = ['title', 'published', 'body_number', 'mileage', 'year_from', 'year_to'];
    public function modeltable()
    {
        return $this->morphTo();
    }

    public function carType()
    {
        return $this->morphedByMany('App\CarType', 'modeltable');
    }
    public function carMark()
    {
        return $this->morphedByMany('App\CarMark', 'modeltable');
    }
}
