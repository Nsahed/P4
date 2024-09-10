<?php
    require 'header.php';
    require 'bdd.php' ;

    // Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
    if(empty($_GET['id'])) {
        header('Location: index.php');
        exit();
    }


$bdd = connect();

// Préparation et exécution de la requête pour récupérer l'œuvre correspondant à l'ID
$id = intval($_GET['id']); // Conversion de l'ID en entier
$requete = $bdd->prepare('SELECT * FROM oeuvres WHERE id = :id');
$requete->execute(['id' => $id]);

// Récupération de l'œuvre
$oeuvre = $requete->fetch();

// Si aucune œuvre n'est trouvée, on redirige vers la page d'accueil
if (!$oeuvre) {
    header('Location: index.php');
    exit();
}
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= htmlspecialchars($oeuvre['image']) ?>" alt="<?= htmlspecialchars($oeuvre['titre']) ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= htmlspecialchars($oeuvre['titre']) ?></h1>
        <p class="description"><?= htmlspecialchars($oeuvre['artiste']) ?></p>
        <p class="description-complete">
             <?= htmlspecialchars($oeuvre['description']) ?>
        </p>
    </div>
</article>


<?php require 'footer.php'; ?>
