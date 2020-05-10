<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $fillable = ['title', 'published'];

    public function carType()
    {
        return $this->morphedByMany('App\CarType', 'modeltable');
    }
    public function carMark()
    {
        return $this->morphedByMany('App\CarMark', 'modeltable');
    }
}
