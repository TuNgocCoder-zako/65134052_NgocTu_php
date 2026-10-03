<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tiền Karaoke</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        .form-table {
            background-color: #00a29a;
            border: 1px solid #007b75;
            border-collapse: collapse;
            margin: 0 auto;
            width: 450px;
        }
        .form-header {
            background-color: #03827b;
            color: #ffffff;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            font-style: italic;
            font-family: "Lucida Calligraphy", "Comic Sans MS", cursive, sans-serif;
            padding: 10px;
        }
        .form-table td {
            padding: 8px 14px;
            color: #003333;
            font-weight: 500;
        }
        .input-text {
            width: 170px;
            padding: 3px 6px;
            border: 1px solid #7f9db9;
            box-sizing: border-box;
            background-color: #ffffff;
        }
        .input-result {
            width: 170px;
            padding: 3px 6px;
            border: 1px solid #7f9db9;
            box-sizing: border-box;
            background-color: #fffbc2;
            color: #000;
        }
        .btn-submit {
            padding: 4px 16px;
            cursor: pointer;
            font-size: 14px;
        }
        .unit {
            color: #003333;
            margin-left: 6px;
            font-size: 14px;
        }
        .error-msg {
            color: #ff0000;
            text-align: center;
            font-size: 13px;
            font-weight: bold;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<?php
$gioBatDau = "";
$gioKetThuc = "";
$tienThanhToan = "";
$thongBao = "";

if (isset($_POST['submit'])) {
    $gioBatDau = $_POST['gioBatDau'] ?? '';
    $gioKetThuc = $_POST['gioKetThuc'] ?? '';

    if (!is_numeric($gioBatDau) || !is_numeric($gioKetThuc)) {
        $thongBao = "Vui lòng nhập giờ là số hợp lệ!";
    } elseif ($gioKetThuc <= $gioBatDau) {
        $thongBao = "Giờ kết thúc phải > Giờ bắt đầu";
    } elseif ($gioBatDau < 10 || $gioKetThuc > 24) {
        $thongBao = "Quán chỉ mở cửa từ 10h đến 24h (Giờ nghỉ)!";
    } else {
        $start = floatval($gioBatDau);
        $end = floatval($gioKetThuc);
        $tongTien = 0;

        if ($end <= 17) {
            $tongTien = ($end - $start) * 20000;
        } elseif ($start >= 17) {
            $tongTien = ($end - $start) * 45000;
        } else {
            $tongTien = (17 - $start) * 20000 + ($end - 17) * 45000;
        }

        $tienThanhToan = $tongTien;
    }
}
?>

<form name="formKaraoke" method="post" action="karaoke.php">
    <table class="form-table">
        <tr>
            <th colspan="2" class="form-header">TÍNH TIỀN KARAOKE</th>
        </tr>
        <tr>
            <td style="width: 130px;">Giờ bắt đầu:</td>
            <td>
                <input type="text" name="gioBatDau" class="input-text" required
                       value="<?php echo htmlspecialchars($gioBatDau); ?>">
                <span class="unit">(h)</span>
            </td>
        </tr>
        <tr>
            <td>Giờ kết thúc:</td>
            <td>
                <input type="text" name="gioKetThuc" class="input-text" required
                       value="<?php echo htmlspecialchars($gioKetThuc); ?>">
                <span class="unit">(h)</span>
            </td>
        </tr>
        <tr>
            <td>Tiền thanh toán:</td>
            <td>
                <input type="text" name="tienThanhToan" class="input-result" readonly
                       value="<?php echo htmlspecialchars($tienThanhToan); ?>">
                <span class="unit">(VNĐ)</span>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; padding: 10px;">
                <input type="submit" name="submit" value="Tính tiền" class="btn-submit">
                <?php if ($thongBao != ""): ?>
                    <div class="error-msg"><?php echo htmlspecialchars($thongBao); ?></div>
                <?php endif; ?>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
