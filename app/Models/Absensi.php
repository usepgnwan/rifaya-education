<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['mapping'];

    public function mapping() : BelongsTo{
        return $this->belongsTo(MappingSiswa::class,'mapping_siswa_id');
    }
}
