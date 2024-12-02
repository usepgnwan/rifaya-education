<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MappingSiswa extends Model
{
    use HasFactory;
    public $guarded = ['id'];
    public $with = ['teacher','student','mata_pelajaran','kelas'];
    public function teacher() : BelongsTo{
        return $this->belongsTo(User::class,'teacher_id');
    }
    public function student() : BelongsTo{
        return $this->belongsTo(User::class,'student_id');
    }
    public function kelas() : BelongsTo{
        return $this->belongsTo(Kelas::class,'kelas_id');
    }
    public function mata_pelajaran() : BelongsTo{
        return $this->belongsTo(MataPelajaran::class,'matapelajaran_id');
    }
}
