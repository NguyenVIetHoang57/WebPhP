<?php
header("content-type:text/html; charset=UTF-8");
?>
<?php
            session_start();
            if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
                unset($_SESSION['submit']);
                header('Location:index.php');
            }
?>
<?php
include('config.php');
?>
<?php
require_once('database/config.php');
require_once('dbhelper.php');
require_once('utility.php');
// Lấy id từ trang index.php truyền sang rồi hiển thị nó
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'select * from product where id=' . $id;
    $product = executeSingleResult($sql);
    // Kiểm tra nếu ko có id sp đó thì trả về index.php
    if ($product == null) {
        header('Location: index.php');
        die();
    }
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0" nonce="XXXXXXXX"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="plugin/fontawesome/css/all.css">
    <link rel="stylesheet" href="./login.css">
        <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script><!--link lấy icon -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Details</title>
    <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0&appId=792707842409463&autoLogAppEvents=1" nonce="xyz"></script>

</head>
<!-----------------------HEARDER ----------------------------------------->
<header>
  <div id="menu" style="margin-top:10px;">
                    <ul>
                    <li><a href="index.php">Home</a></li><!--Trang chủ -->
                        <li>
                            <a href="#">Laptop,PC</a><!--Top -->
                            <ul class="sub-menu">
                                <li><a href="products.php?id_category=50">Laptop Acer</a></li>
                                <li><a href="products.php?id_category=54">Laptop Lenovo</a></li>
                                <li><a href="products.php?id_category=55">Laptop Asus</a></li>
                                <li><a href="products.php?id_category=56">Laptop Gigabyte</a></li>
                                <li><a href="products.php?id_category=51">PC Gaming</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Components</a><!--Bottom -->
                            <ul class="sub-menu">
                                <li><a href="products.php?id_category=52">PC Components</a></li>
                                <li><a href="products.php?id_category=53">Laptop Components</a></li>
                            </ul>
                        </li>
                        <li><a href="allproduct.php">All Product</a></li>
                        <li><a href="AboutUs/AboutUs.php">About us</a></li><!--About us -->
                    </ul>
                </div>
        
        <div class="other"><!--Other -->
            
            
            <div class="login"> 
            <?php
                
                if(isset($_SESSION['submit'])) {
                    $user_admin = $_SESSION['submit'];
                            if($user_admin == 'admin') {
                                
                                echo '<a style="color:black;" href="">' . $_SESSION['submit'] . '</a>
                                <div class="logout">
                                <a href="/webfn/admin/login.php"><i class="fas fa-user-edit"></i>Admin</a> <br>                             
                                <a href="index.php?dangxuat=1"><i class="fas fa-sign-out-alt"></i>Logout</a>
                                </div>';
                                                        }
                            else{
                                echo '<a style="color:black; " href="#">' . $_SESSION['submit'] . '</a>
                                <div class="logout" style="width: 200px; height: 80px;">
                                    <a style="font-size: 18px;" href="../webfn/newpassword.php"><i class="fas fa-exchange-alt"></i>Change Password</a> <br>                           
                                    <a style="font-size: 18px;" href="index.php?dangxuat=1"><i class="fas fa-sign-out-alt"></i>Logout</a>
                                </div>';
                                                        }
                } 
                else {
                             echo '<a href="login.php"">Log in</a>';
                                }
                ?>
                    
            </div>
            
            
            <li><a href="cart.php" style="text-decoration:none; " ><i class="fas fa-shopping-bag"></i></a> <?php
                        $cart = [];
                        if (isset($_COOKIE['cart'])) {
                            $json = $_COOKIE['cart'];
                            $cart = json_decode($json, true);
                        }
                        $count = 0;
                        foreach ($cart as $item) {
                            $count += $item['num']; // đếm tổng số item
                        }
                        ?>
                        <span><?= $count ?></span></li><!--icon GIỎ HÀNG -->
        </div>
        
        
