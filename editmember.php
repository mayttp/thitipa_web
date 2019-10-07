<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="css.css">
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
                <li class="nav-item">
                    <a class="nav-link" href="message.php">สอบถามข้อมูลเพิ่มเติม</a>
                </li>
                <?php
					if(!empty($_SESSION["status"])){
					echo '<li class="nav-item">
							<a class="nav-link" href="editmember.php">แก้ไขข้อมูลสมาชิก</a>
						  </li>';
				}
				?>
            </ul>
        </div>
    </nav>


    <div class="jumbotron jumbotron-fluid" style="background:white">
        <div class="container pad">

            <h1 class="display-4">Fluffy Squishy shop</h1>
            <hr class="my-1" width="100%"><br>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="salebanner.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="newpd.png" class="d-block w-100" alt="...">
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <br>
            <hr class="my-1" width="100%">
        </div>
    </div>
    <div class="outPopUp" style="background: white;width:80%">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">แก้ไขข้อมูลสมาชิก</a>
            </li>

        </ul>

        <div style="background: white">
            <div class="container" style="font-size:20px;">
                <div class="row justify-content-around">
                </div>
                <form action="editmember_update.php" method="post">
                <div class="row">
                           
                            <div class="form-group col-md-6">
                            <br>
                            <label for="exampleInputEmail1">ชื่อ</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $_SESSION["user_name"] ?>">
                            </div>
                            <div class="form-group col-md-6">
                            <br>    
                            <label for="exampleInputEmail1">นามสกุล</label>
                                <input type="text" class="form-control" name="lname" value="<?php echo $_SESSION["user_lname"] ?>">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">อีเมลล์</label>
                                <input type="text" class="form-control" name="em" value="<?php echo $_SESSION["user_em"] ?>">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">เบอร์โทร</label>
                                <input type="int" class="form-control" name="tel" value="<?php echo $_SESSION["user_tel"] ?>">
                            </div>


                            <br>
                            <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">จังหวัด</label>
                                <input type="text" class="form-control" name="province" value="<?php echo $_SESSION["user_pro"] ?>">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">รหัสไปรษณีย์</label>
                                <input type="text" class="form-control" name="zip" value="<?php echo $_SESSION["user_zip"] ?>">
                            </div>
                            <div class="col-md-12">
                            <label for="exampleInputEmail1">ที่อยู่</label>
                                <input type="text" class="form-control" name="ad" rows="4"
                                value="<?php echo $_SESSION["user_ad"] ?>" style="width: 100%"></textarea>
                            </div>      
                        </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    
                    
                </form>
            </div>
        </div>  
    </div>
    </div>

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