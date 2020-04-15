<title><?php if (isset($title)) {
            echo $title;
        } else {
            echo "Al Mamounia";
        } ?></title>

<header>
    <nav>

        <a href="index.php" class="site-title"> <img src="source/rsz_compass-rsz.png" alt="Accueil" height="32px">Les
            mondes d'Al Mamounia</a>
        <ul class="nav-links-wrapper">
            <li><a class="<?php echo  $page === 'enseignant' ?  'active' : ''  ?>" href="#enseignant"
                    title="L'enseignant">L'enseignant</a></li>
            <li><a class="<?php echo $page === 'conteur' ?  'active' : ''  ?>" href="#conteur" title="Le conteur">Le
                    conteur</a></li>
            <li><a class="<?php echo $page === 'lecteur' ?  'active' : ''  ?>" href="#lecteur" title="Le lecteur">Le
                    lecteur</a></li>
        </ul>
    </nav>
</header>

<body>