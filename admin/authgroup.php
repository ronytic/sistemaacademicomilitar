<?
	include_once ("../auth.php");
	include_once ("../authconfig.php");
	include_once ("../check.php");
	
	if ($check['level'] != 1)
	{
		print "<font face=\"Arial, Helvetica, sans-serif\" size=\"5\" color=\"#FF0000\">";
		print "<b>Illegal Access</b>";
		print "</font><br>";
  		print "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"#000000\">";
		print "<b>Usted No tiene permisos para ver esta pagina.</b></font>";
		
		exit; 
	}		
	$group = new auth();

	$connection = mysql_connect($dbhost, $dbusername, $dbpass);
	$SelectedDB = mysql_select_db($dbname);
	$listusers = mysql_query("SELECT * from authuser");

?>
<?

if (isset($_POST['action'])) 
{
	$action = $_POST['action'];
	$act = "";
	$teamname = $_POST['teamname'];
	$teamlead = $_POST['teamlead'];
	$status = $_POST['status'];
}
elseif (isset($_GET['act']))
{
	$act = $_GET['act'];
	$action = "";
}
else
{
	$action = "";
	$act = "";
	$teamname = "";
	$teamlead = "";
	$status = "";
}

$message = "";


if ($action == "Add") {
	$situation = $group->add_team($teamname, $teamlead, $status);
	
	if ($situation == "blank team name") {
		$message = "Introdizca nombre del grupo.";
		$action = "";
	}
	elseif ($situation == "group exists") {
		$message = "El nombre del grupo existe en la base de datos, ingrese nuevo grupo.";
		$action = "";
	}
	elseif ($situation == 1) {
		$message = "Nuevo grupò adicionado correctamente.";
	}
	else {
		$message = "";
	}
}


if ($action=="Delete") {
	$delete = $group->delete_team($teamname);
	
	if ($delete) {
		$message = $delete;
		$action = "";
	}
	else {
		$teamname = "";
		$teamlead = "sa";
		$status = "active";
		$message = "Grupo eliminado correctamente.<br>Todos los usuarios asociados a este grupo ahora no pertenecen a un grupo definido.";
	}
}


if ($action == "Modify") {
	$update = $group->modify_team($teamname, $teamlead, $status);

	if ($update==1) {
		$message = "Datos del grupo actualizados.";
	}
	elseif ($update == "Admin team cannot be inactivated.") {
		$message = $update;
		$action = "";
	}
	elseif ($update == "Ungrouped team cannot be inactivated.") {
		$message = $update;
		$action = "";
	}
	elseif ($update == "Team Lead field cannot be blank.") {
		$message = $update;
		$action = "";
	}
	else {
		$message = "";
	}
}


if ($act == "Edit") {
    $teamname = $_GET['teamname'];
    $teamlead = $_GET['teamlead'];
    $status = $_GET['status'];
    $message = "Modificar datos del grupo.";
}


if ($action == "Add New") {
	$teamname = "";
	$teamlead = "sa";
	$status = "active";
	$message = "New team detail entry.";
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
			Salir</a><strong>: <? echo $USERNAME;?>
	</td>
</tr>
</table>

<br />

<div align="center" class="centermain">
	<div class="main">
      <table width="98%" border="0" cellspacing="4" cellpadding="0" align="left">
        <tr valign="top">
          
        <td width="43%" align="center"> 
          <form name="AddTeam" method="Post" action="authgroup.php">
            <table width="416" border="1" bordercolor="#000033">
              <tr>
                <td width="406"><table width="100%" >
                    <tr> 
                      <th colspan="2"> <div align="center"></div></th>
                    </tr>
                    <tr valign="middle"> 
                      <td width="46%"> 
                        <div align="right"><font color="#000000"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nombre 
                          de Grupo :</font></b></font></div></td>
                      <td width="54%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
                        <?   
			  	if (($action == "Modify") || ($action=="Add") || ($act=="Edit")) {
					print "<input type=\"hidden\" name=\"teamname\" value=\"$teamname\">"; 
					print "<font face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#006666\" size=\"2\">$teamname</font>";
				}
				else {	
					print "<input type=\"text\" name=\"teamname\" size=\"15\" maxlength=\"15\" value=\"$teamname\">"; 
				}
				
			  ?>
                        </font></td>
                    </tr>
                    <tr valign="middle"> 
                      <td width="46%"> 
                        <div align="right"><font color="#000000"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Usuario 
                          : </font></b></font></div></td>
                      <td width="54%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
                        <select name="teamlead">
                          <?
			  
			  	$row = mysql_fetch_array($listusers);
			  	while ($row) {
					$memberlist = $row["uname"];
					
					if ($teamlead == $memberlist) {
						print "<option value=\"$memberlist\" SELECTED>" . $row["uname"] . "</option>";
					}
					else {
						print "<option value=\"$memberlist\">" . $row["uname"] . "</option>";
					}
					$row = mysql_fetch_array($listusers);
				}
			  ?>
                        </select>
                        <a href="authuser.php"><strong>Adicionar</strong></a></font></td>
                    </tr>
                    <tr valign="middle"> 
                      <td width="46%"> 
                        <div align="right"><font color="#000000"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Estado 
                          : </font></b></font></div></td>
                      <td width="54%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
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
            <div align="center"></div>
          </form>
			
          <div align="left"><br>
          </div>
          <div align="left"></div>
          <table width="72%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000033">
            <tr>
                
              <td bgcolor="#000033" > 
                <div align="center"><b ><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Mensage:</font></b></div></td>
            </tr>
              <tr>
                <td><div align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#003333"> 
                  <?
		  	if ($message) {
			 	print $message;
		  	}
			else {
				print "Administracion de Usuarios del Sistema";
			}
		  ?>
                  </font></div></td>
              </tr>
            </table>
            <p>&nbsp;</p></td>
          <td width="57%">
            <table width="99%" bordercolor="#3399CC" >
            <tr> 
              <td colspan="3"> <div align="center"></div></td>
            </tr>
            <tr bgcolor="#000033"> 
              <th width="43%"> 
                <div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Nombre 
              de Grupo</b></font></div></th>
              <th width="26%"> 
                <div align="center"><font color="#FFFFFF" size="2"><font face="Verdana, Arial, Helvetica, sans-serif"><b>Usuario</b></font></font></div></th>
              <th width="31%"> 
                <div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Estado</b></font></div></th>
            </tr>
            <?
	
	$qQuery = "SELECT * FROM authteam ORDER BY id";
	
	
	$result = mysql_query($qQuery);
	
	$row = mysql_fetch_array($result);
	$c=0;
	while ($row) {  		
	if ($c%2 == 0) 
		{	print "<tr class='row0'>"; 	}
		else
		{	print "<tr class='row1'>"; }
        print "  <td width=\"35%\" >";
        print "    <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">";
		print "		<a href=\"authgroup.php?act=Edit&teamname=".$row["teamname"]."&teamlead=".$row["teamlead"]."&status=".$row["status"]."\">";
		print 		$row["teamname"];
		print "		</a>";
		print "	   </font></div>";
        print "  </td>";
        print "  <td width=\"34%\" >";
        print "    <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">".$row["teamlead"]."</font></div>";
        print "  </td>";
        print "  <td width=\"31%\" >";
        print "    <div align=\"center\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">".($row["status"])."</font></div>";
        print "  </td>";
        print "</tr>";
		$c++;
		$row = mysql_fetch_array($result);
	}
?>
          </table>
            
        </td>
        </tr>
      </table>
	</div>
</div> 
<div align="center" class="footer"></div>

</body>
</html>
