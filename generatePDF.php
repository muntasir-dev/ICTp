<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted data
    $name = $_POST['name'];
    $classRoll = $_POST['classRoll'];
    $registrationNo = $_POST['registrationNo'];
    $examName = $_POST['examName'];
    $group = $_POST['group'];
    $gender = $_POST['gender'];
    $img = $_FILES['img']['tmp_name'];

    // Generate the PDF using TCPDF or any other PHP PDF library
    require_once('tcpdf/tcpdf.php');
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT_A4, true, 'UTF-8', false);

    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 20);
    $pdf->Cell(0, 20, 'Phulbari Government College', 0, 1, 'C');
    $pdf->Ln(20);
    $pdf->SetFont('helvetica', '', 15);
    $pdf->Cell(0, 20, 'Phulbari, Dinajpur', 0, 1, 'C');
    $pdf->Ln(20);
    $pdf->SetFont('helvetica', '', 20);
    $pdf->Cell(0, 20, 'Assignment on ICT Practical', 0, 1, 'C');
    $pdf->Ln(20);
    $pdf->SetFont('helvetica', '', 15);
    $pdf->Cell(0, 20, 'Submited By', 0, 1, 'C');
    $pdf->Ln(20);
    $pdf->SetFont('helvetica', '', 15);
    $pdf->Cell(0, 20, 'Name: ' . $name, 0, 1, 'C');
    $pdf->Ln(20);
    $pdf->Cell(0, 20, 'Class Roll: ' . $classRoll, 0, 1, 'C');
    $pdf->Ln(20);
    $pdf->Cell(0, 20, 'Registration No.: ' . $registrationNo, 0, 1, 'C');
    $pdf->Ln(20);
    $pdf->Cell(0, 20, 'Name of Exam: ' . $examName, 0, 1, 'C');
    $pdf->Ln(20);
    $pdf->Cell(0, 20, 'Group: ' . $group, 0, 1, 'C');
    $pdf->Ln(20);
    $pdf->Cell(0, 20, 'Gender: ' . $gender, 0, 1, 'C');
    $pdf->Ln(20);
    $pdf->Image($img, 10, 10, 50, 50, '', '', '', 0, 'C', false, false, 0);

    // Set the appropriate headers for PDF download
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="output.pdf"');

    // Output the generated PDF
    $pdf->Output('output.pdf', 'I');

    exit; // Add this line to prevent further execution of the PHP script
}
?>
