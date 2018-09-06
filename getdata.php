<?php
$host = "localhost";
$db = "vetflix";
$user = "root"; 
$pass = ""; 
$conn = new mysqli($host,$user,$pass,$db); 
$rows = array();

$tag="";
if(isset($_GET["tag"]))
	{
	$tag = $_GET["tag"];
	if($tag=="movies")
	$sql = "SELECT * FROM movies";
	else if($tag=="tvseries")
	$sql = "SELECT * FROM `tv series`";
	}
else
	$sql = "SELECT * FROM `short films`";

$result = $conn->query($sql) or die("cannot write");
while($row = $result->fetch_assoc()){
	$rows[] = $row;
}
print json_encode(array('serverres'=>$rows));
?>