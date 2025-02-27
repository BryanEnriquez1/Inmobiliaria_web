<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Inmobiliaria</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
<!--  <link href="../assets/img/favicon.png" rel="icon">-->
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">
<!--  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYw72RB7N3nERSH5n39XyY8P02lOS0_S4&callback=initMap" async defer></script>-->
<!--
  <script>
    (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
      key: "AIzaSyCYw72RB7N3nERSH5n39XyY8P02lOS0_S4",
      v: "weekly",
    });
  </script>
-->

  <!-- =======================================================
  * Template Name: Selecao
  * Template URL: https://bootstrapmade.com/selecao-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h5 class="sitename">JESSICA REALTORS®</h5>
      </a>

      <nav id="navmenu" class="navmenu">
        
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3"></use>
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0"></use>
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9"></use>
        </g>
      </svg>

    </section><!-- /Hero Section -->

    <section id="about" class="about section" style="width: 100%;">

      <div class="container section-title" data-aos="fade-up">
        <h2>BIENVENIDO</h2>
        <p>ADMINISTRADOR</p>
      </div>

      <div id="tablaInmuebles" class="container" style="width: 100%;">
			<div class="col-lg-12 col-md-12 col-sm-12 p-4 shadow rounded bg-light">
				<h3 class="text-right mb-4">Inmuebles <button type="button" id="btningreso" class="btn btn-success px-4"><i class="bi bi-plus-circle-dotted"></i> Agregar</button></h3>

				<div style="width:900" id="listadoregistros">
	  				<table id="tblinmuebles" style="width: 100%;" class="table table-striped table-bordered table-condensed table-hover"> 
						<thead>
		  					<th></th>
		  					<th>Nombre de la propiedad</th>
							<th>Pais</th>
		  					<th>Provincia</th>
		  					<th>Ciudad</th>
							<th>Precio</th>
							<th>Tipo</th>
							<th>Más Opciones</th>
		  					<th>Estado</th>
						</thead>
						<tbody>
						</tbody>   
	  				</table>
				</div>
			</div>
		</div>
		
		<form id="formdtinmueble" name="formdtinmueble" method="post">
			<div id="datosInmuebles" class="container" style="width: 100%;">
				<div class="col-lg-12 col-md-12 col-sm-12 p-4 shadow rounded bg-light">
					<h3 class="text-right mb-4">Datos del Inmueble <button type="button" id="btnregreso" class="btn btn-success px-4"><i class="bi bi-box-arrow-in-left"></i> Regresar</button></h3>

					<div class="row">
						<div class="col-md-6 mb-4">
							<label for="nombreinmbl" class="form-label">Nombre del inmueble:</label>
							<input type="text" id="nombreInm" name="nombreInm" class="form-control" placeholder="Ingrese el nombre del inmueble">
						</div>
						<div class="col-md-2 mb-4">
							<label for="precioinmbl" class="form-label">Precio del inmueble:</label>
							<input type="text" id="precioInm" name="precioInm" class="form-control" placeholder="$000.000.000.000">
						</div>
						<div class="col-md-2 mb-4">
							<label for="anioinmbl" class="form-label">Año de construcción:</label>
							<input type="text" id="anioInm" name="anioInm" class="form-control" placeholder="YYYY">
						</div>
						<div class="col-md-2 mb-4">
							<label for="paisinmbl" class="form-label">País:</label>
							<input type="text" id="paisInm" name="paisInm" class="form-control" value="COLOMBIA" readonly>
						</div>
						<div class="col-md-3 mb-4">
							<label for="provinciainmbl" class="form-label">Provincia:</label>
							<input type="text" id="provinInm" name="provinInm" class="form-control" placeholder="Ingrese la provincia">
						</div>
						<div class="col-md-3 mb-4">
							<label for="ciudadinmbl" class="form-label">Ciudad:</label>
							<input type="text" id="ciudadInm" name="ciudadInm" class="form-control" placeholder="Ingrese la ciudad">
						</div>
						<div class="col-md-3 mb-4">
							<label for="zonainmbl" class="form-label">Zona:</label>
							<select id="cbxzona" name="cbxzona" class="form-control form-control-sm">
		  						<option id="">Seleccione la zona</option>
	  						</select>
						</div>
						<div class="col-md-2 mb-4">
							<label for="aconstruidainmbl" class="form-label">Área construida:</label>
							<input type="text" id="aconstruidaInm" name="aconstruidaInm" class="form-control" placeholder="0">
						</div>
						<div class="col-md-2 mb-4">
							<label for="aterrenoinmbl" class="form-label">Área del terreno:</label>
							<input type="text" id="aterrenoInm" name="aterrenoInm" class="form-control" placeholder="0">
						</div>
						<div class="col-md-2 mb-4">
							<label for="chabitinmbl" class="form-label">Cantidad de habitaciones:</label>
							<input type="text" id="chabitInm" name="chabitInm" class="form-control" placeholder="0">
						</div>
						<div class="col-md-2 mb-4">
							<label for="cbaniosinmbl" class="form-label">Cantidad de baños:</label>
							<input type="text" id="cbanioInm" name="cbanioInm" class="form-control" placeholder="0">
						</div>
						<div class="col-md-2 mb-4">
							<label for="cgarajesinmbl" class="form-label">Cantidad de garajes:</label>
							<input type="text" id="cgarajeInm" name="cgarajeInm" class="form-control" placeholder="0">
						</div>
						<div class="col-md-3 mb-4">
							<label for="nestratoinmbl" class="form-label">Nivel de estrato:</label>
							<select id="cbxestrato" name="cbxestrato" class="form-control form-control-sm">
		  						<option id="">Seleccione el estrato</option>
	  						</select>
						</div>
						<div class="col-md-3 mb-4">
							<label for="tipoinmbl" class="form-label">Tipo de inmueble:</label>
							<select id="cbxtpinmueble" name="cbxtpinmueble" class="form-control form-control-sm">
		  						<option id="">Seleccione el tipo de inmueble</option>
	  						</select>
						</div>
						<div class="col-md-3 mb-4">
							<label for="tpnegocioinmbl" class="form-label">Tipo de negocio:</label>
							<select id="cbxtpnegocio" name="cbxtpnegocio" class="form-control form-control-sm">
		  						<option id="">Seleccione el tipo de negociación</option>
	  						</select>
						</div>
						<div class="col-md-3 mb-4">
							<label for="estadoinmbl" class="form-label">Estado del inmueble:</label>
							<select id="cbxestado" name="cbxestado" class="form-control form-control-sm">
		  						<option id="">Seleccione el estado del inmueble</option>
	  						</select>
						</div>
						<div class="col-md-12 mb-4">
							<button type="button" class="btn btn-success px-4" onClick="posicion(1)">Siguiente <i class="bi bi-box-arrow-in-right"></i></button>
						</div>
					</div>
				</div>
			</div>
			<div id="datosInmuebles2" class="container" style="width: 100%;">
				<div class="col-lg-12 col-md-12 col-sm-12 p-4 shadow rounded bg-light">
					<h3 class="text-right mb-4">Características internas</h3>
					<div class="row">
						<div class="col-md-9 mb-4">
							<label for="ciinmbl" class="form-label">Descripción:</label>
							<input type="text" id="descriptci" name="descriptci" class="form-control" placeholder="Ingrese la descripción de la característica">
						</div>
						<div class="col-md-3 mb-4">
							<br><button type="button" id="btnaddci" class="btn btn-success px-4">Agregar</button>
						</div>
					</div>
					<div style="width:900" id="listadoregistros">
						<table id="tblcaractersint" style="width: 100%;" class="table table-striped table-bordered table-condensed table-hover"> 
							<thead>
								<th>Descripción de la característica</th>
								<th></th>
							</thead>
							<tbody>
							</tbody>   
						</table>
					</div>
					<h3 class="text-right mb-4">Características externas</h3>
					<div class="row">
						<div class="col-md-9 mb-4">
							<label for="ceinmbl" class="form-label">Descripción:</label>
							<input type="text" id="descriptce" name="descriptce" class="form-control" placeholder="Ingrese la descripción de la característica">
						</div>
						<div class="col-md-3 mb-4">
							<br><button type="button" id="btnaddce" class="btn btn-success px-4">Agregar</button>
						</div>
					</div>
					<div style="width:900" id="listadoregistros">
						<table id="tblcaractersext" style="width: 100%;" class="table table-striped table-bordered table-condensed table-hover"> 
							<thead>
								<th>Descripción de la característica</th>
								<th></th>
							</thead>
							<tbody>
							</tbody>   
						</table>
					</div>
					<div class="row">
						<div class="col-md-12 mb-4">
							<button type="button" class="btn btn-success px-4" onClick="posicion(2)">Siguiente <i class="bi bi-box-arrow-in-right"></i></button>
							<button type="button" class="btn btn-danger px-4" onClick="posicion(3)">Regresar <i class="bi bi-box-arrow-in-left"></i></button>
						</div>
					</div>
				</div>
			</div>
			<div id="datosInmuebles3" class="container" style="width: 100%;">
				<div class="col-lg-12 col-md-12 col-sm-12 p-4 shadow rounded bg-light">
					<h3 class="text-right mb-4">Descripción adicional</h3>
					<div class="row">
						<div class="col-md-12 mb-4">
							<label for="cainmbl" class="form-label">Descripción:</label>
							<textarea id="carctrsadInm" name="carctrsadInm" style="width: 1245px; height: 90px;" rows="6" placeholder="Ingrese la descripción adicional" class="form-control campo15"></textarea>
						</div>
					</div>
					<h3 class="text-right mb-4">Ubicación del inmueble:</h3>
					<div id="mapa"></div>
					<div class="row mb-4"> <!-- Espaciado después de esta fila -->
						<div class="col-md-6">
							<label for="latitud" class="form-label">Latitud:</label>
							<input type="text" id="latitud" name="latitud" class="form-control" readonly>
						</div>
						<div class="col-md-6">
							<label for="longitud" class="form-label">Longitud:</label>
							<input type="text" id="longitud" name="longitud" class="form-control" readonly>
						</div>
					</div>

					<div class="row mt-4"> <!-- Espaciado antes de los botones -->
						<div class="col-md-12">
							<button type="submit" class="btn btn-success px-4">Guardar <i class="bi bi-floppy"></i></button>
							<button type="button" class="btn btn-danger px-4" onClick="posicion(1)">Regresar <i class="bi bi-box-arrow-in-left"></i></button>
						</div>
					</div>
				</div>
			</div>
		</form>
		
		<div class="modal fade" id="ModalImagenes" tabindex="-1" role="dialog" aria-labelledby="documentModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="documentModalLabel">IMÁGENES Y VIDEOS DEL INMUEBLE</h5>
					</div>
					<div class="modal-body">
						<div id="cabezal" style="padding: 2px; text-align: left; width:100%;">
							<button id="uploadButton" class="btn btn-primary">Subir archivos</button>
						</div>
						<div id="uploadContainer" style="border: 2px dashed #007bff; padding: 10px; text-align: center;">
							<p>Arrastra y suelta imágenes o videos aquí</p>
							<input type="file" id="fileInput" multiple accept="image/*,video/*" style="display: none;">
							<ul id="fileList" style="list-style-type: none; padding: 0; margin-top: 10px;"></ul> <!-- Lista de archivos dentro del contenedor -->
						</div>
						<div id="guardarImagenes" style="padding: 10px; text-align: center; width:100%;">
							<button id="btnguardarimgns" class="btn btn-success">Guardar</button>
						</div>
						<iframe id="documentIframe" style="width:100%; height: 100px;" frameborder="0"></iframe>
					</div>
					<div class="modal-footer">
						<div class="form-group col-lg-12 col-md-12 col-xs-12">
							<button type="button" class="btn btn-danger" id="btnCancelImgns" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
						</div>
					</div>
				</div>
			</div>
		</div>

    </section>

  </main>

  <footer id="footer" class="footer dark-background">
    <div class="container">
      <h3 class="sitename">JESICA REALTORS®</h3>
      <p>Tu inmobiliaria activa</p>
      <div class="social-links d-flex justify-content-center">
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-skype"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
      <div class="container">
        <div class="copyright">
          <span>Copyright</span> <strong class="px-1 sitename">JESSICA REALTORS®</strong> <span>Todos los derechos reservados</span>
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you've purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
          Developed by <a>AlexanderEnriquez</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="JS/jquery.min.js"></script>
  <script src="JS/bootbox.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/datatables/buttons.colVis.min.js"></script>
  <script src="../assets/datatables/buttons.html5.min.js"></script>
  <script src="../assets/datatables/dataTables.buttons.min.js"></script>
  <script src="../assets/datatables/jszip.min.js"></script>

  <script src="../assets/datatables/pdfmake.min.js"></script>
  <script src="../assets/datatables/vfs_fonts.js"></script>
  <script src="../assets/datatables/datatables.min.js"></script>

  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="JS/admin.js"></script>
  
</body>

</html>