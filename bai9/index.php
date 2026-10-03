<?php
// Danh sách các trang con hợp lệ theo yêu cầu Bài tập 9
$pages = [
    'trangchu'  => [
        'title' => 'Trang chủ',
        'file'  => 'trangchu.php'
    ],
    'gioithieu' => [
        'title' => 'Giới thiệu',
        'file'  => 'gioithieu.php'
    ],
    'tintuc'    => [
        'title' => 'Tin tức',
        'file'  => 'tintuc.php'
    ],
    'lienhe'    => [
        'title' => 'Liên hệ',
        'file'  => 'lienhe.php'
    ],
    'diendan'   => [
        'title' => 'Diễn đàn',
        'file'  => 'diendan.php'
    ]
];

// Lấy trang được chọn từ tham số GET 'page', mặc định là 'trangchu'
$currentPage = $_GET['page'] ?? 'trangchu';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 9 - Trang chủ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .wrapper {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #cccccc;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #0c6291;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .navbar {
            background-color: #004080;
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .navbar li {
            margin: 0;
        }
        .navbar li a {
            display: block;
            padding: 12px 20px;
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.2s;
        }
        .navbar li a:hover, .navbar li a.active {
            background-color: #fe7686;
            color: #ffffff;
        }
        .main-content {
            padding: 30px;
            min-height: 200px;
            font-size: 16px;
            line-height: 1.6;
        }
        .footer {
            background-color: #ececec;
            padding: 12px;
            text-align: center;
            font-size: 13px;
            color: #666666;
            border-top: 1px solid #dddddd;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="header">
        <h1>BÀI TẬP 9: GIAO DIỆN TRANG CHỦ &amp; MENU</h1>
    </div>

    <!-- Menu chính điều hướng các trang con -->
    <ul class="navbar">
        <?php foreach ($pages as $key => $info): ?>
            <li>
                <a href="index.php?page=<?php echo urlencode($key); ?>"
                   class="<?php echo ($currentPage === $key) ? 'active' : ''; ?>">
                    <?php echo htmlspecialchars($info['title']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Phần hiển thị nội dung chính load từ các trang con tương ứng -->
    <div class="main-content">
        <?php
        if (array_key_exists($currentPage, $pages)) {
            $targetFile = __DIR__ . '/' . $pages[$currentPage]['file'];
            if (file_exists($targetFile)) {
                include $targetFile;
            } else {
                echo "<p style='color: red;'>Tệp tin không tồn tại.</p>";
            }
        } else {
            echo "<p style='color: red;'>Trang yêu cầu không hợp lệ!</p>";
        }
        ?>
    </div>

    <div class="footer">
        &copy; 2026 Website PHP. All rights reserved.
    </div>
</div>

</body>
</html>
