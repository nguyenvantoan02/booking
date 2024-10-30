<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/hotel.css">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .hotels_book{
            padding: 5px 14px;
            background-color: #0094f3;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
        }

        /** */
        .hotel_view {
            width: 90%;
            height: 100vh;
            margin: 40px auto 120px auto;
        }
        .hotel_view_box{
            width: 100%;
            height: 300px;
            margin-top: 25px;
        }
        .hotel_view_title {
            background-image: linear-gradient(to right, rgb(53, 53, 245),rgb(151, 151, 237));
            height: 10%;
            display:flex;
            align-items: center;
            font-size: 14px;
            color: #fff;
            font-weight: 400;
            padding-left: 20px;
            border-top-right-radius: 20px;
            
        }
        .hotel_view_contents {
            height: 90%;
            width: 100%;
            display: flex;
            box-shadow: 0 0 1px #333;
        }
        .hotel_view_img {
            width: 25%;
            height: 80%;
        }
        .hotel_view_tt {
            /* background-color: purple; */
            width: 45%;
            height: 100%;
        }
        .hotel_view_price {
            width: 30%;
            height: 100%;
        }
        .hotel_view_img_list{
            height: 22%;
            display: flex;
        }
        .hotel_view_img_list .hotel_view_img_child1,.hotel_view_img_child2,.hotel_view_img_child3,.hotel_view_img_child4{
            width: 30%;
            height: 100%;
            background-color: red;
            list-style-type: none;
            margin: 0 2px;
            position: relative;
        }
        .img_child1,.img_child2,.img_child3,.img_child4{
            width: 100%;
            height: 100%;
            
        }
        .img_child1_hover {
            width: 342px;
            height: 220px;
            position: absolute;
            top: -219px;
            left: -2px;
            display: none;
        }
        .img_child2_hover{
            width: 342px;
            height: 220px;
            position: absolute;
            top: -219px;
            left: -88px;
            display: none;
        }
        .img_child3_hover{
            width: 342px;
            height: 220px;
            position: absolute;
            top: -219px;
            left: -173px;
            display: none;
        }
        .img_child4_hover{
            width: 342px;
            height: 220px;
            position: absolute;
            top: -219px;
            left: -258px;
            display: none;
        }
        .hotel_view_img_child1:hover .img_child1_hover{
            display: block;
        }
        .hotel_view_img_child2:hover .img_child2_hover{
            display: block;
        }
        .hotel_view_img_child3:hover .img_child3_hover{
            display: block;
        }
        .hotel_view_img_child4:hover .img_child4_hover{
            display: block;
        }
        /** */
        .hotel_view_tt {

        }
        .view_tt_name {
            margin: 40px 0 10px 25px;
        }
        .view_tt_star {
            margin: 10px 0 50px 25px;
            font-size: 12px;
            color: yellow;
        }
        .view_tt_address {
            margin: 30px 0 20px 25px;
        }
        .view_tt_tt {
            margin: 10px 0 20px 25px;
            width: 82%;
        }
        /** */
        .hotel_view_price {
            text-align: start;
        }
        .view_price_old {
            margin-top: 100px;
            text-decoration: line-through;
        }
        .view_price_new {
            margin: 8px 0 20px 0;
        }
        .view_price_book {
            padding: 6px 14px;
            background-color: #0094f3;
            color: #fff;
        }
        .hotel_view{
           
        }



    </style>
