<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="quanTri.css">
</head>

<body>
    <div id="logo">
        <h1><img src="https://i.imgur.com/Cc3S8Di.png"></h1>
    </div>
    <header>
    </header>
    <!--/id header-->
    <div class="menu">
        <ul>
            <li><a href="#">Trang chủ </a></li>
            <li>
                <a id="select" href="#">Bài viết</a>
                <ul class="submenu">
                    <li><a href="#">Bài viết gửi đến</a></li>
                </ul>
            </li>
            <li><a id="select" href="#">Tác giả</a>
            </li>
            <li><a id="select" href="#">Đăng ký</a></li>
            <li><a id="select" href="#"><b><?php $ten =$_POST['ten']; echo $ten;?></b></a>
                <ul class="submenu">
                    <li><a href="#">Đăng Xuất</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="content">
        <figure>
            <img src="https://th.bing.com/th/id/OIP.VVr_RACZnBwrHyRZih8ZCwHaHa?w=169&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7">
            <figcaption>
                <h2>0</h2>
            </figcaption>
        </figure>
        <figure>
            <img src="https://th.bing.com/th/id/OIP.iZBIqwzEVRVABv25Z2lkswHaHa?w=215&h=215&c=7&r=0&o=5&dpr=1.3&pid=1.7">
            <figcaption>
                <h2>0</h2>
            </figcaption>
        </figure>
    </div>

    <?php
    include('footer.php');
    ?>
</body>

</html>