<?php
// In app/Models/Book.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    protected $fillable = ['title', 'description', 'genre', 'image', 'fee_paid'];


    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    public function rents()
    {
        return $this->hasMany(Rent::class);
    }
    public function renters(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'rents', 'book_id', 'user_id')->withPivot('id');
    }
}
