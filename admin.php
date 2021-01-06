<div class="site">
  <div class="header">
    <?php require_once("includes/header.php"); ?>
  </div>
  <div class="content">
    <?php if($_SESSION['admin'] == 1 OR $_SESSION['admin'] == 2){ ?>
      <?php
      if (isset($_GET['prime']) AND !empty($_GET['prime']))
    	{
        $prime = (int) $_GET['prime'];
    		$req = $bdd->prepare('UPDATE membres SET prime = 1 WHERE id = ?');
    		$req->execute(array($prime));
    	}
    	if (isset($_GET['nonprime']) AND !empty($_GET['nonprime']))
    	{
    		$nonprime = (int) $_GET['nonprime'];
        $request = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
        $request->execute(array($nonprime));
        $requestfinish=$request->fetch();

        if ($requestfinish['admin'] != 2)
        {
          $req = $bdd->prepare('UPDATE membres SET prime = 0 WHERE id = ?');
      		$req->execute(array($nonprime));
        }
        else{$erreur = "Vous n'avez pas l'autorisation necessaire !";}
    	}
      if (isset($_GET['administrateur']) AND !empty($_GET['administrateur']))
      {
        $administrateur = (int) $_GET['administrateur'];
        $req = $bdd->prepare('UPDATE membres SET admin = 1 WHERE id = ?');
        $req->execute(array($administrateur));
      }
      if (isset($_GET['normal']) AND !empty($_GET['normal']))
      {
        $normal = (int) $_GET['normal'];
        $req = $bdd->prepare('UPDATE membres SET admin = 0 WHERE id = ?');
        $req->execute(array($normal));
      }
      if (isset($_GET['superadministrateur']) AND !empty($_GET['superadministrateur']))
      {
        $superadministrateur = (int) $_GET['superadministrateur'];
        $req = $bdd->prepare('UPDATE membres SET admin = 2 WHERE id = ?');
        $req->execute(array($superadministrateur));
      }
      if (isset($_GET['nonsuperadministrateur']) AND !empty($_GET['nonsuperadministrateur']))
      {
        $nonsuperadministrateur = (int) $_GET['nonsuperadministrateur'];
        $req = $bdd->prepare('UPDATE membres SET admin = 1 WHERE id = ?');
        $req->execute(array($nonsuperadministrateur));
      }
      if (isset($_GET['supprimer']) AND !empty($_GET['supprimer']))
    	{
    		$supprimer = (int) $_GET['supprimer'];
        $request = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
        $request->execute(array($supprimer));
        $requestfinish=$request->fetch();
        if($requestfinish['admin'] == 0 OR $_SESSION['admin'] == 2)
        {
          $req = $bdd->prepare('DELETE FROM membres WHERE id = ?');
      		$req->execute(array($supprimer));
        }
    		else{$erreur = "Vous n'avez pas l'autorisation necessaire !";}
      }


      if (isset($_GET['piste_ferme']) AND !empty($_GET['piste_ferme']))
      {
        $piste_ferme = (int) $_GET['piste_ferme'];

        if ($piste_ferme == 10)
        {
          for ($n=1; $n<=7; $n++)
          {
            $req = $bdd->prepare('UPDATE pistes SET etat = 0 WHERE id = ?');
            $req->execute(array($n));
          }
          $file = fopen('/var/www/html/py/pistes.txt', 'w');
          $text = "ferme0";
          fwrite($file,$text);
          fclose($file);
        }
        else
        {
          $req = $bdd->prepare('UPDATE pistes SET etat = 0 WHERE id = ?');
          $req->execute(array($piste_ferme));
          $file = fopen('/var/www/html/py/pistes.txt', 'w');
          $text = "ferme".$piste_ferme;
          fwrite($file,$text);
          fclose($file);
        }
      }
      if (isset($_GET['piste_accident']) AND !empty($_GET['piste_accident']))
      {
        $piste_accident = (int) $_GET['piste_accident'];
        if ($piste_accident == 10)
        {
          for ($n=1; $n<=7; $n++)
          {
            $req = $bdd->prepare('UPDATE pistes SET etat = 1 WHERE id = ?');
            $req->execute(array($n));
          }
          $file = fopen('/var/www/html/py/pistes.txt', 'w');
          $text = "accid0";
          fwrite($file,$text);
          fclose($file);
        }
        else
        {
          $req = $bdd->prepare('UPDATE pistes SET etat = 1 WHERE id = ?');
          $req->execute(array($piste_accident));
          $file = fopen('/var/www/html/py/pistes.txt', 'w');
          $text = "accid".$piste_accident;
          fwrite($file,$text);
          fclose($file);
        }
      }
      if (isset($_GET['piste_ouvert']) AND !empty($_GET['piste_ouvert']))
      {
        $piste_ouvert = (int) $_GET['piste_ouvert'];
        if ($piste_ouvert == 10)
        {
          for ($n=1; $n<=7; $n++)
          {
            $req = $bdd->prepare('UPDATE pistes SET etat = 2 WHERE id = ?');
            $req->execute(array($n));
          }
          $file = fopen('/var/www/html/py/pistes.txt', 'w');
          $text = "ouver0";
          fwrite($file,$text);
          fclose($file);
        }
        else
        {
          $req = $bdd->prepare('UPDATE pistes SET etat = 2 WHERE id = ?');
          $req->execute(array($piste_ouvert));
          $file = fopen('/var/www/html/py/pistes.txt', 'w');
          $text = "ouver".$piste_ouvert;
          fwrite($file,$text);
          fclose($file);
        }
      }

      if (isset($_POST['modif_temp']))
      {
        $temp = $_POST['temp'];
        $req = $bdd->prepare('UPDATE données SET temperature = ? WHERE id = 1');
        $req->execute(array($temp));
      }
      if (isset($_POST['modif_vent']))
      {
        $v_vent = $_POST['vent'];
        $req = $bdd->prepare('UPDATE données SET vent = ? WHERE id = 1');
        $req->execute(array($v_vent));
      }
      if (isset($_POST['modif_risque']))
      {
        $risque = $_POST['risque'];
        $req = $bdd->prepare('UPDATE données SET avalenche = ? WHERE id = 1');
        $req->execute(array($risque));
      }

      if (isset($_POST['confirm_message']))
      {
        $message = $_POST['message'];
        $file = fopen('/var/www/html/py/message.txt', 'w');
        fwrite($file,$message);
        fclose($file);
      }
      ?>
      <ul class="menu">
        <li><a href="admin.php?membre=">MEMBRES</a></li>
        <li><a href="admin.php?pistes=">PISTES</a></li>
        <li><a href="admin.php?donnees=">DONNEES</a></li>
      </ul>
      <div class="administration">
        <h2>Administration</h2>
        <?php if(!isset($_GET['membre']) AND !isset($_GET['pistes']) AND !isset($_GET['donnees'])){ ?>
          <h4>Voici l'espace d'administration</h4>
  				<h4>C'est ici que vous pouvez gérer les membres ainsi que la gestion du panneau</h4>

        <?php } if(isset($_GET['membre'])) { ?>
          <h4>Gestion des membres</h4>
          <?php if(isset($erreur)){echo $erreur;} ?>
          <table>
            <tr>
              <td><i style="background-color:#2B35FF;" class="fas fa-user-circle"> Prime</i></td>
              <td><i style="background-color:MediumSeaGreen;" class="fas fa-user-circle"> Non prime</i></td>
              <td><i style="background-color:#C72DFF;" class="fas fa-user"> Super Admin</i></td>
              <td><i style="background-color:orange;" class="fas fa-user"> Admin</i></td>
              <td><i style="background-color:#47C1BB;" class="fas fa-user"> Membre</i></td>
            </tr>
          </table>
          <table>
            <tr>
              <td><b>Nom</b></td>
              <td><b>Prénom</b></td>
              <td><b>Mail</b></td>
              <td><b>Action</b></td>
            </tr>
            <?php
              $membres = $bdd->query('SELECT * FROM membres ORDER BY id');
              while($membre = $membres->fetch())
              {
            ?>
              <tr>
                <td><?= $membre['nom'] ?></td>
                <td><?= $membre['prenom'] ?></td>
                <td><?= $membre['mail'] ?></td>
                <td>
                  <?php if($membre['prime'] == 0){ ?><a href="admin.php?membre=&prime=<?= $membre['id'] ?>"><i style="background-color:MediumSeaGreen;" class="fas fa-user-circle"></i></a><?php } ?>
                  <?php if($membre['prime'] == 1){ ?><a href="admin.php?membre=&nonprime=<?= $membre['id'] ?>"><i style="background-color:#2B35FF;" class="fas fa-user-circle"></i></a><?php } ?>
                  <?php if($membre['admin'] == 1){ ?><a href="admin.php?membre=&normal=<?= $membre['id'] ?>"><i style="background-color:orange;" class="fas fa-user"></i></a><?php } ?>
                  <?php if($membre['admin'] == 0){ ?><a href="admin.php?membre=&administrateur=<?= $membre['id'] ?>"><i style="background-color:#47C1BB;" class="fas fa-user"></i></a><?php } ?>
                  <?php if($membre['admin'] == 2){ ?><a href="admin.php?membre=&super=<?= $membre['id'] ?>"><i style="background-color:#C72DFF;" class="fas fa-user"></i></a><?php } ?>
                  <a href="admin.php?membre=&supprimer=<?= $membre['id'] ?>"><i style="background-color:#FF4635;" class="fas fa-trash-alt"></i></a>
                  <?php if($_SESSION['admin'] == 2 AND $membre['admin'] == 1){ ?><a href="admin.php?membre=&superadministrateur=<?= $membre['id'] ?>"><i style="background-color:#C72DFF;" class="fas fa-user"></i></a><?php } ?>
                  <?php if($_SESSION['admin'] == 2 AND $membre['admin'] == 2){ ?><a href="admin.php?membre=&nonsuperadministrateur=<?= $membre['id'] ?>"><i style="background-color:#C72DFF;" class="fas fa-user"></i></a><?php } ?>
                </td>
              </tr>
            <?php } ?>
          </table>
        <?php } ?>

        <?php if (isset($_GET['pistes'])) { ?>
          <h4>Gestion des pistes</h4>
          <table>
            <tr>
              <td><i style="background-color:red;" class="fas fa-circle"> Fermé</i></td>
              <td><i style="background-color:orange;" class="fas fa-circle"> Accident</i></td>
              <td><i style="background-color:green;" class="fas fa-circle"> Ouvert</i></td>

            </tr>
          </table>
          <table>
            <tr>
              <td>Piste</td>
              <td>Etat</td>
              <td>Modification</td>
            </tr>
            <tr>
              <td>Toute les pistes</td>
              <td>
                <i style="background-color:blue;" class="fas fa-circle"></i>
              </td>
              <td>
                <a href="admin.php?pistes=&piste_ferme=10"><i style="background-color:red;" class="fas fa-circle"></i></a>
                <a href="admin.php?pistes=&piste_accident=10"><i style="background-color:orange;" class="fas fa-circle"></i></a>
                <a href="admin.php?pistes=&piste_ouvert=10"><i style="background-color:green;" class="fas fa-circle"></i></a>
              </td>
            </tr>

            <?php
              $pistes = $bdd->query('SELECT * FROM pistes ORDER BY id');
              while($piste = $pistes->fetch())
              {
            ?>
            <tr>
              <td><?= $piste['nom'] ?></td>
              <td>
                <?php if($piste['etat'] == 0){ ?><i style="background-color:red;" class="fas fa-circle"></i><?php } ?>
                <?php if($piste['etat'] == 1){ ?><i style="background-color:orange;" class="fas fa-circle"></i><?php } ?>
                <?php if($piste['etat'] == 2){ ?><i style="background-color:green;" class="fas fa-circle"></i><?php } ?>
              </td>
              <td>
                <a href="admin.php?pistes=&piste_ferme=<?= $piste['id'] ?>"><i style="background-color:red;" class="fas fa-circle"></i></a>
                <a href="admin.php?pistes=&piste_accident=<?= $piste['id'] ?>"><i style="background-color:orange;" class="fas fa-circle"></i></a>
                <a href="admin.php?pistes=&piste_ouvert=<?= $piste['id'] ?>"><i style="background-color:green;" class="fas fa-circle"></i></a>
              </td>
            </tr>
          <?php } ?>
          </table>
        <?php } ?>

        <?php if (isset($_GET['donnees'])) { ?>
          <h4>Gestion des données</h4><br/>
          <?php
            $données = $bdd->query('SELECT * FROM données WHERE id = 1');
            $donnée = $données->fetch();
            $temperature = $donnée['temperature'];
            $vent = $donnée['vent'];
            $risque = $donnée['avalenche'];
          ?>
          <div class="station_grid">
            <div class="station_item">
              <div class="station_titre">
                <h1>Température <i class="fas fa-temperature-low"></i></h1>
              </div><br/>
              <div class="station_contenu">
                <p><?= $temperature ?>°C</p>
              </div><br/>
              <form method="post">
                <input type="text" name="temp" value="<?= $temperature ?>">
                <input type="submit" name="modif_temp" value="Modifier">
              </form>
            </div>
            <div class="station_item">
              <div class="station_titre">
                <h1>Vitesse du vent <i class="fas fa-wind"></i></h1>
              </div><br/>
              <div class="station_contenu">
                <p><?= $vent ?> km/h</p>
              </div><br/>
              <form method="post">
                <input type="text" name="vent" value="<?= $vent ?>">
                <input type="submit" name="modif_vent" value="Modifier">
              </form>
            </div>
            <div class="station_item">
              <div class="station_titre">
                <h1>Risque d'avalenche <i class="fas fa-mountain"></i></h1>
              </div>
              <br/>
              <div class="station_contenu">
                <p><?= $risque ?>/5</p>
              </div><br/>
              <form method="post">
                <input type="text" name="risque" value="<?= $risque ?>">
                <input type="submit" name="modif_risque" value="Modifier">
              </form>
            </div>
          </div>
          <div class="message">
            <form method="post">
              <input type="text" name="message" value="Entrez votre message 80 charactères">
              <input type="submit" name="confirm_message" value="Envoyer">
            </form>
          </div>
        <?php } ?>
      </div>
    <?php }else{header("Location: index.php");} ?>
  </div>
  <div class="footer">
    <?php require_once("includes/footer.php"); ?>
  </div>
</div>
