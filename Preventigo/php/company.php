

<?php

/*		
		MODE	1			:	Fetch the products
		MODE	2			:	for facebook login
		MODE	3			:	for twitter login
		
*/

include 'Utility.php';

define_data_base();

if(!isset($_SESSION))
session_start();




if(empty($_SESSION['counter']))
{
	$_SESSION=array();
	$_SESSION['counter']=1;
}
 
$link =mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);

if(!$link){
	die('could not connect: ' .mysql_error());
}


$db_selected=mysql_select_db(DB_NAME);

if(!$db_selected)
{
	die('can\'t use' .DB_NAME.':' .mysql_error());
} 
 
 
	$_company_key	=$_SESSION['company_key'];
	$_key_code		=$_SESSION['key_code'];
	$_mode			=$_SESSION['mode'];
		
	$sql="SELECT * FROM user_profile WHERE comp_key='$_company_key'";

	$retval=mysql_query($sql,$link);
			
			//echo ($retval);
	if(! $retval)
	{
		die('could not create data base');
	}

	
		$number_of_rows=mysql_num_rows($retval);
		
		print2DArray($retval,"poducts");
		
		//debug_print($number_of_rows);

		/* if($)
		if ($number_of_rows==0) {
			debug_print("FAIL");

		}
		elseif($number_of_rows==1)
		{
			$_SESSION['uid']=$user_name;
			//debug_print($_SESSION['uid']);
			
			
			
			if(!empty($_SESSION['secure_code']))
				echo(BASE_PATH . '/php/validate.php');
				//header('location:' . BASE_PATH . '/php/validate.php');
			else
				echo(BASE_PATH . '/search-product.html');
				//header('location:' . BASE_PATH . '/search-product.html');
		}
		else
		{
			
		}
	 */


}
 
 ?>