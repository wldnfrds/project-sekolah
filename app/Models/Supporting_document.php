<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supporting_document extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'birth_certificate', 'family_card', 'diploma_or_skl', 'photo', 'health_certificate'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
