<html>
    <head>
        <title>
            Grade Ranking
        </title>
        <h1>
            My Grade Ranking Program
        </h1>
    </head>
    <body>
        
        <?php
            $name = "Edra Abel S. Gomez";
            $grade = 95;
            $rank = " ";
            if (93 <= $grade && $grade >= 100){
                $rank = "A";
            }
            elseif (90 <= $grade && $grade >= 92){
                $rank = "A-";
            }
            elseif (87 <= $grade && $grade >= 89){
                $rank = "B+";
            }
            elseif (83 <= $grade && $grade >= 86){
                $rank = "B";
            }
            elseif (80 <= $grade && $grade >= 82){
                $rank = "B-";
            }
            elseif (77 <= $grade && $grade >= 79){
                $rank = "C+";
            }
            elseif (73 <= $grade && $grade >= 76){
                $rank = "C";
            }
            elseif (70 <= $grade && $grade >= 72){
                $rank = "C-";
            }
            elseif (67 <= $grade && $grade >= 69){
                $rank = "D+";
            }
            elseif (63 <= $grade && $grade >= 66){
                $rank = "D";
            }
            elseif (60 <= $grade && $grade>= 62){
                $rank = "D-";
            }
            elseif ($grade > 60){
                $rank = "F";
            }
            
            echo "Name: $name <br>";
            echo "Rank: $rank <br> Grade: $grade <br> <br>";
        ?>
        <img src="photo.jpg" width= "235" height = "350">
    </body>
</html>