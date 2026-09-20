<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web login</title>
</head>
<body>
    <form action="" method="POST">
    <h1>Login</h1>
    <input type="text" name="username" placeholder="Username" size="20"><br>
    <input type="password" name="password" placeholder="Password" size="20"><br>
    <input type="submit" value="Login">
    </form>

    <?php
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == "admin" && $password == "123") {
            echo "<p>Login successful! Welcome, $username!</p>";
        } else {
            echo "<p style='color: red;'>Invalid username or password.</p>";
        }
    ?>
</body>
</html>