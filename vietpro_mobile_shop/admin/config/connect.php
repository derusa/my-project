<?php
// if(!defined('TEMPLATE')){
// 	die('Bạn không có quyền truy cập vào file này !');
// }
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'vietpro_mobile_shop';


$conn = mysqli_connect($hostname, $username, $password, $dbname);  
if($conn)
{
    //set tieng viet
    mysqli_set_charset($conn,'utf8');
}
else {
    die ("ket noi that bai".mysqli_error());    //giong echo nhung de xu ly cac hanh dong khong thuc thi duoc
}



?>