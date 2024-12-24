<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'gender',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // For appointments when user is a doctor
    public function doctorAppointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    // For appointments when user is a patient
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    // Doctor profile relationship
    public function doctorProfile()
    {
        return $this->hasOne(DoctorProfile::class);
    }

    // Patient profile relationship
    public function patientProfile()
    {
        return $this->hasOne(PatientProfile::class);
    }

    // User roles relationship
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function doctor():HasOne
    {
        return $this->hasOne(DoctorProfile::class);
    }
}
