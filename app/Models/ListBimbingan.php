<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListBimbingan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function bimbingan()
    {
        return $this->belongsToMany(Bimbingan::class);
    }
}