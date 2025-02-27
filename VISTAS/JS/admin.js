// JavaScript Document

var idinmbl;

$('#uploadButton').click(function() {
        $('#fileInput').click();
    });

    // Manejar el arrastre y la suelta
    $('#uploadContainer').on('dragover', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass('drag-over');
    });

    $('#uploadContainer').on('dragleave', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('drag-over');
    });

    $('#uploadContainer').on('drop', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('drag-over');

        var files = e.originalEvent.dataTransfer.files;
        handleFiles(files);
    });

    // Manejar selección de archivos
    $('#fileInput').on('change', function() {
        var files = $(this)[0].files;
        handleFiles(files);
    });

    function handleFiles(files) {
        for (var i = 0; i < files.length; i++) {
            addFileToList(files[i]);
        }
    }

    function addFileToList(file) {
        var fileList = $('#fileList');
        var listItem = $('<li></li>').text(file.name);
        var removeButton = $('<button class="btn btn-danger btn-sm" style="margin-left: 10px;">X</button>');

        // Eliminar archivo de la lista al hacer clic en el botón "X"
        removeButton.click(function() {
            listItem.remove();
        });

        listItem.append(removeButton);
        fileList.append(listItem);
    }

$('#btnguardarimgns').click(function() {
    var files = $('#fileInput')[0].files; // Obtener archivos seleccionados
    if (files.length === 0) {
        alert('Por favor, selecciona archivos para subir.');
        return;
    }

    var formData = new FormData(); // Crear un objeto FormData

    // Añadir archivos al objeto FormData
    for (var i = 0; i < files.length; i++) {
		formData.append('idinmble', idinmbl);
        formData.append('files[]', files[i]); // Usamos 'files[]' para permitir múltiples archivos
    }

    // Realizar la solicitud AJAX para enviar los archivos
    $.ajax({
        url: '../AJAX/admin.php?op=subirfotos', // URL del archivo que manejará la subida
        type: 'POST',
        data: formData,
        contentType: false, // Para enviar el FormData correctamente
        processData: false, // Para evitar que jQuery procese los datos
        success: function(response) {
            bootbox.alert('Archivos subidos exitosamente.');
            $('#fileList').empty();
            $('#fileInput').val('');
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            bootbox.alert('Ocurrió un error al subir los archivos: ' + textStatus);
        }
    });
});

function subirFotos(idinmb) {
    $("#ModalImagenes").modal('show'); // Mostrar el modal
    idinmbl = idinmb;

    // Limpiar la lista antes de cargar nuevas imágenes
    $("#fileList").empty();

    // Hacer una petición AJAX al servidor para obtener las imágenes y videos
    $.ajax({
        url: "../AJAX/admin.php?op=verificarImagenes", 
        type: "POST",
        data: { idinmble: idinmb }, 
        dataType: "json",
        success: function(response) {
            if (response.existe) {
                // Agregar los archivos encontrados a la lista
                response.archivos.forEach(function(archivo) {
                    let listItem = $("<li></li>").text(archivo);
                    let removeButton = $("<button class='btn btn-danger btn-sm' style='margin-left: 10px;'>X</button>");

                    // Botón para eliminar archivo de la lista y del servidor
                    removeButton.click(function() {
                        eliminarArchivo(idinmb, archivo, listItem);
                    });

                    listItem.append(removeButton);
                    $("#fileList").append(listItem);
                });
            } else {
//                $("#fileList").append("<li>No hay archivos disponibles.</li>");
            }
        },
        error: function() {
            console.error("Error al verificar la carpeta.");
        }
    });
}

// Función para eliminar un archivo del servidor
function eliminarArchivo(idinmb, archivo, listItem) {
    $.ajax({
        url: "../AJAX/admin.php?op=eliminarImagen",
        type: "POST",
        data: { idinmble: idinmb, archivo: archivo },
        success: function(response) {
            if (response == "success") {
                listItem.remove(); // Eliminar de la lista
            } else {
                bootbox.alert("No se pudo eliminar el archivo.");
            }
        },
        error: function() {
            bootbox.alert("Error al intentar eliminar el archivo.");
        }
    });
}

