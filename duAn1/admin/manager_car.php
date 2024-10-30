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
            font-weight: 500;
            font-size: 15px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        form{
            width: 90%;
            margin: 4px auto;
            padding: 10px 0;
            background-color: #fff;
        }
        #kt,#kt1,#kt2{
            padding: 6px 0;
            border: none;
            max-width: 100px;
            cursor: pointer;
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
            margin-left: 9px;
        }
        #kt2{
            background-color: #eb3232;
            font-size: 14px;
            color: #fff;
            font-weight: 500;
            margin-left: 9px;
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
            width: 90%;
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
            margin-left: 6px;
        }

    </style>
</head>
<body>
    <header class="header_manager_flight">
        <a href="admin.php" class="admin_main"><i class="fa-solid fa-user-tie">Admin</i></a>
        <button onclick="showPage('flight')">Quản lí xe</button>
        <button onclick="showPage('order_flight')">Quản lí xe đã đặt</button>

    </header>
    
    </div>
    <div id="flight" class="page">
        <h3>Danh sách xe</h3>
        <table border=1 style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="width: 10%">Mã xe</th>
                    <th style="width: 10%">Hãng xe</th>
                    <th style="width: 10%">Số ghế</th>
                    <th style="width: 11%">Giá thuê</th>
                    <th style="width: 11%">Màu xe</th>
                    <th style="width: 11%">Ảnh</th>
                    <th style="width: 11%">Thông tin</th>
                    <th style="width: 8%">Thêm</th>
                    <th style="width: 8%">Sửa</th>
                    <th style="width: 8%">Xóa</th>
                </tr>
            </thead>
        </table>
        <?php
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1"); 
            $select= "SELECT * FROM cars";
            $result= mysqli_query($conn,$select);
            while($row = mysqli_fetch_array($result)){
        ?>
        <form method="post" action="manager_car2.php" class="list_flight">
            <input type="text"  name="code_car" value="<?php echo $row['code_car'];?>" style="width: 10%">
            <input type="text"  name="car_company" value="<?php echo $row['car_company'];?>" style="width: 10%">
            <input type="text"  name="quantitySeat" value="<?php echo $row['quantitySeat'];?>" style="width: 9.6%">
            <input type="text"  name="car_price" value="<?php echo $row['car_price'];?>" style="width: 11%">
            <input type="text"  name="carColor" value="<?php echo $row['carColor'];?>" style="width: 11%">
            <input type="text"  name="link" value="<?php echo $row['link'];?>" style="width:11%">
            <input type="text"  name="information" value="<?php echo $row['information'];?>" style="width: 11%">
            <input type="submit" value="Add" name="Add"  style="width: 8%" id="kt">
            <input type="submit" value="Update" name="Update"  style="width: 8%" id="kt1">
            <input type="submit" value="Delete" name="Delete"  style="width: 8%" id="kt2">
        </form>
        <?php }?>
    </div>

    <div id="order_flight" class="page">
    <h3>Danh sách xe đã đặt</h3>
            <table border=1 style="border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="width: 6%">Mã đặt xe</th>
                        <th style="width: 6%">Hãng xe</th>
                        <th style="width: 5%">Số ghế</th>
                        <th style="width: 5%">Màu</th>
                        <th style="width: 10%">Ngày đặt</th>
                        <th style="width: 10%">Số ngày đặt</th>
                        <th style="width: 10%">Tổng tiền</th>
                        <th style="width: 10%">Mã xe</th>
                        <th style="width: 10%">Mã người dùng</th>
                        <th style="width: 8%">Thêm</th>
                        <th style="width: 8%">Sửa</th>
                        <th style="width: 8%">Xóa</th>
                    </tr>
                </thead>
            </table>
            <?php 
                $conn = mysqli_connect("localhost", "root", "123456", "duAn1"); 
                $select1= "SELECT * FROM order_cars";
                $result1= mysqli_query($conn,$select1);
                while($row1 = mysqli_fetch_array($result1)){
            ?>
        <form method="post" action="manager_car3.php" class="list_flight">
            <input type="text"  name="order_car" value="<?php echo $row1['order_car'];?>" style="width: 6%">
            <input type="text"  name="order_company" value="<?php echo $row1['order_company'];?>" style="width: 6%">
            <input type="text"  name="order_quantitySeat" value="<?php echo $row1['order_quantitySeat'];?>" style="width: 5%">
            <input type="text"  name="order_carColor" value="<?php echo $row1['order_carColor'];?>" style="width: 5%">
            <input type="text"  name="order_day_book" value="<?php echo $row1['order_day_book'];?>" style="width: 10%">
            <input type="text"  name="order_day_quantity" value="<?php echo $row1['order_day_quantity'];?>" style="width:10%">
            <input type="text"  name="order_total_money" value="<?php echo $row1['order_total_money'];?>" style="width: 10%">
            <input type="text"  name="code_car" value="<?php echo $row1['code_car'];?>" style="width: 10%">
            <input type="text"  name="user_id" value="<?php echo $row1['user_id'];?>" style="width: 10%">
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
