<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <body>
    <?php
        session_destroy();
        echo "Logged out successfully.<br>";
        echo "<a href='login.php'> Login</a><br>";
    ?>
    </body>
</html>
