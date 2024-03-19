<?php

session_start();
// Convert multidimensional array to single array
function array_flatten($array) {
  if (!is_array($array)) { 
    return FALSE; 
  } 
  $result = array(); 
  foreach ($array as $key => $value) { 
    if (is_array($value)) { 
      $result = array_merge($result, array_flatten($value)); 
    } 
    else { 
      $result[$key] = $value; 
    } 
  } 
  return $result; 
}
// Get all categories from db
$sth = $conn->prepare("SELECT * FROM categories");
$sth->execute();
$categories = $sth->fetchAll();
// Get all games for autocomplete
$sth2 = $conn->prepare("SELECT title FROM games");
$sth2->execute();
$games_autocomplete = $sth2->fetchAll();
$autocomplete_array = array_flatten($games_autocomplete);
$first_game = array_shift($autocomplete_array);
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="shortcut icon" href="logo.png">
    <link rel="shortcut icon" href="img/logo.png">
		<title>Retrotech webshop</title>
		<link rel="stylesheet" type="text/css" href="css/style.navbar.css">
	</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="index.php">RETROTECH</a>
    <ul class="navbar-nav mr-auto">
	
	
	<?php
	foreach ($categories as $value) {
	?>
	
      <li class="nav-item">
        <a class="nav-link" href="showlist.php?cat_id=<?php echo $value[0]; ?>"><?php echo $value[1]; ?></a>
      </li>
	<?php } ?>
    </ul>
	<?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?>
		<a href="winkelwagen.php"><i class="fa-sharp fa-solid fa-cart-shopping" style="color: #ffffff;"></i></a>
    <a class="nav-link navbar-dark" href="logout.php" style="color: rgba(255,255,255,.5);">log uit</a>
	<?php } else { ?>
    <a class="nav-link nav-login" href="login.php">log in</a>
	<?php } ?>
    <form id="search-form" class="form-inline my-2 my-lg-0">
        <input name="query" class="form-control mr-sm-2" type="text" placeholder="Zoeken" aria-label="Search" id="games_autocomplete">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
<div id="search-results"></div>
  </div>
</nav>