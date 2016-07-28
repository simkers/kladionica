<!DOCTYPE html>
<html>
	<head>
		<title>Unos rezultata | Kladža</title>
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
				
				function prošla($tip, $gd, $gg, $pgd, $pgg)
				{
					switch ($tip)
					{
						case "KI1":
							return $gd>$gg;
							break;
						case "KI2":
							return $gd<$gg;
							break;
						case "KIX":
							return $gd==$gg;
							break;
						case "1PP1":
							return $pgd>$pgg;
							break;
						case "1PP2":
							return $pgd<$pgg;
							break;
						case "1PPX":
							return $pgd==$pgg;
							break;
						case "2DP1":
							return $gd-$pgd>$gg-$pgg;
							break;
						case "2DP2":
							return $gd-$pgd<$gg-$pgg;
							break;
						case "2DPX":
							return $gd-$pgd==$gg-$pgg;
							break;
						case "1TM11+":
							return $pgd>=1;
							break;
						case "1TM12+":
							return $pgd>=2;
							break;
						case "2TM11+":
							return $gd - $pgd >= 1;
							break;
						case "2TM12+":
							return $gd - $pgd >= 2;
							break;
						case "1TM21+":
							return $pgg>=1;
							break;
						case "1TM22+":
							return $pgg>=2;
							break;
						case "2TM21+":
							return $gg - $pgg >= 1;
							break;
						case "2TM22+":
							return $gg - $pgg >= 2;
							break;
						case "1UG1+":
							return $pgd + $pgg >= 1;
							break;
						case "1UG2+":
							return $pgd + $pgg >= 2;
							break;
						case "1UG3+":
							return $pgd + $pgg >= 3;
							break;
						case "2UG1+":
							return $gd + $gg - $pgd - $pgg >= 1;
							break;
						case "2UG2+":
							return $gd + $gg - $pgd - $pgg >= 2;
							break;
						case "2UG3+":
							return $gd + $gg - $pgd - $pgg >= 3;
							break;
						case "DP11":
							return $pgd > $pgg && $gd - $pgd > $gg - $pgg;
							break;
						case "DP22":
							return $pgd < $pgg && $gd - $pgd < $gg - $pgg;
							break;
						case "HP1":
							return $gd - 2 >= $gg;
							break;
						case "HP2":
							return $gd <= $gg - 2;
							break;
						case "SP1":
							return $gd > 0 && $gg == 0;
							break;
						case "SP2":
							return $gd == 0 && $gg > 0;
							break;
						case "DS1X":
							return $gd >= $gg;
							break;
						case "DS12":
							return $gd != $gg;
							break;
						case "DSX2":
							return $gd <= $gg;
							break;
						case "TGGGG":
							return $gd > 0 && $gg > 0;
							break;
						case "TGGNG":
							return ($gd > 0 && $gg == 0) || ($gd == 0 && $gg > 0);
							break;
						case "TGGGG3+":
							return $gd > 0 && $gg > 0 && $gd + $gg >= 3;
							break;
						case "TGGGG2+":
							return $gd >= 2 && $gg >= 2;
							break;
						case "TGG1GG":
							return $pgd > 0 && $pgg > 0;
							break;
						case "TGG2GG":
							return $gd - $pgd > 0 && $gg - $pgg > 0;
							break;
						case "VG1":
							return $pgd + $pgg > $gd - $pgd + $gg - $pgg;
							break;
						case "VG2":
							return $pgd + $pgg < $gd - $pgd + $gg - $pgg;
							break;
						case "VGX":
							return $pgd + $pgg == $gd - $pgd + $gg - $pgg;
							break;
						case "TM11+":
							return $gd >= 1;
							break;
						case "TM12+":
							return $gd >= 2;
							break;
						case "TM13+":
							return $gd >= 3;
							break;
						case "TM112GG":
							return $pgd > 0 && $gd - $pgd > 0;
							break;
						case "TM21+":
							return $gg >= 1;
							break;
						case "TM22+":
							return $gg >= 2;
							break;
						case "TM23+":
							return $gg >= 3;
							break;
						case "TM212GG":
							return $pgg > 0 && $gg - $pgg > 0;
							break;
						case "PK1-1":
							return $pgd > $pgg && $gd > $gg;
							break;
						case "PK1-X":
							return $pgd > $pgg && $gd == $gg;
							break;
						case "PK1-2":
							return $pgd > $pgg && $gd < $gg;
							break;
						case "PKX-1":
							return $pgd == $pgg && $gd > $gg;
							break;
						case "PKX-X":
							return $pgd == $pgg && $gd == $gg;
							break;
						case "PKX-2":
							return $pgd == $pgg && $gd < $gg;
							break;
						case "PK2-1":
							return $pgd < $pgg && $gd > $gg;
							break;
						case "PK2-X":
							return $pgd < $pgg && $gd == $gg;
							break;
						case "PK2-2":
							return $pgd < $pgg && $gd < $gg;
							break;
						case "UG0-1":
							return $gd + $gg <= 1;
							break;
						case "UG0-2":
							return $gd + $gg <= 2;
							break;
						case "UG2-3":
							return $gd + $gg <= 3 && $gd + $gg >= 2;
							break;
						case "UG3+":
							return $gd + $gg >= 3;
							break;
						case "UG4+":
							return $gd + $gg >= 4;
							break;
						case "UG5+":
							return $gd + $gg >= 5;
							break;
						case "UG7+":
							return $gd + $gg >= 7;
							break;
						case "UG4-6":
							return $gd + $gg >= 4 && $gd + $gg <= 6;
							break;
					}
				}
				
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
				
				$id = $_POST['utakmica'];
				$gd = $_POST['gd'];
				$gg = $_POST['gg'];
				$pgd = $_POST['pgd'];
				$pgg = $_POST['pgg'];
				
				$rez = $gd." : ".$gg." (".$pgd." : ".$pgg.")";
				
				if($gd == "" || $gg == "" || $pgd == "" || $pgg == "")
					echo "Niste popunili sva polja.";
				else
				{
					if($_POST['kraj'])
						mysqli_query($konekcija, "UPDATE utakmice SET rezultat =  '".$rez."', završena = true WHERE utakmica_id = ".$id);
					else
						mysqli_query($konekcija, "UPDATE utakmice SET rezultat =  '".$rez."', završena = false WHERE utakmica_id = ".$id);
					if (mysqli_errno($konekcija))
						echo "Neuspešno unošenje u bazu. Greška: " . mysqli_error($konekcija);
					else
						echo "Uspešno unesena promena rezultata.";
				}
				if ($_POST['kraj'])
				{
					$selekt = mysqli_query($konekcija, "SELECT igra_id, CONCAT(oznaka_vrste_igre, oznaka) as tip FROM igre JOIN tipovi USING (tip_id) WHERE utakmica_id = ".$id);
					while($red = mysqli_fetch_array($selekt))
						mysqli_query($konekcija, "UPDATE igre SET prošla =  ".prošla($red['tip'], $gd, $gg, $pgd, $pgg)." WHERE igra_id = ".$red['igra_id']);
				}
				mysqli_close($konekcija);
				?>
				
				<br>
				<a href="rezultati.php">  
					<input type="button" id="dugme" value="Povratak na predhodnu stranicu">
				</a>
			</div>
		</div>
	</body>
</html>