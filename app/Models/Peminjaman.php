<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    use HasFactory;
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
        
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function terminate()
    {
        $this->is_returned = true;
        $this->save();
    }
}
