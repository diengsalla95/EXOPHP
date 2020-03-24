<!DOCTYPE html>
<html>
<head>
	<title> tableau</title>
</head>
<body>
<form method="post">
	<input type="texte" name="N">
	<input type="submit" value="Valider">
</form>
<br>
<p> Veuillez saiair les mots</p>
<?php

if (isset($_POST['N']) and is_numeric($_POST['N']) and $_POST['N']>0) {
	$N=$_POST['N'];
	for ($i=0; $i <$N ; $i++) {
		?> 
		<form method="post">
		<input type="texte" name="M">
		</form>
		 <br>
		<?php
	}
	?>
	<form method="post">
	<input type="submit" value="valider">
	</form>
	<?php
	if (isset($_POST['valider'])) {
		foreach ($tab as $key => $value) {
			echo $value;
		}
		
		}
	}

?>
</body>
</html>