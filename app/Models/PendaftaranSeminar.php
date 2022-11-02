<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranSeminar extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, $filters)
    {
        $query->when($filters ?? false, function ($query, $search) {
            return $query->Where('peminatan', 'like', '%' .  $search . '%')
                ->orWhere('status', 'like', '%' .  $search . '%')
                ->orWhereHas('mahasiswa', function ($query) use ($search) {
                    $query->where('nim', 'like', '%' . $search . '%')
                        ->orWhere('name', 'like', '%' . $search . '%');
                });
        });
    }

    public function scopeFilterR2($query, $filters)
    {
        $query->when($filters ?? false, function ($query, $search) {
            return $query->where('peminatan', 'like', '%' .  $search . '%')
                ->orWhereHas('mahasiswa', function ($query) use ($search) {
                    $query->where('nim', 'like', '%' . $search . '%')
                        ->orWhere('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('reviewer1', function ($query) use ($search) {
                    $query->whereHas('dosen', function ($query) use ($search) {
                        $query->where('kode', 'like', '%' . $search . '%');
                    });;
                })
                ->orWhereHas('reviewer2', function ($query) use ($search) {
                    $query->whereHas('dosen', function ($query) use ($search) {
                        $query->where('kode', 'like', '%' . $search . '%');
                    });;
                });
        });
    }

    public function mahasiswa()
    {
        return $this->belongsTo(\App\Models\Mahasiswa::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reviewer1()
    {
        return $this->belongsTo(Reviewer1::class, 'r1_id', 'id');
    }
    public function reviewer2()
    {
        return $this->belongsTo(Reviewer2::class, 'r2_id', 'id');
    }
}