<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <body>
        <?php
            //server creation
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "loginsystem";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if($conn->connect_error){
                die("Connection failed: ".$conn->connect_error);
            }     
        ?>
        <h4> LOGIN </h4>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            Username:<br><input type="text" name="user">
            <br>Password:<br><input type="password" name="pass">
            <br><input type="submit" name="register" value="Register">
            <input type="submit" name="login" value="Login">
        </form>
        <?php
            if (isset($_POST["login"])){ 
                $user = $_POST["user"];
                $pass = $_POST["pass"];
                $_SESSION["user"] = $user;
                $_SESSION["pass"] = $pass;
                $sql = "SELECT user, pass FROM users WHERE users.user = '$user' AND users.pass =
                '$pass'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0){
                    header("location: home.php");
                }
                else{
                    echo "<br><br>No known username or password.";
                }
            } elseif(isset($_POST["register"])){
                header("location: register.php");
            }
            
        ?>        
    </body>
</html>
