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
			<table style="width: 100%">
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
						
					$s = $_POST['tiket'];
					
					$tiket = explode(",", $s);
					$ukupna_kvota = 1;
					
					echo '<tr style="width: 100%">';
					echo "<th>Šifra</th>";
					echo "<th>Utakmica</th>";
					echo "<th>Tip</th>";
					echo "<th>Kvota</th>";
					echo "</tr>";
					
					for($i = 0; $i < count($tiket) && is_numeric($tiket[$i]); $i++)
					{
						echo '<tr>';
						$selekt = mysqli_query($konekcija, "SELECT šifra_utakmice, 
																	CONCAT(CONCAT(d.ime, ' - '), g.ime) as utak,
																	CONCAT(CONCAT(oznaka_vrste_igre, ' '), oznaka) as tip, 
																	kvota 
															FROM igre JOIN utakmice USING (utakmica_id) 
																	JOIN ekipe d ON (d.ekipa_id = domaćin) 
																	JOIN ekipe g ON (g.ekipa_id = gost) 
																	JOIN tipovi USING (tip_id)
															WHERE igra_id = ".$tiket[$i]);
						$red = mysqli_fetch_array($selekt);
						echo "<td>".$red['šifra_utakmice']."</td>
							<td>".$red['utak']."</td>
							<td>".$red['tip']."</td>
							<td>".$red['kvota']."</td>";
						echo "</tr>";
						$ukupna_kvota *= $red['kvota'];
					}
					echo '<tr><td colspan="4" style="background-color:darkred;"></td></tr>
					      <tr><td colspan="3">Ukupna kvota:</td>   <td>'.$ukupna_kvota.'</td></tr>';
				?>
			</table>
			<br><br>
			<form action="index.php" method="POST" style="width:100%; font-size: 14pt;">
				<?php
					echo '<input name="tiket" type="hidden" value="'.implode(",", $tiket).'"></input>';
				?>
				Uplata: <input id="textbox" type="text" name="uplata"></input>
				<br>
				<input style="float:right;" id="dugme" type="submit" value="Potvrdi tiket">
			</form>
			<br><br><br>
			<a href="index.php">  
			<input style="float:right;" type="button" id="dugme" value="Povratak na predhodnu stranicu">
			</a>
		</div>
	</body>
</html>