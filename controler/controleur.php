<?php

if(empty($_GET['choix-mois'])) {
    require_once('modele/requete_bdd.php');
}else{
    require_once('../modele/requete_bdd.php');
};

// Controle de connexion
if (isset($_POST['login']) && isset($_POST['mot_de_passe']) && isset($_POST['code_securite'])) {

    $donnees = control_connexion();

    $login = $_POST['login'];
    $mdp = $_POST['mot_de_passe'];
    $code_secu = $_POST['code_securite'];

    if($login === $donnees['login'] && $mdp === $donnees['mdp'] && $code_secu === $donnees['naissance'] ){
        
        $_SESSION['login'] = $donnees['login'];
        header('Location: view\Nbr_baguette.php?choix-mois=%2F'.date('m').'%2F&choix-annee='.date('Y'));
    }else{
        
        echo "<p class='alert'>Erreur de connexion</p>";
        
    }
};

// Selection du mois a afficher
if (isset($_GET['choix-mois'])&& isset($_GET['choix-annee'])) {

    $total = total_baguette($_GET['choix-mois'], $_GET['choix-annee']);
    $tab = afficher_tableau_donnees($_GET['choix-mois'], $_GET['choix-annee']);

    foreach ($tab as $cle => $value){
        $tab[$cle]['date_ajout'] = $value['date_ajout'];
        $tab[$cle]['nbr_journalier'] = $value['nbr_journalier'];
    }
}


// si le formulaire ajout nbr est bien rempli
if (isset($_POST['ajout']) && isset($_POST['date-ajout']) && !empty($_POST['ajout']) && !empty($_POST['date-ajout']) && preg_match("#^[0-9]{0,5}$#",$_POST['ajout'])) {

    ajout_nbr_journalier($_POST['ajout'],$_POST['date-ajout']);          

    //redirection sur graphique du mois qui as eté modifié.
    $date = explode('/',$_POST['date-ajout']);
    header('Location: Nbr_baguette.php?choix-mois=%2F'.$date[1].'%2F&choix-annee='.$date[2]);

}elseif (isset($_POST['ajout']) && isset($_POST['date-ajout']) && !empty($_POST['ajout']) && !empty($_POST['date-ajout']) && preg_match("#[a-zA-Z]#",$_POST['ajout'])){
        $_SESSION['flash'] = "<p>MERCI DE RENTRER UN NOMBRE VALIDE !!</p>";
};
