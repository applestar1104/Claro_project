<?php
//SHOW A DATABASE ON A PDF FILE

	require('fpdf.php');
    if (!class_exists('Xcrud')) {
       include('../../config/xcrud/xcrud.php');
    }
	$db = Xcrud_db::get_instance(); 

	$id_produto = $_GET['id_produto'];
	$query = "SELECT id_produto, nome_produto FROM docs_produtos WHERE id_produto = ".$id_produto;

	$db->query($query);
    $result = $db->result();
    $id =  $result[0]['id_produto'];
    $name =  $result[0]['nome_produto'];  

	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(40,10, $id);
	$pdf->Cell(40,10, $name);
	$pdf->Output();
?>
