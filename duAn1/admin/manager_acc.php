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
        .active {
            display: block;
        }
        .page{
            background-color: #333;
            height: 100vh;
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
            text-align: center;
        }

        
        form{
            width: 80%;
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
            margin-left: 15px;

        }
        #kt1{
            background-color: #488ddc;
            font-size: 15px;
            color: #fff;
            font-weight: 500;
            margin-left: 20px;
        }
        #kt2{
            background-color: #eb3232;
            font-size: 14px;
            color: #fff;
            font-weight: 500;
            margin-left: 20px;
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
            width: 80%;
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

    </header>
    
    </div>
    <div id="flight" class="page">
        <h3>Danh sách tài khoản người dùng</h3>
        <table border=1 style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="width: 10%">Mã người dùng</th>
                    <th style="width: 30%">Email</th>
                    <th style="width: 20%">Mật khẩu</th>
                    <th style="width: 9%">Thêm</th>
                    <th style="width: 9%">Sửa</th>
                    <th style="width: 9%">Xóa</th>
                </tr>
            </thead>
        </table>
        <?php
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1"); 
            $select= "SELECT * FROM register_login";
            $result= mysqli_query($conn,$select);
            while($row = mysqli_fetch_array($result)){
        ?>
        <form method="post" action="manager_acc2.php" class="list_flight">
            <input type="text"  name="user_id" value="<?php echo $row['user_id'];?>" style="width: 12%">
            <input type="text"  name="email" value="<?php echo $row['email'];?>" style="width: 32%">
            <input type="text"  name="pass" value="<?php echo $row['pass'];?>" style="width: 24%">
            <input type="submit" value="Add" name="Add"  style="width: 9%" id="kt">
            <input type="submit" value="Update" name="Update"  style="width: 9%" id="kt1">
            <input type="submit" value="Delete" name="Delete"  style="width: 9%" id="kt2">
        </form>
        <?php }?>
    </div>

    
</body>
</html>
