<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('connect.php');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php 
    $sql="SELECT*FROM quangcao";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0){
        echo '<marquee behavior="scroll" scrollamount="10" direction="right">';
        while($row = $result->fetch_assoc()){
            $url = $row['linkURL'];
            $link = $row['linkHinh'];
            $ten = $row['tenQC'];
            echo '<a href="' . $url . '" target="_blank">';
            echo '<img src="' .$link . '" alt="' .  $ten . '">';
            echo '</a>';
        }
        echo '</marquee>';
    }else{
        echo "Không có quảng cáo nào.";
    }
    $conn->close();
    ?>
</body>

</html>