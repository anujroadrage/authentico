

<?php

/* define('DB_NAME', 'authentipro');
define('DB_USER', 'root');
define('DB_PASSWORD', 'usbw');
define('DB_HOST', 'localhost');
 */

	session_start();

	include 'Utility.php';


	if(get_magic_quotes_gpc())
	{
		$_code=$_POST['secure_code'];
	}
	else
	{
		$_code=addslashes($_POST['secure_code']);
	}
	
	$_SESSION['secure_code']=$_code;
	

	if(empty($_SESSION['mannual_input']))
		$_SESSION['mannual_input']+=1;
	else
		$_SESSION['mannual_input']=1;
	
	if(!isset($_SESSION['uid']))
	{
		//echo('flag1');
		header('location:' .  BASE_PATH . '/login_page.html');
	}
	else
	{
		//echo('flag2');
		header('location:validate.php');
	}

 ?>