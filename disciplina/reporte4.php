<?php
require_once('class.ezpdf.php');
$pdf =& new Cezpdf('LETTER');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

$conexion = mysql_connect("localhost", "root", "nea1178");
mysql_select_db("emte", $conexion);
$queEmp = "SELECT * FROM hdisciplina WHERE fecha >= '$inicio' AND fecha <= '$fin' ORDER BY fecha ASC";
$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				'grado'=>'<b>GRADO</b>',
				'espe'=>'<b>ARMA</b>',
				'nombres'=>'<b>NOMBRE</b>',
				'paterno'=>'<b>AP. PATERNO</b>',
				'fecha'=>'<b>FECHA</b>',
				'tipo'=>'<b>TIPO</b>',
				'sancion'=>'<b>SANCION</b>',
				'puntaje'=>'<b>PUNTAJE</b>',
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
$txttit2= "                            <u>ALUMNOS DE LA E.M.T.E SANCIONADOS</u>  \n";

$txttit3=  "                               Desde Fecha: $inicio     Hasta Fecha: $fin \n";

$pdf->ezText($txttit, 12);
$pdf->ezText($txttit1, 8);
$pdf->ezText($txttit2, 14);
$pdf->ezText($txttit3, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."", 10);
$pdf->ezText("<b>Usuario:</b> $USERNAME ", 10);
$pdf->ezStream();
?>