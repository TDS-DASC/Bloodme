<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignMedicalUnit extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'campaign_medical_unit';

    protected $fillable = [
        'campaign_id',
        'medical_unit_id',
    ];

}
