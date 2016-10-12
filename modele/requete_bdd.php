<?php
include_once ('Connexion_Bdd.class.php');
function control_connexion()
{

    $bdd = Connexion::getInstance();
    $reponse = $bdd->query('SELECT * FROM user;');

    $donnees = $reponse->fetch();

    return $donnees;
}

function total_baguette($choix_mois,$choix_annee)
{
    // connexion a la base de données et requete ou l'on demande de recuperer toute les données du mois
    $bdd = Connexion::getInstance();
    // requète pour recupérer la somme des nbr_journalier
    $st2 = $bdd->query('SELECT SUM(nbr_journalier) FROM donnees WHERE date_ajout LIKE \'%'.$choix_mois.'%'.$choix_annee.'\';');
    $total = $st2->fetch();

    return $total;
}

function afficher_tableau_donnees($choix_mois,$choix_annee)
{
    // connexion a la base de données et requete ou l'on demande de recuperer toute les données du mois
    $bdd = Connexion::getInstance();
    // requète pour recuperer les nbr_journalier et en faire une liste avec graphique
    $st = $bdd->query('SELECT * FROM donnees WHERE date_ajout LIKE \'%'.$choix_mois.'%'.$choix_annee.'\' ORDER BY date_ajout;');
    // on recupère les donnée et on les affiche dans un tableau
    $tab = $st->fetchAll();


    return $tab;
}