<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        .page {
            display: none;
            background-color: #333;
            height: 100vh;
        }

        .active {
            display: block;
        }
        button{
            margin: 0 10px 0 20px;
            padding: 4px 6px;
        }
        .header_manager_flight{
            height: 50px;
            background-color: rgba(33, 32, 32, 0.8);
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            display: flex;
            align-items: center;
            font-weight: 800;

        }
        #flight,#order_flight{
            margin-top: 100px;
        }
        input{
            border: none;
            text-align: center;
            font-weight: 550;
            font-size: 15px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        
        form{
            width: 94%;
            margin: 4px auto;
            padding: 10px 0;
            background-color: #fff;
        }
        #kt,#kt1,#kt2{
            padding: 6px 0;
            border: none;
            max-width: 94px;
            cursor: pointer;
            margin-left: 1px;
        }
        #kt:hover{
            opacity: 0.8;
        }
        #kt1:hover{
            opacity: 0.8;
        }
        #kt2:hover{
            opacity: 0.8;
        }
        #kt{
            background-color: #51b351;
            font-size: 15px;
            color: #fff;
            font-weight: 500;
        }
        #kt1{
            background-color: #488ddc;
            font-size: 15px;
            color: #fff;
            font-weight: 500;
        }
        #kt2{
            background-color: #eb3232;
            font-size: 14px;
            color: #fff;
            font-weight: 500;
        }
        .admin_main{
            margin-left: 60px;
            text-decoration: none;
            font-size: 16px;
            color: #fff;
            margin-right: 50px;
            color: red;
        }
        .admin_main i{
            margin-right: 8px;
        }
        h3 {
            text-align: end;
            margin-right: 88px;
            font-size: 15px;
            margin-bottom: 54px;
            color: #fff;
            padding-top: 50px;
        }
        table{
            width: 94%;
            margin: 0 auto;
            
        }
        th{
            padding: 14px 0;
            background-color: #fff;
            font-size:13px;
            text-transform: uppercase;

        }
        .kt, .kt1, .kt2 {
            min-width: 88.5px !important;
            max-width: 88.5px;
            margin-left: 6px !important;

        }

    </style>
