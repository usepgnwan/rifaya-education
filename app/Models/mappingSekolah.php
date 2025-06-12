<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class mappingSekolah extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    public function sekolah() : BelongsTo{
        return $this->belongsTo(Sekolah::class,'sekolah_id');
    }

    public function kelas() : BelongsTo{
        return $this->belongsTo(Kelas::class,'kelas_id');
    }

    public function mapel(): BelongsToMany
    {
        return $this->belongsToMany(MataPelajaran::class, 'detailms_mapel');
    }

    public function siswa() {
        return $this->hasMany(MappingKelasSiswa::class,'siswa_id');
    }
}
