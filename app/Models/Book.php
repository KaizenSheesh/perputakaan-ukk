<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use KaizenSheesh\Commentify\Traits\Commentable;

class Book extends Model
{
    use HasFactory, Commentable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public function slug()
    {
        return Str::slug($this->bookname);
    }
    public function canBeBorrowed(): bool
    {
        return $this->activeLoans() < $this->copies_in_circulation;
    }

    public function activeLoans(): int
    {
        return $this->loans()
            ->where('is_returned', false)
            ->get()
            ->sum('number_borrowed');
    }

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }

    public function availableCopies(): int
    {
        return $this->copies_in_circulation - $this->activeLoans();
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function users(){
        return $this->belongsToMany(User::class)->withPivot('rating');
    }
    public function bookmarkUsers()
    {
        return $this->belongsToMany(User::class, 'bookmarks')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];
}
