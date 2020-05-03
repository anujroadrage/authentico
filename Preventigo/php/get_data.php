

<?php

include 'Utility.php';


if($_SERVER['REQUEST_METHOD']=="POST")
{
	$tag_idx=0;
	
	if(!empty($_POST['tag_idx']))
	$tag_idx=safe_input($_POST['tag_idx']);
	
	switch($tag_idx)
	{
		/*  check whether user is logged in
		if LOGGED IN and has SECURE CODE then redirect to validate.php
		 else redirect to enter the code
		 */
		case 1:    
		{
			if(!empty($_SESSION['uid']))
			{
				//echo('uid => ' . $_SESSION['uid'] . 'server_add => ' . $_SERVER['REMOTE_ADDR']);
				
				if(!empty($_SESSION['secure_code']))
				{
					$response = array(
					'result'=>'1',
					'redirect_page_url'=>BASE_PATH . '/php/validate.php'
					);
				}
				else
				{
					$response = array(
					'result'=>'1',
					'redirect_page_url'=>BASE_PATH . '/search-product.html'
					);
					
				}
				
			}
			else
			{
				
				$response = array(
					'result'=>'0'
					);
			}
				echo(json_encode($response));
				exit;	
		}
		break;
		case 2:
		{}
		break;
		case 3:
		{}
		break;
		case 4:
		{}
		break;
		case 5:
		{}
		break;
		case 6:
		{}
		break;
		case 7:
		{}
		break;
		case 8:
		{}
		break;
		case 9:
		{}
		break;
		case 10:
		{}
		break;
		case 11:
		{}
		break;
		case 12:
		{}
		break;
	}
	
}




	
	

 ?>