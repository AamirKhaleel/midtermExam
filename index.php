<?php
require_once "server.php";
$genre = $songName = $artist = "";
$genre_err = $songName_err = $artist_err = "";
$errorcounter = 0;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //get genre
    $genre  = trim($_POST["genre"]);
    echo $genre;
    //check song name
    $input_SongName = trim($_POST["songName"]);
    if(empty($input_SongName)){
        $songName_err = "Please enter Song Name.";
        $errorcounter++;
    } elseif(!filter_var($input_SongName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $lastName_err = "Please enter correct song Name.";
        $errorcounter++;
    } else{
        $songName = $input_SongName;
        echo $songName;
    }

    //check artist
    $input_artist = trim($_POST["artist"]);
    if(empty($input_artist)){
        $artist_err = "Please enter Artist Name.";
        $errorcounter++;
    } elseif(!filter_var($input_artist, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $artist_err = "Please enter correct song Name.";
        $errorcounter++;
    } else{
        $artist= $input_artist;
        echo $artist;
    }

    //if error is 0 input to databse
    if($errorcounter==0)
    {
         //  insert statement
            $sql = "INSERT INTO `music`(`genre`, `song`, `artist`) VALUES ('$genre','$songName','$artist')";
            if($mysqli->query($sql)=== TRUE)
            {
                header("location: display.php");
                exit();
            }
            else{
                echo "error";
            }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Music</title>
    </style>
</head>
<body>
  <div class="page-header">
    <h2>Add Music</h2>
    <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($genre_err)) ? 'has-error' : ''; ?>">
                <label>Genre</label>
                <select name="genre" id="genre">
                <option value="R&B">R&B</option>
                <option value="Pop">Pop</option>
                <option value="Balad">Balad</option>
                <option value="Reggae">Reggae</option>
                <option value="Soul">Soul</option>
                <option value="HipHop">HipHop</option>
                <option value="Rock">Rock</option>
                <option value="Metal">Metal</option>
                </select>
            <class="help-block"><?php echo $genre_err;?></span>
            </div>
            <br>
            <div class="form-group <?php echo (!empty($songName_err)) ? 'has-error' : ''; ?>">
                <label>Song Name</label>
                <input type="text" name="songName" class="form-control" value="<?php echo $songName; ?>">
                <span class="help-block"><?php echo $songName_err;?></span>
            </div>
            <br>
            <div class="form-group <?php echo (!empty($artist_err)) ? 'has-error' : ''; ?>">
                <label>Artist</label>
                <input type="text" name="artist" class="form-control" value="<?php echo $artist; ?>">
                <span class="help-block"><?php echo $artist_err;?></span>
            </div>
            <br>
            <input type="submit" class="btn btn-primary" value="Submit">
            <a href="display.php" class="btn btn-default">Cancel</a>
        </form>
    </div>
</body>
</html>