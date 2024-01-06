<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = ['traffic_id', 'services_id', 'utilizations_id', 'productivities_id'];

    public function traffic() {
        return $this->belongsTo(Traffic::class, 'traffic_id');
    }

    public function service() {
        return $this->belongsTo(Service::class, 'services_id');
    }

    public function utilization() {
        return $this->belongsTo(Utilization::class, 'utilizations_id');
    }

    public function productivity() {
        return $this->belongsTo(Productivity::class, 'productivities_id');
    }
}