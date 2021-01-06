<div class="site">
  <div class="header">
    <?php require_once("includes/header.php"); ?>
  </div>
  <div class="content">
    <div class="profile">
      <?php
      $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
      $requser->execute(array($_SESSION['id']));
      $userinfo = $requser -> fetch();
      $_SESSION['nom'] = $userinfo['nom'];
      $_SESSION['prenom'] = $userinfo['prenom'];
      $_SESSION['mail'] = $userinfo['mail'];
      $_SESSION['admin'] = $userinfo['admin'];
      $_SESSION['prime'] = $userinfo['prime'];
      $_SESSION['inscription'] = $userinfo['inscription'];
      ?>
      <br/>
      <h2>Profile de <?= $_SESSION['prenom'] . " " . $_SESSION['nom'] ?></h2>
      <img src="includes/test.png" style="float:left;"><br/>
      <li><strong>Nom :</strong> <?= $_SESSION['nom'] ?></li><br/>
      <li><strong>Prénom :</strong> <?= $_SESSION['prenom'] ?></li><br/>
      <li><strong>Mail :</strong> <?= $_SESSION['mail'] ?></li><br/>
      <li><strong>Prime :</strong> <?php if($_SESSION['prime'] == 1){ ?>Prime <?php }else{ ?>Non Prime <?php } ?></li><br/>
      <li><strong>Incript depuis :</strong> <?= $_SESSION['inscription'] ?></li><br/>
      <a href="edition_profile.php">Modifier mes informations</a><br/><br/>
      <a href="deconnection.php">Se déconnecter </a>
    </div>
  </div>
  <div class="footer">
    <?php require_once("includes/footer.php"); ?>
  </div>
</div>
