<?php require_once('connectdatabase.php');?>

<?php

// Truy vấn để lấy danh sách sản phẩm
$sql = 'SELECT DISTINCT product_id FROM comments';
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $product_id = $row['product_id'];

    // Truy vấn để lấy trung bình cộng của ratings từ cột "rating" trong bảng comments theo product_id
    $sqlAvg = "SELECT AVG(rating) AS average_rating FROM comments WHERE product_id = $product_id";
    $resultAvg = $conn->query($sqlAvg);

    if ($resultAvg->num_rows > 0) {
        $rowAvg = $resultAvg->fetch_assoc();
        $averageRating = $rowAvg["average_rating"];
    } else {
        $averageRating = 0; // Giá trị mặc định nếu không có đánh giá
    }

    // Hiển thị trung bình cộng rating cho từng sản phẩm
    echo "Đánh giá trung bình cho product_id $product_id: " . $averageRating . "<br>";
}

// Đóng kết nối tới cơ sở dữ liệu
$conn->close();
?>
