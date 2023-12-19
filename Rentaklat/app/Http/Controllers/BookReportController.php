<?php
namespace App\Http\Controllers;

use App\Models\Book; // Make sure to use the correct namespace for your Book model
use TCPDF;




class BookReportController extends Controller
{
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    
    public function downloadpdf()
    {
        // Fetch the books data with eager-loaded owner relationships
        $books = Book::with('owner')->get();
    
        // Create new PDF document
        $pdf = new TCPDF();
    
        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Books Report');
        $pdf->SetSubject('Books Report Generated from Laravel');
    
        // Add a page
        $pdf->AddPage();
    
        // Set font for the title
        $pdf->SetFont('helvetica', 'B', 16);
    
        // Title
        $title = "Books Report";
        $pdf->Cell(0, 10, $title, 0, 1, 'C');
    
        // Calculate the width of the table
        $tableWidth = 20 + 50 + 100; // The sum of each column's width
    
        // Calculate the start X position of the table to center it
        $startX = ($pdf->GetPageWidth() - $tableWidth) / 2;
    
        // Set the start X position of the table
        $pdf->SetX($startX);
    
        // Reset font for the table
        $pdf->SetFont('helvetica', '', 12);
    
        // Table header
        $pdf->Cell(20, 10, 'ID', 1, 0, 'C');
        $pdf->Cell(70, 10, 'Title', 1, 0, 'C');
        $pdf->Cell(80, 10, 'User Name', 1, 1, 'C'); // Span the 'User Name' header across two columns
    
        // Add the content
        foreach ($books as $book) {
            // Make sure to reset the X position before each row
            $pdf->SetX($startX);
    
            // Cells for each row
            $pdf->Cell(20, 10, $book->id, 1, 0, 'C');
            $pdf->Cell(70, 10, $book->title, 1, 0, 'C');
            
            $fullName = $book->owner->first_name ?? 'N/A';
            $fullName .= ' ' . ($book->owner->last_name ?? 'N/A');
            $pdf->Cell(80, 10, $fullName, 1, 1, 'C');
        }
    
        // Close and output PDF document
        ob_end_clean(); // Clean the output buffer to avoid header issues
        $pdf->Output('books_report.pdf', 'I'); // 'I' for inline display; use 'D' for direct download
    }
    
    
    
}
