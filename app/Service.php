<?php

namespace App;
use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'published',
        'price',
        'image',
        'image_show',
        'pr_description',
        'description',
        'dt_from',
        'dt_before',
        'created_by',
        'modifed_by',
    ];

    public function getDtFromAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }

    public function getDtBeforeAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }
    public function categories()
    {
        return $this->morphToMany('App\Category', 'categoryable');
    }


    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40) . '-'. Carbon::now()->format('dmyHi'),
            '-');
    }
}
