<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rent;

class RentController extends Controller
{

    public function myRents()
    {
        $user = auth()->user();

        // Fetch both pending and approved rentals
        $rents = $user->rents()->with('book')->whereIn('status', ['pending', 'approved'])->latest()->get();

        return view('my-rents', compact('rents'));
    }


    public function studentRent(Request $request, Book $book)
    {
        $user = auth()->user();
        return view('payment-confirmation', compact('book', 'user'));
    }
 


    public function returnBook(Request $request, Rent $rent)
    {
        // Add logic to update the rent status to 'returned' and set the returned_at date
        $rent->update([
            'status' => 'returned',
            'returned_at' => now(),
        ]);

        // Add any additional logic you need

        return redirect()->route('my.rents')->with('status', 'Book returned successfully.');
    }

    public function cancelRent(Request $request, $rentId)
    {
        // Add logic to cancel the rent request
        $rent = Rent::findOrFail($rentId);

        // Check if the rent is still pending
        if ($rent->status === 'pending') {
            $rent->status = 'canceled';
            $rent->save();

            // Remove the request from the pending requests
            $rent->delete();

            // Redirect or return a response
            return redirect()->route('my.rents')->with('status', 'Request canceled successfully.');
        }

        // If the rent is not pending, you might want to handle this differently
        // Redirect or return a response with an appropriate message
        return redirect()->route('my.rents')->with('status', 'Request has already been processed.');
    }

    public function confirmReturn($rentalId)
    {
        $rental = Rental::find($rentalId);
        $rental->owner_confirmed_return = true;
        $rental->save();

        // Redirect back or to another appropriate page with a success message
    }

}
