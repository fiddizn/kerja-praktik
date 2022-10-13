<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function listbimbingan()
    {
        return $this->hasMany(ListBimbingan::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function pembimbing1()
    {
        return $this->belongsTo(Pembimbing1::class);
    }

    public function pembimbing2()
    {
        return $this->belongsTo(Pembimbing2::class);
    }
}