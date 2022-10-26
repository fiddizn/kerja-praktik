<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, 'mahasiswa_id', 'id');
    }

    public function pendaftaranSeminar()
    {
        return $this->hasOne(PendaftaranSeminar::class, 'mahasiswa_id', 'id');
    }

    public function bimbingan()
    {
        return $this->hasOne(Bimbingan::class);
    }

    public function list_bimbingan()
    {
        return $this->hasOneThrough(ListBimbingan::class, Bimbingan::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function penilaianSeminar()
    {
        return $this->hasOne(PenilaianSeminar::class);
    }

    public function proposalhasilrevisi()
    {
        return $this->hasOne(ProposalHasilRevisi::class);
    }
}