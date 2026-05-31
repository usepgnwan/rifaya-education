<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class rekap_absensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['mapping'];

    protected $casts = [
        'aktivitas' => 'array',
    ];

    public function mapping() : BelongsTo{
        return $this->belongsTo(MappingSiswa::class,'mapping_siswa_id');
    }

    public function pendapatan(): HasOne{
        return $this->hasOne(Pendapatan::class);
    }
}
