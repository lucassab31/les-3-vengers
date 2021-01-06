<div class="site">
  <div class="header">
    <?php require_once("includes/header.php"); ?>
  </div>
  <div class="content">
    <?php
      if (isset($_POST['forminscription']))
      {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $mail = htmlspecialchars($_POST['mail']);
        $mdp = sha1($_POST['mdp1']);
        $mdp2 = sha1($_POST['mdp2']);

        if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['mdp1']) AND !empty($_POST['mdp2']))
        {
              if (filter_var($mail, FILTER_VALIDATE_EMAIL))
              {
                $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail=? ");
                $reqmail->execute(array($mail));
                $mailexist = $reqmail->rowCount();
                if ($mailexist == 0)
                {
                  if ($mdp == $mdp2)
                  {
                    $date = date("d-m-Y");
                    $insertmbr = $bdd -> prepare("INSERT INTO membres(nom, prenom, mail, mdp, inscription) VALUES (?, ?, ?, ?, ?)");
                    $insertmbr -> execute(array($nom, $prenom, $mail, $mdp, $date));
                    $erreur = "Votre compte a bien été créé ! <a href=\"compte.php\">Me connecter</a>";
                  }
                  else
                  {
                    $erreur	= "Vos mot de passe ne correspondent pas !";
                  }
                }
                else
                {
                  $erreur = "Adresse mail déjà utilisée !";
                }
              }
              else
              {
                $erreur = "Votre mail n'est pas valide !";
              }
        }
        else
        {
          $erreur = "Tous les champs doivent être complétés !";
        }
      }
    ?>
    <br/><br/><br/>
    <div class="inscription">
      <div class="inscription_box">
        <div class="inscription_header">
          <h4>Inscription</h4>
        </div>
        <form class="inscription" method="post">
          <h6><i class="fas fa-user"></i> Nom :</h6><input type="text" name="nom" placeholder="...">
          <h6><i class="fas fa-user-tag"></i> Prénom :</h6><input type="text" name="prenom" placeholder="...">
          <h6><i class="fas fa-envelope"></i></i> Adresse Mail :</h6><input type="email" name="mail" placeholder="@@">
          <h6><i class="fas fa-lock"></i> Mot de passe :</h6><input type="password" name="mdp1" placeholder="****">
          <h6><i class="fas fa-lock"></i> Confimation mdp :</h6><input type="password" name="mdp2" placeholder="****">
          <input type="submit" name="forminscription" value="Inscription">
        </form>
        <div class="inscription_erreur">
          <?php
            if (isset($erreur))
            {
              echo $erreur;
            }
          ?>
        </div>
        <br/>
      </div>
    </div>
  </div>
  <div class="footer">
    <?php require_once("includes/footer.php"); ?>
  </div>
</div>
