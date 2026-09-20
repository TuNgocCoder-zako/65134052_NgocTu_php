<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Nền dải màu chuyển tiếp xanh - tím giống mẫu slide */
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            padding: 20px;
        }

        /* Khung chứa Form màu trắng bo góc */
        .container {
            max-width: 600px;
            width: 100%;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Tiêu đề Registration có gạch chân màu tím */
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 25px;
            position: relative;
        }

        .title::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -5px;
            height: 3px;
            width: 35px;
            background: #9b59b6;
            border-radius: 5px;
        }

        /* Chia lưới 2 cột cho các ô nhập liệu */
        .user-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px 20px;
            margin-bottom: 20px;
        }

        .input-box {
            display: flex;
            flex-direction: column;
        }

        .input-box label {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 6px;
            color: #333;
        }

        /* Ô nhập bo góc viền màu tím nhạt */
        .input-box input {
            height: 38px;
            padding: 0 10px;
            border: 1.5px solid #d4a5ff;
            border-radius: 6px;
            outline: none;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .input-box input:focus {
            border-color: #9b59b6;
        }

        /* Phần chọn giới tính */
        .gender-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
        }

        .gender-group {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .gender-group label {
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* Nút bấm Register gradient tím - xanh */
        .submit-btn {
            width: 100%;
            height: 42px;
            border: none;
            border-radius: 6px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: opacity 0.3s;
        }

        .submit-btn:hover {
            opacity: 0.9;
        }

        /* Hộp thông báo kết quả PHP hiển thị bên dưới */
        .result-box {
            margin-top: 20px;
            max-width: 600px;
            width: 100%;
            background: #fff;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            color: #a824b2;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <div class="title">Registration</div>

            <div class="user-details">
                <div class="input-box">
                    <label>Full Name</label>
                    <input type="text" name="full_name" placeholder="Trieu H.N." required>
                </div>
                <div class="input-box">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="trieu" required>
                </div>
                <div class="input-box">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="trieu.science@gmail.com" required>
                </div>
                <div class="input-box">
                    <label>Phone Number</label>
                    <input type="text" name="phone_number" placeholder="89625510266" required>
                </div>
                <div class="input-box">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="..." required>
                </div>
                <div class="input-box">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="..." required>
                </div>
            </div>

            <div class="gender-title">Gender</div>
            <div class="gender-group">
                <label><input type="radio" name="gender" value="Male" checked> Male</label>
                <label><input type="radio" name="gender" value="Female"> Female</label>
                <label><input type="radio" name="gender" value="Prefer not to say"> Prefer not to say</label>
            </div>

            <input type="submit" name="register" class="submit-btn" value="Register">
        </form>
    </div>

    <?php
        // Chỉ xử lý khi người dùng đã bấm Submit Form
        if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['register'])) {
            $full_name = $_POST['full_name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';

            echo "<div class='result-box'>";
            // Kiểm tra mật khẩu trùng khớp
            if ($password !== $confirm_password) {
                echo "Incorrect confirm password!";
            } else {
                echo "Thank $full_name !, please confirm registration in your email: $email";
            }
            echo "</div>";
        }
    ?>
</body>
</html>