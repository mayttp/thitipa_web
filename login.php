<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
    <?php
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
    ?>
</head>

<body style="background: rgb(255, 181, 96)">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#"><img src="logo.png" width="30px" height="30px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <?php
    session_start();
    require('config.inc.php');
    $em = trim($_POST["em"]);
    $pass = trim($_POST["pass"]);
    $password = hash('sha512',$pass);
    $mysql = "SELECT * FROM member WHERE mem_em='$em'";
    $result = mysqli_fetch_array(mysqli_query($conn,$mysql));
    if($result){
        if($result["mem_pass"] == $password){
            $_SESSION["status"] = 'true';
            $_SESSION["user_id"] = $result["mem_id"];
            $_SESSION["user_name"] = $result["mem_name"];
            $_SESSION["user_lname"] = $result["mem_lname"];
            $_SESSION["user_tel"] = $result["mem_tel"];
            $_SESSION["user_ad"] = $result["mem_ad"];
            $_SESSION["user_em"] = $result["mem_em"];
            $_SESSION["user_pro"] = $result["mem_province"];
            $_SESSION["user_zip"] = $result["mem_zip"];
            echo 
        '<div class="jumbotron jumbotron-fluid" style="background:white">
            <div class="container pad">
    
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">สวัสดี, '.$result["mem_name"].' เข้าสู่ระบบสำเร็จ</h4>
                    <hr>
                    
                    <p class="mb-0">กำลังกลับสู่หน้าหลัก...</p>
                    <meta http-equiv="refresh" content="3;URL='.$_SERVER["HTTP_REFERER"].'">
                </div>
            </div>
        </div>';
        }else{
            echo 
        '<div class="jumbotron jumbotron-fluid" style="background:white">
            <div class="container pad">
    
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">เข้าสู่ระบบไม่สำเร็จ</h4>
                    <p>อีเมลล์ หรือ รหัสผ่าน ผิดพลาด</p>
                    <hr>
                    <p class="mb-0">กำลังกลับสู่หน้าก่อนหน้า...</p>
                    <meta http-equiv="refresh" content="3;URL='.$_SERVER["HTTP_REFERER"].'">
                </div>
            </div>
        </div>';
        }
    }else{
        echo 
        '<div class="jumbotron jumbotron-fluid" style="background:white">
            <div class="container pad">
    
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">เข้าสู่ระบบล้มเหลว!</h4>
                    <p>อีเมลล์ หรือ รหัสผ่าน ผิดพลาด</p>
                    <hr>
                    <p class="mb-0">กำลังกลับสู่หน้าหลัก...</p>
                    <meta http-equiv="refresh" content="3;URL='.$_SERVER["HTTP_REFERER"].'">
                </div>
            </div>
        </div>';
    }
    ?>




    </center>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>