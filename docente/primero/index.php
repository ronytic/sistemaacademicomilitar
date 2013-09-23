
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sistema Integrado Academico - EMTE</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../../css/theme001.css" type="text/css" />
<link rel="stylesheet" href="../../css/templatf.css" type="text/css" />
<script language="JavaScript" src="../../js/JSCookMf.js" type="text/javascript"></script>
<script language="JavaScript" src="../../js/theme001.js" type="text/javascript"></script>

</head>

<body>
<div align="center"></div>
<div align="center"> </div>
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
	<td class="menubackgr" align="right" style="padding-right:5px;"> <a href="<?php echo ($_SESSION['nil_acc']==1)?"javascript:self.close()":"../"; ?>" style="color: #333333; font-weight: bold"> 
      Terminar Sesion</a><strong> 
      <?php  $user = ucfirst($_SESSION['usu']);
	echo $user; ?>
      </strong> </td>
</tr>
</table>
</p>
<div align="center"></div>
<div align="center"></div>
<div align="center" class="centermain">
	
  <div class="main"> </div>
</div>

<div align="center" class="footer"> 
  <form action="listar1.php" method="post" name="form1" id="form1">
    <table width="90%" height="139" align="center">
      <tr> 
        <td height="15" colspan="3"> <div align="center"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong>Registrar 
            Evaluacion </strong></font></div></td>
      </tr>
      <tr> 
        <td width="26%" height="94" align="center" valign="top"> <div align="center"> 
          </div></td>
        <td width="48%" align="center" valign="top"> <div align="center"> 
            <table width="67%">
              <tr> 
                <td width="45%" height="35" valign="middle"> <div align="right"> 
                    <table width="100%">
                      <tr> 
                        <td bgcolor="#FFFFFF"> <div align="right"><b><font color="#000000" size="2,5" face="Verdana, Arial, Helvetica, sans-serif">Materias 1er. A&ntilde;o
                        :</font></b></div></td>
                      </tr>
                    </table>
                    <b></b></div></td>
                <td width="30%" valign="middle"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
                  <?php 
																							$gestion = date("Y");
																							@$conexion = mysql_connect ("localhost","root","");
																							mysql_select_db("emte",$conexion);
																							$consulta = mysql_query("SELECT DISTINCTROW id_materia FROM materia WHERE curso = 'PRIMERO' ORDER BY id_materia ASC"); 
																							echo '<select name="id_materia" id="id_materia">';
																							echo '<option selected="selected">ELIJA MATERIA</option>';
																							while ($row = mysql_fetch_array($consulta)){
																							$valor = $row["id_materia"];
																							//$mis=substr($valor,-4);
																							//if ($mis == $gestion)
																							//{
																								echo "<option value='$row[id_materia]'>".$row["id_materia"].'</option>';
																							//}
																							//else
																							//{
																							//}
																							}
																							echo '</select>'; 	
																						 ?>
                  </font></b></td>
                <td width="25%" align="center" valign="top"> <div align="left"></div></td>
              </tr>
              <tr valign="middle"> 
                <th height="24" colspan="3"> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="igresar" type="submit" id="igresar2" value="Generar Lista" />
                    <input name="limpiar" type="reset" id="limpiar3" value="Limpiar" />
                    </font></strong></div></th>
              </tr>
            </table>
          </div></td>
        <td width="26%" valign="top">&nbsp;</td>
      </tr>
    </table>
  </form>
</div>

</body>
</html>
