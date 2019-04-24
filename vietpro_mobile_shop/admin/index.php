<?php
session_start();

define('TEMPLATE', true);						//dieu huong moi thu qua index (khong co tinh vao cac trang khong duoc vao)
include("config/connect.php");					//include la copy code ghi de vao chu ko phai dieu huong

if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){
	include_once('admin.php');
}
else{
	include_once('login.php');	
}
?>