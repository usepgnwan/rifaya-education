<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Cviebrock\EloquentSluggable\Sluggable;
class Post extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = ['id'];
    protected $with = ['user'];

    /**
     * Get all of the comments for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materi(): BelongsToMany
    {
        return $this->belongsToMany(Materi::class, 'post_materi');
    }

    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class,'class_id');
    }

    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }


    const STATUSES = [
        'published' => 'Published',
        'draft' => 'Draft',
        'reject' => 'Reject',
    ];

    const Type = [
        'public' => 'Public',
        'private' => 'private',
        'purchase' => 'purchase',
    ];

    public function sluggable(): array
        {
            return [
                'slug' => [
                    'source' => 'title'
                ]
            ];
        }
}
