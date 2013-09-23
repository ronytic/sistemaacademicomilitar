<?php
class auth{
	
	var $HOST = "localhost";	
	var $USERNAME = "root";	
	var $PASSWORD = "";	
	var $DBNAME = "emte";	

	
	function authenticate($username, $password) {
		$query = "SELECT * FROM authuser WHERE uname='$username' AND passwd=MD5('$password') AND status <> 'inactive'";

        $UpdateRecords = "UPDATE authuser SET lastlogin = NOW(), logincount = logincount + 1 WHERE uname='$username'";
		$connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);

		$SelectedDB = mysql_select_db($this->DBNAME);
		$result = mysql_query($query); 
		
		$numrows = mysql_num_rows($result);
		$row = mysql_fetch_array($result);
		
	
		if ($numrows == 0) {
			return 0;
		}
        
		else {
			$Update = mysql_query($UpdateRecords);
			return $row;
		}
	} 

	
	function page_check($username, $password) {
		$query = "SELECT * FROM authuser WHERE uname='$username' AND passwd=MD5('$password') AND status <> 'Inactivo'";

        $connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);
		
		$SelectedDB = mysql_select_db($this->DBNAME);
		$result = mysql_query($query); 
		
		$numrows = mysql_num_rows($result);
		$row = mysql_fetch_array($result);

		
		if ($numrows == 0) {
			return false;
		}
		else {
			return $row;
		}
	} 
	
	
	function modify_user($username, $password, $team, $level, $status) {

        
        if (trim($password == ''))
        {
            $qUpdate = "UPDATE authuser SET team='$team', level='$level', status='$status' WHERE uname='$username'";
        }
        else
        {
            $qUpdate = "UPDATE authuser SET passwd=MD5('$password'), team='$team', level='$level', status='$status'
					    WHERE uname='$username'";
        }

		if (trim($level)=="") {
			return "blank level";
		}
		elseif (($username=="admin" AND $status=="inactivo")) {
			return "Adminsitrador Inactivo Consulte con el Administrador - EMTE.";
		}
		elseif (($username=="jefatura" AND $status=="inactivo")) {
			return "Docente Inactivo Consulte con el Administrador - EMTE.";
		}
		elseif (($username=="disciplia" AND $status=="inactivo")) {
			return "Instituto Inactivo Consulte con el Administrador - EMTE.";
		}
		elseif (($username=="docente" AND $status=="inactivo")) {
			return "Instituto Inactivo Consulte con el Administrador - EMTE.";
		}
		else {
			$connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);
			$SelectedDB = mysql_select_db($this->DBNAME);
			$result = mysql_query($qUpdate); 
			return 1;
		}
		
	} 
	
	
	function delete_user($username) {
		$qDelete = "DELETE FROM  authuser WHERE uname='$username'";	

		if ($username == "admin") {
			return "Administrador Eliminado";
		}
		elseif ($username == "jefatura") {
			return "Usuario Jefatura Eliminado";
		}
		elseif ($username == "disciplina") {
			return "Usuario Disciplina Eliminado";
		}
		elseif ($username == "docente") {
			return "Usuario Docente Eliminado";
		}

		$connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);
		
		$SelectedDB = mysql_select_db($this->DBNAME);
		$result = mysql_query($qDelete); 
	
		return mysql_error();
		
	} 
	
	
	function add_user($username, $password, $team, $level, $status) {
		$qUserExists = "SELECT * FROM authuser WHERE uname='$username'";
		$qInsertUser = "INSERT INTO authuser(uname, passwd, team, level, status, lastlogin, logincount)
				  			   VALUES ('$username', MD5('$password'), '$team', '$level', '$status', '', 0)";

		$connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);
		
		
		if (trim($username) == "") { 
			return "blank username";
		}
		
		elseif (trim($password) == "") {
			return "blank password";
		}
		elseif (trim($level) == "") {
			return "blank level";
		}
		
		
		$SelectedDB = mysql_select_db($this->DBNAME);
		$user_exists = mysql_query($qUserExists); 

		if (mysql_num_rows($user_exists) > 0) {
			return "username exists";
		}
		else {
			
			$SelectedDB = mysql_select_db($this->DBNAME);
			$result = mysql_query($qInsertUser); 

			return mysql_affected_rows();
		}
	} 


	
	function add_team($teamname, $teamlead, $status="activo") {
		$qGroupExists = "SELECT * FROM authteam WHERE teamname='$teamname'";
		$qInsertGroup = "INSERT INTO authteam(teamname, teamlead, status) 
				  			   VALUES ('$teamname', '$teamlead', '$status')";
		
		$connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);
		
		
		if (trim($teamname) == "") { 
			return "blank team name";
		}
		
		
		$SelectedDB = mysql_select_db($this->DBNAME);
		$group_exists = mysql_query($qGroupExists); 

		if (mysql_num_rows($group_exists) > 0) {
			return "group exists";
		}
		else {
		
			$SelectedDB = mysql_select_db($this->DBNAME);
			$result = mysql_query($qInsertGroup); 

			return mysql_affected_rows();
		}
	} 
	
	
	function modify_team($teamname, $teamlead, $status) {
		$qUpdate = "UPDATE authteam SET teamlead='$teamlead', status='$status'
					WHERE teamname='$teamname'";
		$qUserStatus = "UPDATE authuser SET status='$status' WHERE team='$teamname'";

		if ($teamname == "admin" AND $status=="inactivo") {
			return "Administrador Inactivo";
		}
		elseif ($teamname == "jefatura" AND $status=="inactivo") {
			return "Jefatura Inactivo";
		}
		elseif ($teamname == "disciplina" AND $status=="inactivo") {
			return "Disciplina Inactivo";
		}
		elseif ($teamname == "docente" AND $status=="inactivo") {
			return "Docente Inactivo";
		}
		elseif ($teamname == "Ungrouped" AND $status=="inactivo") {
			return "Ungrouped team cannot be inactivated.";
		}
		else {		
			$connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);
			
			
			$SelectedDB = mysql_select_db($this->DBNAME);
			$userresult = mysql_query($qUserStatus); 
	
			
			$result = mysql_query($qUpdate); 
	
			return 1;
		}
		
	} 

	
	function delete_team($teamname) {
		$qDelete = "DELETE FROM authteam WHERE teamname='$teamname'";
		$qUpdateUser = "UPDATE authuser SET team='Ungrouped' WHERE team='$teamname'";	
		
		if ($teamname == "admin") {
			return "Asministrador Eliminado";
		}
		elseif ($teamname == "jefatura") {
			return "Jefatura Eliminado";
		}
		elseif ($teamname == "disciplina") {
			return "Disciplina Eliminado";
		}
		elseif ($teamname == "docente") {
			return "Docente Eliminado";
		}
		elseif ($teamname == "Ungrouped") {
			return "Ungrouped team cannot be deleted.";
		}
		$connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);
		
		$SelectedDB = mysql_select_db($this->DBNAME);
		$result = mysql_query($qUpdateUser); 

	
		$result = mysql_query($qDelete); 

		return mysql_error();
		
	} 


} 
?>
