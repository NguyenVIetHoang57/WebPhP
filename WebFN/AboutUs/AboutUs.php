<?php
            session_start();
            if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
                unset($_SESSION['submit']);
                header('Location:index.php');
            }
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html" />  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>About Us</title>
    <link rel="stylesheet" href="AboutUs.css" />
</head>
<head>
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
    <link rel="stylesheet" href="plugin/fontawesome/css/all.css">
    <link rel="stylesheet" href="./login.css">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script><!--link lấy icon -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>About Us</title>
</head>
<!-----------------------HEARDER ----------------------------------------->
<header>
  <div id="menu" style="margin-top:10px;">
                    <ul>
                        <li><a href="/webfn/index.php">Home</a></li><!--Trang chủ -->
                        <li>
                            <a href="#">Laptop,PC</a><!--Top -->
                            <ul class="sub-menu">
                                <li><a href="/webfn/products.php?id_category=50">Laptop Acer</a></li>
                                <li><a href="/webfn/products.php?id_category=54">Laptop Lenovo</a></li>
                                <li><a href="/webfn/products.php?id_category=55">Laptop Asus</a></li>
                                <li><a href="/webfn/products.php?id_category=56">Laptop Gigabyte</a></li>
                                <li><a href="/webfn/products.php?id_category=51">PC Gaming</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Components</a><!--Bottom -->
                            <ul class="sub-menu">
                                <li><a href="/webfn/products.php?id_category=53">PC Components</a></li>
                                <li><a href="/webfn/products.php?id_category=52">Laptop Componets</a></li>
                            </ul>
                        </li>
                        <li><a href="/webfn/allproduct.php">All Product</a></li>

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
                                    <a style="font-size: 18px;" href="/webfn/newpassword.php"><i class="fas fa-exchange-alt"></i>Change Password</a> <br>                           
                                    <a style="font-size: 18px;" href="index.php?dangxuat=1"><i class="fas fa-sign-out-alt"></i>Logout</a>
                                </div>';
                                                        }
                } 
                else {
                             echo '<a href="login.php"">Log in</a>';
                                }
                ?>
                    
            </div>
            
            
            <li><a href="/webfn/cart.php" style="text-decoration:none; " ><i class="fas fa-shopping-bag"></i></a> <?php
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
<body>
    <div class="container">
            <h2 style="   text-align: center;
  padding:80px;
  font-size:25px;
  margin-top:-200px">About us</h2>
    <h5 style="    font-size:16.6px;
    color:rgb(0, 0, 0);
    text-align:center;
    padding-left:395px;
    padding-right:395px;
    letter-spacing:0.5px;
    line-height:40px;
    font-weight:500;
    padding-bottom:70px;">
        Hello Mọi Người</h5>
    </div>
    </body>
</html>

<!--------------------FOOTER--------------------------- -->

<footer class="section-p1"><!--mục footer -->
    <div class="col">
        <h4>HỆ THỐNG CỬA HÀNG</h4><!--Hệ thông cửa hàng -->
        <p>Main Campus: 475A Dien Bien Phu, Ward 25, Binh Thanh District, Ho Chi Minh City.</p>
    </div> 
    <div class="col">
        <h4>THÔNG TIN LIÊN HỆ</h4><!--Thông tin liên hệ -->
        <p>webfnsite: https://www.hutech.edu.vn </a></p>
    </div>
    <div class="col">
        <h4>MẠNG XÃ HỘI</h4><!---->
        <li><i class="fa fa-facebook"></i>  <a href=>Facebook </li>
        <li><i class="fa fa-instagram"></i> <a href=>Instagram </li>
        <li><i class="fa fa-youtube"></i>   <a href=>Youtube </li>            
    </div>    
</footer>
<!------------------------------------------------------------>
<style>
    s*{
    margin: 0;
    padding: 0;
}

i{/*  chỉnh icon ngôi sao */
    font-size:16px;
    text-align: center;
    padding-right: 10px;
}

h2{/*  chỉnh ô chứa chữ H2 */
text-align: center;
font-size:23px; 
padding-left:325px;/*  chỉnh khoảng cách 2 bên lề để song song với ảnh */
padding-right:343px;
padding-bottom:70px;
padding-top:100px;
}

h5{/*  chỉnh ô chứa chữ H5 */
    text-align: left;
    font-size:16px; 
    font-weight: 50;
    padding-left:340px;/*  chỉnh khoảng cách 2 bên lề để song song với ảnh */
    padding-right:343px;
    padding-top:10px;
    padding-bottom:18px;


    }

h6{/*  chỉnh ô chứa chữ H6 */
    text-align: left;
    font-size:17.5px; 
    font-weight: 600;
    text-decoration: underline;
    padding-left:355px;/*  chỉnh khoảng cách 2 bên lề để song song với ảnh */
    padding-right:343px;
    padding-bottom:10px;
    margin-top:-10px;/*  chỉnh khoảng cách so với chữ bên trên */
}
.image{/*  chỉnh ảnh trong mục body */
    align-items: center;
    text-align: center;
}





/*----------------FOOTER--------------------*/

footer{
    background:rgb(0, 0, 0);
    display:flex;
    margin-top:70px;
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
footer li{ /*chỉnh icon fb,instagram,youtube*/
    color:#fff;
    margin-top: 3px;
    font-weight: bold;
    
   
}
@media screen and  (max-width: 870px)  and (min-width:300px){
    body {
   width: 1500px;
    }
}
</style>