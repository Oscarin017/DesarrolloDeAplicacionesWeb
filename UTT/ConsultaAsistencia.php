<html>
  <head>
    <?php 
      require 'INC/Head.php';
    ?>
    <script type="text/javascript">
    
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
          $("#mAsistencia").modal("show");
          cargarAsistencia($(this).val());                  
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
        var jGrupo = 
        {
          IDGrupo: $("#Grupo").val(),
        }
        $.ajax(
        {
          url: 'INC/SeleccionAsistencia2.php',
          type: 'POST',
          datatype: 'json',
          data: jGrupo,
        })
        .done(function(r)
        {
          $.each(r, function(index, a)
          {
            var fa = Math.floor(parseInt(a.retardo)/3);
            var ft = parseInt(a.falta) + fa;
            $("#tbAlumno tbody").append("<tr>\
              <td>"+a.iIDAlumno_Alu+"</td>\
              <td>"+a.vNombre_Alu+" "+a.vApellidoPaterno_Alu+" "+a.vApellidoMaterno_Alu+"</td>\
              <td>"+a.asistencia+"</td>\
              <td>"+a.falta+"</td>\
              <td>"+a.retardo+"</td>\
              <td>"+fa+"</td>\
              <td>"+ft+"</td>\
              <td><button class='btn btn-sm btn-primary' name='btn' value='"+a.iIDGrupoAlumno_Asi+"'>Consultar</button></td>\
              </tr>");
          });
        });
      }

      function cargarAsistencia(IDGruAlu)
      {
        var jGrupoAlumno={IDGrupoAlumno: IDGruAlu,};
        $("#tbAsistencia tbody").html("");
        $.ajax(
        {
          url: 'INC/SeleccionAsistencia.php',
          type: 'POST',
          datatype: 'json',
          data: jGrupoAlumno,
        })
        .done(function(r)
        {
          $.each(r, function(index, g)
          {
            var t = "";
            if(g.cAsistencia_Asi == "0")
            {
              t="Asistencia";
            }
            else if(g.cAsistencia_Asi == "1")
            {
              t="Falta";
            }
            else
            {
              t="Retardo";
            }
            $("#tbAsistencia tbody").append("<tr>\
              <td>"+g.dFecha_Asi+"</td>\
              <td>"+t+"</td>\
              </tr>");
          });
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
    <?php
      require 'AsistenciaModal.php';
    ?>
    <div class="container">
      <h1><span class="label label-primary">Consulta Asistencia</span></h1>
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
          </div>
        </form>
        <table class="table" id="tbAlumno">
          <thead>
            <tr>
              <th>ID Alumno</th>
              <th>Nombre Completo</th>
              <th>Asistencias</th>
              <th>Faltas</th>
              <th>Retardos</th>
              <th>Faltas Retardos</th>
              <th>Faltas Totales</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>  
    </div>
  </body>
</html>