<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'urlGmaps',
        "multiple_donation",
        "donations_limit_day"
    ];

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class);
    }
}
