<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html>
    <body>
        <?php
            echo "<a href=login.php> Login </a>";       
            echo "<br><a href=register.php> Register </a>";     
        ?>        
    </body>
</html>
