<?php
$spo=$_GET["spo"];
$kol=$_GET["kol"];
$tak=$_GET["tak"];
$dat=$_GET["dat"];

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

echo '<option value="-1"> --- </option>';

$selekt = mysqli_query($konekcija,"SELECT d.ime as dom, g.ime as gos, u.utakmica_id FROM utakmice u JOIN ekipe d ON (d.ekipa_id = u.domaćin)
																			 JOIN ekipe g ON (g.ekipa_id = u.gost)
																			 JOIN rubrike USING (rubrika_id)
																			 JOIN takmičenja USING (takmičenje_id)
															 WHERE sport_id = ".$spo."
															 AND takmičenje_id = ".$tak."
															 AND kolo_id = ".$kol."
															 AND datum_početka = '".$dat."'");
while($red=mysqli_fetch_array($selekt))
	echo "<option value=".$red['utakmica_id'].">".$red['dom']." - ".$red['gos']."</option>";

?>