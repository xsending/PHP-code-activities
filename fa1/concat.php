<html>
    <head>
        <title>
            Two-digit combinations
        </title>
        <h1>
            Two-digit combinations from 00-99
        </h1>
    </head>
    <body>
        <?php
            for($i=0;$i<=9;$i++){
                for($j=0;$j<=9;$j++){
                    echo $i.$j.", ";
                }
            }
        ?>
    </body>
</html>