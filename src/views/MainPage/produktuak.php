<!DOCTYPE html>
<html lang="eu">
    <?php
    require '../conn.php';
    $noticias = obtenerNoticias();
    insertarDatosProveedor();
    $productos = obtenerProductosOrdenados();
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produktu Informatikoak</title>
    <link rel="stylesheet" href="../../css/produktua.css">
    <style>
        body{
            color: white;
        }
    </style>    
</head>
<body>
    <header>
    <div class="head">
        <h1><img src="../../../public/biabelogo.jpg" alt="BIABE"></h1><hr>
            <div class="cesta">
                <a href="#"><i class="fa-shopping-cart"></i>Zesta</a>
            </div>
        <h1>Produktu Informatikoak</h1>
        <nav>
            <ul>
                <li><a href="#gida">Produktuak</a></li>
                <li><a href="#kontaktua">Kontaktua</a></li>
            </ul>
        </nav>
        <a id="hasiera" href="../MainPage/MainPage.html">Hasiera</a>
    </header>
    
    <section id="gida" class="gida">
        <h2>Gure Produktuak</h2><br><br><br>
        
        <div class="produktuak, berria"></div>
    </section>
    

    
    </div>
            
 

    <form action="" method="get">
    <label for="ordenar" style="color: white;">Ordenar por precio:</label>
    <select name="orden" id="ordenar">
        <option value="ascendente">Ascendente</option>
        <option value="descendente">Descendente</option>
    </select>
    <input type="submit" value="Ordenar">
    <br>
    <br>
</form>
<div class="container">
    <?php
    $servername = "localhost"; // Solo se debe incluir el nombre del servidor
    $username = "biabe";
    $password = "biabe123";
    $dbname = "almzena";

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Errorea: " . $conn->connect_error);
    }

    $orden = "";
    if(isset($_GET['orden'])){
        $orden = $_GET['orden']; // Obtener el valor del formulario
    }

    if ($orden === "ascendente") {
        $sql = "SELECT * FROM almzena.logistika ORDER BY salmentaPrezioa ASC";
    } elseif ($orden === "descendente") {
        $sql = "SELECT * FROM almzena.logistika ORDER BY salmentaPrezioa DESC";
    } else {
        $sql = "SELECT * FROM almzena.logistika";
    }

    $result = $conn->query($sql);
    

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='product'>";
            echo "<img src='../../../public/" . $row["argazkiak"] . "'><br><br>". "<h3>" . $row["produktua"] . "<br>" . $row["salmentaPrezioa"] . "€ </h3>";
            echo "</div><br>";
        }
    } else {
        echo "Ez dago datuak taulan.";
    }

    $conn->close();
    ?>
</div>

 <h1 class="textKontaktoa" >Kontaktua</h1>
    <section id="kontaktua" class="kontaktua">
    <p>Kontaktatzeko informazioa:</p>

    <p>Kalea: Kong Seng Road, Singapur</p>
    <p>Telefonoa: 628 690 222</p>
    <p>Emaila: <a href="mailto:biabe@gmail.com">biabe@gmail.com</a></p>
    <img src="../../../public/kongsengroad.png" alt="Kong Seng Road" id="argazkia">
    </section>
</form>
    <footer>
        <p>&copy; 2023 Biabe - Eskubide guztiak erreserbatuta</p>
    </footer>
</body>
</html>

