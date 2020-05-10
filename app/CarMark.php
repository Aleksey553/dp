<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarMark extends Model
{
    protected $fillable = ['title', 'published'];
    public function carModel()
    {
        return $this->morphToMany('App\CarModel', 'modeltable');
    }
    public function carType()
    {
        return $this->morphToMany('App\CarType', 'markable');
    }
}
