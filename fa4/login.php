<?php
    session_start();
    $_SESSION["username"] = "";
?>

<!DOCTYPE html>
<html>
    <body>

        <?php
            //server creation
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "adminuser";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if($conn->connect_error){
                die("Connection failed: ".$conn->connect_error);
            }     
        ?>

        <h4> LOGIN </h4>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            Username:<br><input type="text" name="user">
            <br>Password:<br><input type="password" name="pass">
            <br><input type="submit" name="login" value="Login">
        </form>
        
        <?php
            if (isset($_POST["login"])){ 
                $user = $_POST["user"];
                $pass = $_POST["pass"];     
                $_SESSION["username"] = $user;
                
                $sql = "SELECT username, password FROM people WHERE people.username = '$user' 
                AND people.password ='$pass'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0){
                    $sql = "SELECT level FROM people WHERE people.username = '$user' 
                    AND people.password ='$pass'";

                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();

                    if ($row["level"] == "admin"){
                        header("location: admin.php");
                    }
                    else{
                        header("location: user.php");
                    }
                }
                else{
                    echo "<br><br>No known username or password.";
                } 
            }   
        ?>  

    </body>
</html>
