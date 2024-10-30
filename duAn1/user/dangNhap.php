<?php
    session_start(); // Bắt đầu session

    $conn = mysqli_connect("localhost", "root", "123456", "duAn1");

    if(isset($_POST['Email']) && isset($_POST['PassWord'])){
        $email = $_POST['Email'];
        $password = $_POST['PassWord'];
        
        $select = "SELECT user_id FROM register_login WHERE email='$email' AND pass = '$password'";
        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['user_id'];

            // Lưu user_id vào session
            $_SESSION['user_id'] = $user_id;
            header('location: ../home.php');
            exit;
        } else {
            echo "<h4 style='text-align:center;transform:translate(950px,100px); font-size: 14px; background-color: #0094f3;width: 248px; padding: 6px 6px; color: #fff'>Đăng Nhập thất bại</h4>";
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
        <a href="../index.php" class="dangKi_comeback">Booking.com</a>
        <form action="dangNhap.php" method="post" class="dangNhap_main">
            <h3  class="dangKi_hd">Đăng Nhập</h3><br>
            <label for="Email">Email:</label><br>
            <input type="email" name="Email" id="Email" placeholder="Nhập vào email..."><br>

            <label for="PassWord">PassWord:</label><br>
            <input type="password" name="PassWord" id="PassWord" placeholder="Nhập vào PassWord..."><br>

            <div class="dangKi_chua">
                <a href="dangKi.php">Đăng Kí</a>
                <input type="submit" value="Đăng nhập" class="dn">
            </div>
        </form>
    </div>
</body>
</html>
