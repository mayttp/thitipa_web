<?php
session_start();
require('config.inc.php');
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

$mem_id = $_SESSION["user_id"];
$mem_name = $_POST["name"];
$mem_lname = $_POST["lname"];
$mem_em = $_POST["em"];
$mem_tel = $_POST["tel"];
$mem_province = $_POST["province"];
$mem_zip = $_POST["zip"];
$mem_ad = $_POST["ad"];
$sql = "UPDATE member set mem_name='$mem_name',mem_lname='$mem_lname',mem_em='$mem_em',mem_tel='$mem_tel',mem_province='$mem_province',mem_zip='$mem_zip',mem_ad='$mem_ad' WHERE mem_id='$mem_id'";



if(mysqli_query($conn,$sql)){
    $_SESSION["user_id"] = $mem_id;
    $_SESSION["user_name"] = $mem_name;
    $_SESSION["user_lname"] = $mem_lname;
    $_SESSION["user_tel"] = $mem_tel;
    $_SESSION["user_ad"] = $mem_ad;
    $_SESSION["user_em"] = $mem_em;
    $_SESSION["user_pro"] = $mem_province;
    $_SESSION["user_zip"] = $mem_zip;
    echo '<meta http-equiv="refresh" content="1;URL=editmember.php">';
}else{
    echo 'ERROR: $sql'.mysqli_error($conn);
}
?>