<?php
    session_start();
?>

<!DOCTYPE html>
<html> 
    <body>
        <?php
            for($i = 1; $i < count($_SESSION["colors"]); $i++){
                echo "Favorite color ".$i.": ".$_SESSION["colors"]["color".$i]."<br>";
            }
        ?>
    </body>
</html>
