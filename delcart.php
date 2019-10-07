<?php
session_start();
require('config.inc.php');
if(empty($_SESSION["user_id"])){
    header("Location: " . 'index.php');
}
$conn = new mysqli($dbserver, $dbuser, $dbpass,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_query($conn,"SET character_set_results=utf8");
$c_id = $_REQUEST["id"];
$sql = "SELECT * FROM cart WHERE c_id='$c_id'";
$result = mysqli_query($conn,$sql);
if($result){
    $sql = "DELETE FROM cart WHERE c_id='$c_id'";
    mysqli_query($conn,$sql);
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}
?>