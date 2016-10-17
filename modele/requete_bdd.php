<?php
include_once('Connexion_Bdd.class.php');

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

function ajout_nbr_journalier($nombre_ajoute,$date_ajout)
{
    // connexion a la base de données et requete ou l'on demande de recuperer toute les données du mois
    $bdd = Connexion::getInstance();

    //vérification des date présente dans la bdd
            $st3 = $bdd->query('SELECT date_ajout FROM donnees WHERE date_ajout = \''.$_POST['date-ajout'].'\'');
            $tab_date = $st3->fetch();

    // requète pour inserer dans la bdd les données saisi si date présente update sinon ajout

     if ($date_ajout === $tab_date['date_ajout']){
                $st = $bdd->prepare('UPDATE donnees SET nbr_journalier = :nbr_journalier WHERE date_ajout = :date_ajout;');

                $st->execute(array(
                    'nbr_journalier' => $nombre_ajoute,
                    'date_ajout' => $date_ajout,
                ));
            }else{
                $st = $bdd->prepare('INSERT INTO donnees(nbr_journalier, date_ajout) VALUES (:nbr_journalier, :date_ajout);');

                $st->execute(array(
                    'nbr_journalier' => $nombre_ajoute,
                    'date_ajout' => $date_ajout,
                ));
            };

}