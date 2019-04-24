<script>
    // chuc nang xoa
    //khi trieu goi su kien thi goi nhu mot thuoc tinh html khong can mo vung script
    //return de cho sever hieu da thuc thi hanh dong roi (neu khong se luon thuc thi)
    function xacNhanXoaPrd(){
       var conf = confirm("Ban co chac chan muon xoa hay khong?");
       return conf;
    }
</script>

<?php
if(!defined('TEMPLATE')){
	die('Bạn không có quyền truy cập vào file này !');
}

// check khi lan dau vao trang list product, $page=1
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

// so ban ghi tren mot trang
$rowPerPage = 5;

//chi so bat dau ban ghi tren cac trang
$perRow = $page * $rowPerPage - $rowPerPage;

$total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user"));
//+tinh tong so trang
$total_page = ceil($total_rows/$rowPerPage);    //ham ceil() lam tron len. (co nhieu ham lam tron khac)
//chuc nang previous
$listPage = '';
$pagePrev = $page - 1;
if ($pagePrev <= 0) {
    $pagePrev = 1;
}
$listPage .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page='.$pagePrev.'">&laquo;</a></li>';  //phai dung toan tu noi khong duoc dung gan. chu y khi noi bien

//+chuc nang liet ke thanh phan trang
for ($i=1; $i <=$total_page ; $i++) { 
    if ($page == $i) {
        $active = 'active';
    }
    else {
        $active = '';
    }
    $listPage .= '<li class="page-item '.$active.'" ><a class="page-link" href="index.php?page_layout=user&page='.$i.'">'.$i.'</a></li>';   //class active de danh dau dang o trang nao
}

//chuc nang next
$pageNext = $page + 1;
if ($pageNext >= $total_page) {
    $pageNext = $total_page;
}
$listPage .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page='.$pageNext.'">&raquo;</a></li>';        // khi nhac giao dien vao thi trong giao dien co "" thi phai bao ngoai bang ''

$sql = "SELECT * FROM user LIMIT $perRow,$rowPerPage";
$query = mysqli_query($conn, $sql);
?>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh sách thành viên</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách thành viên</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="index.php?page_layout=add_user" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
        </a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">

                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true">Họ & Tên</th>
                                <th data-field="price" data-sortable="true">Email</th>
                                <th>Quyền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($query)) {                       
                        ?>
                            <tr>
                                <td style=""><?php echo $row[0]; ?></td>
                                <td style=""><?php echo $row[1]; ?></td>
                                <td style=""><?php echo $row[2]; ?></td>
                                <td><span class="label <?php if ($row[4] == 1 ) {echo 'label-danger';}else{echo 'label-success';}?> ">
                                <?php
                                if ($row[4] == 1 ) {echo 'admin';}else{echo 'member';}
                                ?>
                                </span></td>
                                <td class="form-group">
                                    <a href="index.php?page_layout=edit_user&user_id=<?php echo $row['user_id'];?>" class="btn btn-primary"><i
                                            class="glyphicon glyphicon-pencil"></i></a>
                                    <a onclick="return xacNhanXoaPrd();" href="del_user.php?user_id=<?php echo $row['user_id'];?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                            
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                            echo $listPage;
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>