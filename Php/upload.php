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
                <form action="upload.php" method="post" enctype="multipart/form-data">
                
                <label for="fileToUpload">Select Sound to upload:</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="small-12 columns">
                <label for="types">Choose a type:</label>
                    <select name="types" id="types" required>
                        <option value="">Choose a type</option>
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="opel">Opel</option>
                        <option value="audi">Audi</option>
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