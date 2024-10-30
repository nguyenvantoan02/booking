<?php
    session_start();

    $conn = mysqli_connect("localhost","root","123456","duAn1");

    if(isset($_POST['hotelAddress']) && isset($_POST['quantityPerson']) && isset($_POST['hotel_name']) && isset($_POST['quantityRoom']) && isset($_POST['hotel_price']) && isset($_POST['code_hotel']) &&!empty($_POST['day_book'])){
        $hotelAddress = $_POST['hotelAddress'];
        $quantityPerson = $_POST['quantityPerson'];
        $hotel_name = $_POST['hotel_name'];
        $quantityRoom = $_POST['quantityRoom'];
        $hotel_price = $_POST['hotel_price'];
        $code_hotel = $_POST['code_hotel'];
        $day_book = $_POST['day_book'];

        if(isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
        } 
        if(isset($_POST['cancel'])){
            header('location: hotel.php');
        }
        if(isset($_POST['confirm'])){
            $select = "INSERT INTO hotel_orders (order_hotelAddress, order_quantityPerson, order_quantityRoom, time_book_curent, user_id, code_hotel, order_name, order_price) VALUES ('$hotelAddress', '$quantityPerson', '$quantityRoom', '$day_book', '$user_id', '$code_hotel', '$hotel_name', '$hotel_price')";
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
            width: 98%;
            margin: auto;
            margin-top: 50px;
        }
        th{
            padding: 6px 0;
            font-size: 13px;
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
                <th style="width: 10%">Mã mua hàng</th>
                <th style="width: 10%">Mã khách sạn</th>
                <th style="width: 10%">Mã định danh</th>
                <th style="width: 10%">Địa chỉ</th>
                <th style="width: 20%">Tên khách sạn</th>
                <th style="width: 10%">Số người</th>
                <th style="width: 10%">Số phòng</th>
                <th style="width: 10%">Thời gian đặt</th>
                <th style="width: 10%">Giá</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            // Lấy dữ liệu từ bảng flight_orders của người dùng hiện tại
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
                $select2 = "SELECT * FROM hotel_orders WHERE user_id = '$user_id'";
                $query2 = mysqli_query($conn, $select2);
                if(mysqli_num_rows($query2) > 0){
                    while($row = mysqli_fetch_array($query2)){
         ?>
         <tr>
             <td><?php echo $row['order_id']?></td>
             <td><?php echo $row['code_hotel']?></td>
             <td><?php echo $row['user_id']?></td>
             <td><?php echo $row['order_hotelAddress']?></td>
             <td><?php echo $row['order_name']?></td>
             <td><?php echo $row['order_quantityPerson']?></td>
             <td><?php echo $row['order_quantityRoom']?></td>
             <td><?php echo $row['time_book_curent']?></td>
             <td><?php echo $row['order_price']?> vnđ</td>
         </tr>
        <?php }}} ?>
        </tbody>

    </table>
</body>
</html>