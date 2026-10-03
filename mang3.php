<?php
// Xây dựng 5 hàm theo yêu cầu bài tập 3
if (!function_exists('taoMang')) {
    function taoMang($n) {
        $mang = [];
        for ($i = 0; $i < $n; $i++) {
            $mang[] = rand(0, 20);
        }
        return $mang;
    }
}

if (!function_exists('xuatMang')) {
    function xuatMang($mang) {
        return implode(' ', $mang);
    }
}

if (!function_exists('tinhTong')) {
    function tinhTong($mang) {
        $tong = 0;
        foreach ($mang as $val) {
            $tong += $val;
        }
        return $tong;
    }
}

if (!function_exists('timMin')) {
    function timMin($mang) {
        if (empty($mang)) return "";
        $min = $mang[0];
        foreach ($mang as $val) {
            if ($val < $min) {
                $min = $val;
            }
        }
        return $min;
    }
}

if (!function_exists('timMax')) {
    function timMax($mang) {
        if (empty($mang)) return "";
        $max = $mang[0];
        foreach ($mang as $val) {
            if ($val > $max) {
                $max = $val;
            }
        }
        return $max;
    }
}

$soPhanTu = "";
$chuoiMang = "";
$maxVal = "";
$minVal = "";
$tongMang = "";
$thongBao = "";

if (isset($_POST['submit'])) {
    $soPhanTu = trim($_POST['soPhanTu'] ?? '');

    if (is_numeric($soPhanTu) && intval($soPhanTu) == $soPhanTu && $soPhanTu > 0) {
        $n = intval($soPhanTu);
        
        // Gọi 5 hàm theo yêu cầu
        $mang = taoMang($n);
        $chuoiMang = xuatMang($mang);
        $maxVal = timMax($mang);
        $minVal = timMin($mang);
        $tongMang = tinhTong($mang);
    } else {
        $thongBao = "Số phần tử phải là số nguyên dương!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phát sinh mảng và tính toán</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .form-table {
            background-color: #fff0f5;
            border: 1px solid #d48ba8;
            border-collapse: collapse;
            margin: 0 auto;
            width: 500px;
        }
        .form-header {
            background-color: #a00055;
            color: #ffffff;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            font-style: italic;
            font-family: "Lucida Calligraphy", "Comic Sans MS", cursive, sans-serif;
            padding: 10px;
        }
        .form-table td {
            padding: 7px 12px;
            color: #33001a;
            white-space: nowrap;
        }
        .input-text {
            width: 250px;
            padding: 4px 6px;
            border: 1px solid #7f9db9;
            box-sizing: border-box;
            background-color: #ffffff;
        }
        .input-result {
            width: 250px;
            padding: 4px 6px;
            border: 1px solid #7f9db9;
            box-sizing: border-box;
            background-color: #ffccd5;
            color: #000;
        }
        .input-short {
            width: 140px;
        }
        .btn-submit {
            background-color: #ffffa6;
            border: 1px solid #a0a0a0;
            padding: 4px 18px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
        }
        .note {
            color: #cc0000;
            font-size: 13px;
        }
        .error-msg {
            color: #cc0000;
            font-size: 13px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

<form name="formPhatSinhMang" method="post" action="mang3.php">
    <table class="form-table">
        <tr>
            <th colspan="2" class="form-header">PHÁT SINH MẢNG VÀ TÍNH TOÁN</th>
        </tr>
        <tr>
            <td style="width: 160px;">Nhập số phần tử:</td>
            <td>
                <input type="text" name="soPhanTu" class="input-text" required
                       value="<?php echo htmlspecialchars($soPhanTu); ?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Phát sinh và tính toán" class="btn-submit">
            </td>
        </tr>
        <tr>
            <td>Mảng:</td>
            <td>
                <input type="text" class="input-result" readonly
                       value="<?php echo htmlspecialchars($chuoiMang); ?>">
            </td>
        </tr>
        <tr>
            <td>GTLN (MAX) trong mảng:</td>
            <td>
                <input type="text" class="input-result input-short" readonly
                       value="<?php echo htmlspecialchars($maxVal); ?>">
            </td>
        </tr>
        <tr>
            <td>TTNN (MIN) trong mảng:</td>
            <td>
                <input type="text" class="input-result input-short" readonly
                       value="<?php echo htmlspecialchars($minVal); ?>">
            </td>
        </tr>
        <tr>
            <td>Tổng mảng:</td>
            <td>
                <input type="text" class="input-result input-short" readonly
                       value="<?php echo htmlspecialchars($tongMang); ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; padding-top: 4px; padding-bottom: 12px;">
                <span class="note">(Ghi chú: Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</span>
                <?php if ($thongBao != ""): ?>
                    <div class="error-msg"><?php echo htmlspecialchars($thongBao); ?></div>
                <?php endif; ?>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
