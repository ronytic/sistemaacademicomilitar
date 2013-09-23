<?php
  $contrasena=$_POST["contrasena"];
  $conexion = mysql_connect ("localhost","root","");
  mysql_select_db("emte",$conexion);
  $consulta = mysql_query("SELECT nivel FROM docentes WHERE '$contrasena' = contrasena"); 
  if($row = mysql_fetch_array($consulta))
  $nivel = $row["nivel"];
  	{ 
   	if ($nivel=="PRIMERO"){ header("Location: http://127.0.0.1/sistemaacademicomilitar/docente/primero" );  }
   	else if ($nivel=="SEGUNDO"){ header("Location: http://127.0.0.1/sistemaacademicomilitar/docente/segundo" );  }
   	else if ($nivel=="TERCERO"){ header("Location: http://127.0.0.1/sistemaacademicomilitar/docente/tercero" );  }
   	else if ($nivel=="BASICO"){ header("Location: http://127.0.0.1/sistemaacademicomilitar/docente/basico" );  }
   	else if ($nivel=="AVAZANDO"){ header("Location: http://127.0.0.1/sistemaacademicomilitar/docente/avanzado" );  }
   	else {
   		 	header("Location: http://127.0.0.1/docente/error" ); 
   	}
  }
?>