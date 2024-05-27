<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use KaizenSheesh\Commentify\Traits\HasUserAvatar;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Bookmark;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUserAvatar;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function activeLoans() {
        return $this
            ->loans()
            ->where('is_returned', false)
            ->get();
    }

    public function loans(): HasMany {
        return $this->hasMany(Loan::class);
    }
    public function bookmarks()
    {
        return $this->belongsToMany(Book::class, 'bookmarks')->withTimestamps();
    }
}
