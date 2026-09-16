<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
        for ($i =1 ; $i <= 10; $i++) {
            for($j =0; $j < 10; $j++) {
                $tich = $i * $j;
                print "$i x $j = $tich <br>";
            }
            print "<br><br>";
        }
    ?>
</body>
</html>