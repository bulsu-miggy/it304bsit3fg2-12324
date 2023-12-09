<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        // Sample book for Adventure
        Book::create([
            'title' => 'The Journey Begins',
            'description' => 'Embark on a thrilling adventure in this captivating novel.',
            'genre' => 'Adventure',
            'owner_id' => 1, // Set the owner_id as needed
        ]);

        // Sample book for Mystery
        Book::create([
            'title' => 'Unraveling Secrets',
            'description' => 'Dive into a world of suspense and mystery in this intriguing book.',
            'genre' => 'Mystery',
            'owner_id' => 1, // Set the owner_id as needed
        ]);

        // Sample book for Romance
        Book::create([
            'title' => 'Loves Journey',
            'description' => 'Experience the magic of love and romance in this heartwarming novel.',
            'genre' => 'Romance',
            'owner_id' => 1, // Set the owner_id as needed
        ]);

        // Add more sample books for other genres as needed
    }
}