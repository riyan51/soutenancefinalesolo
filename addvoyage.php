<?php

session_start();
if (!$_SESSION['pseudo']) {
    header('Location: index.php');
}

include("./config.php");

if (isset($_POST['envoi'])) {
    if (!empty($_POST['taches'])) {
        $taches = ($_POST['taches']);
        $insertUser = $bdd->prepare('INSERT INTO voyage(taches)VALUES (?)');
        $insertUser->execute(array($taches));

        $recupUser = $bdd->prepare('SELECT * FROM voyage WHERE taches = ?');
        $recupUser->execute(array(['taches']));
        if ($recupUser->rowCount() > 0) {
            $_SESSION['taches'] = $taches;
            $_SESSION['id'] = $recupUser->fetch()['id'];
            header("Location : ./addaujourdhui.php");
        }
    } else {
        echo " Merci de remplir tous les champs...";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../soutenancefinale/dashboard/main.css">
    <title>Document</title>
</head>

<body>

    <?php include("../soutenancefinalesolo/assets/components/nav.php") ?>
    <section id="commandes">
        <h1>Ajouter une tâche</h1>
        <!-- Barre retour et tri -->
        <div class="flex" style="justify-content: space-between;">
            <a href="./aujourdhui.php" class="btn"><i class="fas fa-chevron-left"></i> Retour</a>
        </div>

        <!-- INFORMATIONS GENERALES  -->
        <form action="" method="POST">
            <h4>Nom du produit :</h4>
            <input type="text" name="taches" autocomplete="off" placeholder="">


            <input class="center btn" type="submit" name="envoi" value="Enregistrer">
        </form>



    </section>
</body>

</html>