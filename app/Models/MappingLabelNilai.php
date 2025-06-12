<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class MappingLabelNilai extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
        public function mapel(): BelongsTo
    {
        return $this->BelongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }
}
