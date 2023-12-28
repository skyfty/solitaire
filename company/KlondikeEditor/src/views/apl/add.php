<?php
// getImages.php
$servername = "localhost";
$username = "root";
$password = "lvpenghui";
$dbname = "KlondikeEditor";

// 设置响应头允许跨域请求
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 使用内联视图计算记录数量并插入新数据
$insertSql = "INSERT INTO klondike (name)
              SELECT CONCAT('level', COUNT(*)) 
              FROM (SELECT * FROM klondike) AS tmp";
$result = $conn->query($insertSql);

if ($result) {
    echo '增加成功';
} else {
    echo "增加失败";
}

$conn->close();
?>