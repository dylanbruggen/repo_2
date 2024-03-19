<?php
include 'inc/db_connect.php';
include 'inc/functions.php';
include 'inc/header.php';
?>

<head>
    <link rel="stylesheet" href="css/help_page_style.css">
</head>

<body>
    <br><br>
    <div class="feedbackdiv">
        <form action="" method="post">
            <p>
                wij willen u graag vragen of u feedback wil geven <br>
                zodat we onze website kunnen verbeteren <br>
            </p>
            <br>
            <textarea name="feedback" rows="5" cols="20" placeholder="feedback" id="feedbackfield"></textarea>
            <br>
            <input type="text" name="naam" id="naam" placeholder="naam">
            <br><br>
            <input type="submit" name="submitgeedback">
        </form>
        <?php
            if(isset($_POST['naam'])) {
                $naam = $_POST['naam'];
                echo "<p>bedankt voor u feedback <br> $naam</p>";
            }
        ?>
    </div>
    <div>
        <p>
            als u hulp nodig heeft bel (030 310 4999) <br>
            of stuur een mail naar retrotech@klantencservice.nl
        </p>
    </div>
    <br><br>
    <?php include 'inc/footer.php'; ?>