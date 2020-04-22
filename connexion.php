<!DOCTYPE HTML>

<html lang="fr">

<!--HEAD-->

<head>
    <meta charset="UTF-8">
    <link href="reset.css" rel="stylesheet">
    <link rel="stylesheet" href="connexion.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Connexion membres" />

    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Open+Sans&display=swap" rel="stylesheet">
</head>

<?php
$title = "Se connecter";
$page = "connexion";
/* Inclusion et exécution du fichier Header */
require 'header.php'; ?>

<main>
    <?php
    include 'database.php';
    global $database;
    ?>

    <div class="titre">
        <h3>Nous vous attendions cher disciple</h3>
    </div>

    </br>

    <!-- CONNEXION A LA SESSION -->
    <div class="login">
        <p>Log in</p>
        <form method="post">
            <input type="text" name="log_pseudo" id="log_pseudo" placeholder="Votre pseudo" required label for="">
            <input type="password" name="log_password" id="log_password" placeholder="Votre mot de passe" required label
                for="">
            <input type="submit" name="formlogin" id="formlogin" value="Me connecter" label for="">
        </form>

        <?php
        if (isset($_POST['formlogin'])) {
            extract($_POST);
            if (!empty($log_pseudo) && !empty($log_password)) {
                $dbquery = $database->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
                $dbquery->execute(['pseudo' => $log_pseudo]);
                $result = $dbquery->fetch();

                if ($result == true) // vérification si le compte existe bien
                {
                    $hashpass = $result['password'];
                    if (password_verify($log_password, $hashpass)) {
                        echo "Bienvenue " . $log_pseudo . " :)";
                    }
                    // ok le compte existe bien, sinon ...
                    else {
                        echo "Le mot de passe n'est pas correcte.";
                    }
                } else // le compte n'existe pas 
                {
                    echo "Oups, nous ne connaissons pas de " . $log_pseudo . " ici  :/";
                }
            } else // le compte existe ais erreur de saisie
            {
                echo "Votre pseudo ne correspond pas à votre mot de passe";
            }
        }
        ?>
    </div>

    </br>
    </br>

    <!-- CREATION D'UNE SESSION -->
    <div class="signin">
        <h3>Sign in</h3>
        <form method="post">
            <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo" required label for="">
            <input type="email" name="email" id="email" placeholder="Votre email" required label for="">
            <input type="password" name="password" id="password" placeholder="Votre mot de passe" required label for="">
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirmez votre mot de passe" required
                label for="">
            <label for="man">Homme</label>
            <input type="radio" id="sexe" name="sexe">
            <label for="woman">Femme</label>
            <input type="radio" id="sexe" name="sexe">
            <label for="nobinary">Non binaire</label>
            <input type="radio" id="sexe" name="sexe">
            <label for="age">Votre tranche d'âge</label>
            <input type="number" name="age" placeholder="12" min="12" max="110">
            <input type="submit" name="formsend" id="formsend" value="M'inscrire" label for="">
        </form>

        <?php
        if (isset($_POST['formsend'])) {
            extract($_POST);

            if (!empty($pseudo) && !empty($email) && !empty($password) && !empty($cpassword)) {
                // coder la vérfication du password car actuellment provoque des erreurs si les mots de passe ont diférents
                if ($password == $cpassword) {
                    $options = [
                        'cost' => 12,
                    ];
                    $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);
                }

                include 'database.php';
                global $database;
                $dbquery = $database->prepare("INSERT INTO users(pseudo,email,password,sexe,age) VALUES(:pseudo,:email,:password,:sexe,:age)");
                $dbquery->execute([
                    'pseudo' => $pseudo,
                    'email' => $email,
                    'password' => $hashpass,
                    'sexe' => $sexe,
                    'age' => $age
                ]);
            } else {
                echo "Veuillez remplir tous les champs requis";
            }
        }
        ?>
    </div>
</main>

<!-- Inclusion et exécution du fichier Footer -->
<?php require 'footer.php'; ?>

</body>

</html>