<!DOCTYPE html>
<html>
    <body>
        <h4> My Personal Information </h4>
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
            <br><br><input type="submit" name="submit" value="Submit">
        </form>
        <?php
            if (isset($_POST["submit"])){ 
                if($_POST["pass"] == $_POST["conpass"]){
                    echo "<br>Full Name: ".$_POST["fname"]." ".$_POST["mname"]." ".$_POST["lname"]."<br>";
                    echo "Username: ".$_POST["user"]."<br>";
                    echo "Password: ".$_POST["pass"]."<br>";
                    echo "Birthday: ".$_POST["bday"]."<br>";
                    echo "Email: ".$_POST["email"]."<br>";
                    echo "Contact Number: ".$_POST["contact"]."<br>";
                }
                else{
                    echo "<br>password and confirm password are not the same";
                }
            }
            
        ?>        
    </body>
</html>
