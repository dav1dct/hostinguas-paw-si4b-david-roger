<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['nama','email','hp','review'];
    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
    public function user()
    {
    return $this->belongsTo(User::class);
    }
}