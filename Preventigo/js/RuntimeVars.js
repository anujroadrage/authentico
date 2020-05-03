$(function() {

	// $('#login_form').hide();
	// $.ajax({
	// 		type:'GET',
	// 		url:'php/server.php',
	// 		success:function(newOrder){
     
 //     		document.write(newOrder);
	// 		alert('success');
	// 		},error:function(){
	// 		alert('error');
	// 		}
	// });
	
	

	var _uid;
	var _first_name;
	var _last_name;
	var _mobile_num;
	var _email_id;
	var _cur_bal;

	



	
	
	
	
		// body...
	});


	function saveVariable()
	{
	if(typeof(Storage)!=="undefined")
	{
	localStorage.uid=_uid;
	localStorage.firstName=_first_name;
	localStorage.lastName=_last_name;
	localStorage.mobileNum=_mobile_num;
	localStorage.emailId=_email_id;
	localStorage.curBal=_cur_bal;
	}
	}

	function loadBackVars()
	{

	_uid= localStorage.uid;
	_first_name= localStorage.firstName;
	_last_name= localStorage.lastName;
	_mobile_num= localStorage.mobileNum;
	_email_id= localStorage.emailId;
	_cur_bal= localStorage.curBal;

	}



