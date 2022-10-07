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

    public function p1()
    {
        return $this->belongsTo(Pembimbing1::class, 'p1_id', 'id');
    }

    public function p2()
    {
        return $this->belongsTo(Pembimbing2::class, 'p2_id', 'id');
    }

    public function r1()
    {
        return $this->belongsTo(Reviewer1::class, 'r1_id', 'id');
    }
    public function r2()
    {
        return $this->belongsTo(Reviewer2::class, 'r2_id', 'id');
    }
}