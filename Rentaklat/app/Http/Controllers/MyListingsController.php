<?php
namespace App\Http\Controllers;
use App\Models\Book;

class MyListingsController extends Controller
{
    public function index()
    {
        // Assuming you are fetching books
        $books = Book::with('rents.user')->get();

        return view('my-listings', compact('books'));
    }
}