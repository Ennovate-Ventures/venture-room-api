<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Startup extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'description', 'employee_count',
        'revenue', 'approved', 'image', 'user_id'
    ];

    public function founders(){
        return $this->hasMany(Founder::class);
    }

    public function investors(){
        return $this->belongsToMany(Investor::class,'investments', 'startup_id', 'investor_id');
    }

    public function goals(){
        return $this->hasMany(Goal::class);
    }
}

