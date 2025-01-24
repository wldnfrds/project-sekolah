<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parent_information extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'father_name', 'father_job', 'mother_name', 'mother_job', 'parent_phone', 'parent_address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