</header>
<style>
    
    li{
        list-style: none;/* bỏ chấm tròn của Others*/
    }
    body{/* chỉnh màu background menu (màu ô chứa chữ ko thay đổi)*/
        background-color: white;
    }
    header{/* chỉnh menu*/
        display:flex;
        justify-content: space-between;
        align-items: center;
        padding: 0px 5%;
        margin-top:0px; 
        position:fixed; 
        top:0;
        left:0;
        right:0;
        background-color: #ffffff;
        z-index: 1;
        box-shadow: 2px 2px 2px rgba(241, 241, 241, 0.873);
        float: left;
    }



    /* ---------------chỉnh logo----------------*/
    header img{
        width:150px;
        cursor:pointer;
    }



    /* ---------------chỉnh other (search,shopping,user)----------------*/
    .other{
        display:flex;
    }
    .other >li{
        padding:0 12px;
    }
    .other >li:first-child{
        position:relative;
    }
    .other >li:first-child input{/* chỉnh ô tìm kiếm*/
        width:100%;/* chỉnh  độ dài ô tìm kiếm*/
        height:100%;/* chỉnh độ rộng ô tìm kiếm*/
        margin-top: -20px;
        margin-left: -20px;
        border:10;
    }
    .other >li:first-child i{
        position:absolute;
        right:10px;/* chỉnh vị trí  Icon search */
    }


    /* ---------------------------chỉnh Menu-------------------------------*/
    .login {
    padding: 0px;
    border: 1px solid rgb(196, 196, 196);
    border-radius: 3px;
    margin: 0 50px;
    position: relative;
    }
    .login:hover {
    box-shadow: 0px 0px 3px 0px grey;
    cursor: pointer;
    }
    .login a {
    padding: 15px;
    text-decoration: none;
    color: #676767;
    font-weight: 700;
    }
    .login:hover .logout{
    display: block;
    }
    .login .logout{
    display: none;
    position: absolute;
    top: 2.3rem;
    left: 0px;
    z-index: 10;
    width: 150%;
    border: 1px solid grey;
    border-radius: 5px;
    padding: 10px 0;
    }
    .login .logout a{
    color: black;
    font-weight: 500;
    border-radius: 5px;
    margin: 10px 0;
    }
    .login .logout a:hover{
    opacity: 0.8;
    }
    #menu {
        list-style:none;
        display: flex;
    }

    #menu ul{
        list-style-type: none;
        background:#ffffff;   /*  chỉnh màu ô chứa chữ */
        text-align: center;
    }
    #menu ul li{
        color:#0f0f0f;
        display:inline-table;
        width:120px;/* khoảng cách giữa các chữ trong menu */
        height:30px;/* khoảng cách giữa menu và banner*/
        line-height: 50px;/* khoảng cách giữa menu và thanh tìm kiếm*/
        position:relative;   /* chỉnh khung menu xuống thành 1 hàng dọc */
    
    }
    #menu ul li a{
        color:#060606;/* chỉnh màu chữ trên thanh menu */
        text-decoration: none;
        display:block;
        font-size:17px;/* chỉnh cỡ chữ trên thanh menu*/
    }
    #menu ul li a:hover{
        background:rgba(123, 123, 123, 0.262);/* chỉnh màu Ô lúc dê chuột vào */
        color:#333;/* chỉnh màu chữ trong Ô lúc dê chuột vào */
        
    }
    #menu ul li >.sub-menu{
        display: none;
        position: absolute;
        background-color:  #ffffff;/* chỉnh màu Ô đa cấp lúc dê chuột vào */
        z-index: 1;
        list-style: none;
    }

    #menu ul li:hover .sub-menu{
        display:block;
    }
