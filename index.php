<?php
require("mysql/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoodSoundEffect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.7.4/css/foundation.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.7.4/css/foundation-float.min.css">
    <link rel="stylesheet" href="Css/style.css">
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <a href="index.php"><img src="image/logo.png" width="50px" height="50px"></a>
        </div>
        <div class="menu">
            <a href="#contact">Contact Me</a>
        </div>
    </div>
    
    <div class="container">
        <div class="header-content">
            <h5>We collect sound effect that good to use in your video</h5>
        </div>
        <div class="lower-content">
            <h6>this website made for video editor who want to download sound effect</h6>
        </div>
    <div class="audio-table">
            <div class="row">
            <?php
               $sql="select * from sound";
               require("mysql/connect.php");
               while($row=mysqli_fetch_array($result))
               {
            ?>  
                <div class="small-4 columns">
                    <div class="work">
                        <div class="card">
                            <div class="card-divider">
                                <h4><?php echo "$row[sound_name]"; ?></h4>
                            </div>
                            <?php
                                    echo "<a href='Sound/$row[sound_id].mp3' download='$row[sound_name].mp3'>"
                            ?>
                                <img src="image/soundwave.gif">
                            </a>
                            <div class="card-section">
                                <audio controls>
                                    <?php
                                            echo "<source src='Sound/$row[sound_id].mp3' type='audio/mpeg'>"
                                    ?>
                                </audio>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                 }
                 require("mysql/unconnect.php");
                ?>
            </div>
    </div>

            
        
    </div>
</body>
</html>