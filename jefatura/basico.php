<?
	$ano = date("Y");
	$var = "basico";
?>
<?
	include_once ("auth1.php");
	include_once ("../authconfig.php");
	//include_once ("../check.php");
	
	$user = new auth();
	
	$connection = mysql_connect("localhost","root","nea1178"); //$dbhost, $dbusername, $dbpass
	$SelectedDB = mysql_select_db("emte",$connection);  //$dbname
	$listteams = mysql_query("SELECT * FROM alumno");
	
?>
<?

if (isset($_POST['action'])) 
{
	$ci = $_POST['ci'];
	$grado = $_POST['grado'];
	$espe = $_POST['espe'];
	$nombres = $_POST['nombres'];
	$paterno = $_POST['paterno'];
	$materno = $_POST['materno'];
	$fec_nac = $_POST['fec_nac'];
	$lugar = $_POST['lugar'];
	$direccion = $_POST['direccion'];
	$fono = $_POST['fono'];
	$celular = $_POST['celular'];
	$gsanguineo = $_POST['gsanguineo'];
	$gestion = $ano;
	$curso = $var;
	$act = "";
}
elseif (isset($_GET['act']))
{
	$act = $_GET['act'];
	$action = "";
}
else
{
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
	$act = "";
}

$message = "";

// ADD USER
if ($action == "Add") {
	$situation = $user->add_user($ci, $grado, $espe, $nombres, $paterno, $materno, $fec_nac, $lugar, $direccion, $fono, $celular, $gsanguineo, $gestion, $curso);
	
	if ($situation == "blank ci") {
		$message = "Introduzca Cedula de Identidad";
		$action = "";
	}
	elseif ($situation == "ci exists") {
		$message = "El C.I. existe en la base de datos";
		$action = "";
	}
	elseif ($situation == 1) {
		$message = "Alumno Registrado Correctamente";
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
	$act = "";
	$message = "Introducir datos del Alumno";
}

// 
if ($action == "Limpiar") {
	
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
	$act = "";
	$message = "Formulario sin Datos del Alumno";
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
    <td width="41%" align="center"> 
      <form name="fcalen" method="Post" action="basico.php">
        <table width="52%">
          <tr>
            <td width="19%" align="right" valign="top">&nbsp;</td>
            <td width="81%"><table width="345" height="273" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" bgcolor="#CCCCCC">
                <tr> 
                  <td width="350" height="271" valign="top"> 
                    <table width="80%" bordercolor="#3399CC" bgcolor="#FFFFFF">
                      <tr align="center" valign="top" bgcolor="#C4D5E6"> 
                        <th height="21" colspan="2"> <table width="345" height="34" bgcolor="#FFFFFF">
                            <tr> 
                              <td> <div align="center"><font size="5"><u></u></font></div></td>
                            </tr>
                          </table></th>
                      </tr>
                      <tr> 
                        <td width="45%" height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">*C.I. 
                            :</font></strong></font></div></td>
                        <td width="55%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
                          <?   
			  	if (($action == "Modify") || ($action=="Add") || ($act=="Edit")) {
					print "<input type=\"hidden\" name=\"ci\" value=\"$ci\">"; 
					print "<font face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#000000\" size=\"2\">$ci</font>";
				}
				else {	
					print "<input type=\"text\" name=\"ci\" size=\"15\" maxlength=\"7\" value=\"$ci\">"; 
				}
				
			  ?>
                          </font><font color="#000000">&nbsp; </font><font color="#000000">&nbsp;</font><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; 
                          </font><font color="#000000">&nbsp; </font></td>
                      </tr>
                      <tr> 
                        <td height="26" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">* 
                            Grado :</font></strong></font></div></td>
                        <td><select name="grado" id="grado">
                            <option selected>SGTO. 1RO.</option>
                          </select>
                          <font color="#000000">&nbsp; </font></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">* 
                            Especialidad :</font></strong></font></div></td>
                        <td><select name="espe" id="espe">
                            <option selected>TGRAFO.</option>
                          </select></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">* 
                            Nombres :</font></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<input type=\"text\" name=\"nombres\" size=\"25\" maxlength=\"25\" value=\"$nombres\">"; ?></font><font color="#000000">&nbsp; 
                          </font></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">* 
                            Ap. Paterno :</font></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<input type=\"text\" name=\"paterno\" size=\"25\" maxlength=\"25\" value=\"$paterno\">"; ?></font><font color="#000000">&nbsp; 
                          </font></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">* 
                            Ap.Materno :</font></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<input type=\"text\" name=\"materno\" size=\"25\" maxlength=\"25\" value=\"$materno\">"; ?></font></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><strong><font size="2" face="Arial, Helvetica, sans-serif">* 
                            Fecha Nacimiento :</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                            </font></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<input type=\"text\" name=\"fec_nac\" size=\"15\" maxlength=\"10\" value=\"$fec_nac\">"; ?></font><font color="#000000">&nbsp; 
                          </font></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><font color="#000000"><strong><strong><font size="2" face="Arial, Helvetica, sans-serif">*</font></strong></strong></font> 
                            <font size="2" face="Arial, Helvetica, sans-serif">Departamento 
                            :</font></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<input type=\"text\" name=\"lugar\" size=\"15\" maxlength=\"25\" value=\"$lugar\">"; ?></font><font color="#000000">&nbsp;<strong></strong></font></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><font color="#000000"><strong><strong><font size="2" face="Arial, Helvetica, sans-serif">*</font></strong></strong></font> 
                            <font size="2" face="Arial, Helvetica, sans-serif">Direccion 
                            :</font></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<textarea name=\"direccion\" cols=\"20\" rows=\"2\" id=\"$direccion\">$direccion</textarea>"; ?></font></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><strong><strong><font size="2" face="Arial, Helvetica, sans-serif">Telefono 
                            :</font></strong></strong></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
                          <? print "<input type=\"text\" name=\"fono\" size=\"15\" maxlength=\"8\" value=\"$fono\">"; ?></font></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><font color="#000000"><strong><strong><font size="2" face="Arial, Helvetica, sans-serif">*</font></strong></strong></font> 
                            <font size="2" face="Arial, Helvetica, sans-serif">Celular 
                            :</font></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<input type=\"text\" name=\"celular\" size=\"15\" maxlength=\"8\" value=\"$celular\">"; ?></font><font color="#000000">&nbsp; 
                          </font></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><strong><strong><font size="2" face="Arial, Helvetica, sans-serif">Grupo 
                            Sanguineo :</font></strong></strong></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<input type=\"text\" name=\"gsanguineo\" size=\"15\" maxlength=\"5\" value=\"$gsanguineo\">"; ?> 
                          </font></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><strong><strong><font size="2" face="Arial, Helvetica, sans-serif">Gestion 
                            :</font></strong></strong></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<input type=\"text\" disabled=\"disabled\" name=\"gestion\" size=\"15\" maxlength=\"5\" value=\"$ano\">"; ?> 
                          </font></td>
                      </tr>
                      <tr> 
                        <th height="36" colspan="2" valign="top"> <table width="99%" border="0" align="center">
                            <tr> 
                              <td width="97%" height="21" bgcolor="#FFFFFF"> <div align="center"><font size="2"><font size="2"><font size="2"><font face="Verdana, Arial, Helvetica, sans-serif"> 
                                  <?
					
				if (($action=="Add") || ($action == "Modify") || ($act=="Edit") || ($act=="Limpiar")) {
					print "<input type=\"submit\" name=\"action\" value=\"Add New\"> ";
					print "<input type=\"submit\" name=\"action\" value=\"Modify\"> ";
					print "<input type=\"submit\" name=\"action\" value=\"Delete\"> ";
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
      <table width="66%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
        <tr>
          <td bgcolor="#000033"> 
            <div align="center"><b><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Mensaje:</font></b></div></td>
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
      </table>
      <p>&nbsp;</p></td>
    <td width="59%" align="center">
      <table width="97%">
        <tr align="left" bgcolor="#FFFFFF"> 
          <td colspan="5"> 
            <div align="center"></div></td>
        </tr>
        <tr bgcolor="#000033"> 
          <th width="25%"> 
            <div align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>C.I.</b></font></div></th>
          <th width="26%"> 
            <div align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Nombres</b></font></div></th>
          <th width="49%"> 
            <div align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Apellidos</b></font></div></th>
         </tr>
        <?
	// Fetch rows from AuthUser table and display ALL users
	// OLD CODE - DO NOT REMOVE
	// $result = mysql_db_query($dbname, "SELECT * FROM authuser ORDER BY id");
	
	// REVISED CODE
	$result = mysql_query("SELECT * FROM alumno WHERE gestion = $ano AND curso = 'basico' ORDER BY ci ASC");
	$row = mysql_fetch_array($result);
	$c=0;
	while ($row) {  		
	
	if ($c%2 == 0) 
		{	print "<tr class='row0'>"; 	}
		else
		{	print "<tr class='row1'>"; }
        print "  <td width=\"10%\" bgcolor=\"#C4D5E6\">";
        print "    <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">";
		print "		<a href=\"basico.php?act=Edit&ci=".$row['ci']."\">";
		print 		$row['ci'];
		print "		</a>";
		print "	   </font></div>";
        print "  </td>";
    	print "  <td width=\"10%\" bgcolor=\"#C4D5E6\">";
        print "    <div align=\"left\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">".$row['nombres']."</font></div>";
        print "  </td>";
        print "  <td width=\"10%\" bgcolor=\"#C4D5E6\">";
        print "    <div align=\"left\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">".$row['paterno']." ".$row['materno']."</font></div>";
        print "  </td>";
        print "</tr>";
		$c++;
		$row = mysql_fetch_array($result);
	}
?>
      </table></td>
  </tr>
</table>
<br />

<div align="center" class="centermain">
  <div class="main"></div>
</div>


  
</body>
</html>
