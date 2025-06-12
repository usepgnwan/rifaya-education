<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
}
