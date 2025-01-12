


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./Logica/Proceso_Eliminar_Cita.php" method="get">
                <H1>Numero de Cita : <?php echo $_GET['ID_CITA']  ?></H1>
                ¿Estás seguro de que deseas eliminar esta Cita ?
                <input type="Number" name="txtNumCita" readonly value="<?php echo $_GET['ID_CITA'] ?>" >
               
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger" name="DeleteCITA" id="confirmDelete">Eliminar</button>
            </div>
            </form>
        </div>
    </div>
</div>