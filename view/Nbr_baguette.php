<?php
    include('parts/header.php');
    require_once('../controler/controleur.php');

    
	echo "Bonjour " . $_SESSION['login']." <form method=post action=../index.php class='btn-deco'><input type='submit' value='déconnexion' class='btn-deco'></form>";
?>
<h1 class="titre_tableau" style="text-align: center">Récapitulatif nombre de baguette</h1>

    <!-- Formulaire choix date a afficher -->
<form method="get" class="form-choix-mois">
    <label for="choix-mois">Choisir le mois :</label>
    <select name="choix-mois">
        <option value="/01/" <?php if(isset($_GET['choix-mois']) AND $_GET['choix-mois'] === "/01/"){echo 'selected="selected"';} ?>>janvier</option>
        <option value="/02/" <?php if(isset($_GET['choix-mois']) AND $_GET['choix-mois'] === "/02/"){echo 'selected="selected"';} ?>>fevrier</option>
        <option value="/03/" <?php if(isset($_GET['choix-mois']) AND $_GET['choix-mois'] === "/03/"){echo 'selected="selected"';} ?>>mars</option>
        <option value="/04/" <?php if(isset($_GET['choix-mois']) AND $_GET['choix-mois'] === "/04/"){echo 'selected="selected"';} ?>>avril</option>
        <option value="/05/" <?php if(isset($_GET['choix-mois']) AND $_GET['choix-mois'] === "/05/"){echo 'selected="selected"';} ?>>mai</option>
        <option value="/06/" <?php if(isset($_GET['choix-mois']) AND $_GET['choix-mois'] === "/06/"){echo 'selected="selected"';} ?>>juin</option>
        <option value="/07/" <?php if(isset($_GET['choix-mois']) AND $_GET['choix-mois'] === "/07/"){echo 'selected="selected"';} ?>>juillet</option>
        <option value="/08/" <?php if(isset($_GET['choix-mois']) AND $_GET['choix-mois'] === "/08/"){echo 'selected="selected"';} ?>>aout</option>
        <option value="/09/" <?php if(isset($_GET['choix-mois']) AND $_GET['choix-mois'] === "/09/"){echo 'selected="selected"';} ?>>septembre</option>
        <option value="/10/" <?php if(isset($_GET['choix-mois']) AND $_GET['choix-mois'] === "/10/"){echo 'selected="selected"';} ?>>octobre</option>
        <option value="/11/" <?php if(isset($_GET['choix-mois']) AND $_GET['choix-mois'] === "/11/"){echo 'selected="selected"';} ?>>novembre</option>
        <option value="/12/" <?php if(isset($_GET['choix-mois']) AND $_GET['choix-mois'] === "/12/"){echo 'selected="selected"';} ?>>decembre</option>
    </select>

    <select name="choix-annee">
        <option value=2013 <?php if(isset($_GET['choix-annee']) AND $_GET['choix-annee'] === "2013"){echo 'selected="selected"';} ?>>2013</option>
        <option value=2014 <?php if(isset($_GET['choix-annee']) AND $_GET['choix-annee'] === "2014"){echo 'selected="selected"';} ?>>2014</option>
        <option value=2015 <?php if(isset($_GET['choix-annee']) AND $_GET['choix-annee'] === "2015"){echo 'selected="selected"';} ?>>2015</option>
        <option value=2016 <?php if(isset($_GET['choix-annee']) AND $_GET['choix-annee'] === "2016"){echo 'selected="selected"';} ?>>2016</option>
        <option value=2017 <?php if(isset($_GET['choix-annee']) AND $_GET['choix-annee'] === "2017"){echo 'selected="selected"';} ?>>2017</option>
        <option value=2018 <?php if(isset($_GET['choix-annee']) AND $_GET['choix-annee'] === "2018"){echo 'selected="selected"';} ?>>2018</option>
        <option value=2019 <?php if(isset($_GET['choix-annee']) AND $_GET['choix-annee'] === "2019"){echo 'selected="selected"';} ?>>2019</option>
        <option value=2020 <?php if(isset($_GET['choix-annee']) AND $_GET['choix-annee'] === "2020"){echo 'selected="selected"';} ?>>2020</option>
    </select>
    <input type="submit" value="choisir">
</form>

    <!-- Formulaire d'ajout de nbr baguette -->
<form method="post" class="form-ajout-chiffre">
    <label>Ajout chiffre journalier :</label>
    <input type="text" name="ajout">
    <label>Date :</label>
    <input type="text" name="date-ajout" id="date-ajout">
    <input type="submit" value="ajouter">
</form>

    <h2 class="total_mois" style="text-align: right;">Total du mois : <?=$total['0']?></h2>

<div class="donnees-afficher">
    <?php
                // boucle pour parcourir le tableau et l'afficher
            foreach ($tab as $value){
    ?>
                <span><?php echo $value['date_ajout']; ?></span>
                <div style="width:<?php echo $value['nbr_journalier']; ?>px;">
                    <?php echo $value['nbr_journalier']; ?>
                </div><br>
    <?php
        }
    ?>
</div>
    <?php 

    if (isset($_SESSION['flash']) != "") {
        echo $_SESSION['flash'];
        unset($_SESSION['flash']);
    };    
      
    ?>
    

    <!-- scripte pour le calendrier -->
<script type="text/javascript">
	$(function() {
    	$( "#date-ajout" ).datepicker({
		    firstDay: 1 ,
		    dateFormat: 'dd/mm/yy',
		    monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
    		dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S']
		});
		  	});
</script>