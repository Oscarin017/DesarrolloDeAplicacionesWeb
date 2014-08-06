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
          $.ajax(
          {
            url: 'INC/InsertarProfesor.php',
            type: 'POST',
            datatype: 'json',
            data: $("#frmProfesor").serialize(),
          })
          .done(function(r)
          {
            if(r.Resultado==1)
            {
              alert("El profesor se registro correctamente.");
              $(".form-control").val("");
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
        });
      });

    </script>
  </head>
  <body>
    <?php 
      require 'INC/Header.php';
    ?>
    <div class="container">
      <h1><span class="label label-primary">Registro de Profesores</span></h1>
      <br/>
      <div class="jumbotron">
        <div class="container">
          <form action="" role="form" class="form-horizontal" id="frmProfesor">
            <div class="col-md-4">
              <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre del Profesor">
              </div>
              <div class="form-group">
                <label for="Ap_Pat">Apellido Paterno</label>
                <input type="text" name="Ape_Pat" class="form-control" id="Ap_Pat" placeholder="Apellido Paterno">
              </div>
              <div class="form-group">
                <label for="Ap_Mat">Apellido Materno</label>
                <input type="text" name="Ape_Mat" class="form-control" id="Ap_Mat" placeholder="Apellido Materno">
              </div>
              <div class="form-group">
                <label for="Email">Correo</label>
                <input type="email" name="Email" class="form-control" id="Email" placeholder="Correo Electronico">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="Telefono">Telefono</label>
                <input type="number" name="Telefono" class="form-control" id="Telefono" placeholder="Telefono (10 digitos)">
              </div>
              <div class="form-group">
                <label for="Usuario">Usuario</label>
                <input type="text" name="Usuario" class="form-control" id="Usuario" placeholder="Nombre de Usuario">
              </div>
              <div class="form-group">
                <label for="Contrasena">Contrasena</label>
                <input type="password" name="Contrasena" class="form-control" id="Contrasena" placeholder="Contrasena">
              </div>
            </div>
            <div class="hidden-sm hidden-xs col-md-4">
              <img class="img-responsive" src="IMG/Unhelpful High School Teacher.jpg" alt="">
            </div>
            <div class="col-md-12">
              <button class="btn btn-lg btn-success" id="btnRegistrar">Registrar Profesor</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>