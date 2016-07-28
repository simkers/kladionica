<!DOCTYPE html>
<html>
	<head>
		<title>Unos države | Kladža</title>
		<link rel="stylesheet" href="stil.css">
	</head>
	
	<body>
		<div id="glavni">
			<a href="index.php">   
			<img src="logo.png" id="logo"> 
			</a>
			
			<div class="forme">
				
				<?php
				session_start();
				if(isset($_SESSION['un']))
					header("location:unos_u_bazu.php");
				else
				{
					if(isset($_POST['un']))
					{
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
							
						$username=$_POST['un']; 
						$password=$_POST['pw']; 
						
						$selekt = mysqli_query($konekcija, 'SELECT * FROM admini WHERE korisničko_ime = "'.$username.'" AND lozinka = "'.$password.'"');
						
						if($red = mysqli_fetch_array($selekt))
						{
							$_SESSION['un'] = $username;
							header("location:unos_u_bazu.php");
						}
						else
							echo "Pogrešni podaci.";
							
						mysqli_close($konekcija); 
					}
					else
					{
						echo '<form method="POST" action="login.php">
								Korisničko ime: <input name="un" type="text" id="textbox">
								<br>
								Lozinka: <input name="pw" type="password" id="textbox">
								<br>
								<input type="submit" id="dugme" value="Potvrdi">
							</form>';
					}
				}
				?>
				
				<br>
				<a href="index.php">  
				<input type="button" id="dugme" value="Povratak na predhodnu stranicu">
				</a>
			</div>
		</div>
	</body>
</html>