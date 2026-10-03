<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán tiền điện</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        .form-table {
            background-color: #fff6d6;
            border: 1px solid #dcdcdc;
            border-collapse: collapse;
            margin: 0 auto;
            width: 450px;
        }
        .form-header {
            background-color: #fed976;
            color: #8a4800;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            font-style: italic;
            padding: 10px;
        }
        .form-table td {
            padding: 8px 12px;
            white-space: nowrap; 
        }
        .input-text, .input-result {
            width: 150px;
            padding: 3px 5px;
            border: 1px solid #7f9db9;
            box-sizing: border-box;
        }
        .input-result {
            background-color: #ffd8d8; 
        }
        .btn-submit {
            padding: 2px 14px;
            cursor: pointer;
        }
        .unit {
            margin-left: 6px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<?php

$tenChuHo = "";
$chiSoCu = "";
$chiSoMoi = "";
$DonGia = ""; 
$soTienDienThanhToan = "";

if (isset($_POST['submit'])) {
    $tenChuHo = $_POST['tenChuHo'] ?? '';
    $chiSoCu = $_POST['chiSoCu'] ?? '';
    $chiSoMoi = $_POST['chiSoMoi'] ?? '';
    $DonGia = $_POST['donGia'] ?? 2000;

    if (is_numeric($chiSoCu) && is_numeric($chiSoMoi) && is_numeric($DonGia)) {
        $soTienDienThanhToan = ($chiSoMoi - $chiSoCu) * $DonGia;
    }
}
?>

<form method="post" action="">
    <table class="form-table">
        <tr>
            <th colspan="2" class="form-header">THANH TOÁN TIỀN ĐIỆN</th>
        </tr>
        <tr>
            <td>Tên chủ hộ:</td>
            <td>
                <input type="text" name="tenChuHo" class="input-text" required
                       value="<?php echo htmlspecialchars($tenChuHo); ?>">
            </td>
        </tr>
        <tr>
            <td>Chỉ số cũ:</td>
            <td>
                <input type="text" name="chiSoCu" class="input-text" required
                       value="<?php echo htmlspecialchars($chiSoCu); ?>">
                <span class="unit">(Kw)</span>
            </td>
        </tr>
        <tr>
            <td>Chỉ số mới:</td>
            <td>
                <input type="text" name="chiSoMoi" class="input-text" required
                       value="<?php echo htmlspecialchars($chiSoMoi); ?>">
                <span class="unit">(Kw)</span>
            </td>
        </tr>
        <tr>
            <td>Đơn giá:</td>
            <td>
                <input type="text" name="donGia" class="input-text" required
                       value="<?php echo htmlspecialchars($DonGia); ?>">
                <span class="unit">(VNĐ)</span>
            </td>
        </tr>
        <tr>
            <td>Số tiền thanh toán:</td>
            <td>
                <input type="text" name="soTienDienThanhToan" class="input-result" readonly
                       value="<?php echo htmlspecialchars($soTienDienThanhToan); ?>">
                <span class="unit">(VNĐ)</span>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" name="submit" value="Tính" class="btn-submit">
            </td>
        </tr>
    </table>
</form>

</body>
</html>