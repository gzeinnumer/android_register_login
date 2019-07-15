<?php
	define('DB_HOST','localhost');
	define('DB_USER','id8359153_root');
	//define('DB_USER','root');
	define('DB_PASS','123456');
	define('DB_NAME','id8359153_users');
	//define('DB_NAME','users');
	
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	if(mysqli_connect_error()){
		echo "Failed connect to Mysql".mysql_connect_error();
		die();
	}

	$sql = "SELECT * FROM fasilitas_kamar;";
	$stmt = $conn->prepare($sql);						
	$stmt->execute();
	
	$stmt->bind_result($idFKamar,$typeKamar,$fasilitasKamar,$harga,$keterangan);
	
	$fasilitaskamar['fasilitasKamar'] = array();
	while($stmt -> fetch()){
		
		$fasilitaskamar['fasilitasKamar'][] = array(
		"idFKamar" => $idFKamar,
		"typeKamar" => $typeKamar,
		"fasilitasKamar" => $fasilitasKamar,
		"harga" => $harga,
		"keterangan" => $keterangan);
		
		
	}
	echo json_encode($fasilitaskamar);