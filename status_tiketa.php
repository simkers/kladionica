<!DOCTYPE html>
<html>
	<head>
		<title>Pregled tiketa | Kladža</title>
		<link rel="stylesheet" href="stil.css">
	</head>
	
	<body>
		<div id="glavni">
			<a href="index.php">   
			<img src="logo.png" id="logo"> 
			</a>
				<?php
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
						
					if(isset($_POST['id']))
					{
						echo '<table style="width: 100%">';
						
						echo '<tr style="width: 100%">';
						echo "<th>Šifra</th>";
						echo "<th>Utakmica</th>";
						echo "<th>Tip</th>";
						echo "<th>Kvota</th>";
						echo "<th>Trenutni rezultat</th>";
						echo "<th>Status utakmice</th>";
						echo "</tr>";
						
						$ukupna_kvota = 1;
						$selekt = mysqli_query($konekcija, "SELECT igra_id FROM tiketi JOIN igre_na_tiketima USING (tiket_id) WHERE tiket_id = ".$_POST['id']);
						
						while($red = mysqli_fetch_array($selekt))
						{
							echo '<tr>';
							$selekt1 = mysqli_query($konekcija, "SELECT šifra_utakmice, 
																		CONCAT(CONCAT(d.ime, ' - '), g.ime) as utak,
																		CONCAT(CONCAT(oznaka_vrste_igre, ' '), oznaka) as tip, 
																		kvota,
																		rezultat,
																		prošla,
																		završena
																FROM igre JOIN utakmice USING (utakmica_id) 
																		JOIN ekipe d ON (d.ekipa_id = domaćin) 
																		JOIN ekipe g ON (g.ekipa_id = gost) 
																		JOIN tipovi USING (tip_id)
																WHERE igra_id = ".$red['igra_id']);
							$red1 = mysqli_fetch_array($selekt1);
							echo "<td>".$red1['šifra_utakmice']."</td>
								  <td>".$red1['utak']."</td>
								  <td>".$red1['tip']."</td>
								  <td>".$red1['kvota']."</td>
								  <td>".$red1['rezultat']."</td>";
							if($red1['završena'])
								if($red1['prošla'])
									echo "<td>Dobitna igra.</td>";
								else
									echo "<td>Gubitna igra.</td>";
							else
								echo "<td>Utakmica u toku.</td>";
							echo "</tr>";
							$ukupna_kvota *= $red1['kvota'];
						}
						$selekt = mysqli_query($konekcija, "SELECT uplata FROM tiketi WHERE tiket_id = ".$_POST['id']);
						$red = mysqli_fetch_array($selekt);
						echo '<tr><td colspan="4" style="background-color:darkred;"></td></tr>';
						echo '<tr><td colspan="5">Ukupna kvota:</td>   <td>'.$ukupna_kvota.'</td></tr>';
						echo '<tr><td colspan="5">Uplata:</td>   <td>'.$red['uplata'].'</td></tr>';
						echo '<tr><td colspan="5">Mogući dobitak:</td>   <td>'.$red['uplata']*$ukupna_kvota.'</td></tr>';
						echo '</table>';
					}
					else
					{
						echo '<form action="status_tiketa.php" method="POST">';
						echo 'Unesi šifru tiketa: <input type="text" id="textbox" name="id"></input>';
						echo '<input type="submit" id="dugme" value="Pregledaj tiket"></input>';
						echo '</form>';
					}
				?>
			<br>
			<a href="index.php">  
			<input style="float:right;" type="button" id="dugme" value="Povratak na predhodnu stranicu">
			</a>
		</div>
	</body>
</html>