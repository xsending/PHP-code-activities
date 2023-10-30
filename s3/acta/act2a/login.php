<!DOCTYPE html>
<html>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <br>Username:<br><input type="text" name="user">
            <br>Password:<br><input type="password" name="pass">
            <br>Remember Me<input type="checkbox" name="check">
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
            if (isset($_POST["submit"])){ 
                if(isset($_POST["check"])){
                    setcookie("username", $_POST["user"]);
                    setcookie("password", $_POST["pass"]);
                }
                echo "<pre>"; print_r($_COOKIE); echo "</pre>";
            }
            
        ?>        
    </body>
</html>
