<?php

function conectarBD() {
    $servername = "localhost";
    $username = "biabe";
    $password = "biabe123";
    $dbname = "almzena";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Errorea: " . $conn->connect_error);
    }

    return $conn;
}


function obtenerNoticias() {
    $conn = conectarBD();
    $sql = "SELECT izenburua, deskribapena FROM albisteak";
    $result = $conn->query($sql);

    $noticias = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $noticias[] = array(
                'izenburua' => $row['izenburua'],
                'deskribapena' => $row['deskribapena']
            );
        }
    }

    $conn->close();
    return $noticias;
}


function insertarDatosProveedor() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $conn = conectarBD();

        $izena = $_POST['Izena'];
        $direkzioa = $_POST['direkzioa'];
        $telefonoa = $_POST['telefonoa'];
        $emaila = $_POST['emaila'];

        $sql = "INSERT INTO biabe5taldea.hornitzaileak (izena, Direkzioa, Telefonoa, emaila) VALUES ('$izena', '$direkzioa', '$telefonoa', '$emaila')";

        if ($conn->query($sql) === TRUE) {
            echo "Datuak ongi sartu dira";
        } else {
            echo "Errorea datuak sartzerakoan: " . $conn->error;
        }

        $conn->close();
    }
}


function obtenerProductosOrdenados() {
    $conn = conectarBD();

    $orden = "";
    if (isset($_GET['orden'])) {
        $orden = $_GET['orden'];
    }

    if ($orden === "ascendente") {
        $sql = "SELECT * FROM almzena.logistika ORDER BY salmentaPrezioa ASC";
    } elseif ($orden === "descendente") {
        $sql = "SELECT * FROM almzena.logistika ORDER BY salmentaPrezioa DESC";
    } else {
        $sql = "SELECT * FROM almzena.logistika";
    }

    $result = $conn->query($sql);

    $productos = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productos[] = array(
                'argazkiak' => $row['argazkiak'],
                'produktua' => $row['produktua'],
                'salmentaPrezioa' => $row['salmentaPrezioa']
            );
        }
    }

    $conn->close();
    return $productos;
}
?>
