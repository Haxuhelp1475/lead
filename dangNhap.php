<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPORTS NEWS</title>
    <link rel="stylesheet" href="t1.css">
    <style type="text/css">
    form {
        background-color: red;
        padding: 20px;
        border-radius: 10px;
        width: 30%;
        border: 1px solid black;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;

        input {
            width: 90%;
            height: 50px;
        }

        button {
            width: 90%;
            height: 50px;
            border: 2px solid black;
            background-color: #000080;
            color: white;
        }
    }

    a {
        text-decoration: none;
        margin: 0 5px;
    }

    .bot {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }
    </style>
</head>

<body>

    <?php
    include('header.php');
    ?>
    <div id="content">
        <form action="quanTri.php" method="POST">
            <h1>Đăng nhập</h1>
            <input type="text" placeholder="Tên đăng nhập" name="ten">
            <br>
            <input type="password" placeholder="Mật khẩu">
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