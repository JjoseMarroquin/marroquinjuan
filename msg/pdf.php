<?php
require('../pdfs/fpdf.php');

class PDF extends FPDF
{
function Header()
{

    $this->Image('../images/toyota.png',10,8,33);

    $this->SetFont('Arial','B',15);
    $this->Ln(20);
    $this->Cell(80);

    $this->Cell(30,10,'Mensajes recibidos',0,0,'C');

    $this->Ln(20);
    $this->Cell(65,10,utf8_decode('Nombre'),1,0,'C',0);
    $this->Cell(30,10,utf8_decode('Telefóno'),1,0,'C',0);
    $this->Cell(80,10,utf8_decode('Correo'),1,0,'C',0);
    $this->Cell(102,10,utf8_decode('Mensajes'),1,1,'C',0);
}

function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo(),0,0,'C');
}
}

include('../bd.php');
$query="SELECT * FROM mensajes ORDER BY nomensaje ASC";
$resultados=mysqli_query($conn, $query);

$pdf = new PDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial','',12);


while ($row=$resultados->fetch_assoc()){
    
    $pdf->Cell(65,10,utf8_decode($row['nombre']),1,0,'C',0);
    $pdf->Cell(30,10,utf8_decode($row['telefono']),1,0,'C',0);
    $pdf->Cell(80,10,utf8_decode($row['correo']),1,0,'C',0);
    $pdf->Cell(102,10,utf8_decode($row['mensaje']),1,1,'C',0);
}
$pdf->Output();

?>