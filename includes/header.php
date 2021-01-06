<?php session_start();
$bdd = new PDO('mysql:host=localhost; dbname=les_3_vengers; charset=utf8', 'root', '');
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="style/bootstrap.css" type="text/css" rel="stylesheet"/>
    <link href="style/admin.css" type="text/css" rel="stylesheet"/>
    <link href="style/info.css" type="text/css" rel="stylesheet"/>
    <link href="style/station.css" type="text/css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta charset="utf-8">
    <title>Les 3 Vengers</title>
  </head>
  <body>
    <div class="les3vengers">
      <h1><a href="index.php">Les <img src="includes/logo.png"> Vengers</a></h1><br/>
    </div>
    <ul class="menu">
      <li><a href="index.php">ACCEUIL</a></li>
      <li><a href="plan.php">PLAN</a></li>
      <li><a href="station.php">STATION</a></li>
      <?php if(isset($_SESSION['id'])){ ?>
        <li><a href="profile.php?id=<?= $_SESSION['id'] ?>">PROFILE</a></li>
      <?php }else{ ?>
        <li><a href="compte.php">COMPTE</a></li>
      <?php } ?>
      <?php if(isset($_SESSION['admin']) AND $_SESSION['admin'] > 0){ ?>
        <li><a href="admin.php">ADMIN</a></li>
      <?php } ?>
    </ul>
  </body>
</html>
