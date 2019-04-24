<?php
//vi khong co giao dien, ko ke thua len phai lam lai
session_start();

define('TEMPLATE', true);						
include("config/connect.php");
$user_id = $_GET['user_id'];					

if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){
    $sql = "DELETE FROM user WHERE user_id=$user_id";
    mysqli_query($conn, $sql);
    header ('location: index.php?page_layout=user');
}
else{
	header ('location: login.php');
}
?>