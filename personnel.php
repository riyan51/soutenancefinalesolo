<?php
session_start();
if (!$_SESSION['pseudo']) {
    header('Location: index.php');
}


include("./config.php");

$sql = "SELECT * FROM personnel";
$req = $bdd->prepare($sql);

if ($req->execute()) {
    $personnel  = $req->fetchAll();
}

if (isset($_POST['envoie'])) {
    if (!empty($_POST['taches'])) {
        $taches = htmlspecialchars($_POST['taches']);
        $insertUser = $bdd->prepare('INSERT INTO maison(taches)VALUES (?)');
        $insertUser->execute(array($taches));

        $recupUser = $bdd->prepare('SELECT * FROM maison WHERE taches = ?');
        $recupUser->execute(array(['taches']));
        if ($recupUser->rowCount() > 0) {
            $_SESSION['taches'] = $taches;
            $_SESSION['id'] = $recupUser->fetch()['id'];
            header('Location: produit.php');
        }
    } else {
    }
}

?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/indexadmin.css">

    <title>Document</title>
</head>



<body>
    <?php include("./assets/components/nav.php") ?>

    <section id="commandes">
        <h1>Personnel</h1>
        <!-- Barre retour et tri -->
        <div class="flex" style="justify-content: space-between;">
            <a href=".//index.html" class="btn"><i class="fas fa-chevron-left"></i> Retour</a>
            <a href=".//ajoutproduit.html" class="btn">Ajouter une tâches</a>
            <a class="btn">Trier <i class="fas fa-chevron-down"></i></a>
        </div>

        <!-- Liste de produits -->
        <table class=" tableau">
            <tr class="nomcat">
                <td>Réf.</td>
                <td>Tâches</td>
                <td>Actions</td>
            </tr>
            <?php
            foreach ($personnel as $p) { ?>
                <tr>



                    <?= "<td>" . $p["id"] . "</td>" ?>
                    <?= "<td>" . $p["taches"] . "</td>" ?>
                    <td>
                        <a href="" class="btn">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </section>

</body>

</html>