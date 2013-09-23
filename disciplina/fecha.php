
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
<form name="Sample" method="post" action="reporte4.php">
  <table width="90%" height="139" align="center">
    <tr> 
      <td height="15" colspan="3"> <div align="center"></div></td>
    </tr>
    <tr> 
      <td width="26%" height="94" align="center" valign="top"> <div align="center"> 
        </div></td>
      <td width="48%" align="center" valign="top"> <div align="center"> 
          <table width="78%">
            <tr> 
              <th height="21" colspan="3" valign="middle"> 
                <div align="center"></div></th>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"> <div align="right">
                  <table width="100%">
                    <tr> 
                      <td bgcolor="#FFFFFF"> <div align="right"><b><font color="#000000" size="2,5" face="Verdana, Arial, Helvetica, sans-serif">Fecha 
                          Inicio :</font></b></div></td>
                    </tr>
                  </table>
                  <b></b></div></td>
              <td valign="middle"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
                <input name="inicio" type="text" id="inicio" size="25" maxlength="25">
                </font></b></td>
              <td width="21%" rowspan="2" valign="top">&nbsp;</td>
            </tr>
            <tr> 
              <td width="45%" height="35" valign="top"> <div align="right"> 
                  <table width="100%">
                    <tr> 
                      <td bgcolor="#FFFFFF"> <div align="right"><b><font color="#000000" size="2,5" face="Verdana, Arial, Helvetica, sans-serif">Fecha 
                          Fin :</font></b></div></td>
                    </tr>
                  </table>
                  
                </div></td>
              <td width="34%" valign="top"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
                <input name="fin" type="text" id="fin" size="25" maxlength="25">
                </font></b></td>
            </tr>
            <tr valign="middle"> 
              <th height="24" colspan="3"> 
                <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                  <input name="igresar" type="submit" id="igresar2" value="Generar Reporte">
                  <input name="limpiar" type="reset" id="limpiar3" value="Limpiar">
                  </font></strong></div></th>
            </tr>
          </table>
        </div></td>
      <td width="26%" valign="top">&nbsp;</td>
    </tr>
  </table>
</form>
<br />

<div align="center" class="centermain">
  <div class="main"></div>
</div>


  
</body>
</html>
