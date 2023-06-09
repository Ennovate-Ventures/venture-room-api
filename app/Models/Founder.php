<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Founder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'startup_id', 'user_id', 'name',
        'date_of_birth', 'description',
        'link', 'image'
    ];

    public function startup(){
        return $this->belongsTo(Startup::class);
    }
}
