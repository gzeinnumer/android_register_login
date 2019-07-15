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

	$sql = "SELECT * FROM hotel;";
	$stmt = $conn->prepare($sql);						
	$stmt->execute();
	
	$stmt->bind_result($idHotel,$nama,$alamat,$idFHotel,$idFMakan,$idFKamar,$v0,$v1,$gambar,$keterangan);
	
	$hotels['hotels'] = array();
	while($stmt -> fetch()){
		
		$hotels['hotels'][] = array(
		"idHotel" => $idHotel,
		"nama" => $nama,
		"alamat" => $alamat,
		"idFHotel" => $idFHotel,
		"idFMakan" => $idFMakan,
		"idFKamar" => $idFKamar,
		"v0" => $v0,
		"v1" => $v1,
		"gambar" => $gambar,
		"keterangan" => $keterangan);
		
		
	}
	echo json_encode($hotels);