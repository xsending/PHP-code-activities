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
        <h3> User Information Form </h3>
        <?php
            $user = $_SESSION["user"];
            $sql = "SELECT name, bday, email, contact FROM users WHERE users.user = '$user'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo "<br><a href=logout.php> Log-out </a><br><br>";
            echo "<b>Welcome</b> ".$row["name"]."<br>";
            echo "<b>Birthday:</b> ".$row["bday"]."<br>";
            echo "<b>Contact Details</b><br>";
            echo "    <b>Email: </b>".$row["email"]."<br>";
            echo "    <b>Contact: </b>".$row["contact"]."<br>";            
        ?>
        <hr>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            RESET PASSWORD
            <br>Enter Current Password: <input type="password" name="currpass">
            <br>Enter New Password: <input type="password" name="newpass">
            <br>Re-Enter New Password: <input type="password" name="renewpass">
            <br><input type="submit" name="submit" value="Reset Password">
        </form>

        <?php
            if(isset($_POST["submit"])){
                if($_POST["currpass"] == $_SESSION["pass"]){
                    if($_POST["newpass"] == $_POST["currpass"]){
                        echo "<br><br>Your new password is the same as your old password.";
                    }
                    else{
                        if($_POST["newpass"] != $_POST["renewpass"]){
                            echo "<br><br> New password and Re-Enter new password should be the same.";
                        }
                        else{
                            $pass = $_POST["newpass"];
                            $_SESSION["pass"] = $pass;
                            $sql = "UPDATE users SET pass='$pass' WHERE users.user ='$user'";
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
