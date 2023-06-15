<?php require_once('connectdatabase.php');?>

<?php
if (isset($_POST['comment']) && isset($_POST['product_id']) && isset($_POST['rating']) && isset($_POST['username']) && isset($_POST['phone'])) {
    $comment = $_POST['comment'];
    $product_id = $_POST['product_id'];
    $rating = $_POST['rating'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];

    // Chuẩn bị truy vấn để chèn bình luận và đánh giá vào cơ sở dữ liệu
    $sql = "INSERT INTO comments (comment_text, product_id, rating, username, phone) VALUES ('$comment', '$product_id', '$rating', '$username', '$phone')";

    if (empty($username) || empty($phone)) {
        echo '<script>alert("Vui lòng nhập tên người dùng và số điện thoại.");</script>';
        echo '<script>window.location.href = "details.php?id=' . $product_id . '";</script>';
    } else if ($conn->query($sql) === TRUE) {
        // Phản hồi thành công cho yêu cầu
        echo '<script>alert("Bình luận và đánh giá đã được cập nhật thành công!");</script>';
        echo '<script>window.location.href = "details.php?id=' . $product_id . '";</script>';
    } else {
        echo '<script>alert("Đã xảy ra lỗi khi cập nhật bình luận và đánh giá.");</script>'; // Phản hồi lỗi nếu có vấn đề khi cập nhật dữ liệu
    }

    // Đóng kết nối với cơ sở dữ liệu
    $conn->close();
}
?>
