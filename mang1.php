<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài tập 1 - Mảng</title>
</head>
<body>

<h3>Bài tập 1: Xử lý mảng số nguyên</h3>

<form method="post" action="mang1.php">
    Nhập n: <input type="text" name="n" value="<?php echo isset($_POST['n']) ? htmlspecialchars($_POST['n']) : ''; ?>">
    <input type="submit" name="submit" value="Thực hiện">
</form>

<hr>

<?php
if (isset($_POST['submit']) || isset($_GET['n'])) {
    $n = $_POST['n'] ?? $_GET['n'] ?? '';

    // a- Kiểm tra n có phải là số nguyên dương
    if (is_numeric($n) && intval($n) == $n && $n > 0) {
        $n = intval($n);
        $mang = [];

        // b- Phát sinh ngẫu nhiên n phần tử là số nguyên
        for ($i = 0; $i < $n; $i++) {
            $mang[] = rand(-50, 150);
        }

        echo "<b>b- Mảng phát sinh ngẫu nhiên:</b> " . implode(", ", $mang) . "<br><br>";

        // c- Đếm số phần tử chẵn
        $soChan = 0;
        foreach ($mang as $x) {
            if ($x % 2 == 0) {
                $soChan++;
            }
        }
        echo "<b>c- Số phần tử là số chẵn:</b> $soChan<br><br>";

        // d- Đếm số phần tử nhỏ hơn 100
        $nhoHon100 = 0;
        foreach ($mang as $x) {
            if ($x < 100) {
                $nhoHon100++;
            }
        }
        echo "<b>d- Số phần tử nhỏ hơn 100:</b> $nhoHon100<br><br>";

        // e- Tính tổng các phần tử là số âm
        $tongAm = 0;
        foreach ($mang as $x) {
            if ($x < 0) {
                $tongAm += $x;
            }
        }
        echo "<b>e- Tổng các phần tử là số âm:</b> $tongAm<br><br>";

        // f- In ra vị trí các phần tử bằng 0 (chỉ số tính từ 0)
        $viTriKhong = [];
        foreach ($mang as $index => $x) {
            if ($x == 0) {
                $viTriKhong[] = $index;
            }
        }
        if (count($viTriKhong) > 0) {
            echo "<b>f- Vị trí các phần tử có giá trị bằng 0 (index):</b> " . implode(", ", $viTriKhong) . "<br><br>";
        } else {
            echo "<b>f- Không có phần tử nào có giá trị bằng 0.</b><br><br>";
        }

        // g- Sắp xếp tăng dần rồi in mảng ra màn hình
        $mangTangDan = $mang;
        sort($mangTangDan);
        echo "<b>g- Mảng sau khi sắp xếp tăng dần:</b> " . implode(", ", $mangTangDan) . "<br>";

    } else {
        echo "<p style='color:red;'>Vui lòng nhập n là một số nguyên dương!</p>";
    }
}
?>

</body>
</html>
