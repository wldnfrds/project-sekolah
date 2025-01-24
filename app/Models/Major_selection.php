<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major_selection extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'first_major', 'second_major'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
