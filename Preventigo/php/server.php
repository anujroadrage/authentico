

<?php

define('DB_NAME', 'user_db');
define('DB_USER', 'root');
define('DB_PASSWORD', 'usbw');
define('DB_HOST', 'localhost');




if(get_magic_quotes_gpc())
{
	$secure_code=$_POST['secure_code'];
	
}
else
{
	$secure_code=addslashes($_POST['secure_code']);
	
}
$link =mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);

if(!$link){
	die('could not connect: ' .mysql_error());
}



 if($server_tag=='server_tag_login')
 {



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

$sql="SELECT * FROM user_profile WHERE  password ='$password'";

// // $sql ='UPDATE tut_table SET tut_author="ME" WHERE tut_id=3';

$db_selected=mysql_select_db(DB_NAME);

if(!$db_selected)
{
	die('can\'t use' .DB_NAME.':' .mysql_error());
}


if(! $retval)
{
	die('could not create data base');
}

// if($retval->mysql_num_rows(result)>0)
// 	echo $retval;

$number_of_rows=mysql_num_rows($retval);

if ($number_of_rows==0) {

$result = array('result' => 0);

echo json_encode($result,JSON_PRETTY_PRINT);
}
elseif ($number_of_rows==1) {

while ($row=mysql_fetch_array($retval,MYSQL_ASSOC)) {
	
	// echo "UID: {$row['uid']} <br>".
	// 	"first_name: {$row['first_name']}<br>".
	// 	"last_name:  {$row['last_name']}";

	$result = array('result' => 1,
					'uid'=>$row['uid'],
					'first_name'=>$row['first_name'],
					'last_name'=>$row['last_name'],
					'cur_bal'=>$row['cur_bal'],
					'mobile_num'=>$row['mob_num'],
					'email_id'=>$row['email_id']);
}
echo json_encode($result,JSON_PRETTY_PRINT);
	// echo "idx:  <br>".
	// "user: {$row['first_name']} <br>".
	// "Tutorial_Author: {$row['last_name']} <br>".
	// "submission_date: {$row['mob_num']}<br>".
	// "..............................................<br>";
}

	// echo json_encode($return_array,JSON_PRETTY_PRINT);

	



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
}

if($server_tag=='server_tag_csp')
{

if(get_magic_quotes_gpc())
{
	$first_name=$_POST['first_name_csp'];
	$last_name=$_POST['last_name_csp'];
	$password=$_POST['password_csp'];
	$re_enter_password=$_POST['re_enter_password_csp'];
	$mobile_num=$_POST['mobile_num_csp'];
	$email_id=$_POST['email_id_csp'];
	$dob=$_POST['dob_csp'];
	$res_address=$_POST['res_address_csp'];
	$city=$_POST['city_csp'];
	$pincode=$_POST['pincode_csp'];

}
else
{
	$first_name=addslashes($_POST['first_name_csp']);
	$last_name=addslashes($_POST['last_name_csp']);
	$password=addslashes($_POST['password_csp']);
	$re_enter_password=addslashes($_POST['re_enter_password_csp']);
	$mobile_num=addslashes($_POST['mobile_num_csp']);
	$email_id=addslashes($_POST['email_id_csp']);
	$dob=addslashes($_POST['dob_csp']);
	$res_address=addslashes($_POST['res_address_csp']);
	$city=addslashes($_POST['city_csp']);
	$pincode=addslashes($_POST['pincode_csp']);
	
}

// 1: first name field is empty
// 2: last name filed is empty
// 3: passwprd and re_enter_passwprd did nol match
// 4: mobile number is not correct
// 5: email_id is not correct
// 6: dob is not correct
// 7: residential address is not field
// 8: city field is not correct
// 9: pincode field is not correct
 
if ($first_name==NULL)
	{echo "1";
	die();
	}
else if($last_name==NULL)
	{echo "2";
	die();
	}
else if($password!=$re_enter_password)
	{echo "3";
	die();
	}
else if($mobile_num==NULL)
	{echo "4";
	die();
	}
else if($email_id==NULL)
	{echo "5";
	die();
	}
else if($dob==NULL)
	{echo "6";
	die();
	}
else if($res_address==NULL)
	{echo "7";
	die();
	}
else if($city==NULL)
	{echo "8";
	die();
	}
else if($pincode==NULL)
	{echo "9";
	die();
	}



// echo "password: ".$password." re_enter_password: ".$re_enter_password;

define('DB_NAME', 'user_db');
define('DB_USER', 'root');
define('DB_PASSWORD', 'usbw');
define('DB_HOST', 'localhost');


$link =mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);

if(!$link){
	die('could not connect: ' .mysql_error());
}

$db_selected=mysql_select_db(DB_NAME);

if(!$db_selected)
{
	die('can\'t use' .DB_NAME.':' .mysql_error());
}



 function createUID()
{
	 $result="";
	
	for ($i=0; $i <10 ; $i++) { 
	
		if ((rand()%3)==0) {
			$result=$result.chr(rand(48,57));
		}
		elseif (rand()%3==1) {
			$result=$result.chr(rand(65,90));
		}
		elseif (rand()%3==2) {
			$result=$result.chr(rand(97,122));
		}
		
	}
	return $result;
}

 $uid=createUID();
// echo "$uid";

 // $sql = "INSERT INTO tut_table".
// "(tut_title		,tut_author		,submission_date)".
// " VALUES".
// "('$tut_title'	,'$tut_author'	,'$submission_date');";

$sql="INSERT INTO user_data (".
	"uid,first_name,last_name,password,mob_num".
	",email_id,dob,res_add,city,pincode)". 
	"VALUES ".
	"('$uid','$first_name','$last_name','$password','$mobile_num'".
	",'$email_id','$dob','$res_address','$city','$pincode');";

// // // $sql ='UPDATE tut_table SET tut_author="ME" WHERE tut_id=3';

$retval=mysql_query($sql,$link);

if(! $retval)
{
	die('could not insert data'.$retval);
}


$sql="INSERT INTO user_profile (".
	"uid,first_name,last_name,password,mob_num".
	",email_id,cur_bal)". 
	"VALUES ".
	"('$uid','$first_name','$last_name','$password','$mobile_num'".
	",'$email_id','0');";

$retval=mysql_query($sql,$link);

if(! $retval)
{
	die('could not insert data'.$retval);
}

// // if($retval->mysql_num_rows(result)>0)
// // 	echo $retval;

// $number_of_rows=mysql_num_rows($retval);

// echo "$number_of_rows";


// while ($row=mysql_fetch_array($retval,MYSQL_ASSOC)) {
	
// 	echo "idx: {$row['tut_id']} <br>".
// 	"user: {$row['tut_title']} <br>".
// 	"Tutorial_Author: {$row['tut_author']} <br>".
// 	"submission_date: {$row['submission_date']}<br>".
// 	"..............................................<br>";
// }


}

 ?>