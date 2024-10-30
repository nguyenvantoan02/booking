<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;   
        }
        form{
            width: 30%;
            background-color: #fff;
            margin: auto;
            padding: 40px;
        }
        input{
            min-width: 80px;
            max-width: 80px;
            padding: 6px 0;
        }
        .car2_goback{
            padding: 20px;
            border: 1px solid #000;
            background-color: #f2f2f2;
            width: 28%;
            margin: 100px auto 0 auto;
            height: 100px;
        }
        .car2_goback>a{
            text-decoration: none;
            padding: 4px 12px;
            background-color:#0094f3;
            color: #fff;
            
        }
        .car2_goback>h3{
            margin-bottom: 20px;
        }
        .car_confirm_now i{
            color: green;
        }
        span{
            background-color: yellow;
            padding: 2px;
        }
        .confirm,.cancel{
            margin-top: 20px;
        }
        .cancel{
            margin-right: 5px;
        }
    </style>
</head>
<body style= "background-color: #0094f3; display:flex; justify-contents: center; align-items:center; height: 100vh">

    

<?php
    $conn = mysqli_connect("localhost","root","123456","duAn1");
    if(isset($_GET['code_car']) && isset($_GET['car_company']) && isset($_GET['car_price']) && isset($_GET['quantitySeat']) && isset($_GET['carColor']) && !empty( $_GET['car_day_book']) && !empty($_GET['day_quantity'])){
        $code_car = $_GET['code_car'];
        $car_company = $_GET['car_company'];
        $car_price = $_GET['car_price'];
        $quantitySeat = $_GET['quantitySeat'];
        $carColor = $_GET['carColor'];
        $car_day_book = $_GET['car_day_book'];
        $day_quantity = $_GET['day_quantity'];
        $select = "SELECT * FROM order_cars WHERE code_car='$code_car' AND order_company='$car_company' AND order_quantitySeat='$quantitySeat' AND order_carColor='$carColor' AND order_day_book='$car_day_book'";
        $query = mysqli_query($conn, $select);
        
        if(mysqli_num_rows($query)>0){           
?>
    <div class="car2_goback">
        <h3>Hiện xe đang bận</h3>
        <a href="car.php">Quay lại</a>
    </div>
<?php }else{?>
    <?php 
        $total_ticket_car = (int)$day_quantity * (int)$car_price;
    ?>
    <form action="car3.php" method="post">
    <!-- Các trường ẩn để chứa các giá trị từ URL -->
    <input type="hidden" name="code_car" value="<?php echo htmlspecialchars($_GET['code_car']); ?>">
    <input type="hidden" name="car_company" value="<?php echo htmlspecialchars($_GET['car_company']); ?>">
    <input type="hidden" name="car_price" value="<?php echo htmlspecialchars($_GET['car_price']); ?>">
    <input type="hidden" name="quantitySeat" value="<?php echo htmlspecialchars($_GET['quantitySeat']); ?>">
    <input type="hidden" name="carColor" value="<?php echo htmlspecialchars($_GET['carColor']); ?>">
    <input type="hidden" name="car_day_book" value="<?php echo htmlspecialchars($_GET['car_day_book']); ?>">
    <input type="hidden" name="day_quantity" value="<?php echo htmlspecialchars($_GET['day_quantity']); ?>">
    <input type="hidden" name="total_ticket_car" value="<?php echo $total_ticket_car; ?>">

    <div class="car_confirm_now">
        <h2>
            Vui lòng kiểm tra lại thông tin
            <i class="fa-solid fa-circle-check" style="color: green"></i>
        </h2 style="color: #555">
        <p class="confirm"><span style="color: #000; font-weight: 600; margin-right: 2px;">Mã xe: </span><?php echo $code_car; ?>.</p>
        <p class="confirm"><span style="color: #000; font-weight: 600; margin-right: 2px;">Tên xe: </span><?php echo $car_company; ?>.</p>
        <p class="confirm"><span style="color: #000; font-weight: 600; margin-right: 2px;">Giá thuê/ngày: </span><?php echo $car_price; ?>vnđ.</p>
        <p class="confirm"><span style="color: #000; font-weight: 600; margin-right: 2px;">Tổng tiền thanh toán: </span><?php echo $total_ticket_car; ?>vnđ.</p>
        <p class="confirm"><span style="color: #000; font-weight: 600; margin-right: 2px;">Ngày thuê: </span><?php echo $car_day_book; ?> ngày.</p>
        <p class="confirm"><span style="color: #000; font-weight: 600; margin-right: 2px;">Số lượng ngày thuê: </span><?php echo $day_quantity; ?> ngày.</p>
        <p class="confirm"><span style="color: #000; font-weight: 600; margin-right: 2px;">Số ghế: </span><?php echo $quantitySeat; ?>.</p>
        <p class="confirm"><span style="color: #000; font-weight: 600; margin-right: 2px;">Màu xe: </span><?php echo $carColor; ?>.</p>
    </div>

    <h2 style="font-size: 18px; color: red; margin: 52px 0 0 0">Bạn có chắc là muốn đặt xe bây giờ?</h2>
    <input type="submit" name="cancel" value="Hủy" class="cancel">
    <input type="submit" name="confirm" value="Xác nhận"  class="confirm">
</form>
 
 <?php }} ?>
</body>
</html>

