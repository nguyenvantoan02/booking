<?php
    $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
    if(isset($_POST['Email']) && isset($_POST['PassWord']) && isset($_POST['PassWord_again'])){
        if(strlen($_POST['PassWord']) >= 6){
            $email = $_POST['Email'];
            $password = $_POST['PassWord'];
            $password_again = $_POST['PassWord_again'];
            $select = "SELECT * FROM register_login WHERE email='$email'";
            $result = mysqli_query($conn, $select);
            if(mysqli_num_rows($result) > 0){
                echo "<h4 style='text-align:center; transform:translate(950px,100px); font-size: 14px; background-color: #0094f3;width: 248px; padding: 6px 6px; color: #fff'>email đã tồn tại không thể đăng kí</h4>";
            }else{
                if($password_again == $password){
                    echo "<h4 style='text-align:center; transform:translate(950px,100px); font-size: 14px; background-color: #0094f3;width: 248px; padding: 6px 6px; color: #fff'>Đăng kí thành công</h4>";
                    $select2 = "INSERT INTO register_login(email,pass) VALUES('$email','$password')";
                    $result2 = mysqli_query($conn, $select2);
                    header('location: dangNhap.php');
                }else{
                    echo "<h4 style='text-align:center; transform:translate(950px,100px); font-size: 14px; background-color: #0094f3;width: 248px; padding: 6px 6px; color: #fff'>Bạn nhập mật khẩu chưa đúng</h4>";
                }
            }
        }else{
            echo "<h4 style='text-align:center; transform:translate(950px,100px); font-size: 14px; background-color: #0094f3;width: 248px; padding: 6px 6px; color: #fff'>Mật khẩu phải có ít nhất 6 kí tự</h4>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/dk_dn.css">
</head>
<body>
    <div class="dangKi">
        <a href="../index.php" class="dangKi_comeback">booking.com</a>

        <form action="dangKi.php" method="post" class="dangKi_main">
            <h3  class="dangKi_hd">Đăng kí</h3><br>
            <label for="Email">Email:</label><br>
            <input type="email" name="Email" id="Email" placeholder="Nhập vào email..."><br>

            <label for="PassWord">PassWord:</label><br>
            <input type="password" name="PassWord" id="PassWord" placeholder="Nhập vào PassWord..."><br>

            <label for="PassWord_again">PassWord again:</label><br>
            <input type="password" name="PassWord_again" id="PassWord_again" placeholder="Xác nhận lại PassWord..."><br>
            <div class="dangKi_chua">
                <a href="dangNhap.php">Đăng nhập</a>
                <input type="submit" value="Đăng kí">
            </div>
        </form>
    </div>
</body>
</html>
