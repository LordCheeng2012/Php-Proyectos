<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Seleccionar Metodo de Pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<p>Seleccione el Método de Pago</p>
		<p>Los Pagos en Efectivo se realizan de manera Precencial</p>
		<form method="get" action= "./Logica/Procesar_Pago.php">
			<label >Numero de Cita</label>
			<input type="text" readonly name="txtNumCita" 
			value="<?php 
			
			if(isset($ejecutar)){
				while ($fil=$ejecutar->fetch_assoc()) {
					echo $fil['Numero_Cita'];
				}
			}
			?>"  ><br>
			<?php 
			include './Logica/Busca_Cita_Pago.php';
			if(isset($ejecutar)){
				while ($fil=$ejecutar->fetch_assoc()) {
					$Precio= $fil['Precio'];
				}
			}
			?>
			<input name="txtPre" readonly  type="text" value="<?php echo $Precio ?>" > <br>
			<label >Seleccione Metodo de pago</label>
        <select name="SelMetPag" id="SelMetPag">
			<option value="1">Efectivo</option>
			<option value="2">Tarjeta de Credito</option>
			
		</select><br>
		<label for="html">Boleta</label>
	<input  type="checkbox" required onclick="ensureOneChecked(this)"   name="rDLbOL" value="BOLETA">
	
		
		<style>
			.Detalle_Transac{
				background-color: #f1f1f1;
				transition: width 1s ease;
				width: 0%;
				margin: 5px;
				padding: 10px;
				display: none;
			}
			.active{
				display: block;
				width: 100%;
			}
			.Tarjeta_Inf{
				height: auto;
				border: 1px solid black;
				background-color: cornflowerblue;
				margin-top: 10px;
				display: none;
			}
			.active1{
				display: block;
			}
		</style>
		<div id="InfMetPag" class="Detalle_Transac" >
			<p id="PselInf" >Informacio</p>
			<input id="txtNumTar" type="number" required >
			<p id="PSelInfDet"> Informcion</p>
			<input id="txtCvv" type="number" required >
			<button id="BtnMetPago" onclick="BuscaTarjeta()" type="button" >
			Identificar Tarjeta</button>
			<div id="divInfTar" class="Tarjeta_Inf" >
				
					<h3 id="h3InfNumTarj" >Numero Tarjeta : </h3>
					<h3>Entidad :BCP </h3>
					<h3>Disponible :1,560</h3>
					<h3>Monto a pagar : <?php include './Logica/Busca_Cita_Pago.php';   if(isset($ejecutar)){ while ($row2=$ejecutar->fetch_assoc()) {echo $row2['Precio'];}} ?></h3>
				
			</div>
		</div>
		
		<script>
			var select =document.getElementById('SelMetPag');
			//obtenemos el objeto select por su atributo id
			select.addEventListener('change',function(){
				
			var div =document.getElementById('InfMetPag');
				
				var p1=document.getElementById('PselInf');
				var p2=document.getElementById('PSelInfDet');
				
				var btn =document.getElementById('BtnConfPag');
				var btnMetpag=document.getElementById('BtnMetPago');			
				div.classList.remove('active');
				
				btn.removeAttribute('disabled');
				//usaremos el metodo de escuchador de eventos que tiene el objeto obtenido
				//este evento se ejecuta cuando se cambia de opcion del select 'changue'
				var value = select.options[select.selectedIndex].value;
				//obtenemos el valor de la opcion seleccionada del objeto que tiene una propiedad
				//options que es un array iterable , pero solo obtenemos el que se selecciono
				//verificamos valores y actuamos segun lo seleccionado
				if(value == 1){
					alert("Deberas efectuar el pago presencialmente");
					div.classList.remove('active');
					btn.setAttribute('disabled','');
				}
				if(value==2){
					div.classList.add('active');
					p1.textContent="Ingresa el Numero de Tarjeta";
					p2.textContent="Ingresa el CVV";
					btnMetpag.textContent="Buscar Tarjeta";
				}
				
			});
		</script>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="BtnConfPag" disabled  id="BtnConfPag" class="btn btn-primary">Confirmar y Verificar  Pago</button>
		</form>
      </div>
    </div>
  </div>
</div>