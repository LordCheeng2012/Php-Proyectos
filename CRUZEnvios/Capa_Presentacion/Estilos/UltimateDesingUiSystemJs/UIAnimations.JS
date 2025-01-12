class AnimationsUi{
	
	/*mandar una carga de los elementos*/
 LoadModal() {
	let cuerpo=document.getElementById("Modal");
	cuerpo.classList.add("BackGroundModal");
	document.querySelectorAll("html").forEach(function (html) {
		html.style.overflow="hidden";
	});
	setTimeout(() => {
		cuerpo.classList.add("transback");
		document.querySelectorAll("html").forEach(function (html) {
			html.style.overflow="auto";
		});
	}, 2000);

	//quitar modal
	
	setTimeout(function () {
		cuerpo.classList.remove("BackGroundModal");
		cuerpo.style.display="none";
	},3000)

}

 LnazarNotificacion() {
	let divFire = document.getElementById("Div_Fire");
	divFire.classList.add("active_Notiificacion");
}

 CloseNoti() {
	let divFire = document.getElementById("Div_Fire");
	divFire.classList.remove("active_Notiificacion");
}

 OnfireNotification() {
	
 //Funcion para abrir el modal
 window.onload = function () {
    setTimeout(() => {
		let divFire = document.getElementById("Div_Fire");
		divFire.classList.add("active_Notiificacion");
    }, 2000);
    setTimeout(() => {
		let divFire = document.getElementById("Div_Fire");
		divFire.classList.remove("active_Notiificacion");
    }, 5000);
  }
}
}