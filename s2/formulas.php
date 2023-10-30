<html>
    <head>
        <h1> Volume of Shapes </h1>
    </head>
    <body>
        <?php
            $pi = 3.14;
            function cube($side){
                return $side ** 3;
            }
            function rightRectangularPrism($width, $height, $length){
                return $width * $height * $length;
            }
            function cylinder($radius, $height){
                global $pi;
                return $pi * ($radius**2) * $height;
            }
            function cone($radius, $height){
                global $pi;
                return $pi *($radius**2) * ($height/3);
            }
            function sphere($radius){
                global $pi;
                return (4/3) * $pi * ($radius**3);
            }
            
            $side = 5;
            $width = 6;
            $height = 9;
            $length = 7;
            $radius = 4.5;
            $tags = array("Shape", "Values", "Formula", "Answer");

            echo $tags[0].": Cube<br>";
            echo $tags[1].": s = $side <br>";
            echo $tags[2].": V = s^3 <br>";
            echo $tags[3].": ".cube($side)."<br><br><br>";

            echo $tags[0].": Right Rectangular Prism<br>";
            echo $tags[1].": w = $width, h = $height, l = $length <br>";
            echo $tags[2].": V = whl <br>";
            echo $tags[3].": ".rightRectangularPrism($width, $height, $length)."<br><br><br>";

            echo $tags[0].": Cylinder<br>";
            echo $tags[1].": r = $radius, h = $height <br>";
            echo $tags[2].": V = πr^2h <br>";
            echo $tags[3].": ".cylinder($radius, $height)."<br><br><br>";
            
            echo $tags[0].": Cone<br>";
            echo $tags[1].": r = $radius, h = $height <br>";
            echo $tags[2].": V = πr^2(h/3) <br>";
            echo $tags[3].": ".cone($radius, $height)."<br><br><br>";

            echo $tags[0].": Sphere<br>";
            echo $tags[1].": r = $radius <br>";
            echo $tags[2].": V = (4/3)πr^3 <br>";
            echo $tags[3].": ".sphere($radius)."<br><br><br>";
        ?>
    </body>
</html>