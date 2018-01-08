<?php
require('fpdf.php');

// A4 width : 219mm
// default margin : 10mm each side

$con=mysqli_connect('location','root','');
mysqli_select_db($con,'cart.php');

class PDF extends FPDF {
	function Header(){
	$this->SetFont('Arial','B','15');

	$this ->Cell(12);

	$this ->Image('devshoppe.png',10,10,10);

	$this->Cell(100,10,'Product Checkout',0,1);

	$this->Ln(5);
	}
}

?>