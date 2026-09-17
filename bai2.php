<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Bảng cửu chương</h2>
    <table border="1" cellspacing="0" cellpadding="5" align="center">
        <?php
            for ($i =1 ; $i <= 10; $i++) {
                echo "<tr>";
                for($j =0; $j < 10; $j++) {
                    $tich = $i * $j;
                    echo "<td>$i x $j = $tich</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
    </table>
</body>
</html>