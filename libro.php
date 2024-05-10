<?php
require_once 'database-connection.php';
include('header.php');

$libro_id = $_GET['id'];
$sql = "SELECT * FROM libri WHERE id = $libro_id";
$result = $connessione->query($sql);
$libro = $result->fetch_assoc();
?>

    <br>

    <div class="container" align="left" style="margin: 30;">
        <div class="row">
            <div class="col-sm">
                <?php echo "<img src='file/" . $libro['immagine'] . "'>";?>
            </div>
            <div class="col-sm-4">
                <?php echo "<p>" . $libro['autore'] . "</p>";?>
                <?php echo "<h1>" . $libro['titolo'] . "</h1>";?>
                <hr/>
                <?php echo "<p><strong>Descrizione:</strong> " . $libro['descrizione'] . "</p>";?>
                <hr/>
                <h3>Dettagli:</h3>
                <?php echo "<p><strong>Anno:</strong> " . $libro['anno'] . "</p>";?>
                <?php echo "<p><strong>ISBN:</strong> " . $libro['isbn'] . "</p>";?>
                <hr/>
            </div>
            <div class="col-sm"></div>
            <div class="col-sm"></div>
            <div class="col-sm"></div>
        </div>
    </div>

<?php
$connessione->close();

include('footer.php');
?>
