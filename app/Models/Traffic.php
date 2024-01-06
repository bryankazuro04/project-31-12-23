<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traffic extends Model
{
    use HasFactory;

    protected $fillable = ['kunjungan_kapal', 'jumlah_bongkar_muat', 'grt', 'loa'];

    public function operations() {
        return $this->hasMany(Operation::class, 'traffic_id', 'id');
    }
}