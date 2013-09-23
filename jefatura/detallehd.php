<html>
<head>
<title>Sistema de Inventarios de Almacen</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../css/theme001.css" type="text/css" />
<link rel="stylesheet" href="../css/templatf.css" type="text/css" />
<script language="JavaScript" src="../js/JSCookMf.js" type="text/javascript"></script>
<script language="JavaScript" src="../js/theme001.js" type="text/javascript"></script>

</head>

<body>
<div align="center"></div>
<table width="100%" class="menubar" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td class="menubackgr" style="padding-left:5px;">
				<div id="myMenuID"></div>
				<? include ("menu.php");?>

	</td>
	<td class="menubackgr" align="right">
		<div id="wrapper1">
			
        <div></div>
        <div>1 <img src="../img/users000.png" width="22" height="22"></div>		
      </div>
	</td>
	<td class="menubackgr" align="right" style="padding-right:5px;"> <a href="../logout.php?option=logout" style="color: #333333; font-weight: bold"> 
      Salir</a><strong>: <? echo $USERNAME;?></strong> </td>
</tr>
</table>
</p>
<form name="Sample" method="post" action="detalle.php">
  <table width="77%" height="475" align="center">
    <tr> 
      <td width="100%" height="60" colspan="3" valign="top"> <table width="100%">
          <tr> 
            <td width="9%">&nbsp;</td>
            <td width="73%"><table width="42%">
                <tr> 
                  <td><div align="center">DEPARTAMENTO VI EDUCACION Y DOCTRINA</div></td>
                </tr>
                <tr> 
                  <td><div align="center">Escuela Militar de Topografia del Ejercito</div></td>
                </tr>
                <tr> 
                  <td><div align="center">&quot;Tcnl. Juan Ondarza L.&quot;</div></td>
                </tr>
                <tr> 
                  <td><div align="center"><u><strong>BOLIVIA</strong></u></div></td>
                </tr>
              </table></td>
            <td width="18%">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="15" colspan="3"> <div align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif"><u>HISTORIAL 
          DE DISCIPLINA</u></font></strong></div></td>
    </tr>
    <tr> 
      <td height="23" colspan="3" align="center"> <table width="82%">
          <tr> 
            <td><div align="center"> 
                <hr>
                <font size="2" face="Arial, Helvetica, sans-serif"> </font></div></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="20" colspan="3"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"> 
          </font> 
          <table width="82%">
            <tr> 
              <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"> 
                  <?php
					$conexion = mysql_connect ("localhost","root","nea1178");
					mysql_select_db("emte",$conexion);
					$consulta = mysql_query("SELECT * FROM hdisciplina WHERE ci = '$buscar'"); 
					if($row = mysql_fetch_array($consulta)) 
					{
					echo "<table width='95%' border='0' cellpadding='1' cellspacing='1' id='tblDatos' style='width:100%;'>";
  					echo "<tr align='Center'>"; 
					echo "<th width='15%' align='left'><strong><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>Datos Personales : ".$row["grado"]." ".$row["espe"]." ".$row["nombres"]." ".$row["paterno"]." ".$row["materno"]."</font></strong></td>";	 
					echo "</tr>"; 
					echo "<tr align='Center'>"; 
					echo "<th width='15%' align='left'><strong><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>Cedula Identidad : ".$row["ci"]."</font></strong></td>";	 
					echo "</tr>"; 
					echo "</table>";
					}
					else
					{
					echo "<p>&nbsp;</p>";
					echo "<b><div align='center'><strong>  </div></strong></a>"; 
					}					
			?>
                  </font></div></td>
            </tr>
          </table>
          <font size="2" face="Arial, Helvetica, sans-serif"> </font><font size="2" face="Arial, Helvetica, sans-serif"> 
          </font><font size="2" face="Arial, Helvetica, sans-serif"> </font></div></td>
    </tr>
    <tr> 
      <td height="20" colspan="3" align="center"> <table width="82%">
          <tr> 
            <td><div align="center"> 
                <hr>
                <font size="2" face="Arial, Helvetica, sans-serif"> </font></div></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="20" colspan="3"><div align="center"> 
          <table width="82%">
            <tr> 
              <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><u>Curso 
                  de Pregrado - Alumno</u></font></strong></div></td>
            </tr>
            <tr> 
              <td><hr></td>
            </tr>
            <tr> 
              <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                  <?php
					$consulta = mysql_query("SELECT * FROM hdisciplina WHERE ci = '$buscar' AND curso = 'alumno'"); 
					if($row = mysql_fetch_array($consulta)) 
					{
					echo "<table width='95%' border='0' cellpadding='1' cellspacing='1' id='tblDatos' style='width:100%;'>";
  					echo "<tr align='Center' bgcolor='#000033'>"; 
					echo "<th width='10%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Fecha</font></strong></td>";
					echo "<th width='10%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Nº Memo.</font></strong></th>";
					echo "<th width='15%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Sancion Impuesta</font></strong></th>";     
					echo "<th width='25%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Grado</font></strong></th>";	                          
					echo "<th width='10%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Gestion</font></strong></th>";	
					echo "<th width='10%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Puntaje Perdido</font></strong></th>";
					echo "</tr>"; 
					echo "</tr>"; 
					do { 
								
					echo "<tr>";
					echo "<td align='Center'>" .$row["fecha"]. " </td>";  
					echo "<td align='Center'> " .$row["memo"]. " </td>";
					echo "<td align='Center'> " .$row["sancion"]. " " .$row["tipo"]. " </td>";
					echo "<td align='Left'> " .$row["grado"]. " </td>";
					echo "<td align='Center'> " .$row["gestion"]. " </td>";
					echo "<td align='Center'> " .$row["puntaje"]. " </td>";
					echo "</tr>"; 
					$punto = $row["puntaje"];
					$total = $total + $punto;
	     			} while ($row = mysql_fetch_array($consulta)); 					
					echo "</table>";
					echo "<table width='95%' border='0' cellpadding='1' cellspacing='1' id='tblDatos' style='width:100%;'>";
  					echo "<tr align='Center' bgcolor='#000033'>"; 
					echo "<td width='78%' align='right'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>TOTAL PUNTOS PERDIDOS :</font></strong></td>";
					echo "<td width='11%' align='center' bgcolor='#FFFFFF'><strong><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>  ".$total." </font></strong></td>"; 
					echo "</tr>"; 			
					echo "</table>";
					}
					else
					{
					echo "<b><div align='center'><strong> No Realizo el Curso Hasta la Fecha</div></strong></a>"; 
					}					
			?>
                  </font></strong></div></td>
            </tr>
          </table>
          <font size="2" face="Arial, Helvetica, sans-serif"> </font></div></td>
    </tr>
    <tr> 
      <td height="18" colspan="3"><table width="82%" align="center">
          <tr> 
            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><u>Curso 
                de Posgrado- Alumno del Basico</u></font></strong></div></td>
          </tr>
          <tr> 
            <td><hr></td>
          </tr>
          <tr> 
            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                <?php
					$consulta = mysql_query("SELECT * FROM hdisciplina WHERE ci = '$buscar' AND curso = 'basico'"); 
					if($row = mysql_fetch_array($consulta)) 
					{
					echo "<table width='95%' border='0' cellpadding='1' cellspacing='1' id='tblDatos' style='width:100%;'>";
  					echo "<tr align='Center' bgcolor='#000033'>"; 
					echo "<th width='10%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Fecha</font></strong></td>";
					echo "<th width='10%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Nº Memo.</font></strong></th>";
					echo "<th width='15%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Sancion Impuesta</font></strong></th>";     
					echo "<th width='25%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Grado</font></strong></th>";	                          
					echo "<th width='10%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Gestion</font></strong></th>";	
					echo "<th width='10%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Puntaje Perdido</font></strong></th>";
					echo "</tr>"; 
					echo "</tr>"; 
					do { 
								
					echo "<tr>";
					echo "<td align='Center'>" .$row["fecha"]. " </td>";  
					echo "<td align='Center'> " .$row["memo"]. " </td>";
					echo "<td align='Center'> " .$row["sancion"]. " " .$row["tipo"]. " </td>";
					echo "<td align='Left'> " .$row["grado"]. " </td>";
					echo "<td align='Center'> " .$row["gestion"]. " </td>";
					echo "<td align='Center'> " .$row["puntaje"]. " </td>";
					echo "</tr>"; 
					$puntob = $row["puntaje"];
					$totalb = $totalb + $puntob;
	     			} while ($row = mysql_fetch_array($consulta)); 					
					echo "</table>";
					echo "<table width='95%' border='0' cellpadding='1' cellspacing='1' id='tblDatos' style='width:100%;'>";
  					echo "<tr align='Center' bgcolor='#000033'>"; 
					echo "<td width='78%' align='right'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>TOTAL PUNTOS PERDIDOS :</font></strong></td>";
					echo "<td width='11%' align='center' bgcolor='#FFFFFF'><strong><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>  ".$totalb." </font></strong></td>"; 
					echo "</tr>"; 			
					echo "</table>";
					}
					else
					{
					echo "<b><div align='center'><strong> No Realizo el Curso Hasta la Fecha</div></strong></a>"; 
					}					
			?>
                </font></strong></div></td>
          </tr>
        </table>
        <div align="center"></div></td>
    </tr>
    <tr> 
      <td height="18" colspan="3"><table width="82%" align="center">
          <tr> 
            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><u>Curso 
                de Posgrado - Alumno del Avanzado</u></font></strong></div></td>
          </tr>
          <tr> 
            <td><hr></td>
          </tr>
          <tr> 
            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                <?php
					$consulta = mysql_query("SELECT * FROM hdisciplina WHERE ci = '$buscar' AND curso = 'avanzado'"); 
					if($row = mysql_fetch_array($consulta)) 
					{
					echo "<table width='95%' border='0' cellpadding='1' cellspacing='1' id='tblDatos' style='width:100%;'>";
  					echo "<tr align='Center' bgcolor='#000033'>"; 
					echo "<th width='10%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Fecha</font></strong></td>";
					echo "<th width='10%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Nº Memo.</font></strong></th>";
					echo "<th width='15%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Sancion Impuesta</font></strong></th>";     
					echo "<th width='25%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Grado</font></strong></th>";	                          
					echo "<th width='10%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Gestion</font></strong></th>";	
					echo "<th width='10%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Puntaje Perdido</font></strong></th>";
					echo "</tr>"; 
					echo "</tr>"; 
					do { 
								
					echo "<tr>";
					echo "<td align='Center'>" .$row["fecha"]. " </td>";  
					echo "<td align='Center'> " .$row["memo"]. " </td>";
					echo "<td align='Center'> " .$row["sancion"]. " " .$row["tipo"]. " </td>";
					echo "<td align='Left'> " .$row["grado"]. " </td>";
					echo "<td align='Center'> " .$row["gestion"]. " </td>";
					echo "<td align='Center'> " .$row["puntaje"]. " </td>";
					echo "</tr>"; 
					$puntoa = $row["puntaje"];
					$totala = $totala + $puntoa;
	     			} while ($row = mysql_fetch_array($consulta)); 					
					echo "</table>";
					echo "<table width='95%' border='0' cellpadding='1' cellspacing='1' id='tblDatos' style='width:100%;'>";
  					echo "<tr align='Center' bgcolor='#000033'>"; 
					echo "<td width='78%' align='right'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>TOTAL PUNTOS PERDIDOS :</font></strong></td>";
					echo "<td width='11%' align='center' bgcolor='#FFFFFF'><strong><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>  ".$totala." </font></strong></td>"; 
					echo "</tr>"; 			
					echo "</table>";
					}
					else
					{
					echo "<b><div align='center'><strong> No Realizo el Curso Hasta la Fecha</div></strong></a>"; 
					}					
			?>
                </font></strong></div></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<div align="center" class="centermain"> 
  <div class="main"> </div>
</div>
<div align="center" class="footer"><a href="historial.php">Volver</a></div>

</body>
</html>
