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

	$sql = "SELECT * FROM fasilitas_makan;";
	$stmt = $conn->prepare($sql);						
	$stmt->execute();
	
	$stmt->bind_result($idFMakan,$typeMakanan,$menu,$harga,$keterangan);
	
	$fasilitasMakan['fasilitasMakan'] = array();
	while($stmt -> fetch()){
		
		$fasilitasMakan['fasilitasMakan'][] = array(
		"idFMakan" => $idFMakan,
		"typeMakanan" => $typeMakanan,
		"menu" => $menu,
		"harga" => $harga,
		"keterangan" => $keterangan);
		
		
	}
	echo json_encode($fasilitasMakan);