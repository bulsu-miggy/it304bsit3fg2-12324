<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rent;
use Illuminate\Support\Facades\Auth;

class PaymentConfirmationController extends Controller
{
    public function showPaymentConfirmation(Request $request, Book $book)
    {
        $user = auth()->user();
        return view('payment-confirmation', compact('book', 'user'));
    }
    public function rentBook(Request $request, $bookId)
    {
        // Validate the request data

        // Save the rental request
        $rent = new Rent();
        $rent->book_id = $bookId; // Use $bookId instead of $request->input('book_id') as it comes from the URL
        $rent->user_id = Auth::id(); // Assuming the user is authenticated
        $rent->phone_number = $request->input('phone_number');
        $rent->address = $request->input('address');
        $rent->payment_method = $request->input('payment_method');
        $rent->status = 'pending'; // Set status to pending

        $rent->save();

        // Redirect to the homepage after successful submission
        return redirect('/'); // You can replace '/' with the route or URL you want to redirect to
    }
}
