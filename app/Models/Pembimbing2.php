<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembimbing2 extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function user()
    {
        return $this->belongsToThrough(User::class, Dosen::class);
    }

    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class);
    }

    public function bimbingan()
    {
        return $this->hasOne(Bimbingan::class);
    }

    public function penilaianSeminar()
    {
        return $this->hasOne(PenilaianSeminar::class);
    }
}