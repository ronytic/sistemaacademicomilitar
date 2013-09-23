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
	<td class="menubackgr" align="right" style="padding-right:5px;"> <a href="../logout.php?option=logout" style="color: #333333; font-weight: bold"> 
      Salir</a><strong>: <? echo $USERNAME;?></strong> </td>
</tr>
</table>
</p>
<form name="Sample" method="post" action="promo.php">
  <table width="90%" height="139" align="center">
    <tr> 
      <td height="15" colspan="3"> <div align="center"></div></td>
    </tr>
    <tr> 
      <td width="26%" height="94" align="center" valign="top"> <div align="center"> 
        </div></td>
      <td width="48%" align="center" valign="top"> <div align="center"> 
          <table width="89%">
            <tr> 
              <th height="21" colspan="3" valign="middle"> <div align="center"></div></th>
            </tr>
            <tr> 
              <td height="35" valign="middle"><table width="100%">
                  <tr> 
                    <td bgcolor="#FFFFFF"> <div align="right"><b><font color="#000000" size="2,5" face="Verdana, Arial, Helvetica, sans-serif">A&ntilde;o 
                        Promocion :</font></b></div></td>
                  </tr>
                </table></td>
              <td valign="middle"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
                <input name="ano" type="text" id="ano" size="25" maxlength="25">
                </font></b></td>
              <td width="23%" rowspan="2" valign="top"><img src="../img/busquedas.jpg" width="73" height="60"></td>
            </tr>
            <tr> 
              <td width="42%" height="35" valign="middle"> <div align="right"> 
                  <table width="100%">
                    <tr> 
                      <td bgcolor="#FFFFFF"> <div align="right"><b><font color="#000000" size="2,5" face="Verdana, Arial, Helvetica, sans-serif">Curso 
                          Realizado :</font></b></div></td>
                    </tr>
                  </table>
                  <b></b></div></td>
              <td width="35%" valign="middle"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
                <select name="curso" id="curso">
                  <option selected>PREGRADO</option>
                  <option>BASICO</option>
                  <option>AVANZADO</option>
                </select>
                </font></b></td>
            </tr>
            <tr valign="middle"> 
              <th height="30" colspan="3"> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
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
<div align="center" class="centermain"> 
  <div class="main"> </div>
</div>
<div align="center" class="footer"> 
  <table width="99%" border="0">
    <tr> 
      <td align="center"> <div align="center"></div></td>
    </tr>
  </table>
</div>

</body>
</html>
