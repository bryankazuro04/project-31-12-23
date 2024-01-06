<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['waiting_time', 'wt_gross', 'postpone_time', 'approach_time'];

    public function operations() {
        return $this->hasMany(Operation::class, 'services_id', 'id');
    }
}