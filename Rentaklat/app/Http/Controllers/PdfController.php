<?php
namespace App\Http\Controllers;

use App\Models\User; // Make sure to use the correct namespace for your User model
use TCPDF;

class PdfController extends Controller
{
    public function downloadPdf()
    {
        // Fetch the users data
        $users = User::all(); // Adjust the query as needed

        // Create new PDF document
        $pdf = new TCPDF();

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Users Report');
        $pdf->SetSubject('Users Report Generated from Laravel');

        // Add a page
        $pdf->AddPage();

        // Set font for the title
        $pdf->SetFont('helvetica', 'B', 16);

        // Calculate the center position for the title
        $title = "Users Report";
        $titleWidth = $pdf->GetStringWidth($title);
        $x = ($pdf->GetPageWidth() - $titleWidth) / 2;

        // Set the position and print the title
        $pdf->SetX($x);
        $pdf->Cell($titleWidth, 10, $title, 0, 1, 'C');

        // Reset font for the table
        $pdf->SetFont('helvetica', '', 12);

        // Table header
        $pdf->Cell(20, 10, 'ID', 1, 0, 'C');
        $pdf->Cell(50, 10, 'First Name', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Last Name', 1, 0, 'C');
        $pdf->Cell(70, 10, 'Email', 1, 1, 'C');

        // Add the content
        foreach ($users as $user) {
            $pdf->Cell(20, 10, $user->id, 1, 0, 'C');
            $pdf->Cell(50, 10, $user->first_name, 1, 0, 'C');
            $pdf->Cell(50, 10, $user->last_name, 1, 0, 'C');
            $pdf->Cell(70, 10, $user->email, 1, 1, 'C');
        }

        // Close and output PDF document
        ob_end_clean(); // Clean the output buffer to avoid header issues
        $pdf->Output('users_report.pdf', 'I'); // 'I' for inline display; use 'D' for direct download
    }
}
