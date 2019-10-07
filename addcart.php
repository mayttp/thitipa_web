<?php
    require('config.inc.php');
    session_start();
        $conn = new mysqli($dbserver, $dbuser, $dbpass,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        mysqli_query($conn,"SET NAME utf8");
        
        $id = $_REQUEST["id"];
        $user_id = $_SESSION["user_id"];
        $_SESSION["added"] = 'true';
        $sql = "INSERT INTO cart(mem_id,pro_id) VALUES('$user_id','$id')";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo '<meta http-equiv="refresh" content="0.0000001;URL=index.php#profile">';
        }
?>