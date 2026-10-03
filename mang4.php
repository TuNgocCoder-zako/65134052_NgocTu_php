<?php
// Xây dựng hàm tìm kiếm theo yêu cầu bài tập 4
if (!function_exists('timKiem')) {
    function timKiem($mang, $soCanTim) {
        foreach ($mang as $index => $val) {
            if ($val == $soCanTim) {
                // Trả về vị trí thứ mấy (1-based index)
                return $index + 1;
            }
        }
        return -1;
    }
}

$chuoiMangNhap = "";
$soCanTim = "";
$mangXuat = "";
$ketQuaTimKiem = "";
$thongBao = "";

if (isset($_POST['submit'])) {
    $chuoiMangNhap = trim($_POST['mang'] ?? '');
    $soCanTim = trim($_POST['soCanTim'] ?? '');

    if ($chuoiMangNhap !== "" && $soCanTim !== "") {
        // Tách chuỗi và gán vào mảng
        $mangRaw = explode(',', $chuoiMangNhap);
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

        if ($hopLe && is_numeric($soCanTim)) {
            $mangXuat = implode(', ', $mang);
            $viTri = timKiem($mang, floatval($soCanTim));

            if ($viTri != -1) {
                $ketQuaTimKiem = "Tìm thấy $soCanTim tại vị trí thứ $viTri của mảng";
            } else {
                $ketQuaTimKiem = "Không tìm thấy $soCanTim trong mảng";
            }
        } else {
            $thongBao = "Mảng hoặc số cần tìm chứa ký tự không hợp lệ!";
        }
    } else {
        $thongBao = "Vui lòng nhập đầy đủ mảng và số cần tìm!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm trong mảng</title>
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
            width: 270px;
            padding: 4px 6px;
            border: 1px solid #7f9db9;
            box-sizing: border-box;
            background-color: #ffffff;
        }
        .input-short {
            width: 120px;
        }
        .input-result {
            width: 270px;
            padding: 4px 6px;
            border: 1px solid #7f9db9;
            box-sizing: border-box;
            background-color: #ffffff;
        }
        .input-found {
            background-color: #e0f9f6;
            color: #cc0000;
            font-weight: bold;
        }
        .btn-submit {
            background-color: #92d5cc;
            border: 1px solid #5fa69c;
            padding: 4px 18px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
        }
        .note {
            color: #006666;
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

<form name="formTimKiem" method="post" action="mang4.php">
    <table class="form-table">
        <tr>
            <th colspan="2" class="form-header">TÌM KIẾM</th>
        </tr>
        <tr>
            <td style="width: 130px;">Nhập mảng:</td>
            <td>
                <input type="text" name="mang" class="input-text" required
                       value="<?php echo htmlspecialchars($chuoiMangNhap); ?>">
            </td>
        </tr>
        <tr>
            <td>Nhập số cần tìm:</td>
            <td>
                <input type="text" name="soCanTim" class="input-text input-short" required
                       value="<?php echo htmlspecialchars($soCanTim); ?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Tìm kiếm" class="btn-submit">
            </td>
        </tr>
        <tr>
            <td>Mảng:</td>
            <td>
                <input type="text" class="input-result" readonly
                       value="<?php echo htmlspecialchars($mangXuat); ?>">
            </td>
        </tr>
        <tr>
            <td>Kết quả tìm kiếm:</td>
            <td>
                <input type="text" class="input-result input-found" readonly
                       value="<?php echo htmlspecialchars($ketQuaTimKiem); ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; padding-top: 4px; padding-bottom: 12px;">
                <span class="note">(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</span>
                <?php if ($thongBao != ""): ?>
                    <div class="error-msg"><?php echo htmlspecialchars($thongBao); ?></div>
                <?php endif; ?>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
