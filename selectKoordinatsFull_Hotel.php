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

	$sql = "SELECT * FROM fasilitas_hotel;";
	$stmt = $conn->prepare($sql);						
	$stmt->execute();
	
	$stmt->bind_result($idFHotel,$jenisFasilitas,$namaFasilitas,$jambuka,$keterangan);
	
	$fasilitasHotels['fasilitasHotels'] = array();
	while($stmt -> fetch()){
		
		$fasilitasHotels['fasilitasHotels'][] = array(
		"idFHotel" => $idFHotel,
		"jenisFasilitas" => $jenisFasilitas,
		"namaFasilitas" => $namaFasilitas,
		"jamBuka" => $jambuka,
		"keterangan" => $keterangan);
		
		
	}
	echo json_encode($fasilitasHotels);