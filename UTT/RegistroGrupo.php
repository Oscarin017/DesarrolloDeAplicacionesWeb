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
            url: 'INC/InsertarGrupo.php',
            type: 'POST',
            datatype: 'json',
            data: $("#frmGrupo").serialize(),
          })
          .done(function(r)
          {
            if(r.Resultado==1)
            {
              alert("El grupo se registro correctamente.");
              $("#Nombre").val("");
              $("#Profesor").val(2);
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

        $.ajax(
        {
          url: 'INC/SeleccionProfesor.php',
          type: 'POST',
          datatype: 'json',
        })
        .done(function(r)
        {
          $.each(r, function(index, p)
          {
            if(p.iIDProfesor_Pro != 1)
            {
              $("#Profesor").append("<option value='"+p.iIDProfesor_Pro+"'>"+p.vNombre_Pro+" "+p.vApellidoPaterno_Pro+"</option>");
            }
          })
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
  </script>
  </head>
  <body>
    <?php 
      require 'INC/Header.php';
    ?>
    <div class="container">
      <h1><span class="label label-primary">Registro de Grupos</span></h1>
      <br/>
      <div class="jumbotron">
        <div class="container">
          <form action="" role="form" class="form-horizontal" id="frmGrupo">
            <div class="col-md-6">
              <div class="form-group">
                <label for="Nombre">Nombre del Grupo</label>
                <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre del Grupo">
              </div>
              <div class="form-group">
                <label for="Profesor">Profesor</label>
                <select class="form-control" id="Profesor" name="Profesor"></select>
              </div>
              <button class="btn btn-lg btn-success" id="btnRegistrar">Registrar Grupo</button>
            </div>
            <div class="hidden-sm hidden-xs col-md-6">
              <img class="img-responsive" src="IMG/Grupos.jpg" alt="">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>