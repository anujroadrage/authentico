
var BASE_PATH = '';

if (location.hostname === "localhost" || location.hostname === "127.0.0.1")
 BASE_PATH='';

$(function() {

checkUserLoginStatus();
	
	/*
	 mode 
		1	:	for normal login
		2	:	for facebook login
		3	:	for google login
		4	:	for twitter login
		
	*/
	
	
function checkUserLoginStatus()
{
	var parameters={tag_idx:1};
		$.get('/get_data',parameters,function(data){
			// var _response = JSON.parse(data);
			if(data.result==1){
				window.location.href= _response.redirect_page_url;
			}
			else if(data.result==0)
			{
				$('#myModal').modal('toggle');
			}
		});
		
	
}
	/*  $('#login_form').hide();
	 $.ajax({
	 		type:'GET',
	 		url:'php/server.php',
	 		success:function(newOrder){
     	 document.write(newOrder);
	 		alert('success');
	 		},error:function(){
	 		alert('error');
	 		}
	 });

	var _uid;
	var _first_name;
	var _last_name;
	var _mobile_num;
	var _email_id;
	var _cur_bal;*/

	// $('#home-page').show();

 	$('#btn-login').on('click',function (e) {

		e.preventDefault();

		$('#login-alert').hide();
		
		var _username		=$('#login-username').val();
		var _password		=$('#login-password').val();
		var _remember_me	=$('#login-remember').val();
		
		var order={
			mode					:1,
			password				:_password,
			username				:_username,
			remember				:_remember_me
		};

	$.get('/login',order,function(data){

		if(data.result==1){
			if(data.redirect_idx==1)
			{
				$.get('/rdr',{c:data.code},(data)=>{
					document.innerHTML = data; 
				});
			}

			$('#myModal').modal('toggle');
		}
		else
		{
			$('#login-alert').show();
			document.getElementById("login-alert").innerHTML="username or password is incorrect";
		}
	});
		
	}); 
	
	$('#btn-fblogin').on('click',function (e) {

		e.preventDefault();
		var _remember_me	=$('#login-remember').val();
		var order={
			mode					:2,
			remember				:_remember_me
		};
	// $.ajax({
	// 		type:'POST',
	// 		url:window.BASE_PATH + '/php/login_page.php',
	// 		data:order,                                           
	// 		success:function(response){
				
	// 			window.location.href=response;
	// 			$('#myModal').modal('toggle');
					
				
	// 						},
	// 		error:function(){
	// 		alert('error in saving data');
	// 		}
	// 	});

	$.get('/login',order,function(data){

		// var _response = JSON.parse(response);
		if(data.result==1){
		window.location.href= _response.redirect_page_url;
		$('#myModal').modal('toggle');
		}
		else
		{
			$('#login-alert').show();
			document.getElementById("login-alert").innerHTML="incorrect details";
		}
	});


	});
	
	$('#btn-Gmail-login').on('click',function (e) {

		e.preventDefault();
		var _remember_me	=$('#login-remember').val();
		var order={
			mode					:3,
			remember				:_remember_me
		};
	// $.ajax({
	// 		type:'POST',
	// 		url:window.BASE_PATH + '/php/login_page.php',
	// 		data:order, 
	// 		//crossDomain: true,
		                                          
	// 		success:function(response){
				
	// 			alert(response);
	// 			//window.location.href=response;
	// 			$('#myModal').modal('toggle');
					
				
	// 						},
	// 		error:function(){
	// 		alert('error in saving data');
	// 		}
	// 		//beforeSend: setHeader
	// 	});

	$.get('/login',order,function(data){

		// var _response = JSON.parse(response);
		if(data.result==1){
		window.location.href= _response.redirect_page_url;
		$('#myModal').modal('toggle');
		}
		else
		{
			$('#login-alert').show();
			document.getElementById("login-alert").innerHTML="incorrect details";
		}
	});

	});
	
	$('#btn-Twitter-login').on('click',function (e) {

		e.preventDefault();
		var _remember_me	=$('#login-remember').val();
		var order={
			mode					:4,
			remember				:_remember_me
		};
	// $.ajax({
	// 		type:'POST',
	// 		url:window.BASE_PATH + '/php/login_page.php',
	// 		data:order,                                           
	// 		success:function(response){
				
	// 			alert(response);
	// 			//window.location.href=response;
	// 			$('#myModal').modal('toggle');
					
				
	// 						},
	// 		error:function(){
	// 		alert('error in saving data');
	// 		}
	// 	});

	$.get('/login',order,function(data){

		// var _response = JSON.parse(response);
		if(data.result==1){
		window.location.href= _response.redirect_page_url;
		$('#myModal').modal('toggle');
		}
		else
		{
			$('#login-alert').show();
			document.getElementById("login-alert").innerHTML="incorrect details";
		}
	});

	});

	$('#btn-signup').on('click',function (e) {

		e.preventDefault();

		$('#login-alert').hide();
		
		var _firstname		=$('#signup-firstname').val();
		var _lastname		=$('#signup-lastname').val();
		var _email			=$('#signup-email').val();
		var _password		=$('#signup-password').val();

		var order={
			mode					:11,
			firstname				:_firstname,
			lastname				:_lastname,
			email					:_email,
			password				:_password
		};

		$.get('/login',order,function(data){
			// var _response = JSON.parse(response);
			if(data.result==1){
				window.location.href= _response.redirect_page_url;
				$('#myModal').modal('toggle');
			}
			else
			{
				$('#login-alert').show();
				document.getElementById("login-alert").innerHTML="username or password is incorrect";
			}
		});
		
	}); 


	});

