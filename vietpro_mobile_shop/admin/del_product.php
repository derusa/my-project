<?php
//vi khong co giao dien, ko ke thua len phai lam lai
session_start();

define('TEMPLATE', true);						
include("config/connect.php");
$prd_id = $_GET['prd_id'];					

if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){
    $sql = "DELETE FROM product WHERE prd_id=$prd_id";
    mysqli_query($conn, $sql);
    header ('location: index.php?page_layout=product');
}
else{
	header ('location: login.php');
}
?>