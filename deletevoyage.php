<?php

include("./config.php");

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];
    $req = $bdd->prepare("DELETE FROM `voyage` WHERE id = $id");
    if ($req->execute()) {
        header("Location: ../soutenancefinalesolo/voyage.php");
    } else {
        echo "Erreur lors de la suppression de la tache avec l'id: $id";
    }
}
