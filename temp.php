
<?php
//require_once("auth.php");
require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');
// create new PDF document

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Comfort Pdf');
$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);


// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();


	// Now you position and print your page content 
	// example:  
	$pdf->SetTextColor(0, 0, 0); 
	//$tcpdf->SetHeaderData('/flexiloans/img/flexi loan logo final.png', '30', ''.' ', PDF_HEADER_STRING);

	$tcpdf->SetFont('gargi', '', 11, '', true);
	//$tcpdf->SetFont($textfont,12); 
	$pdf->SetLineWidth(0.1);	
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	$pdf->writeHTML('सबसे पहला उपाय यह है कि आप सफेद आंकड़े (अकवन) को छाया में सुखा लें। इसके बाद उसे कपिला गाय यानी सफेद गाय के दूध में मिलाकर उसे पीस लें फिर उसका तिलक लगाएं। ऐसा करने वाले व्यक्ति का समाज में वर्चस्व... Read more at:  dad', true, false, true, false, '');
	ob_end_clean();
 echo $pdf->Output('2542'.'.pdf', 'I');


?>