

<?php
header("content-type:text/html; charset=UTF-8");
?>
<?php
require_once('../database/dbhelper.php');
$id = $name = '';
if (!empty($_POST['name'])) {
    $name = '';
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $name = str_replace('"', '\\"', $name);
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (!empty($name)) {
        $created_at = $updated_at = date('Y-m-d H:s:i');
        // Lưu vào DB
        if ($id == '') {
            // Thêm danh mục
            $sql = 'insert into category(name, created_at,updated_at) 
            values ("' . $name . '","' . $created_at . '","' . $updated_at . '")';
        } 
        else {
            // Sửa danh mục
            $sql = 'update category set name="' . $name . '", updated_at="' . $updated_at . '" where id=' . $id;
        }
        execute($sql);
        header('Location: index.php');
        die();
    }
}



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'select * from category where id=' . $id;
    $category = executeSingleResult($sql);
    if ($category != null) {
        $name = $category['name'];
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Category</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <ul class="nav nav-tabs">
    <li class="nav-item">
            <a class="nav-link" href="../index.php">Statistical</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="index.php">Manage categories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../product/">Product Management</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../dashboard.php">Manage shopping cart</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="../binhluan.php">Comments List</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="../userlist.php">User List</a>
        </li>
    </ul>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Add/Edit Categories</h2>
            </div>
            <div class="panel-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Name list:</label>
                        <input type="text" id="id" name="id" value="<?= $id ?>" hidden='true'>
                        <input required="true" type="text" class="form-control" id="name" name="name" value="<?= $name ?>">
                    </div>
                    <button class="btn btn-success" onclick="addProduct()">Save</button>
                    <?php
                    $previous = "javascript:history.go(-1)";
                    if (isset($_SERVER['HTTP_REFERER'])) {
                        $previous = $_SERVER['HTTP_REFERER'];
                    }
                    ?>
                    <a href="<?= $previous ?>" class="btn btn-warning">Back</a>
                </form>
            </div>
        </div>
    </div>
	<script type="text/javascript">
        function addProduct()
        {
            var option = confirm('Successful')
            if (!option) {
                return;
            }
        }
    </script>
</body>

</html>