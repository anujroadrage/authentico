

<?php
//session_start();
 
  // change the following paths if necessary
  
 /*  if( ! defined('BASEPATH'))
  define('BASEPATH',dirname(__FILE__));

  $config   = dirname(__FILE__) . '/hybridauth-2.9.6/hybridauth/config.php';
  // require_once( "hybridauth-2.9.6/hybridauth/Hybrid/Auth.php" );
 require_once( "HybridIgniter-master/application/controllers/HAuth.php"); 
 // $hybridauth = new HAuth();
   try{
  	// create an instance for Hybridauth with the configuration file path as parameter
  	$hybridauth = new HAuth();
 
  	// try to authenticate the user with Google,
  	// user will be redirected to Google for authentication,
  	// if he already did, then Hybridauth will ignore this step and return an instance of the adapter
  	$Google = $hybridauth->login( "Twitter" );
 
  	// get the user profile
  	$Google_user_profile = $Google->getUserProfile();
 
  	echo "Ohai there! U are connected with: <b>{$Google->id}</b><br />";
  	echo "As: <b>{$Google_user_profile->displayName}</b><br />";
  	echo "And your provider user identifier is: <b>{$Google_user_profile->identifier}</b><br />";
 
  	// debug the user profile
  	print_r( $Google_user_profile );
 
  	// exp of using the Google social api: Returns settings for the authenticating user.
  	$account_settings = $Google->api()->get( 'account/settings.json' );
 
  	// print recived settings
  	echo "Your account settings on Google: " . print_r( $account_settings, true );
 
  	// disconnect the user ONLY form Google
  	// this will not disconnect the user from others providers if any used nor from your application
  	echo "Logging out..";
  	$Google->logout();
  }
  catch( Exception $e ){
  	// Display the recived error,
  	// to know more please refer to Exceptions handling section on the userguide
  	switch( $e->getCode() ){
  	  case 0 : echo "Unspecified error."; break;
  	  case 1 : echo "Hybriauth configuration error."; break;
  	  case 2 : echo "Provider not properly configured."; break;
  	  case 3 : echo "Unknown or disabled provider."; break;
  	  case 4 : echo "Missing provider application credentials."; break;
  	  case 5 : echo "Authentification failed. "
  	              . "The user has canceled the authentication or the provider refused the connection.";
  	           break;
  	  case 6 : echo "User profile request failed. Most likely the user is not connected "
  	              . "to the provider and he should authenticate again.";
  	           $Google->logout();
  	           break;
  	  case 7 : echo "User not connected to the provider.";
  	           $Google->logout();
  	           break;
  	  case 8 : echo "Provider does not support this feature."; break;
  	}
 
  	// well, basically your should not display this to the end user, just give him a hint and move on..
  	echo "<br /><br /><b>Original error message:</b> " . $e->getMessage();
  }  */
require_once( "Utility.php");
$config=dirname(__FILE__) . '/hybridauth-2.9.6/hybridauth/config.php';
require_once("hybridauth-2.9.6/hybridauth/Hybrid/Auth.php");

define_data_base();

startSession();


if(empty($_SESSION['counter']))
{
	$_SESSION=array();
	$_SESSION['counter']=1;
}
 
// header('location:' . BASE_PATH . '/search-product.html');

 if($_SERVER['REQUEST_METHOD']=="POST")
{
	
	// mode 
	//	1	:	for normal login
	//	2	:	for facebook login
	//	3	:	for google login
	//	4	:	for Twitter login
		
	
	if(safe_input($_POST['mode'])==1)     
	{
		$user_name=safe_input($_POST['username']);
		$password=safe_input($_POST['password']);

		$link =mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

		if(!$link){
			die('could not connect: ' .mysqli_error());
		}

			
		$query="SELECT * FROM user_info WHERE user_id='$user_name' AND password ='$password'";

		$retval=mysqli_query($link,$query);
		
			//echo ($retval);
		if(! $retval)
		{
			die('Failed to fetch query');
		}

		$number_of_rows=mysqli_num_rows($retval);
		//debug_print($number_of_rows);

		if ($number_of_rows==0) 
		{
			
			$response = array(
				'result'=>'0',
				'message'=>'No record found for the user'
			);
			echo(json_encode($response));
			exit;

		}
		elseif($number_of_rows==1)
		{
			$_SESSION['uid']=$user_name;
			
			if(!empty($_SESSION['secure_code']))
			{
				$response = array(
					'result'=>'1',
					'redirect_page_url'=>BASE_PATH . '/php/validate.php'
				);
				
				//header('location:' . BASE_PATH . '/php/validate.php');
			}
			else
			{
				$response = array(
					'result'=>'1',
					'redirect_page_url'=>BASE_PATH . '/search-product.php'
				);
				
				//header('location:' . BASE_PATH . '/search-product.html');
			}
			
			echo(json_encode($response));
			exit;
		}
		else
		{
			$response = array(
				'result'=>'2',
				'message'=>'More than one record found'
			);
			echo(json_encode($response));
			exit;
		}
	}
	else if(safe_input($_POST['mode'])==2) 
	{}
	else if(safe_input($_POST['mode'])==3) 
	{
		//echo "Flag1";
		try{
			
			
			$hybridauth = new Hybrid_Auth($config);
			$adapter =Hybrid_Auth::authenticate("Google");
			$user_Profile = $adapter->isUserConnected();

				echo $user_Profile;
			/*
			$user_profile = $adapter->getUserProfile();
			echo "I am $adapter login" . $user_profile;
			echo ("debug_mode => " . Hybrid_Auth::$config['base_url']);
			*/

		}
		catch(Exception $e){
			
			echo("Error => " . $e);
			
		} 
	
	}
	else if(safe_input($_POST['mode'])==4) 
	{
		
		
		
	}


}
 
 ?>