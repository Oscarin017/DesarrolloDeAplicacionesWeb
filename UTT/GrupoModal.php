<!-- Modal -->
<div class="modal fade" id="mGrupo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h2 class="modal-title" id="modalTitle">Modificar Grupo</h2>
      </div>
      <div class="modal-body">
        <form action="" role="form" class="form-horizontal" id="frmModGrupo">
              <div class="form-group">
                <label for="mNombre">Nombre del Grupo</label>
                <input type="text" name="mNombre" class="form-control" id="mNombre" placeholder="Nombre del Grupo">
              </div>
              <div class="form-group">
                <label for="mProfesor">Profesor</label>
                <select class="form-control" id="mProfesor" name="mProfesor">
                  <option value="1">Selecciona un Profesor</option>
                </select>
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