<?
	$ano = date("Y");
?>
<?
	include_once ("auth3.php");
	include_once ("../authconfig.php");
	//include_once ("../check.php");
	
	$user = new auth();
	
	$connection = mysql_connect("localhost","root","nea1178"); //$dbhost, $dbusername, $dbpass
	$SelectedDB = mysql_select_db("emte",$connection);  //$dbname
	$listteams = mysql_query("SELECT * FROM materia");
	
?>
<?

if (isset($_POST['action'])) 
{
	$id_materia = $_POST['id_materia'];
	$materia = $_POST['materia'];
	$hteoria = $_POST['hteoria'];
	$practica = $_POST['practica'];
	$curso = $_POST['curso'];
	$gestion = $ano;
	$act = "";
}
elseif (isset($_GET['act']))
{
	$act = $_GET['act'];
	$action = "";
}
else
{
	$id_materia = "";
	$materia = "";
	$hteoria = "";	
	$practica = "";
	$curso = "";
	$gestion = $ano;
	$act = "";
}

$message = "";

// ADD USER
if ($action == "Add") {
	$situation = $user->add_user($id_materia, $materia, $hteoria, $practica, $curso, $gestion);
	
	if ($situation == "blank id_materia") {
		$message = "Introduzca Codigo de Materia";
		$action = "";
	}
	elseif ($situation == "id_materia exists") {
		$message = "El Codigo de Materia Existe";
		$action = "";
	}
	elseif ($situation == 1) {
		$message = "Materia Registrada Correctamente";
	}
	else {
		$message = "";
	}
}

// DELETE USER
if ($action=="Delete") {
	// Delete record in authuser table
	$delete = $user->delete_user($id_materia);
	
	// Delete record in signup table
	$deletesignup =  mysql_query("DELETE FROM materia WHERE id_materia='$id_materia'");

	if ($delete && $deletesignup) {
		$message = $delete;
	}
	else {
	$id_materia = "";
	$materia = "";
	$hteoria = "";	
	$practica = "";
	$curso = "";
	$gestion = $ano;
			
		$message = "Eliminado de la Base de Datos.";
	}
}

// MODIFY USER
if ($action == "Modify") {
	$update = $user->modify_user($id_materia, $materia, $hteoria, $practica, $curso, $gestion);

	if ($update==1) {
		$message = "Datos actualizados de la Materia";
	}
	elseif ($update == "blank id_materia") {
		$message = "Introduzca el Id de la Materia";
		$action = "";
	}
	else {
		$message = "";
	}
}

// EDIT USER (accessed from clicking on username links)
if ($act == "Edit") 
{
    $id_materia = $_GET['id_materia'];
	$listusers = mysql_query("SELECT * 	FROM materia WHERE id_materia='$id_materia'");
	$rows = mysql_fetch_array($listusers);
	
	$id_materia = $rows["id_materia"];
	$materia = $rows["materia"];
	$hteoria = $rows["hteoria"];
	$practica = $rows["practica"];
	$curso = $rows["curso"];
	$gestion = $ano;
	$message = "Modificar datos de la Materia";
}

// CLEAR FIELDS
if ($action == "Add New") {
	
	$id_materia = "";
	$materia = "";
	$hteoria = "";	
	$practica = "";
	$curso = "";
	$gestion = $ano;
	$act = "";
	$message = "Introducir datos de la Materia";
}

