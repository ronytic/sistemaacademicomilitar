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
<form name="Sample" method="post" action="buscar.php"> 
  <table width="90%" height="139" align="center">
    <tr> 
      <td height="15" colspan="3"> 
        <div align="center"></div></td>
    </tr>
    <tr> 
      <td width="26%" height="94" align="center" valign="top"> 
        <div align="center"> 
        </div></td>
      <td width="48%" align="center" valign="top"> <div align="center"> 
          <table width="93%">
            <tr> 
              <th height="21" colspan="3" valign="middle"> 
                <div align="center"></div></th>
            </tr>
            <tr> 
              <td height="21" colspan="3" valign="middle"><div align="center"> 
                </div></td>
            </tr>
            <tr> 
              <td width="45%" height="35" valign="middle"> <div align="right"> 
                  <table width="84%">
                    <tr> 
                      <td bgcolor="#FFFFFF"> <div align="right"><b><font color="#000000" size="2,5" face="Verdana, Arial, Helvetica, sans-serif">APELLIDO 
                          :</font></b></div></td>
                    </tr>
                  </table>
                  <b></b></div></td>
              <td width="31%" valign="middle"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
                <input name="buscar" type="text" id="id_estudiante2" size="25" maxlength="25">
                </font></b></td>
              <td width="24%" valign="top"><img src="../img/icono7.gif" width="74" height="91"></td>
            </tr>
            <tr valign="middle"> 
              <th height="29" colspan="3"> 
                <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                  <input name="igresar" type="submit" id="igresar2" value="Buscar">
                  <input name="limpiar" type="reset" id="limpiar3" value="Limpiar">
                  </font></strong></div></th>
            </tr>
          </table>
        </div></td>
      <td width="26%" valign="top">&nbsp;</td>
    </tr>
    <tr> 
      <td height="20" colspan="3">
<div align="center">
          <p><font size="2" face="Arial, Helvetica, sans-serif"> 
            <?php
					$conexion = mysql_connect ("localhost","root","nea1178");
					mysql_select_db("emte",$conexion);
					$consulta = mysql_query("SELECT * FROM alumno WHERE (paterno LIKE '$buscar%' OR paterno = '$buscar') AND '$buscar' <> '' ORDER BY paterno ASC"); 
					if($row = mysql_fetch_array($consulta)) 
{
	echo "<table width='95%' border='0' cellpadding='1' cellspacing='1' id='tblDatos' style='width:100%;'>";
  	echo "<tr align='Center' bgcolor='#000033'>"; 
	echo "<th width='15%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>C.I.</font></strong></td>";
	echo "<th width='20%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Grado</font></strong></th>";
	echo "<th width='20%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Especialidad</font></strong></th>";     
	echo "<th width='20%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Nombres</font></strong></th>";	                          
	echo "<th width='20%' align='Center'><strong><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Apellidos</font></strong></th>";
	echo "</tr>"; 
	echo "</tr>"; 
	do { 
			echo "<tr>";
			echo "<td align='Center'>" .$row["ci"]. " </td>";  
			echo "<td align='Center'> " .$row["grado"]. " </td>";
			echo "<td align='Center'> " .$row["espe"]. " </td>";
			echo "<td align='Center'> " .$row["nombres"]. " </td>";
			echo "<td align='Center'> " .$row["paterno"]. " " .$row["materno"]. " </td>";
			echo "</tr>";
	     } while ($row = mysql_fetch_array($consulta)); 
		 					
	echo "</table>";
	echo "<p>&nbsp;</p>";
	echo "<tr>";
    echo "</tr>";
}
else
{
	echo "<p>&nbsp;</p>";
	echo "<b><div align='center'><strong>  </div></strong></a>"; 
}
					
?>
            </font></p>
          </div></td>
    </tr>
  </table>
</form>
<div align="center" class="centermain">
	<div class="main">

  </div>
</div>


  
<div align="center" class="footer"> 
  <table width="99%" border="0">
	<tr>
		<td align="center">
			<div align="center"></div>
	  </td>
	</tr>
  </table>
</div>

</body>
</html>
