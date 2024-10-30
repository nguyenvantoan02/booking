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
        if(isset($_POST['code_hotel']) && isset($_POST['hotelAddress']) && isset($_POST['hotel_name']) && isset($_POST['quantityPerson']) && isset($_POST['hotel_price']) && isset($_POST['quantityRoom']) && isset($_POST['addresss']) && isset($_POST['information']) && isset($_POST['link'])){
            $code_hotel = $_POST['code_hotel'];
            $hotelAddress = $_POST['hotelAddress'];
            $hotel_name = $_POST['hotel_name'];
            $quantityPerson = $_POST['quantityPerson'];
            $hotel_price = $_POST['hotel_price'];
            $quantityRoom = $_POST['quantityRoom'];
            $addresss = $_POST['addresss'];
            $information = $_POST['information'];
            $link = $_POST['link'];

            if(isset($_POST['Delete'])){
                     
?>
<body style="padding-top: 70px">
        <form action="manager_hotel2.php" method="post">
            <input type="hidden" name="code_hotel_delete" value="<?php echo $code_hotel; ?>">
            <h3>Bạn có chắc là muốn XÓA dữ liệu về khách sạn?</h3>
            <input type="submit" value="Hủy" name="cancell">
            <input type="submit" value="Tiếp tục" name="confirmm">
        </form>
    <?php  }else if(isset($_POST['Add'])){?>
        
    <a href="manager_hotel.php" class="comback"><i class="fa-solid fa-user-tie">Admin</i></a>
    <form action="manager_hotel2.php" method="post">
        <h3><i class="fa-solid fa-plus"></i>Thêm chuyến bay</h3>
        <label class="width" for="code_hotel2">Hotel code</label>
        <input type="text" name="code_hotel2" id="code_hotel2" placeholder="Thêm mã khách sạn..."><br>

        <label class="width" for="hotelAddress2">Thành phố</label>
        <input type="text" name="hotelAddress2" id="hotelAddress2"  placeholder="Thêm địa chỉ khách sạn..."><br>

        <label class="width" for="hotel_name2">Tên khách sạn</label>
        <input type="text" name="hotel_name2" id="hotel_name2"  placeholder="Thêm tên khách sạn..."><br>

        <label class="width" for="quantityPerson2">Số lượng người</label>
        <input type="text" name="quantityPerson2" id="aquantityPerson2"  placeholder="ví dụ: (Phòng 1 người)..."><br>

        <label class="width" for="hotel_price2">Giá phòng 1 ngày</label>
        <input type="text" name="hotel_price2" id="hotel_price2"  placeholder="Thêm giá phòng..."><br>

        <label class="width" for="quantityRoom2">Số lượng phòng</label>
        <input type="text" name="quantityRoom2" id="quantityRoom2"  placeholder="ví dụ: (1 phòng)."><br>

        <label class="width" for="addresss2">Địa chỉ khách sạn</label>
        <input type="text" name="addresss2" id="addresss2"  placeholder="Thêm địa chỉ khách sạn..."><br>

        <label class="width" for="information2">Thông tin khách sạn</label>
        <textarea name="information2" id="information2"  placeholder="Thêm thông tin khách sạn..."></textarea><br>

        <label class="width" for="link2">Địa chỉ ảnh</label>
        <input type="text" name="link2" id="link2"  placeholder="Thêm địa chỉ hình ảnh..."><br>
        
        <input type="submit" value="Thêm" class="add_flight">
    </form>
    
<?php 
    }else if(isset($_POST['Update'])){
?>
    <a href="manager_hotel.php" class="comback"><i class="fa-solid fa-user-tie">Admin</i></a>
    <form action="manager_hotel2.php" method="post">
        <h3><i class="fa-solid fa-plus"></i>Update chuyến bay</h3>
        <!-- <label class="width" for="flight_code">Flight code</label> -->
        <input style="text-align: center;" type="hidden" name="code_hotel4" id="code_hotel4" value="<?php echo $code_hotel;?>" placeholder="Thêm mã code..."><br>
        
        <label class="width" for="hotelAddress4">Thành phố</label>
        <input style="text-align: center;" type="text" name="hotelAddress4" id="hotelAddress4" value="<?php echo $hotelAddress;?>" placeholder="Thêm tên hãng bay(ví dụ: vietnam_airlines')..."><br>
        
        <label class="width" for="hotel_name4">Tên khách sạn</label>
        <input style="text-align: center;" type="text" name="hotel_name4" id="hotel_name4" value="<?php echo $hotel_name;?>" placeholder="Update tên khác sạn..."><br>
        
        <label class="width" for="quantityPerson4">Số lượng người</label>
        <input style="text-align: center;" type="text" name="quantityPerson4" id="quantityPerson4" value="<?php echo $quantityPerson;?>" placeholder="Update số lượng người..."><br>
        
        <label class="width" for="hotel_price4">Giá phòng một ngày</label>
        <input style="text-align: center;" type="text" name="hotel_price4" id="hotel_price4" value="<?php echo $hotel_price;?>" placeholder="Update giá phòng..."><br>
        
        <label class="width" for="quantityRoom4">Số lượng phòng</label>
        <input style="text-align: center;" type="text" name="quantityRoom4" id="quantityRoom4" value="<?php echo $quantityRoom ;?>" placeholder="Update số lượng phòng"><br>
        
        <label class="width" for="addresss4">Địa chỉ khách sạn</label>
        <input style="text-align: center;" type="text" name="addresss4" id="addresss4" value="<?php echo $addresss;?>" placeholder="Update địa chỉ..."><br>

        <label class="width" for="information4">Thông tin khách sạn</label>
        <input style="text-align: center;" type="text" name="information4" id="information4" value="<?php echo $information;?>" placeholder="Update thông tin..."><br>

        <label class="width" for="link4">Địa chỉ hình ảnh</label>
        <input style="text-align: center;" type="text" name="link4" id="link4" value="<?php echo $link;?>" placeholder="Update địa chỉ hình ảnh..."><br>
        
        <input type="submit" value="Update" class="add_flight">
    </form>
<?php
    }}}
    option();
