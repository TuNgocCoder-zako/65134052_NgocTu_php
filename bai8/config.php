<?php
$fullname = $_POST['fullname'] ?? '';
$address  = $_POST['address'] ?? '';
$phone    = $_POST['phone'] ?? '';
$gender   = $_POST['gender'] ?? '';
$country  = $_POST['country'] ?? '';
$study    = $_POST['study'] ?? [];
$note     = $_POST['note'] ?? '';

$study_str = is_array($study) ? implode(', ', $study) : $study;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            line-height: 1.6;
        }
        .container {
            width: 480px;
            margin: 0 auto;
        }
        .title {
            font-weight: bold;
            margin-bottom: 12px;
        }
        .info-item {
            margin-bottom: 6px;
        }
        .btn-back {
            margin-top: 15px;
        }
        .btn-back a {
            display: inline-block;
            padding: 4px 12px;
            text-decoration: none;
            color: #000;
            background-color: #efefef;
            border: 1px solid #767676;
            border-radius: 2px;
            cursor: pointer;
            font-size: 13px;
        }
        .btn-back a:hover {
            background-color: #e5e5e5;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="title">Bạn đã nhập thành công, dưới đây là những thông tin bạn đã nhập:</div>
    <div class="info-item"><b>Họ tên:</b> <?php echo htmlspecialchars($fullname); ?></div>
    <div class="info-item"><b>Address:</b> <?php echo htmlspecialchars($address); ?></div>
    <div class="info-item"><b>Phone:</b> <?php echo htmlspecialchars($phone); ?></div>
    <div class="info-item"><b>Gender:</b> <?php echo htmlspecialchars($gender); ?></div>
    <div class="info-item"><b>Country:</b> <?php echo htmlspecialchars($country); ?></div>
    <?php if (!empty($study_str)): ?>
    <div class="info-item"><b>Study:</b> <?php echo htmlspecialchars($study_str); ?></div>
    <?php endif; ?>
    <div class="info-item"><b>Note:</b> <?php echo nl2br(htmlspecialchars($note)); ?></div>
    
    <div class="btn-back">
        <a href="form.htm">Quay về</a>
    </div>
</div>

</body>
</html>
