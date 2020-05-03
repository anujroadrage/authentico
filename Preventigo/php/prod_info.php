

<?php

include 'Utility.php';

define_data_base(); 

session_start();


// Connect server //

$link =mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);

if(!$link){
	
	die('could not connect: ' .mysql_error());
}

// Connect Database //

$db_selected=mysql_select_db(DB_NAME);

if(!$db_selected)
{
	die('can\'t use' .DB_NAME.':' .mysql_error());
}

if(empty($_SESSION))
	header('location:' . BASE_PATH . 'login_page.html');


if($_SESSION['mode']==1)
{
	$_arr1=$_SESSION[COMP_INFO];
	
	//echo($_arr1);
	echo (json_encode($_arr1,JSON_PRETTY_PRINT));
}
elseif($_SESSION['mode']==2)
{
	$_arr1=$_SESSION[PROD_INFO];
	$_arr2=$_SESSION[CHAIN_INFO];
	$_merge_arr=array_merge($_arr1,$_arr2);
	echo (json_encode($_merge_arr,JSON_PRETTY_PRINT));
	//echo (json_encode($_arr1,JSON_PRETTY_PRINT));
	//echo(array_merge($_arr1,$_arr2));
}
elseif($_SESSION['mode']==3)
{
	
	$_arr1=$_SESSION[PROD_INFO];
	$_arr2=$_SESSION[CHAIN_INFO];
	
	$_merge_arr=array_merge($_arr1,$_arr2);
	echo (json_encode($_merge_arr,JSON_PRETTY_PRINT));
	
	//echo(array_merge($_arr1,$_arr2));
	
	// HERE UPDATE  THE SELLING INFORMATION AND SEND APPROPRITE INFO FOR RECIEPT
}



 ?>