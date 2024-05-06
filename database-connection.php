<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "al-hikma";

$connessione = new mysqli($servername, $username, $password, $database);

if ($connessione->connect_error) {
    die("Connessione fallita: " . $connessione->connect_error);
}

$sql_libri = "CREATE TABLE IF NOT EXISTS libri (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titolo VARCHAR(255) NOT NULL,
    autore VARCHAR(255) NOT NULL,
    anno INT(4) NOT NULL,
    isbn VARCHAR(13) NOT NULL,
    descrizione TEXT,
    immagine VARCHAR(255)
)";
$connessione->query($sql_libri);

$sql_profili = "CREATE TABLE IF NOT EXISTS profili (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    pw VARCHAR(255) NOT NULL,
    ruolo ENUM('utente', 'amministratore') NOT NULL DEFAULT 'utente'
)";
$connessione->query($sql_profili);
?>