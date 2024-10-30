<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/admin_flight.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        label{
            font-weight: 550;  
        }
        textarea{
            margin-top: 10px;          
            resize: none;
            width: 100%;
            padding: 20px;
        }
        form{
            padding: 20px;
        }
        input{
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<?php  
    function option(){
        $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
        if(isset($_POST['email']) && isset($_POST['code_contact'])){
            $email = $_POST['email'];
            $code_contact = $_POST['code_contact'];

            if(isset($_POST['Delete'])){                   
?>
<body style="padding-top: 70px">
        <form action="manager_contact2.php" method="post">
            <input type="hidden" name="code_contact2" value="<?php echo $code_contact; ?>">
            <h3>Bạn có chắc là muốn XÓA dữ liệu liên hệ này?</h3>
            <input type="submit" value="Hủy" name="cancell">
            <input type="submit" value="Tiếp tục" name="confirmm">
        </form>
<?php
    }else if(isset($_POST['Feedback'])){

?>
    <a href="manager_contact.php" class="comback"><i class="fa-solid fa-user-tie">Admin</i></a>
    <form action="manager_contact2.php" method="post">
        <input type="hidden" name="email3" value="<?php echo $email;?>">
        <input type="hidden" name="code_contact3" value="<?php echo $code_contact;?>">
        <label for="content3">Thông tin trả lời người dùng</label>
        <textarea name="content3" id="content3" cols="50" rows="6" placeHolder="Thông tin phản hồi..."></textarea>
        <input type="submit" value="Trả lời">
        
    </form>

    <?php
    }}}
    option();
?>
<?php 
    function delete_contact(){
        $conn = mysqli_connect("localhost", "root", "123456", "duAn1"); 

        if(isset($_POST['code_contact2'])){
            if(isset($_POST['cancell'])){
                header('location: manager_contact.php');
            }else if(isset($_POST['confirmm'])){
                $code_contact2 = $_POST['code_contact2'];
                $delete_contact = "DELETE FROM contact WHERE code_contact='$code_contact2'";
                $result_contact = mysqli_query($conn, $delete_contact);
                header('location: manager_contact.php');
            }
        }
    }
    delete_contact();
    
    function feedback_contact(){
        $conn = mysqli_connect("localhost", "root", "123456", "duAn1"); 
        if(isset($_POST['email3']) && isset($_POST['content3']) && isset($_POST['code_contact3'])){
            $to = $_POST['email3'];
            $code_contact3 = $_POST['code_contact3'];
            $message = $_POST['content3'];

            
            require("../PHPMailer-master/PHPMailer-master/src/PHPMailer.php");
            require("../PHPMailer-master/PHPMailer-master/src/SMTP.php");
            require("../PHPMailer-master/PHPMailer-master/src/Exception.php");
        
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP
        
            $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = "nguyenvantoan29102002@gmail.com";
            $mail->Password = "zoqmswqjdiulhpkm";//tạo một tài khoản ứng dụng
            $mail->SetFrom("nguyenvantoan29102002@gmail.com");
            $mail->Subject = "Cảm ơn quý khách đã phản hồi.";
            $mail->Body = $message;
            $mail->AddAddress($to);
            $mail->CharSet = 'UTF-8';
        
            if(!$mail->Send()) {
                echo"<script>
                    alert('Gửi mail không thành công');
                    window.location.href='manager_contact.php';
                </script>";
            } else {
                $delete_contact = "DELETE FROM contact WHERE code_contact='$code_contact3'";
                $result_contact = mysqli_query($conn, $delete_contact);
                echo"<script>
                    alert('Gửi mail thành công');
                    window.location.href='manager_contact.php';
                </script>";
            }
        }
    }
    feedback_contact();
?>

   
    
</body>
</html>