// 
if ($action == "Limpiar") {
	
	$id_materia = "";
	$materia = "";
	$hteoria = "";	
	$practica = "";
	$curso = "";
	$gestion = $ano;
	$act = "";
	$message = "Formulario sin Datos de la Materia";
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
    <td width="41%" height="305" align="center"> 
      <form name="fcalen" method="Post" action="materia.php">
        <table width="52%">
          <tr>
            <td width="19%" align="right" valign="top">&nbsp;</td>
            <td width="81%"><table width="345" height="225" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" bgcolor="#CCCCCC">
                <tr> 
                  <td width="350" height="223" valign="top"> 
                    <table width="80%" bordercolor="#3399CC" bgcolor="#FFFFFF">
                      <tr align="center" valign="top" bgcolor="#C4D5E6"> 
                        <th height="21" colspan="2"> <table width="345" height="34" bgcolor="#FFFFFF">
                            <tr> 
                              <td> <div align="center"><font size="5"><u></u></font></div></td>
                            </tr>
                          </table></th>
                      </tr>
                      <tr> 
                        <td width="45%" height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">*Codigo 
                            Materia :</font></strong></font></div></td>
                        <td width="55%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
                          <?   
			  	if (($action == "Modify") || ($action=="Add") || ($act=="Edit")) {
					print "<input type=\"hidden\" name=\"id_materia\" value=\"$id_materia\">"; 
					print "<font face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#000000\" size=\"2\">$id_materia</font>";
				}
				else {	
					print "<input type=\"text\" name=\"id_materia\" size=\"15\" maxlength=\"7\" value=\"$id_materia\">"; 
				}
				
			  ?>
                          </font><font color="#000000">&nbsp; </font><font color="#000000">&nbsp;</font><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp; 
                          </font><font color="#000000">&nbsp; </font></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">* 
                            Materia :</font></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<input type=\"text\" name=\"materia\" size=\"25\" maxlength=\"40\" value=\"$materia\">"; ?></font><font color="#000000">&nbsp; 
                          </font></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">* 
                            Horas Teoria :</font></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<input type=\"text\" name=\"hteoria\" size=\"5\" maxlength=\"3\" value=\"$hteoria\">"; ?></font><font color="#000000">&nbsp; 
                          </font></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">* 
                            Horas Practica :</font></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<input type=\"text\" name=\"practica\" size=\"5\" maxlength=\"3\" value=\"$practica\">"; ?></font><font color="#000000">&nbsp;
						 </font></td>
                      </tr>
                      <tr> 
                        <td height="21" bgcolor="#FFFFFF"> <div align="right"><font color="#000000"><strong><strong><font size="2" face="Arial, Helvetica, sans-serif">* 
                            Curso :</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                            </font></strong></font></div></td>
                        <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<input type=\"text\" name=\"curso\" size=\"15\" maxlength=\"15\" value=\"$curso\">"; ?></font><font color="#000000">&nbsp; 
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
            <div align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Codigo</b></font></div></th>
          <th width="26%"> 
            <div align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Materia</b></font></div></th>
          <th width="10%"> 
            <div align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Teoria</b></font></div></th>
		  <th width="10%"> 
            <div align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Practica</b></font></div></th>
        </tr>
        <?
	// Fetch rows from AuthUser table and display ALL users
	// OLD CODE - DO NOT REMOVE
	// $result = mysql_db_query($dbname, "SELECT * FROM authuser ORDER BY id");
	
	// REVISED CODE
	$result = mysql_query("SELECT * FROM materia WHERE gestion = $ano ORDER BY id_materia ASC");
	$row = mysql_fetch_array($result);
	$c=0;
	while ($row) {  		
	
	if ($c%2 == 0) 
		{	print "<tr class='row0'>"; 	}
		else
		{	print "<tr class='row1'>"; }
        print "  <td width=\"10%\" bgcolor=\"#C4D5E6\">";
        print "    <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">";
		print "		<a href=\"materia.php?act=Edit&id_materia=".$row['id_materia']."\">";
		print 		$row['id_materia'];
		print "		</a>";
		print "	   </font></div>";
        print "  </td>";
    	print "  <td width=\"10%\" bgcolor=\"#C4D5E6\">";
        print "    <div align=\"left\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">".$row['materia']."</font></div>";
        print "  </td>";
        print "  <td width=\"10%\" bgcolor=\"#C4D5E6\">";
        print "    <div align=\"left\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">".$row['hteoria']."</font></div>";
        print "  </td>";
		 print "  <td width=\"10%\" bgcolor=\"#C4D5E6\">";
        print "    <div align=\"left\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">".$row['practica']."</font></div>";
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
