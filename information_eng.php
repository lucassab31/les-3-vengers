<div class="site">
  <div class="header">
    <?php require_once("includes/header.php"); ?>
  </div>
  <div class="content">
    <div class="haut">
  		<a href="information.php"><img src="includes/fr.png"></a><br/>
  		<h1>Project STI2D SIN</h1>
  		<h3>Lycée Pierre Paul Riquet</h3>
  		<h4>Landry Karine Sabathé Lucas Gonzalez Mathieu</h4><br/>
  	</div>
    <div class="tout">
    	<div class="general">
    		<h2>General Presentation</h2>
    		<p>
    		Our project is to make a billboard that <strong>can be installed</strong> in ski resorts. This will allow to inform skiers of different access to the ski slopes, as well as the temperature and the wind speed. It will be equipped with a map distribution system which will give one map by person. The sign will be connect to a <em>website</em> where we can also see the different data in live. Our project include a <em>smartphone application</em> based on the website, and contain a rescue system which can be triggered by the user. This system will permit to signal an accident on the slope and it will be connect to a rescue center who will send a medical staff to the phone location.
    		</p><br/>
    		<h2>Technical Specifications</h2>
    		<table>
    			<tr>
    				<th>Billboard</th>
    				<th>Web site</th>
    				<th>Smartphone application</th>
    			</tr>
    			<tr>
    				<td>Temperature display</td>
    				<td>Slopes map</td>
    				<td>Slopes map</td>
    			</tr>
    			<tr>
    				<td>Wind speed display</td>
    				<td>Temperature and wind speed display</td>
    				<td>Rescue system</td>
    			</tr>
    			<tr>
    				<td>Slopes map RGB</td>
    				<td>Account system</td>
    				<td>Accident form</td>
    			</tr>
    			<tr>
    				<td>Moving message display</td>
    				<td>Secure management system</td>
    				<td>Ski resort data</td>
    			</tr>
    		</table><br/>
    		<h3>Features</h3>
    		<p>
    			Our panel would show the temperature, the wind speed, the risk of avalanche, a map distribution system, a map with RGB led and a moving message banner. The website contains the same information as the billboard. The application will display the map and a SOS function.
    		</p>
    		<h3>Diagrams</h3><br/>
    		<img src="includes/req_eng.png"><br/><br/>
    		<img src="includes/bdd_eng.png">
    	</div>
    	<div class="selection">
    		<ul>
    			<li><a href="#karine">Karine</a></li>
    			<li><a href="#lucas">Lucas</a></li>
    			<li><a href="#mathieu">Mathieu</a></li>
    		</ul>
    	</div><br/>
    	<div id="karine">
    		<h2>Karine's part</h2>
    		<p>My part on this project consist of programming the anemometer and to take all information and write them on the panel thanks to an LCD screen. A anemometer is a basic captor: the wind turn blade which, themselves causes movement, the magnet insides the anemometer will move, because of this movement our microcontroller will receive analog information.
    		</p><br/><br/>
    		 <table>
    			<tr>
    				<th>Sensor type</th>
    				<th>LEXCA003</th>
    				<th>Ultrasound anemometer</th>
    			</tr>
    			<tr>
    				<th>Output signal</td>
    				<td>Digital</td>
    				<td>Digital</td>
    			</tr>
    			<tr>
    				<th>Operating mode</td>
    				<td>aerodynamics law: wind speed equal to the speed of movement of the centre of the cups, proportional to the number of turns per second of the anenometer</td>
    				<td>Measurements are performed by calculating the time of sound movement between transducer torques along the N-S and E-W axes</td>
    			</tr>
    			<tr>
    				<th>Accuracy</td>
    				<td>+- 0.5m/s</td>
    				<td>+- 0.2m/s</td>
    			</tr>
    			<tr>
    				<th>Operation temperature</td>
    				<td>-50°C to +55°C</td>
    				<td>-30°C to +70°C</td>
    			</tr>
    		</table>
    	</div><br/>
    	<div id="lucas">
    		<h2>Lucas's part</h2>
    		<p>
    			To my part i realized a comparative table with tow sensor usable in my case. After that i deduced taking the RFID module in 125Khz. Then i start to test the sensor and looked for his operating mode. Indeed i create a test program to receive the id of each different tag. In addition i test his performance with a mesure table and i analyzed with a digital analyzer the transmitted data to the arduino. Finally i realized an internal block diagram of my part.
    		</p><br/><br/>
    		<table>
    			<tr>
    				<th>Sensor type</th>
    				<th>RFID Module 125Khz</th>
    				<th>PN532 RFID Module</th>
    			</tr>
    			<tr>
    				<th>Output signalDigital</td>
    				<td>Digital RS232</td>
    				<td>Digital I²C</td>
    			</tr>
    			<tr>
    				<th>Operating mode</th>
    				<td>Radio wave</td>
    				<td>Radio wave</td>
    			</tr>
    			<tr>
    				<th>Range</th>
    				<td>5cm</td>
    				<td>5cm to 7cm</td>
    			</tr>
    			<tr>
    				<th>Operating temperature</th>
    				<td>-10°C to +70°C</td>
    				<td>No data</td>
    			</tr>
    		</table><br/><br/>
    	</div><br/>
    	<div id="mathieu">
    		<h2>Mathieu's part</h2>
    		<p>
    			My part is to code and mount a temperature sensor and an LED plan. The temperature sensor will be a DS1621. The LEDs will be RGB,  they will indicate the accessibility of the slopes.
    			I started working on the temperature sensor, once coded I tested it in simulation and then on a prototype. Having finished testing the temperature sensor, I made a code allowing to turn on the LED of different slopes with tree color, red, orange and green, in the serial monitor. All that remains for me is to find a way to control the LED from the website with an admin panel. Lucas is helping me for that.
    		</p><br/>
    		<table>
    			<tr>
    				<th>Sensor type</th>
    				<th>Temperature sensor DS1621</th>
    				<th>Thermistance CTN</th>
    			</tr>
    			<tr>
    				<th>Output signal</td>
    				<td>Digital</td>
    				<td>Analog</td>
    			</tr>
    			<tr>
    				<th>Accuracy </th>
    				<td>+- 0.5°C</td>
    				<td>+- 10%</td>
    			</tr>
    			<tr>
    				<th>Range</th>
    				<td>-55°C to +125°C</td>
    				<td>-55°C to +125°C</td>
    			</tr>
    			<tr>
    				<th>Operating temperature</th>
    				<td>-60°C to +130°C</td>
    				<td>No data</td>
    			</tr>
    		</table><br/><br/>
    	</div>
    </div>
  </div>
  <div class="footer">
    <?php require_once("includes/footer.php"); ?>
  </div>
</div>
