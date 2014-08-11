<html>
	<head>
		<?php 
     		require 'INC/Head.php';
    	?>
    	<script type="text/javascript">
    		$(document).ready(function()
			{

				cargarGrupo();
				llenarTablaAlumno();	

		        $("#Grupo").change(function()
	    		{
	    			limpiarTablaGrupo();
	    			llenarTablaGrupo($("#Grupo").val());
	    		}); 

	    		$("#tbAlumno").on("click", "button", function(event)
	    		{
	    			insertarGruAlu($("#Grupo").val(), $(this).val())
	    		});	 

		    });
			
			function insertarGruAlu(IDGru, IDAlu)
			{
				var GruAlu = 
	    		{
    				IDGrupo: IDGru, 
    				IDAlumno: IDAlu,
	    		};
				$.ajax(
    			{
    				url: 'INC/InsertarGrupoAlumno.php',
    				type: 'POST',
    				datatype: 'json',
    				data: GruAlu,
    			})
    			.done(function(r)
    			{
    				if(r.Resultado==1)
        			{
          				alert("Alumno asignado a grupo exitosamente.");
          				limpiarTablaGrupo();
          				llenarTablaGrupo(GruAlu.IDGrupo);
        			}
        			else
        			{
          				alert("Error =(");
        			}
    			})
	        	.fail(function()
	        	{
	          		console.log("Error");
	        	})
	        	.always(function()
	        	{
	          		console.log("Completo");
	        	});
			}

			function cargarGrupo()
			{
				$.ajax(
		        {
		        	url: 'INC/SeleccionGrupo.php',
		          	type: 'POST',
		          	datatype: 'json',
		        })
		        .done(function(r)
		        {
		          	$.each(r, function(index, g)
		          	{
		            	$("#Grupo").append("<option value='"+g.iIDGrupo_Gru+"'>"+g.vNombre_Gru+"</option>");
		          	});
		        })
		        .fail(function()
		        {
		          	console.log("Error");
		        })
		        .always(function()
		        {
		        	llenarTablaGrupo($("#Grupo").val());
		          	console.log("Completo");
		        });
			}

			function llenarTablaAlumno()
			{
				$.ajax(
		        {
		        	url: 'INC/SeleccionAlumno.php',
		          	type: 'POST',
		          	datatype: 'json',
		        })
		        .done(function(r)
		        {
		          	$.each(r, function(index, a)
		          	{
		            	$("#tbAlumno tbody").append("<tr>\
		            		<td>"+a.iIDAlumno_Alu+"</td>\
		            		<td>"+a.vApellidoPaterno_Alu+"</td>\
		            		<td>"+a.vApellidoMaterno_Alu+"</td>\
		            		<td>"+a.vNombre_Alu+"</td>\
		            		<td><button class='btn btn-sm btn-primary' value='"+a.iIDAlumno_Alu+"'>Agregar</button></td>\
		            		</tr>");
		          	});
		        })
		        .fail(function()
		        {
		          	console.log("Error");
		        })
		        .always(function()
		        {
		          	console.log("Completo");
		        });
			}

			function llenarTablaGrupo(Grupo)
			{
				var GruAlu = 
    			{
    				IDGrupo: Grupo,
    			};
    			$.ajax(
    			{
    				url: 'INC/SeleccionGrupoAlumno.php',
    				type: 'POST',
    				datatype: 'json',
    				data: GruAlu,
    			})
    			.done(function(r)
    			{
    				$.each(r, function(index, a)
	          		{
	            		$("#tbAlumnoGrupo tbody").append("<tr>\
	            		<td>"+a.iIDAlumno_Alu+"</td>\
	            		<td>"+a.vApellidoPaterno_Alu+" "+a.vApellidoMaterno_Alu+" "+a.vNombre_Alu+"</td>\
	            		</tr>");
	          		});
    			})
	        	.fail(function()
	        	{
	          		console.log("Error");
	        	})
	        	.always(function()
	        	{
	          		console.log("Completo");
	        	});
			}

			function limpiarTablaGrupo()
			{
				$("#tbAlumnoGrupo tbody").html("");
			}
	
    	</script>
	</head>
	<body>
		<?php 
      		require 'INC/Header.php';
    	?>
    	<div class="container">
      		<h1><span class="label label-primary">Asignacion de alumnos a grupos</span></h1>
      		<br/>
      		<div class="jumbotron">
        		<div class="container">
          			<form action="" role="form" class="form-horizontal" id="frmGrupo">
            			<div class="col-md-12">
            				<h2>Selecciona un Grupo</h2>
              				<div class="form-group">
                				<select class="form-control input-lg" id="Grupo" name="Grupo"></select>
              				</div>
              				<br>
            			</div>
          			</form>
          			<div class="col-md-6">
          				<h2>Alumnos en el Grupo</h2>
          				<table class="table table-responsive" id="tbAlumnoGrupo">
          				<thead>
          					<tr>
          						<th>ID</th>
          						<th>Nombre Completo</th>
          					</tr>
          				</thead>
          				<tbody>
          				</tbody>
          			</table>
          			</div>
          			<div class="col-md-6">
          				<h2>Todos los Alumnos</h2>
          				<table class="table table-responsive" id="tbAlumno">
          				<thead>
          					<tr>
          						<th>ID</th>
          						<th>A.Paterno</th>
          						<th>A.Materno</th>
          						<th>Nombre</th>
          						<th></th>
          					</tr>
          				</thead>
          				<tbody>
          				</tbody>
          			</table>
          			</div>
        		</div>
      		</div>
    	</div>
	</body>
</html>