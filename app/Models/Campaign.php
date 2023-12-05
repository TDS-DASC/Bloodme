<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_campaign',
        'end_campaign',
        'platelets',
        'blood',
        'donations_required',
        'current_donations',
        'user_id',
        'description',
    ];

    public function medicalUnits()
    {
        return $this->belongsToMany(MedicalUnit::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function childs(){
        return $this->hasMany(CampaignMedicalUnit::class);
    }
}
