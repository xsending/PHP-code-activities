<?php
    session_start();

    $_SESSION["user"] = "";
    $_SESSION["pass"] = "";

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

        <h4> REGISTER </h4>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            First Name:<br><input type="text" name="fname">
            <br>Middle Name:<br><input type="text" name="mname">
            <br>Last Name:<br><input type="text" name="lname">
            <br>Username:<br><input type="text" name="user">
            <br>Password:<br><input type="text" name="pass">
            <br>Confirm Password:<br><input type="text" name="conpass">
            <br>Birthday:<br><input type="text" name="bday">
            <br>Email:<br><input type="text" name="email">
            <br>Contact Number:<br><input type="text" name="contact">
            <br><br><input type="submit" name="register" value="Register">
            <input type="submit" name="login" value="Login">
        </form>
        <?php
            if (isset($_POST['register'])){ 
                $user = $_POST['user'];
                $sql = "SELECT user FROM users WHERE users.user = '$user'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0){
                    echo "<br><br>The username has already been taken.";
                }
                else{
                    if($_POST["pass"] == $_POST["conpass"]){
                        $name = $_POST['fname']." ".$_POST['mname']." ".$_POST['lname'];
                        $pass = $_POST['pass'];
                        $bday = $_POST['bday'];
                        $email = $_POST['email'];
                        $contact = $_POST['contact'];
    
                        $_SESSION["pass"] = $pass;
                        $_SESSION["user"] = $user;
                        $sql = "INSERT INTO users(name, user, pass, bday, email, contact)
                        VALUES ('$name', '$user', '$pass', '$bday', '$email', '$contact')";

                        if ($conn->query($sql) === TRUE) {
                            echo "New user created successfully.";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                              
                    }
                    else{
                        echo "<br><br>password and confirm password are not the same";
                    } 
                }
                
            } elseif(isset($_POST["login"])){
                header("location: login.php");
            }      
        ?>        
    </body>
</html>