<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPORTS NEWS</title>
    <link rel="stylesheet" href="dangky.css">
    <style>
        /* CSS cho phần select */
        .select-wrapper {
            position: relative;
            display: inline-block;
            width: 90%;
        }
        .select-wrapper select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: 100%;
            padding: 10px;
            padding-right: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: white;
            color: gray;
        }
        .select-wrapper::after {
            content: "";
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            background: url('data:image/svg+xml;utf8,<svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5H7z" fill="currentColor"/></svg>') no-repeat center;
            pointer-events: none;
        }
        select:invalid {
            color: gray;
        }
    </style>
</head>
<body>
<?php
    include('header.php');
    include('menu.php');
    include 'connect.php';

    // Kiểm tra nếu form đã được submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $role = $_POST['role'];

        // Kiểm tra mật khẩu có khớp không
        if ($password !== $confirm_password) {
            echo "Mật khẩu không khớp!";
        } else {
            // Mã hóa mật khẩu
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Thêm người dùng mới vào bảng user
            $sql = "INSERT INTO user (hoVaTen, diaChi, email, username, password, vaiTro) VALUES ('$fullname', '$address', '$email', '$username', '$hashed_password', '$role')";

            if ($conn->query($sql) === TRUE) {
                echo "Đăng ký thành công!";
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        }
    }
?>
<br>
<form action="" method="post" align="middle" id="signup">
    <h1>Đăng ký</h1>
    <input type="text" name="username" placeholder="Tên đăng nhập" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="fullname" placeholder="Họ và tên" required>
    <input type="text" name="address" placeholder="Địa chỉ" required>
    <input type="number" name="phone" placeholder="Số điện thoại" required>
    <input type="password" name="password" placeholder="Mật khẩu" required>
    <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
    <div class="select-wrapper">
        <select name="role" id="role" required>
            <option value="" disabled selected hidden>Chọn vai trò</option>
            <option value="quản lý">Quản lý</option>
            <option value="tác giả">Tác giả</option>
        </select>
    </div>
    <br>
    <button type="submit"><b>Đăng ký tài khoản</b></button>
</form>
<br>
<br>
<?php
    include('footer.php');
?>
</body>
</html>
