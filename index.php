<?php
require_once 'database-connection.php';
include('header.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["cerca"])) {
    $termine_ricerca = $_GET["cerca"];
    $sql_cerca = "SELECT * FROM libri WHERE titolo LIKE '%$termine_ricerca%' OR autore LIKE '%$termine_ricerca%'  OR anno LIKE '%$termine_ricerca%' OR isbn LIKE '%$termine_ricerca%'";
    $risultati = $connessione->query($sql_cerca);
}

?>

    <br>

    <div class="container" align="left" style="margin: 30;">
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="cerca">Cerca Libri:</label>
            <input type="text" name="cerca" required>
            <button type="submit">Cerca</button>
        </form>
    </div>

    <br>
    <hr>

    <div class="container" align="left" style="margin: 30;">
        <?php
        if (isset($risultati) && $risultati->num_rows > 0) {
            echo "<h3>Risultati della Ricerca:</h3>";
            echo "<ul>";
            while ($row = $risultati->fetch_assoc()) {
                echo "<li><strong><a href=libro.php?id={$row['id']}>Titolo:</strong> {$row['titolo']} - <strong>Autore:</strong> {$row['autore']} - <strong>Anno:</strong> {$row['anno']} - <strong>ISBN:</strong> {$row['isbn']}</a></li>";
            }
            echo "</ul>";
        }
        ?>
    </div>

<?php
$connessione->close();

include('footer.php');
?>