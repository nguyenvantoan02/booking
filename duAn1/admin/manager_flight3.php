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

        if(isset($_POST['order_id']) && isset($_POST['order_airline']) && isset($_POST['order_departure']) && isset($_POST['order_anvil_place']) && isset($_POST['order_ticketType']) && isset($_POST['order_flight_day']) && isset($_POST['flight_code']) && isset($_POST['user_id']) && isset($_POST['order_price'])){
            $order_id = $_POST['order_id'];
            $order_airline = $_POST['order_airline'];
            $order_departure = $_POST['order_departure'];
            $order_anvil_place = $_POST['order_anvil_place'];
            $order_ticketType = $_POST['order_ticketType'];
            $order_flight_day = $_POST['order_flight_day'];
            $flight_code = $_POST['flight_code'];
            $user_id = $_POST['user_id'];
            $order_price = $_POST['order_price'];
            if(isset($_POST['Delete'])){
                     
?>
<body style="padding-top: 70px">
        <form action="manager_flight3.php" method="post">
            <input type="hidden" name="flight_order_id" value="<?php echo $order_id; ?>">
            <h3>Bạn có chắc là muốn XÓA dữ liệu về bay?</h3>
            <input type="submit" value="Hủy" name="cancell">
            <input type="submit" value="Tiếp tục" name="confirmm">
        </form>

    <?php  }else if(isset($_POST['Add'])){?>
        
    <a href="manager_flight.php" class="comback"><i class="fa-solid fa-user-tie">Admin</i></a>
    <form action="manager_flight3.php" method="post">
        <h3><i class="fa-solid fa-plus"></i>Thêm chuyến bay đã mua</h3>
        <label class="width" for="order_id2">Order id</label>
        <input type="text" name="order_id2" id="order_id2" placeholder="Thêm mã code..."><br>
        <label class="width" for="order_airline2">Airline</label>
        <input type="text" name="order_airline2" id="order_airline2"  placeholder="Thêm tên hãng bay(ví dụ: vietnam_airlines')..."><br>
        <label class="width" for="order_departure2">Departure</label>
        <input type="text" name="order_departure2" id="order_departure2"  placeholder="Thêm nơi đi..."><br>
        <label class="width" for="order_anvil_place2">Anvil place</label>
        <input type="text" name="order_anvil_place2" id="order_anvil_place2"  placeholder="Thêm nơi đến..."><br>
        <label class="width" for="order_ticketType2">TicketType</label>
        <input type="text" name="order_ticketType2" id="order_ticketType2"  placeholder="Thêm chiều bay..."><br>
        <label class="width" for="order_flight_day2">Flight day</label>
        <input type="text" name="order_flight_day2" id="order_flight_day2"  placeholder="Thêm Ngày bay(ví dụ: '2024-10-06')."><br>
        <label class="width" for="flight_code2">flight code</label>
        <input type="text" name="flight_code2" id="flight_code2"  placeholder="flight code..."><br>
        <label class="width" for="user_id2">User_id</label>
        <input type="text" name="user_id2" id="user_id2"  placeholder="user_id..."><br>
        <label class="width" for="order_price2">Flight price</label>
        <input type="text" name="order_price2" id="order_price2"  placeholder="order price..."><br>
        <input type="submit" value="Thêm" class="add_flight">
    </form>
    
<?php 
    }else if(isset($_POST['Update'])){
?>
    <a href="manager_flight.php" class="comback"><i class="fa-solid fa-user-tie">Admin</i></a>
    <form action="manager_flight3.php" method="post">
        <h3><i class="fa-solid fa-plus"></i>Update chuyến bay đã mua</h3>
        <!-- <label class="width" for="order_id4">order id</label> -->
        <input style="text-align: center;" type="hidden" name="order_id4" id="order_id4" value="<?php echo $order_id;?>" placeholder="Thêm mã order..."><br>
        <label class="width" for="airline">Airline</label>
        <input style="text-align: center;" type="text" name="order_airline4" id="order_airline4" value="<?php echo $order_airline;?>" placeholder="Thêm tên hãng bay order(ví dụ: vietnam_airlines')..."><br>
        <label class="width" for="departure">Departure</label>
        <input style="text-align: center;" type="text" name="order_departure4" id="order_departure4" value="<?php echo $order_departure;?>" placeholder="Thêm nơi đi..."><br>
        <label class="width" for="anvil_place">Anvil place</label>
        <input style="text-align: center;" type="text" name="order_anvil_place4" id="order_anvil_place4" value="<?php echo $order_anvil_place;?>" placeholder="Thêm nơi đến..."><br>
        <label class="width" for="ticketType">TicketType</label>
        <input style="text-align: center;" type="text" name="order_ticketType4" id="order_ticketType4" value="<?php echo $order_ticketType;?>" placeholder="Thêm chiều bay..."><br>
        <label class="width" for="flight_day">Flight day</label>
        <input style="text-align: center;" type="text" name="order_flight_day4" id="order_flight_day4" value="<?php echo $order_flight_day ;?>" placeholder="Thêm Ngày bay(ví dụ: '2024-10-06')."><br>
        <!-- <label class="width" for="flight_price">user_id</label> -->
        <input style="text-align: center;" type="hidden" name="user_id4" id="user_id4" value="<?php echo $user_id;?>" placeholder="user_id..."><br>
        <!-- <label class="width" for="flight_price">flight code</label> -->
        <input style="text-align: center;" type="hidden" name="flight_code4" id="flight_code4" value="<?php echo $flight_code;?>" placeholder="Thêm code chuyến bay..."><br>
        <!-- <label class="width" for="flight_price">order price</label> -->
        <input style="text-align: center;" type="hidden" name="order_price4" id="order_price4" value="<?php echo $order_price;?>" placeholder="Thêm giá..."><br>
        <input type="submit" value="Update" class="add_flight">
    </form>
<?php
    }}}
    option();
