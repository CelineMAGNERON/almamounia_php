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
$error = null;
/* Inclusion et exécution du fichier Header */
require './layout/header.php'; ?>

<main>
    <?php
    include 'database.php';
    global $database;
    ?>

    <div class="titre">
        <span>Nous vous attendions cher disciple</span>
    </div>

    <!---------------------------- 
            CONNEXION A LA SESSION 
    ----------------------------->
    <div class="login">
        <span class="come_in">Log in</span>
        <form method="post">
            <div class="column">
                <input type="text" name="log_pseudo" id="log_pseudo" placeholder="Votre pseudo" required>
                <input type="password" name="log_password" id="log_password" placeholder="Votre mot de passe" required>
            </div>
            <div class="column">
                <input class="submit" type="submit" name="formlogin" id="formlogin" value="Me connecter">
            </div>
    </div>

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
        } else // le compte existe mais erreur de saisie
        {
            echo "Votre pseudo ne correspond pas à votre mot de passe";
        }
    }
    ?>
    </div>

    </br>
    </br>

    <!---------------------------- 
            CREATION D'UNE SESSION 
    ----------------------------->
    <div class="signin">
        <div class="come_in">
            <span>Sign in</span>
        </div>
        <form method="post">
            <?php if (isset($_POST['error'])) {
                echo $_POST['error'];
            } ?>
            <div>
                <div class="column">
                    <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo" required>
                    <input type="email" name="email" id="email" placeholder="Votre email" required>
                </div>
                <div class="column">
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe" required>
                    <input type="password" name="cpassword" id="cpassword" placeholder="Confirmez votre mot de passe"
                        required>
                </div>
            </div>
            <div class="column">
                <label for="man">Homme</label>
                <input type="radio" id="man" name="sexe" value="man">
                <label for="woman">Femme</label>
                <input type="radio" id="woman" name="sexe" value="woman">
                <label for="nobinary">Non binaire</label>
                <input type="radio" id="nobinary" name="sexe" value="nobinary">
            </div>
            <div class="column">

                <label for="age">Votre tranche d'âge</label>
                <input type="number" name="age" placeholder="12" min="12" max="110">
            </div>
            <div class="column">
                <label for="newsletter">NewsLetter maybe?</label>
                <input type="checkbox" name="newsLetter" value="newsLetter">
            </div>
            <div class="column">

                <input type="submit" name="formsend" id="formsend" value="M'inscrire" label for="">
            </div>

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
                } else {
                    echo "Raté";
                    return false;
                }


                $dbquery = $database->prepare("INSERT INTO users(pseudo,email,password,sexe,age, newsLetter) VALUES(:pseudo,:email,:password,:sexe,:age,:newsLetter)");
                $dbquery->execute([
                    'pseudo' => $pseudo,
                    'email' => $email,
                    'password' => $hashpass,
                    'sexe' => $sexe,
                    'age' => $age,
                    'newsLetter' => isset($newsLetter) ? 1 : 0
                ]);
            } else {
                echo "Veuillez remplir tous les champs requis";
            }
        }
        ?>
    </div>

    <br />

    <div>
        <table
            style="background:purple; table-layout: fixed; width: 100%; border-collapse:collapse ; border: 1px solid white">
            <thead>
                <tr>
                    <th style="padding: 10px; font-style: italic" scope="col">Pseudo</th>
                    <th style="font-style: italic" scope="col">Email</th>
                    <th style="font-style: italic" scope="col">Sexe</th>
                    <th style="font-style: italic" scope="col">Age</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <caption>Les membres de la communauté</caption>
                    <?php
                    $dbquery = $database->query('SELECT * FROM users');
                    while ($users = $dbquery->fetch()) {
                    ?>
                    <td style="padding: 5px; text-align: center;">
                        <span><?= $users['pseudo']; ?> </span></td>
                    <td style="text-align: center;">
                        <span><?= $users['email']; ?> </span></td>
                    <td style="text-align: center;">
                        <span><?= $users['sexe']; ?> </span></td>
                    <td style="text-align: center;">
                        <span><?= $users['age']; ?></span></td>
                </tr>
                <?php
                    } ?>

            </tbody>
        </table>
    </div>



</main>

<!-- Inclusion et exécution du fichier Footer -->
<?php require './layout/footer.php'; ?>

</body>

</html>