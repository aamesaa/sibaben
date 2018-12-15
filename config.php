<?php

		$config["server"]='localhost';
		$config["username"]='root';
		$config["password"]='';
	$config["database_name"]='ppn';
		
function connect_database() 
	{	
		$config["server"]='localhost';
		$config["username"]='root';
		$config["password"]='';
		$config["database_name"]='ppn';

		$koneksi = mysqli_connect($config["server"], $config["username"], $config["password"], $config["database_name"]);

		
		return $koneksi;
	}

?>