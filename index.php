<!DOCTYPE html>
<html>
	<head>
		<title>Kladža</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"></meta>
		<link rel="stylesheet" href="stil.css"></link>

        <script type="text/javascript">
			var tiket= new Array();
			function dodaj(id)
			{
				if (window.XMLHttpRequest)
					xmlhttp=new XMLHttpRequest();
				else
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
				xmlhttp.onreadystatechange=function()
					{
						if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							var s = xmlhttp.responseText;
							s = s.substring(0, s.indexOf("<!--"));
							tiket = s.split(" ");
							document.getElementById("tiket").value = tiket.toString();
							var celije = document.getElementsByClassName("celije");
							for(var i=0; i<celije.length; i++)
							{
								celije[i].style.background = '#CCCCCC';
								celije[i].style.color = 'black';
							}
							for(var i=0; i<tiket.length; i++)
							{
								document.getElementById(tiket[i].toString()).style.background = 'black';
								document.getElementById(tiket[i].toString()).style.color = 'white';
							}
						}
					}
				xmlhttp.open("GET","igra_na_tiketu.php?tiket="+tiket.toString()+"&igra="+id,true);
				xmlhttp.send();
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
							document.getElementById("prva").innerHTML=xmlhttp.responseText; 
					}
				xmlhttp.open("GET","tabela1.php?dat="+datum+"&tak="+tak+"&spo="+sport+"&kol="+kolo,true);
				xmlhttp.send();
					
				if (window.XMLHttpRequest)
					xmlhttp2=new XMLHttpRequest();
				else
						xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
			
				xmlhttp2.onreadystatechange=function()
					{
						if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
							document.getElementById("druga").innerHTML=xmlhttp2.responseText;
					}
				xmlhttp2.open("GET","tabela2.php?dat="+datum+"&tak="+tak+"&spo="+sport+"&kol="+kolo,true);
				xmlhttp2.send();
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
							document.getElementById("tak").innerHTML=xmlhttp.responseText;
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
							document.getElementById("datum").innerHTML=xmlhttp1.responseText;
					}
				xmlhttp1.open("GET","odabir_datuma.php?kolo="+str,true);
				xmlhttp1.send();
			}
			window.onload=function()
			{
				tiket = new Array();
				odabir_tak();
				odabir_dat();
				promena();
			};
		</script>
	</head>
	<body>
		<div id="glavni">
			<a href="index.php"> <img src="logo.png" id="logo"> </a>
		</div>
		
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
			
			if(isset($_POST['uplata']))
			{
				$uplata=$_POST['uplata'];
				$s = $_POST['tiket'];
				$tiket = explode(",", $s);
				$selekt = mysqli_query($konekcija, "SELECT max(tiket_id) as aaa FROM tiketi");
				$red = mysqli_fetch_array($selekt);
				$tiket_id = $red['aaa'] + 1;
				mysqli_query($konekcija, "INSERT INTO tiketi (tiket_id, uplata) VALUES (".$tiket_id.", ".$uplata.")");
				for($i = 0; $i < count($tiket) && is_numeric($tiket[$i]); $i++)
					mysqli_query($konekcija, "INSERT INTO igre_na_tiketima (tiket_id, igra_id) VALUES (".$tiket_id.", ".$tiket[$i].")");
				echo "<p> ID vašeg tiketa je ".$tiket_id.".</p>";
			}
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
			Takmičenje:
				<select name="takmičenje" id="tak" onchange="promena();"></select>
		</div>
		<div class="tabela" id="tprva">
			<table id="prva">
			</table>
		</div>
		
		<div class="tabela" id="tdruga">
			<table id="druga">
			</table>
		</div>
		
		<a href="status_tiketa.php">
			<input type="submit" id="leteci_gore" value="Status tiketa"></input>
		</a>
		
		<a href="login.php">
			<input type="submit" id="levo" value="Za administratora"></input>
		</a>
		
		<form action="tiket.php" method="POST">
			<input type="hidden" name="tiket" id="tiket"></input>
			<input type="submit" id="leteci_dole" value="Pregledaj tiket"></input>
		</form>
	</body>
</html>												