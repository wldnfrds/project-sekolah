<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    protected $fillable = [
        'name',
        'position',
        'description',
        'img_teacher',
        'twitter_url',
        'instagram_url',
        'facebook_url',
        'linkedin_url'
    ];
}