</style>
<div id="fb-root"></div><!-- END HEADR -->
<main>
    <div  class="container">
        <div style="padding-top: 100px;width:1300px;"id="ant-layout">
        <section class="search-pc">
                <i class="fas fa-search"></i>
                <form action="products.php" method="GET" >
                    <input name="search" type="text" placeholder="Tìm đồ khác">
                </form>
            </section>
        </div>
        <!-- <div class="bg-grey">

        </div> -->
        <!-- END LAYOUT  -->
        <section class="main">
            <section class="oder-product" >
                <div class="title">
                    <section class="main-order">
                        <h1><?= $product['title'] ?></h1>
                        <div class="box">
                          <div class="left" >
                            <li >
                              <div class="main_image" >
                                <img src="<?='admin/product/'.$product['thumbnail'] ?>" alt="">
                              </div>
                              <div class="main_image">
                                <img src="<?='admin/product/'.$product['thumbnail_1'] ?>" alt="">
                              </div>
                              <div class="main_image">
                                <img src="<?='admin/product/'.$product['thumbnail_2'] ?>" alt="">
                              </div>
                            </li>

                            <!-- <li>
                              <div class="main_image">
                                <img src="<?='admin/product/'.$product['thumbnail_3'] ?>" alt="">
                              </div>
                              <div class="main_image">
                                <img src="<?='admin/product/'.$product['thumbnail_4'] ?>" alt="">
                              </div>
                              <div class="main_image">
                                <img src="<?='admin/product/'.$product['thumbnail_5'] ?>" alt="">
                              </div>
                            </li> -->

                          </div>

                          
<style>
.left {
display: flex;
padding-right: 30px;

}
.main_image {
  width: 420;
  height: 400;
  margin-bottom:100px;
  margin-top: 100px;
  margin-left:-10px;
 margin-right: 30px;
  
}
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
</style>                       
<div class="about">
    <p style="padding-top:105px;margin-left:10px; width:300px"><?= $product['content'] ?></p>

    <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("myDIV");
        var btns = header.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>

    <div class="number" style="padding-top:10px;margin-left:10px;">
        <span class="number-buy">Quantity</span>
        <input id="num" type="number" value="1" min="1" onchange="updatePrice()">
    </div>

    <p class="price" style="padding-top:70px;margin-left:10px;">Price: <span id="price"><?= number_format($product['price'], 0, ',', '.') ?></span><span> VNĐ</span><span class="gia none"><?= $product['price'] ?></span></p>
    <button class="add-cart" style="margin-left:10px;" onclick="addToCart(<?= $id ?>)"><i class="fas fa-cart-plus"></i><a href="/cart.php"></a> Add to cart</button>
    <button class="buy-now" style="margin-left:10px;" onclick="buyNow(<?= $id ?>)">Buy</button>

    <script>
        function updatePrice() {
            var price = document.getElementById('price').innerText; // giá tiền
            var num = document.querySelector('#num').value; // số lượng
            var gia1 = document.querySelector('.gia').innerText;
            var gia = price.match(/\d/g);
            gia = gia.join("");
            var tong = gia1 * num;
            document.getElementById('price').innerHTML = tong.toLocaleString();
        }
    </script>

    <br>
    <br>
    <br>
    <br>

<!-- HTML cho bảng danh sách bình luận -->
<table id="comment-list" class="table table-striped table-bordered">
  <thead class="table-dark">
  </thead>
