<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phép tính</title>
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
        .lbl-number {
            color: #004080;
            font-weight: bold;
            white-space: nowrap;
        }
        .radio-group label {
            color: #cc0000;
            font-weight: bold;
            margin-right: 8px;
            cursor: pointer;
        }
        .input-text {
            width: 220px;
            padding: 4px 6px;
            border: 1px solid #7f9db9;
            box-sizing: border-box;
            font-size: 14px;
        }
        .btn-submit {
            padding: 3px 16px;
            cursor: pointer;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="title">PHÉP TÍNH TRÊN HAI SỐ</div>
    <form method="post" action="ketquapheptinh.php">
        <table class="form-table">
            <tr>
                <td class="lbl-operation">Chọn phép tính :</td>
                <td class="radio-group">
                    <label><input type="radio" name="pheptinh" value="cong" checked> Cộng</label>
                    <label><input type="radio" name="pheptinh" value="tru"> Trừ</label>
                    <label><input type="radio" name="pheptinh" value="nhan"> Nhân</label>
                    <label><input type="radio" name="pheptinh" value="chia"> Chia</label>
                </td>
            </tr>
            <tr>
                <td class="lbl-number">Số thứ nhất :</td>
                <td>
                    <input type="text" name="so1" class="input-text" required>
                </td>
            </tr>
            <tr>
                <td class="lbl-number">Số thứ nhì :</td>
                <td>
                    <input type="text" name="so2" class="input-text" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="tinh" value="Tính" class="btn-submit">
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
