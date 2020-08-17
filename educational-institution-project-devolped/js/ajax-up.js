$(document).ready(function(e) 
{

	$('#login').click(function()
	{
		var username=$("#username").val();
		var password=$("#password").val();
		var dataString = 'username='+username+'&password='+password;
		//document.write(dataString);
		if($.trim(username).length>0 && $.trim(password).length>0)
		{
			$.ajax({
                url: "login.php",
                type: "POST",
                data: dataString,
				cache: false,
				//beforeSend: function(){ $("#login").val('Connecting...');},
                success: function(resp){
					$('#resultado').html(resp)
                }
            });
		}
		return false;
	});

});
