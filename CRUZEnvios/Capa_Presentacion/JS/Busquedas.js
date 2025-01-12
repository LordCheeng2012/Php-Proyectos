
function ListaBusqueda(Dni,ElementoaMostrar){
	//aqui llamamos la misma funcion pero retornamos un array 
	//para la busquedas cerca a lo que mande le dni
	$.ajax({
	url:'./controladore/Busquedas.php',
	type:'POST',
	dataType:'html',
	data:{Dni:Dni},
	})
	.done(function(resultado){
		
			$(ElementoaMostrar).html(resultado);
		
	})
	.fail(function(){
		console.log("error");
	})
}

function BuscarNombreporDni(Dni,ElementoaMostrar){
	//esta consulta es para el metodo buscar nombre por un dni
	$.ajax({
	url:'./controladore/Busquedas.php',
	type:'POST',
	dataType:'json',
	data:{Dni:Dni,NombreDni:'Nombre'},
	})
	.done(function(resultado){
		ElementoaMostrar.value=resultado;
		
	})
	.fail(function(error){
		var mensajeError = error.responseText;
		console.log("Error: " + mensajeError);
	})
}


$(document).on('keyup','#txtDni',function(){
	var Valor = $(this).val();
	if (Valor!="") {
		ListaBusqueda(Valor,'#Resultado-Dni');
	}else{
		if ((Valor=="" )||( Valor.length < 8)) {
		alert("El dni esta vacio o tiene menos de 8 digitos");	
		}
	}
});

function SeleccionaDni(DniRes,Nombres) {
	let ResultadoDNi=document.getElementById("Resultado-Dni");
	if(isNaN(DniRes)){
		alert("Ningun Dni Seleccionado");
	}else{
		var Input=document.getElementById("txtDni");
		let NombreDni=Nombres;
	Input.value=DniRes;
	ResultadoDNi.innerHTML="<div class='Sub-ResDni'><p id='info-Dni'></p></div>";
	var infoDni=document.getElementById("info-Dni");
	infoDni.innerHTML="<strong>Nombres : "+NombreDni+" </strong>";
	}
	

}

function Consulta_Dni(Input,ElementoaMostrar) {
	var inputEvent = document.getElementById(Input).value;
	 var url = "./controladore/Lista_Autocomplete.php";
	 var dataresult=document.getElementById("Result_Dni");
	 //establece la url en variable
	 var form = new FormData();
	 form.append("Dni_Sugerencia",inputEvent);
	 //crea un objeto form con appennd indicamos el nombre del form y su valor
	fetch(url,{
		method: 'POST',
		body:form,
		mode:"cors"
	})
	//envio del datos fetch
	.then(data=>data.json())
	.then((datares)=>{
		dataresult.innerHTML=datares;
		//imprimir el valor seleccionado
	})
	.catch((error)=>{
	console.log(error);
	})
}

//obtener el nombre del seleccionado

function NotLoadForm(form) {
	
		form.preventDefaut();
	
}


 function GetName(elemento){
	let lblNombre=document.getElementById("lblNombre");
	lblNombre.textContent="Cargando...";
	var Dni = elemento.value;
	var form = new FormData();
	//se instancia el form
	form.append("GetName","Obtener Nombre de Dni");
	form.append("Dni",Dni);
	//agregamos un nombre y su valors
	fetch('./controladore/Cons_Informacion.php',{
		method:'POST',
		mode:"cors",
		body:form
	}).then((data)=>data.json())
	.then((result)=>{
		lblNombre.textContent=result;
	})
	.catch((err)=>{
		alert("error : en la llamada cuerpo"+err);
		console.log(err);
	});
	
	
	;
	
}


