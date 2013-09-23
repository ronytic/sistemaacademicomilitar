<?php $id_materia=$_POST['id_materia'];?>
<html>
<head>
<title>Sistema Integrado Academico - EMTE</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../../css/theme001.css" type="text/css" />
<link rel="stylesheet" href="../../css/templatf.css" type="text/css" />
<script language="JavaScript" src="../../js/JSCookMf.js" type="text/javascript"></script>
<script language="JavaScript" src="../../js/theme001.js" type="text/javascript"></script>

</head>

<body>
<table width="100%" class="menubar" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td class="menubackgr" style="padding-left:5px;">
				<div id="myMenuID"></div>
				<?php include ("menu.php");?>

	</td>
	<td class="menubackgr" align="right">
		<div id="wrapper1">
			
        <div></div>
        <div></div>		
      </div>
	</td>
	<td class="menubackgr" align="right" style="padding-right:5px;"> <a href="../logout.php?option=logout" style="color: #333333; font-weight: bold"> 
      Salir</a><strong>: <?php echo $USERNAME;?></strong> </td>
</tr>
</table>
</p>
<div align="center"></div>
<div align="center"></div>
<div align="center" class="centermain">
	
  <div class="main"> </div>
</div>


  
<div align="center" class="footer"> 
  <table width="85%">
    <tr> 
      <td height="27" align="center" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        Materia: <font size="2" face="Arial, Helvetica, sans-serif"> <?php echo "$id_materia"?> 
		<input name="id_materia" type="Text" disabled="disabled" id="id_materia" value="<?php echo $id_materia;?>" size="8" maxlength="8">
        Curso: <strong><font size="2" face="Arial, Helvetica, sans-serif"><?php echo "PRIMER AÑO MILITAR"; ?></font></strong></font></strong></font></td>
    </tr>
    <tr>
      <td align="center" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <?php 
$sum = 0;
$id_materia = $id_materia; 
$link = mysql_connect("localhost", "root", "");
mysql_select_db("emte", $link);
$result = mysql_query("SELECT * FROM alumno WHERE espe = '1ER. A.M.' ORDER BY paterno", $link);
if ($row = mysql_fetch_array($result)){
echo "<table width='85%' align='center' border = '0' BGCOLOR='#FFFFFF'> \n";
echo "<tr BGCOLOR='#000033'> \n";
echo "<td width='4%' align='center'><font color='#FFFFFF', size='2' face='Arial, Helvetica, sans-serif'><b>Nº</b></font></td> \n";
echo "<td width='8%' align='center'><font color='#FFFFFF', size='2' face='Arial, Helvetica, sans-serif'><b>C.I.</b></font></td> \n";
echo "<td width='10%' align='center'><font color='#FFFFFF', size='2' face='Arial, Helvetica, sans-serif'><b>Grado</b></font></td> \n";
echo "<td width='10%' align='center'><font color='#FFFFFF', size='2' face='Arial, Helvetica, sans-serif'><b>Arma</b></font></td> \n";
echo "<td width='20%' align='center'><font color='#FFFFFF', size='2' face='Arial, Helvetica, sans-serif'><b>Nombre</b></font></td> \n";
echo "<td width='20%' align='center'><font color='#FFFFFF', size='2' face='Arial, Helvetica, sans-serif'><b>Apellido Paterno</b></font></td> \n";
echo "<td width='18%' align='center'><font color='#FFFFFF', size='2' face='Arial, Helvetica, sans-serif'><b>Apellido Materno</b></font></td> \n";
echo "<td width='10%' align='center'><font color='#FFFFFF', size='2' face='Arial, Helvetica, sans-serif'><b>Evaluacion</b></font></td> \n";
echo "</tr> \n";
do {
$sum = $sum + 1;
echo "<tr> \n";
echo "<td align='center'>$sum</td> \n";
echo "<td align='center'>".$row["ci"]."</td> \n";
echo "<td align='center'>".$row["grado"]."</td> \n";
echo "<td align='center'>".$row["espe"]."</td> \n";
echo "<td align='center'>".$row["nombres"]."</td>\n";
echo "<td align='center'>".$row["paterno"]."</td>\n";
echo "<td align='center'>".$row["materno"]."</td>\n";
$ide=$row["ci"];
$cedula=$row["ci"];
$sql = mysql_query("SELECT * FROM primero WHERE (ci='$cedula' AND id_materia='$id_materia') AND (promedio='' OR promedio='0')", $link);
$existe = mysql_num_rows;
if($existe <> "0")
{
echo "<td align='center'><a href=\"update1.php?ide=$ide&id_materia=$id_materia\">Evaluar</a></td>\n";
echo "</tr> \n";
}
else
{
echo "<td align='center'><a href=\"update1.php?ide=$ide\">Evaluado*</a></td>\n";
echo "</tr> \n";
}
} while ($row = mysql_fetch_array($result));
echo "</table>";
} else {
echo "¡ La base de datos está vacia !";
}
?>
        </font></strong></font></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>

</body>
</html>
