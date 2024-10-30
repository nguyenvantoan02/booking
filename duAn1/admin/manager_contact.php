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
        body{
            background-color:#333;
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
            background-color: #fff;
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
            font-size: 14px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 10px 0;
        }

        form{
            width: 85%;
            display: flex;
            align: center;
            margin: 4px auto;
            padding: 10px 0;
            background-color: #fff;
            
        }
        .chua{
            background-color:#333;
            height: 100vh;

        }
        #kt,#kt1{
            padding: 6px 0;
            border: none;
            max-width: 110px;
            cursor: pointer;
            margin-left: 8px;
            
        }
        #kt:hover{
            opacity: 0.8;
            
        }
        #kt1:hover{
            opacity: 0.8;
        }

        #kt{
            background-color: #51b351;
            font-size: 15px;
            color: #fff;
            font-weight: 500;
            margin-left: 17px;
        }
        #kt1{
            background-color: red;
            font-size: 15px;
            color: #fff;
            font-weight: 500;
            margin-left: 28px;
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
            width: 85%;
            margin: 0 auto;
            
        }
        th{
            padding: 14px 0;
            background-color: #fff;
            font-size:13px;
            text-transform: uppercase;

        }

    </style>
</head>
<body>
    <header class="header_manager_flight">
        <a href="admin.php" class="admin_main"><i class="fa-solid fa-user-tie">Admin</i></a>
    </header> 
    </div>
    <div id="flight" class="page">
        <h3>Danh sách thông báo</h3>
        <table border=1 style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="width: 10%">Mã liên hệ</th>
                    <th style="width: 10%">Mã người dùng</th>
                    <th style="width: 20%">Email</th>
                    <th style="width: 10%">Số điện thoại</th>
                    <th style="width: 20%">Nội dung</th>
                    <th style="width: 10%">Phản hồi</th>
                    <th style="width: 10%">Xóa</th>
                </tr>
            </thead>
        </table>
        <div class="chua">
            <?php
                $conn = mysqli_connect("localhost", "root", "123456", "duAn1"); 
                $select= "SELECT * FROM contact";
                $result= mysqli_query($conn,$select);
                while($row = mysqli_fetch_array($result)){
            ?>
            <form method="post" action="manager_contact2.php" class="list_flight">
                <input type="text" name="code_contact" id="" style="width: 11%" value="<?php echo $row['code_contact'] ?>">
                <input type="text" name="user_id" id="" style="width: 11%" value="<?php echo $row['user_id'] ?>">
                <input type="text" name="email" id="" style="width: 22%" value="<?php echo $row['email'] ?>">
                <input type="text" name="number_phone" id="" style="width: 12%" value="<?php echo $row['number_phone'] ?>">
                <input type="text" name="content" id="" style="width: 22%" value="<?php echo $row['content'] ?>">
            
                <input type="submit" value="Feedback" name="Feedback"  style="width: 10%" id="kt">
                <input type="submit" value="Delete" name="Delete"  style="width: 10%" id="kt1">
            </form>

            <?php }?>
        </div>
    </div>

    
</body>
</html>
