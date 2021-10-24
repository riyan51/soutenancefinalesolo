<?php
session_start();
if (!$_SESSION['pseudo']) {
    header('Location: index.php');
}

include("./config.php");

$sql = "SELECT * FROM users";
$req = $bdd->prepare($sql);

if ($req->execute()) {
    $users  = $req->fetchAll();
}

?>

<link rel="stylesheet" href="./assets/css/indexadmin.css">


<nav>

    <p style="margin-top: 60px; margin-left: 55px"><strong>Bonjour <?php echo $_SESSION['pseudo'] ?></strong></p>
    <ul>

        <li>
            <img src="" />
            <a style="text-decoration: none;" href="../../../soutenancefinalesolo/indexadmin.php">Maison</a>
        </li>
        <li>
            <img src="" />
            <a style="text-decoration: none;" href="../../../soutenancefinalesolo/aujourdhui.php">Aujourd'hui</a>
        </li>
        <li>
            <img src="" />
            <a style="text-decoration: none;" href="../../../soutenancefinalesolo/personnel.php">Personnel</a>
        </li>
        <li><img src="" />
            <a style="text-decoration: none;" href="../../../soutenancefinalesolo/travail.php">Travail</a>
        </li>
        <li>
            <img src="" />
            <a style="text-decoration: none;" href="../../../soutenancefinalesolo/voyage.php">Voyages</a>
        </li>
        <li>
            <a style="text-decoration: none; margin-left: 12px" href="../../../soutenancefinalesolo/deconnexion.php">Déconnexion</a>
        </li>
    </ul>

</nav>