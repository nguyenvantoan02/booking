<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/admin_flight.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Document</title>
</head>
<?php  
    function option(){
        $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
        if(isset($_POST['order_car']) && isset($_POST['order_company']) && isset($_POST['order_quantitySeat']) && isset($_POST['order_carColor']) && isset($_POST['order_day_book']) && isset($_POST['order_day_quantity']) && isset($_POST['order_total_money']) && isset($_POST['code_car']) && isset($_POST['user_id'])){
            $order_car = $_POST['order_car'];
            $order_company = $_POST['order_company'];
            $order_quantitySeat = $_POST['order_quantitySeat'];
            $order_carColor = $_POST['order_carColor'];
            $order_day_book = $_POST['order_day_book'];
            $order_day_quantity = $_POST['order_day_quantity'];
            $order_total_money = $_POST['order_total_money'];
            $code_car = $_POST['code_car'];
            $user_id = $_POST['user_id'];

            if(isset($_POST['Delete'])){
                     
?>
<body style="padding-top: 70px">
        <form action="manager_car3.php" method="post">
            <input type="hidden" name="car_order_id" value="<?php echo $order_car; ?>">
            <h3>Bạn có chắc là muốn XÓA dữ liệu về xe?</h3>
            <input type="submit" value="Hủy" name="cancell">
            <input type="submit" value="Tiếp tục" name="confirmm">
        </form>

    <?php  }else if(isset($_POST['Add'])){?>
        
    <a href="manager_car.php" class="comback"><i class="fa-solid fa-user-tie">Admin</i></a>
    <form action="manager_car3.php" method="post">
        <h3><i class="fa-solid fa-plus"></i>Thêm xe đã đặt</h3>
        <label class="width" for="order_car2">Mã xe order</label>
        <input type="text" name="order_car2" id="order_car2" placeholder="Thêm mã code..."><br>

        <label class="width" for="order_company2">Hãng xe</label>
        <input type="text" name="order_company2" id="order_company2"  placeholder="Thêm hãng xe..."><br>
        
        <label class="width" for="order_quantitySeat2">Số chỗ</label>
        <input type="text" name="order_quantitySeat2" id="order_quantitySeat2"  placeholder="Thêm số chỗ..."><br>
        
        <label class="width" for="order_carColor2">Màu xe</label>
        <input type="text" name="order_carColor2" id="order_carColor2"  placeholder="Thêm màu xe..."><br>
        
        <label class="width" for="order_day_book2">Thời gian đặt</label>
        <input type="text" name="order_day_book2" id="order_day_book2"  placeholder="Thêm Thời gian đặt..."><br>
        
        <label class="width" for="order_day_quantity2">Số ngày đặt</label>
        <input type="text" name="order_day_quantity2" id="order_day_quantity2"  placeholder="Thêm ngày đặt xe..."><br>
        
        <label class="width" for="order_total_money2">Tổng tiền</label>
        <input type="text" name="order_total_money2" id="order_total_money2"  placeholder="Thêm tổng tiền..."><br>
        
        <label class="width" for="code_car2">Mã xe</label>
        <input type="text" name="code_car2" id="code_car2"  placeholder="Thêm tên khách sạn..."><br>
        
        <label class="width" for="user_id2">Mã người dùng</label>
        <input type="text" name="user_id2" id="user_id2"  placeholder="Thêm mã người dùng..."><br>
        
        <input type="submit" value="Thêm" class="add_flight">
    </form>
    
<?php 
    }else if(isset($_POST['Update'])){
?>
    <a href="manager_car.php" class="comback"><i class="fa-solid fa-user-tie">Admin</i></a>
    <form action="manager_car3.php" method="post">
        <h3><i class="fa-solid fa-plus"></i>Update Khách sạn đã đặt</h3>
        <!-- <label class="width" for="order_id4">order id</label> -->
        <input style="text-align: center;" type="hidden" name="order_car4" id="order_car4" value="<?php echo $order_car;?>"><br>
        
        <label class="width" for="order_company4">Hãng xe</label>
        <input style="text-align: center;" type="text" name="order_company4" id="order_company4" value="<?php echo $order_company;?>" placeholder="Update hãng xe..."><br>
        
        <label class="width" for="order_quantitySeat4">Số chỗ</label>
        <input style="text-align: center;" type="text" name="order_quantitySeat4" id="order_quantitySeat4" value="<?php echo $order_quantitySeat;?>" placeholder="Update số chỗ..."><br>
        
        <label class="width" for="order_carColor4">Màu xe</label>
        <input style="text-align: center;" type="text" name="order_carColor4" id="order_carColor4" value="<?php echo $order_carColor;?>" placeholder="Update màu xe..."><br>
        
        <label class="width" for="order_day_book4">Thời gian đặt</label>
        <input style="text-align: center;" type="text" name="order_day_book4" id="order_day_book4" value="<?php echo $order_day_book;?>" placeholder="Update thời gian đặt xe.."><br>
        
        <label class="width" for="order_day_quantity4">Số ngày thuê</label>
        <input style="text-align: center;" type="text" name="order_day_quantity4" id="order_day_quantity4" value="<?php echo $order_day_quantity ;?>" placeholder="Update số ngày thuê.."><br>
        
        <label class="width" for="order_total_money4">Tổng tiền</label>
        <input style="text-align: center;" type="text" name="order_total_money4" id="order_total_money4" value="<?php echo $order_total_money;?>" placeholder="Update Tổng tiền.."><br>
        
        <input style="text-align: center;" type="hidden" name="code_car4" id="code_car4" value="<?php echo $code_car;?>"><br>
        
        <input style="text-align: center;" type="hidden" name="user_id4" id="user_id4" value="<?php echo $user_id;?>"><br>
        
        <input type="submit" value="Update" class="add_flight">
    </form>
<?php
    }}}
    option();
