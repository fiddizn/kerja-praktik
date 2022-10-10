<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    public function reviewer1()
    {
        return $this->belongsTo(Reviewer1::class);
    }
}