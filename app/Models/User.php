<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'kelas',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function personalInformation()
    {
        return $this->hasOne(Personal_information::class);
    }

    public function parentInformation()
    {
        return $this->hasOne(Parent_information::class);
    }

    public function previousEducation()
    {
        return $this->hasOne(Previous_education::class);
    }

    public function majorSelection()
    {
        return $this->hasOne(Major_selection::class);
    }

    public function supportingDocuments()
    {
        return $this->hasOne(Supporting_document::class);
    }

    public function additionalInformation()
    {
        return $this->hasOne(Additional_information::class);
    }

    public function statementsAndAgreement()
    {
        return $this->hasOne(Statements_and_agreement::class);
    }

    public function formSubmissions()
    {
        return $this->hasMany(Form_submission::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
    public function isStudent(): bool
    {
        return $this->role === 'student';
    }
    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    public function FormSubmit()
    {
        return $this->hasMany(FormSubmit::class);
    }
}
