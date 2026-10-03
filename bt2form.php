<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h1>Registration</h1>
    <form action="bt2process.php" method="get">
        <table>
            <tr>
                <td>Full name</td>
                <td>User name</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="fullname" value="<?php //lay gia tri chen vao day?>" required>
                </td>
                <td>
                    <input type="text" name="username" required>
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    Phone number
                </td>
            </tr>
            <tr>
                <td>
                    <input type="email" name="email" required>
                </td>
                <td>
                    <input type="tel" name="phonenumber" required>
                </td>
            </tr>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    Confirm Password
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="password" required>
                </td>
                <td>
                    <input type="password" name="confirmpassword" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <b>Gender</b>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="radio" name="sex" value="Male" required checked> Male
                    <input type="radio" name="sex" value="Female" required> Female
                    <input type="radio" name="sex" value="Other" required> Other
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" name="btnsend" value="Register">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>