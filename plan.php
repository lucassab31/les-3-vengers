<div class="site">
  <div class="header">
    <?php require_once("includes/header.php"); ?>
  </div>
  <div class="content">
    <div class="plan_grid">
      <div class="plan_item">
        <div class="plan_titre">
          <h1>Plan de la station <i class="fas fa-map"></i></h1>
        </div>
        <div class="plan_contenu">
          <img src="includes/plan.png">
        </div>
      </div>
      <div class="plan_item">
        <div class="plan_titre">
          <h1>Pistes <i class="fas fa-snowflake"></i></h1>
        </div>
        <div class="plan_contenu">
          <table>
            <?php
              $pistes = $bdd->query('SELECT * FROM pistes ORDER BY id');
              while($piste = $pistes->fetch())
              {
            ?>
              <tr>
                <td><?= $piste['nom']  ?></td>
                <td>
                  <?php if($piste['etat'] == 0){ ?><i style="background-color:red;" class="fas fa-circle"></i><?php } ?>
                  <?php if($piste['etat'] == 1){ ?><i style="background-color:orange;" class="fas fa-circle"></i><?php } ?>
                  <?php if($piste['etat'] == 2){ ?><i style="background-color:green;" class="fas fa-circle"></i><?php } ?>
                </td>
              </tr>
            <?php } ?>
          </table>
          <table>
            <tr>
              <td><img src="includes/legende1.png"></td>
              <td><img src="includes/legende2.png"></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
    <?php require_once("includes/footer.php"); ?>
  </div>
</div>
