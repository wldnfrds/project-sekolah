<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormSubmit extends Model
{
    protected $fillable = [
        'full_name',
        'gender',
        'birth_place',
        'birth_date',
        'nisn',
        'religion',
        'address',
        'phone_number',
        'email',

        'father_name',
        'father_job',
        'mother_name',
        'mother_job',
        'parent_phone',
        'parent_address',

        'previous_school',
        'school_address',
        'graduation_year',
        'avg_report_grade',
        'final_exam_grade',

        'first_major',
        'second_major',

        'birth_certificate',
        'family_card',
        'diploma_or_skl',
        'photo',
        'health_certificate',

        'achievements',
        'reason_major',

        'statement',
        'agreement',
        'user_id',
        'status',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($student) {
            $lastNISN = FormSubmit::max('nisn') ?? 0;
            $student->nisn = $lastNISN + 1;
        });
    }
}