function login_Authenthicated(response) {
	
/* var response_json_decoded=JSON.parse(response);

 _uid			=	response_json_decoded.uid;
 _first_name	=	response_json_decoded.first_name;
_last_name		=	response_json_decoded.last_name;
_mobile_num		=	response_json_decoded.mobile_num;
_email_id		=	response_json_decoded.email_id;
_cur_bal		=	response_json_decoded.cur_bal+1; */

//alert(response);

window.location.href=response;

/* if(response_json_decoded.result==1)
{
saveVariable();
window.location.href="http://localhost:8080/sourcecode/RechargeDoor/home_page.php";
} */
	// if(response_json_decoded.result==0)
	// {
	// 	alert("User Name or password is wrong"+userCount);
	// 	$('#login_result_CSP').show();
	// 	$('#login_error_text').html('User Name or password is wrong');
	// }
	// else if(response_json_decoded.result==1){
	// 	alert("Login Successfull"+response_json_decoded);
	// 	_uid=response_json_decoded.uid;
	// 	_first_name=response_json_decoded.first_name;
	// 	_last_name=response_json_decoded.last_name;
	// 	_mobile_num=response_json_decoded.mobile_num;
	// 	_email_id=response_json_decoded.email_id;
	// 	_cur_bal=response_json_decoded.curr_bal;

	// }
}

function new_csp_response(isbecome_user) {

// 1: firts name field is empty
// 2: last name filed is empty
// 3: passwprd and re_enter_passwprd did nol match
// 4: mobile number is not correct
// 5: email_id is not correct
// 6: dob is not correct
// 7: residential address is not field
// 8: city field is not correct
// 9: pincode field is not correct

	if(isbecome_user==1)
		alert('first name field is empty');
	else if(isbecome_user==2)
		alert('last name filed is empty ');
	else if(isbecome_user==3)
		alert('passwprd and re_enter_passwprd did nol match');
	else if(isbecome_user==4)
		alert('mobile number is not correct');
	else if(isbecome_user==5)
		alert('email_id is not correct');
	else if(isbecome_user==6)
		alert('email_id is not correct');
	else if(isbecome_user==7)
		alert('residential address is not filled');
	else if(isbecome_user==8)
		alert('city is not correct');
	else if(isbecome_user==9)
		alert('pincode is not correct');
	else
	{
		alert(isbecome_user);
	}


	
}