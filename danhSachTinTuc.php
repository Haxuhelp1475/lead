<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //chèn dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sport_news";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("SELECT * FROM tin_tuc");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();

    var_dump($kq);
  
    } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;

    ?>
    <table>
        <tr>
            <td>ID</td>
            <td>Tiêu đề</td>
            <td>Hình ảnh</td>
            <td>Mô tả</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>
        <?php
        if(isset($kq)) {
            foreach($kq as $kq) {
                echo'<tr>
                <td>'.$kq['id_tinTuc'].'</td>
                <td>'.$kq['tieuDe'].'</td>
                <td>'.$kq['moTa'].'</td>
                <td>'.$kq['hinhAnh'].'</td>
                <td>Sửa</td>
                <td>Xóa</td>
            </tr>';
        }
    }
        ?>
    </table>
</body>

</html>