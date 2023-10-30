<?php
    session_start();
    $_SESSION["username"] = "";
    $_SESSION["name"] = "";
?>

<!DOCTYPE html>
<html>
    <body>

        <?php
            //server creation
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "adminuser2";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if($conn->connect_error){
                die("Connection failed: ".$conn->connect_error);
            }     
        ?>

        <h3> Login Form </h3>
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
                
                $sql = "SELECT username, password, status FROM people WHERE people.username = '$user' 
                AND people.password ='$pass'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    if($row["status"] == "active"){
                        $sql = "SELECT fname, mname, lname, level FROM people 
                        WHERE people.username = '$user' AND people.password ='$pass'";

                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $_SESSION["name"] = $row["fname"]." ".$row["mname"]." ".$row["lname"];
                        if ($row["level"] == "admin"){
                            header("location: admin_home.php");
                        }
                        else{
                            header("location: user_home.php");
                        }
                    }
                    else{
                        echo "<b> This account is disabled please contact the administrator<br><br>";
                    }             
                }
                else{
                    echo "<br><br>No known username or password.";
                } 
            }   
        ?>  

    </body>
</html>
