<?php
session_start();
include('connect.php');

if (isset($_GET['id_tin'])) {
    // Lấy id từ tham số truyền qua
    $id_tin = $_GET['id_tin'];

    // Chuẩn bị truy vấn để lấy thông tin chi tiết bài báo từ cơ sở dữ liệu
    $sql = "SELECT * FROM bantin WHERE id_tin = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        // Liên kết biến với tham số
        $stmt->bind_param("i", $id_tin);

        // Thực thi truy vấn
        $stmt->execute();

        // Lấy kết quả
        $result = $stmt->get_result();

        // Kiểm tra xem có bài báo nào không
        if ($result->num_rows > 0) {
            // Lấy dữ liệu bài báo từ kết quả truy vấn
            $row = $result->fetch_assoc();
            $tieude = $row['tieuDe'];
            $noiDung = $row['noiDung'];
            $hinhAnh = $row['hinhAnh'];
            $tacGia = $row['tacGia'];
            $id_nhom = $row['id_nhom'];
            $thoiGian = $row['thoiGian'];

            // Truy vấn để lấy tên nhóm dựa trên id_nhom
            $sql_nhom = "SELECT tenNhom FROM nhomTin WHERE id_nhom = ?";
            if ($stmt_nhom = $conn->prepare($sql_nhom)) {
                $stmt_nhom->bind_param("i", $id_nhom);
                $stmt_nhom->execute();
                $result_nhom = $stmt_nhom->get_result();
                if ($result_nhom->num_rows > 0) {
                    $row_nhom = $result_nhom->fetch_assoc();
                    $tenNhom = $row_nhom['tenNhom'];
                } else {
                    $tenNhom = "Không xác định";
                }
                $stmt_nhom->close();
            } else {
                $tenNhom = "Không xác định";
            }
 ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SPORTS NEWS</title>
    <link rel="stylesheet" href="style.css" />
    <style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 65%;
        margin: 0 auto;
        padding: 20px;
    }

    .article {
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .article img {
        width: 100%;
        height: auto;
    }

    .article h1 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .article p {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .article .meta {
        font-size: 14px;
        color: #555;
        margin-bottom: 10px;
    }

    .article .author {
        font-size: 14px;
        color: #555;
        margin-top: 20px;
        text-align: right;
    }
    </style>
</head>

<body>
    <div id="logo">
        <h1><img src="https://i.imgur.com/Cc3S8Di.png"></h1>
    </div>
    <header>
    </header>
    <!--/id header-->
    <?php include('menu.php'); ?>

    <div class="container">
        <div class="article">
            <div class="meta">
                <span>Thể loại: <?php echo htmlspecialchars($tenNhom); ?></span><br>
                <span>Thời gian: <?php echo htmlspecialchars($thoiGian); ?></span>
            </div>
            <h1><?php echo htmlspecialchars($tieude); ?></h1>
            <img src="<?php echo htmlspecialchars($hinhAnh); ?>" alt="<?php echo htmlspecialchars($tieude); ?>">
            <p><?php echo nl2br(htmlspecialchars($noiDung)); ?></p>
            <div class="author">Tác giả: <?php echo htmlspecialchars($tacGia); ?></div>
        </div>
        <?php 
        include('quangcao.php');
        ?>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>
<?php
        } else {
            echo "Không tìm thấy bài báo.";
        }

        // Đóng câu lệnh
        $stmt->close();
    } else {
        echo "Lỗi chuẩn bị truy vấn: " . $conn->error;
    }
} else {
    echo "Thiếu thông tin id bài báo.";
}

$conn->close();
?>