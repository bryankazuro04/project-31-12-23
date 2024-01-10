<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productivity extends Model
{
    use HasFactory;

    protected $fillable = ['general_cargo', 'bag_cargo', 'unitized', 'truck_lossing', 'pipa_lossing', 'tanggal'];

    public function operations() {
        return $this->hasMany(Operation::class, 'productivities_id', 'id');
    }
}