<?php
session_start();
include('connect.php');

$tk = isset($_GET['timkiem']) ? $_GET['timkiem']:'';

$sql = "SELECT * FROM bantin WHERE tieuDe LIKE '%$tk%' OR moTa LIKE '%$tk%' ORDER BY id_tin DESC";
$result = $conn->query($sql);
 ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="logo">
        <h1><img src="https://i.imgur.com/Cc3S8Di.png"></h1>
    </div>
    <header>
    </header>
    <!--/id header-->
    <?php
    include('menu.php');
     ?>
    <div id="content">
        <div id="content-2">
            <div id="content-2L">
                <?php
         if ($result->num_rows > 0) {
            // Hiển thị danh sách các items
            while ($row_item = $result->fetch_assoc()) {
                $idt = $row_item['id_tin'];
                $idn = $row_item['id_nhom'];
                $tieude= $row_item['tieuDe'];
                $hinhAnh = $row_item['hinhAnh'];
                $moTa = $row_item['moTa'];
                $thoiGian = $row_item['thoiGian'];
                echo '<div id="items">';
                echo '<div class="left">';
                echo '<a href="tinTucCT.php?id_nhom=' .  $idn . '&id_tin=' . $idt . '">';
                echo '<img src="' . $hinhAnh . '"></a>';
                echo '</div>';
                echo '<div class="right">';
                echo '<a href="tinTucCT.php?id_nhom=' .  $idn . '&id_tin=' . $idt. '" class="a1">';
                echo '<h4>' . $tieude. '</h4></a>';
                echo '<p>' . $moTa . '</p>';
                echo '<span class="minutes">' . $thoiGian . '</span>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "Không có kết quả nào.";
        }
        // Giải phóng bộ nhớ của kết quả truy vấn
        $result->free_result(); 
        $conn->close();
        ?>
            </div>
        </div>
    </div>
    <?php 
    include('footer.php');
    ?>
</body>

</html>