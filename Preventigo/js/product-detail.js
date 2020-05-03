$(function() {



init();

function init()
{
//var flag = window.location.reload(true);

	$.ajax({
	type:'GET',
	url:'php/prod_info.php',
	success:function(data, status){
	setPageVars(data,status);
	},
	error:function(){
	alert('error in saving data');
	}
	});
}

function setPageVars(data,status)
{


try{
var response_json=JSON.parse(data);

var idx				=	response_json.idx;
var company_idx		=	response_json.company_idx;
var uid				=	response_json.uid;
var image_url		=	response_json.image_url;
var name			=	response_json.name;
var company_name	=	response_json.company_name;
var average_ratings	=	response_json.average_ratings;
var total_ratings	=	response_json.total_ratings;
var total_review	=	response_json.total_review;
var 5star_count		=	response_json.5star_count;
var 4star_count		=	response_json.4star_count;
var 3star_count		=	response_json.3star_count;
var 2star_count		=	response_json.2star_count;
var 1star_count		=	response_json.1star_count;

var data			=	JSON.parse(response_json.data);



var carousal_class	=	document.getElementById("carousel-inner");
var div;
var img;

if(pics_count>0)
for(var idx=1;idx<=pics_count;idx++)
{
div = document.createElement("div");

if(idx==1)
div.class="item active";
else
div.class="item";

img= document.createElement("img");
img.src=imgURL+""+idx+".jpg";
img.alt="image"+idx;


div.appendChild(img);
carousal_class.appendChild(div);
}

document.getElementById("product_name").innerHTML=response_json.name;
document.getElementById("company_name").innerHTML=response_json.comp_name;
//document.getElementById("model").innerHTML=response_json.mfd;
document.getElementById("price").innerHTML=response_json.mrp;
document.getElementById("details").innerHTML=response_json.remarks;

if(response_json.sold_status!=0)
{
document.getElementById("auth_status").innerHTML="Product might be fake";
document.getElementById("auth_status").style.color = 'red';
}
else if(response_json.sold_status==0)
{
document.getElementById("auth_status").innerHTML="product id authenticated";
document.getElementById("auth_status").style.color = 'Green';
}
}catch(err){}
//alert("Data: " + data + "\nStatus: " + status);
}

/* 	$('#home-page').show();

$('#login_btn_Home_Page').on('click',function (e) {

e.preventDefault();

$('#welcome-login').hide();
$('#login_form').show();
});
*/

/*

$('#become_csp_btn').on('click',function(e){

e.preventDefault();

$('#csp_form').show();
$('#login_form').hide();

});



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

/*

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
}); */



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
});

