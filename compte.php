<div class="site">
  <div class="header">
    <?php require_once("includes/header.php"); ?>
  </div>
  <div class="content">
    <?php
      if (isset($_POST['formconnection']))
      {
        $mailconnect = htmlspecialchars($_POST['mailconnect']);
        $mdpconnect = sha1($_POST['mdpconnect']);
        if (!empty($mailconnect) AND !empty($mdpconnect))
        {
          $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND mdp = ?");
          $requser->execute(array($mailconnect, $mdpconnect));
          $userexist = $requser->rowCount();
          if ($userexist == 1)
          {
            $userinfo = $requser -> fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['nom'] = $userinfo['nom'];
            $_SESSION['prenom'] = $userinfo['prenom'];
            $_SESSION['mail'] = $userinfo['mail'];
            $_SESSION['admin'] = $userinfo['admin'];
            $_SESSION['prime'] = $userinfo['prime'];
            $_SESSION['inscription'] = $userinfo['inscription'];
            header("Location: profile.php?id=".$_SESSION['id']);
          }
          else
          {
            $erreur = "Mauvais mail ou mot de passe";
          }
        }
        else
        {
          $erreur = "Tous les champs doivent être complétés !";
        }
      }
    ?>
    <br/><br/><br/><br/>
    <div class="connection">
      <div class="connection_box">
        <div class="connection_header">
          <h4>Connection</h4>
        </div>
      <form method="POST">
        <h6><i class="fas fa-envelope"></i> Adresse Mail :</h6>
        <input type="email" name="mailconnect" placeholder="mail" />
        <h6><i class="fas fa-lock"></i> Mot de passe :</h6>
        <input type="password" name="mdpconnect" placeholder="mot de passe" />
        <input type="submit" name="formconnection" value="Se connecter" />
      </form>
      <?php
        if (isset($erreur))
        {
          echo $erreur;
        }
      ?>
      <br/>
      Pas encore de compte <a href="inscription.php">inscrivez vous !!</a>
      <br/><br/>
      </div>
    </div>
  </div>
  <div class="footer">
    <?php require_once("includes/footer.php"); ?>
  </div>
</div>
