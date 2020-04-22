<!-- Vérification si la variable titre est définie. Sinon le titre de la page sera Al Mamounia par defaut -->
<title><?php if (isset($title)) {
            echo $title;
        } else {
            echo "Al Mamounia";
        } ?></title>

<header>
    <nav>

        <a href="index.php" class="site-title"> <img src="./assets/images/rsz_compass-rsz.png" alt="Accueil"
                height="32px">Les
            mondes d'Al Mamounia</a>
        <ul class="nav-links-wrapper">
            <li><a class="<?php echo  $page === 'enseignant' ?  'active' : ''  ?>" href="enseignant.php"
                    title="L'enseignant">L'enseignant</a></li>
            <li><a class="<?php echo $page === 'conteur' ?  'active' : ''  ?>" href="conteur.php" title="Le conteur">Le
                    conteur</a></li>
            <li><a class="<?php echo $page === 'lecteur' ?  'active' : ''  ?>" href="lecteur.php" title="Le lecteur">Le
                    lecteur</a></li>
        </ul>
        <a href="connexion.php" class="connexion"> Se connecter</a>
    </nav>
</header>

<body>