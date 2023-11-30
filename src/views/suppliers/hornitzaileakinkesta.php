<?php
require '../Functions.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hornitzaileen formularioa</title>
    <link rel="stylesheet" href="../../css/suppliers.css">              
</head>
<body>
    <div class="head">
        <h1><img src="../../../public/biabelogo.jpg" alt="BIABE"></h1><hr>
        <div class="cesta">
            <a href="#"><i class="fa-shopping-cart"></i>Zesta</a>
        </div>
        <div class="container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h2>Hornitzaileen formularioa</h2>
            
                <div class="form-group">
                    <label for="Izena">Izena:</label>
                    <input type="text" id="Izena" name="Izena" required>
                </div>
    
                <div class="form-group">
                    <label for="direkzioa">Direkzioa:</label>
                    <input type="text" id="direkzioa" name="direkzioa" required>
                </div>
    
                <div class="form-group">
                    <label for="telefonoa">Telefonoa:</label>
                    <input type="text" id="telefonoa" name="telefonoa" required>
                </div>
    
                <div class="form-group">
                    <label for="emaila">Emaila:</label>
                    <input type="email" id="emaila" name="emaila" required>
                </div>
    
                <div class="form-group">
                    <input type="submit" value="Bidali" name="submit">
                    <input type="reset" value="Ezabatu">
                </div>
            </form>
            
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                $izena = $_POST['Izena'];
                $direkzioa = $_POST['direkzioa'];
                $telefonoa = $_POST['telefonoa'];
                $emaila = $_POST['emaila'];

                SartuHornitzailea($izena, $direkzioa, $telefonoa, $emaila);
            }
            ?>
        </div>
    </body>
</html>
