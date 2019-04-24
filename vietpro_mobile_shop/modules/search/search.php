
<?php
//tim kiem thuan, hoac dung jquery ajax(ko can load trang)
if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
} 
else {
    $keyword = $_GET['keyword'];
}

// thuat toan tim kiem: san pham iphone -> explode() ->['san'], ['pham'], ['iphone']
$arr_keyword = explode(' ', $keyword);  //cat chuoi thanh cac mang
$end_keyword = '%'.implode('%', $arr_keyword).'%';  // noi cac phan tu mang thanh chuoi. dau cach ma html la %. them vao % o dau va cuoi de tim kiem ca nhung tu chua no o trong

$sql = "SELECT * FROM product WHERE prd_name LIKE '$end_keyword' OR prd_price LIKE '$end_keyword'";
$query = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($query);

?>

<!--	List Product	-->
<div class="products">
    <div id="search-result">Kết quả tìm kiếm với <span><?php echo $keyword; ?></span></div>
    <?php
    $i = 1;
    while ($row = mysqli_fetch_array($query)) {
        if($i==1) {
    ?>
            <div class="product-list card-deck">
        <?php
        }
        ?>
                <div class="product-item card text-center">
                    <a href="#"><img src="admin/img/<?php echo $row['prd_image']; ?>"></a>
                    <h4><a href="#"><?php echo $row['prd_name']; ?></a></h4>
                    <p>Giá Bán: <span><?php echo number_format($row['prd_price'],0,',','.'); ?></span></p>
                </div>
        <?php
        if($i==3) {
            $i = 1;
        ?>
            </div>
        <?php
        }
        else {
            $i++;
        }
        
    }
    if($num_rows%3!=0) {
        echo '</div>';
    }
    ?>
    
</div>
<!--	End List Product	-->

<div id="pagination">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
    </ul>
</div>