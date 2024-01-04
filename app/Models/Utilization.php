<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilization extends Model
{
    use HasFactory;

    protected $fillable = ['bor', 'btp', 'yor', 'ytp', 'sor', 'stp'];
}