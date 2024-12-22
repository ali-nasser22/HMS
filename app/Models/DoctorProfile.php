<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DoctorProfile extends Model
{
    protected $fillable = [
        'user_id',
        'specialization',
        'qualification',
        'experience_years',
        'license_number',
        'contact_number'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
