<?php
// app/Models/Rent.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'status', 'owner_confirmed_return'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function user()
    {
    return $this->belongsTo(User::class, 'user_id', 'id');

    }

}