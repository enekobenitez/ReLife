<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Albisteak</title>
    <link rel="stylesheet"  href="../news/Berriak.css" />

</head>
<body>
<div class="head">
        <h1><img src="../../../public/biabelogo.jpg" alt="BIABE"></h1><hr>
            <div class="cesta">
                <a href="#"><i class="fa-shopping-cart"></i>Zesta</a>
            </div>
        </div>

    <?php
$servername = "localhost:3306"; 
$username = "biabe"; 
$password = "biabe123"; 
$dbname = "berriak"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ezin izan da konexioa sortu: " . $conn->connect_error);
}

$sql = "SELECT izenburua, deskribapena FROM albisteak";
$result = $conn->query($sql);
?>
<div class="berria">
    <?php
if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        echo '<div class="news-item">';
        echo '<h2>' . $row['izenburua'] . '</h2>';
        echo '<p>' . $row['deskribapena'] . '</p>';
        echo '</div>';
    }
?>
    </div>
    
    <?php
} else {
    echo "Ez da albisteik aurkitu.";
}


$conn->close();
?>
</body>
</html>