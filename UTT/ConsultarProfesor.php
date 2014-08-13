<html>
	<head>
		<?php 
     		require 'INC/Head.php';
    	?>
    	<script type="text/javascript">

    		$(document).ready(function()
			{

		        $("#btnBuscar").click(function(event)
	    		{
	    			event.preventDefault();
	    			limpiarTabla();
	    			llenarTabla();
	    		}); 

	    		$("#tbProfesor").on("click", "button", function(event)
	    		{
	    			if($(this).html() == "Modificar")
	    			{
	    				$("#mProfesor").modal("show");
	    				cargarProfesor($(this).val());
	    			}
	    			else if($(this).html() == "Eliminar")
	    			{
	    				if(confirm("Estas seguro que deseas eliminar este Profesor"))
	    				{
	    					eliminarProfesor($(this).val());
	    					limpiarTabla();
	    					llenarTabla();
	    				}
	    			}
	    		});	 

	    		$("#btnGuardar").click(function(event)
	    		{
	    			modificarProfesor($(this).val());
	    			$("#mProfesor").modal("hide");
	    			limpiarTabla();
	    		});

		    });
			
			function llenarTabla()
			{
				$.ajax(
		        {
		        	url: 'INC/SeleccionProfesor2.php',
		          	type: 'POST',
		          	datatype: 'json',
		          	data: $("#frmProfesor").serialize(),
		        })
		        .done(function(r)
		        {
		          	$.each(r, function(index, p)
		          	{
		          		if(p.iIDProfesor_Pro != 1)
            			{              
			            	$("#tbProfesor tbody").append("<tr>\
			            		<td>"+p.iIDProfesor_Pro+"</td>\
			            		<td>"+p.vApellidoPaterno_Pro+" "+p.vApellidoMaterno_Pro+" "+p.vNombre_Pro+"</td>\
			            		<td><button class='btn btn-sm btn-primary' value='"+p.iIDProfesor_Pro+"'>Modificar</button></td>\
			            		<td><button class='btn btn-sm btn-primary' value='"+p.iIDProfesor_Pro+"'>Eliminar</button></td>\
			            		</tr>");
		            	}
		          	});
		        });
			}

			function cargarProfesor(IDPro)
			{
				var jProfesor=
				{
					IDProfesor: IDPro,
					Nombre: "",
					Ape_Pat: "",
				};
      			$.ajax(
		        {
		        	url: 'INC/SeleccionProfesor2.php',
		          	type: 'POST',
		          	datatype: 'json',
		          	data: jProfesor,
		        })
		        .done(function(r)
		        {
		          	$.each(r, function(index, p)
		          	{
		          		$("#mNombre").val(p.vNombre_Pro);
		          		$("#mApe_Pat").val(p.vApellidoPaterno_Pro);
		          		$("#mApe_Mat").val(p.vApellidoMaterno_Pro);
		          		$("#mEmail").val(p.vCorreo_Pro);
		          		$("#mTelefono").val(p.cTelefono_Pro);		          		
		          		$("#btnGuardar").val(p.iIDProfesor_Pro);
		          	});
		        });
			}

			function modificarProfesor(IDPro)
			{
				var jProfesor=
					{
						IDProfesor: IDPro,
						Nombre: $("#mNombre").val(),
						Ape_Pat: $("#mApe_Pat").val(),
		          		Ape_Mat: $("#mApe_Mat").val(),
		          		Email: $("#mEmail").val(),
		          		Telefono: $("#mTelefono").val(),
					};
				$.ajax(
		        {
		        	url: 'INC/ModificarProfesor.php',
		          	type: 'POST',
		          	datatype: 'json',
		          	data: jProfesor,
		        })
		        .done(function(r)
		        {
		          	if(r.Resultado==1)
          			{
            			alert("El profesor se modifico correctamente.");
          			}
          			else
          			{
            			alert("Error =(");
          			}
		        });
			}

			function eliminarProfesor(IDPro)
			{
				var jProfesor={IDProfesor: IDPro,};
				$.ajax(
		        {
		        	url: 'INC/EliminarProfesor.php',
		          	type: 'POST',
		          	datatype: 'json',
		          	data: jProfesor,
		        })
		        .done(function(r)
		        {
		          	$.each(r, function(index, p)
		          	{
		          		if(r.Resultado==1)
          				{
            				alert("El profesor se elimino correctamente.");
          				}
          				else
          				{
            				alert("Error =(");
          				}
		          	});
		        });
			}

			function limpiarTabla()
			{
				$("#tbProfesor tbody").html("");
			}
	
    	</script>
	</head>
	<body>
		<?php 
      		require 'ProfesorModal.php';
    	?>
		<?php 
      		require 'INC/Header.php';
    	?>
    	<div class="container">
      		<h1><span class="label label-primary">Consulta Profesores</span></h1>
      		<br/>
      		<div class="jumbotron">
        		<div class="container">
          			<form action="" role="form" class="form-horizontal" id="frmProfesor">
          				<div class="col-md-4">
	            			<div class="form-group">
				                <label for="IDProfesor">ID Profesor</label>
				                <input type="text" name="IDProfesor" class="form-control" id="IDProfesor" placeholder="ID del Profesor">
				           	</div>
				       	</div>
				       	<div class="col-md-4">
	            			<div class="form-group">
				           		<label for="Nombre">Nombre</label>
				                <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre">
				          	</div>
				      	</div>
			          	<div class="col-md-4">
				            <div class="form-group">
				           		<label for="Ape_Pat">Apellido Paterno</label>
				                <input type="text" name="Ape_Pat" class="form-control" id="Ape_Pat" placeholder="Apellido Paterno">
				          	</div>
			          	</div>
			          	<div class="col-md-12">
              				<button class="btn btn-lg btn-success" id="btnBuscar">Buscar</button>
            			</div>
          			</form>
          			<table class="table" id="tbProfesor">
          				<thead>
          					<tr>
          						<th>ID Profesor</th>
          						<th>Nombre Completo</th>
          						<th></th>
          						<th></th>
          					</tr>
          				</thead>
          				<tbody>
          				</tbody>
          			</table>
        		</div>
      		</div>
    	</div>
	</body>
</html>