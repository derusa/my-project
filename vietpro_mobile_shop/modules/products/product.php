<!--	List Product	-->
<?php
$prd_id = $_GET['prd_id'];
$sql = "SELECT * FROM product WHERE prd_id=$prd_id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

//them binh luan
if (isset($_POST['sbm'])) {
    $comm_name = $_POST['comm_name'];
    $comm_mail = $_POST['comm_mail'];
    $comm_details = $_POST['comm_details'];

    date_default_timezone_set('Asia/Ho_Chi_Minh');   // set lai time zone viet nam. dat default thi bien tu nhan thoi gian
    $comm_date = date('Y-m-d H:i:s'); //co 2 tham so nhung o day chi can mot tham so. cau truc lay theo mysql

    $sql_comm_add = "INSERT INTO comment(prd_id, comm_name, comm_mail, comm_date, comm_details) VAlUES('$prd_id','$comm_name','$comm_mail','$comm_date','$comm_details') ";
    mysqli_query($conn, $sql_comm_add);
}
?>

<div id="product">
    <div id="product-head" class="row">
        <div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
            <img src="admin/img/<?php echo $row['prd_image'] ?>">
        </div>
        <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
            <h1><?php echo $row['prd_name'] ?></h1>
            <ul>
                <li><span>Bảo hành: </span><?php echo $row['prd_warranty']; ?></li>
                <li><span>Đi kèm: </span><?php echo $row['prd_accessories']; ?></li>
                <li><span>Tình trạng:</span> <?php echo $row['prd_new']; ?></li>
                <li><span>Khuyến Mại:</span> <?php echo $row['prd_promotion']; ?></li>
                <li id="price">Giá Bán (chưa bao gồm VAT)</li>
                <li id="price-number"><?php echo number_format($row['prd_price'],0,',','.'); ?></li>
                <li id="status">
                <?php
                //viet trong thuoc tinh cua the thi viet tren mot dong con trong the viet bt
                if ($row['prd_status']==1) {
                    echo 'còn hàng';
                } else {
                    echo 'hết hàng';
                }
                
                ?>
                </li>
            </ul>
            <div id="add-cart"><a href="#">Mua ngay</a></div>
        </div>
    </div>
    <div id="product-body" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Đánh giá về <?php echo $row['prd_name']; ?></h3>
            <p>
                <?php
                echo $row['prd_details'];
                ?>
            </p>
        </div>
    </div>

    <!--	Comment	-->
    <div id="comment" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Bình luận sản phẩm</h3>
            <form method="post">
                <div class="form-group">
                    <label>Tên:</label>
                    <input name="comm_name" required type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input name="comm_mail" required type="email" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label>Nội dung:</label>
                    <textarea name="comm_details" required rows="8" class="form-control"></textarea>
                </div>
                <button type="submit" name="sbm" class="btn btn-primary">Gửi</button>
            </form>
        </div>
    </div>
    <!--	End Comment	-->

    <!--	Comments List	-->
    <?php
    $sql_comm_list = "SELECT * FROM comment WHERE prd_id=$prd_id ORDER BY comm_id DESC";
    $query_comm_list = mysqli_query($conn, $sql_comm_list);
    ?>
    <div id="comments-list" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?php
            while($row_comm_list = mysqli_fetch_array($query_comm_list)) {
            ?>
            <div class="comment-item">
                <ul>
                    <li><b><?php echo $row_comm_list['comm_name'] ?></b></li>
                    <li><?php echo $row_comm_list['comm_date'] ?></li>
                    <li>
                        <p><?php echo $row_comm_list['comm_details'] ?></p>
                    </li>
                </ul>
            </div>
            <?php
            }
            ?>
            
        </div>
    </div>
    <!--	End Comments List	-->
</div>
<!--	End Product	-->
<div id="pagination">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
    </ul>
</div>