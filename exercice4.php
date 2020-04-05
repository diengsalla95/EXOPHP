<?php
set_time_limit(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title> Exercice 4</title>
</head>
<body>
<form method="post">
   <fieldset style="background-color: blue">
      <center><legend>Exercice 1</legend></center>
      <center><textarea type="texte" name="N" rows="10" cols="100" style="resize: none;"></textarea></center>
      <center><p><input type="submit" value="VALIDER" class="valider"/></p></center>
   </fieldset>
 </form>
<?php
if (!empty($_POST)){
	$N=$_POST['N'];
	$cor=corr_espace("$N");
	$texte=Rec_ph($cor);
	$textef=implode("", $texte);
	?>
	<br>
	<fieldset style="background-color: blue">
		<center><textarea style="resize: none;border: 2px solid blue" rows="10" cols="100" readonly="readonly"> <?php echo $textef;?></textarea></center></fieldset>
	<?php	
}
?>
</body>
</html>
<?php
function Rec_ph($texte){
	preg_match_all('#[A-Z]([^.!?]|([.][0-9]))*[.!?]#im',$texte,$phrase);
	$tabf=array();
	foreach ($phrase[0] as $key => $value) {
		array_push($tabf, ucfirst($value));
	}
	return $tabf;	
}
function Enlev_Esp($chaine){
	$retour="";
	for($i=0;$i<strlen($chaine);$i++){
		if(!($chaine[$i]==" ")){
			$retour.=$chaine[$i];
		}
	}
	echo $retour;
}
function corr_espace($texte){
	$texte1=trim($texte);
	$correcEspace=preg_replace('#[ ]+#',' ',$texte1);
	$correcPoint=preg_replace('#[ ]+(\.)#','.',$correcEspace);
	$correcPVirgule=preg_replace('#[ ]+(\;)#',';',$correcPoint);
	$correcVirgule=preg_replace('#[ ]+(\,)#',',',$correcPVirgule);
	$correcApos=preg_replace('#([ ]+\'|\'[ ])#','\'',$correcVirgule);
	return $correcApos;
}

function phrase_valide($phrase){
	return (preg_match('#^[A-Z]{1}[^.]{1,198}[(\.)(\!)(\?)]$#',$phrase));
}
?>