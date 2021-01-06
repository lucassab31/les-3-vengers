<div class="site">
  <div class="header">
    <?php require_once("includes/header.php"); ?>
  </div>
  <div class="content">
    <div class="haut">
  		<a href="information_eng.php"><img src="includes/eng.png"></a><br/>
  		<h1>Projet de terminal STI2D SIN</h1>
  		<h3>Lycée Pierre Paul Riquet</h3>
  		<h4>Landry Karine Sabathé Lucas Gonzalez Mathieu</h4><br/>
  	</div>
    <div class="tout">
  		<div class="general">
  			<h2>Présentation du projet</h2><br/>
  			<p>
  			Notre projet consiste à faire un panneau à <strong>installer dans les stations de skis</strong>. Il permettra d’informer les usagers des différentes accessibilités aux pistes ainsi qu’aux données de la station (temp, vent) Il sera aussi équipé d’un système de distribution de plan individuel. Le panneau sera relié à un <em>site internet</em> duquel on pourra accéder aux informations en direct (température, vitesse du vent et les pistes ouvertes). Notre projet dispose aussi d’une <em>application</em> basée sur le site et permettant en plus le déclenchement d’un <em>système de secours</em>. Ce système permettra de signaler un accident sur une des pistes de la station, il sera relié à un centre d’urgence ainsi qu’aux panneaux en indiquant un danger sur la piste concernée. Le téléphone de l'usager sera alors localisé, ce qui permettra une meilleure intervention des secours.
  			</p><br/>
  			<h2>Cahier des charges</h2><br/>
  			<table>
  				<tr>
  					<th>Panneau</th>
  					<th>Site internet</th>
  					<th>Application</th>
  				</tr>
  				<tr>
  					<td>Affichage de la température</td>
  					<td>Plan des pistes</td>
  					<td>Plan des pistes</td>
  				</tr>
  				<tr>
  					<td>Affichage de la vitesse du vent</td>
  					<td>Affichage de la température et de la vitesse du vent</td>
  					<td>Système de secours</td>
  				</tr>
  				<tr>
  					<td>Plan des pistes à LED RGB</td>
  					<td>Système de compte</td>
  					<td>Formulaire d'accident</td>
  				</tr>
  				<tr>
  					<td>Affichage de message defilant</td>
  					<td>Système sécurisé pour la gestion</td>
  					<td>Données de la station</td>
  				</tr>
  			</table><br/>
  			<h3>Fonctionnalités</h3>
  			<p>
  			Notre panneau permettrait de connaître la température, la vitesse du vent, le risque d’avalanche, il y aurait un système de distribution de plan, un plan des pistes à LED significative et un bandeau d’affichage d’information défilantes. Le site internet comporte les même informations que le panneau. L’application affichera le plan des pistes ainsi qu’une fonction SOS.
  			</p><br/>
  			<h3>Diagrammes</h3><br/>
  			<img src="includes/req.png"><br/><br/>
  			<img src="includes/bdd.png">
  		</div>
  		<div class="selection">
  			<ul>
  				<li><a href="#karine">Karine</a></li>
  				<li><a href="#lucas">Lucas</a></li>
  				<li><a href="#mathieu">Mathieu</a></li>
  			</ul>
  		</div><br/>
  		<div id="karine">
  			<h2>Partie de Karine</h2>
  			 <table>
  				<tr>
  					<th>Type de Capteur</td>
  					<th>LEXCA003</th>
  					<th>Anemometre à ultrason</th>
  				</tr>
  				<tr>
  					<th>Signal de Sortie</td>
  					<td>Numérique</td>
  					<td>Numérique</td>
  				</tr>
  				<tr>
  					<th>Principe de Fonctionnement </td>
  					<td>lois de l'aérodynamique: vitesse du vent égale à la vitesse de déplacement du centre des coupelles, proportionelle au nombre de tours par second de l'anénometre</td>
  					<td>La mesure s'effectue par le calcul de temps de dplacements du son entre les couples transducteurs suivant les axes N-S et E-O</td>
  				</tr>
  				<tr>
  					<th>Précission</td>
  					<td>+- 0.5m/s</td>
  					<td>+- 0.2m/s</td>
  				</tr>
  				<tr>
  					<th>Température d'opération</td>
  					<td>-50°C à +55°C</td>
  					<td>-30°C à +70°C</td>
  				</tr>
  			</table>
  		</div><br/>
  		<div id="lucas">
  			<h2>Partie de Lucas</h2>
  			<p>
  				Ma partie consiste à faire le système de distribution de plan individuel. Ce système est mis en place afin de limiter le gaspillage des plans. La distribution se fera à l’aide du passage des forfaits de ski devant un capteur RFID, ce qui déclencherait la sortie d’un plan. En revanche si la demande de plan la plus récente date de moins d’une semaine, alors le plan ne sera pas délivré.
  			</p><br/><br/>
  			<h5>Au commencement de ma partie j’ai réalisé un tableau comparatif des différents capteurs utilisables pour mon cas :</h5><br/>
  			<table>
  				<tr>
  					<th>Type de Capteur</td>
  					<th>Module RFID 125Khz</th>
  					<th>PN532 RFID Module</th>
  				</tr>
  				<tr>
  					<th>Signal de Sortie</td>
  					<td>Numérique RS232</td>
  					<td>Numérique I²C</td>
  				</tr>
  				<tr>
  					<th>Principe de Fonctionnement </td>
  					<td>Onde Radio</td>
  					<td>Onde Radio</td>
  				</tr>
  				<tr>
  					<th>Portée</td>
  					<td>5cm</td>
  					<td>5cm-7cm</td>
  				</tr>
  				<tr>
  					<th>Température d'opération</td>
  					<td>-10°C - +70°C</td>
  					<td>Pas de données</td>
  				</tr>
  			</table><br/><br/>
  			<p>
  				Après cela j’en ai donc déduit de prendre le Module RFID en 125khz, puis j’ai commencé à tester le capteur et cherché son mode de fonctionnement. J’ai créé un programme test permettant de relever le numéro du tag que l’on passe, puis j’ai pu validé les performances du capteur à l’aide de différentes mesures.
  			</p><br/>
  			<h4>Enfin j’ai réalisé le diagramme des blocs internes de ma partie :</h4><br/>
  			<img src="includes/ibd_jarvis.png">
  		</div><br/>
  		<div id="mathieu">
  			<h2>Partie de Mathieu</h2>
  		</div>
    </div>
  </div>
  <div class="footer">
    <?php require_once("includes/footer.php"); ?>
  </div>
</div>
