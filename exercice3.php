<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> tableau</title>
</head>
<body>
<form method="post">
  	<input type="texte" name="N" size="12" placeholder="nombre mots" value="<?php
  		if(isset($_POST['N'])){
  			echo $_POST['N'];
  		}
  		elseif(isset($_SESSION['N'])){
  			echo($_SESSION['N']);
  		}
  		?>">
 	<input type="submit" value="Valider" name="valider">
</form>
<br>
<?php
if (isset($_POST['valider'])){
	$_SESSION['N']=$_POST['N'];
	if (is_num($_POST['N'])){
	$N=$_SESSION['N'];
	}
	else{
	?>
	<button style="background-color: red"> Veuillez saisir un entier</button>
	<?php
	}
}

if(isset($_SESSION['N']) and is_num($_SESSION['N'])){
	$N=$_SESSION['N'];
	$k=0;
	for($i=0; $i <$N ; $i++) {
	?> 
		<form method="post" value="">
			<?php
			if (isset($_POST['M'][$i]) and alphaCh($_POST['M'][$i]) and comptcarac($_POST['M'][$i])<=20) {
				$k=$k+1;
				?>
			<input type="texte" name="M[]" size="12" value="<?php echo $_POST['M'][$i]; ?>" required>
			<?php
			}
			else{
			?>
	 		<input type="texte" name="M[]" size="12" required> 
			<?php
			}
			?>
		<br>
	<?php
	}
	?>
			<input type="submit" value="valider" name="valid">
	<br>
	</form>
	<?php
}
if (isset($_POST['valid']) and $k==$N){
		$tab=array();
		foreach ($_POST['M'] as $key => $value) {
			array_push($tab, $value);
		}
		echo "<br>";
     // affichage des mots du tableau dont la longueur <=20
    echo "les mots du tableau sont:";
    echo "<br>";
    foreach ($tab as $key => $value) {
    	if (comptcarac($value)<=20) {
				echo $value;
				echo "<br>";
		}
	}
	echo "<br>";
	// affichage des mots contenant la lettre m ou M
	echo "les mots contenant la lettre M sont:";
	echo "<br>";
	$n=0;
	foreach ($tab as $key => $value) {
		if(verifcarac($value)){
			echo $value;
			echo "<br>";
			$n=$n+1;
		}
	}
	echo "<br>";
	// affichage du nombre de mots contenant M ou M
	echo "le nombre de mots contenant la lettre m (M)=$n";
	echo "<br>";
	//les mots composés que de caractere alphabetique
	echo "les mots compos&eacutes que de caractere alphabetique";
	echo "<br>";
	foreach ($tab as $key => $value) {
		if(alphaCh($value)){
			echo $value;
			echo "<br>";
		}
	}
	}
?>
</body>
</html>
<?php
// renvoi la longueur du tableau
function compTab($tab){
	$c=0;
	foreach ($tab as $key => $value) {
		$c=$c+1;
	}
	return $c;
}
// compte le nombre de caractere d'une chaine
function comptcarac($carac){
	$n=0;
	for ($i=0;(isset($carac[$i])) ; $i++) { 
		$n=$n+1;
	}
	return $n;

}
// vrifie si une chaine contient la lettre M ou m
function verifcarac($carac){
	for ($i=0;(isset($carac[$i])) ; $i++) { 
		if ($carac[$i]=="m" or $carac[$i]=="M") {
			return $carac;
		}
	}

}
// verifie si une chaine est composée que de caractere alphabetique
function alphaCh($carac){
	$rep=true;
	for ($i=0;(isset($carac[$i])) ; $i++) { 
		if (($carac[$i]<"a" or $carac[$i]>"z") && ($carac[$i]<"A" or $carac[$i] >"Z")){
			$rep=false;
		}
	}
	return $rep;
}
// fonction est positif
function is_num($carac){
	$rep=true;
	for ($i=0;(isset($carac[$i])) ; $i++) { 
		if ($carac[$i]!="0" && $carac[$i]!="1" &&$carac[$i]!="2" && $carac[$i]!="3" && $carac[$i]!="4" & $carac[$i]!="5" && $carac[$i]!="6" &&$carac[$i]!="7" &&$carac[$i]!="8" && $carac[$i]!="9"){
			$rep=false;
		}
	}
	return $rep;
}

?>