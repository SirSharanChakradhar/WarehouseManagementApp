<?php

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Mladen Karic');
$pdf->SetTitle('Repromaterijali');
$pdf->SetSubject('Repromaterijali');

$pdf->SetTopMargin(50);

$pdf->setFooterMargin(25);
$pdf->SetAutoPageBreak(true, 25);

$textfont = 'freesans';
$pdf->SetFont($textfont,'B', 20);

// add a page (required with recent versions of tcpdf)
$pdf->AddPage();
$pdf->SetXY(0, 40);

$pdf->Cell(0,0, "Kartica Artikla - Dobavljači", 0,1,'C');

$pdf->SetY(60);
$pdf->SetFont($textfont,'R', 10);


$html = '<br><br><br><br><table border="1" cellpadding="2" cellspacing="2" align="center"> <tr><th>Ime artikla:</th>
		<th>Kod artikla:</th><th>Status artikla:</th><th>Preporučeni rejting:</th>
	</tr>';


foreach($data as $d){
	$html .= "
					<tr>
						<td>{$d['Item']['name']}</td>
						<td>{$d['Item']['code']}</td>
						<td>{$d['ServiceSupplier']['status']}</td>
						<td>{$d['ServiceSupplier']['recommended_rating']}</td>
					</tr><br>
				 ";
}


$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');

//Generate pdf file
$filename .= '.pdf';
$pdf->Output('dob.pdf', 'D');

?>
