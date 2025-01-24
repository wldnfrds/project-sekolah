<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal_information extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'full_name', 'gender', 'birth_place', 'birth_date', 'nisn', 'religion', 'address', 'phone_number', 'email'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