</head>
<body>
    <div class="hotel_main">
        <div class="hotel_lienKet">
            <div class="chua_dieuHuong">
                <a class="chua_dieuHuong1" href="../../home.php">Booking.com</a>
                <a class="chua_dieuHuong2" href="hotel3.php">Lịch sử đặt phòng của tôi</a>
            </div>
            <div class="hotel_chua_lienKet">
                <a class="hotel_chua_lienKet1" href="https://www.agoda.com/vi-vn/packages?cid=1759952&tag=f97c6107-1b4c-7521-4c28-7867db0548ad&msclkid=eff0ca4eebc415f378a9ac44eb3d709f&ds=OS1hkERsOCrAswpO">Trải nhiệm cùng 
                    <img src="https://tse2.mm.bing.net/th?id=OIP.gUry1vX4OW1BH3q1rEL04gHaE7&pid=Api&P=0&h=180" alt="" width="41px" height="35px" class="hotel_img_lienKet">
                </a>
                <a class="hotel_chua_lienKet2" href="https://www.traveloka.com/vi-vn/hotel">Trải nhiệm cùng 
                     <img src="https://tse4.mm.bing.net/th?id=OIP.OA1_q0AQxHJo0SlxC_8noAHaHa&pid=Api&P=0&h=180" alt="" width="40px" height="35px" class="hotel_img_lienKet">
                </a>
            </div>
        </div>
        <div class="hotel_contents">
            <h1>Tìm khách sạn tốt có kì nghỉ tốt</h1>
            <h3>Đặt khách sạn</h3>

        </div>
        <form action="hotel.php" method="post">
            <select name="hotel_address" class="hotel_address">
                <option value="Đà nẵng">Đà nẵng</option>
                <option value="Huế">Huế</option>
                <option value="Vũng tàu">Vũng tàu</option>
                <option value="Hà nội">Hà nội</option>
                <option value="Đà lạt">Đà lạt</option>
                <option value="Hồ chí minh">Hồ chí minh</option>
                <option value="Hội an">Hội an</option>
            </select>
            <select name="hotel_persons" class="hotel_persons">
                <option value="Phòng 1 người">Phòng 1 người</option>
                <option value="Phòng 2 người">Phòng 2 người</option>
                <option value="Phòng 3 người">Phòng 3 người</option>
                <option value="Phòng 4 người">Phòng 4 người</option>
                <option value="Phòng 5 người">Phòng 5 người</option>
                <option value="Phòng 6 người">Phòng 6 người</option>
            </select>
            <select name="hotel_rooms" class="hotel_rooms">
                <option value="1 phòng">1 phòng</option>
                <option value="2 phòng">2 phòng</option>
                <option value="3 phòng">3 phòng</option>
                <option value="4 phòng">4 phòng</option>
                <option value="5 phòng">5 phòng</option>
                <option value="6 phòng">6 phòng</option>
            </select>
            <div class="hotel_day_book">
                <label for="day_book">Ngày đặt</label>
                <input type="date" name="day_book" id="day_book">
            </div>
            <div class="hotel_day_quantity">
                <label for="day_quantity">Số ngày thuê</label>
                <input type="text" name="day_quantity" id="day_quantity" placeholder="0">
            </div>

            <input type="submit" value="Tìm khách sạn" class="hotel_submit">
        </form>


        <div class="hotel_view">
        <?php 
             $conn = mysqli_connect("localhost", "root", "123456", "duAn1");

            if (isset($_POST['hotel_address']) && isset($_POST['hotel_persons']) && isset($_POST['hotel_rooms']) && !empty($_POST['day_book'])  && !empty($_POST['day_quantity'])) {
                $hotel_address = $_POST['hotel_address'];
                $hotel_persons = $_POST['hotel_persons'];
                $hotel_rooms = $_POST['hotel_rooms'];
                $day_book = $_POST['day_book'];
                $day_quantity = $_POST['day_quantity'];
                //
                $select = "SELECT * FROM hotels WHERE hotelAddress ='$hotel_address' AND quantityPerson ='$hotel_persons' AND quantityRoom ='$hotel_rooms'";
                $result = mysqli_query($conn,$select);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_array($result )){
        ?>
            <div class="hotel_view_box" style="margin: 30px 0;">
                <h3 class="hotel_view_title">
                    Nơi này có đánh giá tổng thể tốt nhất do khách hàng bình chọn trong hạng mục này.
                </h3>
                <div class="hotel_view_contents">
                    <div class="hotel_view_img">
                        <img src="<?php echo $row['link']?>" alt="" width="100%" height="100%">
                        <ul class="hotel_view_img_list">
                            <li class="hotel_view_img_child1">
                                <img src="https://tse4.mm.bing.net/th?id=OIP.L_S7f0fZcM4U38P_CeboXwHaEW&pid=Api&P=0&h=180" alt="" class="img_child1">
                                <img src="https://tse4.mm.bing.net/th?id=OIP.L_S7f0fZcM4U38P_CeboXwHaEW&pid=Api&P=0&h=180" alt="" class="img_child1_hover">
                            </li>
                            <li class="hotel_view_img_child2">
                                <img src="https://tse1.mm.bing.net/th?id=OIP._JwxL8ZvC3y3ST_ysTT57AHaE7&pid=Api&P=0&h=180" alt="" class="img_child2">
                                <img src="https://tse1.mm.bing.net/th?id=OIP._JwxL8ZvC3y3ST_ysTT57AHaE7&pid=Api&P=0&h=180" alt="" class="img_child2_hover">
                            </li>
                            <li class="hotel_view_img_child3">
                                <img src="https://tse4.mm.bing.net/th?id=OIP.R0kKTynhRDJ4L1Li_NEZ5QHaD3&pid=Api&P=0&h=180" alt="" class="img_child3">
                                <img src="https://tse4.mm.bing.net/th?id=OIP.R0kKTynhRDJ4L1Li_NEZ5QHaD3&pid=Api&P=0&h=180" alt="" class="img_child3_hover">
                            </li>
                            <li class="hotel_view_img_child4">
                                <img src="https://tse2.mm.bing.net/th?id=OIP.S9qvG4qRYGjeKeGK2Ub1zwHaE8&pid=Api&P=0&h=180" alt="" class="img_child4">
                                <img src="https://tse2.mm.bing.net/th?id=OIP.S9qvG4qRYGjeKeGK2Ub1zwHaE8&pid=Api&P=0&h=180" alt="" class="img_child4_hover">
                            </li>
                        </ul>
                    </div>
                    <div class="hotel_view_tt">
                        <h2 class="view_tt_name">
                            <?php echo $row['hotel_name'] ?>
                        </h2>
                        <p class="view_tt_star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </p>
                        <a href="" class="view_tt_address">
                            <?php echo $row['addresss'] ?>
                        </a>
                        <p class="view_tt_tt">
                            <?php echo $row['information'] ?>
                        </p>
                    </div>
                    <div class="hotel_view_price">
                        <p class="view_price_old">800.000đ</p>
                        <p class="view_price_new"><?php echo $row['hotel_price'] ?></p>
                        <a href="hotel2.php?hotelAddress=<?php echo $row['hotelAddress']?>&hotel_name=<?php echo $row['hotel_name']?>&quantityPerson=<?php echo $row['quantityPerson']?>&quantityRoom=<?php echo $row['quantityRoom']?>&hotel_price=<?php echo $row['hotel_price']?>&code_hotel=<?php echo $row['code_hotel']?>&day_book=<?php echo $_POST['day_book']?>&day_quantity=<?php echo $_POST['day_quantity']?>" class="hotels_book">Đặt phòng</a>
                    </div>
                </div>
                <?php }}else{
                    echo "<h4 style='text-align:center;transform:translate(950px,-321px); font-size: 14px; background-color: #0094f3;width:412px; padding: 9px 6px; color: #fff'>Không tìm thấy khách sạn</h4>";
                }}?>
            </div>
        </div>
        
        
    </div>
    <script>
        // Lấy thời gian hiện tại
        // var now = new Date();
        // Chuyển thời gian hiện tại thành chuỗi định dạng ISO để sử dụng cho thuộc tính min của input datetime-local
        // var minDatetime = now.toISOString().slice(0,16);
        // document.getElementById("time_start").setAttribute("min", minDatetime);
        // document.getElementById("time_end").setAttribute("min", minDatetime);
        var now = new Date();
        var minDate = now.getFullYear() + '-' + ('0' + (now.getMonth() + 1)).slice(-2) + '-' + ('0' + now.getDate()).slice(-2);
        document.getElementById("day_book").min = minDate;


    </script>

</body>
</html>