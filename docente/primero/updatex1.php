<?php 
	$ci = $_POST['ci'];
	$id_materia = $_POST['id_materia'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Evaluacion</title>
</head>

<body>
<div align="center"> </div>
<table width="75%" align="center">
  <tr>
    <td align="center" valign="top"><table width="75%">
        <tr>
          <td height="83"> 
            <?php
$id_materia = $_POST['id_materia'];
$fecha = date("Y-m-d");
$link = mysql_connect("localhost", "root", "nea1178");
mysql_select_db("emte",$link);
$sql= "UPDATE primero SET promedio='$promedio' WHERE ci='$ci' AND id_materia = '$id_materia'";
$resultado=mysql_query($sql);

$id_materia = $_POST['id_materia'];
?>
          </td>
        </tr>
        <tr> 
          <td> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Su Evaluacion ya fue Registrada</strong></font></div></td>
        </tr>
        <tr> 
          <td align="center"> <form action="listar1.php" method="get">
              <input name="id_materia" type="hidden" id="id_materia" value="<?php echo $id_materia; ?>" size="20" maxlength="20">
              <input type="submit" name="Submit" value="Aceptar">
            </form></td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
      </table> </td>
  </tr>
</table>
</body>
</html>