?>
<?php 
    function delete_flight(){
        $conn = mysqli_connect("localhost", "root", "123456", "duAn1"); 
        if(isset($_POST['code_hotel_delete'])){
            if(isset($_POST['cancell'])){
                header('location: manager_hotel.php');
            }else if(isset($_POST['confirmm'])){
                $code_hotel_delete = $_POST['code_hotel_delete'];
                $delete_tickets = "DELETE FROM hotel_orders WHERE code_hotel='$code_hotel_delete'";
                $result_tickets = mysqli_query($conn,$delete_tickets);

                $delete_orders = "DELETE FROM hotels WHERE code_hotel='$code_hotel_delete'";
                $result_orders = mysqli_query($conn, $delete_orders);
                header('location: manager_hotel.php');
            }
        }
    }
    delete_flight();
?>
<?php
function add_flight(){
    $conn = mysqli_connect("localhost", "root", "123456", "duAn1"); 
    if(!empty($_POST['code_hotel2']) && !empty($_POST['hotelAddress2']) && !empty($_POST['hotel_name2']) && !empty($_POST['quantityPerson2']) && !empty($_POST['hotel_price2']) && !empty($_POST['quantityRoom2']) && !empty($_POST['addresss2']) && !empty($_POST['information2']) && !empty($_POST['link2'])){
        $code_hotel2 = $_POST['code_hotel2'];
        $hotelAddress2 = $_POST['hotelAddress2'];
        $hotel_name2 = $_POST['hotel_name2'];
        $quantityPerson2 = $_POST['quantityPerson2'];
        $hotel_price2 = $_POST['hotel_price2'];
        $quantityRoom2 = $_POST['quantityRoom2'];
        $addresss2 = $_POST['addresss2'];
        $information2 = $_POST['information2'];
        $link2 = $_POST['link2'];

        $check = "SELECT * FROM hotels WHERE code_hotel ='$code_hotel2'";
        $result_check = mysqli_query($conn, $check);
        if(mysqli_num_rows($result_check)>0){
            echo"Dữ liệu bị trùng";
        }else{


?>
        <form action="manager_hotel2.php" method="post">
        <input type="hidden" name="code_hotel3" value="<?php echo $code_hotel2; ?>">
        <input type="hidden" name="hotelAddress3" value="<?php echo $hotelAddress2; ?>">
        <input type="hidden" name="hotel_name3" value="<?php echo $hotel_name2; ?>">
        <input type="hidden" name="quantityPerson3" value="<?php echo $quantityPerson2; ?>">
        <input type="hidden" name="hotel_price3" value="<?php echo $hotel_price2; ?>">
        <input type="hidden" name="quantityRoom3" value="<?php echo $quantityRoom2; ?>">
        <input type="hidden" name="addresss3" value="<?php echo $addresss2; ?>">
        <input type="hidden" name="information3" value="<?php echo $information2; ?>">
        <input type="hidden" name="link3" value="<?php echo $link2; ?>">
        
        <h3>Bạn có chắc là muốn THÊM dữ liệu về khách sạn?</h3>
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
            if(!empty($_POST['code_hotel3']) && !empty($_POST['hotelAddress3']) && !empty($_POST['hotel_name3']) && !empty($_POST['quantityPerson3']) && !empty($_POST['hotel_price3']) && !empty($_POST['quantityRoom3']) && !empty($_POST['addresss3']) && !empty($_POST['information3']) && !empty($_POST['link3'])){
                $code_hotel3 = $_POST['code_hotel3'];
                $hotelAddress3 = $_POST['hotelAddress3'];
                $hotel_name3 = $_POST['hotel_name3'];
                $quantityPerson3 = $_POST['quantityPerson3'];
                $hotel_price3 = $_POST['hotel_price3'];
                $quantityRoom3 = $_POST['quantityRoom3'];
                $addresss3 = $_POST['addresss3'];
                $information3 = $_POST['information3'];
                $link3 = $_POST['link3'];
                if(isset($_POST['cancel'])){
                    header('location: manager_hotel.php');
                }else if(isset($_POST['confirm'])){
                    $select2 = "INSERT INTO hotels(hotelAddress, hotel_name, quantityPerson, hotel_price, quantityRoom, addresss, information, link) VALUES ('$hotelAddress3','$hotel_name3','$quantityPerson3','$hotel_price3','$quantityRoom3','$addresss3','$information3','$link3')";
                    $result2 = mysqli_query($conn, $select2);
                    header('location: manager_hotel.php');
                }
            }   
        }
        add_flight2(); 
    ?>  

    <?php
        function update_flight(){
            if(!empty($_POST['code_hotel4']) && !empty($_POST['hotelAddress4']) && !empty($_POST['hotel_name4']) && !empty($_POST['quantityPerson4']) && !empty($_POST['hotel_price4']) && !empty($_POST['quantityRoom4']) && !empty($_POST['addresss4']) && !empty($_POST['information4']) && !empty($_POST['link4'])){
                $code_hotel4 = $_POST['code_hotel4'];
                $hotelAddress4 = $_POST['hotelAddress4'];
                $hotel_name4 = $_POST['hotel_name4'];
                $quantityPerson4 = $_POST['quantityPerson4'];
                $hotel_price4 = $_POST['hotel_price4'];
                $quantityRoom4 = $_POST['quantityRoom4'];
                $addresss4 = $_POST['addresss4'];
                $information4 = $_POST['information4'];
                $link4 = $_POST['link4'];
    ?>
                 <form action="manager_hotel2.php" method="post">
                    <input type="hidden" name="code_hotel5" value="<?php echo $code_hotel4; ?>">
                    <input type="hidden" name="hotelAddress5" value="<?php echo $hotelAddress4; ?>">
                    <input type="hidden" name="hotel_name5" value="<?php echo $hotel_name4; ?>">
                    <input type="hidden" name="quantityPerson5" value="<?php echo $quantityPerson4; ?>">
                    <input type="hidden" name="hotel_price5" value="<?php echo $hotel_price4; ?>">
                    <input type="hidden" name="quantityRoom5" value="<?php echo $quantityRoom4; ?>">
                    <input type="hidden" name="addresss5" value="<?php echo $addresss4; ?>">
                    <input type="hidden" name="information5" value="<?php echo $information4; ?>">
                    <input type="hidden" name="link5" value="<?php echo $link4; ?>">
                    
                    <h3>Bạn có chắc là muốn Update dữ liệu về khách sạn?</h3>
                    <input type="submit" value="Hủy" name="cancel">
                    <input type="submit" value="Tiếp tục" name="confirm">
                </form>
    <?php }} update_flight(); ?>

    <?php 
        function update_flight2(){   
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
            if(isset($_POST['code_hotel5']) && isset($_POST['hotelAddress5']) && isset($_POST['hotel_name5']) && isset($_POST['quantityPerson5']) && isset($_POST['hotel_price5']) && isset($_POST['quantityRoom5']) && isset($_POST['addresss5']) && isset($_POST['information5']) && isset($_POST['link5'])){
                $code_hotel5 = $_POST['code_hotel5'];
                $hotelAddress5 = $_POST['hotelAddress5'];
                $hotel_name5 = $_POST['hotel_name5'];
                $quantityPerson5 = $_POST['quantityPerson5'];
                $hotel_price5 = $_POST['hotel_price5'];
                $quantityRoom5 = $_POST['quantityRoom5'];
                $addresss5 = $_POST['addresss5'];
                $information5 = $_POST['information5'];
                $link5 = $_POST['link5'];

                if(isset($_POST['cancel'])){
                    header('location: manager_hotel.php');
                }else if(isset($_POST['confirm'])){
                    $update_hotel = "UPDATE hotels SET code_hotel ='$code_hotel5', hotelAddress ='$hotelAddress5', hotel_name ='$hotel_name5', quantityPerson='$quantityPerson5', hotel_price ='$hotel_price5', quantityRoom ='$quantityRoom5', addresss ='$addresss5', information ='$information5', link ='$link5' WHERE code_hotel='$code_hotel5'";
                    $result_hotel = mysqli_query($conn, $update_hotel);
                    header('location: manager_hotel.php');
                }
            }   
        }
       update_flight2(); 
    ?>
    
</body>
</html>
