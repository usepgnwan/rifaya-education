<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_kelas extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $table = 'user_kelas';
}
