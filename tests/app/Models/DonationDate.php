<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationDate extends Model
{
    use HasFactory;
            /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
            "user_id",
            "campaign_id",
            "date_donation",
            "nombre_receptor",
            "medical_unit_id",
            "created_at",
            "updated_at"
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function donation() {
        return $this->belongsTo(Donation::class);
    }
}
