

<?php

include 'Utility.php';

define_data_base();

if(!isset($_SESSION))
session_start();


$_code = $_SESSION['secure_code'];
/* echo("<br>secure code ". $_code); */

$code_response = breakCode($_code);
/* echo("<br><br>code response". $code_response); */




if($code_response!=1)  				//0  code string does not have sufficient length
{									//1  code is fine 
	check_false_code();				//2  code length is out of bound
}
	

$link =mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if(!$link){
	die('could not connect: ' .mysqli_error());
}


$_mode = $_SESSION['mode'];

/* print((int)$_SESSION['mode']); */

 if($_mode==1)
{
	$_company_idx	=$_SESSION['company_idx'];
	$_company_uid	=$_SESSION['company_uid'];
	$_mode			=$_SESSION['mode'];
	
	
	$_sql_query="SELECT * FROM company_info WHERE idx='$_company_idx' AND uid = '$_company_uid'";		
	
	/* echo("<br><br>" .$_sql_query);	 */
	
	$retval_table=mysqli_query($link,$_sql_query);
	
	/* echo("<br><br>" .$retval_table); */
	
	if(!$retval_table)
	{
		die('could not fetch data for product info');
	}
	
	$number_of_rows=mysqli_num_rows($retval_table);
	

	
	
	if($number_of_rows==1)
	{
		/*echo("page1");
		$_page_to_redirect='/Security/company_page.php';
		header('location:' . BASE_PATH .'/company.html'); */
		
		$rows=mysqli_fetch_array($retval_table,MYSQL_ASSOC);
		$_SESSION[COMP_INFO]= $rows;
		
		redirect_num_of_rows(1,'/company.html');
	}
	else {
		
		//echo("page2");
		redirect_num_of_rows($number_of_rows,'' );
	
		/* 
		more_then_one_product_found();
		$_sql_query="INSERT INTO query_data ( tag, title,data)
			VALUES ('1', 'TWO ROWS', '')"; */
		//redirect_num_of_rows(2,"");
	}
 
}
elseif($_mode==2 OR $_mode==3)
{
	
	$_company_key		=(int)$_SESSION['company_idx'];
	$_prod_idx			=(int)$_SESSION['product_idx'];
	$_prod_list_idx		=(int)$_SESSION['product_chain_idx'];
	$_key_code			=$_SESSION['product_uid'];
	$_mode				=$_SESSION['mode'];
	
	
	if($_mode==2)
	{
	$_sql_query1="SELECT * FROM product_info WHERE company_idx='$_company_key' AND idx='$_prod_idx' AND uid = '$_key_code'";		
	$_sql_query2="SELECT sold_status FROM product_chain_info WHERE company_idx='$_company_key' AND product_idx='$_prod_idx' AND idx='$_prod_list_idx'";
	}
	elseif($_mode==3)
	{
	$_sql_query1="SELECT * FROM product_info WHERE company_idx='$_company_key' AND idx='$_prod_idx' ";		
	$_sql_query2="SELECT sold_status FROM product_chain_info WHERE company_idx='$_company_key' AND product_idx='$_prod_idx' AND idx='$_prod_list_idx' AND uid = '$_key_code'";
	
	}
	/* echo("<br><br>" .$_sql_query1);
	echo("<br><br>" .$_sql_query2);
	 */
	
	$retval_table1=mysqli_query($link,$_sql_query1);
	
	//echo("<br><br>" .$retval_table1);
	
	if(!$retval_table1)
	{
		die('could not fetch data for product info');
	}
	
	
	$retval_table2=mysqli_query($link,$_sql_query2);
	//echo("<br><br>" .$retval_table2);
	
	
	if(!$retval_table2)
	{
		die('could not fetch data for product list info');
	}
	
	$number_of_rows1=mysqli_num_rows($retval_table1);
	$rows1=mysqli_fetch_array($retval_table1,MYSQL_ASSOC);
	
	$number_of_rows2=mysqli_num_rows($retval_table2);
	$rows2=mysqli_fetch_array($retval_table2,MYSQL_ASSOC);
 	
	//$_page_to_redirct="/SourceCode/Security/product_info_page.html";
	
	
	
	if($number_of_rows1==1 AND $number_of_rows2==1)
	{
		$_SESSION[PROD_INFO]=$rows1;
		$_SESSION[CHAIN_INFO]=$rows2;
		//header('location:' . BASE_PATH . '/product-detail.html');
		redirect_num_of_rows(1,'/product-detail.html');
	}
	else{
		
		//echo("page2");
		if($number_of_rows1 != 1)
			redirect_num_of_rows($number_of_rows1);
	
		if($number_of_rows2 != 1)
			redirect_num_of_rows($number_of_rows2);
	}
}

else
{
	check_false_code();
	
} 
 
 
  /* This will check if user has entered false code mannually.
 If it is entered more than 3 times then false_code_page will be loaded
  */

function check_false_code()
{
	if(!isset( $_SESSION['manual_input']) || empty($_SESSION['manual_input']))
	{
		$_SESSION['manual_input']=0;
	}
	

	if(!empty( $_SESSION['manual_input']) && $_SESSION['manual_input']<3)  
		header('location:' . BASE_PATH . '/search-product.php');
	else
		header('location:' . BASE_PATH . '/false_page.html');
	
}



/* This will redirect to approprite page depending on number if rows exist in dataBase for unique qr code.
number of rows =0  -> no data in database for that code means false code.
number of rows =1  -> one row is found for that code hence right code.
number of rows >1  -> more than one rows exist for that code. */

function redirect_num_of_rows($_num_of_rows,$_page_to_redirect)
{
	
	/* echo("<br><br>" .$_num_of_rows);
	echo("<br><br>" .$_page_to_redirect); */

	if ($_num_of_rows==0) {
		
		$myObj->code = $_SESSION["secure_code"];
		$myJson = json_encode($myObj);
		setQuery(QUERY_TAG_VAL::NO_RECORD,'No record',$myJson);
		
		check_false_code();
	
	}
	elseif($_num_of_rows==1)
	{
		header('location:' . BASE_PATH . '' . $_page_to_redirect);
	}
	else
	{
		$myObj->code = $_SESSION["secure_code"];
		$myJson = json_encode($myObj);
		setQuery(QUERY_TAG_VAL::MORE_THAN_ONE_RECORD,' more than one record',$myJson);
	}
}


 ?>