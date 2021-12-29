<?php
require("../mysql/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.7.4/css/foundation.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.7.4/css/foundation-float.min.css">
    <link rel="stylesheet" href="../Css/style.css">
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="../image/logo.png" width="50px" height="50px">
        </div>
        <div class="menu">
            <a href="#contact">Contact Me</a>
        </div>
    </div>
    <div class="container">
        <div class="upload">
        <div class="row">
            <div class="small-12 columns">
                <form action="uploadsave.php" method="post" enctype="multipart/form-data">
                <label for="sound_id">Sound id:</label>
                <input type="text" name="sound_id" id="sound_id" maxlength="10">
            </div>
            <div class="small-12 columns">
                <label for="sound_name">Sound name:</label>
                <input type="text" name="sound_name" id="sound_name" maxlength="30">
            </div>
            <div class="small-12 columns">
                <label for="fileToUpload">Select Sound to upload:</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="small-12 columns">
                <label for="types">Choose a type:</label>
                    <select name="types" id="types" required>
                        <option value="">Choose a type</option>
                        <?php
               $sql="select * from type";
               require("../mysql/connect.php");
               while($row=mysqli_fetch_array($result))
               {
               echo "<option value='$row[type_id]'>$row[type_name]</option>";
                }
            require("../mysql/unconnect.php");
               ?>
                    </select>
            </div>
            <div class="small-12 columns">
            <div class="center">
            <input class="upload" type="submit" value="Upload file" name="submit">
            </div>
            </div>
        </div>
        </div>
        </form>
    </div>
</body>
</html>