function publicar(idinmb){
	$.post("../AJAX/admin.php?op=changeEstdoPublic", {idnmbl: idinmb}, function(r){
		if(r == 1){
			bootbox.alert("Inmueble publicado con exito");
		}else{
			bootbox.alert("Inmueble despublicado con exito");
		}
		$('#tblinmuebles').DataTable().ajax.reload();
	});
}

function verInmueble(idinmb){
	$.post("../AJAX/admin.php?op=inmueble", {idnmble: idinmb}, function(r){
		if(r.trim() == 1){
			$(location).attr("href","inmueble_info.php");
		}
	});
}

$("#btnCancelImgns").on('click', function(){
	$("#ModalImagenes").modal('hide');
});

var tablecrtsInt = $('#tblcaractersint').DataTable({
    "ordering": false
});

var tablecrtsExt = $("#tblcaractersext").DataTable({
	"ordering": false
});

var caracteristicasI;
var caracteristicasE;

$("#datosInmuebles").hide();
$("#datosInmuebles2").hide();
$("#datosInmuebles3").hide();
$("#formlogeo").on('submit', function(e){
	e.preventDefault();
	var formDataLog = new FormData($("#formlogeo")[0]);

	$.ajax({
		url: "../AJAX/admin.php?op=login",
		type: "POST",
		data: formDataLog,
		contentType: false,
		processData: false,
		success: function(rsta){
			if(rsta.trim() === '1'){
				$(location).attr("href","admin.php");
			}else{
				bootbox.alert("Usuario o contraseña incorrecta");
				$(location).attr("href","admlogin.php");
			}
		}
	});

});

$("#btningreso").on("click", function(){
	$("#tablaInmuebles").hide();
	$("#datosInmuebles").show();
});

$("#btnregreso").on("click", function(){
	$("#tablaInmuebles").show();
	$("#datosInmuebles").hide();
	$("#datosInmuebles2").hide();
	$("#datosInmuebles3").hide();
	limpiar();
});

var map;
var marker;

//window.initMap = function () {
//    const colombia = { lat: 4.5709, lng: -74.2973 };
//
//    map = new google.maps.Map($("#mapa")[0], {
//        zoom: 5,
//        center: colombia,
//    });
//
//    map.addListener("click", function (event) {
//        placeMarker(event.latLng);
//    });
//};
//function placeMarker(location) {
//	if (marker) {
//		marker.setMap(null);
//	}
//	marker = new google.maps.Marker({
//		position: location,
//		map: map,
//	});
//	// Guardar ubicación
//	$("#latitud").val(location.lat());
//	$("#longitud").val(location.lng());
//}

function posicion(b){
	if(b == 1){
		$("#tablaInmuebles").hide();
		$("#datosInmuebles").hide();
		$("#datosInmuebles2").show();
		$("#datosInmuebles3").hide();
	}else if(b == 2){
		$("#tablaInmuebles").hide();
		$("#datosInmuebles").hide();
		$("#datosInmuebles2").hide();
		$("#datosInmuebles3").show();
	}else if(b == 3){
		$("#tablaInmuebles").hide();
		$("#datosInmuebles").show();
		$("#datosInmuebles2").hide();
		$("#datosInmuebles3").hide();
	}else if(b == 4){
		$("#tablaInmuebles").show();
		$("#datosInmuebles").hide();
		$("#datosInmuebles2").hide();
		$("#datosInmuebles3").hide();
	}
}

