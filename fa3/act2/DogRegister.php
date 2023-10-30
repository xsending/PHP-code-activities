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
        ?>

        <h4> Dog Information </h4>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            Name:<br><input type="text" name="name">
            <br>Breed:<br><input type="text" name="breed">
            <br>Age:<br><input type="text" name="age">
            <br>Address:<br><input type="text" name="address">
            <br>Color:<br><input type="text" name="color">
            <br>Height:<br><input type="text" name="height">
            <br>Weight:<br><input type="text" name="weight">
            <br><input type="submit" name="submit" value="save">
        </form>
        <?php
            if (isset($_POST['submit'])){ 
                $name = $_POST['name'];
                $breed = $_POST['breed'];
                $age = $_POST['age'];
                $address = $_POST['address'];
                $color = $_POST['color'];
                $height = $_POST['height'];
                $weight = $_POST['weight'];
                $sql = "INSERT INTO doginfo(DName, DBreed, DAge, DAddress, DColor, DHeight, DWeight)
                VALUES ('$name', '$breed', '$age', '$address', '$color',
                '$height', '$weight')";      
                
                if ($conn->query($sql) === TRUE) {
                    $last_id = $conn->insert_id;
                    echo "New record created successfully.";
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
                  
                header('location: DogView.php');
            }      
        ?>        
    </body>
</html>