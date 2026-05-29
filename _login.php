<?php
require_once("asset.php");

if(isset($_GET['logout'])){
    session_start();
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

if(isset($_POST['btn_login'])){
    $user=$_POST['user'];
    $pass=md5($_POST['pass']);
    $sql="SELECT * FROM tbl_user WHERE ((username='$user') AND (password='$pass'))";
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)===1){
        $row=mysqli_fetch_assoc($result);
        $_SESSION['mess']="Login successful!";
        $_SESSION['username']=$row['username'];
        $_SESSION['level']=$row['userlevel'];
        $_SESSION['id']=$row['id'];
    }else{
        $_SESSION['mess']="Login failed! Wrong username or password.";

    }
    header("Location: index.php");
}
?>