function zonas(){
	$.post("../AJAX/admin.php?op=cbxzonas", function(c){
		$("#cbxzona").html(c);
	}).fail(function(){
		bootbox.alert("Error al cargar las zonas");
	});
}
function estratos(){
	$.post("../AJAX/admin.php?op=cbxestratos", function(c){
		$("#cbxestrato").html(c);
	}).fail(function(){
		bootbox.alert("Error al cargar los estratos");
	});
}
function tpinmueble(){
	$.post("../AJAX/admin.php?op=cbxtpinmuebles", function(c){
		$("#cbxtpinmueble").html(c);
	}).fail(function(){
		bootbox.alert("Error al cargar los tipos de inmueble");
	});
}
function tpnegocio(){
	$.post("../AJAX/admin.php?op=cbxtpnegocios", function(c){
		$("#cbxtpnegocio").html(c);
	}).fail(function(){
		bootbox.alert("Error al cargar los tipos de negocio");
	});
}
function estado(){
	$.post("../AJAX/admin.php?op=cbxestados", function(c){
		$("#cbxestado").html(c);
	}).fail(function(){
		bootbox.alert("Error al cargar los estados");
	});
}

function limpiar(){
	$("#nombreInm").val("");
	$("#precioInm").val("");
	$("#anioInm").val("");
	$("#provinInm").val("");
	$("#ciudadInm").val("");
	$("#cbxzona").val("");
	$("#aconstruidaInm").val("");
	$("#aterrenoInm").val("");
	$("#chabitInm").val("");
	$("#cbanioInm").val("");
	$("#cgarajeInm").val("");
	$("#cbxestrato").val("");
	$("#cbxtpinmueble").val("");
	$("#cbxtpnegocio").val("");
	$("#cbxestado").val("");
	$("#descriptci").val("");
	tablecrtsInt.clear().draw();
	$("#descriptce").val("");
	tablecrtsExt.clear().draw();
	$("#carctrsadInm").val("");
	$("#latitud").val("");
	$("#longitud").val("");
}

$("#btnaddci").on('click', function(){
	const ci = $("#descriptci").val();
	if (ci.trim() === "") {
        alert("Por favor, ingrese un objetivo específico.");
        return;
    }
	
	tablecrtsInt.row.add([
        `<span class="editable" contenteditable="true">${ci}</span>`,
        `<button class="btn btn-danger btn-sm btn-remove" type="button">Eliminar</button>`
    ]).draw();
	$("#descriptci").val("");
	caracteristicasI = tablecrtsInt.rows().data().toArray().map(row => $(row[0]).text()).join('/');
});

$("#btnaddce").on('click', function(){
	const ce = $("#descriptce").val();
	if (ce.trim() === "") {
        alert("Por favor, ingrese un objetivo específico.");
        return;
    }
	
	tablecrtsExt.row.add([
        `<span class="editable" contenteditable="true">${ce}</span>`,
        `<button class="btn btn-danger btn-sm btn-remove" type="button">Eliminar</button>`
    ]).draw();
	$("#descriptce").val("");
	caracteristicasE = tablecrtsExt.rows().data().toArray().map(row => $(row[0]).text()).join('/');
});

$('#tblcaractersint tbody').on('blur', '.editable', function () {
    const nuevoTextoI = $(this).text().trim();

    // Verificar si el texto está vacío
    if (nuevoTextoI === "") {
        alert("El campo no puede estar vacío.");
        $(this).focus(); // Devolver el foco al campo
        return;
    }

    // Obtener la fila en la que se editó el texto
    const rowI = tablecrtsInt.row($(this).closest('tr'));
    
    // Actualizar la fila específica en la tabla con el nuevo texto
    rowI.data([
        `<span class="editable" contenteditable="true">${nuevoTextoI}</span>`, // Nuevo texto editable
        `<button class="btn btn-danger btn-sm btn-remove" type="button">Eliminar</button>` // Botón de eliminación
    ]).draw(false); // Redibujar la fila sin recargar toda la tabla
    
    // Mostrar el texto modificado en la consola
//    console.log("Texto modificado y guardado:", nuevoTexto);

    // Guardar los objetivos actualizados en una variable
    let carcti = [];
    tablecrtsInt.rows().every(function () {
        carcti.push(this.data()[0].replace(/<[^>]*>/g, '').trim()); // Elimina las etiquetas HTML y agrega el texto
    });

    // Almacenar los objetivos en una variable separada por comas
    caracteristicasI = carcti.join('/');
//    console.log("Objetivos actualizados:", descripobjespe);
});

