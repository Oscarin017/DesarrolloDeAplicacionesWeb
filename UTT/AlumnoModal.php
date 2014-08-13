<!-- Modal -->
<div class="modal fade" id="modificarAlumnos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h2 class="modal-title" id="modalTitle">Modificar Alumno</h2>
      </div>
      <div class="modal-body">
        <form action="" role="form" class="form-horizontal" id="frmModAlumno">
              <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre del Alumno">
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
                <input type="email" name="Email" class="form-control" id="Email" placeholder="Correo del Alumno">
              </div>
              <div class="form-group">
                <label for="EmailT">Correo de Tutor</label>
                <input type="email" name="EmailT" class="form-control" id="EmailT" placeholder="Correo de Padre o Tutor">
              </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>