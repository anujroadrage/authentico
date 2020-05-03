

<?php

$whitelist = array(
    '127.0.0.1',
    '::1'
);

abstract class QUERY_TAG_VAL  {
    const __default = self::MODE_OUT_OF_BOUND;
    
    const MODE_OUT_OF_BOUND = 0;
	const MODE_MORE_THAN_ONE_RECORD = 1;
	const NO_RECORD = 2;
    
}


	function define_data_base()
	{
		define('DB_NAME', 'preventigo');
		define('DB_USER', 'root');
		define('DB_PASSWORD', 'usbw');
		define('DB_HOST', 'localhost');
	}



	define('PROD_INFO', 'prod_info');
	define('CHAIN_INFO', 'chain_info');
	define('COMP_INFO', 'company_info');


	if(in_array($_SERVER['REMOTE_ADDR'], $whitelist))
	{
		define ('BASE_PATH','/SourceCode/preventigo');
	}
	else
		define ('BASE_PATH','');


	startSession();



/* function redirect_to_page()
{
	if(!isset($_SESSION['uid']))
	{
		
		header('location:/SourceCode/Security/login_page.html');
	}
	else
	{
		header('location:validate.php');
	}
}
 */
 
	function startSession()
	{
		 //Start our session.
		 
		if(!isset($_SESSION['last_action']))
		session_start();

		//Expire the session if user is inactive for 30
		//minutes or more.
		$expireAfterSeconds = 30;

		//Check to see if our "last action" session
		//variable has been set.
		if(isset($_SESSION['last_action'])){
			
			//Figure out how many seconds have passed
			//since the user was last active.
			$secondsInactive = time() - $_SESSION['last_action'];
			
			//Check to see if they have been inactive for too long.
			if($secondsInactive >= $expireAfterSeconds){
				//User has been inactive for too long.
				//not Killing as session vars are cleaned.
				session_unset();
				
				if(empty($_SESSION['counter']))
				{
					$_SESSION=array();
					$_SESSION['counter']=1;
				}
				else
				{
					$_SESSION['counter']++;
				}


				//session_destroy();
			}
			
		}

		//Assign the current timestamp as the user's
		//latest activity
		$_SESSION['last_action'] = time();
	}
	 
 // function printArray($Array, $name)
 // {
	 // echo("<br>");
	 // echo($name."<br>");
	 // echo("lenght=>" .sizeOf($Array) );
	 // echo("<br>");
	 // foreach($Array as $val)
	 // {
		 // echo($val .", ");
	 // }
 // }
 
 
  
	function printArray($Array,$name)
	{

		if(is_array($Array))
		{ 


			echo("<br>");
			foreach($Array as $key => $value)
			{
				echo("name => " . $key );
				echo("<br>");

			printArray($value,"");

			}
		}
		else
			echo "object =>" . $Array;
	}
 
 
	function print2DArray($Array2D, $name)
	{

		if(is_array($Array))
		{

		}
		echo("<br>");
		echo("<br>");
		echo($name."<br>");
		echo("lenght=>" .sizeOf($Array2D) );
		echo("<br>");

		foreach($Array2D as $Array1D)
		{

			echo("<br>");
			echo("lenght=>" .sizeOf($Array1D) );
			echo("<br>");
			echo("name=>". $Array1D["name"]);	
			echo("<br>");
			foreach($Array1D as $val)
			{
				echo($val .", ");
			}
		}
	}
 
	function safe_input($data)
	{
		$data=trim($data);
		
		$data=stripslashes($data);
		
		$data=htmlspecialchars($data);
		
		return $data;	
	}
 

	function debug_print($_debug_val)
	{
		echo($_debug_val);
	}




	function breakCode($_code)
	{
		$len = strlen($_code);
		
		if($len>3)
		$_mode = substr($_code,0,3);


		if($_mode==1)
		{
			if($len<7)
			return 0;

			$_company_code=substr($_code,3,3);
			$_key_code =substr($_code,6);
			
			
			$_SESSION['company_idx']		=$_company_code;
			$_SESSION['company_uid']		=$_key_code;
			$_SESSION['mode']				=$_mode;
					
			//redirect_to_page();
			
			return 1;
			
		}
		elseif($_mode==2)
		{
			if($len<15)
			return 0;
			
			$_company_code			=substr($_code,3,3);
			$_product_profile		=substr($_code,6,3);
			$_product_list			=substr($_code,9,6);
			$_key_code				=substr($_code,15);


			$_SESSION['company_idx']		=$_company_code;
			$_SESSION['product_idx']		=$_product_profile;
			$_SESSION['product_chain_idx']	=$_product_list;
			$_SESSION['product_uid']		=$_key_code;
			$_SESSION['mode']				=$_mode;
				
			//redirect_to_page();
			
			return 1;
		}
		elseif($_mode==3)
		{
			if($len<15)
			return 0; 


			$_company_code			=substr($_code,3,3);
			$_product_profile		=substr($_code,6,3);
			$_product_list			=substr($_code,9,6);
			$_key_code				=substr($_code,15);


			$_SESSION['company_idx']		=$_company_code;
			$_SESSION['product_idx']		=$_product_profile;
			$_SESSION['product_chain_idx']	=$_product_list;
			$_SESSION['product_uid']		=$_key_code;
			$_SESSION['mode']				=$_mode;
				
			//redirect_to_page();
			
			return 1;
		}
		else
		{
		
		$_SESSION['mode']		=$_mode;

		$myObj->message ="mode is out of bound";
		
		$myObj->code=$_SESSION['secure_code'];

		$myJson = json_encode($myObj);

		setQuery(QUERY_TAG_VAL::MODE_OUT_OF_BOUND,'Mode out of bound',$myJson);

		return 2; 
		
		// mode is out of Limit
		//redirect_to_page();
		
	}
	}

function setQuery($tag, $title, $data)
{
	$_sql_query="INSERT INTO query_data ( tag, title,data)
			VALUES ('$tag', '$title', '$data')";
}







 ?>