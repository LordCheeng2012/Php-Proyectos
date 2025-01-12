<div id="ModalEdit" class="Fondo-EditModal" >
    <div class="EditModal" >
    <form  name="formListar" method="post"  >
    <div class="Form-EditaModal" >
      <div class="Item-Titulo" >
      <div class="Ventana-Modal">
       <div  >
        <h3  >Traslado y Recotizacion de Envio <label id="lblID" ></label> </h3>
       </div>
       <div class="close" onclick="ModalEdit(1)" >
      <i class="material-icons" style="margin-top: 14px;" > close</i>

       </div>
      </div>
      </div>
    <div class="Item" >
    <div>
    <h3> Datos de Nuevo Destinatario</h3>
    <label> Dni Destinatario : </label> 
    <input onchange="GetName(this)"
      onkeyup="Consulta_Dni('iptDni')"
       type="number" list="Result_Dni"
     id="iptDni" name="iptDni"
     placeholder="Dni Destinatario">

      <datalist id="Result_Dni">
      </datalist>
      <label >Nombre Destinatario</label>
      <label id="lblNombre" > </label>
    </div>
   
    </div>
    <div  class="Item" >
      <h3> Datos de Reenvio</h3>
    <label for="">Seleccione Destino :  </label>
    <select id="DdlDestinoEdit" >Seleccione Destino
              <?php
                $SelectAgencias= $Negocio->Agencias();
              if (is_array($SelectAgencias)) {
              //traer el metodo
           foreach($SelectAgencias as $Opciones) {
              ?>                           
                <option value="<?php echo $Opciones["Destino"] ?>" ><?php echo $Opciones["Destino"] ?> </option>
                <?php
} 
}
    if (is_string($SelectAgencias)) {
    echo "error en : ".$SelectAgencias;
    } 
                ?>
                </select> <br>
      <label> Fecha de Edicion :  </label>  
       <input id="txtFechaEdit" disabled type="date"> <br> 
    </div>

    <div class="Item" >
      <h3> Confirmacion de Reenvio y Modificacion</h3>
      <label for="coti" > Nueva Cotizacion:</label> 
      <input id="TxtCoti" name="coti" type="number" disabled >
      <br>
      <button type="button" class="ConfirmBtn"  id="BtnConfirmar"
       value="Update"  >Editar</button> 
        <button type="button" class="closeBtn" onclick="ModalEdit(1)" >Cancelar</button>
    </div>           
    </div>
    </form>
    
</div>
</div>