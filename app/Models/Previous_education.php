<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Previous_education extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'previous_school', 'school_address', 'graduation_year', 'avg_report_grade', 'final_exam_grade'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
