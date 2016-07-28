<?php
$sp=$_GET["sp"];

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

$selekt = mysqli_query($konekcija,"SELECT ime, sezona, takmičenje_id FROM takmičenja WHERE sport_id = ".$sp);
while($red=mysqli_fetch_array($selekt))
	echo "<option value=".$red['takmičenje_id'].">".$red['ime']." ".$red['sezona']."</option>";

?>