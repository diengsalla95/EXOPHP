<?php
set_time_limit(0);
session_start();
?>
<!DOCTYPE html>
<html>
    <title>EXERCICES</title>
    <head>
        <LInk href="style.css" rel="stylesheet"></LInk>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="sliderengine/jquery.js"></script>
        <script src="sliderengine/amazingslider.js"></script>
        <link rel="stylesheet" type="text/css" href="sliderengine/amazingslider-1.css">
        <script src="sliderengine/initslider-1.js"></script>
          <link rel="stylesheet" type="text/css" href="css.css">
    </head>
    <body>
    <!-- div principal -->
    <div class="container">
            <!-- en tete -->
        <div class="tete"><h3> EXERCICES </h3></div>
            <!-- Menu -->
        <div>
            <ul class="ul">
                <li ><a href="exercice1.php" class="li a" > Exercice 1</a></li>
                <li><a href="exercice2.php" class="li a">Exercice 2</a></li>
                <li class="active"><a href="#contact" class="li a">Exercice3</a></li>
                <li><a href="#contact" class="li a">Exercice 4</a></li>
                <li><a href="#" class="li a">Exercice 5</a></li>
            </ul>
        </div>
        <div style="background-color: grey">        
            <form method="post">
                <fieldset>
                    <center><legend>Exercice 1</legend></center>
                        <p><input type="texte" name="valeur" placeholder="Donnez un nombre sup a 10.000" value=""></p>
                        <p><input type="submit" value="VALIDER" class="valider"/></p>

                </fieldset>
            </form>

        </div>
        <div class="result">
          <div class="inf">
            <h3 class="inf1"> TABLEAU DES NOMBRES INFERIEURS A LA MOYENNE </h3>
            <div class="inf2">
          <?php
  if (isset($_POST['valeur']) && is_numeric($_POST['valeur']) && $_POST['valeur']>10000) {
    $valeur=$_POST['valeur'];
    
    $tabNombrePremier=array();
    for ($compteur=1; $compteur <=$valeur; $compteur++) { 
      if (estNombrePremier($compteur)) {
        array_push($tabNombrePremier, $compteur);
      }
    }
    
      if(empty($_GET['page'])){
      $page=1;
      }
      else{
      $page=$_GET['page'];
      }
      
      //tableauNombre($tabNombrePremier,$start,$per_page,$page,$pages);
      ?>
    <?php
    $tabInfSup['inferieur']=array();
    $tabInfSup['superieur']=array();
    foreach ($tabNombrePremier as $value) {
      if($value<moyenne($tabNombrePremier)){
        array_push($tabInfSup['inferieur'], $value);
      }
      else{
        array_push($tabInfSup['superieur'], $value);
      }
    }
    $per_page =100;//define how many games for a page
      $count = count($tabInfSup['inferieur']);
      $pages = ceil($count/$per_page);
      $start = ($page - 1) * $per_page;
    ?>
    <?php
      tableauNombre($tabInfSup['inferieur'],$start,$per_page,$page,$pages);
    ?>
    <?php
  }
  else{
    if (isset($_SESSION['valeur'])) {
    $valeur=$_SESSION['valeur'];
   
    $tabNombrePremier=array();
    for ($compteur=1; $compteur <=$valeur; $compteur++) { 
      if (estNombrePremier($compteur)) {
        array_push($tabNombrePremier, $compteur);
      }
    }
    ?>
      <?php
      if(empty($_GET['page'])){
      $page="1";
      }
      else{
      $page=$_GET['page'];
      }
      
     // tableauNombre($tabNombrePremier,$start,$per_page,$page,$pages);
      ?>
    <?php
    $tabInfSup['inferieur']=array();
    $tabInfSup['superieur']=array();
    foreach ($tabNombrePremier as $value) {
      if($value<moyenne($tabNombrePremier)){
        array_push($tabInfSup['inferieur'], $value);
      }
      else{
        array_push($tabInfSup['superieur'], $value);
      }
    }
    $per_page =100;//define how many games for a page
      $count = count($tabInfSup['inferieur']);
      $pages = ceil($count/$per_page);
      $start = ($page - 1) * $per_page;
    ?>
    <?php
      tableauNombre($tabInfSup['inferieur'],$start,$per_page,$page,$pages);
    ?>
    <?php
    }

  }?>
            </div>
          </div>
          <div class="sup">
            <h3 class="sup1"> TABLEAU DES NOMBRES SUPERIEURS A LA MOYENNE </h3>
            <div class="sup2">
            <?php
  if (isset($_POST['valeur']) && is_numeric($_POST['valeur']) && $_POST['valeur']>10000) {
    $valeur=$_POST['valeur'];
    $_SESSION['valeur']=$valeur;
    $tabNombrePremier=array();
    for ($compteur=1; $compteur <=$valeur; $compteur++) { 
      if (estNombrePremier($compteur)) {
        array_push($tabNombrePremier, $compteur);
      }
    }
    
      if(empty($_GET['page'])){
      $page="1";
      }
      else{
      $page=$_GET['page'];
      }
      
      //tableauNombre($tabNombrePremier,$start,$per_page,$page,$pages);
      ?>
    <?php
    $tabInfSup['inferieur']=array();
    $tabInfSup['superieur']=array();
    foreach ($tabNombrePremier as $value) {
      if($value<moyenne($tabNombrePremier)){
        array_push($tabInfSup['inferieur'], $value);
      }
      else{
        array_push($tabInfSup['superieur'], $value);
      }
    }
    $per_page =100;//define how many games for a page
      $count = count($tabInfSup['superieur']);
      $pages = ceil($count/$per_page);
      $start = ($page - 1) * $per_page;
    ?>
    <?php
      tableauNombre($tabInfSup['superieur'],$start,$per_page,$page,$pages);
    ?>
    <?php
  }
  else{
    if (isset($_SESSION['valeur'])) {
    $valeur=$_SESSION['valeur'];
   
    $tabNombrePremier=array();
    for ($compteur=1; $compteur <=$valeur; $compteur++) { 
      if (estNombrePremier($compteur)) {
        array_push($tabNombrePremier, $compteur);
      }
    }
    ?>
      <?php
      if(empty($_GET['page'])){
      $page="1";
      }
      else{
      $page=$_GET['page'];
      }
      ?>
    <?php
    $tabInfSup['inferieur']=array();
    $tabInfSup['superieur']=array();
    foreach ($tabNombrePremier as $value) {
      if($value<moyenne($tabNombrePremier)){
        array_push($tabInfSup['inferieur'], $value);
      }
      else{
        array_push($tabInfSup['superieur'], $value);
      }
    }
    $per_page =100;//define how many games for a page
      $count = count($tabInfSup['superieur']);
      $pages = ceil($count/$per_page);
      $start = ($page - 1) * $per_page;
    ?>
    <?php
      tableauNombre($tabInfSup['superieur'],$start,$per_page,$page,$pages);
    ?>
    <?php
    }

  }?>       </div>
          </div>
        </div>
    </div>
    </head>
    <body>
      <?php
    function estNombrePremier($val){
    if ($val==2 || $val==1) {
      return true;
    }
    else{
      $i=2;
      $valSur2=(int)($val/2);
      while ( $i<=$valSur2 && ($val%$i)!=0) {
        $i++;
      }
      if (($val%$i)==0) {
        return false;
      }
      else{
        return true;
      }
    } 
  
  }
   ?>
   <?php
   function tableauNombre($tabNombrePremier,$start,$per_page,$page,$pages){
    ?>
    <table style="margin-left: 20%">
      <?php
      for ($i=$start; $i < $per_page*$page; $i+=10) { 
        ?>
        <tr>
          <?php
          for ($j=$i; ($j < $i+10 and $j<count($tabNombrePremier)); $j++) { 
            ?>
            <td style="border:2px solid blue"><?php echo $tabNombrePremier[$j];?></td>
            <?php
          }
          ?>
        </tr>
        <?php 
      }
      ?>
    </table>
    
        <?php
        //Show page links
        for ($i = 1; $i <=$pages; $i++)
          {?>
            <?php 
          echo '<a href="?page='.$i.'">'.$i.'</a>';
          ?>
          <?php           
          }
  }
?>
<?php
function moyenne($tab){
    $somme=0;
    foreach ($tab as $value) {
      $somme+=$value;
    }
    return $somme/count($tab);
  }
  ?>