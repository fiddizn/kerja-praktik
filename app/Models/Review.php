<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, $filters)
    {
        $query->when($filters ?? false, function ($query, $search) {
            return $query->whereHas('pendaftaran', function ($query) use ($search) {
                $query->where('peminatan', 'like', '%' . $search . '%');
            })
                ->orWhereHas('mahasiswa', function ($query) use ($search) {
                    $query->where('nim', 'like', '%' . $search . '%')
                        ->orWhere('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('pembimbing1', function ($query) use ($search) {
                    $query->whereHas('dosen', function ($query) use ($search) {
                        $query->where('kode', 'like', '%' . $search . '%');
                    });;
                })
                ->orWhereHas('reviewer1', function ($query) use ($search) {
                    $query->whereHas('dosen', function ($query) use ($search) {
                        $query->where('kode', 'like', '%' . $search . '%');
                    });;
                });
        });
    }

    public function scopeFilterReviewProposal($query, $filters)
    {
        $query->when($filters ?? false, function ($query, $search) {
            return $query->whereHas('pendaftaran', function ($query) use ($search) {
                $query->where('peminatan', 'like', '%' . $search . '%');
            })->orWhereHas('mahasiswa', function ($query) use ($search) {
                $query->where('nim', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%');
            });
        });
    }

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
        return $this->belongsTo(Reviewer1::class, 'r1_id', 'id');
    }

    public function pembimbing1()
    {
        return $this->belongsTo(Pembimbing1::class, 'p1_id', 'id');
    }
}