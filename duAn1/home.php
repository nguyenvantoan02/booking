<?php 
    session_start();
    function check_send(){

        $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
        if(isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['contents'])){
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $contents = $_POST['contents'];
            $user_id = $_SESSION['user_id'];
            if(substr($email, -4) == ".com" && strlen($tel) >= 10 && substr($tel, 0 , 1) == "0" && strlen($contents) >= 2){
                $query_add_contact = "INSERT INTO contact(email, number_phone, content, user_id) VALUES('$email', '$tel', '$contents', '$user_id')";
                $result_add_contact = mysqli_query($conn, $query_add_contact);
                echo "<script> 
                        alert('Gửi thông tin thành công');
                    </script>";
            }else{
                echo "<script> 
                        alert('Email hoặc số điện thoại không đúng');

                    </script>";
            }
?>
<?php
        }
    }
check_send();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING TOUR</title>
    <link rel="stylesheet" href="assets/main.css">
    <link rel="stylesheet" href="user/assets/beach.css">
    <link rel="stylesheet" href="user/assets/address.css">
    <link rel="stylesheet" href="user/assets/city.css">
    <link rel="stylesheet" href="user/assets/contact.css">
    <link rel="stylesheet" href="user/assets/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="icon" type="image/x-icon"
        href="https://img.lovepik.com/free-png/20211129/lovepik-creative-three-dimensional-civil-aircraft-icon-png-image_401200451_wh1200.png">
    <!-- <link rel="stylesheet" href="./js.js"> -->
</head>

