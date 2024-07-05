<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'barang_id',
        'tanggal_pesanan',
        'total_pesanan',
    ];
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}