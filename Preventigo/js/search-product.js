


var BASE_PATH = '';

if (location.hostname === "localhost" || location.hostname === "127.0.0.1")
 BASE_PATH='/SourceCode/preventigo';


$(function() {
	
	
	
   
	
	
	$('#serial_num_submit').on('click',function (e) {

		e.preventDefault();

		
		
		var _code		=$('#serialNo').val();
		
		var order={
			mode					:1,
			code					:_code,
			tag 					:'manual_input'
		};
		
	$.ajax({
			type:'POST',
			url:window.BASE_PATH + '/php/rdr.php',
			data:order,                                           
			success:function(response){
				
				var _response = JSON.parse(response);
				if(_response.result==1){
				window.location.href= _response.redirect_page_url;
				$('#myModal').modal('toggle');
				}
				else
				{
					
					$('#login-alert').show();
					document.getElementById("login-alert").innerHTML="username or password is incorrect";
				}
				
			},
			error:function(){
			alert('error in saving data');
			}
		});
		
	});

});