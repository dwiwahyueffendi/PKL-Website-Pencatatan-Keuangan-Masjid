<?php 
	function connection() {
	    $dbServer = 'localhost';
	    $dbUser = 'root';
	    $dbPass = '';
	    $dbName = "masjid";

	    $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);

        mysqli_select_db($conn,$dbName);
        
        if(! $conn)
            die('Koneksi Gagal: ' . mysqli_error());

        return $conn;
	}

	$conn = connection();

	function query($query){
		global $conn;
		$result = mysqli_query($conn, $query); 
		$record = [];

		while( $data = mysqli_fetch_assoc($result))
			$record[] = $data;

		return $record;
	}
?>
