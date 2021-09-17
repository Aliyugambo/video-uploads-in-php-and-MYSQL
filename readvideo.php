<?php
    
include"db_connect.php";
?>
<!doctype html>
<html>
    <head>
            <link rel="stylesheet" type="text/css" href="style.css">
             
    </head>
    <body>
        <div>
          
        <?php
        $fetchVideos = mysqli_query($con, "SELECT * FROM video ORDER BY id DESC");
        while($row = mysqli_fetch_assoc($fetchVideos)){
            $location = $row['location'];
            
            echo "<div >";
            echo "<video src='".$location."' controls width='320px' height='200px' >";
            echo "</div>";
        }
        ?>

          
        </div>
        <a href="index.php">Back To Home</a>
    </body>
</html>
