<!DOCTYPE html>
<html>
  <head>
    <?php 
      require 'INC/Head.php';
    ?>
    <script type="text/javascript">
    
      $(document).ready(function()
      {
        
        $("#btnRegistrar").click(function(event)
        {
          event.preventDefault();
          if($("#Nombre").val()=="" || $("#Ape_Pat").val()=="" || $("#Ape_Mat").val()=="" || $("#Email").val()=="" || $("#EmailT").val()=="")
          {
            alert("Ingresa los campos faltantes.")
          }
          else
          {
            insertarAlumno();
          }
        });

      });

      function insertarAlumno()
      {
        $.ajax(
        {
          url: 'INC/InsertarAlumno.php',
          type: 'POST',
          datatype: 'json',
          data: $("#frmAlumno").serialize(),
        })
        .done(function(r)
        {
          if(r.Resultado==1)
          {
            alert("El Alumno se registro correctamente.");
            $(".form-control").val("");
          }
          else
          {
            alert("Error =(");
          }
        });
      }

    </script>
  </head>
  <body>
    <?php 
      require 'INC/Header.php';
    ?>
    <div class="container">
      <h1><span class="label label-primary">Registro de Alumnos</span></h1>
      <br/>
      <div class="jumbotron">
        <div class="container">
          <form action="" role="form" class="form-horizontal" id="frmAlumno">
            <div class="col-md-4">
              <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre del Alumno">
              </div>
              <div class="form-group">
                <label for="Ap_Pat">Apellido Paterno</label>
                <input type="text" name="Ape_Pat" class="form-control" id="Ape_Pat" placeholder="Apellido Paterno">
              </div>
              <div class="form-group">
                <label for="Ap_Mat">Apellido Materno</label>
                <input type="text" name="Ape_Mat" class="form-control" id="Apw_Mat" placeholder="Apellido Materno">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="Email">Correo</label>
                <input type="email" name="Email" class="form-control" id="Email" placeholder="Correo del Alumno">
              </div>
              <div class="form-group">
                <label for="EmailT">Correo de Tutor</label>
                <input type="email" name="EmailT" class="form-control" id="EmailT" placeholder="Correo de Padre o Tutor">
              </div>
            </div>
            <div class="hidden-sm hidden-xs col-md-4">
              <img class="img-responsive" src="IMG/Bad Luck Brian.jpg" alt="">
            </div>
            <div class="col-md-12">
              <button class="btn btn-lg btn-success" id="btnRegistrar">Registrar Alumno</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>