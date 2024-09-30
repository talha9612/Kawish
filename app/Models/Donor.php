<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Donor extends Authenticatable
{
    use HasFactory;
    protected $guard = 'donor';
    protected $fillable = [
        'name',
        'email',
        'password',
        'f_h_name',
        'phone',
        'city',
        'country',

    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    // public function project()
    // {
    //     return $this->belongsTo(Project::class);
    // }
}
