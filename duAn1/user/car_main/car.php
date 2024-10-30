<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/car.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Document</title>

</head>
<body>
    <div class="car_main">
        <header class="car_header">
            <div class="car_label">
                <a href="../../home.php">Booking.com</a>
                <a style="font-size: 14px">Cars</a>
            </div>
            <a href="car3.php" class="car_label2">Lịch sử đặt xe của tôi</a>

        </header>
        <h2 style="margin-top: 140px;margin-left: 185px; color:#0094f3;">khám phá những tính năng chưa từng có</h2>
        <div class="car_contents">
            <form action="" method="post" class="contents_information">
                <fieldset class="car_company_main">
                    <input type="radio" name="car_company" id="" value="Vinfast">
                    <label for="" class="car_company">Vinfast</label>
                    <input type="radio" name="car_company" id="" value="Bmw">
                    <label for="" class="car_company">Bmw</label>
                    <input type="radio" name="car_company" id="" value="Toyota">
                    <label for="" class="car_company">Toyota</label>
                    <input type="radio" name="car_company" id="" value="Ford">
                    <label for="" class="car_company">Ford</label>
                </fieldset>
                <fieldset class="car_seats">
                    <input type="radio" name="seat" id="" value="4">
                    <label for="" class="seat">4 chỗ</label>
                    <input type="radio" name="seat" id="" value="5">
                    <label for="" class="seat">5 chỗ</label>
                    <input type="radio" name="seat" id="" value="7">
                    <label for="" class="seat">7 chỗ</label>
                </fieldset>
                <fieldset class="car_color">
                    <input type="radio" name="color" id="" value="Màu đen">
                    <label for="" class="color">Màu đen</label>
                    <input type="radio" name="color" id="" value="Màu trắng">
                    <label for="" class="color">Màu trắng</label>
                    <input type="radio" name="color" id="" value="Màu đỏ">
                    <label for="" class="color">Màu đỏ</label>
                </fieldset>
                <div class="day">
                    <div class="day_start">
                        <label for="">Ngày đặt</label>
                        <input type="date" name="car_day_book" id="car_day_book">
                    </div>
                    <div class="car_day_quantity">
                        <label for="day_quantity">Số ngày thuê xe</label>
                        <input type="text" name="day_quantity" id="day_quantity">
                    </div>
                </div>
                <input type="submit" value="Tìm kiếm" class="car_search">
            </form>
            <div class="car_img">
                <div class="img_main">
                    <img src="https://cdn.xanhsm.com/2023/08/e06ad60c-home-service-taxi.jpg" alt="" class="img_big">
                </div>
                <ul class="car_img_list">
                    <li class="list_img1">
                        <img src="https://cdn.xanhsm.com/2023/03/8d5a413b-vf-8.jpeg" alt="" class="img1">
                        <img src="https://cdn.xanhsm.com/2023/03/8d5a413b-vf-8.jpeg" alt="" class="img1_hover">
                    </li>
                    <li class="list_img2">
                        <img src="http://www.automobilesreview.com/gallery/2012-ford-ranger/2012-ford-ranger-01.jpg" alt="" class="img2">
                        <img src="http://www.automobilesreview.com/gallery/2012-ford-ranger/2012-ford-ranger-01.jpg" alt="" class="img2_hover">
                    </li>
                    <li class="list_img3">
                        <img src="http://2.bp.blogspot.com/-OfZPgiUjl5s/TdhWfwhq2LI/AAAAAAAACjE/6lzVRRObME4/s1600/Toyota+cars+wallpaper.jpg" alt="" class="img3">
                        <img src="http://2.bp.blogspot.com/-OfZPgiUjl5s/TdhWfwhq2LI/AAAAAAAACjE/6lzVRRObME4/s1600/Toyota+cars+wallpaper.jpg" alt="" class="img3_hover">
                    </li>
                    <li class="list_img4">
                        <img src="https://images.summitmedia-digital.com/topgear/images/2021/07/07/2022-bmw-2-series-coupe-14-1625622364.jpg" alt="" class="img4">
                        <img src="https://images.summitmedia-digital.com/topgear/images/2021/07/07/2022-bmw-2-series-coupe-14-1625622364.jpg" alt="" class="img4_hover">

                    </li>
                </ul>
        
            </div>
        </div>

        <div class="car_ticket">
        <?php 
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
            if (isset($_POST['car_company']) && isset($_POST['seat']) && isset($_POST['color']) && !empty($_POST['car_day_book'])&& !empty($_POST['day_quantity'])) {
                $car_company = $_POST['car_company'];
                $seat = $_POST['seat'];
                $color = $_POST['color'];
                $car_day_book = $_POST['car_day_book'];
                $day_quantity = $_POST['day_quantity'];
                //
                $select = "SELECT * FROM cars WHERE car_company= '$car_company' AND quantitySeat= '$seat' AND  carColor= '$color'";
                $result = mysqli_query($conn,$select);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
        ?>

            <div class="ticket_box" style="margin: 30px 0;">
                <div class="ticket_img">
                    <img src="<?php echo $row['link'] ?>" alt="">
                </div>
                <div class="ticket_information">
                    <p class="ticket_name">ELECTRIC car <?php echo $row['car_company'] ; ?></p>
                    <p class="ticket_star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </p>
                    <div class="main_seat_color_code">
                        <span class="ticket_seats">
                            <?php echo $row['quantitySeat']; ?> chỗ/
                        </span>
                        <span class="ticket_color">
                            <?php echo $row['carColor']; ?>
                        </span>
                        <span class="ticket_code">
                            /000<?php echo $row['code_car']; ?>
                        </span>

                    </div>
                    <p class="ticket_infor"><?php echo $row['information']; ?></p>
                </div>
                <div class="ticket_price">
                    <p class="price_old">8.900.000vnđ</p>
                    <p class="price_new"><?php echo $row['car_price'] ; ?>vnđ</p>
                    <a href="car2.php?code_car=<?php echo $row['code_car']?>&car_price=<?php echo $row['car_price']?>&car_company=<?php echo $row['car_company']?>&quantitySeat=<?php echo $row['quantitySeat']?>&carColor=<?php echo $row['carColor']?>&car_day_book=<?php echo $car_day_book?>&day_quantity=<?php echo $day_quantity?>" class="car_rental">Thuê xe</a>
                </div>

            </div>
            <?php }}else{
                 echo "<h4 style='text-align:center;transform:translate(950px,-547px); font-size: 14px; background-color: #0094f3;width: 412px; padding: 9px 6px; color: #fff'>Không còn xe, hiện tại số lượng xe đã được đặt hết</h4>";
            }} ?>
        </div>
         

        

    </div>

    <script>
        var now = new Date();
        var minDate = now.getFullYear() + '-' + ('0' + (now.getMonth() + 1)).slice(-2) + '-' + ('0' + now.getDate()).slice(-2);
        document.getElementById("car_day_book").min = minDate;

    </script>
    
</body>
</html>