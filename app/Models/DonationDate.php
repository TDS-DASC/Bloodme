<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationDate extends Model
{
    use HasFactory;

    public function donation() {
        return $this->belongsTo(Donation::class);
    }
}
