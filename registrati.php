<?php
require_once 'database-connection.php';
include('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registrazione"])) {
    $nome = $_POST["nome"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pw = $_POST["pw"];

    $sql_insert_profili = "INSERT INTO profili (nome, username, email, pw) VALUES ('$nome', '$username', '$email', '$pw')";
    $connessione->query($sql_insert_profili);
}
?>

    <br>

    <div class="container" align="left" style="margin: 30;">
        <div class="row">
            <div class="col-sm">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input class="form-control" type="text" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input class="form-control" type="text" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control" type="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="pw">Password:</label>
                        <input class="form-control" type="password" name="pw" required>
                    </div>
                    <button type="submit" name="registrazione">Registrati</button>
                </form>
            </div>
            <div class="col-sm"></div>
            <div class="col-sm"></div>
            <div class="col-sm"></div>
        </div>
    </div>

<?php include('footer.php'); ?>