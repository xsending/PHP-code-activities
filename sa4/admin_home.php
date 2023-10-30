<?php
    session_start();
    $_SESSION["first_row"] = array();
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
            $_SESSION["first_row"] = $row;
            echo "<b>Welcome</b> ".$_SESSION["name"]."<br><br>";
            echo "<b>Userlevel:</b> ".$row["level"]."<br><br>";
            echo "<b>Birthday:</b> ".$row["bday"]."<br><br>";
            echo "<b>Contact Details</b><br>";
            echo "    <b>Email: </b>".$row["email"]."<br>";
            echo "    <b>Contact: </b>".$row["contact"]."<br>";     
            
        ?>

        <hr>

        <a href="admin_image.php"> upload image </a><br>
        <a href="admin_changepass.php"> Reset my password </a><br>

        <hr>
        
        <h3> -Records- </h3>
        <a href="admin_adduser.php"> Add New User </a><br><br>
        <?php
            
            $sql = "SELECT * FROM people";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo "<table><tr><th>ID<th><th>First Name<th><th>Middle Name<th><th>Last Name<th>";
            echo "<th>Contact No.<th><th>Email<th><th>Birthday<th><th>Username<th>";
            echo "<th>Access Level<th><th>Status<th><tr>";
            
            echo "<tr><td>".$_SESSION["first_row"]["id"]."<td><td>".$_SESSION["first_row"]["fname"]."<td><td>".$_SESSION["first_row"]["mname"]."<td>";
            echo "<td>".$_SESSION["first_row"]["lname"]."<td><td>".$_SESSION["first_row"]["contact"]."<td><td>".$_SESSION["first_row"]["email"]."<td>";
            echo "<td>".$_SESSION["first_row"]["bday"]."<td><td>".$_SESSION["first_row"]["username"]."<td>";
            echo "<td>".$_SESSION["first_row"]["level"]."<td><td>".$_SESSION["first_row"]["status"]."<td><tr>";
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["id"]."<td><td>".$row["fname"]."<td><td>".$row["mname"]."<td>";
                    echo "<td>".$row["lname"]."<td><td>".$row["contact"]."<td><td>".$row["email"]."<td>";
                    echo "<td>".$row["bday"]."<td><td>".$row["username"]."<td>";
                    echo "<td>".$row["level"]."<td><td>".$row["status"]."<td><tr>";
                }
            } else {
                echo "No records";
            }
            echo "<table>";
        ?>
    </body>
</html>
