
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
<script language="JavaScript" src="../js/theme001.js" type="text/javascript"></script></head>

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
<div align="center"></div>
<div align="center" class="centermain">
<div class="main">
				<table class="adminheading" border="0">
		
     	</table>

	            
    <table width="375" align="center">
      <tr> 
        <td width="367" height="237" align="center"> 
          <div align="center"> 
            <form name="Sample" method="post" action="password.php">
              <div class="form-block" align="center"> 
                <div class="inputlabel"> 
                  <table width="91%" border="0" align="center">
                    <tr> 
                      <td colspan="3"><div align="center"></div></td>
                    </tr>
                    <tr valign="top"> 
                      <td height="24" colspan="3"> <div align="center"></div></td>
                    </tr>
                    <tr> 
                      <td height="28" align="center" valign="middle">&nbsp;</td>
                      <td valign="middle">&nbsp;</td>
                      <td width="29%" rowspan="4" align="center" valign="middle"> 
                        <div align="left"><img src="../img/bd.gif" width="78" height="95" align="bottom"></div></td>
                    </tr>
                    <tr> 
                      <td width="44%" height="28" align="center" valign="middle"> 
                        <div align="right"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Usuario 
                          :</strong></font></div></td>
                      <td width="27%" valign="middle"><input name="user" type="text" class="inputbox" id="username4" size="15" /> 
                      </td>
                    </tr>
                    <tr>
                      <td height="22" valign="middle"> <div align="right"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Contrase&ntilde;a 
                          :</strong> </font></div></td>
                      <td valign="middle"><input name="pwd" type="password" class="inputbox" id="password4" size="15" /> 
                      </td>
                    </tr>
                    <tr> 
                      <td height="21" valign="middle">&nbsp;</td>
                      <td valign="middle">&nbsp;</td>
                    </tr>
                    <tr valign="top"> 
                      <td height="33" colspan="3"> <div align="center"> 
                          <input type="submit" name="submit" class="button" value="Ingresar" />
                        </div></td>
                    </tr>
                    <tr valign="top"> 
                      <td height="13" colspan="3"> <div align="center"> <font color="#000033" size="1" face="Arial, Helvetica, sans-serif"><strong>Administrator: 
                          nelsonespinoza@ingenieros.com </strong></font></div></td>
                    </tr>
                  </table>
                </div>
              </div>
            </form>
          </div></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>
