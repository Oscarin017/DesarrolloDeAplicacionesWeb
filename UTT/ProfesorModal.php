<!-- Modal -->
<div class="modal fade" id="mProfesor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h2 class="modal-title" id="modalTitle">Modificar Profesor</h2>
      </div>
      <div class="modal-body">
        <form action="" role="form" class="form-horizontal" id="frmModProf">
              <div class="form-group">
                <label for="mNombre">Nombre</label>
                <input type="text" name="mNombre" class="form-control" id="mNombre" placeholder="Nombre del Profesor">
              </div>
              <div class="form-group">
                <label for="mApe_Pat">Apellido Paterno</label>
                <input type="text" name="mApe_Pat" class="form-control" id="mApe_Pat" placeholder="Apellido Paterno">
              </div>
              <div class="form-group">
                <label for="mApe_Mat">Apellido Materno</label>
                <input type="text" name="mApe_Mat" class="form-control" id="mApe_Mat" placeholder="Apellido Materno">
              </div>
              <div class="form-group">
                <label for="mEmail">Correo</label>
                <input type="email" name="mEmail" class="form-control" id="mEmail" placeholder="Correo Electronico">
              </div>
              <div class="form-group">
                <label for="mTelefono">Telefono</label>
                <input type="number" name="mTelefono" class="form-control" id="mTelefono" placeholder="Telefono (10 digitos)">
              </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardar">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>