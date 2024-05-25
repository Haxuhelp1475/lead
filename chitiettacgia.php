<?php
include('connect.php');

// Kiểm tra xem có tham số TenTacGia được truyền vào không
if(isset($_GET['TenTacGia'])) {
    $tenTacGia = $_GET['TenTacGia'];

    // Truy vấn để lấy thông tin chi tiết của tác giả từ cơ sở dữ liệu
    $sql = "SELECT * FROM user WHERE hoVaTen = '$tenTacGia'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Lặp qua các dòng dữ liệu và hiển thị thông tin chi tiết của tác giả
        while($row = $result->fetch_assoc()) {
            echo "<h2>Thông tin chi tiết của tác giả: " . "</h2>";
            echo "<p><strong>" . $row['hoVaTen'] . "</strong></p>";
            echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
            echo "<p><strong>Số điện thoại:</strong> " . $row['diaChi'] . "</p>";
            echo "<p><strong>Địa chỉ:</strong> " . $row['diaChi'] . "</p>";
        }
    } else {
        echo "Không tìm thấy thông tin cho tác giả này.";
    }
} else {
    echo "Không có thông tin tác giả được truyền vào.";
}
$conn->close();
?>