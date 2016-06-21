<?php
function printName($name){
	echo "<p>Nesh Suresh</p>";
	//ini_set('display_errors',1);
//ini_set('display_startup_errors',1);
//error_reporting(E_ALL);
}
function connect(){
	$servername = "127.0.0.1";
	$username = "sureshv";
	$password = "sureshv";
	$dbname = "sureshv";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		echo "ERROR : Connected unsuccessfully<br /><br />";
		die("Connection failed: " . $conn->connect_error);
	} 
	return $conn;
}
function createTableUsers(){
	$sql = "create table if not exists prjusers(id int NOT NULL AUTO_INCREMENT,user varchar(30), password varchar(12), PRIMARY KEY (id))";
	$conn = connect();
	$result = $conn->query($sql);
	
}
function createTableRecord(){
	$sql = "create table if not exists prjrecords(id int NOT NULL AUTO_INCREMENT, user varchar(30), Date varchar(30), ClockIn varchar(30), ClockOut varchar(12), Hours int(3), Money int(4),  PRIMARY KEY (id))";
 	$result = $conn->query($sql);
}
function addData(){
	$file="output.txt";
    $fopen = fopen($file, r);
    $fread = fread($fopen,filesize($file));
    fclose($fopen);
	$fread = trim($fread, PHP_EOL);
    $split = explode(PHP_EOL, $fread);
	
    $array[] = null;
    foreach ($split as $string)
    {
		if($string != ""){
        	$row = explode(",", $string);
        	array_push($array,$row);
		}
    }
	unset($array[0]);
	foreach ( $array as $var ) {
		insert($var[0], $var[1], $var[2], $var[3], $var[4]);
	}
	file_put_contents("output.txt", "");
}
function insert($insert){
	$conn = connect();
//prjrecords(entry int NOT NULL AUTO_INCREMENT, user varchar(30), Date varchar(30), ClockIn varchar(30), ClockOut varchar(12), Hours int(3), Money int(4),  PRIMARY KEY (entry))";
	$sql = "insert into prjrecords (user,Date,ClockIn,ClockOut,Hours,Money) values ($insert)";
	$result = $conn->query($sql);
}
function getAll($user){
	echo "<br/>Records<br /><br />";
	$sql = "SELECT * FROM prjrecords WHERE user='$user'";
	$conn = connect();
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
		    echo "ID: " . $row["id"]. " | Username: " . $row["user"]. " " . $row["Date"]." ".$row["Hours"].$row["ClockIn"]." ".$row["ClockOut"]." ".$row["Money"]."<br>";
		}
	} else {
		echo "0 results";
	}
	$conn->close();
}


?>
