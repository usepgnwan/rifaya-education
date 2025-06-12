<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class NilaiAkhirSiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    
    public function mapkelas() : BelongsTo{
        return $this->belongsTo(mappingSekolah::class,'mapping_sekolah_id');
    }
    public function label() : BelongsTo{
        return $this->belongsTo(MappingLabelNilai::class,'mapping_label_nilai_id');
    }

}
