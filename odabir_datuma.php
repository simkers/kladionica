<?php
$kolo=$_GET["kolo"];

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
  
$selekt = mysqli_query($konekcija,"SELECT datum_početka, datum_završetka FROM kola WHERE kolo_id = ".$kolo);
$red=mysqli_fetch_array($selekt);

echo '<option value = "-1"> --- </option>';

for($i=$red['datum_početka']; $i<=$red['datum_završetka']; $i++)
{
     echo '<option value = '.$i.'> '.date(  "d.m.Y.", strtotime($i)).' </option>';
}

mysqli_close($konekcija);

?>	