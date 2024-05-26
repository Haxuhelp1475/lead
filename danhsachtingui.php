<?php
include('connect.php');

// Xử lý cập nhật trạng thái tin tức
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && isset($_POST['id_tin'])) {
    $id_tin = $_POST['id_tin'];
    $action = $_POST['action'];

    // Xác định trạng thái mới dựa trên hành động
    $new_trangThai = ($action == 'approve') ? 1 : 2;

    // Cập nhật trạng thái của bản tin
    $sql_update = "UPDATE bantin SET trangThai = ? WHERE id_tin = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ii", $new_trangThai, $id_tin);
    $stmt_update->execute();
    $stmt_update->close();
}

// Truy vấn để lấy danh sách các tin có trangThai = 0
$sql = "SELECT id_tin, tieuDe, tacGia, thoiGian FROM bantin WHERE trangThai = 0";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Tin Gửi Đến</title>
    <style>
        .news-item {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .news-item div {
            flex: 1;
            padding: 0 10px;
        }

        .news-item a {
            text-decoration: none;
            color: #000;
            flex: 3;
            display: flex;
            justify-content: space-between;
        }

        .action-buttons {
            display: flex;
            align-items: center;
        }

        .action-buttons label {
            margin-right: 10px;
        }

        .action-buttons button {
            margin-left: 10px;
            padding: 5px 10px;
            cursor: pointer;
            color: white;
            border: none;
        }

        .approve {
            background-color: #4CAF50; /* Màu xanh lá */
        }

        .reject {
            background-color: #f44336; /* Màu đỏ */
        }

        .confirm {
            background-color: #008CBA; /* Màu xanh dương */
        }

        .tin{
            text-decoration: none;
            text-align: left;   
        }
    </style>
</head>
<body>
<?php
include('header.php');
include('menu.php');
?>
    <h2>Danh Sách Tin Gửi Đến</h2>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
            <div class="news-item">
                <a class="tin"href="chitiettintuc.php?id_tin=<?php echo $row['id_tin']; ?>">
                    <div><?php echo $row['tieuDe']; ?></div>
                    <div><?php echo $row['tacGia']; ?></div>
                    <div><?php echo $row['thoiGian']; ?></div>
                </a>
                <div class="action-buttons">
                    <label>
                        <input type="radio" name="action_<?php echo $row['id_tin']; ?>" value="approve"> Duyệt
                    </label>
                    <label>
                        <input type="radio" name="action_<?php echo $row['id_tin']; ?>" value="reject"> Không duyệt
                    </label>
                    <button class="confirm" onclick="submitAction(<?php echo $row['id_tin']; ?>)">Xác nhận</button>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p>Không có tin nào cần duyệt.</p>";
    }

    $conn->close();
    ?>

    <script>
        function submitAction(id_tin) {
            var action = document.querySelector('input[name="action_' + id_tin + '"]:checked');
            if (action) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "danhsachtin.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        location.reload(); // Tải lại trang sau khi cập nhật
                    }
                };
                xhr.send("action=" + action.value + "&id_tin=" + id_tin);
            } else {
                alert("Vui lòng chọn hành động.");
            }
        }
    </script>
<?php
include('footer.php');
?>
</body>
</html>
