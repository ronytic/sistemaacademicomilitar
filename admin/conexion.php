<?
if(!($link = mysql_connect("localhost", "root", "nea1178")))
   {
     echo "Error en la comunicacion con la Base de datos";
     exit();
   }
if(!mysql_select_db("emte", $link))
   {
     echo "Error en la seleccion de la Base de Datos!!";
     exit();
   }
?>