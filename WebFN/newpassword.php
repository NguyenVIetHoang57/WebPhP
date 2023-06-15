<?php require_once('database/config.php');
require_once('database/dbhelper.php');?>
<br>
<br>


<!DOCTYPE html>
<html>
<head>
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<?php 
include("Layout/header.php"); 
?>

<body>
    <div class="container">
        <h2>Đổi mật khẩu</h2>
        <form method="POST" action="changepassword.php">
            <div class="form-group">
                <label for="tendangnhap">Tên đăng nhập:</label>
                <input type="text" class="form-control" name="tendangnhap" required>
            </div>

            <div class="form-group">
                <label for="matkhau_cu">Mật khẩu hiện tại:</label>
                <input type="password" class="form-control" name="matkhau_cu" required>
            </div>

            <div class="form-group">
                <label for="matkhau_moi">Mật khẩu mới:</label>
                <input type="password" class="form-control" name="matkhau_moi" required>
            </div>

            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
        </form>
    </div>

    <?php

// Kiểm tra xem có thông báo thành công không
if (isset($_SESSION['success_message'])) {
    echo "<script>alert('" . $_SESSION['success_message'] . "');</script>";
    unset($_SESSION['success_message']);
}

// Kiểm tra nếu có thông báo lỗi, hiển thị thông báo và xóa session
if (isset($_SESSION['error_message'])) {
    echo "<script>alert('" . $_SESSION['error_message'] . "');</script>";
    unset($_SESSION['error_message']);
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
            <style>     
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    
}


/* ------------------------NEW ARRIVALS------------------------------*/
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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
</body>

</html>




<?php require_once('Layout/footer.php'); ?>