</head>
<body>
    <header class="header_manager_flight">
        <a href="admin.php" class="admin_main"><i class="fa-solid fa-user-tie">Admin</i></a>
        <button onclick="showPage('flight')">Quản lí Khách sạn</button>
        <button onclick="showPage('order_flight')">Quản lí Khách sạn đã đặt</button>

    </header>
    
    </div>
    <div id="flight" class="page">
        <h3>Danh sách khách sạn</h3>
        <table border=1 style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="width: 5%">Mã khách sạn</th>
                    <th style="width: 6%">Thành phố</th>
                    <th style="width: 9%">Tên khách sạn</th>
                    <th style="width: 10%">Số lượng người</th>
                    <th style="width: 9%">Giá</th>
                    <th style="width: 9%">Số lượng phòng</th>
                    <th style="width: 10%">Địa chỉ</th>
                    <th style="width: 10%">Thông tin</th>
                    <th style="width: 10%">Ảnh</th>
                    <th style="width: 7%">Thêm</th>
                    <th style="width: 7%">Sửa</th>
                    <th style="width: 7%">Xóa</th>
                </tr>
            </thead>
        </table>
        <?php
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1"); 
            $select= "SELECT * FROM hotels";
            $result= mysqli_query($conn,$select);
            while($row = mysqli_fetch_array($result)){
        ?>
        <form method="post" action="manager_hotel2.php" class="list_flight">
            <input type="text"  name="code_hotel" value="<?php echo $row['code_hotel'];?>" style="width: 5%">
            <input type="text"  name="hotelAddress" value="<?php echo $row['hotelAddress'];?>" style="width: 6%">
            <input type="text"  name="hotel_name" value="<?php echo $row['hotel_name'];?>" style="width:8%">
            <input type="text"  name="quantityPerson" value="<?php echo $row['quantityPerson'];?>" style="width: 10%">
            <input type="text"  name="hotel_price" value="<?php echo $row['hotel_price'];?>" style="width: 9%">
            <input type="text"  name="quantityRoom" value="<?php echo $row['quantityRoom'];?>" style="width:9%">
            <input type="text"  name="addresss" value="<?php echo $row['addresss'];?>" style="width: 9.5%">
            <input type="text"  name="information" value="<?php echo $row['information'];?>" style="width: 10%">
            <input type="text"  name="link" value="<?php echo $row['link'];?>" style="width: 9.8%">
            <input type="submit" value="Add" name="Add"  style="width: 7%" id="kt">
            <input type="submit" value="Update" name="Update"  style="width: 7%" id="kt1">
            <input type="submit" value="Delete" name="Delete"  style="width: 7%" id="kt2">
        </form>
        <?php }?>
    </div>

    <div id="order_flight" class="page">
    <h3>Danh sách khách sạn đã đặt</h3>
            <table border=1 style="border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="width: 5%">Mã đặt phòng</th>
                        <th style="width: 6%">Thành phố</th>
                        <th style="width: 10%">Số lượng người</th>
                        <th style="width: 10%">Số lượng phòng</th>
                        <th style="width: 10%">Thời gian đặt</th>
                        <th style="width: 10%">Tên</th>
                        <th style="width: 10%">Giá</th>
                        <th style="width: 6%">Mã người dùng</th>
                        <th style="width: 6%">Mã khách sạn</th>
                        <th style="width: 7%">Thêm</th>
                        <th style="width: 7%">Sửa</th>
                        <th style="width: 7%">Xóa</th>
                    </tr>
                </thead>
            </table>
            <?php 
                $conn = mysqli_connect("localhost", "root", "123456", "duAn1"); 
                $select1= "SELECT * FROM hotel_orders";
                $result1= mysqli_query($conn,$select1);
                while($row1 = mysqli_fetch_array($result1)){
            ?>   
        <form method="post" action="manager_hotel3.php" class="list_flight">
            <input type="text"  name="order_id" value="<?php echo $row1['order_id'];?>" style="width: 5%">
            <input type="text"  name="order_hotelAddress" value="<?php echo $row1['order_hotelAddress'];?>" style="width: 6%">
            <input type="text"  name="order_quantityPerson" value="<?php echo $row1['order_quantityPerson'];?>" style="width: 11%">
            <input type="text"  name="order_quantityRoom" value="<?php echo $row1['order_quantityRoom'];?>" style="width: 10%">
            <input type="text"  name="time_book_curent" value="<?php echo $row1['time_book_curent'];?>" style="width: 11%">
            <input type="text"  name="order_name" value="<?php echo $row1['order_name'];?>" style="width: 10%">
            <input type="text"  name="order_price" value="<?php echo $row1['order_price'];?>" style="width: 10%">
            <input type="text"  name="user_id" value="<?php echo $row1['user_id'];?>" style="width:6%">
            <input type="text"  name="code_hotel" value="<?php echo $row1['code_hotel'];?>" style="width: 6%">
            <input type="submit" value="Add" name="Add"  style="width: 8%" id="kt" class="kt">
            <input type="submit" value="Update" name="Update"  style="width: 8%" id="kt1" class="kt1">
            <input type="submit" value="Delete" name="Delete"  style="width: 8%" id="kt2" class="kt2">
        </form>
            <?php }?>

    </div>

    <script>
        function showPage(pageId) {
            // Ẩn tất cả các trang
            var pages = document.getElementsByClassName('page');
            for (var i = 0; i < pages.length; i++) {
                pages[i].style.display = 'none';
            }
            // Hiển thị trang được chọn
            document.getElementById(pageId).style.display = 'block';
        }
        

        
    </script>
</body>
</html>