</table>



 <!-- Phần bình luận -->
 <form id="comment-form" action="add_comment.php" method="post" class="needs-validation" novalidate>
  <input type="hidden" name="product_id" value="<?= $id ?>">
  
  <div class="mb-3">
    <label for="username" class="form-label">Tên người dùng:</label>
    <input type="text" name="username" class="form-control" placeholder="Nhập tên người dùng" required>
    <div class="invalid-feedback">
      Vui lòng nhập tên người dùng.
    </div>
  </div>
  
  <div class="mb-3">
    <label for="phone" class="form-label">Số điện thoại:</label>
    <input type="tel" name="phone" class="form-control" placeholder="Nhập số điện thoại" required>
    <div class="invalid-feedback">
      Vui lòng nhập số điện thoại.
    </div>
  </div>
  
  <div class="mb-3">
    <label for="comment" class="form-label">Bình luận:</label>
    <textarea name="comment" class="form-control" placeholder="Viết bình luận của bạn" required></textarea>
    <div class="invalid-feedback">
      Vui lòng nhập nội dung bình luận.
    </div>
  </div>
  
  <div class="mb-3">
    <label for="rating" class="form-label">Đánh giá:</label>
    <select name="rating" id="rating" class="form-select">
      <option value="1">1 sao</option>
      <option value="2">2 sao</option>
      <option value="3">3 sao</option>
      <option value="4">4 sao</option>
      <option value="5">5 sao</option>
    </select>
  </div>
  
  <button type="submit" class="custom-button">Gửi bình luận và đánh giá</button>
</form>
                            <script>
                              // Sử dụng AJAX để gửi bình luận mới và cập nhật danh sách bình luận
function addComment() {
  var commentText = document.querySelector('#comment-form textarea').value;
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'add_comment.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      // Bình luận đã được gửi thành công, cập nhật danh sách bình luận
      updateCommentList();
    }
  };
  xhr.send('comment=' + encodeURIComponent(commentText));
}

// Cập nhật danh sách bình luận bằng AJAX
function updateCommentList() {
  var productID = <?= $id ?>;// Lấy ID sản phẩm từ nguồn nào đó, ví dụ: từ phần tử HTML có chứa ID
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'get_comments.php?product_id=' + productID, true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      var commentList = document.querySelector('#comment-list');
      commentList.innerHTML = xhr.responseText;
    }
  };
  xhr.send();
}


// Gọi hàm updateCommentList để hiển thị các bình luận đã có khi trang tải
window.onload = function() {
  updateCommentList();
};
                            </script>

</div>
</section>
<section class="restaurants">
    <div class="title">
        <h1>More products here</h1>
    </div>
    <div class="product-restaurants">
        <div class="row">
            <?php
            $sql = 'select * from product';
            $productList = executeResult($sql);
            $index = 1;
            foreach ($productList as $item) {
                echo '
                <div class="col">
                    <a href="details.php?id=' . $item['id'] . '">
                        <img class="thumbnail" src="admin/product/' . $item['thumbnail'] . '" alt="">
                        <div class="title">
                            <p>' . $item['title'] . '</p>
                        </div>
                        <div class="price">
                            <span>' . number_format($item['price'], 0, ',', '.') . ' VNĐ</span>
                        </div>
                        <div class="more">
                            <div class="star">
                                <img src="images/icon/icon-star.svg" alt="">
                                <span>4.9</span>
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
    </div>
</main>

</div>
<script type="text/javascript">
    function addToCart(id) {
        var num = document.querySelector('#num').value; // số lượng
        $.post('api/cookie.php', {
            'action': 'add',
            'id': id,
            'num': num
        }, function(data) {
            location.reload()
        })
    }

    function buyNow(id) {
            $.post('api/cookie.php', {
                'action': 'add',
                'id': id,
                'num': 1
            }, function(data) {
                location.assign("checkout.php");
            })
    }
</script>
</body>
<style>

.btn {
border: none;
outline: none;
background-color: #fffefe;
border: 2px solid #c2c2c2;
color:black;
cursor: pointer;
font-size: 14px;
font-weight: 500;
width:70px;

}



.custom-button {
  background-color: green;
  color: white;
  font-size: 16px;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
}


.comments {
  margin-top: 20px;
}

.comments h2 {
  font-size: 20px;
  margin-bottom: 10px;
}

.comments #comment-list {
  list-style: none;
  padding: 0;
}

.comments #comment-list li {
  margin-bottom: 10px;
}

.comments #comment-form textarea {
  width: 100%;
  height: 100px;
  padding: 5px;
  border: 1px solid #ccc;
  resize: vertical;
}

