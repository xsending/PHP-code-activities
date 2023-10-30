<html>
    <head>
        <title>
            Multiplication Table
        </title>
        <style>
            table, th, td {
            border: 2px solid black;
            border-collapse: collapse;

            }
        </style>
    </head>
    <body>
        <?php
            echo "<table>";
            for($i=0;$i<=10;$i++){
                echo "<tr bgcolor=lightblue>";
                for($j=0;$j<=10;$j++){
                    echo "<td bgcolor=lightblue>";
                    echo "<font size='20'>".$i*$j." ";
                    echo "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </body>
</html>