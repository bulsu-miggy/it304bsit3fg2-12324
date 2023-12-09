<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = "Rentaklat";

        // Featured Books
        $featuredBooks = Book::with('owner')->take(3)->get();

        // Genres and Books Grouped by Genre
        $genres = Book::distinct('genre')->pluck('genre')->toArray();
        $booksByGenre = Book::with('owner')->get()->groupBy('genre');

        return view('welcome', compact('title', 'featuredBooks', 'genres', 'booksByGenre'));
    }
}
