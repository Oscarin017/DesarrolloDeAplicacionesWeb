<html>
  <head>
    <?php 
      require 'INC/Head.php';
    ?>
    <script type="text/javascript">
      var enviarCorreos =  false;
      $(document).ready(function()
      {

        cargarGrupo(sessionStorage.IDProfesor);        

        $("#Grupo").change(function()
        {
          limpiarTabla();
          cargarTabla();
        }); 

        $("#tbAlumno").on("click", "button", function(event)
        {
          event.preventDefault();
          if($(this).html() == "Presente")
          {
            $(this).html("Falta");
            $(this).removeClass("btn-success");
            $(this).addClass("btn-danger");
          }
          else if($(this).html() == "Falta")
          {
            $(this).html("Retardo");
            $(this).removeClass("btn-danger");
            $(this).addClass("btn-warning");
          }
          else
          {
            $(this).html("Presente");
            $(this).removeClass("btn-warning");
            $(this).addClass("btn-success");
          }
        }); 

        $("#btnGuardar").click(function(event)
        {
          event.preventDefault();
          if($("#Grupo").val()!=0 && $("#Fecha").val()!="")
          {
            if(confirm("Estas seguro que deseas guardar la asistencia."))
            {
              enviarCorreos = confirm("Deseas enviar correo a los tutores.")
              guardarAsistencia();
            }
          }
          else
          {
            alert("Selecciona un grupo o fecha.");
          }
        });
          

      });

      function cargarGrupo(IDPro)
      {
        var jProfesor =
        {
          IDProfesor: IDPro,
        }
        $.ajax(
        {
          url: 'INC/SeleccionGrupo4.php',
          type: 'POST',
          datatype: 'json',
          data: jProfesor,
        })
        .done(function(r)
        {
          $.each(r, function(index, g)
          {
            $("#Grupo").append("<option value='"+g.iIDGrupo_Gru+"'>"+g.vNombre_Gru+"</option>");
          });
        });
      }

      function cargarTabla()
      {
        $.ajax(
        {
          url: 'INC/SeleccionAlumno3.php',
          type: 'POST',
          datatype: 'json',
          data: $("#frmGrupo").serialize(),
        })
        .done(function(r)
        {
          $.each(r, function(index, a)
          {
            $("#tbAlumno tbody").append("<tr>\
              <td>"+a.iIDAlumno_Alu+"</td>\
              <td id="+a.IDGrupoAlumno+">"+a.vNombre_Alu+" "+a.vApellidoPaterno_Alu+" "+a.vApellidoMaterno_Alu+"</td>\
              <td><button class='btn btn-md btn-success btnasis' name='btn' value='"+a.iIDGrupoAlumno_GA+"'>Presente</button><input id='ca"+a.IDGrupoAlumno+"' type='hidden' value="+a.vCorreo_Alu+"></input><input id='ct"+a.IDGrupoAlumno+"' type='hidden' value="+a.vCorreoContacto_Alu+"></input></td>\
              </tr>");
          });
        });
      }

      function guardarAsistencia()
      {
        $("#tbAlumno tbody tr td button").each(function(index)
        {
          idalum = "td#"+$(this).val();
          idcoa = "#ca" + $(this).val();
          idcot = "#ct" + $(this).val();
          var jAsistencia =
          {
            IDGrupoAlumno: $(this).val(),
            Fecha: $("#Fecha").val(),
            Asistencia: $(this).html(),
            Alumno: $(idalum).html(),
            Grupo: $("#Grupo").html(),
            Correo: $(idcoa).val(),
            CorreoT: $(idcot).val(),
          }
          $.ajax(
          {
            url: 'INC/InsertarAsistencia.php',
            type: 'POST',
            datatype: 'json',
            data: jAsistencia,
          })
          .done(function(r)
          {
            if(r.Resultado==1)
            {
              limpiarTabla();
              $("#Grupo").val(0);
            }
            else
            {
              alert("Error =(");
            }
          });

          if(enviarCorreos)
          {
            $.ajax({
              url: 'INC/EnviarCorreos.php',
              type: 'POST',
              datatype: 'json',
              data: jAsistencia,
            })
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
    require 'INC/Header.php';
    ?>
    <div class="container">
      <h1><span class="label label-primary">Toma de asistencia</span></h1>
      <br/>
      <div class="jumbotron">
        <form action="" role="form" class="form-horizontal" id="frmGrupo">
          <div class="container">
            <div class="col-md-6">
              <h2>Selecciona un Grupo</h2>
              <div class="form-group">
                <select class="form-control input-lg" id="Grupo" name="Grupo">
                  <option value="0">Selecciona un Grupo</option>
                </select>
              </div>
              <br>              
            </div>
            <div class="col-md-6">
              <h2>Selecciona fecha</h2>
              <div class="form-group">
                <input type="date" class="form-control input-lg" id="Fecha">
              </div>
              <br>              
            </div>
          </div>
        </form>
        <table class="table" id="tbAlumno">
          <thead>
            <tr>
              <th>ID Alumno</th>
              <th>Nombre Completo</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
        <div class="col-md-12 text-center">
          <button class="btn btn-lg btn-success centered" id="btnGuardar">Guardar</button>
        </div>
      </div>  
    </div>
  </body>
</html>