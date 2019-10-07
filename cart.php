<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="shopping-cart.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
    <?php
    session_start();
    if(empty($_SESSION["status"])){
      
      
      header("Location: main.php");
      
    }
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
	
    <main class="page">
	 	<section class="shopping-cart dark">
	 		<div class="container">
		        <div class="block-heading">
		          </div>
		        <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-8">
	 						<div class="items">
				 				<div class="product">
								 <?php
                $total = 0;
                $user_id = $_SESSION["user_id"];
                // $sql = "SELECT * FROM product WHERE pro_id IN(SELECT a.pro_id FROM cart a,member b WHERE a.mem_id = b.mem_id)";
                $sql= "SELECT product.pro_id,product.pro_name,product.pro_type,product.pro_price,product.pro_pic,cart.c_id FROM product INNER JOIN cart ON product.pro_id = cart.pro_id;";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                  while($row = mysqli_fetch_assoc($result)){
                    $pro_name = $row["pro_name"];
                    $pro_type = $row["pro_type"];
                    $pro_pic = $row["pro_pic"];
                    $pro_price = $row["pro_price"];
                    $cart_id = $row["c_id"];
                    echo '
                    <div class="row" style="margin:10px 0px">
					 					<div class="col-md-3">
					 						<img class="img-fluid mx-auto d-block image" src="squishy/'.$pro_pic.'">
					 					</div>
					 					<div class="col-md-8">
					 						<div class="info">
						 						<div class="row">
							 						<div class="col-md-5 product-name">
							 							<div class="product-name">
								 							<a href="#">'.$pro_name.'</a>
								 							<div class="product-info">
									 							<div>Type: <span class="value">'.$pro_type.'</span></div>
									 						</div>
									 					</div>
							 						</div>
							 						<div class="col-md-4" >
							 							<a href="delcart.php?id='.$cart_id.'"><i class="fas fa-times"></i></a>
							 						</div>
							 						<div class="col-md-3 price">
							 							<span>'.$pro_price.' บาท</span>
							 						</div>
							 					</div>
							 				</div>
					 					</div>
					 				</div>
                    ';
                    $total += $pro_price;
                  }
                }else{
                    echo ' <h1 style="margin:0px 20px">   ตะกร้าสินค้าของคุณว่าง <i class="fas fa-hand-holding"></i></h1>';
                }
                ?>
				 				</div>
				 			
				 			</div>
			 			</div>
			 			<div class="col-md-12 col-lg-4">
			 				<div class="summary">
			 					<h3>Summary</h3>
			 					<div class="summary-item"><span class="text">Subtotal</span><span class="price"><?php echo $total?></span></div>
			 					<div class="summary-item"><span class="text">Discount</span><span class="price">0</span></div>
			 					<div class="summary-item"><span class="text">Shipping</span><span class="price">0</span></div>
			 					<div class="summary-item"><span class="text">Total</span><span class="price"><?php echo $total?> บาท</span></div>
			 					<a href="buy.php"><button type="button" class="btn btn-primary btn-lg btn-block">ยืนยันการสั่งซื้อ</button></a>
				 			</div>
			 			</div>
		 			</div> 
		 		</div>
	 		</div>
		</section>
	</main>




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