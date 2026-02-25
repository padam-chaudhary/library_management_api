<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    /** @use HasFactory<\Database\Factories\BorrowingFactory> */
    use HasFactory;

    protected $fillable = [
        'book_id',
        'member_id',
        'borrowed_date',
        'due_date',
        'returned_date',
        'status'
    ];

protected $casts = [
    'borrowed_date' => 'date',
        'due_date' => 'date',
        'returned_date' => 'date'
];

    public function book(): BelongsTo{
        return $this->belongsTo(Book::class);
    }

    public function member(): BelonsTo{
        return $this->belongsTo(Member::class);
    }
    

    //check if  borrowing is overdue
    public function isOverDue(): bool{
        return $this->due_date > carbon::today() && $this->status === 'borrowed';
    }
    }
