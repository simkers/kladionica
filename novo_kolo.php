<!DOCTYPE html>
<html>
	<head>
		<title>Unos kola | Kladža</title>
		<link rel="stylesheet" href="stil.css">
	</head>
	
	<body>
		<div id="glavni">
			<a href="unos_u_bazu.php">   
			<img src="logo.png" id="logo"> 
			</a>
			
			<link rel="stylesheet" href="stil.css">
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
				
				$a = "'"  .$_POST['datum_početka'].  "'";
				$b = "'"  .$_POST['datum_završetka'].  "'";
				if($_POST['datum_početka'] == "" || $_POST['datum_završetka'] == "")
					echo "Niste popunili sva polja.";
				else
				{
					mysqli_query($konekcija, "INSERT INTO kola (datum_početka, datum_završetka) VALUES (".$a.",".$b.")");
					if (mysqli_errno($konekcija))
						echo "Neuspešno unošenje u bazu. Greška: " . mysqli_error($konekcija);
					else
						echo "Uspešno uneseno novo kolo.";
				}
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