<?php
require_once('class.ezpdf.php');
$pdf =& new Cezpdf('LETTER');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

$conexion = mysql_connect("localhost", "root", "nea1178");
mysql_select_db("emte", $conexion);
$queEmp = "SELECT * FROM alumno WHERE curso = 'alumno' AND espe = '3ER. A.M.' ORDER BY paterno ASC";
$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				'ci'=>'<b>C.I.</b>',
				'grado'=>'<b>GRADO</b>',
				'espe'=>'<b>ARMA/ESPEC.</b>',
				'nombres'=>'<b>NOMBRES</b>',
				'paterno'=>'<b>AP. PATERNO</b>',
				'materno'=>'<b>AP. MATERNO</b>',
				);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);
$txttit = "<b>DEPARTAMENTO VI EDUCACION Y DOCTRINA</b>\n";
$txttit.= "        Escuela Militar de Topografia del Ejercito\n";
$txttit.= "                        Tcnl. Juan Ondarza L.\n";
$txttit.= "                                  <u>BOLIVIA</u> \n";
$txttit2= "               <u>RELACION NOMINAL DE ALUMNOS DE 3ER. AÑO MILITAR</u>  \n";

$pdf->ezText($txttit, 12);
$pdf->ezText($txttit1, 8);
$pdf->ezText($txttit2, 14);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."", 10);
$pdf->ezText("<b>Usuario:</b> $USERNAME ", 10);
$pdf->ezStream();
?>