<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    protected $fillable = ['title', 'published'];
    public function carModel()
    {
        return $this->morphToMany('App\CarModel', 'modeltable');
    }
    public function carMark()
    {
        return $this->morphedByMany('App\CarMark', 'markable');
    }

}
