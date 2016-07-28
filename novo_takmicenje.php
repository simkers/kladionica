<!DOCTYPE html>
<html>
	<head>
		<title>Tiket | Kladža</title>
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
				if(isset($_POST['ekipa']))
				{
					$ekipe=$_POST['ekipa'];
					for($i = 0; $i < count($ekipe); $i++)
						mysqli_query($konekcija, "INSERT INTO učesnici (takmičenje_id, ekipa_id) VALUES (".$_POST['tak'].", ".$ekipe[$i].")");
					if (mysqli_errno($konekcija))
						echo "Neuspešno unošenje u bazu. Greška: " . mysqli_error($konekcija);
					else
						echo "Uspešno uneseno novo takmičenje.";
					echo '<br>
						<a href="unos_u_bazu.php">
						<input type="button" id="dugme" value="Povratak na predhodnu stranicu">
						</a>';
				}
				else if(isset($_POST['sezona']))
				{
					$selekt = mysqli_query($konekcija, "SELECT MAX(takmičenje_id) as 'aaa' FROM takmičenja");
					$red = mysqli_fetch_array($selekt);
					$id = $red['aaa'] + 1;
					
					$i = '"'.$_POST['ime'].'"';
					$s = '"'.$_POST['sezona'].'"';
					$sp = $_POST['sport'];
					$d = $_POST['država'];
					$r = '"'.$_POST['rang'].'"';
					$t = '"'.$_POST['tip'].'"';
					if($_POST['ime'] == "" || $_POST['sezona'] == "" || $_POST['sport'] == "" || $_POST['država'] == "")
						echo 'Niste popunili sva polja.
							<br>
							<a href="unos_u_bazu.php">
							<input type="button" id="dugme" value="Povratak na predhodnu stranicu">
							</a>';
					else
					{
						$selekt = mysqli_query($konekcija, "SELECT * FROM takmičenja WHERE ime = ".$i." AND sezona = ".$s);
						if($red = mysqli_fetch_array($selekt))
							echo 'Takmičenje "'.$_POST['ime'].' '.$_POST['sezona'].'" već postoji u bazi.
								<br>
								<a href="unos_u_bazu.php">
								<input type="button" id="dugme" value="Povratak na predhodnu stranicu">
								</a>';
		
						else
						{
							mysqli_query($konekcija, 'INSERT INTO takmičenja (takmičenje_id, ime, sezona, država_id, sport_id, rang_takmičenja, tip_takmičenja) VALUES ('.$id.', '.$i.','.$s.','.$d.','.$sp.','.$r.','.$t.')');
							if (mysqli_errno($konekcija))
							{
								echo "Neuspešno unošenje u bazu. Greška: " . mysqli_error($konekcija);
								echo '<a href="unos_u_bazu.php">
									<input type="button" id="dugme" value="Povratak na predhodnu stranicu">
									</a>';
							}
							else
							{	echo 'Obeležite ekipe koje se takmiče u '.$i.' za sezonu '.$s.':<br><br>';
								echo '<form action = "novo_takmicenje.php" method = "POST">
									';
								$selekt = mysqli_query($konekcija, "SELECT ekipa_id, ime FROM ekipe");
								while($red = mysqli_fetch_array($selekt))
									echo '<input type="checkbox" name = "ekipa[]" value='.$red['ekipa_id'].'>'.$red['ime'].'<br>
									';
								echo '<input type="hidden" name="tak" value="'.$id.'">';
								mysqli_close($konekcija);
								echo '<input type="submit" id="dugme" value="Unesi">
									</form>';
							}
						}
					}
				}
				else
				{
					echo 'Niste obeležili nijednu ekipu. Takmičenje nije uneto. <br>';
					mysqli_query($konekcija, "DELETE FROM takmičenja WHERE takmičenje_id = ".$_POST['tak']);
					echo '<a href="unos_u_bazu.php">
						<input type="button" id="dugme" value="Povratak na predhodnu stranicu">
						</a>';
				}
			?>
		</div>
	</div>
	</body>
</html>

    

