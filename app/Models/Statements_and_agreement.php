<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statements_and_agreement extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'statement', 'agreement'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
