<?php
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8');
$pdf->SetFont('kozgopromedium');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();

$html = <<< EOF
<html>
<head>
    <style type="text/css">
    h1 {
        text-align: center;
    }
    </style>
</head>
<body>
<h1>領収書</h1>
<table>
・・・
</table>
</body>
</html>
EOF;

$pdf->writeHTML($html, false);
//echo $pdf->Output('test.pdf', 'D');
echo $pdf->Output('/Users/user/Desktop/test.pdf', 'F');
?>
