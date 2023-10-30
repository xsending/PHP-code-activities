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

        <h3> Add User </h3>
        <a href="admin_home.php"> Back </a>
        <br>
        <hr>

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            Fill Up Form
            <br>First Name:<input type="text" name="fname">
            <br>Middle Name:<input type="text" name="mname">
            <br>Last Name:<input type="text" name="lname">
            <br>Username:<input type="text" name="user">
            <br>Password:<input type="text" name="pass">
            <br>Confirm Password:<input type="text" name="conpass">
            <br>Birthday:<input type="text" name="bday">
            <br>Email:<input type="text" name="email">
            <br>Contact Number:<input type="text" name="contact">
            <br><br><input type="submit" name="submit" value="Submit">
        </form>
        <br>

        <?php      
            if (isset($_POST["submit"])){ 
                $pass = $_POST["pass"];
                $conpass = $_POST["conpass"];
                if($pass == $conpass){
                    $fname = $_POST["fname"];
                    $mname = $_POST["mname"];
                    $lname = $_POST["lname"];
                    $user = $_POST["user"];
                    $bday = $_POST["bday"];
                    $email = $_POST["email"];
                    $contact = $_POST["contact"];
                    $sql = "SELECT username FROM people WHERE people.username = '$user'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0){
                        echo "<br><br>The username has already been taken.";
                    } 
                    else{
                        $sql = "INSERT INTO people(fname, mname, lname, password, contact, email, bday, 
                        username) VALUES ('$fname', '$mname', '$lname', '$pass',
                        '$contact', '$email', '$bday', '$user')";

                        if ($conn->query($sql) === TRUE) {
                            echo "New user created successfully.";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                } else{
                    echo "<br>Password and confirm password does not match. Please try again.<br>";
                }     
            } 
        ?>        
    </body>
</html>
