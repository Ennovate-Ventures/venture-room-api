<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RaisedFund extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'startup_id', 'amount', 
        'funder', 'date'
    ];
}
