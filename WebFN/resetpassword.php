<?php require_once('connectdatabase.php');?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tendangnhap = $_POST['tendangnhap'];
    $email = $_POST['email'];

    // Truy vấn kiểm tra thông tin đăng nhập và email trong cơ sở dữ liệu
    $sql = "SELECT * FROM tbl_dangky WHERE tendangnhap = '$tendangnhap' AND email = '$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Người dùng tồn tại trong cơ sở dữ liệu, thực hiện khôi phục mật khẩu
        $newPassword = generateNewPassword(); // Tạo mật khẩu mới

        // Cập nhật mật khẩu mới vào cơ sở dữ liệu
        $sql = "UPDATE tbl_dangky SET matkhau = '$newPassword' WHERE tendangnhap = '$tendangnhap'";
        $conn->query($sql);

        // Gửi email chứa mật khẩu mới đến người dùng (cần cấu hình SMTP)
        // Khởi tạo đối tượng PHPMailer
        $mail = new PHPMailer;
        
        // Sử dụng SMTP
        $mail->isSMTP();
        
        // Cấu hình thông tin SMTP
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'kubi2k13@gmail.com';
        $mail->Password = 'qevwvdawxfbfmucm';
        $mail->SMTPSecure='tls';  
        // Cấu hình thông tin người gửi và địa chỉ email
        $mail->setFrom('kubi2k13@gmail.com', 'Duong Cao Thien 19DTHQA2');
        $mail->addAddress($_POST['email'], 'Recipient Name');
        
        // Cấu hình nội dung email
        $mail->isHTML(true);
        $mail->Subject = 'New Password';
        $mail->Body = 'Mật khẩu mới của bạn là: ' .  $newPassword . '';
        
        // Gửi email
        if (!$mail->send()) {
            $message = array(
                'type' => 'alert-danger',
                'text' => 'Gửi email không thành công. Lỗi: ' . $mail->ErrorInfo
            );
        } else {
            $message = array(
                'type' => 'alert-success',
                'text' => 'Mật khẩu đã được gửi tới địa chỉ email của bạn.'
            );
        }
    } else {
        $message = array(
            'type' => 'alert-danger',
            'text' => 'Khôi phục mật khẩu không thành công. Vui lòng kiểm tra lại thông tin đăng nhập và email.'
        );
    }
}

function generateNewPassword() {
    $length = 10; // Độ dài mật khẩu mới
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $newPassword = '';

    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $newPassword .= $characters[$index];
    }

    return $newPassword;
}

$conn->close();
header("Location: forgotpassword.php?message=" . urlencode($message['text']));
exit();
?>
