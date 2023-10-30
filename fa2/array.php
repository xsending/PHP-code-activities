<html>
<head>
    <title>
        array
    </title>
</head>
<body>
    <?php
        $numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
        $sum = 0;
        $quotient = 1;
        $product = 1;
        $difference = 0;
        echo "Array list: ";
        for($x = 0; $x < count($numbers); $x++) {
            if($x != count($numbers) - 1){
                echo $numbers[$x].", ";
            }
            else{
                echo $numbers[$x];
            }
        }
        echo "<br>Addition ";
        for($x = 0; $x < count($numbers); $x++) {
            $sum += $numbers[$x];
        }
        echo $sum;
        echo "<br>Subtraction ";
        for($x = 0; $x < count($numbers); $x++) {
            $difference -= $numbers[$x];
        }
        echo $difference;
        echo "<br>Multiplication ";
        for($x = 0; $x < count($numbers); $x++) {
            $product *= $numbers[$x];
        }
        echo $product;
        echo "<br>Division ";
        for($x = 0; $x < count($numbers); $x++) {
            $quotient /= $numbers[$x];
        }
        echo $quotient;
          

    ?>
</body>

</html>