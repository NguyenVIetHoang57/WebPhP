<?php require_once('database/config.php');
require_once('database/dbhelper.php');?>
<?php require_once 'Layout/header.php';

// Kết nối tới cơ   sở dữ liệu MySQL
$conn = connectToDatabase();




// Hàm cập nhật thông tin người dùng
function capNhatThongTin($id_dangky, $tenkhachhang, $email, $diachi, $dienthoai) {
    global $conn;

    $stmt = $conn->prepare("UPDATE tbl_dangky SET tenkhachhang=?, email=?, diachi=?, dienthoai=? WHERE id_dangky=?");
    $stmt->bind_param("ssssi", $tenkhachhang, $email, $diachi, $dienthoai, $id_dangky);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

if (isset($_SESSION['submit'])) {
    $tendangnhap = $_SESSION['submit'];

    // Lấy thông tin người dùng từ cơ sở dữ liệu dựa trên tendangnhap
    $thongtin = getThongTinDangKy($tendangnhap);

    if (!empty($thongtin)) {
        $id_dangky = $thongtin['id_dangky'];
        $tenkhachhang = $thongtin['tenkhachhang'];
        $email = $thongtin['email'];
        $diachi = $thongtin['diachi'];
        $dienthoai = $thongtin['dienthoai'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tenkhachhang = $_POST['tenkhachhang'];
            $email = $_POST['email'];
            $diachi = $_POST['diachi'];
            $dienthoai = $_POST['dienthoai'];

            if (capNhatThongTin($id_dangky, $tenkhachhang, $email, $diachi, $dienthoai)) {
                echo "Thông tin đã được cập nhật thành công.";
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa thông tin</title>
    <!-- Thêm liên kết tới tệp CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<bR>
<br>
<br>
<br>
<br>
<body>
    <div class="container">
        <h1>Chỉnh sửa thông tin</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="tenkhachhang">Tên khách hàng:</label>
                <input type="text" class="form-control" name="tenkhachhang" value="<?php echo $tenkhachhang; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
            </div>

            <div class="form-group">
                <label for="diachi">Địa chỉ:</label>
                <input type="text" class="form-control" name="diachi" value="<?php echo $diachi; ?>" required>
            </div>

            <div class="form-group">
                <label for="dienthoai">Điện thoại:</label>
                <input type="tel" class="form-control" name="dienthoai" value="<?php echo $dienthoai; ?>" required>
            </div>

            <input type="submit" class="btn btn-primary" value="Cập nhật">
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tenkhachhang = $_POST['tenkhachhang'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $dienthoai = $_POST['dienthoai'];

        if (capNhatThongTin($id_dangky, $tenkhachhang, $email, $diachi, $dienthoai)) {
            echo '<div class="alert alert-success">Thông tin đã được cập nhật thành công.</div>';
        } else {
            echo '<div class="alert alert-danger">Lỗi: Cập nhật thất bại.</div>';
        }
    }
    ?>
    <section class="main">
    <section class="recently" style="padding-bottom: 50px;">
                <div class="title">
                
                  <br>
                  <br>
                    <h1 >NEW ARRIVALS</h1>
                </div>
                <div class="product-recently">
                    <div class="row">
                        <?php
                        $sql = 'SELECT * from product, order_details where order_details.product_id=product.id order by order_details.num DESC limit 4';
                        $productList = executeResult($sql);
                        $index = 1;
                        foreach ($productList as $item) {
                            echo '
                                <div class="col">
                                    <a href="details.php?id=' . $item['product_id'] . '">
                                        <img class="thumbnail" src="admin/product/' . $item['thumbnail'] . '" alt="">
                                        <div class="title">
                                            <p>' . $item['title'] . '</p>
                                        </div>
                                        <div class="price">
                                        </div>
                                        <div class="more">
                                            <div class="star">
                                                <img src="images/icon/icon-star.svg" alt="">
                                                <span>5.0</span>
                                            </div>
                                            <div class="time">
                                                <img src="images/icon/icon-clock.svg" alt="">
                                                <span></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                ';
                        }
                        ?>
                    </div>
                </div>
            </section>   
</section>

    <!-- Thêm liên kết tới tệp JavaScript Bootstrap (tùy chọn) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
    <?php require_once('Layout/footer.php'); ?>
    <style>
          section.main {
  padding: 0 0;
  width: 100%;
  margin: 0px auto;
}
section.main a {
  text-decoration: none;
}
section.main section.recently {
  padding-bottom: 3rem;
  padding-left: 3rem;
  padding-right: 3rem;
}
section.main section.recently .link a {
  text-decoration: none;
  color: black;
  font-size: 20px;
}
section.main section.recently .title h1 {
  font-size: 35px;
  margin: 0px;
  padding: 30px;
  color: black;
  text-align:center;
}
section.main section.recently .product-recently {
  padding-top: 2rem;
}
section.main section.recently .product-recently .row {
  display: grid;
  grid-template-columns: auto auto auto auto;
  grid-column-gap: 30px;
  grid-row-gap: 30px;
}

section.main section.recently .product-recently .row .col img {
  width: 100%;
  border-radius: 10px;
}
section.main section.recently .product-recently .row .col img.thumbnail {
  border: 1px solid rgb(76, 78, 85);
  transition: 0.1s;
}
section.main section.recently .product-recently .row .col img.thumbnail:hover {
  box-shadow: 0px 0px 5px 0px grey;
}
section.main section.recently .product-recently .row .col .title p {
  font-size: 20px;
  font-weight: 600;
  padding: 0px;
  margin: 5px 0;
  color: black;
  font-family: "Encode Sans SC", sans-serif;
}
section.main section.recently .product-recently .row .col .price span {
  padding: 10px 0;
  color: #676767;
  font-size: 20px;
  font-weight: 600;
  color: rgba(207, 16, 16, 0.815);
}
section.main section.recently .product-recently .row .col .dish span {
  padding: 10px 0;
  color: #676767;
}

section.main section.recently .product-recently .row .col .more {
  display: flex;
  color: #676767;
  padding: 5px 0;
  font-size: 18px;
}
section.main section.recently .product-recently .row .col .more .star {
  display: flex;
  align-items: center;
  justify-content: center;
}

section.main section.recently .product-recently .row .col .more .star img {
  width: 25px;
  height: 25px;
  
}
section.main section.recently .product-recently .row .col .more .time {
  display: flex;
  padding: 0 10px;

}
section.main section.recently .product-recently .row .col .more .time img {
  width: 24px;
  height: 24px;

}
#wp-products {/*căn nguyên lish new arrival và sản phẩm */
    padding-top:130px;/*cách banner trên*/
    padding-bottom: 78px;
    padding-left:0px;
    padding-right:0px;/*căn phải với web*/
}

#wp-products h2 {
    text-align: center;
    margin-bottom: 76px;/*căn trên so với chữ new arrival*/
    font-size:5x;/*size chữ New Arrival*/
    color:black;
    margin-left:40px;
}


#list-products {
    font-size:17px;/*size chữ sản phẩm*/
    display: flex;
    list-style: none;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
}

#list-products .item {
    width: 100%px;/*căn trái phải của hình ảnh so với lề*/
    height: 0px;/*chỉnh khung border sau ảnh*/
    background:#fafafa;
    border-radius: 0px;
    margin-bottom: 460px;/*chỉnh khoảng cách sản phẩm trên so với sản phẩm dưới*/
}


#list-products .item .name {
    text-align: center;
    color:rgb(10, 10, 10);
    font-weight: bold;
    margin-top:0px;/*chỉnh khoảng cách từ tên so với sản phẩm*/
}

