<?php
set_time_limit(0);
?>
<!DOCTYPE html>
<html>
    <title>EXERCICES</title>
    <head>
        <LInk href="style.css" rel="stylesheet"></LInk>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styleexo2.css">
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
           <form method="post" >
             <p> <select name="choix">
                  <option value=""> Aucun </option>
                  <option value="Francais"> Francais </option>
                  <option value="Anglais"> Anglais </option>
              </select></p>
             <p> <input type="submit" value="Valider"></p>
           </form>
        </div>
        <div class="result">
          <?php
    if (!empty($_POST)){
        $choix = $_POST['choix'];

        $tabMois=['Anglais'=>['January','February','March','April','May','June','july','August','September','October','November','December'],'Francais'=>["Janvier", "Fevrier",'Mars','Avril','Mai','Juin','juillet','Aout','Septembre','Octobre','Novembre','Decembre']];

    // $tabMois['Francais']=array("Janvier", "Fevrier",'Mars','Avril','Mai','Juin','juillet','Aout','Septembre','Octobre','Novembre','Decembre');
    // $tabMois['Anglais']=array('January', 'February','March','April','May','June','july','August','September','October','November','December');
    ?>
    <div>
    <?php
      if ($choix=='Francais') {
        echo "Les Mois de l'annee en Francais sont: ";
        ?>
            <table cellspacing="5">
            <?php
                tableauMois($tabMois['Francais']);
            ?>
            </table> 
        <?php
      }
      elseif ($choix=='Anglais') {
        echo "Les Mois de l'annee en Anglais sont: ";
        ?>
            <table>
            <?php
                tableauMois($tabMois['Anglais']);
            ?>
            </table> 
        <?php
      }
      else{
        ?>
        <table>
        <td><?php echo " Veuillez choisir une langue"; ?></td>
        </table>
        <?php
      } 
    ?><br></div>
    <?php
  }
  ?>
<?php
    function tableauMois($tabMois){
    for ($i=0; $i <count($tabMois) ; $i+=3) {
        ?>
        <tr>
        <?php
        for ($j=$i; $j <$i+3 ; $j++) {
            ?>
            <td><?php echo $j+1;?></td>
            <td><?php echo $tabMois[$j];?></td>
        <?php         
        }
        ?>
        </tr>
        <?php 
    }
  }
?>

        </div>
    </div>
   
    </body>
</html>