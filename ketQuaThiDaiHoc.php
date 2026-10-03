<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả thi đại học</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        .form-table {
            background-color: #ffd6ea;
            border: 1px solid #dcdcdc;
            border-collapse: collapse;
            margin: 0 auto;
            width: 450px;
        }
        .form-header {
            background-color: #fe7686;
            color: #8a002e;
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
    </style>
</head>
<body>

<?php
$Toan = "";
$Ly = "";
$Hoa = "";
$diemChuan = 20; 
$tongDiem = "";
$ketQuaThi = "";

if (isset($_POST['submit'])) {
    $Toan = $_POST['Toan'] ?? '';
    $Ly = $_POST['Ly'] ?? '';
    $Hoa = $_POST['Hoa'] ?? '';
    $diemChuan = $_POST['diemChuan'] ?? 20;

    // Kiểm tra dữ liệu hợp lệ là số
    if (is_numeric($Toan) && is_numeric($Ly) && is_numeric($Hoa) && is_numeric($diemChuan)) {
        $tongDiem = $Toan + $Ly + $Hoa;
        if ($tongDiem >= $diemChuan && $Toan > 0 && $Ly > 0 && $Hoa > 0) {
            $ketQuaThi = "Đậu";
        } else {
            $ketQuaThi = "Rớt";
        }
    }
}
?>

<form method="post" action="">
    <table class="form-table">
        <tr>
            <th colspan="2" class="form-header">KẾT QUẢ THI ĐẠI HỌC</th>
        </tr>
        <tr>
            <td>Toán:</td>
            <td>
                <input type="text" name="Toan" class="input-text" required
                       value="<?php echo htmlspecialchars($Toan); ?>">
            </td>
        </tr>
        <tr>
            <td>Lý:</td>
            <td>
                <input type="text" name="Ly" class="input-text" required
                       value="<?php echo htmlspecialchars($Ly); ?>">
            </td>
        </tr>
        <tr>
            <td>Hóa:</td>
            <td>
                <input type="text" name="Hoa" class="input-text" required
                       value="<?php echo htmlspecialchars($Hoa); ?>">
            </td>
        </tr>
        <tr>
            <td>Điểm chuẩn:</td>
            <td>
                <input type="text" name="diemChuan" class="input-text" required
                       value="<?php echo htmlspecialchars($diemChuan); ?>">
            </td>
        </tr>
        <tr>
            <td>Tổng điểm:</td>
            <td>
                <input type="text" name="tongDiem" class="input-result" readonly
                       value="<?php echo htmlspecialchars($tongDiem); ?>">
            </td>
        </tr>
        <tr>
            <td>Kết quả thi:</td>
            <td>
                <input type="text" name="ketQuaThi" class="input-result" readonly
                       value="<?php echo htmlspecialchars($ketQuaThi); ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" name="submit" value="Xem kết quả" class="btn-submit">
            </td>
        </tr>
    </table>
</form>

</body>
</html>