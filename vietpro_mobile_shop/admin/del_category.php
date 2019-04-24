<?php
//vi khong co giao dien, ko ke thua len phai lam lai
session_start();

define('TEMPLATE', true);						
include("config/connect.php");
$cat_id = $_GET['cat_id'];					

if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){
    $sql = "DELETE FROM category WHERE cat_id=$cat_id";
    mysqli_query($conn, $sql);
    header ('location: index.php?page_layout=category');
}
else{
	header ('location: login.php');
}
?>