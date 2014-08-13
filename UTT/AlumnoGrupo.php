<html>
  <head>
    <?php 
      require 'INC/Head.php';
    ?>
    <script type="text/javascript">

      $(document).ready(function()
      {

        cargarGrupo();

        $("#Grupo").change(function()
        {
          cargarTablaGrupo();
        }); 

        $("#btnBuscar").click(function(event)
        {
          event.preventDefault();
          limpiarTabla("Alumno");
          llenarTablaAlumno();
        });

        $("#tbAlumno").on("click", "button", function(event)
        {
          if($("#Grupo").val() != 0)
          {
            event.preventDefault();
            insertarGrupoAlumno($("#Grupo").val(), $(this).val());
            cargarTablaGrupo();
          }
          else
          {
            alert("Selecciona un Grupo.");
          }
        });	

        $("#tbGrupoAlumno").on("click", "button", function(event)
        {
          event.preventDefault();       
          eliminarGrupoAlumno($(this).val());
          cargarTablaGrupo();
        }); 

      });

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
            $("#tbGrupoAlumno tbody").append("<tr>\
              <td>"+a.iIDAlumno_Alu+"</td>\
              <td>"+a.vApellidoPaterno_Alu+" "+a.vApellidoMaterno_Alu+" "+a.vNombre_Alu+"</td>\
              <td><button class='btn btn-sm btn-primary' value='"+a.iIDGrupoAlumno_GA+"'>Quitar</button></td>\
              </tr>");
          });
        });
      }

      function limpiarTabla(Nombre)
      {
        $("#tb"+Nombre+" tbody").html("");
      }

      function cargarTablaGrupo()
      {
        limpiarTabla("GrupoAlumno");
        llenarTablaGrupo($("#Grupo").val());
      }

      function llenarTablaAlumno()
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
              <td>"+a.vApellidoPaterno_Alu+"</td>\
              <td>"+a.vApellidoMaterno_Alu+"</td>\
              <td>"+a.vNombre_Alu+"</td>\
              <td><button class='btn btn-sm btn-primary' value='"+a.iIDAlumno_Alu+"'>Agregar</button></td>\
              </tr>");
          });
        });
      }

      function insertarGrupoAlumno(IDGru, IDAlu)
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
          }
          else
          {
            alert("Error =(");
          }
        });
      }

      function eliminarGrupoAlumno(IDGruAlu)
      {
        var jGruAlu = 
        {
          IDGrupoAlumno: IDGruAlu,
        };
        $.ajax(
        {
          url: 'INC/EliminarGrupoAlumno.php',
          type: 'POST',
          datatype: 'json',
          data: jGruAlu,
        })
        .done(function(r)
        {
          if(r.Resultado==1)
          {
            alert("El Alumno se quito correctamente.");
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
      <h1><span class="label label-primary">Asignacion de alumnos a grupos</span></h1>
      <br/>
      <div class="jumbotron">
        <div class="container">          
          <div class="col-md-12">
            <h2>Selecciona un Grupo</h2>
            <div class="form-group">
              <select class="form-control input-lg" id="Grupo" name="Grupo">
                <option value="0">Selecciona un Grupo</option>
              </select>
            </div>
            <br>
          </div>
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
          <div class="col-md-6">
            <h2>Alumnos en el Grupo</h2>
            <table class="table table-responsive" id="tbGrupoAlumno">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre Completo</th>
                  <th></th>
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