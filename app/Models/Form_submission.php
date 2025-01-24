<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_submission extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'personal_info_id', 'parent_info_id', 'education_id', 'major_selection_id', 'documents_id', 'additional_id', 'statement_agreement_id', 'submission_date', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function personalInformation()
    {
        return $this->belongsTo(Personal_information::class);
    }

    public function parentInformation()
    {
        return $this->belongsTo(Parent_information::class);
    }

    public function previousEducation()
    {
        return $this->belongsTo(Previous_education::class);
    }

    public function majorSelection()
    {
        return $this->belongsTo(Major_selection::class);
    }

    public function supportingDocuments()
    {
        return $this->belongsTo(Supporting_document::class);
    }

    public function additionalInformation()
    {
        return $this->belongsTo(Additional_information::class);
    }

    public function statementsAndAgreement()
    {
        return $this->belongsTo(Statements_and_agreement::class);
    }
}
