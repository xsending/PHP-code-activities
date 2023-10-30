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
        
        <h3> -Upload Image- </h3>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <br><input type="submit" value="Upload Image" name="submitfile">
        </form>
                
        <?php

            // Check if image file is a actual image or fake image
            if(isset($_POST["submitfile"])) {
                $target_dir = "uploads/admin/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $uploadOk = 1;
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check === false) {
                    echo "File is not an image.<br>";
                    $uploadOk = 0;
                }
                // Check if file already exists
                elseif (file_exists($target_file)) {
                    echo "Sorry, file already exists.<br>";
                    $uploadOk = 0;
                }
                // Check file size
                elseif ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.<br>";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Your file was not uploaded.<br><br>";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br><br>";
                    } else {
                    echo "Sorry, there was an error uploading your file.<br><br>";
                    }
                }
            }
        ?>
    
    </body>
</html>
