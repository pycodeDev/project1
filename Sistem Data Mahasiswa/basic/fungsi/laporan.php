<?php
// memanggil library FPDF
require('../fpdf181/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'UNIVERSITAS ISLAM NEGERI SULTAN SYARIF KASIM RIAU',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'DAFTAR Mahasiswa UIN SUSKA RIAU',0,1,'C');
 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,6,'No',1,0);
$pdf->Cell(30,6,'NIM',1,0);
$pdf->Cell(60,6,'NAMA MAHASISWA',1,0);
$pdf->Cell(25,6,'SEMESTER',1,0);
$pdf->Cell(60,6,'FAKULTAS',1,1);

 
$pdf->SetFont('Arial','',10);
 
include '../konek.php';
$mahasiswa = mysqli_query($conn, "select * from Tb_Mahasiswa");
$i=1;
while ($row = mysqli_fetch_array($mahasiswa)){
	$pdf->Cell(15,6,$i++,1,0);
    $pdf->Cell(30,6,$row['NIM'],1,0);
    $pdf->Cell(60,6,$row['Nama'],1,0);
    $pdf->Cell(25,6,$row['Semester'],1,0);
    $pdf->Cell(60,6,$row['Fakultas'],1,1); 
    
}
 
$pdf->Output();
?>