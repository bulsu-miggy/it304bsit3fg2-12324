<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Add this line
use App\Models\Rent;
use App\Models\Book;

class PendingRequestsController extends Controller
{
    public function showPendingRequests(Request $request, Book $book)
    {
        $pendingRequests = Rent::where('status', 'pending')->with('book')->get();
        $user = auth()->user();
        return view('pending-requests', compact('pendingRequests'));
    }

    public function approveRequest(Request $request, $rentId)
    {
        $rent = Rent::findOrFail($rentId);

        // Check if the rent is still pending
        if ($rent->status === 'pending') {
            // Update the rent status to 'approved'
            $rent->status = 'approved';
            $rent->save();

            // Add any additional logic you need

            // Redirect or return a response
            return redirect()->route('pending-requests')->with('status', 'Request approved successfully.');
        }


        // If the rent is not pending, you might want to handle this differently
        // Redirect or return a response with an appropriate message
        return redirect()->route('pending-requests')->with('status', 'Request has already been processed.');
    }
    public function declineRequest(Request $request, $rentId)
    {
        $rent = Rent::findOrFail($rentId);

        // Check if the rent is still pending
        if ($rent->status === 'pending') {
            $rent->status = 'declined';
            $rent->save();

            // Remove the request from the pending requests
            $rent->delete();

            // Redirect or return a response
            return redirect()->route('pending-requests')->with('status', 'Request declined successfully.');
        }

        // If the rent is not pending, you might want to handle this differently
        // Redirect or return a response with an appropriate message
        return redirect()->route('pending-requests')->with('status', 'Request has already been processed.');
    }
}
