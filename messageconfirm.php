<?php
require('config.inc.php');
session_start();
$conn = new mysqli($dbserver, $dbuser, $dbpass,$dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    mysqli_query($conn,"SET character_set_results=utf8");
        mysqli_query($conn,"SET character_set_client='utf8'");
        mysqli_query($conn,"SET character_set_connection='utf8'");
        mysqli_query($conn,"collation_connection = utf8_unicode_ci");
        mysqli_query($conn,"collation_database = utf8_unicode_ci");
        mysqli_query($conn,"collation_server = utf8_unicode_ci");


$mes_em = $_SESSION["Email"] ;
$mes_tel = $_SESSION["Tel"];
$mes_text =  $_SESSION["Text"];
$mes_type =  $_SESSION["pass3"];

$sql = "INSERT INTO mes(mes_em,mes_tel,mes_text,mes_type) VALUES('$mes_em','$mes_tel','$mes_text','$mes_type')";
if(mysqli_query($conn,$sql)){
    echo '<meta http-equiv="refresh" content="1;URL=index.php">';
}else{
    echo 'ERROR: $sql'.mysqli_error($conn);
}
?>