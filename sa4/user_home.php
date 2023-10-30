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
        <a href="logout.php"> Logout </a><br>
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

        <a href="user_image.php"> upload image </a><br>
        <a href="user_changepass.php"> Reset my password </a><br>
        <hr>
    </body>
</html>
