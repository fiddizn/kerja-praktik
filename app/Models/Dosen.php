<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jabfun()
    {
        return $this->belongsTo(Jabfun::class);
    }

    public function pembimbing1()
    {
        return $this->hasOne(Pembimbing1::class);
    }

    public function pembimbing2()
    {
        return $this->hasOne(Pembimbing2::class);
    }

    public function reviewer1()
    {
        return $this->hasOne(Reviewer1::class);
    }

    public function reviewer2()
    {
        return $this->hasOne(Reviewer2::class);
    }
}