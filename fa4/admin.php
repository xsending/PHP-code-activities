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
            $dbname = "adminuser";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if($conn->connect_error){
                die("Connection failed: ".$conn->connect_error);
            }     
        ?>
        <h3> Admin Account </h3>
        <br>
        <a href="logout.php"> Logout </a><br>
        <a href="viewuser.php"> View Records </a><br>
        <a href="admin_add.php"> Add Record </a><br><br>

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <br><input type="submit" value="Upload Image" name="submitfile">
        </form>
        <br>
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

        <?php
            $user = $_SESSION["username"];
            $sql = "SELECT * FROM people WHERE people.username = '$user'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo "<b>Welcome</b><br>".$row["username"]."(".$row["level"].")<br><br>";
            echo "<b>Userlevel:</b><br>".$row["level"]."<br><br>";
            echo "<b>Email</b><br>".$row["email"]."<br><br>";          
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
                $sql = "SELECT * FROM people WHERE people.username = '$user'";
                $result = $conn->query($sql);
                $row = $result->fetch_row();
                if($_POST["currpass"] == $row["password"]){
                    if($_POST["newpass"] == $_POST["currpass"]){
                        echo "<br><br>Your new password is the same as your old password.";
                    }
                    else{
                        if($_POST["newpass"] != $_POST["renewpass"]){
                            echo "<br><br> New password and Re-Enter new password should be the same.";
                        }
                        else{
                            $pass = $_POST["newpass"];
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