.comments #comment-form button {
  margin-top: 10px;
  padding: 5px 10px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  cursor: pointer;
}

.comments #comment-form button:hover {
  background-color: #45a049;
}
  
  /* Style the active class, and buttons on mouse-over */
  .active, .btn:hover {
    border: 2px solid #000000;
  }
.option{
    width: 800px;
    width: 700px;
}

    

section.main section.oder-product {
  display: grid;
  grid-template-columns: auto -10%;
  
}
section.main section.oder-product .link a {
  text-decoration: none;
  color: black;
  font-size: 20px;
}
section.main section.oder-product .title h1 {
  font-size: 35px;
  font-family: 'Encode Sans SC', sans-serif;
  margin: 0px;
  padding: 0px;
  color: black;
  padding: 30px;
}
section.main section.oder-product .title .main-order .box {
  display: flex;
}
section.main section.oder-product .title .main-order .box img {
  width: 100%;
}
section.main section.oder-product .title .main-order .box .about p {
  font-size: 17px;
  color: rgb(44, 38, 38);
  font-weight: 500;
}
section.main section.oder-product .title .main-order .box .about .size {
  display: flex;
}
section.main section.oder-product .title .main-order .box .about .size p {
  font-weight: 500;
}
section.main section.oder-product .title .main-order .box .about .size ul {
  display: flex;
  list-style: none;
}
section.main section.oder-product .title .main-order .box .about .size ul li a {
  padding: 5px 10px;
  border: 1px solid;
  margin: 0 5px;
  text-decoration: none;
  color: black;
}

section.main
  section.oder-product
  .title
  .main-order
  .box
  .about
  .number
  .number-buy {
  font-weight: 500;
}
section.main section.oder-product .title .main-order .box .about .price {
  font-weight: 500;
}
section.main section.oder-product .title .main-order .box .about .price .none {
  display: none;
}
section.main section.oder-product .title .main-order .box .about .price span {
  color: red;
  font-weight: 600;
}
section.main section.oder-product .title .main-order .box .about .buy-now {
  padding: 13px 30px;
  background-color: rgb(255, 0, 0);
  border-radius: 3px;
  color: white;
  border: none;
}
section.main
  section.oder-product
  .title
  .main-order
  .box
  .about
  .buy-now:hover {
  cursor: pointer;
  opacity: 0.8;
}
section.main section.oder-product .title .main-order .box .about .add-cart {
  padding: 13px 30px;
  background-color: rgba(255, 68, 35, 0.856);
  border-radius: 3px;
  color: white;
  border: none;

}
section.main section.oder-product .title .main-order .box .about .add-cart i {
  padding: 0 5px;
}
section.main
  section.oder-product
  .title
  .main-order
  .box
  .about
  .add-cart:hover {
  cursor: pointer;
  opacity: 0.8;
}
/* END SẢN PHẨM  */
aside h1 {
  font-size: 30px;
  margin: 0px;
  padding: 0px;
  padding-left: 40px;
}
aside .row {
  display: flex;
  flex-flow: column;
  padding-left: 40px;
  
}
aside .row .col {
  border: 1px solid grey;
  margin: 20px 0px 5px 0px;
  border-radius: 5px;
  
}
aside .row .col a {
  display: flex;
}
aside .row .col img {
  width: 50%;
}
aside .row .col a .about .title {
  color: black;
}
aside .row .col a .about .title p {
  padding: 0;
  margin-top: 5px;
  font-weight: 600;
  font-size: 20px;
  font-family: 'Encode Sans SC', sans-serif;
}
aside .row .col a .about .title span {
  font-weight:bold;
  color: red;
}
/* END Gợi ý cho bạn */
section.comment {
  margin: 5rem 0;
  border-top: 1px solid black;
}
section.comment .container {
  display: grid;
  grid-template-columns: auto 30%;
}
section.comment .container .post {
  display: flex;
  flex-flow: column;
}
body {
  margin: 0px;
  padding: 0px;
  font-family: SanomatGrabApp, -apple-system, BlinkMacSystemFont, Segoe UI,
    PingFang SC, Hiragino Sans GB, Microsoft YaHei, Helvetica Neue, Helvetica,
    Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol;
}
#wrapper {
  width: 100%;
  margin: 0 auto;
}
#wrapper header {
  width: 100%;
  margin: 0px auto;
  /* background-color: rgb(170, 255, 227); */
  padding: 10px 0;
}
#wrapper header .container {
  width: 90%;
  margin: 0px auto;
  /* display: flex; */
  /* justify-content: space-between;
  align-items: center; */
  display: grid;
  grid-template-columns: 20% auto auto;
}
header section.logo {
  display: flex;
  align-items: center;
}
header section.logo a img {
  width: 60%;

}
#wrapper header .container nav {
  text-align: left;
}
#wrapper header .container nav ul {
  display: flex;
}
#wrapper header .container nav ul li {
  padding: 10px;
  list-style: none;
}
#wrapper header .container nav ul li a {
  text-decoration: none;
  color: rgb(43, 38, 38);
  padding: 10px;
  /* background-color: #f7f7f7; */
  text-transform: uppercase;
  font-weight: 700;
  font-family: Muli, Futura, Helvetica, Arial, sans-serif;
  position: relative;

}
#wrapper header .container nav ul li a::after {
  content: "";
  position: absolute;
  bottom: 10px;
  left: 0px;
  height: 3px;
  width: 100%;
  background-color: #00b14f;
  display: none;
}
#wrapper header .container nav ul li a:hover:after {
  display: block;
}

  /* MENU CON - CHA  */
