<?php
$tiket=$_GET['tiket'];
$igra=$_GET['igra'];


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

$igre=explode(",", $tiket);

$selekt = mysqli_query($konekcija, "SELECT utakmica_id FROM igre WHERE igra_id = ".$igra);
$red = mysqli_fetch_array($selekt);
$utak = $red['utakmica_id'];

$ima = false;

for($i=0;$i<count($igre) && $igre[$i]!="";$i++)
{
	$selekt = mysqli_query($konekcija, "SELECT utakmica_id FROM igre WHERE igra_id = ".$igre[$i]);
	$red = mysqli_fetch_array($selekt);
	$u = $red['utakmica_id'];
	if($u==$utak)
	{
		echo $igra." ";
		$ima = true;
	}
	else
		echo $igre[$i]." ";
}
if($ima == false)
	echo $igra." ";
?>