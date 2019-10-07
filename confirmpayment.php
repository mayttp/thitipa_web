<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/css?family=Trirong&display=swap" rel="stylesheet">
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
                <a class="nav-link active" href="#">แจ้งการชำระเงิน</a>
            </li>

        </ul>

        <div style="background: white">
            <div class="container" style="font-family: 'Trirong', serif;font-size:20px;">
                <div class="row justify-content-around">
                </div>
                <form action="message_submit.php" method="POST">


                    <div class="form-row" style="margin:20px 0px">
                        <div class="col-md-6">
                            <h4 for="validationCustomUsername">รหัสคำสั่งซื้อ</h4>
                            <div class="input-group">
                                <div class="input-group-prepend">

                                </div>
                                <input type="text" class="form-control" name="numproduct" placeholder=""
                                    aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    กรุณากรอกรหัสคำสั่งซื้อ
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 for="validationCustom02">ธนาคารที่โอนเงิน</h4>
                            <input type="text" class="form-control" name="bank" placeholder="" value="" required>

                        </div>
                        <div class="col-md-6">
                            <h4 for="validationCustom02">วันที่ทำรายการ</h4>
                            <input type="int" class="form-control" name="bank" placeholder="วัน/เดือน/พศ." value=""
                                required>

                        </div>
                        <div class="col-md-3 ">
                            <h4 for="validationCustom02">เวลาที่ทำรายการ</h4>

                            <div class="form-group">

                                <select class="custom-select" id="exampleFormControlSelect1">
                                    <option value="hourr">hour</option>
                                    <option value="00">00</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                </select>


                            </div>

                        </div>
                        <div class="col-md-3">
                            <h4 for="validationCustom02" style="color: white">เวลาที่ทำรายการ</h4>
                            <div class="form-group">
                                <select class="custom-select" id="exampleFormControlSelect1">
                                    <option value="hourr">minute</option>
                                    <option value="00">00</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="52">52</option>
                                    <option value="53">53</option>
                                    <option value="54">54</option>
                                    <option value="55">55</option>
                                    <option value="56">56</option>
                                    <option value="57">57</option>
                                    <option value="58">58</option>
                                    <option value="59">59</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <form>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">อัพโหลดหลักฐานการชำระเงิน</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                            </form>

                        </div>
                    </div>


                    <br>
                    <div class="form-row">
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">ยืนยัน</button>
                        </div>
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