<?php

 session_start();
define('DB_NAME', 'user_db');
define('DB_USER', 'root');
define('DB_PASSWORD', 'usbw');
define('DB_HOST', 'localhost');
define('USER_PRO_TABLE','user_profile' );

$link =mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);

if(!$link){
	die('could not connect: ' .mysql_error());
}

// echo 'Connected Successfully';

// $sql='CREATE DATABASE DATABASE1';

// $retval=mysql_query($sql,$link);
// if(! $retval)
// {
// 	die('could not create data base');
// }

// echo "database tutorial created Successfully

// $sql="CREATE TABLE tut_table(".
// "tut_id INT NOT NULL AUTO_INCREMENT, ".
// "tut_title VARCHAR(100) NOT NULL, ".
// "tut_author VARCHAR(40) NOT NULL,".
// "submission_date DATE,".
// "PRIMARY KEY(tut_id));";

// $sql="DROP TABLE tut_table";

if(get_magic_quotes_gpc())
{
	$user_name=$_POST['user_name'];
	$password=$_POST['password'];
}
else
{
	$user_name=addslashes($_POST['user_name']);
	$password=addslashes($_POST['password']);
}
// // $submission_date=$_POST['submission_date'];

// // $sql = "INSERT INTO tut_table".
// // "(tut_title		,tut_author		,submission_date)".
// // " VALUES".
// // "('$tut_title'	,'$tut_author'	,'$submission_date');";

$sql='SELECT user_name FROM user_profile WHERE  user_name ="$user_name"';

// // $sql ='UPDATE tut_table SET tut_author="ME" WHERE tut_id=3';

$db_selected=mysql_select_db(DB_NAME);

if(!$db_selected)
{
	die('can\'t use' .DB_NAME.':' .mysql_error());
}

$retval=mysql_query($sql,$link);

if(! $retval)
{
	die('could not create data base');
}

// if($retval->mysql_num_rows(result)>0)
// 	echo $retval;

$number_of_rows=mysql_num_rows($retval);

echo "$number_of_rows";


// while ($row=mysql_fetch_array($retval,MYSQL_ASSOC)) {
	
// 	echo "idx: {$row['tut_id']} <br>".
// 	"user: {$row['tut_title']} <br>".
// 	"Tutorial_Author: {$row['tut_author']} <br>".
// 	"submission_date: {$row['submission_date']}<br>".
// 	"..............................................<br>";
// }
mysql_free_result($retval);
// echo "tut_table created Successfully";
mysql_close($link);
 ?>