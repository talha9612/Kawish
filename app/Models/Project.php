<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = [
        'setup',
        'project_id',
        'requested_by',
        'requested_for',
        'donor_id',
        'plaque_id',
        'area',
        'village_name',
        'appro_h_f',
        'appro_residents',
        'tentative_start_date',
        'actual_start_date',
        'tentative_completion_date',
        'actual_completion_date',
        'status',
        'expected_cost',
        'actual_cost',
        'depth',
        'snap_surveyed',
        'snap_working',
        'current_working',
        'custodian_name',
        'custodian_phone',
        'comments',
    ];
    public function surveyed()
    {
       
        return $this->belongsTo(Surveyed::class,'survey_id','id');
        // ->where('region', $this->region)
        //         ->where('area', $this->area)
        //         ->where('village_name', $this->village);
    }
    public function donor()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }
}
