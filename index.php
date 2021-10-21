<?php
session_start();

include("./config.php");

if (isset($_POST['envoi'])) {
  if (!empty($_POST['pseudo']) and !empty($_POST['mdp'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = ($_POST['mdp']);

    $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
    $recupUser->execute(array($pseudo, $mdp));

    if ($recupUser->rowCount() > 0) {
      $_SESSION['pseudo'] = $pseudo;
      $_SESSION['mdp'] = $mdp;
      $_SESSION['id'] = $recupUser->fetch()['id'];
      header('Location: indexadmin.php');
    } else
      echo "Mot de passe ou pseudo invalide";
  } else {
    echo "Veuillez compléter tous les champs";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/index.css">
  <link href="https://fonts.googleapis.com/css2?family=Karla:wght@500&display=swap" rel="stylesheet">
  <title>Document</title>
</head>

<body>
  <div class="toppage">
    <h1>Connecte toi avec ...</h1>

    <form method="POST" action="">

      <input type="text" name="pseudo" autocomplete="off">
      <br>
      <input type="password" name="mdp" autocomplete="off">
      <br>
      <a href="../soutenancefinale/connect.php"><input type="submit" name="envoi"></a>


    </form>

  </div>

</body>
<?php include("./components/baspage/baspage.php") ?>
<?php include("./components/footer/footer.php") ?>

<script src="../soutenancefinale/assets/js/main.js"></script>

</html>