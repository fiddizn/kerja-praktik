<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviewer1 extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class);
    }

    public function pendaftaranSeminar()
    {
        return $this->hasOne(PendaftaranSeminar::class);
    }

    public function penilaianSeminar()
    {
        return $this->hasOne(PenilaianSeminar::class);
    }
}