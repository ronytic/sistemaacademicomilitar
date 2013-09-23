<?
	include_once ("../auth.php");
	include_once ("../authconfig.php");
	include_once ("../check.php");
	
	if ($check["level"] != 1)
	{
		print "<font face=\"Arial, Helvetica, sans-serif\" size=\"5\" color=\"#FF0000\">";
		print "<b>Illegal Access</b>";
		print "</font><br>";
  		print "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"#000000\">";
		print "<b>You do not have permission to view this page.</b></font>";
		
		exit; 
	}	
	
	$user = new auth();
	
	$connection = mysql_connect($dbhost, $dbusername, $dbpass);
	$SelectedDB = mysql_select_db($dbname);
	$listteams = mysql_query("SELECT * from authteam");
	
?>
<?

if (isset($_POST['action'])) 
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$team = $_POST['team'];
	$level = $_POST['level'];
	$status = $_POST['status'];
	$action = $_POST['action'];
	$act = "";
}
elseif (isset($_GET['act']))
{
	$act = $_GET['act'];
	$action = "";
}
else
{
	$action = "";
	$username = "";
	$password = "";	
	$team = "";
	$level = "";
	$status = "";
	$action = "";
	$act = "";
}

$message = "";

if ($action == "Add") {
	$situation = $user->add_user($username, $password, $team, $level, $status);
	
	if ($situation == "blank username") {
		$message = "Introduzca datos de usuario.";
		$action = "";
	}
	elseif ($situation == "username exists") {
		$message = "El Usuario existe en la base de datos, ingrese otro usuario.";
		$action = "";
	}
	elseif ($situation == "blank password") {
		$message = "Introduzca un password de identificacion de usuario.";
		$action = "";
	}
	elseif ($situation == "blank level") {
		$message = "Introduzca un nivel de usuario.";
		$action = "";
	}
	elseif ($situation == 1) {
		$message = "Datos de Usuario Adicionados correctamente.";
	}
	else {
		$message = "";
	}
}

if ($action=="Delete") {
	
	$delete = $user->delete_user($username);
	
	$deletesignup =  mysql_query("DELETE FROM signup WHERE uname='$username'");

	if ($delete && $deletesignup) {
		$message = $delete;
	}
	else {
		$username = "";
		$password = "";
		$team = "Ungrouped";
		$level = "";
		$status = "active";
		$message = "Usuario eliminado de la base de datos.";
	}
}

if ($action == "Modify") {
	$update = $user->modify_user($username, $password, $team, $level, $status);

	if ($update==1) {
		$message = "Datos actualizados del usuario.";
	}
	elseif ($update == "blank level") {
		$message = "introduzca un nivel de usuario";
		$action = "";
	}
	elseif ($update == "sa cannot be inactivated") {
		$message = "This user cannot be inactivated.";
		$action = "";
	}
	elseif ($update == "admin cannot be inactivated") {
		$message = "This user cannot be inactivated";
		$action = "";
	}
	else {
		$message = "";
	}
}

if ($act == "Edit") 
{
    $username = $_GET['username'];
	$listusers = mysql_query("SELECT * from authuser where uname='$username'");
	$rows = mysql_fetch_array($listusers);
	$username = $rows["uname"];
	$password = "";
	$team = $rows["team"];
	$level = $rows["level"];
	$status = $rows["status"];

	$message = "Modificar datos del usuario.";
}

