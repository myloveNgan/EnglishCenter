<?php
require './lib/function.php';

$userName = $passWord = "";
$userName_error = $passWord_error = "";
if(isset($_POST['submit'])) {
    if (empty($_POST['userName'])) {
        $userName_error = "Bạn chưa đăng nhập tài khoản";
    } else {
        $userName = htmlspecialchars($_POST['userName']);
    }

    if (empty($_POST['passWord'])) {
        $passWord_error = "Bạn chưa đăng nhập mật khẩu";
    } else {
        $passWord = htmlspecialchars($_POST['passWord']);
    }
}
$test = false;
if(isset($_POST['submit'])){
    $test = empty($userName_error) && empty($passWord_error) ;
}

if($test){
    $result = checkAcountTeacher($userName,$passWord,$connection);
    if($result){
        session_start();
        $_SESSION['userName'] = htmlspecialchars($userName);
        header("Location: pages/home.php");
        exit();
    }else{
        $passWord_error = "Tài khoản hoặc mật khẩu bạn sai";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apollo-login</title>
    <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body>
    <div class="login-star">
        <img src="./assets/images/login_stars.png" alt="">
    </div>
    <div id="contain">

        <div class="login-student">
            <div class="login-student-img">
                <img src="./assets/images/Apollo-Logo.png" alt="">
            </div>

            <div class="login-student-form">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                    <div style="display: flex;justify-content: start;">
                        <h1>Giáo Viên</h1>
                    </div>
                    <div class="login-student-form-center">
                        <input class="login-student-form-input" type="text" name="userName" placeholder="Tên tài khoản hoặc Email:">
                    </div>
                    <p style="color:red ; margin-bottom: 20px;"><?php
                            echo "$userName_error";
                    ?></p>
                    <div>
                        <input name="passWord" class="login-student-form-input" type="password" placeholder="Mật khẩu : ">
                    </div>
                    <p style="color:red ; margin-bottom: 20px;">
                    <?php
                    if(isset($_POST['submit']))
                            echo "$passWord_error";
                    ?></p>
                    <div style="display: flex; justify-content: space-around;">

                    </div>

                    <div>
                    <input class="form-submit" type="submit" name="submit" value="Đăng nhập">
                    </div>

                    <div>
                        <a class="form-submit" href="./loginGV.php">Giáo viên bấm vào đây</a>
                    </div>


                </form>
            </div>


        </div>

        <div class="login-slogan">
            <img style="width: 350px; height: 125px; margin-bottom: 10px;" src="./assets/images/LoginSlogan.png" alt="">
            <div>
                <a href=""><img style="width: 150px;" src="./assets/images/app-store-badge.png" alt=""></a>
                <a href=""><img style="width:170px" src="./assets/images/google-play-badge.png" alt=""></a>
            </div>
        </div>
    </div>
    <footer>
        <p class="footer-p">Copyright © Smart Education is Now, All rights reserved</p>
    </footer>
</body>

</html>