#wrapper header .container nav ul li.nav-cha{
  position: relative;
  transition: all 0.4s;

}
#wrapper header .container nav ul li ul{
  position: absolute;
  display: flex;
  flex-flow: column;
  left: 0;
  top: 35px;
  width: 150%;
  background-color: rgb(255, 255, 255);
  box-shadow: 0px 0px 5px 0px rgb(212, 212, 212);
  z-index: 100;
  padding: 0;
  border-radius: 5px;
}
#wrapper header .container nav ul li ul li{
  text-align: center;
  padding: 10px 0px;
  display: none;
  transition: all 0.4s;

}
#wrapper header .container nav ul li ul li a{
  text-decoration: none;
  margin: 10px 0;
  color: black;
  font-weight: bold;
}
#wrapper header .container nav ul li.nav-cha:hover ul li{
  display: block;
}
  /* MENU CON - CHA  */

#wrapper header .container section.menu-right {
  display: flex;
  align-items: center;
}
#wrapper header .container section.menu-right .cart {
  padding: 5px;
  border: 1px solid rgb(196, 196, 196);
  border-radius: 3px;
  margin: 0 10px;
  position: relative;
}
#wrapper header .container section.menu-right .cart span {
  position: absolute;
  top: 0px;
  right: 0;
  font-weight: 500;
  color: rgb(122, 115, 115);
}
#wrapper header .container section.menu-right .cart:hover {
  box-shadow: 0px 0px 3px 0px grey;
  cursor: pointer;
}
#wrapper header .container section.menu-right .cart:hover .history {
  opacity: 1;
}
#wrapper header .container section.menu-right .cart a {
  padding: 5px;
  text-decoration: none;
}
#wrapper header .container section.menu-right .cart .history {
  transition: all 0.5s;
  opacity: 0;
  margin-top: 0.7rem;
  display: flex;
  text-align: center;
  flex-flow: column;
  padding: 5px 0;
  border-radius: 10%;
  width: 100px;
  position: absolute;
  left: -75%;
  top: 1.3rem;
  z-index: 10;
}
#wrapper header .container section.menu-right .cart .history a {
  font-weight: 600;
  color: black;
}
#wrapper header .container section.menu-right .cart .history a:hover {
  color: rgb(41, 39, 39);
}
#wrapper header .container section.menu-right .login {
  padding: 7px;
  border: 1px solid rgb(196, 196, 196);
  border-radius: 3px;
  margin: 0 10px;
  position: relative;
}
#wrapper header .container section.menu-right .login:hover {
  box-shadow: 0px 0px 3px 0px grey;
  cursor: pointer;
}
#wrapper header .container section.menu-right .login a {
  padding: 5px;
  text-decoration: none;
  color: #676767;
  font-weight: 500;
}
#wrapper header .container section.menu-right .login:hover .logout{
  display: block;
}
#wrapper header .container section.menu-right .login .logout{
  display: none;
  position: absolute;
  top: 2.3rem;
  left: 0px;
  z-index: 10;
  width: 150%;
  border: 1px solid grey;
  border-radius: 5px;
  padding: 10px 0;
}
#wrapper header .container section.menu-right .login .logout a{
  color: black;
  font-weight: 500;
  border-radius: 5px;
  margin: 10px 0;
}
#wrapper header .container section.menu-right .login .logout a:hover{
opacity: 0.8;
}
/* END HEADER  */
main .container {
  width: 90%;
  margin: 0px auto;
}
main section.search-pc {
  width: 100%;
  margin: 0px auto;
  position: relative;
  display: flex;
  justify-content: center;
}
main section.search-pc i {
  position: absolute;
  left: 2%;
  top: 50%;
  transform: translateY(-50%);
  color: #676767;
}
main section.search-pc form{
  width: 100%;
}
main section.search-pc input {
  width: 90%;
  padding: 15px 50px;
  border-radius: 10px;
  outline: 0;
  border: 0;
  background-color: #f7f7f7;
}
/* END MAIN TOP  */
main #ant-layout section.main-layout {
  padding: 2rem 0;
  margin: 0px auto;
  width: 100%;
}
main #ant-layout section.main-layout .row {
  display: grid;
  grid-template-columns: auto auto auto auto auto auto;
  grid-column-gap: 10px;
}
main #ant-layout section.main-layout .row .box a {
  text-decoration: none;
}
main #ant-layout section.main-layout .row .box:hover {
  filter: drop-shadow(8px 5px 10px gray);
}
main #ant-layout section.main-layout .row .box {
  position: relative;
}
main #ant-layout section.main-layout .row .box p {
  position: absolute;
  z-index: 2;
  left: 50%;
  top: 25%;
  transform: translateX(-50%);
  color: white;
  font-weight: bold;
  font-size: 18px;
}
main #ant-layout section.main-layout .row .box .bg {
  background-color: rgba(0, 0, 0, 0.4);
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  z-index: 1;
  display: block;
  border-radius: 5px;
}
main #ant-layout section.main-layout .row img {
  width: 100%;
  height: 100%;
  border-radius: 5px;
  /* filter:drop-shadow(8px 5px 10px gray); */
}
.bg-grey {
  background-color: #f7f7f7;
  height: 10px;
  border-radius: 3px;
}
/* <!-- END LAYOUT  --> */

