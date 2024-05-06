<?php
require_once 'database-connection.php';
include('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["accesso"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM profili WHERE username = ? AND pw = ?";
    $stmt = $connessione->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        
        header("Location: area_personale.php");
        exit();
    } else {
        $errore_accesso = "Username o password non validi";
    }
}
?>

    <br>

    <div class="container" align="left" style="margin: 30;">
        <div class="row">
            <div class="col-sm">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input class="form-control" type="text" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input class="form-control" type="password" name="password" required>
                    </div>
                    <button type="submit" name="accesso" align="center">Accedi</button>
                </form>
            </div>
            <div class="col-sm"></div>
            <div class="col-sm"></div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
            <div class="col-sm">
                <?php 
                if(isset($errore_accesso)) {
                   echo "<p>$errore_accesso</p>";
                 }
                ?>
            </div>
            <div class="col-sm"></div>
            <div class="col-sm"></div>
            <div class="col-sm"></div>
        </div>
    </div>

<?php include('footer.php'); ?>