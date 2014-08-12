<html>
	<head>
		<?php 
     		require 'INC/Head.php';
    	?>
    	<link rel="stylesheet" href="CSS/signin.css">
    	<script type="text/javascript">
    		
    		$(document).ready(function()
			{
				$("#btnSubmit").click(function(event)
				{
					event.preventDefault();
					validarLogin();
				});


		    });

		    function validarLogin()
		    {
		    	$.ajax(
    			{
    				url: 'INC/ValidarLogin.php',
    				type: 'POST',
    				datatype: 'json',
    				data: $("#frmLogin").serialize(),
    			})
    			.done(function(r)
    			{
                    $.each(r, function(index, p)
                    {
                        if(p.vPassword_Pro == $("#Password").val())
                        {
                            window.location = "Main.php";
                        }
                        else
                        {
                            alert("Contraseña incorrecta.");
                        }
                    });
    			})
                .fail(function()
                {
                    alert("Usuario incorrecto.");
                });
		    }
			
    	</script>
	</head>
	<body>
    	<div class="container">
      		<form class="form-signin" role="form" action="" id="frmLogin">
				<h2 class="form-signin-heading">Iniciar sesión</h2>
				<input type="text" class="form-control" placeholder="User" required autofocus id="Usuario" name="Usuario">
				<input type="password"  class="form-control" placeholder="Password" required id="Password" name="Password">
				<button class="btn btn-lg bt-primary btn-block" type="submit" id="btnSubmit">Iniciar sesión</button>
			</form>
    	</div>
	</body>
</html>