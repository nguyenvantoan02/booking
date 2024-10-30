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

        if(isset($_POST['flight_code']) && isset($_POST['airline']) && isset($_POST['departure']) && isset($_POST['anvil_place']) && isset($_POST['ticketType']) && isset($_POST['flight_day']) && isset($_POST['flight_price'])){
            $flight_code = $_POST['flight_code'];
            $airline = $_POST['airline'];
            $departure = $_POST['departure'];
            $anvil_place = $_POST['anvil_place'];
            $ticketType = $_POST['ticketType'];
            $flight_day = $_POST['flight_day'];
            $flight_price = $_POST['flight_price'];
            
            if(isset($_POST['Delete'])){
                     
?>
<body style="padding-top: 70px">
        <form action="manager_flight2.php" method="post">
            <input type="hidden" name="flight_code4" value="<?php echo $flight_code; ?>">
            <h3>Bạn có chắc là muốn XÓA dữ liệu về chuyến bay?</h3>
            <input type="submit" value="Hủy" name="cancell">
            <input type="submit" value="Tiếp tục" name="confirmm">
        </form>

    <?php  }else if(isset($_POST['Add'])){?>
        
    <a href="manager_flight.php" class="comback"><i class="fa-solid fa-user-tie">Admin</i></a>
    <form action="manager_flight2.php" method="post">
        <h3><i class="fa-solid fa-plus"></i>Thêm chuyến bay</h3>
        <label class="width" for="flight_code">Flight code</label>
        <input type="text" name="flight_code2" id="flight_code" placeholder="Thêm mã code..."><br>
        <label class="width" for="airline">Airline</label>
        <input type="text" name="airline2" id="airline"  placeholder="Thêm tên hãng bay(ví dụ: vietnam_airlines')..."><br>
        <label class="width" for="departure">Departure</label>
        <input type="text" name="departure2" id="departure"  placeholder="Thêm nơi đi..."><br>
        <label class="width" for="anvil_place">Anvil place</label>
        <input type="text" name="anvil_place2" id="anvil_place"  placeholder="Thêm nơi đến..."><br>
        <label class="width" for="ticketType">TicketType</label>
        <input type="text" name="ticketType2" id="ticketType"  placeholder="Thêm chiều bay..."><br>
        <label class="width" for="flight_day">Flight day</label>
        <input type="text" name="flight_day2" id="flight_day"  placeholder="Thêm Ngày bay(ví dụ: '2024-10-06')."><br>
        <label class="width" for="flight_price">Flight price</label>
        <input type="text" name="flight_price2" id="flight_price"  placeholder="Thêm giá..."><br>
        <input type="submit" value="Thêm" class="add_flight">
    </form>
    
<?php 
    }else if(isset($_POST['Update'])){
?>
    <a href="manager_flight.php" class="comback"><i class="fa-solid fa-user-tie">Admin</i></a>
    <form action="manager_flight2.php" method="post">
        <h3><i class="fa-solid fa-plus"></i>Update chuyến bay</h3>
        <!-- <label class="width" for="flight_code">Flight code</label> -->
        <input style="text-align: center;" type="hidden" name="flight_code4" id="flight_code" value="<?php echo $flight_code;?>" placeholder="Thêm mã code..."><br>
        <label class="width" for="airline">Airline</label>
        <input style="text-align: center;" type="text" name="airline4" id="airline" value="<?php echo $airline;?>" placeholder="Thêm tên hãng bay(ví dụ: vietnam_airlines')..."><br>
        <label class="width" for="departure">Departure</label>
        <input style="text-align: center;" type="text" name="departure4" id="departure" value="<?php echo $departure;?>" placeholder="Thêm nơi đi..."><br>
        <label class="width" for="anvil_place">Anvil place</label>
        <input style="text-align: center;" type="text" name="anvil_place4" id="anvil_place" value="<?php echo $anvil_place;?>" placeholder="Thêm nơi đến..."><br>
        <label class="width" for="ticketType">TicketType</label>
        <input style="text-align: center;" type="text" name="ticketType4" id="ticketType" value="<?php echo $ticketType;?>" placeholder="Thêm chiều bay..."><br>
        <label class="width" for="flight_day">Flight day</label>
        <input style="text-align: center;" type="text" name="flight_day4" id="flight_day" value="<?php echo $flight_day ;?>" placeholder="Thêm Ngày bay(ví dụ: '2024-10-06')."><br>
        <label class="width" for="flight_price">Flight price</label>
        <input style="text-align: center;" type="text" name="flight_price4" id="flight_price" value="<?php echo $flight_price;?>" placeholder="Thêm giá..."><br>
        <input type="submit" value="Update" class="add_flight">
    </form>
<?php
    }}}
    option();
