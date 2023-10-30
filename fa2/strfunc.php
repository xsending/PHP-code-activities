<html>
<head>
</head>
<body>
    <?php
        function stringCount($str){
            return strlen($str);
            
        }

        function stringUpper($str){
            return ucwords($str);     
        }

        function vowelChange($str){
            $vowels = array("a", "e", "i", "o", "u");
            echo "$str => ";
            $str_arr = str_split($str);
            for($i = 0; $i < strlen($str); $i++){
                foreach($vowels as $y){
                    if($str_arr[$i] == $y){
                        $str_arr[$i] = "@";
                    }
                }
            }
            $str = implode($str_arr);
            return $str;

        }

        function findA($str){
            return (strpos($str, "a") + 1);           
        }

        function reverse($str){
                return strrev($str);
        }

        $names = array("issac", "bradlee", "arjun", "andrew", "anaya",
                  "maliha", "clara", "dawid", "elias", "clarke");
        
        foreach($names as $name){
            echo "Name: ".$name."<br>";
            echo "Number of characters: ".stringCount($name)."<br>";
            echo "Uppercase first character: ".stringUpper($name)."<br>";
            echo "Replace vowels with @: ".vowelChange($name)."<br>";
            echo "Position of char a: ".findA($name)."<br>";
            echo "Reverse name: ".reverse($name)."<br>";
            echo "<br><br>";
        }

    ?>
</body>
</html>