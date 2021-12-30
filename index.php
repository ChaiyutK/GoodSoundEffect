<?php
require("mysql/config.php");
$count = 1;
if(!empty($_POST['typesearch']))
{
    $typesearch = $_REQUEST['typesearch'];
}
else
{
    $typesearch = "type.type_id";
}
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
    <link rel="stylesheet" href="Css/style_gse.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
            <div class="grid-x">
                <div class="small-12 cell">
                    <form action="index.php" method="post">
                        <div class="typesearch">
                            <select class="typesearch" name="typesearch" required>
                                <option value = 'type.type_id'>All</option>
                                <?php
                                    $sql="select * from type";
                                    require("mysql/connect.php");
                                    while($row=mysqli_fetch_array($result))
                                    {
                                        if($row['type_id'] == $typesearch)
                                        {
                                            echo "<option value='$row[type_id]' selected>$row[type_name]</option>";
                                        }
                                        else
                                        {
                                            echo "<option value='$row[type_id]'>$row[type_name]</option>";
                                        }
                                    }
                                    require("mysql/unconnect.php");
                                ?>
                            </select>
                            <button class="button secondary">Search</button>
                        </div>
                    </form>
                </div>
            <?php
               $sql="select * from sound inner join type on sound.type_id = type.type_id where sound.type_id = $typesearch";
               require("mysql/connect.php");
               while($row=mysqli_fetch_array($result))
               {
            ?>  
                <div class="small-4 cell">
                    <div class="work">
                        <div class="card">
                            <div class="card-divider">
                                <h4><?php echo "$row[sound_name]"; ?></h4>
                            </div>
                            <?php
                                    echo "<a href='Sound/$row[sound_id].mp3' download='$row[sound_name].mp3'>";
                            ?>
                                <img src="image/soundwave.gif">
                            </a>
                            <div class="card-section">

                            <audio id="<?php echo "audio$count"; ?>" onended="onAudioEnded('<?php echo "playPauseBT$count"; ?>');">
                            <?php
                                    echo "<source src='Sound/$row[sound_id].mp3' type='audio/mpeg'>";
                            ?>
                            </audio>
                            <button type="button" class="button secondary" id="<?php echo "playPauseBT$count"; ?>" onclick="playPause('<?php echo "playPauseBT$count"; ?>','<?php echo "audio$count"; ?>')"><i class="material-icons">play_arrow</i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $count++;
                 }
                 require("mysql/unconnect.php");
                ?>
            </div>
    </div>
    </div>
<script src="Js/play_button.js"></script>
</body>
</html>