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

	$sql = "SELECT * FROM koordinats;";
	$stmt = $conn->prepare($sql);						
	$stmt->execute();
	
	$stmt->bind_result($namaTempat,$v0,$v1,$gambar,$alamat,$description);
	
	$koordinats['koordinats'] = array();
	while($stmt -> fetch()){
		
		$koordinats['koordinats'][] = array(
		"namaTempat" => $namaTempat,
		"v0" => $v0,
		"v1" => $v1,
		"gambar" => $gambar,
		"alamat" => $alamat,
		"description" => $description);
		
		
	}
	echo json_encode($koordinats);
