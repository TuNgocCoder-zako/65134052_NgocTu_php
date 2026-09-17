<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // 1. Sinh số ngẫu nhiên N từ 1 đến 100
    $n = rand(1, 100);
    
    echo "<h3>Giá trị ngẫu nhiên N = $n</h3>";
    echo "Các số chẵn từ 1 đến $n là: <br>";
    
    // 2. Kiểm tra trường hợp N = 1 (không có số chẵn nào)
    if ($n < 2) {
        echo "Không có số chẵn nào trong khoảng 1 -> $n.";
    } else {
        // 3. Duyệt và in các số chẵn
        for ($i = 2; $i <= $n; $i += 2) {
            echo $i . " ";
        }
    }
    ?>
</body>
</html>