<?php
    session_start();
    $_SESSION["colors"] = array();
?>

<!DOCTYPE html>
<html>
    <body>
        <h4> Enter your favorite colors </h4>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            Favorite color 1: <input type="text" name="color1">
            <br>Favorite color 2: <input type="text" name="color2">
            <br>Favorite color 3: <input type="text" name="color3">
            <br>Favorite color 4: <input type="text" name="color4">
            <br>Favorite color 5: <input type="text" name="color5">
            <br><input type="submit" name="submit" value="send colors">
        </form>
        <?php
            if (isset($_POST["submit"])){ 
                $colors = $_POST;
                $_SESSION["colors"] = $colors;
                header('location: ResultColors.php');
            }
            
        ?>        
    </body>
</html>
