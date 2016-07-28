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
				
				
				$šif = '"'.$_POST['šifra'].'"';
				$dat = "'"  .$_POST['datum_odigravanja'].  "'";
				$vre = '"'  .$_POST['vreme_odigravanja'].  '"';
				$dom = $_POST['domaćin'];
				$gos = $_POST['gost'];
				$tak = $_POST['takmičenje'];
				$kol = $_POST['kolo'];
				if($šif == '""' || $dat == "''" || $vre == '""' || $dom == "" || $gos == "" || $tak == "" || $kol == "")
					echo 'Niste popunili sva polja.
						<br>
						<a href="unos_u_bazu.php">  
						<input type="button" id="dugme" value="Povratak na predhodnu stranicu">
						</a>';
				else
				{
					$selekt = mysqli_query($konekcija, "SELECT rubrika_id FROM rubrike WHERE takmičenje_id = ".$tak." AND kolo_id = ".$kol);
					if ($red=mysqli_fetch_array($selekt))
						$rub=$red['rubrika_id'];
					else
					{
						$selekt = mysqli_query($konekcija, "SELECT max(rubrika_id) as 'mmm' FROM rubrike");
						if ($red=mysqli_fetch_array($selekt))
							$rub = $red['mmm'] + 1;
						else
							$rub = 1;
						mysqli_query($konekcija, 'INSERT INTO rubrike (rubrika_id, kolo_id, takmičenje_id) VALUES ('.$rub.', '.$kol.', '.$tak.')');
						
						if (mysqli_errno($konekcija))
							echo "Neuspešno unošenje u bazu. Greška: " . mysqli_error($konekcija);
					}
					$selekt = mysqli_query($konekcija, "SELECT * FROM utakmice WHERE šifra_utakmice = ".$_POST['šifra']." AND rubrika_id = ".$rub);
					if($red = mysqli_fetch_array($selekt))
						echo 'Utakmica sa šifrom '.$šif.' već postoji u bazi.
							<br>
							<a href="unos_u_bazu.php">  
							<input type="button" id="dugme" value="Povratak na predhodnu stranicu">
							</a>';
					else
					{
						$selekt = mysqli_query($konekcija, "SELECT MAX(utakmica_id) as 'aaa' FROM utakmice");
						$red = mysqli_fetch_array($selekt);
						$id = $red['aaa'] + 1;
						mysqli_query($konekcija, 'INSERT INTO utakmice (utakmica_id, šifra_utakmice, datum_početka, vreme_početka, domaćin, gost, rubrika_id) VALUES ('.$id.', '.$šif.', '.$dat.', '.$vre.', '.$dom.', '.$gos.', '.$rub.')');
						if (mysqli_errno($konekcija))
							echo 'Neuspešno unošenje u bazu. Greška: ' . mysqli_error($konekcija). '<br>';
						else
						{
							echo '<form action="unos_utakmice.php" method="POST">';
							$selekt = mysqli_query($konekcija, 'SELECT ime FROM ekipe WHERE ekipa_id = '.$dom);
											$red = mysqli_fetch_array($selekt);
									$d = $red['ime'];
			
									$selekt = mysqli_query($konekcija, 'SELECT ime FROM ekipe WHERE ekipa_id = '.$gos);
											$red = mysqli_fetch_array($selekt);
									$g = $red['ime'];
			
							echo 'Unesi kvote za utakmicu '.$d.' - '.$g.': <br><br><br>';
							$selekt = mysqli_query($konekcija, "SELECT DISTINCT(oznaka_vrste_igre), v.opis FROM vrste_igara v JOIN tipovi t USING (oznaka_vrste_igre) ORDER BY tip_id");
							while($red = mysqli_fetch_array($selekt))
							{
								echo $red['opis'].'<br>';
								$selekt1 = mysqli_query($konekcija, 'SELECT tip_id, oznaka FROM tipovi WHERE oznaka_vrste_igre = "'.$red['oznaka_vrste_igre'].'"');
								while($red1 = mysqli_fetch_array($selekt1))
									echo $red1['oznaka'].': <input type = "text" id="textbox" name = "'.$red1['tip_id'].'">';
								echo '<br><br>';
							}
							echo '<input type="hidden" name="uta" value="'.$id.'">';
							echo '<input type="submit" id="dugme" value="Unesi">';
							echo '</form>';
						}
					}
				}
				mysqli_close($konekcija);
				?>
			</div>
		</div>	
	</body>
</html>