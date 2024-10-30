<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <title>Document</title>
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
        .hotel2_goback{
            padding: 20px;
            border: 1px solid #000;
            background-color: #f2f2f2;
            width: 28%;
            margin: 100px auto 0 auto;
            height: 100px;
        }
        .hotel2_goback>a{
            text-decoration: none;
            padding: 4px 12px;
            background-color:#0094f3;
            color: #fff;
            
        }
        .hotel2_goback>h3{
            margin-bottom: 20px;
        }
        .confirm,.cancel{
            margin-top: 20px;
        }
        .cancel{
            margin-right: 5px;
        }
        span{
            background-color: yellow;
            padding: 2px;
        }
    </style>
</head>
<body style= "background-color: #0094f3; display:flex; justify-contents: center; align-items:center; height: 100vh">

    

<?php
    $conn = mysqli_connect("localhost","root","123456","duAn1");
    if(isset($_GET['hotelAddress']) && isset($_GET['hotel_name']) && isset($_GET['quantityPerson']) && isset($_GET['quantityRoom']) && isset($_GET['hotel_price']) && isset( $_GET['code_hotel']) &&!empty($_GET['day_book']) &&!empty($_GET['day_quantity'])){
        $hotelAddress = $_GET['hotelAddress'];
        $hotel_name = $_GET['hotel_name'];
        $quantityPerson = $_GET['quantityPerson'];
        $quantityRoom = $_GET['quantityRoom'];
        $hotel_price = $_GET['hotel_price'];
        $code_hotel = $_GET['code_hotel'];
        $day_book = $_GET['day_book'];
        $day_quantity = $_GET['day_quantity'];

        $select = "SELECT * FROM hotel_orders WHERE order_hotelAddress='$hotelAddress' AND order_quantityPerson='$quantityPerson' AND order_quantityRoom='$quantityRoom' AND order_name='$hotel_name' AND code_hotel='$code_hotel' AND time_book_curent='$day_book'";
        $query = mysqli_query($conn, $select);
        
        if(mysqli_num_rows($query)>0){           
?>
    <div class="hotel2_goback">
        <h3>Hiện không còn phòng trống</h3>
        <a href="hotel.php">Quay lại</a>
    </div>
<?php }else{?>
    <?php 
        $total_price_hotel = (int)$day_quantity * (int)$hotel_price;
    ?>
    <form action="hotel3.php" method="post">
    <!-- Các trường ẩn để chứa các giá trị từ URL -->
    <input type="hidden" name="hotelAddress" value="<?php echo htmlspecialchars($_GET['hotelAddress']); ?>">
    <input type="hidden" name="quantityPerson" value="<?php echo htmlspecialchars($_GET['quantityPerson']); ?>">
    <input type="hidden" name="quantityRoom" value="<?php echo htmlspecialchars($_GET['quantityRoom']); ?>">
    <input type="hidden" name="hotel_name" value="<?php echo htmlspecialchars($_GET['hotel_name']); ?>">
    <input type="hidden" name="hotel_price" value="<?php echo $total_price_hotel; ?>">
    <input type="hidden" name="code_hotel" value="<?php echo htmlspecialchars($_GET['code_hotel']); ?>">
    <input type="hidden" name="day_book" value="<?php echo htmlspecialchars($_GET['day_book']); ?>">

    
    <div class="car_confirm_now">
        <h2 style="color: #555">
            Vui lòng kiểm tra lại thông tin
            <i class="fa-solid fa-circle-check" style="color: green"></i>
        </h2>
        <p><span style="color: #000; font-weight: 600; margin-right: 2px;">Thành phố: </span><?php echo $hotelAddress; ?>.</p>
        <p><span style="color: #000; font-weight: 600; margin-right: 2px;">Số lượng người: </span><?php echo $quantityPerson; ?>.</p>
        <p><span style="color: #000; font-weight: 600; margin-right: 2px;">Số lượng phòng: </span><?php echo $quantityRoom; ?>.</p>
        <p><span style="color: #000; font-weight: 600; margin-right: 2px;">Tên khách sạn: </span><?php echo $hotel_name; ?>.</p>
        <p><span style="color: #000; font-weight: 600; margin-right: 2px;">Số ngày thuê: </span><?php echo $day_quantity; ?> ngày.</p>
        <p><span style="color: #000; font-weight: 600; margin-right: 2px;">Giá/ngày: </span><?php echo $hotel_price; ?> vnđ/ngày.</p>
        <p><span style="color: #000; font-weight: 600; margin-right: 2px;">Tổng thanh toán: </span><?php echo $total_price_hotel; ?> vnđ.</p>
        <p><span style="color: #000; font-weight: 600; margin-right: 2px;">Mã khách sạn: </span><?php echo $code_hotel; ?>.</p>
        <p><span style="color: #000; font-weight: 600; margin-right: 2px;">Ngày đặt: </span><?php echo $day_book; ?>.</p>
    </div>


    <h2 style="font-size: 18px; color: red; margin: 52px 0 0 0">Bạn có chắc là muốn đặt phòng?</h2>
    <input type="submit" name="cancel" value="Hủy" class="cancel">
    <input type="submit" name="confirm" value="Xác nhận"  class="confirm">
</form>
 
 <?php }} ?>
</body>
</html>

