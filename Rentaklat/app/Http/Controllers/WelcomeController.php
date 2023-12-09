<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        // Set the title for the welcome page
        $title = "Welcome to Rentaklat";

        // Get the featured books with their owners, limit to 3
        $featuredBooks = Book::with('owner')->take(3)->get();

        // Get distinct genres from the books
        $genres = Book::distinct('genre')->pluck('genre')->toArray();

        // Get all books with their owners and group them by genre
        $booksByGenre = Book::with('owner')->get()->groupBy('genre');

        // Pass the data to the 'welcome' view
        return view('welcome', compact('title', 'featuredBooks', 'genres', 'booksByGenre'));
    }
}
