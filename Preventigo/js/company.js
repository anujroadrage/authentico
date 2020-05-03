

$(function() {

checkUserLoginStatus();

function checkUserLoginStatus()
{
	var order={
			tag_idx				:1
		};
	$.ajax({
			type:'POST',
			url:window.BASE_PATH+'/php/get_data.php',
			data:order,                                           
			success:function(response){
				
				if(response==0)
				{
					
					$('#myModal').modal('toggle');
				}
							},
			error:function(){
			alert('error in saving data');
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

		var _username		=$('#login-username').val();
		var _password		=$('#login-password').val();
		var _remember_me	=$('#login-remember').val();
		
		var order={
			mode					:1,
			password				:_password,
			username				:_username,
			remember				:_remember_me
		};
	$.ajax({
			type:'POST',
			url:'/SourceCode/Preventigo/php/login_page.php',
			data:order,                                           
			success:function(response){
				
				
				window.location.href=response;
				$('#myModal').modal('toggle');
					
				
							},
			error:function(){
			alert('error in saving data');
			}
		});
	
		
		
	});

	/* $('#become_csp_btn').on('click',function(e){

		e.preventDefault();

		$('#csp_form').show();
		$('#login_form').hide();

	});  */

/* 	$('#csp_submit_btn').on('click',function(e){ 

		e.preventDefault();

		var $server_tag				='server_tag_csp';
		var $first_name_csp			= $('#first_name_csp').val();
		var $last_name_csp			= $('#last_name_csp').val();
		var $password_csp 			= $('#password_csp').val();
		var $re_enter_password_csp	= $('#re_enter_password_csp').val();
		var $mobile_num_csp			= $('#mobile_num_csp').val();
		var $email_id_csp			= $('#email_id_csp').val();
		var	$dob_csp				= $('#dob_csp').val();
		var $res_address_csp		= $('#res_address_csp').val();
		var $city_csp				= $('#city_csp').val();
		var $pincode_csp			= $('#pincode_csp').val();
		// var $pancard_num_csp		= $('#pancard_num_csp').val();
		// var $aadhar_num_csp			= $('#aadhar_num_csp').val();
		// var $pancard_pic_csp		= $('#pancard_pic_csp').val();
		// var $aadhar_pic_csp			= $('#aadhar_pic_csp').val();

		var order={

			server_tag				: $server_tag,
			first_name_csp			: $first_name_csp,
			last_name_csp			: $last_name_csp,
			password_csp 			: $password_csp,
			re_enter_password_csp	: $re_enter_password_csp,
			mobile_num_csp			: $mobile_num_csp,
			email_id_csp			: $email_id_csp,
			dob_csp					: $dob_csp,
			res_address_csp			: $res_address_csp,
			city_csp				: $city_csp,
			pincode_csp				: $pincode_csp,
			// pancard_num_csp			:$pancard_num_csp,
			// aadhar_num_csp			:$aadhar_num_csp,
			// pancard_pic_csp			:$pancard_pic_csp,
			// aadhar_num_csp			:$aadhar_pic_csp

		};

		$.ajax({
			type:'POST',
			url:'php/server.php',
			data:order,
			success:function(response){
				
				new_csp_response(response);
							},
			error:function(){
			alert('error in saving data');
			}
		});

	});
	*/
	
	
	/* $('#login_submit').on('click',function(e){

		e.preventDefault();
		var $username_val			=$('#user_name').val();
		var $password_val			=$('#password').val();

		var order={
			user_name				:$username_val,
			password 				:$password_val,
		};

		$.ajax({
			type:'POST',
			url:'/SourceCode/Security/php/login_page.php',
			data:order,
			success:function(newOrder){
				
				login_Authenthicated(newOrder);
							},
			error:function(){
			alert('error in saving data');
			}
		});
	}); */
		// body...
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