<?php
// Xây dựng hàm hoán vị, sắp tăng, sắp giảm theo yêu cầu bài tập 6
if (!function_exists('hoanVi')) {
    function hoanVi(&$a, &$b) {
        $temp = $a;
        $a = $b;
        $b = $temp;
    }
}

if (!function_exists('sapTang')) {
    function sapTang($mang) {
        $n = count($mang);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                if ($mang[$i] > $mang[$j]) {
                    hoanVi($mang[$i], $mang[$j]);
                }
            }
        }
        return $mang;
    }
}

if (!function_exists('sapGiam')) {
    function sapGiam($mang) {
        $n = count($mang);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                if ($mang[$i] < $mang[$j]) {
                    hoanVi($mang[$i], $mang[$j]);
                }
            }
        }
        return $mang;
    }
}

$chuoiMang = "";
$mangTangXuat = "";
$mangGiamXuat = "";
$thongBao = "";

if (isset($_POST['submit'])) {
    $chuoiMang = trim($_POST['mang'] ?? '');

    if ($chuoiMang !== "") {
        // Tách chuỗi và gán vào mảng
        $mangRaw = explode(',', $chuoiMang);
        $mang = [];
        $hopLe = true;

        foreach ($mangRaw as $item) {
            $val = trim($item);
            if ($val !== "") {
                if (is_numeric($val)) {
                    $mang[] = floatval($val);
                } else {
                    $hopLe = false;
                    break;
                }
            }
        }

        if ($hopLe && count($mang) > 0) {
            $mangTang = sapTang($mang);
            $mangGiam = sapGiam($mang);

            $mangTangXuat = implode(', ', $mangTang);
            $mangGiamXuat = implode(', ', $mangGiam);
        } else {
            $thongBao = "Mảng chứa giá trị không hợp lệ!";
        }
    } else {
        $thongBao = "Vui lòng nhập mảng!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sắp xếp mảng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .form-table {
            background-color: #d1efec;
            border: 1px solid #7bc5bd;
            border-collapse: collapse;
            margin: 0 auto;
            width: 480px;
        }
        .form-header {
            background-color: #008b8b;
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
            color: #003333;
            white-space: nowrap;
        }
        .input-text {
            width: 280px;
            padding: 4px 6px;
            border: 1px solid #7f9db9;
            box-sizing: border-box;
            background-color: #ffffff;
        }
        .input-result {
            width: 280px;
            padding: 4px 6px;
            border: 1px solid #7f9db9;
            box-sizing: border-box;
            background-color: #d5f9f6;
            color: #cc0000;
        }
        .btn-submit {
            background-color: #ffffff;
            border: 1px solid #767676;
            padding: 4px 20px;
            cursor: pointer;
            font-size: 14px;
        }
        .note {
            color: #cc0000;
            font-size: 13px;
        }
        .header-section {
            color: #cc0000;
            font-weight: bold;
            padding-top: 10px;
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

<form name="formSapXep" method="post" action="mang6.php">
    <table class="form-table">
        <tr>
            <th colspan="2" class="form-header">SẮP XẾP MẢNG</th>
        </tr>
        <tr>
            <td style="width: 100px;">Nhập mảng:</td>
            <td>
                <input type="text" name="mang" class="input-text" required
                       value="<?php echo htmlspecialchars($chuoiMang); ?>">
                <span class="note">(*)</span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Sắp xếp tăng/giảm" class="btn-submit">
            </td>
        </tr>
        <tr>
            <td colspan="2" class="header-section">Sau khi sắp xếp:</td>
        </tr>
        <tr>
            <td>Tăng dần:</td>
            <td>
                <input type="text" class="input-result" readonly
                       value="<?php echo htmlspecialchars($mangTangXuat); ?>">
            </td>
        </tr>
        <tr>
            <td>Giảm dần:</td>
            <td>
                <input type="text" class="input-result" readonly
                       value="<?php echo htmlspecialchars($mangGiamXuat); ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; padding-top: 6px; padding-bottom: 12px;">
                <span class="note">(*) Các số được nhập cách nhau bằng dấu ","</span>
                <?php if ($thongBao != ""): ?>
                    <div class="error-msg"><?php echo htmlspecialchars($thongBao); ?></div>
                <?php endif; ?>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
