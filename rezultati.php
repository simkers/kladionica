<!DOCTYPE html>
<html>
	<head>
		<title>Unos rezultata | Kladža</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"></meta>
		<link rel="stylesheet" href="stil.css"></link>

        <script type="text/javascript">
			function rezultat()
			{
				document.getElementById("rez").innerHTML='<input type="text" id="golovi" name="gd"></input> : <input type="text" id="golovi" name="gg"></input> ( <input type="text" id="golovi" name="pgd"></input> : <input type="text" id="golovi" name="pgg"></input> ) <br> <input type="checkbox" name="kraj">Završena';
			}
			function promena()
			{
				var el1 = document.getElementById('datum');
				var datum = el1.options[el1.selectedIndex].value;
				var el2 = document.getElementById('tak');
				var tak= el2.options[el2.selectedIndex].value;
				var el3 = document.getElementById('sport');
				var sport = el3.options[el3.selectedIndex].value;
				var el4 = document.getElementById('kolo');
				var kolo= el4.options[el4.selectedIndex].value;
			
				if (window.XMLHttpRequest)
					xmlhttp=new XMLHttpRequest();
				else
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
				xmlhttp.onreadystatechange=function()
					{
						if (xmlhttp.readyState==4 && xmlhttp.status==200)
							document.getElementById("utak").innerHTML=xmlhttp.responseText;
					}
				xmlhttp.open("GET","odabir_utakmica.php?dat="+datum+"&tak="+tak+"&spo="+sport+"&kol="+kolo,true);
				xmlhttp.send();
			}
			
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
						{
							document.getElementById("tak").innerHTML=xmlhttp.responseText;
							document.getElementById("utak").innerHTML="<option value='-1'>---</option>";
						}
					}
				xmlhttp.open("GET","odabir_takmicenja.php?sp="+str,true);
				xmlhttp.send();
			}
			
			
			function odabir_dat()
			{
				var el = document.getElementById('kolo');
				var str = el.options[el.selectedIndex].value;
			
				if (window.XMLHttpRequest)
					xmlhttp1=new XMLHttpRequest();
				else
					xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
			
				xmlhttp1.onreadystatechange=function()
					{
						if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
						{
							document.getElementById("datum").innerHTML=xmlhttp1.responseText;
							document.getElementById("utak").innerHTML="<option value='-1'>---</option>";
						}
					}
				xmlhttp1.open("GET","odabir_datuma.php?kolo="+str,true);
				xmlhttp1.send();
			}
			window.onload=function()
			{
				odabir_tak();
				odabir_dat();
				promena();
			};
		</script>
	</head>
	<body>
		<div id="glavni">
			<a href="unos_u_bazu.php"> <img src="logo.png" id="logo"> </a>
		
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
			<div class="forme">
				Izaberi kolo:
					<select id="kolo" name="kolo" onchange="odabir_dat();">
					<?php
						$selekt = mysqli_query($konekcija,"SELECT kolo_id FROM kola");
						while($red = mysqli_fetch_array($selekt))
							echo "<option value=".$red['kolo_id'].">".$red['kolo_id'].". Kolo</option>";
					?>
					</select>
				Izaberi datum:
					<select id="datum" name="datum" onchange="promena();"></select>
	
				Sport:
					<select id="sport" name="sport" onchange="odabir_tak();">
						<?php
							$selekt = mysqli_query($konekcija,"SELECT sport_id, ime_sporta FROM sportovi");
							while($red = mysqli_fetch_array($selekt))
								echo "<option value=".$red['sport_id'].">".$red['ime_sporta']."</option>";
						?>
					</select>
				Takmicenje:
					<select name="takmicenje" id="tak" onchange="promena();"></select>
				<form action="unos_rezultata.php" method="POST">
					Utakmica:
						<select name="utakmica" id="utak" onchange="rezultat()";></select>
					<br>
					Rezultat utakmice:
					<div id="rez"></div>
	
					<input type="submit" id="dugme" value="Unesi"></input>
				</form>
				<br>
				<a href="unos_u_bazu.php">  
					<input type="button" id="dugme" value="Povratak na predhodnu stranicu">
				</a>
			</div>
		</div>
	</body>
</html>												