<?php include_once ("authconfig.php"); ?>
<html>
<head>
<title>Sistema Integrado Academico - EMTE</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/admin_lo.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
	function setFocus() {
		document.loginForm.username.select();
		document.loginForm.username.focus();
	}
</script>
<link rel="shortcut icon" href="http://localhost/jomla/images/favicon.ico" />

</head>

<body>
<table width="375" align="center">
  <tr>
    <td width="367" height="67">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><div align="center">
      <form name="Sample" method="post" action="<?php print $resultpage ?>">
          <table width="100%">
            <tr>
              <td><table width="91%" border="0" align="center">
                  <tr> 
                    <td colspan="3"><div align="center"><img src="img/sistemavehiculo.gif" width="154" height="118"></div></td>
                  </tr>
                  <tr valign="top"> 
                    <td height="43" colspan="3"><div align="center"><img src="img/baner.gif" width="321" height="22"></div></td>
                  </tr>
                  <tr> 
                    <td width="47%" valign="top"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Usuario 
                        :</font></strong></font></div></td>
                    <td width="15%" valign="middle"><input name="username" type="text" class="inputbox" id="username" size="15" /> 
                    </td>
                    <td width="38%" valign="top"><img src="img/usua.jpg" width="24" height="24"></td>
                  </tr>
                  <tr> 
                    <td valign="top"><div align="right"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Contrase&ntilde;a 
                        :</strong> </font></div></td>
                    <td valign="middle"><input name="password" type="password" class="inputbox" id="password4" size="15" /> 
                    </td>
                    <td valign="top"><img src="img/sesion.GIF" width="24" height="24"></td>
                  </tr>
                  <tr valign="top"> 
                    <td height="56" colspan="3"><div align="center"> 
                        <input type="submit" name="submit" class="button" value="Ingresar" />
                      </div></td>
                  </tr>
                </table></td>
            </tr>
          </table>
        </form>
    </div></td>
  </tr>
</table>
<div align="center"></div>
<div id="ctr" align="center"></div>
</body>
</html>