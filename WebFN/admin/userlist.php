<?php
    session_start();
	if(!isset($_SESSION['submit'])){
		header('Location: login.php');
	}
 ?>


<?php
header("content-type:text/html; charset=UTF-8");
?>
<?php require_once('../database/dbhelper.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>User List</title>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- summernote -->
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>

<body>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="category/index.php">Statistical</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="category/index.php">Manage categories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="product/">Product Management</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="dashboard.php">Manage shopping cart</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="binhluan.php">Comments List</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link active" href="userlist.php">User List</a>
        </li>
        
    </ul>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">User List</h2>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr style="font-weight: 500;text-align: center;">
                                <td width="50px">STT</td>
                                <td>ID</td>
                                <td>Full Name</td>
                                <td>USERNAME</td>
                                <td>Email</td>
                                <td>Address</td>
                                <td>PASSWORD</td>
                                <td>NumberPhone</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            try {

                                if (isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                } else {
                                    $page = 1;
                                }
                                $limit = 10;
                                $start = ($page - 1) * $limit;

                                $sql = "SELECT * from tbl_dangky limit $start,$limit";
                                $User_List = executeResult($sql);
                                $total = 0;
                                $count = 0;
                                $index = 1;
                                foreach ($User_List as $item) {
                                    echo '
                                        <tr style="text-align: center;">
                                            <td width="50px">' . (++$count) . '</td>
                                            <td width="50px">' . $item['id_dangky'] . '</td>
                                            <td>' . $item['tenkhachhang'] . '</td>
                                            <td >' . $item['tendangnhap'] . '</td>
                                            <td>' . $item['email'] . '</td>
                                            <td>' . $item['diachi'] . '</td>
                                            <td>' . $item['matkhau'] . '</td>
                                            <td>' . $item['dienthoai'] . '</td>
                                        </tr>
                                    ';
                                }
                            } catch (Exception $e) {
                                die("Lỗi thực thi sql: " . $e->getMessage());
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <ul class="pagination">
                <?php
                $sql = "SELECT * from tbl_dangky limit $start,$limit";
                $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                $result = mysqli_query($conn, $sql);
                $current_page = 0;
                if (mysqli_num_rows($result)) {
                    $numrow = mysqli_num_rows($result);
                    $current_page = ceil($numrow / 5);
                }
                for ($i = 1; $i <= $current_page; $i++) {
                    if ($i == $current_page) {
                        echo '
            <li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                    } else {
                        echo '
            <li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>
                    ';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</body>
<style>
    .b-500 {
        font-weight: 500;
    }

    .red {
        color: red;
    }

    .green {
        color: green;
    }
</style>

</html>