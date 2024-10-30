<?php
    $con = mysqli_connect("localhost","root","123456","duAn1");
    if($con){
        header("Location: index.php");
    }
?>