$('#tblcaractersext tbody').on('blur', '.editable', function () {
    const nuevoTextoE = $(this).text().trim();

    // Verificar si el texto está vacío
    if (nuevoTextoE === "") {
        alert("El campo no puede estar vacío.");
        $(this).focus(); // Devolver el foco al campo
        return;
    }

    // Obtener la fila en la que se editó el texto
    const rowE = tablecrtsExt.row($(this).closest('tr'));
    
    // Actualizar la fila específica en la tabla con el nuevo texto
    rowE.data([
        `<span class="editable" contenteditable="true">${nuevoTextoE}</span>`, // Nuevo texto editable
        `<button class="btn btn-danger btn-sm btn-remove" type="button">Eliminar</button>` // Botón de eliminación
    ]).draw(false); // Redibujar la fila sin recargar toda la tabla
    
    // Mostrar el texto modificado en la consola
//    console.log("Texto modificado y guardado:", nuevoTexto);

    // Guardar los objetivos actualizados en una variable
    let carcte = [];
    tablecrtsExt.rows().every(function () {
        carcte.push(this.data()[0].replace(/<[^>]*>/g, '').trim()); // Elimina las etiquetas HTML y agrega el texto
    });

    // Almacenar los objetivos en una variable separada por comas
    caracteristicasE = carcte.join('/');
//    console.log("Objetivos actualizados:", descripobjespe);
});


$('#tblcaractersint tbody').on("click", ".btn-remove", function () {
    // Elimina la fila correspondiente
    tablecrtsInt.row($(this).parents('tr')).remove().draw();

    // Actualiza la variable con las descripciones de los objetivos
    caracteristicasI = tablecrtsInt.rows().data().toArray().map(row => $(row[0]).text()).join('/'); // Usamos .text() para obtener solo el texto

//    console.log("Objetivos actualizados:", descripobjespe);
});

$('#tblcaractersext tbody').on("click", ".btn-remove", function () {
    // Elimina la fila correspondiente
    tablecrtsExt.row($(this).parents('tr')).remove().draw();

    // Actualiza la variable con las descripciones de los objetivos
    caracteristicasE = tablecrtsExt.rows().data().toArray().map(row => $(row[0]).text()).join('/'); // Usamos .text() para obtener solo el texto

//    console.log("Objetivos actualizados:", descripobjespe);
});

function listarInmuebles(){
	$('#tblinmuebles').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		
		"ajax":
		{
			url: '../AJAX/admin.php?op=tblinmuebles',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":15,//paginacion
		"order":false//ordenar (columna, orden)
	}).DataTable();
}

function guardaryeditarInmueble(e){
	e.preventDefault();
	var formDataInm = new FormData($("#formdtinmueble")[0]);
	formDataInm.append("ci", caracteristicasI);
	formDataInm.append("ce", caracteristicasE);
	
	$.ajax({
		url: "../AJAX/admin.php?op=guardaryeditarinmueble",
     	type: "POST",
     	data: formDataInm,
     	contentType: false,
     	processData: false,
		success: function(rsta){
			if(rsta.trim() === '1'){
				bootbox.alert("Inmueble regsitrado con éxito");
				limpiar();
				posicion(4);
				$('#tblinmuebles').DataTable().ajax.reload();
			}else{
				bootbox.alert("Inmueble no registrado");
			}
		}
	});
}

$("#formdtinmueble").on('submit', function(e){
	$('#descriptci').prop('disabled', false);
	guardaryeditarInmueble(e);
});

listarInmuebles();
zonas();
estratos();
tpinmueble();
tpnegocio();
estado();