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
                ->orWhereHas('mahasiswa', function ($query) {
                    $query->where('nim', 'like', '%' . $search . '%')
                        ->orWhere('name', 'like', '%' . $search . '%');
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
}