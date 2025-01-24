<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Majors extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'learner_focus',
        'logo_major',
        'keunggulan',
    ];
}
