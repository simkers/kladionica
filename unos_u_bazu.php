<!DOCTYPE html>
<html>
	<head>
		<title>Unos u bazu | Kladža</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"></meta>
		<link rel="stylesheet" href="stil.css">
		<script>
			function odabir_tak()
			{
				var el = document.getElementById('sport');
				var str = el.options[el.selectedIndex].value;
				
				if (window.XMLHttpRequest)
					xmlhttp=new XMLHttpRequest();
				else
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
						document.getElementById("tak").innerHTML=xmlhttp.responseText;
			
				}
				xmlhttp.open("GET","odabir_takmicenja.php?sp="+str,true);
				xmlhttp.send();
			}
			
			function odabir_ekipa()
			{
				var el = document.getElementById('tak');
				var str = el.options[el.selectedIndex].value;
				
				if (window.XMLHttpRequest)
					xmlhttp=new XMLHttpRequest();
				else
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						var tmp = xmlhttp.responseText;
						document.getElementById('dom').innerHTML=tmp;
						document.getElementById('gos').innerHTML=tmp;
					}
				}
				xmlhttp.open("GET","odabir_ekipa.php?tak="+str,true);
				xmlhttp.send();
			}
		</script>
	</head>
	<body>
		
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
			
		
		?>
		
		<a href="rezultati.php">
			<input type="button" id="leteci_gore" value="Unos rezultata"></input>
		</a>
		
		<a href="logout.php">
			<input style="width: 15%" type="button" id="leteci_dole" value="Odjavi se"></input>
		</a>
		
		<div id="glavni">
			<a href="unos_u_bazu.php">   
			<img src="logo.png" id="logo"> 
			</a>
			
			<div class="forme">
				<form action = "kvote.php" method="POST">
					Unesi novu utakmicu: <br><br>
					Kolo:
						<select name="kolo">
							<?php
								$selekt = mysqli_query($konekcija,"SELECT kolo_id FROM kola");
								while($red = mysqli_fetch_array($selekt))
									echo "<option value=".$red['kolo_id'].">".$red['kolo_id'].". Kolo</option>";
							?>
						</select>
					Datum odigravanja: 
						<input type="date" id="datum" name = "datum_odigravanja">
					Vreme odigravanja: 
						<input type="text" id="textbox" name = "vreme_odigravanja">
					<br>
					Sport:
						<select id="sport" name="sport" onchange="odabir_tak()">
							<?php
								$selekt = mysqli_query($konekcija,"SELECT sport_id, ime_sporta FROM sportovi");
								while($red = mysqli_fetch_array($selekt))
									echo "<option value=".$red['sport_id'].">".$red['ime_sporta']."</option>";
							?>
						</select>
					Takmičenje:
						<select name="takmičenje" id="tak" onchange="odabir_ekipa()">
							<?php
								echo '<option value="">---</option>';
								$selekt = mysqli_query($konekcija,"SELECT ime, sezona, takmičenje_id FROM takmičenja WHERE sport_id = 1");
								while($red = mysqli_fetch_array($selekt))
									echo "<option value=".$red['takmičenje_id'].">".$red['ime']." ".$red['sezona']."</option>";
							?>
						</select>
					Šifra utakmice:
						<input type="text" id="textbox" name = "šifra">
					<br>
					Domaćin:
						<select name="domaćin" id="dom">
							<option value="">Izaberi takmičenje</option>
						</select>
					Gost:
						<select name="gost" id="gos">
							<option value="">Izaberi takmičenje</option>
						</select>
					<br>
					<input type="submit" id="dugme" value="Unesi">
				</form>
			</div> 
			
			
			
			
			
			<div class="forme">
				<form action = "novo_takmicenje.php" method="POST">
					Unesi novo takmičenje: <br><br>
					Ime takmičenja: 
						<input type="text" id="textbox" name = "ime">
					Sezona: 
						<input type='text' id='textbox' name = "sezona">
					Država: 
						<select name="država">
						<?php
							$selekt = mysqli_query($konekcija,"SELECT država_id, ime_države FROM države");
							while($red = mysqli_fetch_array($selekt))
								echo "<option value=".$red['država_id'].">".$red['ime_države']."</option>";
						?>
						</select>
					<br>
					Sport: 
						<select name="sport">
						<?php
							$selekt = mysqli_query($konekcija,"SELECT sport_id, ime_sporta FROM sportovi");
							while($red = mysqli_fetch_array($selekt))
								echo "<option value=".$red['sport_id'].">".$red['ime_sporta']."</option>";
						?>
						</select>
					Rang: 
						<input type="text" id="textbox" name = "rang">
					Tip takmičenja:
						<select name="tip">
							<option value="Liga">Liga</option>
							<option value="Kup">Kup</option>
							<option value="">Takmičenje iz dva dela</option>
						</select> <br>
					<input type="submit" id="dugme" value="Unesi">
				</form>
			</div>
			
			
			
			
			<div class="forme" id="mali">
				<form action = "novo_kolo.php" method="POST">
					Unesi novo kolo: <br><br>
					Datum početka: 
						<input type="date" id="datum" name = "datum_početka"> <br>
					Datum završetka: 
						<input type="date" id="datum" name = "datum_završetka"> <br>
					<input type="submit" id="dugme" value="Unesi">
				</form>
			</div> 
			
			
			
			
			
			<div class="forme" id="mali">
				<form action = "nova_drzava.php" method="POST">
					Unesi novu državu: <br><br>
					Ime: 
						<input type="text" id="textbox" name = "ime">
					<br>
					<input type="submit" id="dugme" value="Unesi">
				</form>	
			</div> 
			
			
			
			
			<div class="forme" id="mali">
				<form action = "novi_sport.php" method="POST">
					Unesi novi sport: <br><br>
					Ime: 
						<input type="text" id="textbox" name = "ime">
					<br>
					<input type="submit" id="dugme" value="Unesi">
				</form>	
			</div> 
			
			
		
			<div class="forme" id="mali">
				<form action = "nova_ekipa.php" method="POST">
					Unesi novu ekipu: <br><br>
					Ime: 
						<input type="text" id="textbox" name = "ime">
					Država: 
						<select name="država">
						<?php
							$selekt = mysqli_query($konekcija,"SELECT država_id, ime_države FROM države");
							while($red = mysqli_fetch_array($selekt))
								echo "<option value=".$red['država_id'].">".$red['ime_države']."</option>";
						?>
						</select> <br>
					<input type="submit" id="dugme" value="Unesi">
				</form>
			</div>
			
			
			
		</div>
		
		<?php
		mysqli_close($konekcija);
		?>
		
		</body>
</html>		