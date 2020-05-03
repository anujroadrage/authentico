$(function() {



	$('#home-page').show();

	$('#login_btn_Home_Page').on('click',function (e) {

		e.preventDefault();

		$('#welcome-login').hide();
		$('#login_form').show();
	});

	$('#become_csp_btn').on('click',function(e){

		e.preventDefault();

		$('#csp_form').show();
		$('#login_form').hide();

	});


	$('#login_submit').on('click',function(e){

		e.preventDefault();
		var $username_val			=$('#user_name').val();
		var $password_val			=$('#password').val();

		var order={
			user_name				:$username_val,
			password 				:$password_val,
		};

		$.ajax({
			type:'POST',
			url:'php/login_page.php',
			data:order,
			success:function(newOrder){
				
				login_Authenthicated(newOrder);
							},
			error:function(){
			alert('error in saving data');
			}
		});
	});
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

 alert(response);


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