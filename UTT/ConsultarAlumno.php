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

	    		$("#tbAlumno").on("click", "button", function(event)
	    		{
	    			event.preventDefault();
	    			if($(this).html() == "Modificar")
	    			{
	    				$("#mAlumno").modal("show");
	    				cargarAlumno($(this).val());
	    			}
	    			else if($(this).html() == "Eliminar")
	    			{
	    				if(confirm("Estas seguro que deseas eliminar este Alumno"))
	    				{
	    					eliminarAlumno($(this).val());
	    					limpiarTabla();
	    					llenarTabla();
	    				}
	    			}
	    		});	 

	    		$("#btnGuardar").click(function(event)
	    		{
	    			event.preventDefault();
	    			modificarAlumno($(this).val());
	    			$("#mAlumno").modal("hide");
	    			limpiarTabla();
	    		});

		    });
			
			function llenarTabla()
			{
				$.ajax(
		        {
		        	url: 'INC/SeleccionAlumno2.php',
		          	type: 'POST',
		          	datatype: 'json',
		          	data: $("#frmAlumno").serialize(),
		        })
		        .done(function(r)
		        {
		          	$.each(r, function(index, a)
		          	{
		          		$("#tbAlumno tbody").append("<tr>\
		            		<td>"+a.iIDAlumno_Alu+"</td>\
		            		<td>"+a.vApellidoPaterno_Alu+" "+a.vApellidoMaterno_Alu+" "+a.vNombre_Alu+"</td>\
		            		<td><button class='btn btn-sm btn-primary mmAlumno' value='"+a.iIDAlumno_Alu+"'>Modificar</button></td>\
		            		<td><button class='btn btn-sm btn-primary' value='"+a.iIDAlumno_Alu+"'>Eliminar</button></td>\
		            		</tr>");
	            	
		          	});
		        });
			}

			function cargarAlumno(IDAlu)
			{
				var jAlumno=
				{
					IDAlumno: IDAlu,
					Nombre: "",
					Ape_Pat: "",
				};
      			$.ajax(
		        {
		        	url: 'INC/SeleccionAlumno2.php',
		          	type: 'POST',
		          	datatype: 'json',
		          	data: jAlumno,
		        })
		        .done(function(r)
		        {
		          	$.each(r, function(index, p)
		          	{
		          		$("#mNombre").val(p.vNombre_Alu);
		          		$("#mApe_Pat").val(p.vApellidoPaterno_Alu);
		          		$("#mApe_Mat").val(p.vApellidoMaterno_Alu);
		          		$("#mEmail").val(p.vCorreo_Alu);
		          		$("#mEmailT").val(p.vCorreoContacto_Alu);		          		
		          		$("#btnGuardar").val(p.iIDAlumno_Alu);
		          	});
		        });
			}

			function modificarAlumno(IDAlu)
			{
				var jAlumno=
					{
						IDAlumno: IDAlu,
						Nombre: $("#mNombre").val(),
						Ape_Pat: $("#mApe_Pat").val(),
		          		Ape_Mat: $("#mApe_Mat").val(),
		          		Email: $("#mEmail").val(),
		          		EmailT: $("#mEmailT").val(),
					};
				$.ajax(
		        {
		        	url: 'INC/ModificarAlumno.php',
		          	type: 'POST',
		          	datatype: 'json',
		          	data: jAlumno,
		        })
		        .done(function(r)
		        {
		          	if(r.Resultado==1)
          			{
            			alert("El alumno se modifico correctamente.");
          			}
          			else
          			{
            			alert("Error =(");
          			}
		        });
			}

			function eliminarAlumno(IDAlu)
			{
				var jAlumno={IDAlumno: IDAlu,};
				$.ajax(
		        {
		        	url: 'INC/EliminarAlumno.php',
		          	type: 'POST',
		          	datatype: 'json',
		          	data: jAlumno,
		        })
		        .done(function(r)
		        {
		          	if(r.Resultado==1)
      				{
        				alert("El Alumno se elimino correctamente.");
      				}
      				else
      				{
        				alert("Error =(");
      				}
		        });
			}

			function limpiarTabla()
			{
				$("#tbAlumno tbody").html("");
			}
	
    	</script>
	</head>
	<body>
		<?php 
      		require 'AlumnoModal.php';
    	?>
		<?php 
      		require 'INC/Header.php';
    	?>
    	<div class="container">
      		<h1><span class="label label-primary">Consulta Alumnos</span></h1>
      		<br/>
      		<div class="jumbotron">
        		<div class="container">
          			<form action="" role="form" class="form-horizontal" id="frmAlumno">
          				<div class="col-md-4">
	            			<div class="form-group">
				                <label for="IDAlumno">ID Alumno</label>
				                <input type="text" name="IDAlumno" class="form-control" id="IDAlumno" placeholder="ID del Alumno">
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
          			<table class="table" id="tbAlumno">
          				<thead>
          					<tr>
          						<th>ID Alumno</th>
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