<?php
// chi len lay du lieu bang truy van vao csdl khi dung vong lap
$cat_id = $_GET['cat_id'];
$cat_name = $_GET['cat_name'];

//phan trang san pham theo danh muc
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$row_per_page = 6;
$per_page = $row_per_page * $page - $row_per_page;
$total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM product WHERE cat_id=$cat_id "));
$total_page = ceil($total_rows/$row_per_page);

$pagePrev = $page - 1;
if ($pagePrev <= 0 ) {
    $pagePrev = 1;
}
$listPage = '';
$listPage .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=category&cat_id='.$cat_id.'&cat_name='.$cat_name.'&page='.$pagePrev.'">Trang trước</a></li>';

for ($i=1; $i <= $total_page ; $i++) { 
    if ($page == $i) {
        $active = 'active';
    } else {
        $active = '';
    }
    
    $listPage .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=category&cat_id='.$cat_id.'&cat_name='.$cat_name.'&page='.$i.'">'.$i.'</a></li>';
}

$pageNext = $page + 1;
if ($pageNext >= $total_page) {
    if ($total_page == 0) {                         // xu ly an next bi loi trong truong hop khong co ban ghi nao  
        $pageNext = 1;
    } else {
        $pageNext = $total_page;
    }
    
}
$listPage .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=category&cat_id='.$cat_id.'&cat_name='.$cat_name.'&page='.$pageNext.'">Trang sau</a></li>';


//in ra thong tin sp theo danh muc
$sql = "SELECT * FROM product WHERE cat_id = $cat_id LIMIT $per_page, $row_per_page";
$query = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($query);

//cach khac de hien tong so sp theo danh muc:
$sql_count = "SELECT count(cat_id) as num FROM product WHERE cat_id=$cat_id"; //phai gan vao mot truong ten la num
$query_count = mysqli_query($conn, $sql_count);
$numCount = mysqli_fetch_array($query_count);
?>
<!--	List Product	-->
<div class="products">
    <h3><?php echo $cat_name; ?> (<?php /*echo $num_rows; ko dung nua vi da them LIMIT*/ echo $numCount['num']; ?>)</h3>
    <?php
    $i = 1;
    while($row=mysqli_fetch_array($query)){
        if($i==1) {
    ?>
        <div class="product-list card-deck">
        <?php
        }
        ?>
            <div class="product-item card text-center">
                <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><img src="admin/img/<?php echo $row['prd_image']; ?>"></a>
                <h4><a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><?php echo $row['prd_name']; ?></h4>
                <p>Giá Bán: <span><?php echo number_format($row['prd_price'],0,',','.'); ?></span></p>
            </div>
        <?php
        if($i==3) {
            ?>
            </div>
            <?php
            $i = 1;
            }
        else {
        $i ++;
        }
        
    }
    if ($num_rows%3!=0) {       //fix loi vo giao dien
        echo '</div>';
    }
    ?>
</div>
<!--	End List Product	-->

<div id="pagination">
    <ul class="pagination">
        <?php
        echo $listPage;
        ?>
        
    </ul>
</div>