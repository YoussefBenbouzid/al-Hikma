<?php
require_once 'database-connection.php';
include('header.php');

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM profili WHERE username = ?";
$stmt = $connessione->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $utente = $result->fetch_assoc();
?>

    <br>

    <div class="container" align="left" style="margin: 30;">
        <p>Ciao <?php echo $utente['nome']; ?>! Questa è la tua area personale!</p>
        <p>Portai intervenire sul sistema da <?php echo $utente['ruolo']; ?>.</p>
        <?php
        if ($utente['ruolo'] === 'amministratore') {
            echo '<p><a href="amministrazione.php">Amministrazione</a></p>';
        }
        ?>
        <br>
        <p><strong>Username:</strong> <?php echo $utente['username']; ?> <strong>Email:</strong> <?php echo $utente['email']; ?></p>
    </div>
    
<?php
}

$stmt->close();
$connessione->close();

include('footer.php');
?>
