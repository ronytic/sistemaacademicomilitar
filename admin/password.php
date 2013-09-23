<?php
  $login=$_POST["user"];
  $pwd=$_POST["pwd"];
  if ($login="nelson" AND $pwd=="max"){ header("Location: http://127.0.0.1/phpmyadmin/" );  }
?>