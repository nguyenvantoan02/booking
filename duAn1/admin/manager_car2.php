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
        if(isset($_POST['code_car']) && isset($_POST['car_company']) && isset($_POST['quantitySeat']) && isset($_POST['car_price']) && isset($_POST['carColor']) && isset($_POST['link']) && isset($_POST['information'])){
            $code_car = $_POST['code_car'];
            $car_company = $_POST['car_company'];
            $quantitySeat = $_POST['quantitySeat'];
            $car_price = $_POST['car_price'];
            $carColor = $_POST['carColor'];
            $link = $_POST['link'];
            $information = $_POST['information'];
            
            if(isset($_POST['Delete'])){
                     
?>
<body style="padding-top: 70px">
        <form action="manager_car2.php" method="post">
            <input type="hidden" name="code_car_delete" value="<?php echo $code_car; ?>">
            <h3>Bạn có chắc là muốn XÓA dữ liệu về xe?</h3>
            <input type="submit" value="Hủy" name="cancell">
            <input type="submit" value="Tiếp tục" name="confirmm">
        </form>

    <?php  }else if(isset($_POST['Add'])){?>
        
    <a href="manager_car.php" class="comback"><i class="fa-solid fa-user-tie">Admin</i></a>
    <form action="manager_car2.php" method="post">
        <h3><i class="fa-solid fa-plus"></i>Thêm phương tiện</h3>
        <label class="width" for="code_car2">Code car</label>
        <input type="text" name="code_car2" id="code_car2" placeholder="Thêm mã code..."><br>

        <label class="width" for="car_company2">Tên hãng xe</label>
        <input type="text" name="car_company2" id="car_company2" placeholder="Thêm tên hãng xe..."><br>

        <label class="width" for="quantitySeat2">Số lượng ghế</label>
        <input type="text" name="quantitySeat2" id="quantitySeat2"  placeholder="Thêm số lượng ghế..."><br>

        <label class="width" for="car_price2">Giá thuê 1 ngày</label>
        <input type="text" name="car_price2" id="car_price2"  placeholder="Thêm giá thuê..."><br>

        <label class="width" for="carColor2">Màu xe</label>
        <input type="text" name="carColor2" id="carColor2"  placeholder="Thêm màu xe..."><br>

        <label class="width" for="link2">Địa chỉ hình ảnh</label>
        <input type="text" name="link2" id="link2"  placeholder="Thêm địa chỉ hình ảnh..."><br>

        <label class="width" for="information2">Thông tin xe</label>
        <input type="text" name="information2" id="information2"  placeholder="Thêm thông tin..."><br>


        <input type="submit" value="Thêm" class="add_flight">
    </form>
    
<?php 
    }else if(isset($_POST['Update'])){
?>
    <a href="manager_car2.php" class="comback"><i class="fa-solid fa-user-tie">Admin</i></a>
    <form action="manager_car2.php" method="post">
        <h3><i class="fa-solid fa-plus"></i>Update chuyến bay</h3>
        <!-- <label class="width" for="flight_code">Flight code</label> -->
        <input style="text-align: center;" type="hidden" name="code_car4" id="code_car4" value="<?php echo $code_car;?>"><br>
        
        <label class="width" for="car_company4">Tên hãng xe</label>
        <input style="text-align: center;" type="text" name="car_company4" id="car_company4" value="<?php echo $car_company;?>" placeholder="Update tên hãng xe..."><br>
        
        <label class="width" for="quantitySeat4">Số lượng ghế</label>
        <input style="text-align: center;" type="text" name="quantitySeat4" id="quantitySeat4" value="<?php echo $quantitySeat;?>" placeholder="Update số chỗ..."><br>
        
        <label class="width" for="car_price4">Giá thuê</label>
        <input style="text-align: center;" type="text" name="car_price4" id="car_price4" value="<?php echo $car_price;?>" placeholder="Update giá thuê..."><br>
        
        <label class="width" for="carColor4">Màu xe</label>
        <input style="text-align: center;" type="text" name="carColor4" id="carColor4" value="<?php echo $carColor;?>" placeholder="Update màu xe..."><br>
        
        <label class="width" for="link4">Địa chỉ hình ảnh</label>
        <input style="text-align: center;" type="text" name="link4" id="link4" value="<?php echo $link;?>" placeholder="Update địa chỉ hình ảnh..."><br>
        
        <label class="width" for="information4">Thông tin</label>
        <input style="text-align: center;" type="text" name="information4" id="information4" value="<?php echo $information;?>" placeholder="Thêm thông tin..."><br>
        <input type="submit" value="Update" class="add_flight">
    </form>
<?php
    }}}
    option();
?>
<?php 
    function delete_flight(){
        $conn = mysqli_connect("localhost", "root", "123456", "duAn1"); 
        if(isset($_POST['code_car_delete'])){
            if(isset($_POST['cancell'])){
                header('location: manager_car.php');
            }else if(isset($_POST['confirmm'])){
                $code_car_delete = $_POST['code_car_delete'];
                $delete_orders = "DELETE FROM order_cars WHERE code_car='$code_car_delete'";
                $result_orders = mysqli_query($conn, $delete_orders);

                $delete_tickets = "DELETE FROM cars WHERE code_car='$code_car_delete'";
                $result_tickets = mysqli_query($conn,$delete_tickets);
                header('location: manager_car.php');
            }
        }
    }
    delete_flight();
