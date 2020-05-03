$(function() {

	
	//loadBackVars();
	//alert(_cur_bal);
	

	$('#tap_to_balance').on('click',function(e){

		e.preventDefault();
		$('#tap_to_balance').hide();
		$('#balance').show();
		$('#balance').text("Balanc:"+_cur_bal);

	});

	
	
	/*
	$('#csp_submit_btn').on('click',function(e){

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

	$('#login_submit').on('click',function(e){

		e.preventDefault();
		var $server_tag				='server_tag_login';
		var $username_val			=$('#user_name').val();
		var $password_val			=$('#password').val();

		var order={
			server_tag				:$server_tag,
			user_name				:$username_val,
			password 				:$password_val,
		};

		$.ajax({
			type:'POST',
			url:'php/server.php',
			data:order,
			success:function(newOrder){
				
				login_Authenthicated(newOrder);
							},
			error:function(){
			alert('error in saving data');
			}
		});
	});*/
		// body...
	
	});







	
