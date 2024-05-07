<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Trangchu.css">
    <style type="text/css">
    .menu {
        text-align: center;
        background-color: rgb(192, 7, 7);
    }

    .menu ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .menu ul li {
        display: inline-block;
        position: relative;
    }

    .menu ul li a {
        display: block;
        padding: 10px 15px;
        text-decoration: none;
        color: white;
    }

    .menu ul li:last-child {
        border-right: none;
    }

    .menu ul li:hover>.submenu {
        display: block;
    }

    .submenu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: rgb(192, 7, 7);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .submenu li {
        display: block;
        padding: 10px 15px;
    }

    .submenu li a {
        color: #333;
        text-decoration: none;
    }

    #search {
        padding: 1px 10px;
        background-color: #fff;
    }
    </style>
</head>

<body>
    <div class="menu">
        <ul>
            <li><a href="http://127.0.0.1:5500/TrangChu.html">Trang chủ </a></li>
            <li>
                <a id="select" href="http://127.0.0.1:5500/theThaoVietNam.html">Thể thao Việt Nam</a>
                <ul class="submenu">
                    <li><a href="http://127.0.0.1:5500/bongDaVN.html">Bóng đá</a></li>
                    <li><a href="http://127.0.0.1:5500/bongChuyenVN.html">Bóng Chuyền</a></li>
                    <li><a href="http://127.0.0.1:5500/cacMonKhacVN.html">Các Môn Khác</a></li>
                </ul>
            </li>
            <li><a id="select" href="http://127.0.0.1:5500/theThaoQuocTe.html">Thể thao Quốc Tế</a>
                <ul class="submenu">
                    <li><a href="http://127.0.0.1:5500/bongDaQT.html">Bóng đá</a></li>
                    <li><a href="#">Bóng Chuyền</a></li>
                    <li><a href="#">Tennis-Quần Vợt </a></li>
                    <li><a href="#">Bóng Rổ</a></li>
                    <li><a href="#">Các Môn Khác</a></li>
                </ul>
            </li>
            <li><a id="select" href="#">Esport</a>
                <ul class="submenu">
                    <li><a href="#">LMHT</a></li>
                    <li><a href="#">Đấu Trường Chân Lý</a></li>
                    <li><a href="#">LMHT Tốc Chiến</a></li>
                    <li><a href="#">Valorant</a></li>
                    <li><a href="#">PUBG</a></li>
                </ul>
            </li>
            <li><a id="select" href="http://127.0.0.1:5500/diendan.html">Diễn đàn</a></li>

            <li>
                <input type="search" id="search" placeholder="Tìm kiếm" />
            <li><button id="search">Tìm kiếm</button></li>
            </li>
            <li><a id="select" href="http://127.0.0.1:5500/DangNhap.php"><b>Đăng nhập</b></a></li>
        </ul>
    </div>
</body>

</html>