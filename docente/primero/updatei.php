<html>
<head>
<title>SAPCOMS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../css/theme001.css" type="text/css" />
<link rel="stylesheet" href="../css/templatf.css" type="text/css" />
<script language="JavaScript" src="../js/JSCookMf.js" type="text/javascript"></script>
<script language="JavaScript" src="../js/theme001.js" type="text/javascript"></script>

</head>

<body>
<div align="center"></div>
<div align="center"> 
  <?php include_once('banner.php'); ?>
</div>
<table width="100%" class="menubar" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td class="menubackgr" style="padding-left:5px;">
				<div id="myMenuID"></div>
				<?php include ("menu.php");?>

	</td>
	<td class="menubackgr" align="right">
		<div id="wrapper1">
			
        <div></div>
        <div>1 <img src="../img/users000.png" width="22" height="22"></div>		
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
  <form name="form1" method="post" action="updatexi.php">
    <table width="67%">
      <tr> 
        <td height="27" align="center" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
            Evaluacion Idioma del Observador</strong></font></p>
          <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">
           <?php 
$link = mysql_connect("localhost", "root","nea1178");
mysql_select_db("emte",$link);
$result = mysql_query("SELECT * FROM primero WHERE ci=$ide AND id_materia=$mat", $link);
$row = mysql_fetch_array($result);
$ci=$row["ci"];
$id_materi=$row["id_materia"];
?>
            </font></strong></font></p></td>
      </tr>
      <tr> 
        <td height="216" align="center" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
          </font></strong></font> 
          <table width="75%" border="0" cellspacing="0" cellpadding="0">
            <tr> 
              <td width="45%" height="35"> <div align="right"><font color="#000000"><strong>Cedula 
                  de Identidad :</strong></font></div></td>
              <td width="55%"><strong><font color="#00FF00"> 
                <input name="ci" type="hidden" id="ci" value="<?php echo $row["ci"];?>" size="10" maxlength="10">
                <input name="mision" type="hidden" id="mision" value="<?php echo $row["mision"];?>" size="10" maxlength="10">
                <input name="ci" type="Text" disabled="disabled" id="ci" value="<?php echo $row["ci"];?>" size="10" maxlength="10">
                <input name="mision" type="Text" disabled="disabled" id="mision" value="<?php echo $row["mision"]; ?>" size="20" maxlength="20">
                </font></strong></td>
            </tr>
            <tr> 
              <td height="33"> <div align="right"><font color="#000000"><strong>Nombre 
                  : </strong></font></div></td>
              <td><font color="#00FF00"><strong> 
                <input name="nombr" type="Text" disabled="disabled" id="nombr" value="<?php echo $row["nombr"];?>" size="25" maxlength="25">
                </strong></font></td>
            </tr>
            <tr> 
              <td height="32"> <div align="right"><font color="#000000"><strong>Apellido 
                  paterno : </strong></font></div></td>
              <td><font color="#00FF00"><strong> 
                <input name="pater" type="text" disabled="disabled" id="pater" value="<?php echo $row["pater"];?>" size="25" maxlength="25">
                </strong></font></td>
            </tr>
            <tr> 
              <td height="36"> <div align="right"><font color="#000000"><strong>Apellido 
                  materno :</strong></font></div></td>
              <td><font color="#00FF00"> 
                <input name="mater" type="Text" disabled="disabled" id="mater" value="<?php echo $row["mater"];?>" size="25" maxlength="25">
                </font></td>
            </tr>
            <tr> 
              <td height="33"><div align="right"><font color="#000000"><strong>Nota 
                  Evaluacion Idioma :</strong></font></div></td>
              <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
                <?php 
						$result = mysql_query("SELECT ingles FROM evaluacion WHERE ci=$ide", $link);
						$row = mysql_fetch_array($result);
						$examen = $row["ingles"];
						if ($examen == "0" OR $examen == "" OR $examen == "NULL")
						{
							echo "<input name='ingles' type='Text' id='ingles' size='3' maxlength='3'>";
						}
						else
						{
							echo "<input name='valor' type='Text' disabled='disabled' id='valor' value='$examen' size='3' maxlength='3'>";
							echo "<input name='ingles' type='hidden' id='ingles' value='$examen' size='3' maxlength='3'>";
						} 	
				 ?>
                </font><font size="2" face="Arial, Helvetica, sans-serif"><strong>%</strong></font> 
              </td>
            </tr>
            <tr align="center" valign="middle"> 
              <td height="45" colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="Submit" name="enviar1" onClick="this.form.action = 'updatexi'" value="Registrar Evaluacion">
                <strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                <input type="submit" name="enviar12" onClick="this.form.action = 'listarx.php'" value="Cancelar Registro">
                </font></strong></font></strong></font></strong></font></strong> 
                </font></strong></font></td>
            </tr>
          </table>
          
        </td>
      </tr>
    </table>
  </form>
  <p>&nbsp;</p>
</div>

</body>
</html>
