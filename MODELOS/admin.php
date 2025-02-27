<?php
require "../config/Conexion.php";
class admin{
	public function logeo($usuario,$contra){
		$sql="call inmobiliaria_jvr.login(1, '$usuario', '$contra');";
		return ejecutarConsultaSP($sql);
	}
	public function cbxzonas(){
		$sql="call inmobiliaria_jvr.catinmueble(1);";
		return ejecutarConsultaSP($sql);
	}
	public function cbxestratos(){
		$sql="call inmobiliaria_jvr.catinmueble(2);";
		return ejecutarConsultaSP($sql);
	}
	public function cbxtpinmueble(){
		$sql="call inmobiliaria_jvr.catinmueble(3);";
		return ejecutarConsultaSP($sql);
	}
	public function cbxtpnegocio(){
		$sql="call inmobiliaria_jvr.catinmueble(4);";
		return ejecutarConsultaSP($sql);
	}
	public function cbxestado(){
		$sql="call inmobiliaria_jvr.catinmueble(5);";
		return ejecutarConsultaSP($sql);
	}
	public function guardaryeditarinmueble($nom,$pais,$provin,$ciudad,$precio,$zona,$estrato,$tipo,$tpnegocio,$estdo,$aconstruct,$atrrno,$nhab,$nb,$ng,$anioconstruct,$ci,$ce,$ca,$lat,$lng){
		$sql="call inmobiliaria_jvr.gesinmuebe(1, 0, '$nom', '$pais', '$provin', '$ciudad', '$precio', $zona, $estrato, $tipo, $tpnegocio, $estdo, '$aconstruct', '$atrrno', $nhab, $nb, $ng, '$anioconstruct', '$ci', '$ce', '$ca', '$lat', '$lng');";
//		echo $sql;
		return ejecutarConsultaSP($sql);
	}
	public function tablaInmuebles(){
		$sql="call inmobiliaria_jvr.gesinmuebe(2, 0, '', '', '', '', '', 0, 0, 0, 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '');";
		return ejecutarConsultaSP($sql);
	}
	public function estadoPublic($idnmbl){
		$sql="call inmobiliaria_jvr.gesinmuebe(3, $idnmbl, '', '', '', '', '', 0, 0, 0, 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '');";
		return ejecutarConsultaSP($sql);
	}
	public function infoInmueble($idnmbl){
		$sql="call inmobiliaria_jvr.gesinmuebe(4, $idnmbl, '', '', '', '', '', 0, 0, 0, 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '');";
		$row=ejecutarConsultaSP($sql);
		return $row->fetch_assoc();
	}
}
?>