<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'isbn',
        'description',
        'author_id',
        'genre',
        'publish_at',
        'total_copies',
        'availabe_copies',
        'cover_image',
        'price',
        'status'
    ];

    public function author(): BelongsTo{
        return $this->BelongsTo(Author::class);
    }

    public function borowings(): hasMany{
        return $this->hasMany(boorowings::class);
    }

    public function isAvailable(): bool{
         return $this->available_copies > 0;
    }

    public function borrow(): void{
         if($this->available_copies > 0){
             $this->decrement('availabe_copies');
         }
    }

    public function returnBook(): void{
         if($this->available_copies < $this->total_copies){
             $this->increment('availabe_copies');
         }
    }
}
