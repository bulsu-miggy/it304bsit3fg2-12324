<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $genres = Book::distinct('genre')->pluck('genre')->toArray();
        $featuredBooks = Book::with('owner')->get();

        return view('books.index', compact('books', 'genres', 'featuredBooks'));
    }

    public function showByGenre($genre)
    {
        $booksByGenre = Book::where('genre', $genre)->with('owner')->get();

        return view('welcome', compact('booksByGenre', 'genre'));
    }

    public function showDetails($id)
    {
        $book = Book::findOrFail($id);

        return view('books.details', compact('book'));
    }

    public function search(Request $request)
    {
        $title = $request->input('title');

        $books = Book::where('title', 'LIKE', "%$title%")->get();

        return view('search', compact('books', 'title'));
    }

    public function myListings()
    {
        $user = auth()->user();
        $books = $user->books()->latest()->get();

        return view('my-listings', compact('books'));
    }

    public function chargeFee(Request $request, $bookId)
    {
        $book = Book::find($bookId);
        $fee = 5.00; // Set the fee amount

        if ($paymentSuccess) {
            $book->fee_paid = true;
            $book->save();

            return back()->with('success', 'Fee paid successfully!');
        } else {
            return back()->with('error', 'Payment failed. Please try again.');
        }
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Add more validation rules for other fields
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Get the uploaded file
            $image = $request->file('image');

            // Generate a unique name for the file
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Move the file to the storage location
            $image->storeAs('public/images', $imageName);
        }

        // Create a new book
        $book = new Book([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'genre' => $request->input('genre'),
            'image' => $imageName ?? null,
            // Add more fields as needed
        ]);

        // Associate the book with the authenticated user
        auth()->user()->books()->save($book);
        Log::channel('dashboard')->info('New book posted by an owner.', ['book_id' => $book->id]);

        // Redirect to the my-listings page
        return redirect()->route('my-listings')->with('status', 'Book created successfully!');
    }
    public function remove(Book $book)
    {

        $book->delete();

        return redirect()->route('my-listings')->with('status', 'Book removed successfully!');
    }

}
