<?php
// Connect to db
include 'inc/db_connect.php';
include 'inc/functions.php';

$category_id = $_GET['cat_id'];

// Get all games from db with a specific category
$sth2 = $conn->prepare("SELECT * FROM games WHERE category_id = $category_id");
$sth2->execute();
$games = $sth2->fetchAll();

// If no results from db, redirect 404
if (empty($games)) {
	$message = 'Er zijn helaas geen games in deze categorie.';
}
include 'inc/header.php';
?>

<br><br><br><br><br>

  <div class="container">
  
<?php foreach ($games as $value) { ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Retrotech webshop</title>
        <link rel="stylesheet" type="text/css" href="css/style.navbar.css">
        <link rel="stylesheet" type="text/css" href="css/style.showgame.style.showlist.css">
        <link rel="stylesheet" type="text/css" href="css/style.index.css">
    </head>
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-2">
		<img src="img/<?php echo $value['cover_img']; ?>.png" class="img-fluid">
      </div>
      <div class="col-md-8">
        <h2><?php echo $value['title']; ?></h2>
		<br>
			<p class="pricetag-small">&euro; <?php echo priceConverter($value['price']); ?></p>
		<br>
		<a href="showgame.php?id=<?php echo $value['id']; ?>" class="btn btn-success">Meer info</a>
      </div>
    </div>
	
    <hr>
<?php } ?>
	
	<h5><?php if(isset($message)) { echo $message; } ?></h5>
  </div> <!-- /container -->

<br><br><br>
<?php include 'inc/footer.php'; ?>