section.main {
  padding: 2rem 0;
  width: 100%;
  margin: 0px auto;
}
section.main a {
  text-decoration: none;
}
section.main section.recently {
  padding-bottom: 1rem;
}
section.main section.recently .link a {
  text-decoration: none;
  color: black;
  font-size: 20px;
}
section.main section.recently .title h1 {
  font-size: 35px;
  margin: 0px;
  padding: 0px;
  color: black;
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
/* end mon ngon gần bạn  */

section.main section.restaurants {
  padding: 3rem 0;
}

section.main section.restaurants .link a {
  text-decoration: none;
  color: black;
  font-size: 20px;
}
section.main section.restaurants .title h1 {
  font-size: 35px;
  margin: 0px;
  padding: 0px;
  color: black;
}
section.main section.restaurants .title h1 span {
  color: green;
}
section.main section.restaurants .product-restaurants {
  padding-top: 2rem;
}
section.main section.restaurants .product-restaurants .row {
  display: grid;
  grid-template-columns: auto auto auto auto;
  grid-column-gap: 30px;
  grid-row-gap: 30px;
}
section.main section.restaurants .product-restaurants .row .col img {
  width: 100%;
  border-radius: 10px;
}
section.main section.restaurants .product-restaurants .row .col img.thumbnail {
  border: 1px solid rgb(76, 78, 85);
  transition: 0.1s;
}
section.main
  section.restaurants
  .product-restaurants
  .row
  .col
  img.thumbnail:hover {
  box-shadow: 0px 0px 5px 0px grey;
}

section.main section.restaurants .product-restaurants .row .col .title p {
  font-size: 20px;
  font-weight: 600;
  padding: 0px;
  margin: 5px 0;
  color: rgb(43, 31, 31);
  font-family: "Encode Sans SC", sans-serif;
}
@import url("https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Encode+Sans+SC:wght@500;600;700&display=swap");

section.main section.restaurants .product-restaurants .row .col .price span {
  padding: 10px 0;
  color: #676767;
  font-size: 20px;
  font-weight: 600;
  color: rgba(207, 16, 16, 0.815);
}

section.main section.restaurants .product-restaurants .row .col .more {
  display: flex;
  color: #676767;
  padding: 5px 0;
  font-size: 18px;
}
section.main section.restaurants .product-restaurants .row .col .more .star {
  display: flex;
  align-items: center;
  justify-content: center;
}

section.main
  section.restaurants
  .product-restaurants
  .row
  .col
  .more
  .star
  img {
  width: 25px;
  height: 25px;
}
section.main section.restaurants .product-restaurants .row .col .more .time {
  display: flex;
  padding: 0 10px;
}
section.main
  section.restaurants
  .product-restaurants
  .row
  .col
  .more
  .time
  img {
  width: 24px;
  height: 24px;
}
.pagination{
  margin: 0px auto;
  padding-top: 2rem;
}
.pagination ul{
  display: flex;
  list-style: none;
  /* justify-content: center; */
}
.pagination ul li{
  background-color: rgb(0, 124, 29);
  margin: 0px 5px;
  border-radius: 2px;
  padding: 5px;
}
.pagination ul li a{
  padding: 20px 10px;
  color: white;
  font-weight: 500;
}


</style>
</html>
<!--------------------FOOTER--------------------------- -->

<?php require_once('Layout/footer.php'); ?>
<style>

/*----------------FOOTER--------------------*/

footer{
    background:rgb(0, 0, 0);
    display:flex;
    margin-top:0px;
    justify-content: space-around;
    margin-bottom:0px;
    padding-bottom: 20px;   /*chỉnh size background đen */
    padding-left:150px;
    
}
footer.col{
    
    display:flex;
    flex-direction:column;
    align-items: flex-start;
    margin-top: 100p;
}
footer h4{   /*chỉnh size chữ H4*/
    color:rgb(255, 255, 255);
    font-size: 16px;
    padding-bottom:30px;
    margin-top:40px;
    font-weight: bold;
}
footer p{  /*chỉnh size chữ P*/
    color:rgb(255, 255, 255);
    font-size: 13px;
    text-decoration:none;
    margin-bottom:15px;

 
}
footer li i{ /*chỉnh icon fb,instagram,youtube*/
    color:#fff;
    margin-top: 3px;
    font-weight: bold;
    margin-left: -20px;
    padding-top:16px/*chỉnh lại vị trí trên dưới của icon trong FOOTER*/
    
}
@media screen and  (max-width: 870px)  and (min-width:300px){
    body {
   width: 1800px;
    }
  }
</style>

<style>