<body>
    <div id="mains">
        <!-- header -->
        <header id="header">
            <h1>BOOKING.COM</h1>
                <ul class="plan">
                    <span class="chuyenbay">
                        <i class="fa-solid fa-plane"></i>
                        <a href="./user/flight_main/flight.php" class="nav"><li >Chuyến Bay</li></a>
                    </span>
                    <span class="hotel">
                        <i class="fa-solid fa-house-user"></i>
                        <a href="./user/hotel_main/hotel.php" class="nav"><li>Khách Sạn</li></a>
                    </span>
                    <span class="car">
                        <i class="fa-solid fa-car"></i>
                        <a href="./user/car_main/car.php" class="nav"><li>Thuê Xe</li></a>
                    </span>
                  
                </ul>
            <div class="header_img">
                <i class="fa-solid fa-user" style="color:#333"></i>
                <div class="bridge"></div>
                <div class="header_img_chua">
                    <a href="admin/dangNhap_admin.php" class="admin">Trang Admin</a>
                    <a href="user/dangNhap.php" class="logout"><i class="fa-solid fa-arrow-right-from-bracket" style="margin-right: 4px"></i>Đăng xuất</a>
                </div>
            </div>
        </header>
        <!-- nd -->
        <div class="nd">
            <h1>Tìm chỗ nghỉ tiếp theo</h1>
            <h4>Tìm ưu đãi khách sạn, chỗ nghỉ dạng nhà và nhiều hơn nữa...</h4>
        </div>
        <!-- slider -->
        <div class="slider-show">
            <div class="list-imgs">
                <img src="https://toquoc.mediacdn.vn/280518851207290880/2022/10/24/photo-1666605209337-1666605209433251738388.jpg" alt="" class="img_slide">
                <img src="https://cdnmedia.baotintuc.vn/Upload/XjfgEPYM30O8z6jY3MHxSw/files/2019/10/310/Anh%201_Cau%20Vang%20-%20Sun%20World%20Ba%20Na%20Hills.jpg" alt="" class="">
                <img src="https://sodulich.hanoi.gov.vn/storage/z3526392176033575aab3c103c2245e2350aee991cd064.jpg" alt="" class="">
                <img src="https://cdn.thoibaonganhang.vn/stores/news_dataimages/canhnq/042023/13/20/1419_du-lich-ninh-binh-721.jpg" alt="" class="">
            </div>
            <!-- <span class="left">
                <i class="fa-solid fa-chevron-left"></i>
            </span>
            <span class="right">
                <i class="fa-solid fa-chevron-right"></i>
            </span> -->
        </div>
        <!--search-->
        <form action="" class="timKiem_main">
            <img src="" alt="" class="mayBay">
            <input type="search" name="noiDung" id="" class="timKiem_main_child1" placeholder="Nhập nơi bạn muốn đến ...">
            <input type="submit" value="Tìm Kiếm" class="timKiem_main_child2">
        </form>
        <!--Điểm đến thịnh hành-->
        <main class="address_hot">
            <h3>Điểm đến thịnh hành</h3>
            <p class="gt">Lựa chọn phổ biến nhất dành cho du khách đến từ Việt Nam</p>
            <div class="list_address_hot">
                <a href="" style="width: 50%;">
                    <img src="./img_address/da-nang_etvf.jpg" alt="ảnh" width="100%" height="100%" class="anh">
                    <p style="display: flex;">
                        Đà Nẵng
                        <img src="./img_address/Screenshot 2024-03-06 131924.png" alt="ảnh" style="margin-left: 5px;">
                    </p>
                </a>
                <a href=""  style="width: 50%;">
                    <img src="./img_address/QuyhoachHaNoi.jpg" alt="ảnh" width="100%" height="100%" class="anh">
                    <p style="display: flex;">
                        Hà Nội
                        <img src="./img_address/Screenshot 2024-03-06 131924.png" alt="ảnh" style="margin-left: 5px;">
                    </p> 
                </a>
                <a href=""  style="width: calc(100%/3);">
                    <img src="./img_address/ttxxvnktvn.jpg" alt="ảnh" width="100%" height="100%" class="anh">
                    <p style="display: flex;">
                        Hồ Chí Minh
                        <img src="./img_address/Screenshot 2024-03-06 131924.png" alt="ảnh" style="margin-left: 5px;">
                    </p> 
                </a>
                <a href=""  style="width: calc(100%/3);">
                    <img src="./img_address/Hinh-anh-Hoi-An-1.jpg" alt="ảnh" width="100%" height="100%" class="anh">
                    <p style="display: flex;">
                        Hội An
                        <img src="./img_address/Screenshot 2024-03-06 131924.png" alt="ảnh" style="margin-left: 5px;">
                    </p> 
                </a>
                <a href=""  style="width: calc(100%/3);">
                    <img src="./img_address/vung-tau-booking-02.jpg" alt="ảnh" width="100%" height="100%" class="anh">
                    <p style="display: flex;">
                        Vũng Tàu
                        <img src="./img_address/Screenshot 2024-03-06 131924.png" alt="ảnh" style="margin-left: 5px;">
                    </p> 
                </a>
            </div>
        </main>
        <!--beach-->
        <div class="beach">
            <h3 class="city_hd">Những bãi biển nổi tiếng</h3>
            <p class="city_hd2">Điểm đến nổi bật dành cho du khách.</p>
            <div class="slider_beach_main">

                <ul class="list_img_beach">
                    <li class="tt">
                        <img src="./img_beach/bai-bien-my-khe-jpeg-1994-1677638252-1677974198.jpg" alt="ảnh" class="img_beach" height="137px" width="20%">
                        <p class="name_beach">Đà Nẵng</p>
                    </li>
                    <li class="tt">
                        <img src="./img_beach/cua-lo-1588659357844.webp" alt="ảnh" class="img_beach" height="137px" width="20%">
                        <p class="name_beach">Cửa Lò</p>
                    </li>
                    <li class="tt">
                        <img src="https://i2.ex-cdn.com/crystalbay.com/files/content/2024/01/26/anh-nha-trang-dep-moi-nhat-1-1544.jpeg" alt="ảnh" class="img_beach" height="137px" width="20%">
                        <p class="name_beach">Nha trang</p>
                    </li>
                    <li class="tt">
                        <img src="https://cdn3.ivivu.com/2023/02/b%C3%A3i-d%E1%BB%A9a-v%C5%A9ng-t%C3%A0u-ivivu-2.jpg" alt="ảnh" class="img_beach" height="137px" width="20%">
                        <p class="name_beach">Vũng tàu</p>
                    </li>
                    <li class="tt">
                        <img src="https://statics.vntrip.vn/data-v2/data-guide/img_content/1470302452_anh-5.jpg" alt="ảnh" class="img_beach" height="137px" width="20%">
                        <p class="name_beach">Phú quốc</p>
                    </li>
                    <li class="tt">
                        <img src="https://quynhon.altaraservicedresidences.vn/Data/Sites/1/media/bien-quy-nhon/bien-quy-nhon-(9)-min.png" alt="ảnh" class="img_beach" height="137px" width="20%">
                        <p class="name_beach">Quy nhơn</p>
                    </li>
                    <li class="tt">
                        <img src="https://ik.imagekit.io/tvlk/blog/2022/09/kinh-nghiem-du-lich-lang-co-1.jpg?tr=dpr-2,w-675" alt="ảnh" class="img_beach" height="137px" width="20%">
                        <p class="name_beach">Lăng cô</p>
                    </li>
                </ul>
                <i class="fa-solid fa-chevron-right right_beach"></i>
                <i class="fa-solid fa-chevron-left left_beach"></i>
            </div>
        </div>

        <!--city-->
        <div class="city">
            <h3 class="city_hd">Những Thành phố nổi tiếng.</h3>
            <p class="city_hd2">Điểm đến nổi bật dành cho du khách.</p>
            <div class="slider_city_main">
                <ul class="list_img_city">
                    <li class="city_tt">
                        <img src="https://bcp.cdnchinhphu.vn/Uploaded/hoangtrongdien/2019_12_27/don-vi-tu-van-dua-ra-nhieu-y-tuong-dieu-chinh-quy-hoach-chung-tp-da-nang-1643.jpg" alt="ảnh" class="img_city" height="137px" width="20%">
                        <p class="name_city">Đà Nẵng</p>
                    </li>
                    <li class="city_tt">
                        <img src="https://nld.mediacdn.vn/291774122806476800/2023/4/30/sap-nhap-1-1682817100311843996433.jpg" alt="ảnh" class="img_city" height="137px" width="20%">
                        <p class="name_city">Đà Lạt</p>
                    </li>
                    <li class="city_tt">
                        <img src="https://i.ex-cdn.com/vovgiaothong.vn/files/f1/Sites/1/media/hoanganh/images/1(2).jpg" alt="ảnh" class="img_city" height="137px" width="20%">
                        <p class="name_city">Hồ Chí Minh</p>
                    </li>
                    <li class="city_tt">
                        <img src="https://cdn.tuoitre.vn/471584752817336320/2023/1/16/hanoi-1673872948047908681909.jpeg" alt="ảnh" class="img_city" height="137px" width="20%">
                        <p class="name_city">Hà Nội</p>
                    </li>
                    <li class="city_tt">
                        <img src="https://media.vneconomy.vn/images/upload/2022/03/22/nhatrangkh.jpeg" alt="ảnh" class="img_city" height="137px" width="20%">
                        <p class="name_city">Nha Trang</p>
                    </li>
                    <li class="city_tt">
                        <img src="https://xdcs.cdnchinhphu.vn/446259493575335936/2023/2/11/hlong-16760849817131824004114.jpg" alt="ảnh" class="img_city" height="137px" width="20%">
                        <p class="name_city">Hạ Long</p>
                    </li>
                    <li class="city_tt">
                        <img src="https://bcp.cdnchinhphu.vn/334894974524682240/2023/2/8/co-hen-voi-tam-coc-7c217-1-1675846927133679739963.jpg" alt="ảnh" class="img_city" height="137px" width="20%">
                        <p class="name_city">Ninh Bình</p>
                    </li>
                    <li class="city_tt">
                        <img src="https://cdnmedia.baotintuc.vn/Upload/Td3qmSNSjM5mhekL9vM2Q/files/2020/05/TPvinh/DJI_0210.jpg" alt="ảnh" class="img_city" height="137px" width="20%">
                        <p class="name_city">Vinh</p>
                    </li>
                    <li class="city_tt">
                        <img src="./img_beach/bai-bien-my-khe-jpeg-1994-1677638252-1677974198.jpg" alt="ảnh" class="img_city" height="137px" width="20%">
                        <p class="name_city">Huế</p>
                    </li>
                    <li class="city_tt">
                        <img src="./img_beach/bai-bien-my-khe-jpeg-1994-1677638252-1677974198.jpg" alt="ảnh" class="img_city" height="137px" width="20%">
                        <p class="name_city">Vũng Tàu</p>
                    </li>
                </ul>
            </div>
        </div>
        <!--contact-->
        <div class="contact">
            <form action="home.php" class="contact_main" method="post">
                <h3  class="contact_hd">
                    <i class="fa-solid fa-phone-volume"></i>
                    Liên hệ 24h
                </h3>
                <label for="email"  class="contact_email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Nhập vào Email của bạn..." require><br>
                <label for="tel" class="contact_tel">Tel:</label>
                <input type="tel" name="tel" id="tel" placeholder="+84" require><br>
                <label for="contents" class="contact_contents">Contents:</label><br>
                <textarea name="contents" id="contents" cols="56" rows="2" require placeholder="Nhập vào Nội dung..."></textarea><br>
                <input type="submit" value="Gửi" id="send">
            </form>
        </div>
      
        
        <!--footer-->
        <footer class="footer">
            <p class= "footer_td">@ Bản quyền thuộc về Nguyễn Văn Toàn và Trần Thị Thu</p>
            <hr>
           
        </footer>
    
    </div>  
   
    <script src="js/js.js"></script>
    <script src="js/beach.js"></script>

</body>

</html>