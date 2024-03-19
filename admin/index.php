<?php
//back end door donny en front end door
session_start();

if (isset($_SESSION["is_logged_in"])) {
}
else {
	header('Location: login.php');
}

include '../inc/db_connect.php';



if (isset($_POST['categoryname'])) {

	$sth = $conn->prepare("
		INSERT INTO categories (name) VALUES ('$_POST[categoryname]')
	");
	$sth->execute();
}
if (isset($_POST['title'])) {
	$jost = $conn->prepare("
		INSERT INTO games (category_id, title, release_year, price, publisher, cover_img) VALUES ('$_POST[category_id]','$_POST[title]','$_POST[release_year]','$_POST[price]','$_POST[publisher]','$_POST[cover_img]')        
	");
	$jost->execute();
}





?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Retrotech Admin Dashboard</title>
        <script>
            window.console = window.console || function (t) {};
        </script>
        <script>
            if (document.location.search.match(/type=embed/gi)) {
                window.parent.postMessage("resize", "*");
            }
        </script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="img/logo.png">
    </head>
    <body translate="no">
        <h2>Retrotech Admin Dashboard</h2>
        <div class="warpper">
            <input class="radio" id="one" name="group" type="radio" checked="">
            <input class="radio" id="two" name="group" type="radio">
            <div class="tabs">
                <label class="tab" id="one-tab" for="one">Categorie toevoegen</label>
                <label class="tab" id="two-tab" for="two">games toevoegen</label>
                <label class="tab" id="three-tab" for="two"><a href="logout.php">Uitloggen</a></label>
            </div>
            <div class="panels">
                <div class="panel" id="one-panel">
                    <div class="panel-title">Categorie toevoegen</div>
					<br>
					
					
					
					
						<form method="POST" action="index.php">
							<label for="categoryname">Categorie naam:</label><br>
							<input type="text" name="categoryname" id="categoryname" minlength="1" maxlength="255"><br><br>
							<input type="submit" value="Opslaan">
						</form>
						<br>
						
						
						
						
						
						
                </div>
                <div class="panel" id="two-panel">
                    <div class="panel-title">games toevegen</div>
                    <p><form 
                        action="index.php" method="post" enctype="multipart/form-data">
                        Select image to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="text" name="category_id" id="category_id" minlength="1" maxlength="255" placeholder="category_id"><br><br>
                        <input type="text" name="title" id="title" minlength="1" maxlength="255" placeholder="title"><br><br>
                        <input type="text" name="release_year" id="release_year" minlength="1" maxlength="255" placeholder="release_year"><br><br>
                        <input type="text" name="price" id="price" minlength="1" maxlength="255" placeholder="price"><br><br>
                        <input type="text" name="publisher" id="publisher" minlength="1" maxlength="255" placeholder="publisher"><br><br>
                        <input type="text" name="cover_img" id="cover_img" minlength="1" maxlength="255" placeholder="cover_img"><br><br>
                        <input type="submit" value="Upload Image" name="submit">
                    </form></p>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
if (isset($_FILES["fileToUpload"])) {
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    }
}
?>