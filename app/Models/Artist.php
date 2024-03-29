<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    public function artwork()
    {
        return $this->hasMany('App\Models\Artwork');
    }

    public function blog()
    {
        return $this->hasMany('App\Models\Blog');
    }
}
