<!DOCTYPE html>

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="css/regis.css">
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
	<!-- เริ่มหัว -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#"><img src="logo.png" width="30px" height="30px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ประเภทสินค้า
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="index.php">Squishy</a>
                        <a class="dropdown-item" href="doll.php">Doll</a>
                        <a class="dropdown-item" href="eiei.html">Board Game</a>
                        <a class="dropdown-item" href="eiei.html">Toy</a>
                        <a class="dropdown-item" href="eiei.html">สินค้าลดราคา</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="message.php">สอบถามข้อมูลเพิ่มเติม</a>
                </li>
			</ul>
			<ul class="navbar-nav">
            <?php
			if(empty($_SESSION["status"])){
				echo '
					<li>
						<button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal"
							data-target="#exampleModal"><i class="fas fa-sign-in-alt"></i>เข้าสู่ระบบ</button>
					</li>
					<li class="nav-item">

						<a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">สมัครสมาชิก</a>
					</li>
				';
			}else{
				echo '
					<li class="nav-item" style="margin:10px 0px">
						<a class="nav-link">สวัสดี! '.$_SESSION["user"].'</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="logout.php"><button type="button"  class="btn btn-secondary btn-md">ออกจากระบบ</button></a>
					</li>
				';
			}
			?>
			</ul>
        </div>
    </nav>
    <!-- ล็อคอิน -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เข้าสู่ระบบ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="em" aria-describedby="emailHelp"
                                placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="pass" placeholder="Password">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- สมัคร-->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">สมัครสมาชิก</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="register.php" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="ชื่อ">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="lname" placeholder="นามสกุล">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="em" placeholder="อีเมลล์">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" name="pass"
                                    placeholder="รหัสผ่าน 6 หลักขึ้นไป">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="int" class="form-control" name="tel" placeholder="เบอร์โทร">
                            </div>


                            <br>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="province" placeholder="จังวัด">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="zip" placeholder="รหัสไปรษณีย์">
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="ad" placeholder="ที่อยู่" name="Text" rows="4"
                                    style="width: 100%"></textarea>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<!-- สุดหัว -->
    <div class="jumbotron jumbotron-fluid" style="background:white">
        <div class="container">

            <h1 class="display-4">Fluffy Squishy shop</h1>
            <hr class="my-1" width="100%"><br>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="salebanner.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="newpd.png" class="d-block w-100" alt="...">
                        </div>

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
                <a class="nav-link active" href="index.php">Squishy</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="doll.php">Doll</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Board Game</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Toy</a>
            </li>
        </ul>
        <center>
            <div style="background: white">
                <div class="container">
                    <div class="row justify-content-around">

                        <?php
                        $sql = 'SELECT * FROM squishy.product';
                        $result = $conn->query($sql);
                        if(mysqli_query($conn,$sql)){
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $id = $row['pro_id'];
                                    $name = $row['pro_name'];
                                    $pic = $row['pro_pic'];
                                    $detail = $row['pro_detail'];
                                    $price = $row['pro_price'];
                                    $type = $row['pro_type'];
                                    
                                    echo 
                                    '<div class="col-sm-4 mar">
                                    <div class="card" style="width: 18rem;">
                                    <img src="squishy/'.$pic.'" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$name.'</h5>
                                        <p class="card-text">Price:'.$price.'</p>
                                        <a href="detail.php?id='.$id.'" class="btn btn-primary">view</a>
                                        <a href="#" class="btn btn-primary">buy</a>
                                    </div>
                                </div>
                                </div>';
                                }
                            }
                        }
                        
                        ?>







                    </div>
                </div>
            </div>
    </div>
    </center>
    <script src="js/regis.js">
    < script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js "
    integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo "
    crossorigin = "anonymous " >
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js "
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1 " crossorigin="anonymous ">
    </script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    //<script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js " //integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM " crossorigin="
        anonymous ">
     //</script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"> </script> </body> <? ?>