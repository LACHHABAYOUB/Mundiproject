<?php
session_start(); //session start

		 unset($_SESSION['access_token']);
$_SESSION=array();
session_destroy();
?>