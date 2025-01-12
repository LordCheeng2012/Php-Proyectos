//Funcion para listar registros en el cliente
	var listarRegistros =  (idbodytabla,idform) =>{
		var body=document.getElementById(idbodytabla);
		var idform =document.getElementById(idform);
		var formdatos=new FormData(idform);
		//console.log(formdatos);
		//si es un objeto form podremos acceder a los datos enviados
		if (!formdatos || formdatos == null
		|| formdatos == undefined  ) {
			console.log("el id del form no existe o no es un objeto form")
		}
		//console.log(formdatos.get("txtBtnBuscar"))
			body.innerHTML="<td colspan='12' > Cargando ... </td>";
			fetch('./../Capa_Presentacion/Procedimientos/Listar_Registros.php',{
				method:"POST",
				body: formdatos
			})
			.then((success)=>success.json())
			.then((resp)=>{ 
				//console.log(resp);
				
				//si es un array recorrerr
				if (Array.isArray(resp)) {
					//foreach(recibe un callback ==funcion , ya de alli puedes ponerle los parametros que 
					//que deseas mostrar como el element actual o el indice )
				var cuerpo="";
				//la variable opciones contiene las opciones de los registros las 
				//que se van a mostrar en la tabla
				
					resp.forEach((valor)=>{
						const opciones = `
				<div  class="Detalles-Opciones">
				<button  onclick="Detalle_Registro_Id(`+valor['N_ORDEN'] +`)" class="Detalles">
				 <i class="material-icons"> list</i> 
			   </button>
				   <div id="Opcion`+valor['N_ORDEN'] +`" class="Options" >
				 <button type="button" id="btnActiEdit"  onclick="ModalEdit(0)" class="ListOption" >
				 <label>Editar <br> <i class="material-icons"> edit</i></label></button>
				 <button type="button" class="ListOption" >Confirmar-Resepcion</button>
				 <button type="button" class="ListOption" >Acerca de este Envio</button>
				 <button type="button" onclick="EliminarRegistro(<?php echo $Resultados['N_ORDEN']; ?>)"
				  
				   class="ListOption" >
					<label>Eliminar <br>
					 <i class="material-icons">
						delete</i></label></button>
				   </div>
				 </div>
				`;
					 var  cont =
					 "<tr><td>"+ valor['N_ORDEN'] +" </td>"+
					 "<td>"+ valor['Remitente'] +" </td>"+
					 "<td>"+ valor['Destinatario'] +" </td>"+
					 "<td>"+ valor['hora_envio'] +" </td>"+
					 "<td>"+ valor['Estado'] +" </td>"+
					 "<td>"+ valor['DESTINO'] +" </td>"+
					 "<td>"+ valor['hora_entrega'] +" </td>"+
					 "<td>"+ valor['CATEGORIA'] +" </td>"+
					 "<td>"+ valor['PRECIO'] +" </td>"+
					 "<td>"+ valor['FECHAENVIO'] +" </td>"+
					 "<td>"+ valor['Fecha_entrega'] +"</td>"+
					 "<td>"+ opciones +" </td></tr>"
						cuerpo=cuerpo+cont;
					});
					body.innerHTML=cuerpo;
				}else{
					body.innerHTML="<td colspan='12' > "+ resp+" </td>";
				}

			})

			.catch((err)=>console.log(err));


}




