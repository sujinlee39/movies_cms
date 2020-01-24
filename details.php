<?php
    ini_set('display_errors', 1);

    require_once 'config/database.php';
    require_once 'admin/scripts/read.php';

    if(isset($_GET['id'])){
        $movie_table = 'tbl_movies';
        $id = $_GET['id'];
        $col = 'movies_id';


        $getMovies = getSingleMovie($movie_table, $col, $id);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcom to the Movie CMS!</title>
</head>
<body>
    <?php include_once 'templates/header.php'; ?>
    <?php while($row = $getMovies->fetch(PDO::FETCH_ASSOC)):?>
        <div class="movie-item">
            <img src="images/<?php echo $row['movies_cover'];?>" alt="<?php echo $row['movies_title'];?>"/>
            <h2><?php echo $row['movies_title']; ?></h2>
            <h4><?php echo $row['movies_year']; ?></h4>
            <p><?php echo $row['movies_storyline']; ?></p>
            <a href="index.php">Back..</a>
        </div>
    <?php endwhile;?>
    <?php include_once 'templates/footer.php'; ?>
</body>
</html>