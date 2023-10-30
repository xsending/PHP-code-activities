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
            $dbname = "adminuser2";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if($conn->connect_error){
                die("Connection failed: ".$conn->connect_error);
            }     
        ?>
        <h3> My Information </h3>
        <br>
        <a href="admin_home.php"> Back </a><br>
        <?php
            $user = $_SESSION["username"];
            $sql = "SELECT * FROM people WHERE people.username = '$user'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo "<b>Welcome</b> ".$_SESSION["name"]."<br><br>";
            echo "<b>Userlevel:</b> ".$row["level"]."<br><br>";
            echo "<b>Birthday:</b> ".$row["bday"]."<br><br>";
            echo "<b>Contact Details</b><br>";
            echo "    <b>Email: </b>".$row["email"]."<br>";
            echo "    <b>Contact: </b>".$row["contact"]."<br>";   
        
        ?>
        
        <hr>
        
        <h3> -Password Reset- </h3>

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <br>Enter Current Password: <input type="password" name="currpass">
            <br>Enter New Password: <input type="password" name="newpass">
            <br>Re-Enter New Password: <input type="password" name="renewpass">
            <br><input type="submit" name="submit" value="Reset Password">
        </form>

        <?php
            if(isset($_POST["submit"])){
                $sql = "SELECT * FROM people WHERE people.username = '$user'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                if($_POST["currpass"] == $row["password"]){
                    if($_POST["newpass"] == $_POST["currpass"]){
                        echo "<br><br>Your new password is the same as your old password.";
                    }
                    else{
                        if($_POST["newpass"] != $_POST["renewpass"]){
                            echo "<br><br> New password and Re-Enter new password should be the same.";
                        }
                        else{
                            $pass = $_POST["newpass"];
                            $sql = "UPDATE people SET password='$pass' WHERE username ='$user'";
                            if ($conn->query($sql) === TRUE) {
                                echo "Password updated successfully";
                              } else {
                                echo "Error updating password: " . $conn->error;
                              }   
                        }
                    }
                }
                else{
                    echo "<br><br>Current password is not the same with the old password.";
                }
            }
        ?>
    </body>
</html>
