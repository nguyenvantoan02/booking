<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Booking.com</title>
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
        .chuyenbay2_goback{
            padding: 20px;
            border: 1px solid #000;
            background-color: #f2f2f2;
            width: 28%;
            margin: 100px auto 0 auto;
            height: 100px;
        }
        .chuyenbay2_goback>a{
            text-decoration: none;
            padding: 4px 12px;
            background-color:#0094f3;
            color: #fff;
            
        }
        .chuyenbay2_goback>h3{
            margin-bottom: 20px;
        }
    </style>
</head>
<?php 
    $conn = mysqli_connect("localhost","root","123456","duAn1");
    // Xác thực và lấy dữ liệu từ $_GET
    $flight_code = isset($_GET['flight_code']) ? $_GET['flight_code'] : '';
    $ticketType = isset($_GET['ticketType']) ? $_GET['ticketType'] : '';
    $airline = isset($_GET['airline']) ? $_GET['airline'] : '';
    $departure = isset($_GET['departure']) ? $_GET['departure'] : '';
    $anvil_place = isset($_GET['anvil_place']) ? $_GET['anvil_place'] : '';
    $flight_day= isset($_GET['flight_day']) ? $_GET['flight_day'] : '';
    $flight_price= isset($_GET['flight_price']) ? $_GET['flight_price'] : '';

    $select = "SELECT * FROM flight_orders WHERE flight_code = '$flight_code' AND order_ticketType = '$ticketType' AND order_airline='$airline' AND order_departure='$departure' AND order_anvil_place='$anvil_place' AND order_flight_day='$flight_day'" ;
    $results = mysqli_query($conn, $select);
    if(mysqli_num_rows($results)>4){
?>
    <div class="chuyenbay2_goback">
        <h3>Bạn đã đặt quá số lượng vé trên một chuyến</h3>
        <a href="./flight.php">Quay lại</a>
    </div>

<?php }else{ ?>
<body style= "background-color: #0094f3; display:flex; justify-contents: center; align-items:center; height: 100vh">
<form action="flight3.php" method="post">
    <!-- Các trường ẩn để chứa các giá trị từ URL -->
    <input type="hidden" name="flight_code" value="<?php echo htmlspecialchars($_GET['flight_code']); ?>">
    <input type="hidden" name="airline" value="<?php echo htmlspecialchars($_GET['airline']); ?>">
    <input type="hidden" name="ticketType" value="<?php echo htmlspecialchars($_GET['ticketType']); ?>">
    <input type="hidden" name="departure" value="<?php echo htmlspecialchars($_GET['departure']); ?>">
    <input type="hidden" name="anvil_place" value="<?php echo htmlspecialchars($_GET['anvil_place']); ?>">
    <input type="hidden" name="flight_day" value="<?php echo htmlspecialchars($_GET['flight_day']); ?>">
    <input type="hidden" name="flight_price" value="<?php echo htmlspecialchars($_GET['flight_price']); ?>">

        
    <div class="car_confirm_now">
        <h2 style="color: #555">
            Vui lòng kiểm tra lại thông tin
            <i class="fa-solid fa-circle-check" style="color: green"></i>
        </h2>
        <p><span style="color: #000; font-weight: 600; margin-right: 2px;">Mã chuyến bay: </span>vn000<?php echo $flight_code; ?>.</p>
        <p><span style="color: #000; font-weight: 600; margin-right: 2px;">Tên hãng bay: </span><?php echo $airline; ?>.</p>
        <p><span style="color: #000; font-weight: 600; margin-right: 2px;">Chiều bay: </span><?php echo $ticketType; ?>.</p>
        <p><span style="color: #000; font-weight: 600; margin-right: 2px;">Nơi đến: </span><?php echo $departure; ?>.</p>
        <p><span style="color: #000; font-weight: 600; margin-right: 2px;">Nơi đi: </span><?php echo $anvil_place; ?>.</p>
        <p><span style="color: #000; font-weight: 600; margin-right: 2px;">Ngày bay: </span><?php echo $flight_day; ?>.</p>
        <p><span style="color: #000; font-weight: 600; margin-right: 2px;">Tổng thanh toán: </span><?php echo $flight_price; ?> vnđ.</p>
    </div>

    <h2>Bạn có chắc là muốn đặt vé?</h2>
    <input type="submit" name="cancel" value="Hủy">
    <input type="submit" name="confirm" value="Xác nhận">
</form>
<?php } ?> 

<?php
mysqli_free_result($results);
mysqli_close($conn);
?>  
</body>
</html>
