<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;
    protected $fillable = ['nama','email','hp','alamat'];
    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}