?>
<?php 
    function delete_flight(){
        $conn = mysqli_connect("localhost", "root", "123456", "duAn1"); 
        if(isset($_POST['flight_order_id'])){
            if(isset($_POST['cancell'])){
                header('location: manager_flight.php');
            }else if(isset($_POST['confirmm'])){
                $flight_order_id = $_POST['flight_order_id'];
                $delete_orders = "DELETE FROM flight_orders WHERE order_id='$flight_order_id'";
                $result_orders = mysqli_query($conn, $delete_orders);
                //lưu ý
                //
                //
                //
                header('location: manager_flight.php');
            }
        }
    }
    delete_flight();
?>
<?php
function add_flight(){
    $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
    if(!empty($_POST['order_id2']) && !empty($_POST['order_airline2']) && !empty($_POST['order_departure2']) && !empty($_POST['order_anvil_place2']) && !empty($_POST['order_ticketType2']) && !empty($_POST['order_flight_day2']) && !empty($_POST['flight_code2']) && !empty($_POST['user_id2']) && !empty($_POST['order_price2'])){
        $order_id2 = $_POST['order_id2'];
        $order_airline2 = $_POST['order_airline2'];
        $order_departure2 = $_POST['order_departure2'];
        $order_anvil_place2 = $_POST['order_anvil_place2'];
        $order_ticketType2 = $_POST['order_ticketType2'];
        $order_flight_day2 = $_POST['order_flight_day2'];
        $flight_code2 = $_POST['flight_code2'];
        $user_id2 = $_POST['user_id2'];
        $order_price2 = $_POST['order_price2'];

        $check = "SELECT * FROM flight_orders WHERE order_id ='$order_id2'";
        $result_check = mysqli_query($conn, $check);
        if(mysqli_num_rows($result_check)>0){
            echo "<script>alert('Dữ liệu bị trùng.');  window.location.href = 'manager_flight.php';</script>";
        }else{
            $check_user="SELECT * FROM register_login WHERE user_id = '$user_id2'";
            $result_check_user= mysqli_query($conn, $check_user);

            $check_flightt="SELECT * FROM airline_tickets WHERE flight_code = '$flight_code2'";
            $result_check_flightt= mysqli_query($conn, $check_flightt);

            if(mysqli_num_rows($result_check_user)>0 && mysqli_num_rows($result_check_flightt)>0){

?>
        <form action="manager_flight3.php" method="post">
        <input type="hidden" name="order_id3" value="<?php echo $order_id2; ?>">
        <input type="hidden" name="order_airline3" value="<?php echo $order_airline2; ?>">
        <input type="hidden" name="order_departure3" value="<?php echo $order_departure2; ?>">
        <input type="hidden" name="order_anvil_place3" value="<?php echo $order_anvil_place2; ?>">
        <input type="hidden" name="order_ticketType3" value="<?php echo $order_ticketType2; ?>">
        <input type="hidden" name="order_flight_day3" value="<?php echo $order_flight_day2; ?>">
        <input type="hidden" name="flight_code3" value="<?php echo $flight_code2; ?>">
        <input type="hidden" name="user_id3" value="<?php echo $user_id2; ?>">
        <input type="hidden" name="order_price3" value="<?php echo $order_price2; ?>">

        
        <h3>Bạn có chắc là muốn THÊM dữ liệu về chuyến bay?</h3>
        <input type="submit" value="Hủy" name="cancel">
        <input type="submit" value="Tiếp tục" name="confirm">
        </form>
    <?php 

        }else{
            echo "<script>alert('Không tồn tại người dùng hoặc chuyến bay để thêm dữ liệu.');  window.location.href = 'manager_flight.php';</script>";
        }}}}
        add_flight();
    ?>
    <?php 
        function add_flight2(){   
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
            if(isset($_POST['order_id3']) && isset($_POST['order_airline3']) && isset($_POST['order_departure3']) && isset($_POST['order_anvil_place3']) && isset($_POST['order_ticketType3']) && isset($_POST['order_flight_day3']) && isset($_POST['flight_code3']) && isset($_POST['user_id3']) && isset($_POST['order_price3'])){
                $order_id3 = $_POST['order_id3'];
                $order_airline3 = $_POST['order_airline3'];
                $order_departure3 = $_POST['order_departure3'];
                $order_anvil_place3 = $_POST['order_anvil_place3'];
                $order_ticketType3 = $_POST['order_ticketType3'];
                $order_flight_day3 = $_POST['order_flight_day3'];
                $flight_code3 = $_POST['flight_code3'];
                $user_id3 = $_POST['user_id3'];
                $order_price3 = $_POST['order_price3'];

                if(isset($_POST['cancel'])){
                    header('location: manager_flight.php');
                }else if(isset($_POST['confirm'])){
                    $select2 = "INSERT INTO flight_orders(order_id, order_airline, order_ticketType, order_departure, order_anvil_place, order_flight_day, flight_code, user_id, order_price) VALUES ('$order_id3','$order_airline3','$order_ticketType3','$order_departure3','$order_anvil_place3','$order_flight_day3','$flight_code3','$user_id3','$order_price3')";
                    $result2 = mysqli_query($conn, $select2);
                    header('location: manager_flight.php');
                }
            }   
        }
        add_flight2(); 
    ?>  

    <?php
        function update_flight(){
            if(!empty($_POST['order_id4']) && !empty($_POST['order_airline4']) && !empty($_POST['order_departure4']) && !empty($_POST['order_anvil_place4']) && !empty($_POST['order_ticketType4']) && !empty($_POST['order_flight_day4']) && !empty($_POST['flight_code4']) && !empty($_POST['user_id4']) && !empty($_POST['order_price4'])){
                $order_id4 = $_POST['order_id4'];
                $order_airline4 = $_POST['order_airline4'];
                $order_departure4 = $_POST['order_departure4'];
                $order_anvil_place4 = $_POST['order_anvil_place4'];
                $order_ticketType4 = $_POST['order_ticketType4'];
                $order_flight_day4 = $_POST['order_flight_day4'];
                $flight_code4 = $_POST['flight_code4'];
                $user_id4 = $_POST['user_id4'];
                $order_price4 = $_POST['order_price4'];  
    ?>
                 <form action="manager_flight3.php" method="post">
                    <input type="hidden" name="order_id5" value="<?php echo $order_id4; ?>">
                    <input type="hidden" name="order_airline5" value="<?php echo $order_airline4; ?>">
                    <input type="hidden" name="order_departure5" value="<?php echo $order_departure4; ?>">
                    <input type="hidden" name="order_anvil_place5" value="<?php echo $order_anvil_place4; ?>">
                    <input type="hidden" name="order_ticketType5" value="<?php echo $order_ticketType4; ?>">
                    <input type="hidden" name="order_flight_day5" value="<?php echo $order_flight_day4; ?>">
                    <input type="hidden" name="flight_code5" value="<?php echo $flight_code4; ?>">
                    <input type="hidden" name="user_id5" value="<?php echo $user_id4; ?>">
                    <input type="hidden" name="order_price5" value="<?php echo $order_price4; ?>">
                    
                    <h3>Bạn có chắc là muốn Update dữ liệu về chuyến bay?</h3>
                    <input type="submit" value="Hủy" name="cancel">
                    <input type="submit" value="Tiếp tục" name="confirm">
                </form>
    <?php }} update_flight(); ?>

    <?php 
        function update_flight2(){   
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
            if(isset($_POST['order_id5']) && isset($_POST['order_airline5']) && isset($_POST['order_departure5']) && isset($_POST['order_anvil_place5']) && isset($_POST['order_ticketType5']) && isset($_POST['order_flight_day5']) && isset($_POST['flight_code5']) && isset($_POST['user_id5']) && isset($_POST['order_price5'])){
                $order_id5 = $_POST['order_id5'];
                $order_airline5 = $_POST['order_airline5'];
                $order_departure5 = $_POST['order_departure5'];
                $order_anvil_place5 = $_POST['order_anvil_place5'];
                $order_ticketType5 = $_POST['order_ticketType5'];
                $order_flight_day5 = $_POST['order_flight_day5'];
                $flight_code5 = $_POST['flight_code5'];
                $user_id5 = $_POST['user_id5'];
                $order_price5 = $_POST['order_price5'];  
    
                if(isset($_POST['cancel'])){
                    header('location: manager_flight.php');
                }else if(isset($_POST['confirm'])){
                    $update_order_flight = "UPDATE flight_orders SET order_id ='$order_id5', order_airline='$order_airline5', order_departure ='$order_departure5', order_anvil_place ='$order_anvil_place5', order_ticketType ='$order_ticketType5', order_flight_day ='$order_flight_day5', flight_code ='$flight_code5' , user_id ='$user_id5', order_price ='$order_price5' WHERE order_id='$order_id5'";
                    $result_order_flight = mysqli_query($conn, $update_order_flight);
                    header('location: manager_flight.php');
                }
            }   
        }
       update_flight2(); 
    ?>
    
</body>
</html>