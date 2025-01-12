<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Hospital Management System</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		<link rel="stylesheet" href="./css/Modales.css">
		  <script>

		    // Cuando la pagina se carga , activar el slider
                //en jquery libreria de js , llamamos a $ para activar el sliders
			    $(function () {			
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 1600,
			        speed: 600
			      });
			});
		  </script>
	</head>
	<body>
		<script>
			//lanzar modal

			
				function MuenstraModal(Lanzar,classeContenedorModal) {
				  var modal = document.getElementById(classeContenedorModal);
					if (Lanzar==true) {
						
						modal.style.display="flex"
						modal.classList.remove('cerrarTrans');
						modal.classList.toggle("transicion");
						console.log("se lanso el modal");
					}else if(Lanzar==false){
						
						modal.classList.remove('transicion');
						modal.classList.toggle("cerrarTrans");
						modal.style.display="none";
					}
					else{
						alert("Hubo un error al lanzar el modal");
				   }
				   
				}

				function DesplegarDet(Detalles) {
					var det=document.getElementById(Detalles);
					det.classList.add("Detalle_trns");
				}
			</script>
			   <!--
					Con el metodo inlude , icluimos el esquema html del modal 
					Integrantes--
			   -->
			   <?php
			include('./Modal_Integrantes.php')
			   ?>
			   <!--
		Ahora añadimos el Modal Detalles del sistema
			   -->
			   <?php
			include('./Modal_Detalles_Sistema.php')
			   ?>
			
		<!--start-wrap-->
		
			<!--start-header-->
			<div class="header">
				<div class="wrap">
				<!--start-logo-->
				<div class="logo">
					<a href="index.html" style="font-size: 30px;">Hospital Management system</a>
				</div>
				<!--end-logo-->
				<!--start-top-nav-->
				<div class="top-nav">
					<ul>
						<li class="active"><a href="index.html">Home</a></li>
						
						<li><a href="contact.php">contact</a></li>
					</ul>					
				</div>
				<div class="clear"> </div>
				<!--end-top-nav-->
			</div>
			<!--end-header-->
		</div>
		<div class="clear"> </div>
			<!--start-image-slider---->
					<div class="image-slider">
						<!-- Slideshow 1 -->
					    <ul class="rslides" id="slider1">
					      <li><img src="Imagenes/slider-image1.jpg" alt=""></li>
					      <li><img src="Imagenes/slider-image2.jpg" alt=""></li>
					      <li><img src="Imagenes/slider-image1.jpg" alt=""></li>
					    </ul>
						 <!-- Slideshow 2 -->
					</div>
					<!--End-image-slider---->
		    <div class="clear"> </div>
		    <div class="content-grids">
		    	<div class="wrap">
		    	<div class="section group">
								
							
				<div class="listview_1_of_3 images_1_of_3">
					<div class="listimg listimg_1_of_2">
						  <img src="Imagenes/grid-img3.png">
					</div>
					<div class="text list_1_of_2">
						  <h3>Pacientes</h3>
						  <p>Registrar & Administrar tus Citas</p>
						  <div class="button"><span><a href="./Login.php">
							Click Here</a></span></div>
				    </div>
				</div>

				<div class="listview_1_of_3 images_1_of_3">
					<div class="listimg listimg_1_of_2">
						  <img src="Imagenes/grid-img2.png">
					</div>
					<div class="text list_1_of_2">
						  <h3>Equipo de Desarrollo</h3>
						
						  <div class="button"><span><a href="#" id="ActiveId" onclick="MuenstraModal(true,'Modal_Cont')" >Click Here</a></span></div>
				     </div>
				</div>	
				<div class="listview_1_of_3 images_1_of_3">
					<div class="listimg listimg_1_of_2">
						  <img src="Imagenes/grid-img3.png">
					</div>
					<div class="text list_1_of_2">
						  <h3>Caracteristicas del Sistema</h3>
						
						  <div class="button"><span><a href="#" onclick="Presen('Modal_Caracte',true)" >Click Here</a></span></div>
				     </div>
				</div>			
			</div>
		    </div>
		   </div>
		   <div class="wrap">
		   <div class="content-box">
		   <div class="section group">
				<div class="col_1_of_3 span_1_of_3 frist">
				
				</div>
				<div class="col_1_of_3 span_1_of_3 second">
					
				</div>
				<div class="col_1_of_3 span_1_of_3 frist">
					
					
				</div>
			</div>
		   </div>
		   </div>
		   <div class="clear"> </div>
		   <div class="footer">
		   	 <div class="wrap">
		   	<div class="footer-left">
		   			<ul>
						<li><a href="Inicio.html">Home</a></li>
						
					</ul>
		   	</div>
		   
		   	<div class="clear"> </div>
		   </div>
		   </div>

		
		<!--end-wrap-->
		<script>

			function Presen(IDContenedorModal,Lanzar) {
					//Lanzar Presentacion
					let mcontent=document.getElementById(IDContenedorModal);
					if (Lanzar==true) {
						mcontent.classList.remove("invisible");
						mcontent.classList.add("Modal_Funcion_Sistema");
					mcontent.classList.add("trasn_Sistem_Modal");
					var Cabecera=document.getElementById("Modal-Sistem_Cabecera");
					Cabecera.classList.add("Cabecera");
					mcontent.style.display="block";
					Cabecera.classList.add("trans_c");

					}else{
						mcontent.classList.remove("Modal_Funcion_Sistema");
						mcontent.classList.remove("trasn_Sistem_Modal");
						mcontent.classList.remove("Cabecera");
						mcontent.classList.remove("trans_c");
						mcontent.style.display="none";
						
					}
					


			}

		</script>
	</body>
</html>

