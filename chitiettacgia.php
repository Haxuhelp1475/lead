<?php
include('connect.php');

// Kiểm tra xem có tham số TenTacGia được truyền vào không
if(isset($_GET['TenTacGia'])) {
    $tenTacGia = $_GET['TenTacGia'];

    // Truy vấn để lấy thông tin chi tiết của tác giả từ cơ sở dữ liệu
    $sql = "SELECT * FROM user WHERE hoVaTen = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $tenTacGia);
    $stmt->execute();
    $result = $stmt->get_result();

    // Kiểm tra xem có dữ liệu được trả về không
    if ($result->num_rows > 0) {
        // Hiển thị thông tin chi tiết của tác giả
        $row = $result->fetch_assoc();
        ?>

        <!DOCTYPE html>
        <html lang="vi">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Chi Tiết Tác Giả</title>
            <style>
                .author-info p {
                    margin: 10px 0;
                }

                .bantin {
                    border: 1px solid #ddd;
                    padding: 10px;
                    margin: 10px 0;
                    text-align: LEFT;
                }

                .pagination {
                    text-align: center;
                    margin-top: 20px;
                }

                .pagination a {
                    margin: 0 5px;
                    text-decoration: none;
                    padding: 5px 10px;
                    border: 1px solid #ddd;
                    color: #000;
                }

                .pagination a:hover {
                    background-color: #f2f2f2;
                }
                a{
                    text-decoration: none;
                }
            </style>
        </head>
        <body>
        <div class="author-info">
            <h2>Thông tin chi tiết của tác giả: <?php echo $row['hoVaTen']; ?></h2>
            <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
            <p><strong>Số điện thoại:</strong> <?php echo $row['SDT']; ?></p>
            <p><strong>Địa chỉ:</strong> <?php echo $row['diaChi']; ?></p>
        </div>

        <?php
        // Phân trang các bản tin
        $limit = 5; // Số lượng bản tin trên mỗi trang
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        // Truy vấn để lấy các bản tin của tác giả đó
        $sql_bantin = "SELECT id_tin, tieuDe FROM bantin WHERE tacGia = ? AND trangThai = 1 LIMIT ? OFFSET ?";
        $stmt_bantin = $conn->prepare($sql_bantin);
        $stmt_bantin->bind_param("sii", $tenTacGia, $limit, $offset);
        $stmt_bantin->execute();
        $result_bantin = $stmt_bantin->get_result();

        // Hiển thị các bản tin
        if ($result_bantin->num_rows > 0) {
            echo "<h3>Các tin đã đăng:</h3>";
            while($row_bantin = $result_bantin->fetch_assoc()) {
                echo "<div class='bantin'>";
                echo "<p><strong><a href='chitietbantin.php?id_tin=" . $row_bantin['id_tin'] . "'>" . $row_bantin['tieuDe'] . "</a></strong></p>";
                echo "</div>";
            }

            // Hiển thị phân trang
            $sql_count = "SELECT COUNT(*) as total FROM bantin WHERE tacGia = ? AND trangThai = 1";
            $stmt_count = $conn->prepare($sql_count);
            $stmt_count->bind_param("s", $tenTacGia);
            $stmt_count->execute();
            $result_count = $stmt_count->get_result();
            $total = $result_count->fetch_assoc()['total'];
            $total_pages = ceil($total / $limit);

            echo "<div class='pagination'>Page ";
            for ($i = 1; $i <= $total_pages; $i++) {
                echo "<a href='chitiettacgia.php?TenTacGia=" . urlencode($tenTacGia) . "&page=$i'>$i</a> ";
            }
            echo "</div>";

            $stmt_bantin->close();
            $stmt_count->close();
        } else {
            echo "<p>Không có bản tin nào.</p>";
        }
        ?>

        </body>
        </html>

        <?php
    } else {
        echo "Không tìm thấy thông tin cho tác giả này.";
    }

    $stmt->close();
} else {
    echo "Không có thông tin tác giả được truyền vào.";
}

$conn->close();
?>