?>
<?php
function add_flight(){
    $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
    if(!empty($_POST['code_car2']) && !empty($_POST['car_company2']) && !empty($_POST['quantitySeat2']) && !empty($_POST['car_price2']) && !empty($_POST['carColor2']) && !empty($_POST['link2']) && !empty($_POST['information2'])){
        $code_car2 = $_POST['code_car2'];
        $car_company2 = $_POST['car_company2'];
        $quantitySeat2 = $_POST['quantitySeat2'];
        $car_price2 = $_POST['car_price2'];
        $carColor2 = $_POST['carColor2'];
        $link2 = $_POST['link2'];
        $information2 = $_POST['information2'];

        $check = "SELECT * FROM cars WHERE code_car ='$code_car2'";
        $result_check = mysqli_query($conn, $check);
        if(mysqli_num_rows($result_check)>0){
            echo"Dữ liệu bị trùng";
        }else{


?>
        <form action="manager_car2.php" method="post">
        <input type="hidden" name="code_car3" value="<?php echo $code_car2; ?>">
        <input type="hidden" name="car_company3" value="<?php echo $car_company2; ?>">
        <input type="hidden" name="quantitySeat3" value="<?php echo $quantitySeat2; ?>">
        <input type="hidden" name="car_price3" value="<?php echo $car_price2; ?>">
        <input type="hidden" name="carColor3" value="<?php echo $carColor2; ?>">
        <input type="hidden" name="link3" value="<?php echo $link2; ?>">
        <input type="hidden" name="information3" value="<?php echo $information2; ?>">

        
        <h3>Bạn có chắc là muốn THÊM dữ liệu về xe?</h3>
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
            if(isset($_POST['code_car3']) && isset($_POST['car_company3']) && isset($_POST['quantitySeat3']) && isset($_POST['car_price3']) && isset($_POST['carColor3']) && isset($_POST['link3']) && isset($_POST['information3'])){
                $code_car3 = $_POST['code_car3'];
                $car_company3 = $_POST['car_company3'];
                $quantitySeat3 = $_POST['quantitySeat3'];
                $car_price3 = $_POST['car_price3'];
                $carColor3 = $_POST['carColor3'];
                $link3 = $_POST['link3'];
                $information3 = $_POST['information3'];

                if(isset($_POST['cancel'])){
                    header('location: manager_car.php');
                }else if(isset($_POST['confirm'])){
                    $select2 = "INSERT INTO cars(code_car, car_company, quantitySeat, car_price, carColor, link, information) VALUES ('$code_car3','$car_company3','$quantitySeat3','$car_price3','$carColor3','$link3','$information3')";
                    $result2 = mysqli_query($conn, $select2);
                    header('location: manager_car.php');
                }
            }   
        }
        add_flight2(); 
    ?>  

    <?php
        function update_flight(){
            if(!empty($_POST['code_car4']) && !empty($_POST['car_company4']) && !empty($_POST['quantitySeat4']) && !empty($_POST['car_price4']) && !empty($_POST['carColor4']) && !empty($_POST['link4']) && !empty($_POST['information4'])){
                $code_car4 = $_POST['code_car4'];
                $car_company4 = $_POST['car_company4'];
                $quantitySeat4 = $_POST['quantitySeat4'];
                $car_price4 = $_POST['car_price4'];
                $carColor4 = $_POST['carColor4'];
                $link4 = $_POST['link4'];
                $information4 = $_POST['information4'];
    ?>
                <form action="manager_car2.php" method="post">
                    <input type="hidden" name="code_car5" value="<?php echo $code_car4; ?>">
                    <input type="hidden" name="car_company5" value="<?php echo $car_company4; ?>">
                    <input type="hidden" name="quantitySeat5" value="<?php echo $quantitySeat4; ?>">
                    <input type="hidden" name="car_price5" value="<?php echo $car_price4; ?>">
                    <input type="hidden" name="carColor5" value="<?php echo $carColor4; ?>">
                    <input type="hidden" name="link5" value="<?php echo $link4; ?>">
                    <input type="hidden" name="information5" value="<?php echo $information4; ?>">


                    
                    <h3>Bạn có chắc là muốn Update dữ liệu về xe?</h3>
                    <input type="submit" value="Hủy" name="cancel">
                    <input type="submit" value="Tiếp tục" name="confirm">
                </form>
    <?php }} update_flight(); ?>

    <?php 
        function update_flight2(){   
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
            if(isset($_POST['code_car5']) && isset($_POST['car_company5']) && isset($_POST['quantitySeat5']) && isset($_POST['car_price5']) && isset($_POST['carColor5']) && isset($_POST['link5']) && isset($_POST['information5'])){
                $code_car5 = $_POST['code_car5'];
                $car_company5 = $_POST['car_company5'];
                $quantitySeat5 = $_POST['quantitySeat5'];
                $car_price5 = $_POST['car_price5'];
                $carColor5 = $_POST['carColor5'];
                $link5 = $_POST['link5'];
                $information5 = $_POST['information5'];

                if(isset($_POST['cancel'])){
                    header('location: manager_car.php');
                }else if(isset($_POST['confirm'])){
                    $update_flight = "UPDATE cars SET code_car ='$code_car5', car_company='$car_company5', quantitySeat ='$quantitySeat5', car_price ='$car_price5', carColor ='$carColor5', link ='$link5', information ='$information5' WHERE code_car='$code_car5'";
                    $result_flight = mysqli_query($conn, $update_flight);
                    header('location: manager_car.php');
                }
            }   
        }
       update_flight2(); 
    ?>
    
</body>
</html>
