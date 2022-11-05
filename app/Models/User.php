<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Database\Factories\TataUsahaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function scopeFilter($query, $filters)
    {
        $query->when($filters ?? false, function ($query, $search) {
            return $query->where('nim', 'like', '%' .  $search . '%')
                ->orWhereHas('mahasiswa', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('dosen', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('admin', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('koordinator', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('tatausaha', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('role', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class);
    }

    public function koordinator()
    {
        return $this->hasOne(Koordinator::class);
    }

    public function tatausaha()
    {
        return $this->hasOne(TataUsaha::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function pembimbing1()
    {
        return $this->hasOneThrough(Pembimbing1::class, Dosen::class);
    }

    public function pembimbing2()
    {
        return $this->hasOneThrough(Pembimbing2::class, Dosen::class);
    }

    public function reviewer1()
    {
        return $this->hasOneThrough(Reviewer1::class, Dosen::class);
    }

    public function reviewer2()
    {
        return $this->hasOneThrough(Reviewer2::class, Dosen::class);
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class);
    }

    public function pendaftaran()
    {
        return $this->hasOneThrough(Pendaftaran::class, Mahasiswa::class);
    }

    public function pendaftaranSeminar()
    {
        return $this->hasOneThrough(PendaftaranSeminar::class, Mahasiswa::class);
    }

    public function penilaianseminar()
    {
        return $this->hasOneThrough(PenilaianSeminar::class, Mahasiswa::class);
    }

    public function bimbingan()
    {
        return $this->hasOneThrough(Bimbingan::class, Mahasiswa::class);
    }

    public function proposalhasilrevisi()
    {
        return $this->hasOneThrough(ProposalHasilRevisi::class, Mahasiswa::class);
    }

    public function review()
    {
        return $this->hasOneThrough(Review::class, mahasiswa::class);
    }



    // public function scopeFilter($query, $filters)
    // {
    //     $query->when($filters ?? false, function ($query, $search) {
    //         return $query->Where('nim', 'like', '%' .  $search . '%')
    //         ->orWhere('status', 'like', '%' .  $search . '%')
    //         ->orWhereHas('mahasiswa', function ($query) use ($search) {
    //             $query->where('nim', 'like', '%' . $search . '%')
    //             ->orWhere('name', 'like', '%' . $search . '%');
    //         });
    //     });
    // }


    // class Country
    // {
    //     public function employees()
    //     {
    //         return $this->hasManyDeep(Employees::class, [City::class, Shop::class]);
    //     }
    // }



}