<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/flight.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="flight">
        <div class="flight_title">
            <a href="../../home.php" class="flight_title1">Booking.com</a>
            <a href="flight3.php" style="margin-right: 50px"  class="flight_title2">Lịch sử đặt chuyến của tôi</a>
        </div>
        <form action="flight.php" method="post" class="flight_main">
            <fieldset style="margin-bottom: 10px">
                <input type="radio" name="airline" id="vietnam_airlines" value="vietnam_airlines">
                <label for="vietnam_airlines" style="color: #1c89d8">
                    <img src="https://ibrand.vn/wp-content/uploads/2022/10/NDTH-Vietnam-Airlines-1.png" alt="" width="48px" height="42px" class="img_airline">
                    vietnam airlines
                </label>
                <input type="radio" name="airline" id="vietjet" value="vietjet" style="margin-left: 25px">
                <label for="vietjet" style="color: #ee1d23">
                    <img src="https://brasol.vn/wp-content/uploads/2022/08/logo-vietjet-air.jpg" alt="" width="48px" height="42px" class="img_airline">
                    vietjet
                </label>
                <input type="radio" name="airline" id="bamboo_airway" value="bamboo_airway" style="margin-left: 25px">
                <label for="bamboo_airway" style="color: #41ad53">
                    <img src="https://inkythuatso.com/uploads/images/2021/09/logo-bamboo-airways-inkythuatso-13-16-26-24.jpg" alt="" width="48px" height="42px" class="img_airline" style="box-shadow:0 0 1px #000">
                    bamboo airway
                </label><br>
            </fieldset>
            <fieldset>
                <input type="radio" name="ticketType" id="one-way" value="one-way">
                <label for="one-way">Một chiều</label>
                <input type="radio" name="ticketType" id="round-trip" value="round-trip" style="margin-left: 24px">
                <label for="round-trip">Khứ hồi</label>
                <input type="radio" name="ticketType" id="Multi-City" value="Multi-City" style="margin-left: 24px">
                <label for="Multi-City">Multi-City</label><br>
            </fieldset>
            <div class="flight_day">
                <label for="" class="flight_day_label">Ngày bay</label>
                <input type="date" name="order_flight_day" id="flight_day" class="flight_day_select">
            </div>
            <div class="flight_box">
                <div class="flight_away">
                    <label for="go">Đi</label><br>
                    <input type="text" name="go" id="go" placeholder="Chọn nơi đi...">
                    <i class="fa-solid fa-arrow-right-arrow-left chuyenBay_mt"></i><br>
                </div>
                <div class="flight_to">
                    <label for="to">Đến</label><br>
                    <input type="text" name="to" id="to" placeholder="Chọn nơi đến...">
                </div>
                <input type="submit" value="Tìm chuyến bay" class="chuyenBay_Search">

            </div>   
        </form>
        <!--//PHP//-->
        <?php
        //
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1");

            //
            if (isset($_POST['airline']) && isset($_POST['ticketType']) && isset($_POST['go']) && isset($_POST['to'])  && !empty($_POST['order_flight_day'])) {
                $airline = $_POST['airline'];
                $ticketType = $_POST['ticketType'];
                $go = $_POST['go'];
                $to = $_POST['to'];
                $order_flight_day = $_POST['order_flight_day'];
                //
                $select = "SELECT * FROM airline_tickets WHERE departure = '$go' AND anvil_place = '$to' AND ticketType = '$ticketType' AND airline = '$airline' AND flight_day = '$order_flight_day'";
                $result = mysqli_query($conn, $select);;
                // 
                if (mysqli_num_rows($result) > 0){
                
        ?>
        <table border=1>
            <tr>
                <th style="width: 10%">Mã chuyến</th>
                <th style="width: 15%">Tên Hãng</th>
                <th style="width: 15%">Chiều</th>
                <th style="width: 10%">Nơi đi</th>
                <th style="width: 10%">Nơi đến</th>
                <th style="width: 10%">Giá vé</th>
                <th style="width: 10%">Ngày bay</th>
                <th style="width: 20%">Trạng thái</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result)){
            ?>            
            <tr>
                <td>vn000<?php echo $row['flight_code']?></td>
                <td><?php echo $row['airline'] ?></td>
                <td><?php echo $row['ticketType'] ?></td>
                <td><?php echo $row['departure'] ?></td>
                <td><?php echo $row['anvil_place'] ?></td>
                <td><?php echo $row['flight_price'] ?></td>
                <td><?php echo $row['flight_day'] ?></td>
                <td style= "text-align: center">
                    <a href="flight2.php?flight_code=<?php echo $row['flight_code']?>&airline=<?php echo $row['airline']?>&ticketType=<?php echo $row['ticketType']?>&departure=<?php echo $row['departure']?>&anvil_place=<?php echo $row['anvil_place']?>&flight_day=<?php echo $row['flight_day']?>&flight_price=<?php echo $row['flight_price'] ?>" class="book">Đặt chuyến</a>
                </td>
            </tr>

            <?php  }}else{ ?>
        </table>
            <h2 style="text-align: center; font-size: 16px; color: #0094f3; padding: 6px; background-color: #fff"><?php echo "Không tìm thấy chuyến bay"?></h2>
            <?php }}?>
    </div>

    <script>
        var now = new Date();
        var minDate = now.getFullYear() + '-' + ('0' + (now.getMonth() + 1)).slice(-2) + '-' + ('0' + now.getDate()).slice(-2);
        document.getElementById("flight_day").min = minDate;
    </script>
</body>
</html>
