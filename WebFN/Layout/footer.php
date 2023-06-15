
<?php
include('config.php');
?>
<!--------------------FOOTER--------------------------- -->
<footer class="section-p1"><!--mục footer -->
    <div class="col">
        <h4>HỆ THỐNG CỬA HÀNG</h4><!--Hệ thông cửa hàng -->
        <p>Main Campus: 475A Dien Bien Phu, Ward 25, Binh Thanh District, Ho Chi Minh City.</p>
    </div> 
    <div class="col">
        <h4>THÔNG TIN LIÊN HỆ</h4>
        <p>Website: https://www.hutech.edu.vn </a></p>
    </div>
    <div class="col">
        <h4>MẠNG XÃ HỘI</h4><!---->
        <li><i class="fa fa-facebook"></i><a href=>Facebook </li>
        <li><i class="fa fa-instagram"></i><a href=>Instagram </li>
        <li><i class="fa fa-youtube"></i><a href=>Youtube </li>            
    </div>    
</footer>
<style>
/*----------------FOOTER--------------------*/

footer{
    background:rgb(0, 0, 0);
    display:flex;
    margin-top:0px;
    justify-content: space-around;
    margin-bottom:0px;
    padding-bottom: 20px;   /*chỉnh size background đen */
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
    padding-top:16px/*chỉnh lại vị trí trên dưới của icon trong FOOTER*/
}
@media screen and  (max-width: 870px)  and (min-width:300px){
    body {
   width: 1800px;
    }
}
</style>
