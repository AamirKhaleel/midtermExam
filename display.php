<?php
    require_once "server.php";
    //$genre = trim($_POST["genre"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search Music</title>
    </style>
</head>
<body>
  <div class="page-header">
    <h2>Search Music</h2>
    <br>
    <p>Please Select the Genre of your chosen Music</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
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
            </div>
            <br>
            <input type="submit" class="btn btn-primary" value="Submit" text="Search">
            <a href="index.php" class="btn btn-default">Add</a>
            <br>
        </form>
    </div>
    <?php
        require_once "server.php";
        $sql = "SELECT * FROM music ";
        if($result = $mysqli->query($sql))
        {
            if($result->num_rows > 0)
            {
                echo "<table class='table table-bordered table-striped'>";
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Genre</th>";
                            echo "<th>Song Name</th>";
                            echo "<th>Artist</th>";
                        echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while($row = $result->fetch_array()){
                            echo "<tr>";
                            echo "<td>" . $row['musicID'] . "</td>";
                            echo "<td>" . $row['genre'] . "</td>";
                            echo "<td>" . $row['song'] . "</td>";
                            echo "<td>" . $row['artist'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";                            
                echo "</table>";
            }
        }
    ?>
</body>
</html>