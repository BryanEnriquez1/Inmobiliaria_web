// JavaScript Document
function infoInmueble(){
	$.post("../AJAX/admin.php?op=infoInmueble", function(data){
		const result = JSON.parse(data);
		$("#tipo_Inmueble").text(result.tipoinm);
		$("#nombre_Inmueble").text(result.inmb_nombre);
		$("#precio_Inmueble").html("<strong>"+result.inmb_precio+"</strong>");
		$("#pais_Inmueble").text(result.inmb_pais);
		$("#provincia_Inmueble").text(result.inmb_provincia);
		$("#ciudad_Inmueble").text(result.inmb_ciudad);
		$("#zona_Inmueble").text(result.zonainm);
		$("#areaconstruida_Inmueble").text(result.detinmb_areaconstruct);
		$("#areaterreno_Inmueble").text(result.detinmb_areaterreno);
		$("#nhabitaciones_Inmueble").text(result.detinmb_nhabit);
		$("#ngarajes_Inmueble").text(result.detinmb_ngaraje);
		$("#nbanios_Inmueble").text(result.detinmb_nbanios);
		$("#estrato_Inmueble").text(result.estratoinm);
		$("#anioconstruccion_Inmueble").text(result.detinmb_anioconstruct);
		$("#tipoi_Inmueble").text(result.tipoinm);
		$("#tiponegocio_Inmueble").text(result.negocioinm);
		$("#estado_Inmueble").text(result.estadoinm);
		$.post("../AJAX/admin.php?op=caracteristicasInt", {ci: result.detinmb_caractinternas}, function(data){
			$("#caracterstcasInt").html(data);
		});
		$.post("../AJAX/admin.php?op=caracteristicasExt", {ce: result.detinmb_caractexternas}, function(data){
			$("#caracterstcasExt").html(data);
		});
		$("#adicional_Inmueble").text(result.detinmb_adicional);
		let latitud = result.detinmb_latitud;
		let longitud = result.detinmb_longitud;
		initMap(latitud, longitud);
	});
}

function initMap(latitud, longitud) {
    const location = { lat: parseFloat(latitud), lng: parseFloat(longitud) };

    if (!$("#ubicacion").length) {
        console.error("Error: No se encontr� el div #ubicacion.");
        return;
    }

    const map = new google.maps.Map($("#ubicacion").get(0), {
        zoom: 13, // Zoom m�s alejado para indicar la zona
        center: location,
    });

    // Dibujar un c�rculo para indicar el �rea aproximada
    new google.maps.Circle({
        strokeColor: "#FF0000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#FF0000",
        fillOpacity: 0.35,
        map: map,
        center: location,
        radius: 2000, // Radio en metros (1 km de margen)
    });
}

function cargarArchivos() {
    $.post("../AJAX/admin.php?op=mostrarGaleria", function(data) {
        const files = JSON.parse(data);
        if (files.error) {
            $("#imagenesInmueble").html("<p>No hay archivos en la carpeta.</p>");
            return;
        }

        let thumbnails = $("#thumbnails");
        thumbnails.empty();

        let mainImage = $("#mainImage");
        let mainVideo = $("#mainVideo");

        let currentIndex = 0; // 🔹 Mover la declaración aquí para que sea accesible

        if (files.length > 0) {
            mostrarArchivo(currentIndex); // Muestra el primer archivo
        }

        files.forEach((file, index) => {
            let element;
            if (file.type === "image") {
                element = $("<img>").attr("src", file.url).addClass("thumbnail");
            } else if (file.type === "video") {
                element = $("<video>").attr("src", file.url).addClass("thumbnail");
            }

            element.click(() => {
                currentIndex = index;
                mostrarArchivo(currentIndex);
            });
            thumbnails.append(element);
        });

        function mostrarArchivo(index) {
            let file = files[index];
            if (file.type === "image") {
                mainImage.attr("src", file.url).show();
                mainVideo.hide();
            } else if (file.type === "video") {
                mainVideo.attr("src", file.url).show();
                mainImage.hide();
            }
            currentIndex = index; // Actualiza el índice global
        }

        // Navegación con flechas
        $("#prevArrow").click(() => {
            if (currentIndex > 0) {
                currentIndex--;
                mostrarArchivo(currentIndex);
            }
        });

        $("#nextArrow").click(() => {
            if (currentIndex < files.length - 1) {
                currentIndex++;
                mostrarArchivo(currentIndex);
            }
        });
    });
}

infoInmueble();
cargarArchivos();