if ($action == "Add New") {
	$username = "";
	$password = "";
	$team = "Ungrouped";
	$level = "";
	$status = "active";
	$message = "Introducir datos del nuevo usuario.";
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

<style type="text/css">
<!--
.Estilo2 {color: #003333}
-->
</style>
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
	<td class="menubackgr" align="right" style="padding-right:5px;">
		<a href="../logout.php?option=logout" style="color: #333333; font-weight: bold">
			Salir</a><strong>: <? echo $USERNAME;?></strong>
	</td>
</tr>
</table>

<br />

<div align="center" class="centermain"> 
  <div class="main">
      <table width="96%" border="0" cellspacing="4" cellpadding="0" align="left">
        <tr valign="top">
          
        <td width="42%" align="center"> 
          <form name="AddUser" method="Post" action="authuser.php">
              
            <table width="407" border="1" bordercolor="#000033">
              <tr>
                  <td width="397"><table width="100%" border="0" bordercolor="#660000">
                    <tr> 
                      <th colspan="2"> <div align="center"></div></th>
                    </tr>
                    <tr valign="middle"> 
                      <td width="27%"> <div align="right"><font color="#000000"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Usuario 
                          : </font></b></font></div></td>
                      <td width="73%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
                        <?   
			  	if (($action == "Modify") || ($action=="Add") || ($act=="Edit")) {
					print "<input type=\"hidden\" name=\"username\" value=\"$username\">"; 
					print "<font face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#006666\" size=\"2\">$username</font>";
				}
				else {	
					print "<input type=\"text\" name=\"username\" size=\"15\" maxlength=\"15\" value=\"$username\">"; 
				}
				
			  ?>
                        </font></td>
                    </tr>
                    <tr valign="middle"> 
                      <td width="27%"> <div align="right"><font color="#000000"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Password 
                          :</font></b></font></div></td>
                      <td width="73%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<input type=\"password\" name=\"password\" size=\"20\" maxlength=\"15\" value=\"$password\">"; ?> 
                        </font></td>
                    </tr>
                    <tr valign="middle"> 
                      <td width="27%"> <div align="right"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></div></td>
                      <td width="73%"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><span class="Estilo2">&nbsp;<strong>&nbsp;Ingrese 
                        nombre de Usuario y Password</strong></span></font></td>
                    </tr>
                    <tr valign="middle"> 
                      <td width="27%"> <div align="right"><font color="#000000"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Grupo 
                          :</font></b></font></div></td>
                      <td width="73%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
                        <select name="team">
                          <?
			 
			  	$row = mysql_fetch_array($listteams);
			  	while ($row) {
					$teamlist = $row["teamname"];
					
					if ($team == $teamlist) {
						print "<option value=\"$teamlist\" SELECTED>" . $row["teamname"] . "</option>";
					}
					else {
						print "<option value=\"$teamlist\">" . $row["teamname"] . "</option>";
					}
					$row = mysql_fetch_array($listteams);
				}
			  ?>
                        </select>
                        <a href="authgroup.php"><strong>Adicionar</strong></a></font></td>
                    </tr>
                    <tr valign="middle"> 
                      <td width="27%"> <div align="right"><font color="#000000"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nivel 
                          :</font></b></font></div></td>
                      <td width="73%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? print "<input type=\"text\" name=\"level\" size=\"4\" maxlength=\"4\" value=\"$level\">"; ?> 
                        </font></td>
                    </tr>
                    <tr valign="middle"> 
                      <td width="27%"> <div align="right"><font color="#000000"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Estado 
                          :</font></b></font></div></td>
                      <td width="73%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
                        <select name="status">
                          <?
			  	
				if ($status == "inactivo") {
					print "<option value=\"activo\">Activo</option>";
                	print "<option value=\"inactivo\" selected>Inactivo</option>";
				}
				else {
					print "<option value=\"activo\" selected>Activo</option>";
                	print "<option value=\"inactivo\">Inactivo</option>";
				}
              
			  ?>
                        </select>
                        </font></td>
                    </tr>
                    <tr valign="middle"> 
                      <th colspan="2"> <div align="center"><font size="2"><font size="2"><font size="2"><font face="Verdana, Arial, Helvetica, sans-serif"> 
                          <?
					
				if (($action=="Add") || ($action == "Modify") || ($act=="Edit")) {
					print "<input type=\"submit\" name=\"action\" value=\"Add New\"> ";
					print "<input type=\"submit\" name=\"action\" value=\"Modify\"> ";
					print "<input type=\"submit\" name=\"action\" value=\"Delete\"> ";
				}
				else {
					print "<input type=\"submit\" name=\"action\" value=\"Add\"> ";
                }
				
				?>
                          <input type="reset" name="Reset" value="Limpiar">
                          </font></font></font></font></div></th>
                    </tr>
                  </table></td>
                </tr>
              </table>
            </form>
            <br>
			<table width="73%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000033" >
            <tr>
                
              <th bgcolor="#000033"> 
                <div align="center"><strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Mensaje:</font></strong></div></th>
              </tr>
              <tr>
                <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#003333">
                  <?
		  	if ($message) {
			 	print $message;
		  	}
			else {
				print "Administracion de Usuarios del Sistema";
			}
		  ?>
                </font></td>
              </tr>
            </table>
          <div align="center"></div>
          <table width="45%" align="center">
            <tr> 
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr> 
              <td colspan="2" bgcolor="#000000"> <div align="center"><font color="#FFFF00"><strong>NIVEL 
                  DE USUARIOS</strong></font></div></td>
            </tr>
            <tr> 
              <td width="15%"><div align="center"><strong><font color="#000000">1</font></strong></div></td>
              <td width="85%"><div align="center"><strong><font color="#000000">Admin</font></strong></div></td>
            </tr>
            <tr> 
              <td><div align="center"><strong><font color="#000000">2</font></strong></div></td>
              <td><div align="center"><strong><font color="#000000">Jefatura</font></strong></div></td>
            </tr>
            <tr> 
              <td><div align="center"><strong><font color="#000000">3</font></strong></div></td>
              <td><div align="center"><strong><font color="#000000">Disciplina</font></strong></div></td>
            </tr>
            <tr> 
              <td height="18"> <div align="center"><strong>4</strong></div></td>
              <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000000">Docente</font></strong></font></div></td>
            </tr>
          </table>
          <p>&nbsp;</p>
          </td>
          <td width="58%">
            <table width="99%">
            <tr> 
              <td colspan="5"> <div align="center"></div></td>
            </tr>
            <tr bgcolor="#000033"> 
              <th width="16%"> 
                <div align="center"><font color="#FFFFFF" size="2"><b><font face="Verdana, Arial, Helvetica, sans-serif">Usuario</font></b></font></div></th>
              <th width="15%"> 
                <div align="center"><font color="#FFFFFF" size="2"><b><font face="Verdana, Arial, Helvetica, sans-serif">Grupo</font></b></font></div></th>
              <th width="15%"> 
                <div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Estado</b></font></div></th>
              <th width="38%"> 
                <div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Ultima 
                  Visita </b></font></div></th>
              <th width="14%"> 
                <div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Sesion</b></font></div></th>
            </tr>
            <?
	
	$result = mysql_query("SELECT * FROM authuser ORDER BY id");
	
	$row = mysql_fetch_array($result);
	$c=0;
	while ($row) {  	
	if ($c%2 ==0)
	{
		print "<tr class='row0'>"; 
		}
	else
	{
			print "<tr class='row1'>"; 
    }
        print "  <td width=\"20%\" >";
        print "    <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">";
		print "		<a href=\"authuser.php?act=Edit&username=".$row['uname']."\">";
		print 		$row['uname'];
		print "		</a>";
		print "	   </font></div>";
        print "  </td>";
        print "  <td width=\"20%\" >";
        print "    <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">".$row['team']."</font></div>";
        print "  </td>";
        print "  <td width=\"15%\" >";
        print "    <div align=\"center\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">".($row['status'])."</font></div>";
        print "  </td>";
        print "  <td width=\"40%\" >";
        print "    <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">".$row['lastlogin']."</font></div>";
        print "  </td>";
        print "  <td width=\"8%\" >";
        print "    <div align=\"center\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">".($row['logincount'])."</font></div>";
        print "  </td>";
        print "</tr>";
		$c++;
		$row = mysql_fetch_array($result);
	}
?>
          </table></td>
        </tr>
      </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
</div>
</body>
</html>
