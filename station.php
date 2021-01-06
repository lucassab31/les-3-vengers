<div class="site">
  <div class="header">
    <?php require_once("includes/header.php"); ?>
  </div>
  <div class="content">
    <?php

      $file = fopen('/var/www/html/py/temp.txt', 'r');
      $temp_fichier = fgets($file);
      fclose($file);
      $file = fopen('/var/www/html/py/vent.txt', 'r');
      $vent_fichier = fgets($file);
      fclose($file);

      $temp_finale = explode("=",$temp_fichier);
      $vent_finale = explode("=",$vent_fichier);

      $req = $bdd->prepare('UPDATE données SET temperature = ? , vent = ? WHERE id = 1');
      $req->execute(array($temp_finale['1'],$vent_finale['1']));

      $données = $bdd->query('SELECT * FROM données WHERE id = 1');
      $donnée = $données->fetch();
      $temperature = $donnée['temperature'];
      $vent = $donnée['vent'];
      $risque = $donnée['avalenche'];
    ?>
    <br/><br/><br/><br/><br/><br/>
    <div class="station_grid">
      <div class="station_item">
        <div class="station_titre">
          <h1>Température <i class="fas fa-temperature-low"></i></h1>
        </div>
        <br/>
        <div class="station_contenu">
          <p><?= $temperature ?>°C</p>
        </div>
      </div>
      <div class="station_item">
        <div class="station_titre">
          <h1>Vitesse du vent <i class="fas fa-wind"></i></h1>
        </div>
        <br/>
        <div class="station_contenu">
          <p><?= $vent ?> km/h</p>
        </div>
      </div>
      <div class="station_item">
        <div class="station_titre">
          <h1>Risque d'avalenche <i class="fas fa-mountain"></i></h1>
        </div>
        <br/>
        <div class="station_contenu">
          <p><?= $risque ?>/5</p>
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
    <?php require_once("includes/footer.php"); ?>
  </div>
</div>
