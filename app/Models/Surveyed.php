<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveyed extends Model
{
    use HasFactory;
    protected $table = 'surveies'; 
    protected $fillable = [
        'setup',
        'project_id',
        'status',
        'area',
        'village_name',
        'appro_h_f',
        'appro_residents',
        'expected_cost',
        'image',
    ];
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public static function getTotalHandPumpSetupsCount()
    {
        return self::where('setup', 'Hand Pump')->count();
    }
}
