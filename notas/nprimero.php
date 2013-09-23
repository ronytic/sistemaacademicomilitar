<html>
<head>
<title>Sistema Integrado Academico - EMTE</title>
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
  <table width="100%" height="229" align="center">
    <tr> 
      <td width="100%" height="60" colspan="3" valign="top"> <table width="100%">
          <tr> 
            <td width="2%">&nbsp;</td>
            <td width="87%"><table width="36%">
                <tr> 
                  <td><div align="center">DEPARTAMENTO VI EDUCACI&Oacute;N Y DOCTRINA</div></td>
                </tr>
                <tr> 
                  <td><div align="center">ESCUELA MILITAR D ETOPOGRAFIA</div></td>
                </tr>
                <tr>
                  <td><div align="center">&quot;Tcnl. Juan Ondarza&quot;</div></td>
                </tr>
                <tr> 
                  <td><div align="center"><u><strong>BOLIVIA</strong></u></div></td>
                </tr>
              </table></td>
            <td width="11%">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="15" colspan="3"> <div align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif"><u>PLANILLA 
          DE NOTAS DE LOS SS.AA. DE PRIMER A&Ntilde;O MILITAR</u></font></strong></div></td>
    </tr>
    <tr> 
      <td height="23" colspan="3" align="center"> <table width="95%">
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
          <table width="95%">
            <tr> 
              <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                  <?php
				  	$gestion = date("Y");
					$conexion = mysql_connect ("localhost","root","nea1178");
					mysql_select_db("emte",$conexion);
					$consulta = mysql_query("SELECT * FROM nprimero WHERE gestion = '$gestion' ORDER BY paterno ASC"); 
					if($row = mysql_fetch_array($consulta)) 
					{
					echo "<table width='95%' border='0' cellpadding='1' cellspacing='1' id='tblDatos' style='width:100%;'>";
  					echo "<tr align='Center' bgcolor='#000033'>"; 
					echo "<th width='10%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>GRADO</font></strong></th>";
					echo "<th width='20%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>NOMBRES Y APELLIDOS</font></strong></th>";     
					echo "<th width='7%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>TES-100</font></strong></th>";     
					echo "<th width='7%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>FIS-101</font></strong></th>";	      
					echo "<th width='7%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>GEO-102</font></strong></th>";	      
					echo "<th width='7%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>QUI-103</font></strong></th>";	      
					echo "<th width='7%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>ALG-104</font></strong></th>";	      
					echo "<th width='7%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>CCO-105</font></strong></th>";	      
					echo "<th width='7%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>REG-106</font></strong></th>";	      
					echo "<th width='7%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>CAL-107</font></strong></th>";	      
					echo "<th width='7%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>DHH-108</font></strong></th>";	      
					echo "<th width='7%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>GRN-109</font></strong></th>";	      
					echo "<th width='7%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>PROM</font></strong></th>";					                         
					echo "</tr>"; 
					echo "</tr>"; 
					do { 
					echo "<tr>";
					echo "<td align='left'> " .$row["grado"]. " " .$row["espe"]. " </td>";
					echo "<td align='left'> " .$row["nombres"]. " " .$row["paterno"]. "  " .$row["materno"]. "</td>";
					echo "<td align='center'> " .$row["TES-100"]. " </td>";
					echo "<td align='center'> " .$row["FIS-101"]. " </td>";
					echo "<td align='center'> " .$row["GEO-102"]. " </td>";
					echo "<td align='center'> " .$row["QUI-103"]. " </td>";
					echo "<td align='center'> " .$row["ALG-104"]. " </td>";
					echo "<td align='center'> " .$row["CCO-105"]. " </td>";
					echo "<td align='center'> " .$row["REG-106"]. " </td>";
					echo "<td align='center'> " .$row["CAL-107"]. " </td>";
					echo "<td align='center'> " .$row["DHH-108"]. " </td>";
					echo "<td align='center'> " .$row["GRN-109"]. " </td>";
					$sum = ($row["TES-100"] + $row["FIS-101"] + $row["GEO-102"] + $row["QUI-103"] + $row["ALG-104"] + $row["CCO-105"] + $row["REG-106"] + $row["CAL-107"] + $row["DHH-108"] + $row["GRN-109"])/10;
					echo "<td align='center'> $sum </td>";
					echo "</tr>";
					} while ($row = mysql_fetch_array($consulta)); 					
					echo "</table>";
					}
					else
					{
					echo "<p>&nbsp;</p>";
					echo "<b><div align='center'><strong>  </div></strong></a>"; 
					}					
			?>
                  </font></strong> </font></div></td>
            </tr>
          </table>
          <font size="2" face="Arial, Helvetica, sans-serif"> </font><font size="2" face="Arial, Helvetica, sans-serif"> 
          </font><font size="2" face="Arial, Helvetica, sans-serif"> </font></div></td>
    </tr>
    <tr> 
      <td height="20" colspan="3" align="center"> <table width="95%">
          <tr> 
            <td><div align="center"> 
                <hr>
                <font size="2" face="Arial, Helvetica, sans-serif"> </font></div></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<div align="center" class="centermain">
<div class="main"></div>
</div>
</body>
</html>
