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

        if(isset($_POST['order_id']) && isset($_POST['order_hotelAddress']) && isset($_POST['order_quantityPerson']) && isset($_POST['order_quantityRoom']) && isset($_POST['time_book_curent']) && isset($_POST['user_id']) && isset($_POST['code_hotel']) && isset($_POST['order_name']) && isset($_POST['order_price'])){
            $order_id = $_POST['order_id'];
            $order_hotelAddress = $_POST['order_hotelAddress'];
            $order_quantityPerson = $_POST['order_quantityPerson'];
            $order_quantityRoom = $_POST['order_quantityRoom'];
            $time_book_curent = $_POST['time_book_curent'];
            $user_id = $_POST['user_id'];
            $code_hotel = $_POST['code_hotel'];
            $order_name = $_POST['order_name'];
            $order_price = $_POST['order_price'];

            if(isset($_POST['Delete'])){
                     
?>
<body style="padding-top: 70px">
        <form action="manager_hotel3.php" method="post">
            <input type="hidden" name="hotel_order_id" value="<?php echo $order_id; ?>">
            <h3>Bạn có chắc là muốn XÓA dữ liệu về khách sạn?</h3>
            <input type="submit" value="Hủy" name="cancell">
            <input type="submit" value="Tiếp tục" name="confirmm">
        </form>

    <?php  }else if(isset($_POST['Add'])){?>
        
    <a href="manager_hotel.php" class="comback"><i class="fa-solid fa-user-tie">Admin</i></a>
    <form action="manager_hotel3.php" method="post">
        <h3><i class="fa-solid fa-plus"></i>Thêm Khách sạn đã mua</h3>
        <label class="width" for="order_id2">Order id</label>
        <input type="text" name="order_id2" id="order_id2" placeholder="Thêm mã code..."><br>

        <label class="width" for="order_hotelAddress2">Thành phố</label>
        <input type="text" name="order_hotelAddress2" id="order_hotelAddress2"  placeholder="Thêm thành phố..."><br>
        
        <label class="width" for="order_quantityPerson2">Số lượng người</label>
        <input type="text" name="order_quantityPerson2" id="order_quantityPerson2"  placeholder="Thêm số lượng người..."><br>
        
        <label class="width" for="order_quantityRoom2">Số lượng phòng</label>
        <input type="text" name="order_quantityRoom2" id="order_quantityRoom2"  placeholder="Thêm số lượng phòng..."><br>
        
        <label class="width" for="time_book_curent2">Thời gian đặt</label>
        <input type="text" name="time_book_curent2" id="time_book_curent2"  placeholder="Thêm Thời gian đặt..."><br>
        
        <label class="width" for="user_id2">User id</label>
        <input type="text" name="user_id2" id="user_id2"  placeholder="Thêm id người dùng..."><br>
        
        <label class="width" for="code_hotel2">Code hotel</label>
        <input type="text" name="code_hotel2" id="code_hotel2"  placeholder="Thêm code hotel..."><br>
        
        <label class="width" for="order_name2">Tên khách sạn</label>
        <input type="text" name="order_name2" id="order_name2"  placeholder="Thêm tên khách sạn..."><br>
        
        <label class="width" for="order_price2">Giá phòng 1 ngày</label>
        <input type="text" name="order_price2" id="order_price2"  placeholder="Thêm giá phòng..."><br>
        
        <input type="submit" value="Thêm" class="add_flight">
    </form>
    
<?php 
    }else if(isset($_POST['Update'])){
?>
    <a href="manager_hotel.php" class="comback"><i class="fa-solid fa-user-tie">Admin</i></a>
    <form action="manager_hotel3.php" method="post">
        <h3><i class="fa-solid fa-plus"></i>Update Khách sạn đã đặt</h3>
        <!-- <label class="width" for="order_id4">order id</label> -->
        <input style="text-align: center;" type="hidden" name="order_id4" id="order_id4" value="<?php echo $order_id;?>" placeholder="Thêm mã order..."><br>
        
        <label class="width" for="order_hotelAddress4">Thành phố</label>
        <input style="text-align: center;" type="text" name="order_hotelAddress4" id="order_hotelAddress4" value="<?php echo $order_hotelAddress;?>" placeholder="Update thành phố..."><br>
        
        <label class="width" for="order_quantityPerson4">Số lượng người</label>
        <input style="text-align: center;" type="text" name="order_quantityPerson4" id="order_quantityPerson4" value="<?php echo $order_quantityPerson;?>" placeholder="Update số lượng người..."><br>
        
        <label class="width" for="order_quantityRoom4">Số lượng phòng</label>
        <input style="text-align: center;" type="text" name="order_quantityRoom4" id="order_quantityRoom4" value="<?php echo $order_quantityRoom;?>" placeholder="Update số lượng phòng..."><br>
        
        <label class="width" for="time_book_curent4">Thời gian đặt</label>
        <input style="text-align: center;" type="text" name="time_book_curent4" id="time_book_curent4" value="<?php echo $time_book_curent;?>" placeholder="Update thời gian đặt phòng..."><br>
        
        <!-- <label class="width" for="user_id4">User id</label> -->
        <input style="text-align: center;" type="hidden" name="user_id4" id="user_id4" value="<?php echo $user_id ;?>"><br>
        
        <!-- <label class="width" for="code_hotel4">code_hotel</label> -->
        <input style="text-align: center;" type="hidden" name="code_hotel4" id="code_hotel4" value="<?php echo $code_hotel;?>"><br>
        
        <label class="width" for="order_name4">Tên khách sạn</label>
        <input style="text-align: center;" type="text" name="order_name4" id="order_name4" value="<?php echo $order_name;?>" placeholder="Update tên khách sạn..."><br>
        
        <label class="width" for="order_price4">Giá phòng</label>
        <input style="text-align: center;" type="text" name="order_price4" id="order_price4" value="<?php echo $order_price;?>" placeholder="Thêm giá..."><br>
        
        <input type="submit" value="Update" class="add_flight">
    </form>
<?php
    }}}
    option();
