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
        <h3> View Records </h3>
        <br>
        <a href="admin.php"> Back </a>

        <?php
            $sql = "SELECT * FROM people";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo "<table><tr><th>ID<th><th>Email<th><th>Username<th>";
            echo "<th>Password<th><th>Userlevel<th><th>Status<th><tr>";
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["id"]."<td><td>".$row["email"]."<td><td>".$row["username"]."<td>";
                    echo "<td>".$row["password"]."<td><td>".$row["level"]."<td><td>".$row["status"]."<td>";
                }
            } else {
                echo "No records";
            }
        ?>
    </body>
</html>
