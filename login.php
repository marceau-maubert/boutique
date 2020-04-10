<?php

require_once("includes/init.php");

if (isset($_SESSION["user"])) { index(); }

if (isset($_POST["login"])) {
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
    [$success, $message, $user] = User::Login($email, $password);

    if ($success && $user instanceof User) {
        $_SESSION["user"] = $user;

        index();
    }
}

?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Connexion</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php require("includes/header.php") ?>

        <main>
            <h1>Connexion</h1>

            <section class="section">
<?php           if (isset($message)) { ?>
                    <p class="error"><?= $message ?></p>
<?php           } ?>
                <form class="formulaire" method="post">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" required>
                    <br>
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" required>
                    <br>
                    <input type="submit" name="login" value="Se connecter">
                </form>
            </section>
            <section class="section">
                <div class="bloc">
                    <p>
                        Vous n'avez pas de compte ? Inscrivez-vous <a href="inscription.php">ici</a> !
                    </p>
                </div>
            </section>
        </main>

        <?php require("includes/footer.php") ?>
    </body>
</html>