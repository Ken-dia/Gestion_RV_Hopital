<?php
function afficherTableRV($listesRV)
{
    echo '<th>Nom Patient</th><th>Date RV</th><th>Heure RV</th><th>Nom Medecin</th><th>Nom Secretaire</th><th colspan ="2">Actions</th>';
    foreach($listesRV as $RV)
    {
        ?><tr>
        <?php
        echo '<td>'.$RV['prenom_patient'].' '.$RV['nom_patient'].'</td><td>'.$RV['date_RV'].'</td><td>'
        .$RV['heure_RV'].'</td><td>'.$RV['prenom_medecin'].' '.$RV['nom_medecin'].'</td><td>'.$RV['prenom_secretaire'].' '.$RV['nom_secretaire'].'</td>';
        echo '<td><a href="index.php?action=deleteRV&amp;id='.$RV['id_RV'].'"><i class="fa fa-trash-o fa-1x" aria-hidden="true"></a></td>';
        echo '<td><a href="index.php?action=RVUpdate&amp;id='.$RV['id_RV'].'"><i class="fa fa-pencil-square-o fa-1x" aria-hidden="true"></i></a></td>';
        ?> </tr>
        <?php
    }
}
function afficherTablePatient(array $listesPatient)
{
    foreach($listesPatient as $patient)
    {
        echo '<tr>';
        echo '<td>'.$patient['nom'].'</td><td>'.$patient['prenom'].'</td><td>'
        .$patient['dateNaiss'].'</td><td>'.$patient['num_telephone'].'</td><td>'.$patient['email'].'</td>';
        echo '<td><a href="index.php?action=deletePatient&amp;id='.$patient['id_patient'].'"><i class="fa fa-trash-o fa-1x" aria-hidden="true"></a></td>';
        echo '<td><a href="index.php?action=patientUpdate&amp;id='.$patient['id_patient'].'"><i class="fa fa-pencil-square-o fa-1x" aria-hidden="true"></i></a></td>';
        echo '</tr>';

    }
}
function afficherTableSecretaire(array $listesSecretaire)
{
    foreach($listesSecretaire as $secretaire)
    {
        ?><tr>
            <?php
        echo '<td>'.$secretaire['nom'].'</td><td>'.$secretaire['prenom'].'</td><td>'
        .$secretaire['num_telephone'].'</td><td>'.$secretaire['email'].'</td>';
        echo '<td><a href="index.php?action=deleteSecretaire&amp;id='.$secretaire['id_secretaire'].'"><i class="fa fa-trash-o fa-1x" aria-hidden="true"></a></td>';
        echo '<td><a href="index.php?action=SecretaireUpdate&amp;id='.$secretaire['id_secretaire'].'"><i class="fa fa-pencil-square-o fa-1x" aria-hidden="true"></i></a></td>';
        ?> </tr>
        <?php

    }    
}
function afficherTableMedecin(array $listeMedecin)
{
  echo  '<th>Nom</th><th>Prenom</th><th>N° Telephone</th><th>Email</th><th>Nom Service</th><th colspan ="2">Actions</th>';
    foreach($listeMedecin as $medecin)
    {
        echo '<tr>';
        echo '<td>'.$medecin['nom_medecin'].'</td><td>'.$medecin['prenom'].'</td><td>'
        .$medecin['num_telephone'].'</td><td>'.$medecin['email'].'</td><td>'.$medecin['nom_service'].'</td>';
        echo '<td><a href="index.php?action=deleteMedecin&amp;id='.$medecin['id_medecin'].'"><i class="fa fa-trash-o fa-1x" aria-hidden="true"></a></td>';
        echo '<td><a href="index.php?action=medecinUpdate&amp;id='.$medecin['id_medecin'].'"><i class="fa fa-pencil-square-o fa-1x" aria-hidden="true"></i></a></td>';
        echo '</tr>';
    }
}
function afficherTableServices($listesService)
{
    foreach($listesService as $service)
    {
        echo '<tr>';
            echo '<td>'.$service['nom'].'</td><td>'.$service['nom_secretaire'].'</td><td>'.$service['prenom_secretaire'].'</td>';
            echo '<td><a href="index.php?action=deleteService&amp;id='.$service['id_specialite'].'"><i class="fa fa-trash-o fa-1x" aria-hidden="true"></a></td>';
            echo '<td><a href="index.php?action=serviceUpdate&amp;id='.$service['id_specialite'].'"><i class="fa fa-pencil-square-o fa-1x" aria-hidden="true"></i></a></td>';
        echo '</tr>';
    }
}
function afficherTablePlannig(array $listesPlanning)
{
    echo '<th>Nom Medecin</th><th>Date RV</th><th>Heure RV</th><th>Nom Patient</th>';
    foreach($listesPlanning as $planning)
    {
        echo '<tr>';
        echo '<td>'.$planning['prenom_medecin'].' '.$planning['nom_medecin'].'</td>';
        echo '<td>'.$planning['date_RV'].'</td>';
        echo '<td>'.$planning['heure_RV'].'</td>';
        echo '<td>'.$planning['prenom_patient'].' '.$planning['nom_patient'].'</td>';
        echo '</tr>';
    }
}
function afficherTableUser(array $listesUser)
{
    echo '<th>Id</th><th>Profil</th><th colspan="2">Actions</th>';
    foreach($listesUser as $user)
    {
        echo '<tr>';
        echo '<td>'.$user['id_user'].'</td><td>'.$user['profil'].'</td>';
        echo '<td><a href="index.php?action=deleteUser&amp;id_user='.$user['id_user'].'"><i class="fa fa-trash-o fa-1x" aria-hidden="true"></a></td>';
        echo '<td><a href="index.php?action=userUpdate&amp;id_user='.$user['id_user'].'"><i class="fa fa-pencil-square-o fa-1x" aria-hidden="true"></i></a></td>';
        echo '</tr>';
    }
    
}
/*
function findTimeValide($heure_RV)
{
    $tabHeureValide =['08:00','08:15','08:30','08:45','09:00','09:15','09:30','09:45','10:00','10:15','10:30','10:45',
    '11:00','11:15','11:30','11:45','12:00','12:15','12:30','12:45','15:00','15:15','15:30','15:45',
    '16:00','16:15','16:30','16:45'
    ];
    foreach($tabHeureValide as $valeur)
    {
        if($valeur === $heure_RV)
        {
            
            $bol = 0;
            break;
        }
        else
        {
            $bol = 1;
        }
    }
    return $bol;
}
function findDateValide($date_Rv)
{
    $today = getdate();
    $mondate = explode('-',$date_Rv);
    if($today['year']<= (int)$mondate[0])
    {
        if($today['mon'] <= (int)$mondate[1])
        {
            if($today['mday']<= (int)$mondate[2])
            {
                $bol = 0;
            }
            else
            {
                $bol = 1;
            }
        }
        else
        {
            $bol = 1;
        }
    }
    else
    {
        $bol = 1;
    }
    return $bol;
   
}
 */
?>