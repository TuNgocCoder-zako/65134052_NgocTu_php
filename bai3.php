<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<?php
    ?>, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function isPrime($n){
            if($n < 2) return false;
            for($i =2; $i <= sqrt($n); $i++){
                if($n % $i == 0) return false;
            }
            return true;
        }


       $n = rand(-100, 100);
       if($n > 0){
            echo "<h3>Gia tri ngau nhien N = $n</h3>";
            echo "<h3>Cac uoc cua so $n: </h3>";
           for($i=1; $i<=$n; $i++){
               if($n % $i == 0)
                 echo $i . " ";
           }
       }

       isPrime($n) ? print("<h3>$n la so nguyen to</h3>") 
       : print("<h3>$n khong phai la so nguyen to</h3>");

       $sum=0;
        for($i =2 ; $i <= $n; $i++){
            if(isPrime($i))
               $sum += $i; 
        }
        echo "<h3>Tong cac so nguyen to nho hon hoac bang $n la: $sum</h3>";
    ?>
</body>
</html>