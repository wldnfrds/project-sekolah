<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form_contact extends Model
{
    protected $fillable = [

        'name',
        'email',
        'subject',
        'message',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
