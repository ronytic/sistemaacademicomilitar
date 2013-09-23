<?
	$ano = date("Y-m-d");
?>
<?
	include_once ("auth1.php");
	include_once ("../authconfig.php");
	//include_once ("../check.php");
	
	$user = new auth();
	
	$connection = mysql_connect("localhost","root","nea1178"); //$dbhost, $dbusername, $dbpass
	$SelectedDB = mysql_select_db("emte",$connection);  //$dbname
	$listteams = mysql_query("SELECT * FROM disciplina");
	
?>
<?

if (isset($_POST['action'])) 
{
	$id_dis = $_POST['id_dis'];
	$ci = $_POST['ci'];
	$fecha = $ano;
	$memo = $_POST['memo'];
	$falta = $_POST['falta'];
	$sancion = $_POST['sancion'];
	$tipo = $_POST['tipo'];
	$impuesto = $_POST['impuesto'];
	$act = "";
}
elseif (isset($_GET['act']))
{
	$act = $_GET['act'];
	$action = "";
}
else
{
	$id_dis = "";
	$ci = "";
	$fecha = $ano;
	$memo = "";	
	$falta = "";
	$sancion = "";
	$tipo = "";
	$impuesto = "";
	$act = "";
}

$message = "";

// ADD USER
if ($action == "Add") {
		if ($tipo == "PLANTON" AND $sancion == "1 HORA")
		{
			$puntaje = 1;
		}else if ($tipo == "PLANTON" AND $sancion == "2 HORAS")
		{
			$puntaje = 2;
		}else if ($tipo == "TROTE" AND $sancion == "1 HORA")
		{
			$puntaje = 2;
		}else if ($tipo == "TROTE" AND $sancion == "2 HORAS")
		{
			$puntaje = 4;
		}else if ($tipo == "ARRESTO" AND $sancion == "1/2 DOMINGO")
		{
			$puntaje = 5;
		}else if ($tipo == "ARRESTO" AND $sancion == "1 DOMINGO")
		{
			$puntaje = 10;
		}else
		{
			$puntaje = 0;
		}
	$situation = $user->add_user($id_dis, $ci, $fecha, $memo, $falta, $sancion, $puntaje, $tipo, $impuesto);
	
	if ($situation == "blank id_dis") {
		$message = "Introduzca Codigo";
		$action = "";
	}
	elseif ($situation == "id_dis exists") {
		$message = "El Codigo existe en la base de datos";
		$action = "";
	}
	elseif ($situation == 1) {
		$message = "Sancion Registrada Correctamente";
	}
	else {
		$message = "";
	}
}

// DELETE USER
if ($action=="Delete") {
	// Delete record in authuser table
	$delete = $user->delete_user($ci);
	
	// Delete record in signup table
	$deletesignup =  mysql_query("DELETE FROM alumno WHERE ci='$ci'");

	if ($delete && $deletesignup) {
		$message = $delete;
	}
	else {
	$ci = "";
	$grado = "";
	$espe = "";	
	$nombres = "";
	$paterno = "";
	$materno = "";
	$fec_nac = "";
	$lugar = "";
	$direccion = "";
	$fono = "";
	$celular = "";
	$gsanguineo = "";
	$gestion = $ano;
	$curso = $var;
			
		$message = "Eliminado de la Base de Datos.";
	}
}

// MODIFY USER
if ($action == "Modify") {
	$update = $user->modify_user($ci, $grado, $espe, $nombres, $paterno, $materno, $fec_nac, $lugar, $direccion, $fono, $celular, $gsanguineo, $gestion, $curso);

	if ($update==1) {
		$message = "Datos actualizados del Alumno";
	}
	elseif ($update == "blank ci") {
		$message = "introduzca el C.I. del Alumno";
		$action = "";
	}
	else {
		$message = "";
	}
}

// EDIT USER (accessed from clicking on username links)
if ($act == "Edit") 
{
    $ci = $_GET['ci'];
	$listusers = mysql_query("SELECT * 	FROM alumno WHERE ci='$ci'");
	$rows = mysql_fetch_array($listusers);
	
	$ci = $rows["ci"];
	$grado = $rows["grado"];
	$espe = $rows["espe"];
	$nombres = $rows["nombres"];
	$paterno = $rows["paterno"];
	$materno = $rows["materno"];
	$fec_nac = $rows["fec_nac"];
	$lugar = $rows["lugar"];
	$direccion = $rows["direccion"];
	$fono = $rows["fono"];
	$celular = $rows["celular"];
	$gsanguineo = $rows["gsanguineo"];
	$gestion = $ano;
	$curso = $var;
	$message = "Modificar datos del Alumno";
}

// CLEAR FIELDS
if ($action == "Add New") {
	
	$id_dis = "";
	$ci = "";
	$fecha = $ano;
	$memo = "";	
	$falta = "";
	$sancion = "";
	$tipo = "";
	$impuesto = "";
	$act = "";
	$message = "Introducir datos de la Sancion";
}

