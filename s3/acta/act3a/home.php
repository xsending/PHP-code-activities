<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <body>
        <?php
            echo $_SESSION["user"]."<br><br><br>";
            echo "<a href=logout.php> Logout </a>";            
        ?>        
    </body>
</html>
