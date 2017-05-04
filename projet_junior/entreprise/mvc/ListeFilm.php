

<?php

require_once(__DIR__.'/fimRepository.php');

$repo = new FilmRepository;

	// var_dump(strlen($_GET['nom']));
	if (isset ($_GET['nom']) || isset( $_GET['annee']) && strlen($_GET['nom']) !=0 ) {
			$film = $repo->rechercher();
	}

	else 	$film = $repo->getAll();
	
		
	
// var_dump($film);

$content = '';
if (!empty($film))
{

    ob_start();
	echo '<div class="annonce">';
    ?>
    <!-- Template spécifique principal -->
    <?php foreach ($film as $films): ?>

			<div class="contenu">
			<a href="./projet_film_v3/page_annonce.php?nom= <?= $films->getNom() ?>&annee=<?= $films->getAnnee()?> ">
			<img src="./mesimages/<?= $films ->getImage() ?> " class="monimage"><br />
            <div class="titre"><?= $films->getNom() ?></div><br />
			</a>
             <?= $films->getAnnee(); ?><br />
			<div class="titre"><strong></strong></div>
			</div>	
    <?php endforeach; ?>
	
    <!-- fin Template spécifique principal -->
    <?php
	echo '</div>';
    $content = ob_get_contents();
    ob_end_clean();
}
else
{
    // Template spécifique spécial "aucun film"
    // on skip le ob_start() tellement il est trivial
    $content = 'Pas de films !';
}

?>
<!-- fin Layout (= template global : logo, menus, etc.) -->
<html>
    <head>
        <title>Liste de films</title>
    </head>
    <body>
        <?= $content; ?>
    </body>
</html>
<!-- fin Layout (= template global : logo, menus, etc.) -->

