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
            min-width: 100px;
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
            margin-left: 5px;
        }
        #kt2{
            background-color: #eb3232;
            font-size: 14px;
            color: #fff;
            font-weight: 500;
            margin-left: 5px;

        }
        .kt, .kt1, .kt2 {
            min-width: 88.5px !important;
            max-width: 88.5px;
            /* margin-left: 11px; */
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
            padding-top: 40px;
        }
        table{
            width: 90%;
            margin: 0 auto;
        }
        th{
            padding: 10px 0;
            background-color: #fff;
            text-transform: uppercase;
            font-size: 13px;
        }

    </style>
</head>
<body>
    <header class="header_manager_flight">
        <a href="admin.php" class="admin_main"><i class="fa-solid fa-user-tie">Admin</i></a>
        <button onclick="showPage('flight')">Quản lí chuyến bay</button>
        <button onclick="showPage('order_flight')">Quản lí chuyến bay đã mua</button>

    </header>
    
    </div>
    <div id="flight" class="page">
        <h3>Danh sách chuyến bay</h3>
        <table border=1 style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="width: 10%">Mã chuyến bay</th>
                    <th style="width: 10%">Hãng bay</th>
                    <th style="width: 10%">Nơi đi</th>
                    <th style="width: 11%">Nơi đến</th>
                    <th style="width: 11%">Chiều bay</th>
                    <th style="width: 11%">Ngày bay</th>
                    <th style="width: 11%">Giá</th>
                    <th style="width: 8%">Thêm</th>
                    <th style="width: 8%">Sửa</th>
                    <th style="width: 8%">Xóa</th>
                </tr>
            </thead>
        </table>
        <?php
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1"); 
            $select= "SELECT * FROM airline_tickets";
            $result= mysqli_query($conn,$select);
            while($row = mysqli_fetch_array($result)){
        ?>
        <form method="post" action="manager_flight2.php" class="list_flight">
            <input type="text"  name="flight_code" value="<?php echo $row['flight_code'];?>" style="width: 10%">
            <input type="text"  name="airline" value="<?php echo $row['airline'];?>" style="width: 10%">
            <input type="text"  name="departure" value="<?php echo $row['departure'];?>" style="width: 10%">
            <input type="text"  name="anvil_place" value="<?php echo $row['anvil_place'];?>" style="width: 11%">
            <input type="text"  name="ticketType" value="<?php echo $row['ticketType'];?>" style="width: 11%">
            <input type="text"  name="flight_day" value="<?php echo $row['flight_day'];?>" style="width:11%">
            <input type="text"  name="flight_price" value="<?php echo $row['flight_price'];?>" style="width: 10.8%">
            <input type="submit" value="Add" name="Add" id="kt">
            <input type="submit" value="Update" name="Update" id="kt1">
            <input type="submit" value="Delete" name="Delete" id="kt2">
        </form>
        <?php }?>
    </div>

    <div id="order_flight" class="page">
    <h3>Danh sách chuyến bay đã mua</h3>
    <table border=1 style="border-collapse: collapse; font-size: 14px;">
            <thead>
                <tr>
                    <th style="width: 5%">Mã mua</th>
                    <th style="width: 10%">Hãng mua</th>
                    <th style="width: 10%">Chiều mua</th>
                    <th style="width: 10%">Nơi đi</th>
                    <th style="width: 10%">Nơi đến</th>
                    <th style="width: 10%">Ngày bay</th>
                    <th style="width: 6%">Mã chuyến bay</th>
                    <th style="width: 6%">Mã người dùng</th>
                    <th style="width: 10%">Giá</th>
                    <th style="width: 7%">Thêm</th>
                    <th style="width: 7%">Sửa</th>
                    <th style="width: 7%">Xóa</th>

                </tr>
            </thead>
        </table>
            <?php 
                $conn = mysqli_connect("localhost", "root", "123456", "duAn1"); 
                $select1= "SELECT * FROM flight_orders";
                $result1= mysqli_query($conn,$select1);
                while($row1 = mysqli_fetch_array($result1)){
            ?>   
        <form method="post" action="manager_flight3.php" class="list_flight">
            <input type="text"  name="order_id" value="<?php echo $row1['order_id'];?>" style="width: 5%">
            <input type="text"  name="order_airline" value="<?php echo $row1['order_airline'];?>" style="width: 10%">
            <input type="text"  name="order_ticketType" value="<?php echo $row1['order_ticketType'];?>" style="width: 9.5%">
            <input type="text"  name="order_departure" value="<?php echo $row1['order_departure'];?>" style="width: 10%">
            <input type="text"  name="order_anvil_place" value="<?php echo $row1['order_anvil_place'];?>" style="width: 10%">
            <input type="text"  name="order_flight_day" value="<?php echo $row1['order_flight_day'];?>" style="width:10%">
            <input type="text"  name="flight_code" value="<?php echo $row1['flight_code'];?>" style="width: 6.4%">
            <input type="text"  name="user_id" value="<?php echo $row1['user_id'];?>" style="width: 5%">
            <input type="text"  name="order_price" value="<?php echo $row1['order_price'];?>" style="width: 10%">
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
