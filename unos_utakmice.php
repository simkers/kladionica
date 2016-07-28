<!DOCTYPE html>
<html>
	<head>
		<title>Unos utakmice | Kladža</title>
		<link rel="stylesheet" href="stil.css">
	</head>
	
	<body>
		<div id="glavni">	
			<a href="unos_u_bazu.php">   
			<img src="logo.png" id="logo"> 
			</a>
			
			<div class="forme">
				
				<?php
				
				
				session_start();
				if(!isset($_SESSION['un']))
					header("location:login.php");
				
				
				mb_internal_encoding('UTF-8');
				mb_http_output('UTF-8');
				mb_http_input('UTF-8');
				mb_language('uni');
				mb_regex_encoding('UTF-8');
				ob_start('mb_output_handler');
				
				$konekcija=mysqli_connect("localhost","root","", "kladionica");
				$konekcija->set_charset("utf8");
				if (mysqli_connect_errno($konekcija))
					echo "Greška prilikom pristupanja bazi: " . mysqli_connect_error();
				
				$id = $_POST['uta'];
				$selekt = mysqli_query($konekcija, 'SELECT tip_id FROM tipovi');
				while($red = mysqli_fetch_array($selekt))
					if(isset($_POST[$red['tip_id']]) && $_POST[$red['tip_id']] != "")
						mysqli_query($konekcija, "INSERT INTO igre (utakmica_id, tip_id, kvota) VALUES (".$id.", ".$red['tip_id'].", ".$_POST[$red['tip_id']].")");
			
				if (mysqli_errno($konekcija))
					echo "Neuspešno unošenje u bazu. Greška: " . mysqli_error($konekcija);
				else
					echo "Uspešno unesena nova utakmica.";
				
				mysqli_close($konekcija);  
				
				?>
				
				<br>
				<a href="unos_u_bazu.php">  
				<input type="button" id="dugme" value="Povratak na predhodnu stranicu">
				</a>
			</div>
		</div>
	</body>
</html>