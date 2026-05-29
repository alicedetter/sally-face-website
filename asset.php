<?php
session_start();
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "tdog";
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

function isLevel($level){
    if(isset($_SESSION['level'])){
        if(intval($_SESSION['level'])>=$level){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
?>