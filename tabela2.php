<?php
$tak=$_GET["tak"];
$dat=$_GET["dat"];
$spo=$_GET["spo"];
$kol=$_GET["kol"];

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
  
if($dat!=-1 && $tak!=-1)
{
	echo "<tr>";
		$selekt = mysqli_query($konekcija, "SELECT DISTINCT(oznaka_vrste_igre), v.opis FROM vrste_igara v JOIN tipovi t USING (oznaka_vrste_igre) ORDER BY tip_id");
		while($red = mysqli_fetch_array($selekt))
		{
			$selekt1 = mysqli_query($konekcija, "SELECT COUNT(tip_id) as 'broj' FROM tipovi WHERE oznaka_vrste_igre = '".$red['oznaka_vrste_igre']."'");
			$red1 = mysqli_fetch_array($selekt1);
			echo '<th colspan="'.$red1['broj'].'"><a title="'.$red['opis'].'">'.$red['oznaka_vrste_igre'].'</a></th>';
		}
	echo "</tr>";
	
	
	echo "<tr>";
		$selekt = mysqli_query($konekcija, "SELECT DISTINCT(oznaka_vrste_igre), v.opis FROM vrste_igara v JOIN tipovi t USING (oznaka_vrste_igre) ORDER BY tip_id");
		while($red = mysqli_fetch_array($selekt))
		{
			$selekt1 = mysqli_query($konekcija, 'SELECT opis, oznaka FROM tipovi WHERE oznaka_vrste_igre = "'.$red['oznaka_vrste_igre'].'"');
			while($red1 = mysqli_fetch_array($selekt1))
				echo '<td style="white-space: nowrap;"><a title="'.$red1['opis'].'">'.$red1['oznaka'].'</a></td>';
		}
	echo "</tr>";
	
	
	$selekt = mysqli_query($konekcija, "SELECT utakmica_id FROM utakmice JOIN rubrike USING (rubrika_id) WHERE takmičenje_id=".$tak." AND datum_početka='".$dat."' AND rezultat IS NULL ORDER BY šifra_utakmice");
	while($red = mysqli_fetch_array($selekt))
	{
		echo "<tr>";
		$selekt1 = mysqli_query($konekcija, "SELECT DISTINCT(oznaka_vrste_igre), v.opis FROM vrste_igara v JOIN tipovi t USING (oznaka_vrste_igre) ORDER BY tip_id");
		while($red1 = mysqli_fetch_array($selekt1))
		{
			$selekt2 = mysqli_query($konekcija, 'SELECT tip_id FROM tipovi WHERE oznaka_vrste_igre = "'.$red1['oznaka_vrste_igre'].'"');
			while($red2 = mysqli_fetch_array($selekt2))
			{
				$selekt3 = mysqli_query($konekcija, 'SELECT kvota, igra_id FROM igre WHERE utakmica_id = '.$red['utakmica_id'].' AND tip_id = '.$red2['tip_id']);
				if($red3 = mysqli_fetch_array($selekt3))
				{
					$id=$red3['igra_id'];
					echo "<td class='celije' id='".$id."' value='".$id."' onclick='dodaj(".$id.");'>".$red3['kvota']."</td>";
				}
				else
					echo "<td style='background-color: darkred;'></td>";
			}
		}
		echo "</tr>";
	}
}

?>	