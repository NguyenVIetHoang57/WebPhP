<?php require_once('connectdatabase.php');?>

<?php


// Lấy ID sản phẩm từ yêu cầu AJAX
$productID = $_GET['product_id'];

// Tạo kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối có thành công hay không
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Truy vấn để lấy danh sách bình luận dựa trên ID sản phẩm
$sql = "SELECT * FROM comments WHERE product_id = '$productID' ORDER BY created_at DESC LIMIT 4";
$result = $conn->query($sql);

// Kiểm tra xem có bình luận nào trong cơ sở dữ liệu hay không
if ($result->num_rows > 0) {
    // Bắt đầu xây dựng chuỗi HTML để hiển thị danh sách bình luận
    $commentListHTML = '<table id="comment-list" class="table table-striped table-bordered">';
    $commentListHTML .= '<thead class="table-dark">';
    $commentListHTML .= '<tr>';
    $commentListHTML .= '<th scope="col">Tên Người Dùng</th>';
    $commentListHTML .= '<th scope="col">Nhận Xét</th>';
    $commentListHTML .= '<th scope="col">Đánh Giá</th>';
    $commentListHTML .= '<th scope="col">Ngày Nhận Xét</th>';
    $commentListHTML .= '</tr>';
    $commentListHTML .= '</thead>';
    $commentListHTML .= '<tbody>';

    while ($row = $result->fetch_assoc()) {
        $commentListHTML .= '<tr>';
        $commentListHTML .= '<td>' . $row["username"] . '</td>';
        $commentListHTML .= '<td>' . $row["comment_text"] . '</td>';
        $commentListHTML .= '<td>' . $row["rating"] . '</td>';
        $commentListHTML .= '<td>' . $row["created_at"] . '</td>';
        $commentListHTML .= '</tr>';
    }

    $commentListHTML .= '</tbody>';
    $commentListHTML .= '</table>';

    // Trả về danh sách bình luận dưới dạng phản hồi AJAX
    echo $commentListHTML;
} else {
    echo 'Không có bình luận nào.';
}
// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>
