<?php

    namespace App\Models;

    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;

    class User extends Authenticatable
    {
        
        use HasFactory, Notifiable;
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'first_name', 'last_name', 'email', 'password', 'role', 'phone_number', 'address',

        ];

        protected $hidden = [
            'password', 'remember_token',
        ];

        protected $casts = [
            'email_verified_at' => 'datetime',
        ];
        public function books()
        {
            return $this->hasMany(Book::class, 'owner_id');
        }
        public function rents()
        {
            return $this->hasMany(Rent::class);
        }
        public function rentedBooks(): BelongsToMany
        {
            return $this->belongsToMany(Book::class, 'rents', 'user_id', 'book_id');
        }
    }