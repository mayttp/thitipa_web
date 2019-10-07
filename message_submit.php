<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
    <?php
    require('config.inc.php');
    session_start();
        $conn = new mysqli($dbserver, $dbuser, $dbpass,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        mysqli_set_charset($conn, "utf8");
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
						<a class="nav-link">สวัสดี! '.$_SESSION["user_name"].'</a>
                    </li>
                    <li class="nav-item">
					<a class="nav-link" href="cart.php"><button type="button" class="btn btn-info"> <i class="fas fa-cart-plus"> </i></button></a>
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
                                <input type="text" class="form-control" name="province" placeholder="จังหวัด">
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
                <a class="nav-link active" href="#">สอบถามข้อมูลเพิ่มเติม</a>
            </li>

        </ul>

        <?php
            $_SESSION["Email"] = $_POST["Email"];
            $_SESSION["Tel"] = $_POST["Tel"];
            $_SESSION["Text"] = $_POST["Text"];
            $_SESSION["pass3"] = $_POST["pass3"];
            ?>
        <div style="background: white">
            <div class="container" style="font-size:20px">
                <div class="row justify-content-around">

                </div>
                <form>
                    <br>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="validationCustomUsername">Email : <?php echo $_SESSION["Email"]; ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">

                                </div>
                                <div class="invalid-feedback">
                                    Please fill email.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02">เบอร์โทรศัพท์ : <?php echo $_SESSION["Tel"]; ?></label>

                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                    </div>

                    <br>
                    <div class="">
                        <label for="validationCustom02">ต้องการสอบถามสินค้าประเภท : 
                            <?php echo $_SESSION["pass3"]; ?></label>

                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="exampleFormControlTextarea1">รายละเอียดที่ต้องการสอบถาม</label>
                            <?php echo 
                                    '<textarea class="form-control" rows="4"  style="width: 70%" disabled>'
                                    .$_SESSION["Text"].
                                    '</textarea>
                                    <br>' 
                                    ?>
                        </div>
                    </div>
                </form>
                <div class="form-row">
                    <div class="col-md-12">
                        <a href="messageconfirm.php"><button class="btn btn-primary" onclick="myalert()">ส่งข้อมูล</button></a>
                        <a href="message.php"><button class="btn btn-primary">ยกเลิก</button></a>
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-12">
                       
                        <h6><a href="index.php">กลับสู่หน้าหลัก</a><h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
    function myalert() {
        alert("ส่งข้อมูลสำเร็จแล้ว!");
       
    }
    </script>
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