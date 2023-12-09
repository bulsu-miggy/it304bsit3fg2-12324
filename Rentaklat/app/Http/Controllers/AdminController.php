<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;

use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        // Get data for the Admin Dashboard
        $totalStudents = User::where('role', 'student')->count();
        $totalOwners = User::where('role', 'owner')->count();
        $totalBooks = Book::count();
        $logs = File::get(storage_path('logs/dashboard.log')); // Change to the correct log file

        return view('admin.dashboard', compact('totalStudents', 'totalOwners', 'totalBooks', 'logs'));
    }

    public function manageUsers()
    {
        // Get all users
        $users = User::all();

        return view('admin.manage-users', compact('users'));
    }

    public function removeUser(User $user)
    {
        // Remove user logic
        $user->delete();

        return redirect()->route('admin.manageUsers')->with('success', 'User removed successfully.');
    }

    public function updateUser(Request $request, User $user)
    {
        // Update user logic
        $user->update($request->all());

        return redirect()->route('admin.manageUsers')->with('success', 'User updated successfully.');
    }

    public function manageBooks()
    {
        // Get all books
        $books = Book::all();

        return view('admin.manage-books', compact('books'));
    }

    public function removeBook(Book $book)
    {
        // Remove book logic
        $book->delete();

        return redirect()->route('admin.manageBooks')->with('success', 'Book removed successfully.');
    }

    public function updateBook(Request $request, Book $book)
    {
        // Update book logic
        $book->update($request->all());

        return redirect()->route('admin.manageBooks')->with('success', 'Book updated successfully.');
    }
}