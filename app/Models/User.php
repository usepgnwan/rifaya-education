<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'username',
        'profile',
    ];

    protected $with = ['roles'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */


    const STATUSES = [
        'aktif' => 'Aktif',
        'non-aktif' => 'Non-aktif',
        'register' => 'Register',
    ];

    const HARI = [
        'senin' => 'Senin',
        'selasa' => 'Selasa',
        'rabu' => 'Rabu',
        'kamis' => 'Kamis',
        'jumat' => 'Jumat',
        'sabtu' => 'Sabtu',
        'minggu' => 'Minggu',
    ];
    const WAKTU = [

        '08 sd 12' => '08 sd 12',
        '10 sd 15' => '10 sd 15',
        '10 sd 17' => '10 sd 17',
        '13 sd 17' => '13 sd 17',
    ];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function Roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'roles_users');
    }

    public function user_profile(): HasOne
    {
        return $this->hasOne(user_profile::class);
    }

    public function user_experiences(): HasMany
    {
        return $this->HasMany(user_experience::class,'user_id');
    }

    public function mata_pelajaran(): BelongsToMany
    {
        return $this->belongsToMany(MataPelajaran::class, 'user_matapelajarans', 'user_id', 'matapelajaran_id');
    }

    public function user_metodemengajar(): HasMany
    {
        return $this->HasMany(user_metodemengajar::class,'user_id');
    }
    public function kelas(): belongsToMany
    {
        return $this->belongsToMany(Kelas::class, 'user_kelas');
    }


    public function user_waktu(): HasMany
    {
        return $this->HasMany(User_waktu::class,'user_id');
    }
    public function user_jam_ajar(): HasMany
    {
        return $this->HasMany(User_jam_ajar::class,'user_id');
    }
}