?>
<?php 
    function delete_flight(){
        $conn = mysqli_connect("localhost", "root", "123456", "duAn1"); 
        if(isset($_POST['car_order_id'])){
            if(isset($_POST['cancell'])){
                header('location: manager_car.php');
            }else if(isset($_POST['confirmm'])){
                $car_order_id = $_POST['car_order_id'];
                $delete_orders = "DELETE FROM order_cars WHERE order_car='$car_order_id'";
                $result_orders = mysqli_query($conn, $delete_orders);
                //lưu ý
                //
                //
                //
                header('location: manager_car.php');
            }
        }
    }
    delete_flight();
?>
<?php
function add_flight(){
    $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
    if(!empty($_POST['order_car2']) && !empty($_POST['order_company2']) && !empty($_POST['order_quantitySeat2']) && !empty($_POST['order_carColor2']) && !empty($_POST['order_day_book2']) && !empty($_POST['order_day_quantity2']) && !empty($_POST['order_total_money2']) && !empty($_POST['code_car2']) && !empty($_POST['user_id2'])){
        $order_car2 = $_POST['order_car2'];
        $order_company2 = $_POST['order_company2'];
        $order_quantitySeat2 = $_POST['order_quantitySeat2'];
        $order_carColor2 = $_POST['order_carColor2'];
        $order_day_book2 = $_POST['order_day_book2'];
        $order_day_quantity2 = $_POST['order_day_quantity2'];
        $order_total_money2 = $_POST['order_total_money2'];
        $code_car2 = $_POST['code_car2'];
        $user_id2 = $_POST['user_id2'];

        $check = "SELECT * FROM order_cars WHERE order_car ='$order_car2'";
        $result_check = mysqli_query($conn, $check);
        if(mysqli_num_rows($result_check)>0){
            echo "<script>alert('Dữ liệu bị trùng.');  window.location.href = 'manager_car.php';</script>";
        }else{
            $check_user="SELECT * FROM register_login WHERE user_id = '$user_id2'";
            $result_check_user= mysqli_query($conn, $check_user);

            $check_car="SELECT * FROM cars WHERE code_car = '$code_car2'";
            $result_check_car= mysqli_query($conn, $check_car);

            if(mysqli_num_rows($result_check_user)>0 && mysqli_num_rows($result_check_car)>0){

?>
        <form action="manager_car3.php" method="post">
        <input type="hidden" name="order_car3" value="<?php echo $order_car2; ?>">
        <input type="hidden" name="order_company3" value="<?php echo $order_company2; ?>">
        <input type="hidden" name="order_quantitySeat3" value="<?php echo $order_quantitySeat2; ?>">
        <input type="hidden" name="order_carColor3" value="<?php echo $order_carColor2; ?>">
        <input type="hidden" name="order_day_book3" value="<?php echo $order_day_book2; ?>">
        <input type="hidden" name="order_day_quantity3" value="<?php echo $order_day_quantity2; ?>">
        <input type="hidden" name="order_total_money3" value="<?php echo $order_total_money2; ?>">
        <input type="hidden" name="code_car3" value="<?php echo $code_car2; ?>">
        <input type="hidden" name="user_id3" value="<?php echo $user_id2; ?>">


        <h3>Bạn có chắc là muốn THÊM dữ liệu về chuyến xe?</h3>
        <input type="submit" value="Hủy" name="cancel">
        <input type="submit" value="Tiếp tục" name="confirm">
        </form>
    <?php 

        }else{
            echo "<script>alert('Không tồn tại dữ liệu về người dùng hoặc mã xe.');  window.location.href = 'manager_car.php';</script>";
        }}}}
        add_flight();
    ?>
    <?php 
        function add_flight2(){   
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
            if(isset($_POST['order_car3']) && isset($_POST['order_company3']) && isset($_POST['order_quantitySeat3']) && isset($_POST['order_carColor3']) && isset($_POST['order_day_book3']) && isset($_POST['order_day_quantity3']) && isset($_POST['order_total_money3']) && isset($_POST['code_car3']) && isset($_POST['user_id3'])){
                $order_car3 = $_POST['order_car3'];
                $order_company3 = $_POST['order_company3'];
                $order_quantitySeat3 = $_POST['order_quantitySeat3'];
                $order_carColor3 = $_POST['order_carColor3'];
                $order_day_book3 = $_POST['order_day_book3'];
                $order_day_quantity3 = $_POST['order_day_quantity3'];
                $order_total_money3 = $_POST['order_total_money3'];
                $code_car3 = $_POST['code_car3'];
                $user_id3 = $_POST['user_id3'];

                if(isset($_POST['cancel'])){
                    header('location: manager_car.php');
                }else if(isset($_POST['confirm'])){
                    $select2 = "INSERT INTO order_cars(order_car, order_company, order_quantitySeat, order_carColor, order_day_book, order_day_quantity, order_total_money, code_car, user_id) VALUES ('$order_car3','$order_company3','$order_quantitySeat3','$order_carColor3','$order_day_book3','$order_day_quantity3','$order_total_money3','$code_car3','$user_id3')";
                    $result2 = mysqli_query($conn, $select2);
                    header('location: manager_car.php');
                }
            }   
        }
        add_flight2(); 
    ?>  

    <?php
        function update_flight(){
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
            if(!empty($_POST['order_car4']) && !empty($_POST['order_company4']) && !empty($_POST['order_quantitySeat4']) && !empty($_POST['order_carColor4']) && !empty($_POST['order_day_book4']) && !empty($_POST['order_day_quantity4']) && !empty($_POST['order_total_money4']) && !empty($_POST['code_car4']) && !empty($_POST['user_id4'])){
                $order_car4 = $_POST['order_car4'];
                $order_company4 = $_POST['order_company4'];
                $order_quantitySeat4 = $_POST['order_quantitySeat4'];
                $order_carColor4 = $_POST['order_carColor4'];
                $order_day_book4 = $_POST['order_day_book4'];
                $order_day_quantity4 = $_POST['order_day_quantity4'];
                $order_total_money4 = $_POST['order_total_money4'];
                $code_car4 = $_POST['code_car4'];
                $user_id4 = $_POST['user_id4'];
    ?>
                 <form action="manager_car3.php" method="post">
                    <input type="hidden" name="order_car5" value="<?php echo $order_car4; ?>">
                    <input type="hidden" name="order_company5" value="<?php echo $order_company4; ?>">
                    <input type="hidden" name="order_quantitySeat5" value="<?php echo $order_quantitySeat4; ?>">
                    <input type="hidden" name="order_carColor5" value="<?php echo $order_carColor4; ?>">
                    <input type="hidden" name="order_day_book5" value="<?php echo $order_day_book4; ?>">
                    <input type="hidden" name="order_day_quantity5" value="<?php echo $order_day_quantity4; ?>">
                    <input type="hidden" name="order_total_money5" value="<?php echo $order_total_money4; ?>">
                    <input type="hidden" name="code_car5" value="<?php echo $code_car4; ?>">
                    <input type="hidden" name="user_id5" value="<?php echo $user_id4; ?>">

                    
                    <h3>Bạn có chắc là muốn Update dữ liệu về xe?</h3>
                    <input type="submit" value="Hủy" name="cancel">
                    <input type="submit" value="Tiếp tục" name="confirm">
                </form>
    <?php }} update_flight(); ?>

    <?php 
        function update_flight2(){   
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
            if(isset($_POST['order_car5']) && isset($_POST['order_company5']) && isset($_POST['order_quantitySeat5']) && isset($_POST['order_carColor5']) && isset($_POST['order_day_book5']) && isset($_POST['order_day_quantity5']) && isset($_POST['order_total_money5']) && isset($_POST['code_car5']) && isset($_POST['user_id5'])){
                $order_car5 = $_POST['order_car5'];
                $order_company5 = $_POST['order_company5'];
                $order_quantitySeat5 = $_POST['order_quantitySeat5'];
                $order_carColor5 = $_POST['order_carColor5'];
                $order_day_book5 = $_POST['order_day_book5'];
                $order_day_quantity5 = $_POST['order_day_quantity5'];
                $order_total_money5 = $_POST['order_total_money5'];
                $code_car5 = $_POST['code_car5'];
                $user_id5 = $_POST['user_id5'];
 
    
                if(isset($_POST['cancel'])){
                    header('location: manager_car.php');
                }else if(isset($_POST['confirm'])){
                    $update_order_hotel = "UPDATE order_cars SET order_car ='$order_car5', order_company='$order_company5', order_quantitySeat ='$order_quantitySeat5', order_carColor ='$order_carColor5', order_day_book ='$order_day_book5', order_day_quantity ='$order_day_quantity5', order_total_money ='$order_total_money5' , code_car ='$code_car5', user_id ='$user_id5' WHERE order_car='$order_car5'";
                    $result_order_hotel = mysqli_query($conn, $update_order_hotel);
                    header('location: manager_car.php');
                }
            }   
        }
       update_flight2(); 
    ?>
    
</body>
</html>