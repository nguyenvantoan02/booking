<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/admin_flight.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<?php  
    function option(){
        $conn = mysqli_connect("localhost", "root", "123456", "duAn1");

        if(isset($_POST['user_id']) && isset($_POST['email']) && isset($_POST['pass'])){
            $user_id = $_POST['user_id'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            if(isset($_POST['Delete'])){
                     
?>
<body style="padding-top: 70px">
        <form action="manager_acc2.php" method="post">
            <input type="hidden" name="user_id2" value="<?php echo $user_id; ?>">
            <h3>Bạn có chắc là muốn XÓA dữ liệu tài khoản?</h3>
            <input type="submit" value="Hủy" name="cancell">
            <input type="submit" value="Tiếp tục" name="confirmm">
        </form>

    <?php  }else if(isset($_POST['Add'])){?>
        
    <a href="manager_acc.php" class="comback"><i class="fa-solid fa-user-tie">Admin</i></a>
    <form action="manager_acc2.php" method="post">
        <h3><i class="fa-solid fa-plus"></i>Thêm tài khoản người dùng</h3>
        <label class="width" for="user_id2">User ID</label>
        <input type="text" name="user_id2" id="user_id2" placeholder="Tạo user id..."><br>

        <label class="width" for="email2">Email</label>
        <input type="text" name="email2" id="email2"  placeholder="Tạo tài khoản Email..."><br>

        <label class="width" for="pass2">Password</label>
        <input type="text" name="pass2" id="pass2"  placeholder="Tạo mật khẩu..."><br>

        <input type="submit" value="Thêm" class="add_flight">
    </form>
    
<?php 
    }else if(isset($_POST['Update'])){
?>
    <a href="manager_acc.php" class="comback"><i class="fa-solid fa-user-tie">Admin</i></a>
    <form action="manager_acc2.php" method="post">
        <h3><i class="fa-solid fa-plus"></i>Update tài khoản người dùng</h3>
        <input style="text-align: center;" type="hidden" name="user_id4" id="user_id4" value="<?php echo $user_id;?>"><br>
        <label class="width" for="email4">Email</label>
        <input style="text-align: center;" type="text" name="email4" id="email4" value="<?php echo $email;?>" placeholder="Update Email..."><br>
        <label class="width" for="pass4">PassWord</label>
        <input style="text-align: center;" type="text" name="pass4" id="pass4" value="<?php echo $pass;?>" placeholder="Update PassWord..."><br>
        
        <input type="submit" value="Update" class="add_flight">
    </form>
<?php
    }}}
    option();
?>
<?php 
    function delete_account(){
        $conn = mysqli_connect("localhost", "root", "123456", "duAn1"); 
        if(isset($_POST['user_id2'])){
            if(isset($_POST['cancell'])){
                header('location: manager_acc.php');
            }else if(isset($_POST['confirmm'])){
                $user_id2 = $_POST['user_id2'];

                $delete_flight_order = "DELETE FROM flight_orders WHERE user_id='$user_id2'";
                $result_delete_flight_order  = mysqli_query($conn, $delete_flight_order);

                $delete_hotel_order = "DELETE FROM hotel_orders WHERE user_id='$user_id2'";
                $result_delete_hotel_order  = mysqli_query($conn, $delete_hotel_order);

                $delete_car_order = "DELETE FROM order_cars WHERE user_id='$user_id2'";
                $result_delete_car_order  = mysqli_query($conn, $delete_car_order);

                $delete_acc = "DELETE FROM register_login WHERE user_id='$user_id2'";
                $result_delete_acc  = mysqli_query($conn, $delete_acc);

                header('location: manager_acc.php');
            }
        }
    }
    delete_account();
?>
<?php
function add_account(){
    $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
    if(!empty($_POST['user_id2']) && !empty($_POST['email2']) && !empty($_POST['pass2'])){
        $user_id2 = $_POST['user_id2'];
        $email2 = $_POST['email2'];
        $pass2 = $_POST['pass2'];

        $check = "SELECT * FROM register_login WHERE user_id ='$user_id2'";
        $result_check = mysqli_query($conn, $check);
        $check2 = "SELECT * FROM register_login WHERE email ='$email2'";
        $result_check2 = mysqli_query($conn, $check2);
        if(mysqli_num_rows($result_check) > 0 || mysqli_num_rows($result_check2 ) > 0){
            echo "<script>alert('Tài khoản đã tồn tại.'); window.location.href = 'manager_acc.php';</script>";
            
        }else{
            if(strlen($pass2)<6){
                echo "<script>alert('Mật khẩu tối thiểu 6 chữ số.'); window.location.href = 'manager_acc.php';</script></script>";
                
            }else{

?>
        <form action="manager_acc2.php" method="post">
        <input type="hidden" name="user_id3" value="<?php echo $user_id2; ?>">
        <input type="hidden" name="email3" value="<?php echo $email2; ?>">
        <input type="hidden" name="pass3" value="<?php echo $pass2; ?>">
     
        
        <h3>Bạn có chắc là muốn THÊM dữ liệu tài khoản?</h3>
        <input type="submit" value="Hủy" name="cancel">
        <input type="submit" value="Tiếp tục" name="confirm">
        </form>
    
    <?php 
    }}}}
        add_account();
    ?>
    <?php 
        function add_account2(){   
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
            if(isset($_POST['user_id3']) && isset($_POST['email3']) && isset($_POST['pass3'])){
                $user_id3 = $_POST['user_id3'];
                $email3 = $_POST['email3'];
                $pass3 = $_POST['pass3'];

                if(isset($_POST['cancel'])){
                    header('location: manager_acc.php');
                }else if(isset($_POST['confirm'])){
                    $select2 = "INSERT INTO register_login(user_id, email, pass) VALUES ('$user_id3','$email3','$pass3')";
                    $result2 = mysqli_query($conn, $select2);
                    header('location: manager_acc.php');
                }
            }   
        }
        add_account2(); 
    ?>  

    <?php
        function update_account(){
            if(!empty($_POST['user_id4']) && !empty($_POST['email4']) && !empty($_POST['pass4'])){
                $user_id4 = $_POST['user_id4'];
                $email4 = $_POST['email4'];
                $pass4 = $_POST['pass4']; 
                if(strlen($pass4)>=6){
    ?>
                 <form action="manager_acc2.php" method="post">
                    <input type="hidden" name="user_id5" value="<?php echo $user_id4; ?>">
                    <input type="hidden" name="email5" value="<?php echo $email4; ?>">
                    <input type="hidden" name="pass5" value="<?php echo $pass4; ?>">
                    
                    <h3>Bạn có chắc là muốn Update dữ liệu về tài khoản?</h3>
                    <input type="submit" value="Hủy" name="cancel">
                    <input type="submit" value="Tiếp tục" name="confirm">
                </form>
    <?php
                }else{
                    echo "<script>alert('Mật khẩu tối thiểu 6 chữ số.');  window.location.href = 'manager_acc.php';</script></script>";
                }
            }
        }
    update_account(); 
    ?>

    <?php 
        function update_account2(){   
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
            if(isset($_POST['user_id5']) && isset($_POST['email5']) && isset($_POST['pass5'])){
                $user_id5 = $_POST['user_id5'];
                $email5 = $_POST['email5'];
                $pass5 = $_POST['pass5'];

                if(isset($_POST['cancel'])){
                    header('location: manager_acc.php');
                }else if(isset($_POST['confirm'])){
                    $update_flight = "UPDATE register_login SET user_id ='$user_id5', email='$email5', pass ='$pass5' WHERE user_id='$user_id5'";
                    $result_flight = mysqli_query($conn, $update_flight);
                    header('location: manager_acc.php');
                }
            }   
        }
        update_account2(); 
    ?>
    
</body>
</html>
