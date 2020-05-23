<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $guarded = [];

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
