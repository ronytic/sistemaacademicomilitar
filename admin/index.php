<?
    require_once ('../auth.php');
    require_once ('../authconfig.php');
    require_once ('../check.php');

	if ($check["level"] != 1)
	{
		print "<font face=\"Arial, Helvetica, sans-serif\" size=\"5\" color=\"#FF0000\">";
		print "<b>Illegal Access</b>";
		print "</font><br>";
  		print "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"#000000\">";
		print "<b>You do not have permission to view this page.</b></font>";
		
		exit; 
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
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="menubar">
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
<div align="center"><br />
</div>
<div align="center" class="centermain">
  <div class="main">
				<table class="adminheading" border="0">
		
     	</table>

	            
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr> 
        <td><div align="center"></div></td>
      </tr>
    </table>
	</div>
</div>
<div align="center" class="footer"> 
  <table width="99%" border="0">
    <tr> 
      <td height="15" align="center"> <div align="center"></div></td>
    </tr>
    <tr> 
      <td height="21" align="center"><font color="#000033" size="3" face="Arial, Helvetica, sans-serif"><strong>Bienvenidos 
        al Panel de Administraci&oacute;n</strong></font></td>
    </tr>
  </table>
</div>

</body>
</html>
