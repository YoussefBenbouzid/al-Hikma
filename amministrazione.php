<?php
require_once 'database-connection.php';
include('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["aggiungi_libro"])) {
    $titolo = $_POST["titolo"];
    $autore = $_POST["autore"];
    $anno = $_POST["anno"];
    $isbn = $_POST["isbn"];
    $descrizione = $_POST["descrizione"];
    $immagine = $_POST["immagine"];
    
    $sql_insert_libro = "INSERT INTO libri (titolo, autore, anno, isbn, descrizione, immagine) VALUES ('$titolo', '$autore', '$anno', '$isbn', '$descrizione', '$immagine')";
    $connessione->query($sql_insert_libro);
}
?>

    <br>

    <div class="container" align="left" style="margin: 30;">
        <div class="row">
            <div class="col-sm">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="titolo">Titolo:</label>
                        <input class="form-control" type="text" name="titolo" required>
                    </div>
                    <div class="form-group">
                        <label for="autore">Autore:</label>
                        <input class="form-control" type="text" name="autore" required>
                    </div>
                    <div class="form-group">
                        <label for="anno">Anno:</label>
                        <input class="form-control" type="text" name="anno" required>
                    </div>
                    <div class="form-group">
                        <label for="isbn">ISBN:</label>
                        <input class="form-control" type="text" name="isbn" required>
                    </div>
                    <div class="form-group">
                        <label for="isbn">Descrizione:</label>
                        <input class="form-control" type="text" name="descrizione" required>
                    </div>
                    <div class="form-group">
                        <label for="fileInput">Seleziona un'immagine:</label>
                        <input class="form-control" type="file" name="immagine" accept="image/*" >
                    </div>
                    <button type="submit" name="aggiungi_libro">Aggiungi Libro</button>
                </form>
            </div>
            <div class="col-sm"></div>
            <div class="col-sm"></div>
            <div class="col-sm"></div>
        </div>
    </div>

<?php include('footer.php'); ?>
