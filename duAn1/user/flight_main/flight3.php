<?php
    session_start();

    $conn = mysqli_connect("localhost","root","123456","duAn1");

    if(isset($_POST['flight_code']) && isset($_POST['airline']) && isset($_POST['ticketType']) && isset($_POST['departure']) && isset($_POST['anvil_place']) && !empty($_POST['flight_day']) && isset($_POST['flight_price'])){
        $flight_code = $_POST['flight_code'];
        $airline = $_POST['airline'];
        $ticketType = $_POST['ticketType'];
        $departure = $_POST['departure'];
        $anvil_place = $_POST['anvil_place'];
        $order_flight_day = $_POST['flight_day'];
        $flight_price = $_POST['flight_price'];
        if(isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
        }
        if(isset($_POST['cancel'])){
            header('location:flight.php');
        }if(isset($_POST['confirm'])){
            $select = "INSERT INTO flight_orders (order_airline, order_ticketType, order_departure, order_anvil_place, order_flight_day, flight_code, user_id,order_price) VALUES ('$airline', '$ticketType', '$departure', '$anvil_place', '$order_flight_day', '$flight_code', '$user_id', '$flight_price')";
            $query = mysqli_query($conn, $select);
        }
    }
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        body{
            padding-top: 50px;
        }
        a{
            margin-left: 60px;
            color:#0094f3;
            text-decoration: none;
            font-size: 22px;
        }
        table{
            width: 95%;
            margin: auto;
            margin-top: 50px;
        }
        th{
            padding: 6px 0;
            font-size: 14px;
            background-color: #dbdbdb;
        }
        td{
            padding: 6px 0;
            font-size: 14px;
            text-align: center;
        }


    </style>
</head>
<body>
    <a href="../../home.php">Booking.com</a>
    <table border=1 style="border-collapse: collapse;">
        <thead>
            <tr>
                <th style="width: 10%">Mã đặt hàng</th>
                <th style="width: 10%">Tên hãng bay</th>
                <th style="width: 10%">Chiều di chuyển</th>
                <th style="width: 10%">Nơi đi</th>
                <th style="width: 10%">Điểm đến</th>
                <th style="width: 15%">Ngày đi</th>
                <th style="width: 15%">Giá</th>
                <th style="width: 10%">Mã chuyến bay</th>
                <th style="width: 10%">Mã định danh</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            // Lấy dữ liệu từ bảng flight_orders của người dùng hiện tại
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
                $select2 = "SELECT * FROM flight_orders WHERE user_id = '$user_id'";
                $query2 = mysqli_query($conn, $select2);
                if(mysqli_num_rows($query2) > 0){
                    while($row = mysqli_fetch_array($query2)){
         ?>
         <tr>
             <td><?php echo $row['order_id']?></td>
             <td><?php echo $row['order_airline']?></td>
             <td><?php echo $row['order_ticketType']?></td>
             <td><?php echo $row['order_departure']?></td>
             <td><?php echo $row['order_anvil_place']?></td>
             <td><?php echo $row['order_flight_day']?></td>
             <td><?php echo $row['order_price']?>vnđ</td>
             <td>vn000<?php echo $row['flight_code']?></td>
             <td><?php echo $row['user_id']?></td>
         </tr>
        <?php }}} ?>
        </tbody>

    </table>
</body>
</html>