?>
<?php 
    function delete_flight(){
        $conn = mysqli_connect("localhost", "root", "123456", "duAn1"); 
        if(isset($_POST['flight_code4'])){
            if(isset($_POST['cancell'])){
                header('location: manager_flight.php');
            }else if(isset($_POST['confirmm'])){
                $flight_code4 = $_POST['flight_code4'];
                $delete_orders = "DELETE FROM flight_orders WHERE flight_code='$flight_code4'";
                $result_orders = mysqli_query($conn, $delete_orders);

                $delete_tickets = "DELETE FROM airline_tickets WHERE flight_code='$flight_code4'";
                $result_tickets = mysqli_query($conn,$delete_tickets);
                header('location: manager_flight.php');
            }
        }
    }
    delete_flight();
?>
<?php
function add_flight(){
    $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
    if(!empty($_POST['flight_code2']) && !empty($_POST['airline2']) && !empty($_POST['departure2']) && !empty($_POST['anvil_place2']) && !empty($_POST['ticketType2']) && !empty($_POST['flight_day2']) &&  !empty($_POST['flight_price2'])){
        $flight_code2 = $_POST['flight_code2'];
        $airline2 = $_POST['airline2'];
        $departure2 = $_POST['departure2'];
        $anvil_place2 = $_POST['anvil_place2'];
        $ticketType2 = $_POST['ticketType2'];
        $flight_day2 = $_POST['flight_day2'];
        $flight_price2 = $_POST['flight_price2'];

        $check = "SELECT * FROM airline_tickets WHERE flight_code ='$flight_code2'";
        $result_check = mysqli_query($conn, $check);
        if(mysqli_num_rows($result_check)>0){
            echo"Dữ liệu bị trùng";
        }else{


?>
        <form action="manager_flight2.php" method="post">
        <input type="hidden" name="flight_code3" value="<?php echo $flight_code2; ?>">
        <input type="hidden" name="airline3" value="<?php echo $airline2; ?>">
        <input type="hidden" name="departure3" value="<?php echo $departure2; ?>">
        <input type="hidden" name="anvil_place3" value="<?php echo $anvil_place2; ?>">
        <input type="hidden" name="ticketType3" value="<?php echo $ticketType2; ?>">
        <input type="hidden" name="flight_day3" value="<?php echo $flight_day2; ?>">
        <input type="hidden" name="flight_price3" value="<?php echo $flight_price2; ?>">
        
        <h3>Bạn có chắc là muốn THÊM dữ liệu về chuyến bay?</h3>
        <input type="submit" value="Hủy" name="cancel">
        <input type="submit" value="Tiếp tục" name="confirm">
        </form>
    <?php 

        }}}
        add_flight();
    ?>
    <?php 
        function add_flight2(){   
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
            if(isset($_POST['flight_code3']) && isset($_POST['airline3']) && isset($_POST['departure3']) && isset($_POST['anvil_place3']) && isset($_POST['ticketType3']) && isset($_POST['flight_day3']) &&  isset($_POST['flight_price3'])){
                $flight_code3 = $_POST['flight_code3'];
                $airline3 = $_POST['airline3'];
                $departure3 = $_POST['departure3'];
                $anvil_place3 = $_POST['anvil_place3'];
                $ticketType3 = $_POST['ticketType3'];
                $flight_day3 = $_POST['flight_day3'];
                $flight_price3 = $_POST['flight_price3'];
                if(isset($_POST['cancel'])){
                    header('location: manager_flight.php');
                }else if(isset($_POST['confirm'])){
                    $select2 = "INSERT INTO airline_tickets(flight_code,airline, departure, anvil_place, ticketType, flight_day, flight_price) VALUES ('$flight_code3','$airline3','$departure3','$anvil_place3','$ticketType3','$flight_day3','$flight_price3')";
                    $result2 = mysqli_query($conn, $select2);
                    header('location: manager_flight.php');
                }
            }   
        }
        add_flight2(); 
    ?>  

    <?php
        function update_flight(){
            if(!empty($_POST['flight_code4'])  && !empty($_POST['airline4']) && !empty($_POST['departure4']) && !empty($_POST['anvil_place4']) && !empty($_POST['ticketType4']) && !empty($_POST['flight_day4']) &&  !empty($_POST['flight_price4'])){
                $flight_code4 = $_POST['flight_code4'];
                $airline4 = $_POST['airline4'];
                $departure4 = $_POST['departure4'];
                $anvil_place4 = $_POST['anvil_place4'];
                $ticketType4 = $_POST['ticketType4'];
                $flight_day4 = $_POST['flight_day4'];
                $flight_price4 = $_POST['flight_price4'];   
    ?>
                 <form action="manager_flight2.php" method="post">
                    <input type="hidden" name="flight_code5" value="<?php echo $flight_code4; ?>">
                    <input type="hidden" name="airline5" value="<?php echo $airline4; ?>">
                    <input type="hidden" name="departure5" value="<?php echo $departure4; ?>">
                    <input type="hidden" name="anvil_place5" value="<?php echo $anvil_place4; ?>">
                    <input type="hidden" name="ticketType5" value="<?php echo $ticketType4; ?>">
                    <input type="hidden" name="flight_day5" value="<?php echo $flight_day4; ?>">
                    <input type="hidden" name="flight_price5" value="<?php echo $flight_price4; ?>">
                    
                    <h3>Bạn có chắc là muốn Update dữ liệu về chuyến bay?</h3>
                    <input type="submit" value="Hủy" name="cancel">
                    <input type="submit" value="Tiếp tục" name="confirm">
                </form>
    <?php }} update_flight(); ?>

    <?php 
        function update_flight2(){   
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
            if(isset($_POST['flight_code5']) && isset($_POST['airline5']) && isset($_POST['departure5']) && isset($_POST['anvil_place5']) && isset($_POST['ticketType5']) && isset($_POST['flight_day5']) &&  isset($_POST['flight_price5'])){
                $flight_code5 = $_POST['flight_code5'];
                $airline5 = $_POST['airline5'];
                $departure5 = $_POST['departure5'];
                $anvil_place5 = $_POST['anvil_place5'];
                $ticketType5 = $_POST['ticketType5'];
                $flight_day5 = $_POST['flight_day5'];
                $flight_price5 = $_POST['flight_price5'];
                echo $flight_code5;
                if(isset($_POST['cancel'])){
                    header('location: manager_flight.php');
                }else if(isset($_POST['confirm'])){
                    $update_flight = "UPDATE airline_tickets SET flight_code ='$flight_code5', airline='$airline5', departure ='$departure5', anvil_place ='$anvil_place5', ticketType ='$ticketType5', flight_day ='$flight_day5', flight_price ='$flight_price5' WHERE flight_code='$flight_code5'";
                    $result_flight = mysqli_query($conn, $update_flight);
                    header('location: manager_flight.php');
                }
            }   
        }
       update_flight2(); 
    ?>
    
</body>
</html>
