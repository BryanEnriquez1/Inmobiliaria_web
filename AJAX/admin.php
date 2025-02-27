<?php
session_start();
require_once "../MODELOS/admin.php";
$admin = new admin();
switch ($_GET['op']){
	case 'login':
		$rspt=$admin->logeo($_POST['usuario'],$_POST['contrasenia']);
		$reg=$rspt->fetch_row();
		echo $reg[0];
		break;
		
	case 'cbxzonas':
		$rspt=$admin->cbxzonas();
		echo '<option id="opcbzona" name="opcbzona" value="">Seleccione la zona</option>';
		while ($reg=$rspt->fetch_object()) {
				echo '<option id="opcbzona" name="opcbzona" value=' . $reg->cat_id.'>'.$reg->cat_nombre.'</option>';
		}
		break;
		
	case 'cbxestratos':
		$rspt=$admin->cbxestratos();
		echo '<option id="opcbzona" name="opcbzona" value="">Seleccione el estrato</option>';
		while ($reg=$rspt->fetch_object()) {
				echo '<option id="opcbzona" name="opcbzona" value=' . $reg->cat_id.'>'.$reg->cat_nombre.'</option>';
		}
		break;
		
	case 'cbxtpinmuebles':
		$rspt=$admin->cbxtpinmueble();
		echo '<option id="opcbzona" name="opcbzona" value="">Seleccione el tipo de inmueble</option>';
		while ($reg=$rspt->fetch_object()) {
				echo '<option id="opcbzona" name="opcbzona" value=' . $reg->cat_id.'>'.$reg->cat_nombre.'</option>';
		}
		break;
		
	case 'cbxtpnegocios':
		$rspt=$admin->cbxtpnegocio();
		echo '<option id="opcbzona" name="opcbzona" value="">Seleccione el tipo de negociación</option>';
		while ($reg=$rspt->fetch_object()) {
				echo '<option id="opcbzona" name="opcbzona" value=' . $reg->cat_id.'>'.$reg->cat_nombre.'</option>';
		}
		break;
		
	case 'cbxestados':
		$rspt=$admin->cbxestado();
		echo '<option id="opcbzona" name="opcbzona" value="">Seleccione el estado del inmueble</option>';
		while ($reg=$rspt->fetch_object()) {
				echo '<option id="opcbzona" name="opcbzona" value=' . $reg->cat_id.'>'.$reg->cat_nombre.'</option>';
		}
		break;
		
	case 'guardaryeditarinmueble':
		$rspt=$admin->guardaryeditarinmueble($_POST['nombreInm'],$_POST['paisInm'],$_POST['provinInm'],$_POST['ciudadInm'],$_POST['precioInm'],$_POST['cbxzona'],$_POST['cbxestrato'],$_POST['cbxtpinmueble'],$_POST['cbxtpnegocio'],$_POST['cbxestado'],$_POST['aconstruidaInm'],$_POST['aterrenoInm'],$_POST['chabitInm'],$_POST['cbanioInm'],$_POST['cgarajeInm'],$_POST['anioInm'],$_POST['ci'],$_POST['ce'],$_POST['carctrsadInm'],$_POST['latitud'],$_POST['longitud']);
		$reg=$rspt->fetch_row();
		echo $reg[0];
		break;
		
	case 'tblinmuebles':
		$rspt=$admin->tablaInmuebles();
		$dataInmuebles=Array();
		
		while ($reg=$rspt->fetch_object()){
			$estado="";
			$btnpublic="";
			if($reg->estado == "DISPONIBLE"){
				$estado="<label style='color: green;'>".$reg->estado."</label>";
			}else{
				$estado="<label style='color: red;'>".$reg->estado."</label>";
			}
			if($reg->inmb_estdopubli == 1){
				$btnpublic='<button class="btn btn-primary" onclick="verInmueble(' . $reg->inmb_id . ')">VER INMUEBLE <i class="bi bi-eye-fill" aria-hidden="true"></i></button>'.'<br><button class="btn btn-success" onclick="publicar(' . $reg->inmb_id . ')">DESPUBLICAR <i class="bi bi-cloud-arrow-down" aria-hidden="true"></i></button>';
			}else{
				$btnpublic='<button class="btn btn-primary" onclick="subirFotos(' . $reg->inmb_id . ')">SUBIR FOTOS <i class="bi bi-file-earmark-arrow-up" aria-hidden="true"></i></button>'.'<br><button class="btn btn-success" onclick="publicar(' . $reg->inmb_id . ')">PUBLICAR <i class="bi bi-cloud-arrow-up" aria-hidden="true"></i></button>';
			}
			$dataInmuebles[]=array(
				"0"=>'<button class="btn btn-warning" onclick="editar(' . $reg->inmb_id . ')"><i class="bi bi-pencil-square" aria-hidden="true"></i></button>',
				"1"=>$reg->inmb_nombre,
				"2"=>$reg->inmb_pais,
				"3"=>$reg->inmb_provincia,
				"4"=>$reg->inmb_ciudad,
				"5"=>$reg->inmb_precio,
				"6"=>$reg->tipo,
				"7"=>$btnpublic,
				"8"=>$estado
			);
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($dataInmuebles),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($dataInmuebles),//enviamos el total de registros a visualizar
             "aaData"=>$dataInmuebles);
		echo json_encode($results);
		break;
		
	case 'subirfotos':
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Definir la carpeta de destino
			$targetDir = "../FILES/inmuebles/".$_POST['idinmble']."-inmueble/";

			// Crear la carpeta si no existe
			if (!is_dir($targetDir)) {
				mkdir($targetDir, 0755, true);
			}

			// Manejar los archivos subidos
			foreach ($_FILES['files']['name'] as $key => $name) {
				$tempName = $_FILES['files']['tmp_name'][$key];
				$fileName = basename($name); // Agregar "1-" al nombre del archivo
				$targetFilePath = $targetDir . $fileName;

				// Mover el archivo a la carpeta de destino
				if (move_uploaded_file($tempName, $targetFilePath)) {
					echo "El archivo $fileName se ha subido correctamente.<br>";
				} else {
					echo "Error al subir el archivo $name.<br>";
				}
			}
		} else {
			echo "No se ha recibido ningún archivo.";
		}
		break;
		
	case 'verificarImagenes':
		
		if (isset($_POST['idinmble'])) {
			$idinmble = $_POST['idinmble'];
			$targetDir = "../FILES/inmuebles/" . $idinmble . "-inmueble/";

			$response = ["existe" => false, "archivos" => []];

			if (is_dir($targetDir)) {
				$archivos = array_diff(scandir($targetDir), array('..', '.'));

				if (!empty($archivos)) {
					$response["existe"] = true;
					$response["archivos"] = array_values($archivos);
				}
			}

			echo json_encode($response);
		}
		break;
		
	case 'eliminarImagen':
		
		if (isset($_POST['idinmble']) && isset($_POST['archivo'])) {
			$idinmble = $_POST['idinmble'];
			$archivo = $_POST['archivo'];
			$filePath = "../FILES/inmuebles/" . $idinmble . "-inmueble/" . $archivo;

			if (file_exists($filePath) && unlink($filePath)) {
				echo "success";
			} else {
				echo "error";
			}
		}
		break;
		
	case 'changeEstdoPublic':
		
		$rspt=$admin->estadoPublic($_POST['idnmbl']);
		$reg=$rspt->fetch_row();
		echo $reg[0];
		break;
		
	case 'inmueble':
		
		$_SESSION['idinmueble'] = $_POST['idnmble'];
		echo "1";
		break;
		
	case 'infoInmueble':
		
		$rspt=$admin->infoInmueble($_SESSION['idinmueble']);
		echo json_encode($rspt, JSON_UNESCAPED_UNICODE);
		break;
		
	case 'mostrarGaleria':
		
		$targetDir = "../FILES/inmuebles/" . $_SESSION['idinmueble'] . "-inmueble/";

		if (!is_dir($targetDir)) {
			echo json_encode(["error" => "No existe la carpeta"]);
			exit;
		}

		$files = array_diff(scandir($targetDir), array('..', '.'));
		$fileList = [];

		foreach ($files as $file) {
			$filePath = $targetDir . $file;
			$fileType = mime_content_type($filePath);

			// Verifica si es imagen o video
			if (strpos($fileType, 'image') !== false) {
				$type = "image";
			} elseif (strpos($fileType, 'video') !== false) {
				$type = "video";
			} else {
				continue;
			}

			$fileList[] = [
				"name" => $file,
				"url" => $filePath,
				"type" => $type
			];
		}

		echo json_encode($fileList);
		break;
		
	case 'caracteristicasInt':
		
		$html="";
		$caracteristicasInt = explode("/", $_POST['ci']);
		
		foreach ($caracteristicasInt as $cidiv) {
            $html .= '<div class="col-md-4 mb-2"> 
                        <label for="ciinmbl" class="form-label">
                            <strong><i class="bi bi-box-fill"></i> ' . trim($cidiv) . '</strong>
                        </label>
                      </div>';
        }
		
		echo $html;
		break;
		
	case 'caracteristicasExt':
		
		$html="";
		$caracteristicasExt = explode("/", $_POST['ce']);
		
		foreach ($caracteristicasExt as $cediv) {
            $html .= '<div class="col-md-4 mb-2"> 
                        <label for="ciinmbl" class="form-label">
                            <strong><i class="bi bi-box-fill"></i> ' . trim($cediv) . '</strong>
                        </label>
                      </div>';
        }
		
		echo $html;
		break;
}
?>