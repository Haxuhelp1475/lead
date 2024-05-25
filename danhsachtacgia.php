<?php
include('connect.php');

// Truy vấn để lấy thông tin tác giả và số bài viết của họ
$sql = "SELECT user.hoVaTen AS TenTacGia, COUNT(bantin.id_tin) AS SoBaiViet FROM user LEFT JOIN bantin ON user.hoVaTen = bantin.tacGia WHERE user.vaiTro = 'tác giả' GROUP BY user.hoVaTen";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPORTS NEWS</title>
    <link rel="stylesheet" href="dangnhap.css">
    <style>
        .authors table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        .authors th, .authors td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        .authors th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
include('header.php');
include('menu.php');
?>
<!-- Danh sách tác giả -->
<div class="authors">
    <h2>DANH SÁCH TÁC GIẢ</h2>
    <table>
        <tr>
            <th>Tên tác giả</th>
            <th>Số bài viết</th>
            <th>Chi tiết</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Hiển thị dữ liệu từ cơ sở dữ liệu
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["TenTacGia"] . "</td>";
                echo "<td>" . $row["SoBaiViet"] . "</td>";
                echo "<td><a href='chitiettacgia.php?TenTacGia=" . $row["TenTacGia"] . "'>Xem chi tiết</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
        }
        ?>
    </table>
</div>
<br>
<br>
<?php
include('footer.php');
?>
</body>
</html>

<?php
// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>
