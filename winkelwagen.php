<?php
include 'inc/db_connect.php';
include 'inc/header.php';



$sth2 = $conn->prepare("SELECT * FROM games");
$sth2->execute();
$games = $sth2->fetchAll();
?>

<?php echo $games[8]['cover_img']?>
<head>
    <title>winkelwagen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.shoppingcart.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
    <div class="content">
        <div class="shoppingcart">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <?php $totalprice = 0;
                    for($i = 1; $i <= count($_SESSION) - 3; $i++) {
                        $totalprice += $games[$_SESSION['shoppingcart_item' . $i] - 1]['price'];
                    ?>
                        
                        <li class="list-group-item">
                            <div class="card">
                                <div class="card-header">
                                    <?php echo $games[$_SESSION['shoppingcart_item' . $i] - 1]['title']?>    
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><img src="img/<?php echo $games[$_SESSION['shoppingcart_item' . $i] - 1]['cover_img']?>.png" class="img-fluid" alt=""></h5>
                                    <p class="card-text"> <?php echo $games[$_SESSION['shoppingcart_item' . $i] - 1]['price']?></p>
                                </div>
                            </div>
                        </li>
                    <?php }?>
            </div>
        </div>
        <?php $totalprice = 0;
        for($i = 1; $i <= count($_SESSION) - 3; $i++) {
            $totalprice += $games[$_SESSION['shoppingcart_item' . $i] - 1]['price'];
        }
        ?>
        <div class="price">
            <div class="card">
                <ul class="list-group list-group-flush">       
                        <li class="list-group-item">
                            <div class="card">
                                <div class="card-header">
                                    totale prijs  
                                </div>
                                <div class="card-body">
                                    <?php $totalprice = 0;
                                    for($i = 1; $i <= count($_SESSION) - 3; $i++) {
                                        echo $games[$_SESSION['shoppingcart_item' . $i] - 1]['price'];
                                    ?>
                                    <a href="delete.php?id="><i class="bi bi-trash3 delete"></i></a><br>
                                    <?php
                                        $totalprice += $games[$_SESSION['shoppingcart_item' . $i] - 1]['price'];
                                    }
                                    ?>
                                    <hr>
                                    <?php echo $totalprice;?>
                                </div>
                            </div>
                        </li>
            </div>
        </div>
    </div>
</body>

<?php
include 'inc/footer.php';   
?>