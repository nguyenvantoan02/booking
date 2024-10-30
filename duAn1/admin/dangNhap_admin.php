<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/dangNhap_admin.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>
<body>
    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 login-sec">
                    <h2 class="text-center">Login Admin</h2>
                    <form class="login-form" method="post" action="dangNhap_admin.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your email..">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox"  name="check-input" class="form-check-input">
                                <small>Remember Me</small>
                            </label>
                            <button type="submit" class="btn btn-login float-right">Submit</button>
                        </div>
                    </form>
                  
                </div>
                <div class="col-md-8 banner-sec">
                    
                </div>
            </div>
        </div>
    </section>

    <?php 
        //Đăng nhập admin:
        function login(){
            $conn = mysqli_connect("localhost", "root", "123456", "duAn1");
            if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['check-input'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $select = "SELECT * FROM login_admin WHERE email ='$email' AND pass='$password'";
                $result = mysqli_query($conn,$select);
                if(mysqli_num_rows($result)>0){
                    header('location: admin.php');
                }else{
                    echo "<p style='background: #DE6262; padding: 4px 15px; text-align:center;'>Tài khoản không tồn tại</p>";                   
                }
            }
        }
        login(); 
    ?>
</body>
</html>