<?php
require '../Functions.php';
?>

<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Albisteak</title>
    <link rel="stylesheet" href="../news/Berriak.css" />
</head>
<body>
    <div class="head">
        <h1><img src="../../../public/biabelogo.jpg" alt="BIABE"></h1><hr>
        <div class="cesta">
            <a href="#"><i class="fa-shopping-cart"></i>Zesta</a>
        </div>
    </div>

    <div class="berria">
        <?php
        $albisteak = LortuAlbisteak();

        if (!empty($albisteak)) {
            foreach ($albisteak as $row) {
                echo '<div class="news-item">';
                echo '<h2>' . $row['izenburua'] . '</h2>';
                echo '<p>' . $row['deskribapena'] . '</p>';
                echo '</div>';
            }
        } else {
            echo "Ez da albisteik aurkitu.";
        }
        ?>
    </div>
</body>
</html>
