<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /** @use HasFactory<\Database\Factories\MemberFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'membership_date',
        'status'
    ];

    protected $casts = [
         'membership_date' => 'date'
    ];


    public function borrowings(): HasMany{
        return $this->hasMany(Borrowings::class);
    }

    public function ActiveBorrowings(): HasMany{
        return $this->borrowings()->where('status', 'borrowed');
    }
}
