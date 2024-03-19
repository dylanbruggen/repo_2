<?php
// Connect to db
include 'inc/db_connect.php';
include 'inc/functions.php';

$articlenumber = $_GET['id'];

// Get game from db based on id
$sth2 = $conn->prepare("
	SELECT *, games.id AS game_id
	FROM games
	INNER JOIN categories
	ON games.category_id = categories.id
	WHERE games.id = $articlenumber
");
$sth2->execute();
$game = $sth2->fetchAll();

// If no results from db, redirect 404
if (empty($game)) {
	header('Location: index.php');
}
include 'inc/header.php';
?>

	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Retrotech webshop</title>
		<link rel="stylesheet" type="text/css" href="css/style.navbar.css">
        <link rel="stylesheet" type="text/css" href="css/style.showgame.style.showlist.css">
		<link rel="stylesheet" type="text/css" href="css/style.rating.css">
		<link rel="stylesheet" type="text/css" href="css/style.index.css">
    </head>
<br><br><br><br><br>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
		<img src="img/<?php echo $game[0]['cover_img']; ?>.png" class="img-fluid">
      </div>
      <div class="col-md-8">
        <h2><?php echo $game[0]['title']; ?></h2>
		<br>
		<table>
			  <tr>
			    <td><b>Artikelnummer</b> &nbsp;&nbsp;&nbsp;</td>
			    <td><?php echo $game[0]['game_id']; ?></td>
			  </tr>
			  <tr>
			    <td><b>Categorie</b></td>
			    <td><?php echo $game[0]['name']; ?></td>
			  </tr>
			  <tr>
			    <td><b>Uitgever</b></td>
			    <td><?php echo $game[0]['publisher']; ?></td>
			  </tr>
			  <tr>
			    <td><b>Jaar</b></td>
			    <td><?php echo $game[0]['release_year']; ?></td>
			  </tr>
		</table>
		<br>
		
		<p class="pricetag">&euro; <?php echo priceConverter($game[0]['price']); ?></p>
		
		<?php include 'inc/rating.php'; ?>
		
        <p><a class="btn btn-success" href="inc/add_game.php?id=<?php echo $articlenumber;?>" role="button">In winkelwagen</a></p>
      </div>
    </div>

    <hr>

  </div> <!-- /container -->
<?php include 'inc/footer.php'; ?>