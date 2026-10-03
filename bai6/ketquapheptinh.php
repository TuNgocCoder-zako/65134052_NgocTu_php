<?php
// Định nghĩa các hàm tính toán theo yêu cầu Bài tập 6
if (!function_exists('cong')) {
    function cong($a, $b) {
        return $a + $b;
    }
}

if (!function_exists('tru')) {
    function tru($a, $b) {
        return $a - $b;
    }
}

if (!function_exists('nhan')) {
    function nhan($a, $b) {
        return $a * $b;
    }
}

if (!function_exists('chia')) {
    function chia($a, $b) {
        return $a / $b;
    }
}

// Hàm kiểm tra dữ liệu nhập vào theo yêu cầu Bài tập 7
if (!function_exists('kiemTraDuLieu')) {
    function kiemTraDuLieu($so1, $so2, $pheptinh, &$thongBaoLoi) {
        if ($so1 === '' || $so2 === '') {
            $thongBaoLoi = "Vui lòng nhập đầy đủ hai số!";
            return false;
        }

        if (!is_numeric($so1) || !is_numeric($so2)) {
            $thongBaoLoi = "Dữ liệu nhập vào phải là số hợp lệ!";
            return false;
        }

        if ($pheptinh === 'chia' && floatval($so2) == 0) {
            $thongBaoLoi = "Không thể thực hiện phép chia cho 0!";
            return false;
        }

        return true;
    }
}

// Kiểm tra xem có nhận dữ liệu từ form không
if (!isset($_POST['tinh']) && !isset($_POST['so1'])) {
    header("Location: pheptinh.php");
    exit();
}

$pheptinh = $_POST['pheptinh'] ?? 'cong';
$so1_raw = trim($_POST['so1'] ?? '');
$so2_raw = trim($_POST['so2'] ?? '');

$thongBaoLoi = "";
if (!kiemTraDuLieu($so1_raw, $so2_raw, $pheptinh, $thongBaoLoi)) {
    echo "<script>
        alert('" . addslashes($thongBaoLoi) . "');
        window.history.back();
    </script>";
    exit();
}

// Xử lý trường hợp là số thực
$a = floatval($so1_raw);
$b = floatval($so2_raw);
$ketQua = 0;
$tenPhepTinh = "";

switch ($pheptinh) {
    case 'cong':
        $tenPhepTinh = "Cộng";
        $ketQua = cong($a, $b);
        break;
    case 'tru':
        $tenPhepTinh = "Trừ";
        $ketQua = tru($a, $b);
        break;
    case 'nhan':
        $tenPhepTinh = "Nhân";
        $ketQua = nhan($a, $b);
        break;
    case 'chia':
        $tenPhepTinh = "Chia";
        $ketQua = chia($a, $b);
        break;
    default:
        $tenPhepTinh = "Cộng";
        $ketQua = cong($a, $b);
        break;
}

// Định dạng kết quả gọn gàng cho số thực
if (is_float($ketQua) || is_numeric($ketQua)) {
    if (floor($ketQua) == $ketQua) {
        $hienThiKetQua = (int)$ketQua;
    } else {
        $hienThiKetQua = round($ketQua, 6);
    }
} else {
    $hienThiKetQua = $ketQua;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả phép tính</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .container {
            width: 450px;
            margin: 0 auto;
            border: 1px solid #c0c0c0;
            padding: 20px;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
        }
        .title {
            color: #0c6291;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .form-table {
            width: 100%;
            border-collapse: collapse;
        }
        .form-table td {
            padding: 8px 6px;
        }
        .lbl-operation {
            color: #cc0000;
            font-weight: bold;
            white-space: nowrap;
        }
        .val-operation {
            color: #cc0000;
            font-weight: bold;
            font-size: 15px;
        }
        .lbl-number {
            color: #004080;
            font-weight: bold;
            white-space: nowrap;
        }
        .input-text {
            width: 220px;
            padding: 4px 6px;
            border: 1px solid #7f9db9;
            box-sizing: border-box;
            background-color: #f7f7f7;
            font-size: 14px;
        }
        .back-link {
            text-align: center;
            padding-top: 15px;
        }
        .back-link a {
            color: #800080;
            font-style: italic;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="title">PHÉP TÍNH TRÊN HAI SỐ</div>
    <table class="form-table">
        <tr>
            <td class="lbl-operation">Chọn phép tính :</td>
            <td class="val-operation"><?php echo htmlspecialchars($tenPhepTinh); ?></td>
        </tr>
        <tr>
            <td class="lbl-number">Số 1 :</td>
            <td>
                <input type="text" class="input-text" readonly value="<?php echo htmlspecialchars($so1_raw); ?>">
            </td>
        </tr>
        <tr>
            <td class="lbl-number">Số 2 :</td>
            <td>
                <input type="text" class="input-text" readonly value="<?php echo htmlspecialchars($so2_raw); ?>">
            </td>
        </tr>
        <tr>
            <td class="lbl-number">Kết quả :</td>
            <td>
                <input type="text" class="input-text" readonly value="<?php echo htmlspecialchars($hienThiKetQua); ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2" class="back-link">
                <a href="javascript:window.history.back(-1);">Quay lại trang trước</a>
            </td>
        </tr>
    </table>
</div>

</body>
</html>
