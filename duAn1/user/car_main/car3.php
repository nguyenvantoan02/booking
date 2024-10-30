<?php
    session_start();

    $conn = mysqli_connect("localhost","root","123456","duAn1");

    if(isset($_POST['code_car']) && isset($_POST['car_company']) && isset($_POST['car_price']) && isset($_POST['quantitySeat']) && isset($_POST['carColor']) && isset($_POST['car_day_book']) &&!empty($_POST['day_quantity']) &&!empty($_POST['total_ticket_car'])){
        $code_car = $_POST['code_car'];
        $car_company = $_POST['car_company'];
        $car_price = $_POST['car_price'];
        $quantitySeat = $_POST['quantitySeat'];
        $carColor = $_POST['carColor'];
        $car_day_book = $_POST['car_day_book'];
        $day_quantity = $_POST['day_quantity'];
        $total_ticket_car = $_POST['total_ticket_car'];
        if(isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
        } 
        if(isset($_POST['cancel'])){
            header('location: car.php');
        }
        if(isset($_POST['confirm'])){
            $select = "INSERT INTO order_cars (order_company, order_quantitySeat, order_carColor, order_day_book, order_day_quantity, order_total_money, code_car, user_id) VALUES ('$car_company', '$quantitySeat', '$carColor', '$car_day_book', '$day_quantity', '$total_ticket_car', '$code_car', '$user_id')";
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
                <th style="width: 10%">Tên xe</th>
                <th style="width: 10%">Số ghế</th>
                <th style="width: 10%">Màu sắc</th>
                <th style="width: 15%">Ngày thuê</th>
                <th style="width: 10%">Số ngày thuê</th>
                <th style="width: 15%">Tổng thanh toán</th>
                <th style="width: 10%">Mã định danh</th>
                <th style="width: 10%">Mã xe</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            // Lấy dữ liệu từ bảng flight_orders của người dùng hiện tại
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
                $select2 = "SELECT * FROM order_cars WHERE user_id = '$user_id'";
                $query2 = mysqli_query($conn, $select2);
                if(mysqli_num_rows($query2) > 0){
                    while($row = mysqli_fetch_array($query2)){
         ?>
         <tr>
             <td><?php echo $row['order_car']?></td>
             <td><?php echo $row['order_company']?></td>
             <td><?php echo $row['order_quantitySeat']?></td>
             <td><?php echo $row['order_carColor']?></td>
             <td><?php echo $row['order_day_book']?></td>
             <td><?php echo $row['order_day_quantity']?></td>
             <td><?php echo $row['order_total_money']?></td>
             <td><?php echo $row['user_id']?></td>
             <td><?php echo $row['code_car']?></td>
         </tr>
        <?php }}} ?>
        </tbody>

    </table>
</body>
</html>