<?php
include"db_connect.php";


  

    if (isset($_POST['submit'])) {

       $maxsize = 5242880; //5mb


       $name = $_FILES['file']['name'];
        $target_dir = "videos/";
        $target_file = $target_dir . $_FILES["file"]["name"];

        // Select file type
      $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // video players
      $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

      // Check extension
            if( in_array($videoFileType,$extensions_arr) ){
                
                // Check file size
                if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                    echo "File too large. File must be less than 5MB.";
                }else{
                    // Upload
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                        // Insert record
                        $query = "INSERT INTO video(name,location) VALUES('".$name."','".$target_file."')";

                        mysqli_query($con,$query);
                        echo "Upload successfully.";
                    }
                }

            }else{
                echo "Invalid file extension.";
            }

    }

?>



<html>
<head>
	<title>Video upload</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data" >
 <div class="frmDronpDown">
 	<h2>VIDEO UPLOAD</h2>
 	<div class="row">
       
          <input type="file" name="file" id="file" multiple="">
        </div>
       
       <div class="row">
        <input type="submit" name="submit" value="Upload">
       </div>
       <div><<a href="readvideo.php">Watch Video</a>
        </div>
       <!-- <a href="readvideo.php">Watch Video</a> -->
        
 </div>

</form>
 <footer id="footer">
        <div class="copyright">
          &copy; Labbitech Limited All rights reserved.
        </div>
      </footer>

</body>
</html>