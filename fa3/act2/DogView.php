<!DOCTYPE html>
<html>
    <body>
        <?php
            //server creation
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "dogregister";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if($conn->connect_error){
                die("Connection failed: ".$conn->connect_error);
            } 
              
            $sql = "SELECT * FROM doginfo";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "Dog ".$row["ID"]."<br>";
                echo "Name: ".$row["DName"]."<br>";
                echo "Breed: ". $row["DBreed"]. "<br>";
                echo "Age: ".$row["DAge"]."<br>";
                echo "Address: ".$row["DAddress"]."<br>";
                echo "Color: ".$row["DColor"]."<br>";
                echo "Height: ".$row["DHeight"]."<br>";
                echo "Weight: ".$row["DWeight"]."<br><br><br><br>";
            }
            } else {
                echo "0 results";
            }
        ?>
    </body>
</html>