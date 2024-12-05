<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserAffiliate extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function users_affiliate() : HasOne{
        return $this->hasOne(User::class ,'user_id');
    }
}
