<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, $filters)
    {
        $query->when($filters ?? false, function ($query, $search) {
            return $query->where('nim', 'like', '%' .  $search . '%')
                ->orWhere('peminatan', 'like', '%' .  $search . '%')
                ->orWhere('judul_ta1', 'like', '%' .  $search . '%')
                ->orWhere('status', 'like', '%' .  $search . '%')
                ->orWhereHas('mahasiswa', function ($query) use ($search) {
                    $query->where('name', 'like', '%' .  $search . '%');
                });
        });
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}