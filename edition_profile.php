<div class="site">
  <div class="header">
    <?php require_once("includes/header.php"); ?>
  </div>
  <div class="content">
    <?php
    if (isset($_POST['edition']))
    {
      if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']))
      {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $mail = htmlspecialchars($_POST['mail']);
        $mdp = sha1($_POST['mdp']);
        $mdp2 = sha1($_POST['mdp2']);

        if ($nom != $_SESSION['nom'])
        {
          $modifynom = $bdd->prepare("UPDATE membres SET nom = ? WHERE id= ?");
          $modifynom->execute(array($nom, $_SESSION['id']));
          header("Location: profile.php?id=".$_SESSION['id']);
        }
        if ($prenom != $_SESSION['prenom'])
        {
          $modifyprenom = $bdd->prepare("UPDATE membres SET prenom = ? WHERE id= ?");
          $modifyprenom->execute(array($prenom, $_SESSION['id']));
          header("Location: profile.php?id=".$_SESSION['id']);
        }
        if ($mail != $_SESSION['mail'])
        {
          $modifymail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id= ?");
          $modifymail->execute(array($mail, $_SESSION['id']));
          header("Location: profile.php?id=".$_SESSION['id']);
        }
        if (!empty($_POST['mdp']) AND !empty($_POST['mdp2']))
        {
          if ($mdp == $mdp2)
          {
            $modifymdp = $bdd->prepare("UPDATE membres SET mdp = ? WHERE id= ?");
            $modifymdp->execute(array($mdp, $_SESSION['id']));
            header("Location: profile.php?id=".$_SESSION['id']);
          }
          else
          {
            $erreur = "Vos mot de passe ne correspondent pas !";
          }
        }
      }
      else
      {
        $erreur = "Tous les champs doivent être complétés !";
      }
    }
    ?>
    <br/><br/>
    <div class="edition_profile">
      <div class="edition_profile_box">
        <div class="edition_profile_header">
          <h4>Edition des Informations</h4>
        </div>
        <form method="post">
          <h6><i class="fas fa-user"></i> Nom : </h6>
          <input type="text" name="nom" value="<?= $_SESSION['nom'] ?>"><br/>
          <h6><i class="fas fa-user-tag"></i> Prénom : </h6>
          <input type="text" name="prenom" value="<?= $_SESSION['prenom'] ?>"><br/>
          <h6><i class="fas fa-envelope"></i> Mail : </h6>
          <input type="email" name="mail" value="<?= $_SESSION['mail'] ?>"><br/>
          <h6><i class="fas fa-lock"></i> Mot de passe : </h6>
          <input type="password" name="mdp" placeholder="mot de passe">
          <h6><i class="fas fa-lock"></i> Confimez MDP : </h6>
          <input type="password" name="mdp2" placeholder="mot de passe"><br/>
          <input type="submit" name="edition" value="Modifier">
        </form>
        <div class="edition_profile_erreure">
          <?php if(isset($erreur)){echo $erreur;} ?>
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
    <?php require_once("includes/footer.php"); ?>
  </div>
</div>
