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

        <h4> ADD RECORD </h4>
        <a href="admin.php"> Back </a>
        <br>
        <hr>

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            Email:<input type="text" name="email">
            <br>Username:<input type="text" name="user">
            <br>Password:<input type="password" name="pass">
            <br>Userlevel:<input type="text" name="level" placeholder="admin/user">
            <br>Status:<input type="text" name="status" placeholder="active/disable">
            <br><br><input type="submit" name="save" value="Save">
        </form>
        <br>

        <?php
            if (isset($_POST["save"])){ 
                $email = $_POST["email"];
                $user = $_POST["user"];
                $pass = $_POST["pass"];
                $level = $_POST["level"];
                $status = $_POST["status"];

                $sql = "SELECT username FROM people WHERE people.username = '$user'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0){
                    echo "<br><br>The username has already been taken.";
                } 
                else{
                    $sql = "INSERT INTO people(email, username, password, level, status) 
                    VALUES ('$email', '$user', '$pass', '$level', '$status')";

                    if ($conn->query($sql) === TRUE) {
                        echo "New ".$level." created successfully.";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                
            }             
        ?>        
    </body>
</html>
