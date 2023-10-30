<?php
    session_start();
    $_SESSION["user"] = "";
?>
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
            $user = "Heir";
            $pass = "abel12";
            if (isset($_POST["submit"])){ 
                if($_POST["user"] == $user && $_POST["pass"] == $pass){
                    if(isset($_POST["check"])){
                        setcookie("username", $_POST["user"]);
                        setcookie("password", $_POST["pass"]);
                    }
                    $_SESSION["user"] = $_POST["user"];
                    header("location: home.php");
                }
                else{
                    echo "<br><br>No known username or password.";
                }
            }
            
        ?>        
    </body>
</html>
