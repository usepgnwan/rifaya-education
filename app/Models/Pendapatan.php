<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendapatan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['rekap_absensi','affiliate'];

    public function rekap_absensi() : BelongsTo{
        return $this->belongsTo(rekap_absensi::class,'rekap_absensi_id');
    }

    public function affiliate() : BelongsTo{
        return $this->belongsTo(UserAffiliate::class,'user_affiliate_id','user_affiliate_id');
    }
}