// 
if ($action == "Limpiar") {
	
	$id_dis = "";
	$ci = "";
	$fecha = $ano;
	$memo = "";	
	$falta = "";
	$sancion = "";
	$tipo = "";
	$impuesto = "";
	$act = "";
	$message = "Formulario sin Datos de Sancion";
}
?>
<html>
<head>
<title>Sistema Integrado Academico - EMTE</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../css/theme001.css" type="text/css" />
<link rel="stylesheet" href="../css/templatf.css" type="text/css" />
<script language="JavaScript" src="../js/JSCookMf.js" type="text/javascript"></script>
<script language="JavaScript" src="../js/theme001.js" type="text/javascript"></script>
<script language="JavaScript" src="calendario/javascripts.js"></script></head>

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
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
  <tr valign="top">
    <td width="58%" align="right"> 
      <form name="fcalen" method="Post" action="registro.php">
        <table width="69%">
          <tr>
            <td width="25%" align="right" valign="top">&nbsp;</td>
            <td width="75%"><table width="345" height="259" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" bgcolor="#CCCCCC">
                <tr> 
                  <td width="350" height="257" valign="top"> 
                    <table width="90%" bordercolor="#3399CC" bgcolor="#FFFFFF">
                      <tr align="center" valign="top" bgcolor="#C4D5E6"> 
                        <th height="21" colspan="2"> <table width="345" height="34" bgcolor="#FFFFFF">
                            <tr> 
                              <td> <div align="center"><font size="5"><u></u></font></div></td>
                            </tr>
                          </table></th>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">*Codigo 
                            :</font></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
                          <?   
			  	if (($action == "Modify") || ($action=="Add") || ($act=="Edit")) {
					print "<input type=\"hidden\" name=\"id_dis\" value=\"$id_dis\">"; 
					print "<font face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#000000\" size=\"2\">$id_dis</font>";
				}
				else {	
					print "<input type=\"text\" disabled=\"disabled\" name=\"id_dis\" size=\"15\" maxlength=\"7\" value=\"$id_dis\">"; 
				}
				
			  ?>
                          </font><font color="#000000">&nbsp; </font><font color="#000000">&nbsp;</font><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; 
                          </font><font color="#000000">&nbsp; </font></td>
                      </tr>
                      <tr> 
                        <td width="39%" height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">*C.I. 
                            :</font></strong></font></div></td>
                        <td width="61%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<input type=\"text\" name=\"ci\" size=\"10\" maxlength=\"7\" value=\"$ci\">"; ?> 
                          </font><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; 
                          </font><font color="#000000">&nbsp;</font><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; 
                          </font><font color="#000000">&nbsp; </font></td>
                      </tr>
                      <tr> 
                        <td height="26" bgcolor="#FFFFFF"> 
                          <div align="right"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">* 
                            N&ordm; Memo :</font></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<input type=\"text\" name=\"memo\" size=\"10\" maxlength=\"7\" value=\"$memo\">"; ?></font></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">* 
                            Tipo :</font></strong></font></div></td>
                        <td><select name="tipo" id="tipo">
                            <option>LLAMADA DE REFLEXION</option>
                            <option>LLAMADA DE ATENCION</option>
                            <option>ARRESTO</option>
                            <option>TROTE</option>
                            <option>PLANTON</option>
                          </select></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">* 
                            Sancion :</font></strong></font></div></td>
                        <td><font color="#000000"> 
                          <select name="sancion" id="sancion">
                            <option>SIN PUNTAJE</option>
                            <option>24 HORAS</option>
                            <option>48 HORAS</option>
                            <option>72 HORAS</option>
                            <option>7 DIAS</option>
                            <option>1/2 DOMINGO</option>
                            <option>1 DOMINGO</option>
                            <option>1 HORA</option>
                            <option>2 HORAS</option>
                          </select>
                          </font></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><strong><strong><font size="2" face="Arial, Helvetica, sans-serif">Fecha 
                            :</font></strong></strong></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<input type=\"text\" disabled=\"disabled\" name=\"gestion\" size=\"15\" maxlength=\"5\" value=\"$ano\">"; ?></font><font color="#000000">&nbsp; 
                          </font></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">* 
                            Falta Cometida :</font></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<textarea name=\"falta\" cols=\"25\" rows=\"3\" id=\"$falta\">$falta</textarea>"; ?></font></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><strong><font size="2" face="Arial, Helvetica, sans-serif">* 
                            Impuesta Por :</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                            </font></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<input type=\"text\" name=\"impuesto\" size=\"30\" maxlength=\"30\" value=\"$impuesto\">"; ?></font><font color="#000000">&nbsp; 
                          </font></td>
                      </tr>
                      <tr> 
                        <th height="36" colspan="2" valign="top"> <table width="99%" border="0" align="center">
                            <tr> 
                              <td width="97%" height="21" bgcolor="#FFFFFF"> <div align="center"><font size="2"><font size="2"><font size="2"><font face="Verdana, Arial, Helvetica, sans-serif"> 
                                  <?
					
				if (($action=="Add") || ($action == "Modify") || ($act=="Edit") || ($act=="Limpiar")) {
					print "<input type=\"submit\" name=\"action\" value=\"Add New\"> ";
					print "<input type=\"submit\" name=\"action\" value=\"Limpiar\"> ";
				}
				else {
					print "<input type=\"submit\" name=\"action\" value=\"Add\"> ";
					print "<input type=\"submit\" name=\"action\" value=\"Limpiar\"> ";
                }
				
				?>
                                  </font></font></font></font><font color="#000000">&nbsp; 
                                  </font></div></td>
                            </tr>
                          </table></th>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
          </tr>
        </table>
      </form>
      <table width="62%">
        <tr>
          <td><table width="88%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
              <tr> 
                <td bgcolor="#000033"> <div align="center"><b><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Mensaje:</font></b></div></td>
              </tr>
              <tr> 
                <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#000033"> 
                  <?
		  	if ($message) {
			 	print $message;
		  	}
			else {
				print "Sistema Integrado Academico EMTE.";
			}
		  ?>
                  </font></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <p>&nbsp;</p></td>
    <td width="42%" align="left" valign="middle">&nbsp; </td>
  </tr>
</table>
<br />

<div align="center" class="centermain">
  <div class="main"></div>
</div>


  
</body>
</html>