#list-products .item .price {
    text-align: center;
    color:#090909;
    font-weight: bold;
    margin-top:0px;/*chỉnh khoảng cách từ giá tiền so với tên sản phẩm*/
}


.list-page {
    width: 50%;
    margin:0px auto;
}

.list-page {
    display: flex;
    list-style: none;
    justify-content: center;
    align-items: center;
}





#list-new {
    font-size:13px;/*size chữ sản phẩm*/
    display: flex;
    list-style: none;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
}

#list-new .item {
    width: 100%px;/*căn trái phải của hình ảnh so với lề*/
    height: 0px;/*chỉnh khung border sau ảnh*/
    background:#fafafa;
    border-radius: 0px;
    margin-bottom: 460px;/*chỉnh khoảng cách sản phẩm trên so với sản phẩm dưới*/
}


#list-new .item .name {
    text-align: center;
    color:rgb(10, 10, 10);
    font-weight: bold;
    margin-top:20px;/*chỉnh khoảng cách từ tên so với sản phẩm*/
}


.list-page {
    width: 50%;
    margin:0px auto;
}

.list-page {
    display: flex;
    list-style: none;
    justify-content: center;
    align-items: center;
}
#list-new .box-left{
    text-align: center;
    margin-top:470px;/*chỉnh lên xuống nút xem thêm */
    margin-left:-458px;/*chỉnh trái phải nút xem thêm*/
    
}
#list-new .box-left button:hover {/*màu sắc khi nhấp vô nút buttom mua ngay*/
    background:orange;
}
#list-new .box-left button {/*nút buttom mua ngay*/
    font-size:13px;/*chỉnh size chữ*/
    width: 90px;/*chỉnh size dài bóng đen*/
    height: 35px;/*chỉnh size rộng bóng đen*/
    background:#1d1a1a;
    border:none;
    outline:none;
    color:#fff;
    font-weight: bold;
    border-radius: 200px;
    transition:0.4s;/*chỉnh tốc độ chuyển màu*/
}

    </style>
</body>
</html>

