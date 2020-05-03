

<?php





include 'Utility.php';

	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		$_SESSION['secure_code']=safe_input($_POST['code']);
		
		
		
		if(isset($_POST['tag']) && safe_input($_POST['tag'])=='manual_input'){
		
			if(!isset( $_SESSION['manual_input']) || empty($_SESSION['manual_input']))
			{
			
				$_SESSION['manual_input']=1;
			}
			else
			{
				
				$_SESSION['manual_input']++;
			}
		}
	
		
		if(empty($_SESSION['uid']))
		{
			$response = array(
					'result'=>'1',
					'redirect_page_url'=>BASE_PATH . '/index.html',
					'manual_input'=>$_SESSION['manual_input']
				);
		}
		else
		{
			$response = array(
					'result'=>'1',
					'redirect_page_url'=>BASE_PATH . '/php/validate.php',
					'manual_input'=>$_SESSION['manual_input']
				);
		}
		
		echo(json_encode($response));
		exit;
		
	}
	else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	
		
		$_SESSION['secure_code']=safe_input($_GET['c']);
		
		if(empty($_SESSION['uid']))
		{
			header('location:' . BASE_PATH . '/index.html'); 
		}
		else
		{
			header('location:' . BASE_PATH . '/php/validate.php');									// redirect to validate page
		}
	}
	
	
	
	

	/* $dom=new DOMDocument();
	$dom->loadHTML("location:' . BASE_PATH . '/index.html");
	$element = $dom->getElementById('myModal');
	
	echo"<script> $element.show(); </script>"; */
	
	
	
	/* echo"<script> alert('asda'); </script>"; 
	 echo"<script type='text/javascript'> $(document).ready(function(){
		$('#mymodel').show();
	});
	</script>"; */ 
	
	

 ?>