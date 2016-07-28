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
if($tak!=-1 && $dat !=-1)
{  
              echo '<tr height="50pt">
					<th>Vreme</th>
					<th>Šifra</th>
					<th></th>
					<th width = "100">Takmičenje</th>
					<th width = "300">Utakmica</th>
					</tr>';

		$selekt = mysqli_query($konekcija, "SELECT u.utakmica_id, u.vreme_početka, u.šifra_utakmice, d.ime_države, t.ime AS 'tak', e1.ime AS 'dom', e2.ime AS 'gos' 
											FROM utakmice u 
											JOIN rubrike USING (rubrika_id) 
											JOIN takmičenja t USING (takmičenje_id)
											JOIN države d USING(država_id) 
											JOIN ekipe e1 ON(e1.ekipa_id=u.domaćin) 
											JOIN ekipe e2 ON(e2.ekipa_id=u.gost)
                                            WHERE t.takmičenje_id = ".$tak."
                                            AND u.datum_početka = '".$dat."'
											AND rezultat IS NULL
											ORDER BY u.šifra_utakmice");

		while($red = mysqli_fetch_array($selekt))
		{
			echo "<tr>";
			echo "<td>".$red['vreme_početka']."</td>";
			echo "<td>".$red['šifra_utakmice']."</td>";
			echo "<td>".strtoupper(substr($red['ime_države'], 0, 3))."</td>";
			echo "<td>".$red['tak']."</td>";
			echo "<td style='white-space: nowrap;'>".$red['dom']." - ".$red['gos']."</td>";
			echo "</tr>";
		}
}

?>	