<?php
// Xây dựng hàm xuất mảng và hàm thay thế theo yêu cầu bài tập 5
if (!function_exists('xuatMang')) {
    function xuatMang($mang) {
        return implode('  ', $mang);
    }
}

if (!function_exists('thayThe')) {
    function thayThe($mang, $giaTriCu, $giaTriMoi) {
        $mangMoi = $mang;
        foreach ($mangMoi as $index => $val) {
            if ($val == $giaTriCu) {
                $mangMoi[$index] = $giaTriMoi;
            }
        }
        return $mangMoi;
    }
}

$chuoiPhanTu = "";
$giaTriCanThay = "";
$giaTriThay = "";
$mangCuXuat = "";
$mangMoiXuat = "";
$thongBao = "";

if (isset($_POST['submit'])) {
    $chuoiPhanTu = trim($_POST['chuoiPhanTu'] ?? '');
    $giaTriCanThay = trim($_POST['giaTriCanThay'] ?? '');
    $giaTriThay = trim($_POST['giaTriThay'] ?? '');

    if ($chuoiPhanTu !== "" && $giaTriCanThay !== "" && $giaTriThay !== "") {
        // Tách chuỗi và gán vào mảng
        $mangRaw = explode(',', $chuoiPhanTu);
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

        if ($hopLe && is_numeric($giaTriCanThay) && is_numeric($giaTriThay)) {
            $cu = floatval($giaTriCanThay);
            $moi = floatval($giaTriThay);

            // Gọi các hàm đã xây dựng
            $mangCuXuat = xuatMang($mang);
            $mangMoi = thayThe($mang, $cu, $moi);
            $mangMoiXuat = xuatMang($mangMoi);
        } else {
            $thongBao = "Dữ liệu nhập vào chứa giá trị không hợp lệ!";
        }
    } else {
        $thongBao = "Vui lòng nhập đầy đủ các trường dữ liệu!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay thế trong mảng</title>
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
            width: 270px;
            padding: 4px 6px;
            border: 1px solid #7f9db9;
            box-sizing: border-box;
            background-color: #ffffff;
        }
        .input-short {
            width: 140px;
        }
        .input-result {
            width: 270px;
            padding: 4px 6px;
            border: 1px solid #7f9db9;
            box-sizing: border-box;
            background-color: #ffccd5;
            color: #000;
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

<form name="formThayThe" method="post" action="mang5.php">
    <table class="form-table">
        <tr>
            <th colspan="2" class="form-header">THAY THẾ</th>
        </tr>
        <tr>
            <td style="width: 150px;">Nhập các phần tử:</td>
            <td>
                <input type="text" name="chuoiPhanTu" class="input-text" required
                       value="<?php echo htmlspecialchars($chuoiPhanTu); ?>">
            </td>
        </tr>
        <tr>
            <td>Giá trị cần thay thế:</td>
            <td>
                <input type="text" name="giaTriCanThay" class="input-text input-short" required
                       value="<?php echo htmlspecialchars($giaTriCanThay); ?>">
            </td>
        </tr>
        <tr>
            <td>Giá trị thay thế:</td>
            <td>
                <input type="text" name="giaTriThay" class="input-text input-short" required
                       value="<?php echo htmlspecialchars($giaTriThay); ?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Thay thế" class="btn-submit">
            </td>
        </tr>
        <tr>
            <td>Mảng cũ:</td>
            <td>
                <input type="text" class="input-result" readonly
                       value="<?php echo htmlspecialchars($mangCuXuat); ?>">
            </td>
        </tr>
        <tr>
            <td>Mảng sau khi thay thế:</td>
            <td>
                <input type="text" class="input-result" readonly
                       value="<?php echo htmlspecialchars($mangMoiXuat); ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; padding-top: 4px; padding-bottom: 12px;">
                <span class="note">(Ghi chú: Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</span>
                <?php if ($thongBao != ""): ?>
                    <div class="error-msg"><?php echo htmlspecialchars($thongBao); ?></div>
                <?php endif; ?>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
