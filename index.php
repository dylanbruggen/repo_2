<?php
// Connect to db
include 'inc/db_connect.php';
include 'inc/functions.php';

// Get all games from db
$sth2 = $conn->prepare("SELECT * FROM games ORDER BY RAND() LIMIT 15");
$sth2->execute();
$games = $sth2->fetchAll();

include 'inc/header.php';
?>
<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
<head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Retrotech webshop</title>
    <link rel="stylesheet" type="text/css" href="css/style.navbar.css">
    <link rel="stylesheet" type="text/css" href="css/style.index.css">
</head>
  
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Welkom bij Retrotech!</h1>
        <p>De webshop voor oude en nieuwe Xbox One games. Lage prijzen en snelle levering.</p>
        <p><a class="btn btn-success btn-lg" href="#" role="button">Bekijk de nieuwste releases &raquo;</a></p>
      </div>
</div>

<div class="container">
    <div class="row">

	
	
	
	<?php
	foreach ($games as $value) {
	?>
      <div class="col-md-4">
		  <div class="card" style="width: 18rem;">
		  <img src="img/<?php echo $value['cover_img']; ?>.png  " class="card-img-top">
		  <div class="card-body">
			<h5 class="card-title"><?php echo $value['title']; ?></h5>
			<p class="card-text">&euro; <?php echo priceConverter($value['price']); ?></p>
			<a href="showgame.php?id=<?php echo $value['id']; ?>" class="btn btn-success">Meer info</a>
		  </div>
		</div>
      </div>
	<?php } ?>
	 
    </div>

    <hr>

    </div> <!-- /container -->

</main>
<?php include 'inc/footer.php'; ?>