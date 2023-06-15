<?php require_once('connectdatabase.php');?>
<?php
session_start();

// Lấy dữ liệu từ form
$tendangnhap = $_POST['tendangnhap'];
$matkhau_cu = $_POST['matkhau_cu'];
$matkhau_moi = $_POST['matkhau_moi'];

// Lấy id_dangky dựa trên tendangnhap
$sql = "SELECT id_dangky FROM tbl_dangky WHERE tendangnhap = '$tendangnhap'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id_dangky = $row['id_dangky'];

    // Kiểm tra mật khẩu hiện tại
    $check_password_sql = "SELECT matkhau FROM tbl_dangky WHERE id_dangky = $id_dangky";
    $check_password_result = mysqli_query($conn, $check_password_sql);

    if (mysqli_num_rows($check_password_result) > 0) {
        $row = mysqli_fetch_assoc($check_password_result);
        $password = $row['matkhau'];
        if ($matkhau_cu === $password) {
            // Mật khẩu hiện tại hợp lệ, tiến hành cập nhật mật khẩu mới
            $update_sql = "UPDATE tbl_dangky SET matkhau = '$matkhau_moi' WHERE id_dangky = $id_dangky";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success_message'] = "Mật khẩu đã được thay đổi thành công.";
            } else {
                $_SESSION['error_message'] = "Lỗi cập nhật mật khẩu.";
            }
        } else {
            $_SESSION['error_message'] = "Mật khẩu hiện tại không đúng.";
        }
    } else {
        $_SESSION['error_message'] = "Lỗi kiểm tra mật khẩu hiện tại.";
    }
} else {
    $_SESSION['error_message'] = "Tên đăng nhập không tồn tại.";
}

// Đóng kết nối
mysqli_close($conn);

// Trở về trang index.php
header("Location: newpassword.php");
exit();
?>