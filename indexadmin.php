<?php
session_start();
if (!$_SESSION['pseudo']) {
    header('Location: index.php');
}


include("./config.php");

$sql = "SELECT * FROM maison";
$req = $bdd->prepare($sql);

if ($req->execute()) {
    $taches  = $req->fetchAll();
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
        <h1>Maison</h1>
        <!-- Barre retour et tri -->
        <div class="flex" style="justify-content: space-between;">
            <a href=".//index.html" class="btn"><i class="fas fa-chevron-left"></i> Retour</a>
            <a href=".//ajoutproduit.html" class="btn">Ajouter une tâche</a>
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
            foreach ($taches as $t) { ?>
                <tr>



                    <?= "<td>" . $t["id"] . "</td>" ?>
                    <?= "<td>" . $t["taches"] . "</td>" ?>
                    <td>
                        <a href="" class="btn">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </section>

</body>

</html>