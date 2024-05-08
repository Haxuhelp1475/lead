<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPORTS NEWS</title>
    <link rel="stylesheet" href="them.css">
</head>


<body>
    <?php
    include('header.php') ;
        ?>
    <!--/id header-->
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
            <li><a id="select" href="http://127.0.0.1:5500/DangNhap.html"><b>Đăng nhập</b></a></li>
            <li><a id="select" href=http://127.0.0.1:5500/DangKi.html><b>Đăng Ký</b></a></li>
        </ul>
    </div>
    <!--/id menu-->
    <?php
    if(isset($_POST['them']) && ($_POST['them'])){
        //lấy dữ liệu từ form về
        $tieuDe=$_POST['tieuDe'];
        $hinhAnh=$_FILES['hinhAnh']['name'];
        $moTa=$_POST['moTa'];

        //chèn dữ liệu
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sport_news";

        try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tin_tuc (tieuDe, hinhAnh, moTa)
        VALUES ('$tieuDe','$hinhAnh', '$moTa')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Thêm tin tức thành công!";
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;

    }

    ?>
    <div class="container">
        <h5 align="middle">Nhập bài viết</h5>
        <form action="them.php" method="post" enctype="multipart/form-data">
            <label for="category"></label>
            <input type="text" id="category" name="theLoai" placeholder="Thể loại">

            <label for="title"></label>
            <input type="text" id="title" name="tieuDe" placeholder="Tiêu đề">

            <label for="image"></label>
            <input type="file" name="hinhAnh"><br>

            <label for="content"></label>
            <textarea id="content" name="noiDung" rows="6" placeholder="Nội dung"></textarea>

            <label for="author"></label>
            <input type="text" id="author" name="tacGia" placeholder="Tác giả">

            <input type="submit" name="them" value="Thêm">
        </form>
        <?php
include('footer.php');
?>
</body>

</html>