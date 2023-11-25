<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "user_id",
        "donation_date",
        "confirm",
        "blood_type",
        "campaign_id",
        "medical_unit_id",
        "created_at",
        "updated_at"
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function donationDates() {
        return $this->hasMany(DonationDate::class);
    }
}
