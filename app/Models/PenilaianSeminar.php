<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianSeminar extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

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

    public function reviewer1()
    {
        return $this->belongsTo(Reviewer1::class);
    }

    public function reviewer2()
    {
        return $this->belongsTo(Reviewer2::class);
    }
}