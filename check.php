<?
   
    if (isset($_COOKIE['USERNAME']) && isset($_COOKIE['PASSWORD']))
    {
        $USERNAME = $_COOKIE['USERNAME'];
        $PASSWORD = $_COOKIE['PASSWORD'];

        $CheckSecurity = new auth();
        $check = $CheckSecurity->page_check($USERNAME, $PASSWORD);
    }
    else
    {
        $check = false;
    }

	if ($check == false)
	{
		
		print "<font face=\"Arial, Helvetica, sans-serif\" size=\"5\" color=\"#FF0000\">";
		print "<b>Illegal Access</b>";
		print "</font><br>";
  		print "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"#000000\">";
		print "<b>You do not have permission to view this page.</b></font>";
		
		
		   print "<br>";
           print "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#000000\">";
		   print "You will be redirected back to the login page in a short while.</font>";

		   ?>
              <HEAD>
			           <SCRIPT language="JavaScript1.1">
			           <!--
				           location.replace("<? echo $login; ?>");
                       //-->
                       </SCRIPT>
              </HEAD>
            <?
		exit;
	}	

?>
