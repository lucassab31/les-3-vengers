<!DOCTYPE html>
<html>
	<head>
		<title>TEST</title>
	</head>
	<body>
		<form></form>
	<?php 
	$file = fopen('/var/www/html/py/pistes.txt', 'w');
	$text = "ferme0";
	fwrite($file,$text);
	fclose($file);
	echo $text;
	?>
	</body>
</html>
