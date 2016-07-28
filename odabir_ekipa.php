<?php
$tak=$_GET["tak"];

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
  
$selekt = mysqli_query($konekcija,"SELECT ekipa_id, ime FROM ekipe JOIN učesnici USING (ekipa_id) WHERE takmičenje_id = ".$tak);
while($red = mysqli_fetch_array($selekt))
	echo "<option value=".$red['ekipa_id'].">".$red['ime']."</option>";

mysqli_close($konekcija);
?>