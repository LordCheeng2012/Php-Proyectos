	
  export class Informaciones{
	//propiedades...
  	tipoinfo = "sin definir"
  	//constructor
  	constructor(tipoInfo){
  		this.tipoinfo=tipoInfo;
  		console.log("tipo de info :"+this.tipoinfo);
  	}

  	//metodos .... 
//funcion para lanzar mensajes en el cliente
	 MensajeDiv(idTitulo,idmensage,titulo,mensaje){
	 	if ((idTitulo !== null || idmensage !== null) ||
	 	 (idTitulo !== null && idmensage !== null)  ) {
	 		var h1TituloInfo=document.getElementById(idTitulo);
            var ParraInfoDiv=document.getElementById(idmensage);
            h1TituloInfo.textContent=titulo;
            ParraInfoDiv.textContent=mensaje;
            return console.log("se ejecuto infoerror");
	 	} else {
	 		console.log("los parametros dados no existen o no se presentan en el doom");
	 	}

			
	}

	}