?>
<?php 
    function delete_flight(){
        $conn = mysqli_connect("localhost", "root", "123456", "duAn1"); 
        if(isset($_POST['hotel_order_id'])){
            if(isset($_POST['cancell'])){
                header('location: manager_hotel.php');
            }else if(isset($_POST['confirmm'])){
                $hotel_order_id = $_POST['hotel_order_id'];
                $delete_orders = "DELETE FROM hotel_orders WHERE order_id='$hotel_order_id'";
                $result_orders = mysqli_query($conn, $delete_orders);
                //lưu ý
                //
                //
                //
                header('location: manager_hotel.php');
            }
        }
    }
    delete_flight();
?>
<?php
function add_flight(){
    $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
    if(!empty($_POST['order_id2']) && !empty($_POST['order_hotelAddress2']) && !empty($_POST['order_quantityPerson2']) && !empty($_POST['order_quantityRoom2']) && !empty($_POST['time_book_curent2']) && !empty($_POST['user_id2']) && !empty($_POST['code_hotel2']) && !empty($_POST['order_name2']) && !empty($_POST['order_price2'])){
        $order_id2 = $_POST['order_id2'];
        $order_hotelAddress2 = $_POST['order_hotelAddress2'];
        $order_quantityPerson2 = $_POST['order_quantityPerson2'];
        $order_quantityRoom2 = $_POST['order_quantityRoom2'];
        $time_book_curent2 = $_POST['time_book_curent2'];
        $user_id2 = $_POST['user_id2'];
        $code_hotel2 = $_POST['code_hotel2'];
        $order_name2 = $_POST['order_name2'];
        $order_price2 = $_POST['order_price2'];

        $check = "SELECT * FROM hotel_orders WHERE order_id ='$order_id2'";
        $result_check = mysqli_query($conn, $check);
        if(mysqli_num_rows($result_check)>0){
            echo "<script>alert('Dữ liệu bị trùng.'); window.location.href = 'manager_hotel.php';</script>";
        }else{
            $check_user="SELECT * FROM register_login WHERE user_id = '$user_id2'";
            $result_check_user= mysqli_query($conn, $check_user);

            $check_hotel="SELECT * FROM hotels WHERE code_hotel = '$code_hotel2'";
            $result_check_hotel= mysqli_query($conn, $check_hotel);

            if(mysqli_num_rows($result_check_user)>0 && mysqli_num_rows($result_check_hotel)>0){

?>
        <form action="manager_hotel3.php" method="post">
        <input type="hidden" name="order_id3" value="<?php echo $order_id2; ?>">
        <input type="hidden" name="order_hotelAddress3" value="<?php echo $order_hotelAddress2; ?>">
        <input type="hidden" name="order_quantityPerson3" value="<?php echo $order_quantityPerson2; ?>">
        <input type="hidden" name="order_quantityRoom3" value="<?php echo $order_quantityRoom2; ?>">
        <input type="hidden" name="time_book_curent3" value="<?php echo $time_book_curent2; ?>">
        <input type="hidden" name="user_id3" value="<?php echo $user_id2; ?>">
        <input type="hidden" name="code_hotel3" value="<?php echo $code_hotel2; ?>">
        <input type="hidden" name="order_name3" value="<?php echo $order_name2; ?>">
        <input type="hidden" name="order_price3" value="<?php echo $order_price2; ?>">

        <h3>Bạn có chắc là muốn THÊM dữ liệu về khách sạn?</h3>
        <input type="submit" value="Hủy" name="cancel">
        <input type="submit" value="Tiếp tục" name="confirm">
        </form>
    <?php 

        }else{
            echo "<script>alert('Không tồn tại dữ liệu về người dùng hoặc mã code khách sạn.');  window.location.href = 'manager_acc.php';</script>";
        }}}}
        add_flight();
    ?>
    <?php 
        function add_flight2(){   
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
            if(isset($_POST['order_id3']) && isset($_POST['order_hotelAddress3']) && isset($_POST['order_quantityPerson3']) && isset($_POST['order_quantityRoom3']) && isset($_POST['time_book_curent3']) && isset($_POST['user_id3']) && isset($_POST['code_hotel3']) && isset($_POST['order_name3']) && isset($_POST['order_price3'])){
                $order_id3 = $_POST['order_id3'];
                $order_hotelAddress3 = $_POST['order_hotelAddress3'];
                $order_quantityPerson3 = $_POST['order_quantityPerson3'];
                $order_quantityRoom3 = $_POST['order_quantityRoom3'];
                $time_book_curent3 = $_POST['time_book_curent3'];
                $user_id3 = $_POST['user_id3'];
                $code_hotel3 = $_POST['code_hotel3'];
                $order_name3 = $_POST['order_name3'];
                $order_price3 = $_POST['order_price3'];

                if(isset($_POST['cancel'])){
                    header('location: manager_hotel.php');
                }else if(isset($_POST['confirm'])){
                    $select2 = "INSERT INTO hotel_orders(order_id, order_hotelAddress, order_quantityPerson, order_quantityRoom, time_book_curent, user_id, code_hotel, order_name, order_price) VALUES ('$order_id3','$order_hotelAddress3','$order_quantityPerson3','$order_quantityRoom3','$time_book_curent3','$user_id3','$code_hotel3','$order_name3','$order_price3')";
                    $result2 = mysqli_query($conn, $select2);
                    header('location: manager_hotel.php');
                }
            }   
        }
        add_flight2(); 
    ?>  

    <?php
        function update_flight(){
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
            if(!empty($_POST['order_id4']) && !empty($_POST['order_hotelAddress4']) && !empty($_POST['order_quantityPerson4']) && !empty($_POST['order_quantityRoom4']) && !empty($_POST['time_book_curent4']) && !empty($_POST['user_id4']) && !empty($_POST['code_hotel4']) && !empty($_POST['order_name4']) && !empty($_POST['order_price4'])){
                $order_id4 = $_POST['order_id4'];
                $order_hotelAddress4 = $_POST['order_hotelAddress4'];
                $order_quantityPerson4 = $_POST['order_quantityPerson4'];
                $order_quantityRoom4 = $_POST['order_quantityRoom4'];
                $time_book_curent4 = $_POST['time_book_curent4'];
                $user_id4 = $_POST['user_id4'];
                $code_hotel4 = $_POST['code_hotel4'];
                $order_name4 = $_POST['order_name4'];
                $order_price4 = $_POST['order_price4'];
    ?>
                 <form action="manager_hotel3.php" method="post">
                    <input type="hidden" name="order_id5" value="<?php echo $order_id4; ?>">
                    <input type="hidden" name="order_hotelAddress5" value="<?php echo $order_hotelAddress4; ?>">
                    <input type="hidden" name="order_quantityPerson5" value="<?php echo $order_quantityPerson4; ?>">
                    <input type="hidden" name="order_quantityRoom5" value="<?php echo $order_quantityRoom4; ?>">
                    <input type="hidden" name="time_book_curent5" value="<?php echo $time_book_curent4; ?>">
                    <input type="hidden" name="user_id5" value="<?php echo $user_id4; ?>">
                    <input type="hidden" name="code_hotel5" value="<?php echo $code_hotel4; ?>">
                    <input type="hidden" name="order_name5" value="<?php echo $order_name4; ?>">
                    <input type="hidden" name="order_price5" value="<?php echo $order_price4; ?>">
                    
                    <h3>Bạn có chắc là muốn Update dữ liệu về khách sạn?</h3>
                    <input type="submit" value="Hủy" name="cancel">
                    <input type="submit" value="Tiếp tục" name="confirm">
                </form>
    <?php }} update_flight(); ?>

    <?php 
        function update_flight2(){   
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
            if(isset($_POST['order_id5']) && isset($_POST['order_hotelAddress5']) && isset($_POST['order_quantityPerson5']) && isset($_POST['order_quantityRoom5']) && isset($_POST['time_book_curent5']) && isset($_POST['user_id5']) && isset($_POST['code_hotel5']) && isset($_POST['order_name5']) && isset($_POST['order_price5'])){
                $order_id5 = $_POST['order_id5'];
                $order_hotelAddress5 = $_POST['order_hotelAddress5'];
                $order_quantityPerson5 = $_POST['order_quantityPerson5'];
                $order_quantityRoom5 = $_POST['order_quantityRoom5'];
                $time_book_curent5 = $_POST['time_book_curent5'];
                $user_id5 = $_POST['user_id5'];
                $code_hotel5 = $_POST['code_hotel5'];
                $order_name5 = $_POST['order_name5'];
                $order_price5 = $_POST['order_price5'];
 
    
                if(isset($_POST['cancel'])){
                    header('location: manager_hotel.php');
                }else if(isset($_POST['confirm'])){
                    $update_order_hotel = "UPDATE hotel_orders SET order_id ='$order_id5', order_hotelAddress='$order_hotelAddress5', order_quantityPerson ='$order_quantityPerson5', order_quantityRoom ='$order_quantityRoom5', time_book_curent ='$time_book_curent5', user_id ='$user_id5', code_hotel ='$code_hotel5' , order_name ='$order_name5', order_price ='$order_price5' WHERE order_id='$order_id5'";
                    $result_order_hotel = mysqli_query($conn, $update_order_hotel);
                    header('location: manager_hotel.php');
                }
            }   
        }
       update_flight2(); 
    ?>
    
</body>
</html>