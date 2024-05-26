<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPORTS NEWS</title>
    <link rel="stylesheet" href="dangnhap.css">
</head>
<body>

<?php
    include('header.php');
    include('menu.php');
    include('connect.php');

    // Kiểm tra nếu form đã được submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Truy vấn để lấy thông tin người dùng
        $sql = "SELECT * FROM user WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Kiểm tra mật khẩu
            if (password_verify($password, $row['password'])) {
                echo "Đăng nhập thành công!";
            } else {
                echo "Mật khẩu không chính xác!";
            }
        } else {
            echo "Tên đăng nhập không tồn tại!";
        }
    }
?>

<br>
<div id="content">
    <form action="" method="post" align="middle">
        <h1>Đăng nhập</h1>
        <input type="text" name="username" placeholder="Tên đăng nhập" required>
        <br>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <br>
        <button type="submit"><b>Đăng nhập</b></button>
    </form>
</div>
<br>
<br>
<?php
    include('footer.php');
?>
</body>
</html>
