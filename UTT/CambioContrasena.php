<html>
  <head>
    <?php 
      require 'INC/Head.php';
    ?>
    <script type="text/javascript">

      $(document).ready(function()
      {

        $("#btnGuardar").click(function(event)
        {
          event.preventDefault();
          if($("#ContrasenaActual").val()=="" || $("#ContrasenaNueva").val()=="" || $("#ContrasenaRepetida").val()=="")
          {
            alert("Ingresa los campos faltantes.");
          }
          else
          {
            if($("#ContrasenaNueva").val()==$("#ContrasenaRepetida").val())
            {
              validarPassword(sessionStorage.IDProfesor);
            }
            else
            {
              alert("Contraseñas nuevas no coinciden.");
            }
          }
        });

      });

      function validarPassword(IDPro)
      {
        var jPassword =
        {
          IDProfesor: IDPro,
          PasswordNueva: $("#ContrasenaNueva").val(),
          PasswordActual: $("#ContrasenaActual").val(),
        }
        $.ajax(
        {
          url: 'INC/SeleccionarPassword.php',
          type: 'POST',
          datatype: 'json',
          data: jPassword,
        })
        .done(function(r)
        {
          $.each(r, function(index, a)
          {
            if(a.vPassword_Pro == jPassword.PasswordActual)
            {
              $.ajax(
              {
                url: 'INC/ModificarPassword.php',
                type: 'POST',
                datatype: 'json',
                data: jPassword,
              })
              .done(function(r)
              {
                if(r.Resultado==1)
                {
                  alert("Contraseña cambiada existosamente.");
                  $(".form-control").val("");
                }
                else
                {
                  alert("Error =(");
                }

              });
            }
          });
        });
      }

    </script>
  </head>
  <body>
    <?php 
      require 'INC/Header.php';
    ?>
    <div class="container">
      <h1><span class="label label-primary">Cambio de Contraseña</span></h1>
      <br/>
      <div class="jumbotron">
        <div class="container">          
          <form action="" role="form" class="form-horizontal" id="frmPassword">
            <div class="col-md-12">
              <div class="col-md-4">
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="ContrasenaActual">Contraseña</label>
                  <input type="password" name="ContrasenaActual" class="form-control" id="ContrasenaActual" placeholder="Escribe tu contrasena actual">
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="col-md-4">
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="ContrasenaNueva">Contraseña Nueva</label>
                  <input type="password" name="ContrasenaNueva" class="form-control" id="ContrasenaNueva" placeholder="Escribe tu contraseña nueva">
                </div>
              </div>
            </div>
            <div class="col-md-12">
            <div class="col-md-4">
            </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="password" name="ContrasenaRepetida" class="form-control" id="ContrasenaRepetida" placeholder="Escribe nuevamente tu contraseña nueva">
                </div>
              </div>
            </div>
            <div class="col-md-12 text-center">
              <button class="btn btn-lg btn-success" id="btnGuardar">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>