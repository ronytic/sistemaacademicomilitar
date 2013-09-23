<?

	setcookie ("USERNAME", $_POST['username']);
	setcookie ("PASSWORD", $_POST['password']);
 
  
  	include_once ("auth.php");
	include_once ("authconfig.php");
 
    $username =  $_POST['username'];
    $password =  $_POST['password'];

	$Auth = new auth();
	$detail = $Auth->authenticate($username, $password);

	if ($detail==0)
	{
	?><HEAD>
		<SCRIPT language="JavaScript1.1">
		<!--
			location.replace("<? echo $failure; ?>");
		//-->
		</SCRIPT>
	  </HEAD>
	<?
	}
	elseif ($detail['level'] == 1) {
	?><HEAD>
		<SCRIPT language="JavaScript1.1">
		<!--
			location.replace("<? echo $admin; ?>");
		//-->
		</SCRIPT>
	  </HEAD>
	<?
	}
	elseif ($detail['level'] == 2) {
	?><HEAD>
		<SCRIPT language="JavaScript1.1">
		<!--
			location.replace("<? echo $jefatura; ?>");
		//-->
		</SCRIPT>
	  </HEAD>
	<?
	}
	elseif ($detail['level'] == 3) {
	?><HEAD>
		<SCRIPT language="JavaScript1.1">
		<!--
			location.replace("<? echo $disciplina; ?>");
		//-->
		</SCRIPT>
	  </HEAD>
	<?
	}
	elseif ($detail['level'] == 4) {
	?><HEAD>
		<SCRIPT language="JavaScript1.1">
		<!--
			location.replace("<? echo $docente; ?>");
		//-->
		</SCRIPT>
	  </HEAD>
	<?
	}
	else 
	{
	?><HEAD>
		<SCRIPT language="JavaScript1.1">
		<!--
			location.replace("<? echo $success; ?>");
		//-->
		</SCRIPT>
	  </HEAD>
	<?
	}
?>
