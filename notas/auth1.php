<?
    // ALTAS-BAJAS-MODIFICACIONES DE DOCENTES//
	include_once ("../authconfig.php");
?>
<?php
class auth{
	// CHANGE THESE VALUES TO REFLECT YOUR SERVER'S SETTINGS
	var $HOST = "localhost";	// Change this to the proper DB HOST
	var $USERNAME = "root";	// Change this to the proper DB USERNAME
	var $PASSWORD = "nea1178";	// Change this to the proper DB USER PASSWORD
	var $DBNAME = "emte";	// Change this to the proper DB NAME

	// MODIFY USERS
	function modify_user($ci, $grado, $espe, $nombres, $paterno, $materno, $fec_nac, $lugar, $direccion, $fono, $celular, $gsanguineo, $gestion, $curso) {

        // If $password is blank, make no changes to the current password
       		$connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);
			$SelectedDB = mysql_select_db($this->DBNAME);
            $qUpdate = "UPDATE alumno SET ci='$ci', grado='$grado', espe='$espe', nombres='$nombres', paterno='$paterno', materno='$materno', fec_nac='$fec_nac', lugar='$lugar', direccion='$direccion', fono='$fono', celular='$celular', gsanguineo='$gsanguineo', gestion='$gestion', curso='$curso' WHERE ci = '$ci'";
			$result = mysql_query($qUpdate); 
			return 1;
      // }
	} // End: function modify_user
	
	// DELETE USERS
	function delete_user($ci) {
		$qDelete = "DELETE FROM alumno WHERE ci='$ci'";	
		return "Alumno Eliminado";
		
		$connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);
		
		$SelectedDB = mysql_select_db($this->DBNAME);
		$result = mysql_query($qDelete); 
	
		return mysql_error();
		
	} // End: function delete_user
	
	// ADD USERS
		function add_user($ci, $grado, $espe, $nombres, $paterno, $materno, $fec_nac, $lugar, $direccion, $fono, $celular, $gsanguineo, $gestion, $curso) {
  // 		$qUserExists = "SELECT * FROM docente WHERE id_docente='$id_docente'";
		$qInsertUser = "INSERT INTO alumno (ci, grado, espe, nombres, paterno, materno, fec_nac, lugar, direccion, fono, celular, gsanguineo, gestion, curso)
				  			   VALUES ('$ci', '$grado', '$espe', '$nombres', '$paterno', '$materno', '$fec_nac', '$lugar', '$direccion', '$fono', '$celular', '$gsanguineo', '$gestion', '$curso')";
		
		if ($espe == "1ER. A.M.")
		{
				$qInsertUser1 = "INSERT INTO primero (ci, gestion)
				  			   VALUES ('$ci', '$gestion')";
		}
		elseif ($espe == "2DO. A.M.")
		{
				$qInsertUser2 = "INSERT INTO segundo (ci, gestion)
				  			   VALUES ('$ci', '$gestion')";
		}
		elseif ($espe == "3ER. A.M.")
		{
				$qInsertUser3 = "INSERT INTO tercero (ci, gestion)
				  			   VALUES ('$ci', '$gestion')";
		}
		elseif ($curso == "basico")
		{
				$qInsertUser3 = "INSERT INTO basico (ci, gestion)
				  			   VALUES ('$ci', '$gestion')";
		}
		elseif ($corso == "avanzado")
		{
				$qInsertUser3 = "INSERT INTO avanzado (ci, gestion)
				  			   VALUES ('$ci', '$gestion')";
		}
		$connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);
		
		$SelectedDB = mysql_select_db($this->DBNAME);
		$result = mysql_query($qInsertUser); 
		$result = mysql_query($qInsertUser1);
		$result = mysql_query($qInsertUser2);
		$result = mysql_query($qInsertUser3);
	} // End: function add_user
} // End: class auth
?>