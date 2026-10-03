<?php
$daySo = "";
$tongDaySo = "";
$thongBao = "";

if (isset($_POST['submit'])) {
    $daySo = trim($_POST['daySo'] ?? '');
    
    if ($daySo !== "") {
        // Tách chuỗi thành mảng các số dựa vào dấu phẩy
        $mang = explode(',', $daySo);
        $tong = 0;
        $hopLe = true;

        foreach ($mang as $item) {
            $val = trim($item);
            if ($val !== "") {
                if (is_numeric($val)) {
                    $tong += floatval($val);
                } else {
                    $hopLe = false;
                    break;
                }
            }
        }

        if ($hopLe) {
            $tongDaySo = $tong;
        } else {
            $thongBao = "Dãy số chứa ký tự không hợp lệ!";
        }
    } else {
        $thongBao = "Vui lòng nhập dãy số!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập và tính trên dãy số</title>
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
            width: 460px;
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
            padding: 8px 12px;
            color: #003333;
        }
        .input-text {
            width: 230px;
            padding: 4px 6px;
            border: 1px solid #7f9db9;
            box-sizing: border-box;
            background-color: #ffffff;
        }
        .input-result {
            width: 140px;
            padding: 4px 6px;
            border: 1px solid #7f9db9;
            box-sizing: border-box;
            background-color: #c9f7cb;
            color: #cc0000;
            font-weight: bold;
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

<form name="formDaySo" method="post" action="mang2.php">
    <table class="form-table">
        <tr>
            <th colspan="2" class="form-header">NHẬP VÀ TÍNH TRÊN DÃY SỐ</th>
        </tr>
        <tr>
            <td style="width: 120px;">Nhập dãy số:</td>
            <td>
                <input type="text" name="daySo" class="input-text" required
                       value="<?php echo htmlspecialchars($daySo); ?>">
                <span class="note">(*)</span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Tổng dãy số" class="btn-submit">
            </td>
        </tr>
        <tr>
            <td>Tổng dãy số:</td>
            <td>
                <input type="text" name="tongDaySo" class="input-result" readonly
                       value="<?php echo htmlspecialchars($tongDaySo); ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; padding-top: 4px; padding-bottom: 12px;">
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
