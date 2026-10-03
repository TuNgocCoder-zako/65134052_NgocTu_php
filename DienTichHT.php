<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dien tich hinh tron</title>
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
                width: 350px;
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
            }
            .input-text {
                width: 180px;
                padding: 3px 5px;
                border: 1px solid #7f9db9;
            }
            .input-result {
                width: 180px;
                padding: 3px 5px;
                border: 1px solid #7f9db9;
                background-color: #ffd8d8; /* Nền màu hồng nhạt */
            }
            .btn-submit {
                padding: 2px 12px;
                cursor: pointer;
            }
            .error {
                color: red;
                text-align: center;
                margin-top: 10px;
            }
        </style>
</head>
<body>
    <?php
    if(isset($_POST['submit'])) {
        $radius = $_POST['length'];
        $chuvi = 2 * pi() * $radius;
        $dien_tich = pi() * pow($radius, 2);
        if($radius <= 0) {
            echo "<p>Radius should be a positive number.</p>";
        } else{
             if(is_numeric($radius)) {
            } else {
                echo "<p>Please enter a valid numeric value for radius.</p>";
            }
        }
       
    }
    ?>
    <form method="post" name="Dien tich hinh tron">
        <table class="form-table">
            <tr class="form-header">
                <td colspan="2">
                    <h2>Dien tich hinh tron</h2>
                </td>
            </tr>
            <tr>
                <td>Radius:</td>
                <td>
                    <input type="number" name="length" required
                    value="<?php if(isset($_POST['length'])) echo $_POST['length']; ?>"
                    >
                    </td>
                </tr>
                <tr>
                    <td>Chu vi:</td>
                    <td>
                        <input type="text" name="dien_tich" class="input-result" readonly 
                    value="<?php echo htmlspecialchars($chuvi); ?>">
                >
                </td>
            </tr>
            <tr>
                <td>Diện tích:</td>
                <td>
                    <input type="text" name="dien_tich" class="input-result" readonly 
                           value="<?php echo htmlspecialchars($dien_tich); ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" name="submit" value="Tinh" class="btn-submit">
                </td>
            </tr>
        </table>
    </form>

</body>
</html>