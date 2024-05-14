<?php
require_once('vendor/tecnickcom/tcpdf/tcpdf.php');


$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->SetCreator('Akhil Yadlapalli');
$pdf->SetAuthor('Akhil Yadlapalli');
$pdf->SetTitle('My KDP Book');
$pdf->SetSubject('Assignment');
$pdf->SetKeywords('KDP, book');

$pdf->SetMargins(0, 0, 0, true);

$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

$pdf->AddPage();
$html1 = '
<div >
    <img src="front_page.png">
</div>
';
$pdf->writeHTML($html1, true, false, true, false, '');

// Add pages
for ($i = 1; $i <= 10; $i++) {
    // Get content of the page from HTML template
    $pdf->AddPage();
    $html2 = '
<div>
    <img src="middle_page.png">
</div>
';
    
    $pdf->writeHTML($html2, true, false, true, false, '');
    
}

// Add back cover
$pdf->AddPage();
$html3='
<div style="background-color: green; color: white; display: flex; flex-direction: column;">
<div style="padding: 5px; border-bottom: 1px solid gray;">
    <h1>THE HOLLOW MANOR 2</h1>
    <p>Written by Akhil Yadlapalli</p>
</div>
<div style="display: flex; padding: 5px; border-bottom: 1px solid gray;">
    <img src="middle_page.png" width="100px" height="100px" />
    <p>Akhil Yadlapalli</p>
</div>
<div>
    <h4>I will try to upload part three of this, my dear brothers and sisters</h4>
</div>
<div style="padding: 5px; border-bottom: 1px solid gray;">
    <h2>Publish by BriBooks</h2>
    <p>Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
</div>
<div style="padding: 5px; border-bottom: 1px solid gray; display: flex; justify-content: space-between;">
    <div>
        <h1>BriBooks</h1>
        <p>www.bribooks.com</p>
    </div>
    <div>
        <img src="" />
        <p>Version 1</p>
    </div>
</div>
</div>

';
$pdf->writeHTML($html3, true, false, true, false, '');

// Close and output PDF
$pdfContent = $pdf->Output('', 'S');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Preview</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <iframe src="data:application/pdf;base64,<?php echo base64_encode($pdfContent); ?>" width="100%" height="100%" style="border: none;"></iframe>
</body>
</html>
