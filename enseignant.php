<!DOCTYPE HTML>

<html lang="fr">

<!--HEAD-->

<head>
    <meta charset="UTF-8">
    <link href="reset.css" rel="stylesheet">
    <link rel="stylesheet" href="enseignement.css">
    <script src="enseignant.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="L'enseignant" />

    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Open+Sans&display=swap" rel="stylesheet">
</head>

<?php
$title = "L'enseignant";
$page = "enseignant";
require 'header.php'; ?>

<!-- organiser le menu en sous menu, intégrant les différent niveau de lecture.  -->
<aside>
    <nav>
        <ul>
            <li><a href="#1">L'enseignement qui est proposé</a>
                <ul class="subitem">
                    <li><a href="#">Le processus maïeutique</a></li>
                    <li><a href="#">L'accoucheur d'âmes</a></li>
                    <li><a href="#">Moi je et le monde</a></li>
                </ul>
            </li>
            <li><a href="#2">Le vie sociale</a></li>
            <li><a href="#3">L’ancien des mondes</a></li>
        </ul>
    </nav>
</aside>

<!-- Texte -->
<main>
    <div class="container">
        <div>
            <img class="cover" src="source/whale1472343bis.jpg" title="L'enseignement qui est proposé"
                alt="couverture-chapitre">

        </div>
        <hr>
        <div class="texte">
            <h3>Le processus Maïeutique ou la philosophie-thérapie </h3>
            <div class="wrapper-text">
                <p>Mes questions qui sont mon outil principal, vont titiller les encombrements, les croyances, les
                    mots, libérer le flux vital, libérer la logique du vivant, révéler la « non entité » que nous
                    sommes…, favoriser le silence que nous sommes
                    au fond, ce que j’appelle « la pauvreté essentielle ». Je sais, ça fait peur. Un des fondements
                    de ce qui se transmet naturellement à mon contact, devant tout questionnement qui m’est soumis,
                    c’est d’abord de tout renvoyer à la
                    question « Qui ? » Quel est le sujet ? A qui cela arrive ? La réponse automatique qui s’en
                    dégage pour tout le monde quand l’enquête est menée jusqu’au bout avec une détermination de
                    chien pisteur est le silence du non savoir,
                    le bug de la pensée : « ... » Tout est « là » ! Cette question « Qui ?», « qui est ce soi-disant
                    individu malheureux ? » est l’outil, l’ouvre boite essentiel de cet enseignement qui favorisera
                    la cessation des vains combats, le
                    besoin de tout diviser, de créer des différences artificielles, pour se prendre soi-même en tant
                    qu'objet au jeu inconscient de la polarité, de se croire à part du monde, des autres, de ses
                    propres ombres...
                </p>

                <p class="next"> L’orgueil humain c’est cela, et ça ne lui appartient même pas. « Ça » se joue ! Et
                    parce que ce que tu cherches est déjà Là, c’est une voie sans voie où tout est « Présence » ,
                    déjà « Là », « où » tout « est » d’évidence, tout de suite
                    quand la vue devient juste !!! C'est une thérapie de la vue juste. On se posera cette question
                    de « Qui ? », jusqu’au bout, jusqu’à ne plus pouvoir rien dire, jusqu’à la cessation naturelle
                    du sujet questionneur et de la pensée.
                    Jusqu’à voir sans qu’il n’y ait plus rien à nommer, ni dissocier,... jusqu’au mutisme de
                    l’idiot...jusqu'à ce que l’immensité de l’insondable, de l’insaisissable silence innommable que
                    nous sommes au fond, sous les vagues mondaines
                    soit réalisée. Le spectacle du ciel, du vide, du rien, de la vacuité se confond avec celui qui
                    voit. Ce qui « est » se révèle alors à lui-même en toute évidence, sans sujet ni objet ! Il est
                    vu alors que se prendre pour quelqu’un
                    ou pas c’est pareil. Cela ne nous appartient pas….. Ça se jouera...Ommm…. est la seule réponse !
                </p>
            </div>
        </div>
        <button class="suivant" onclick="mafunction()">
            <i>></i>
        </button>
    </div>
</main>

<?php require 'footer.php'; ?>

</body>

</html>