<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CarCategory extends Model
{
    protected $fillable = ['title', 'slug', 'published', 'parent_id', 'created_by', 'modifed_by'];

    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40) . '-'. Carbon::now()->format('dmyHi'),
            '-');
    }
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
