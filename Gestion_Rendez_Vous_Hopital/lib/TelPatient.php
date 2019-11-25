<?php
    /*
    require '../vendor/autoload.php';
    use App\Controller\ControllerPatient;
    $tel_name = (string)$_POST['tel_name'];
    $result = ControllerPatient::findTelPatient((string)$_POST['tel_name']);
*/
/*
    $DB_DSN = 'mysql:host=localhost;dbname=RV_hopital';
    $DB_user = 'diahamidou';
    $DB_PASS = 'Ken_dia1995';
    $tel_name = (string)$_POST['tel_name'];
    $db = new PDO($DB_DSN, $DB_user,$DB_PASS);
    $requete = $db->prepare("SELECT num_telephone FROM patient WHERE num_telephone LIKE ':tel_name%'");
    $requete->bindValue(':tel_name', $tel_name);
    $requete->execute();
    $requete = $db->query("SELECT num_telephone,id_patient,prenom,nom FROM patient WHERE num_telephone LIKE '$tel_name%'");
    $result = $requete->fetchAll();
    */
    require '../app/Model/db_connect.php';
    $tel_name = (string)$_POST['tel_name'];
    $db = new PDO($DB_DSN, $DB_user,$DB_PASS);
    $requete = $db->query("SELECT num_telephone,id_patient,prenom,nom FROM patient WHERE num_telephone LIKE '$tel_name%'");
    $result = $requete->fetchAll();
    
    
    //var_dump($result);
    ?>
    
                                
    <?php
    foreach($result as $row)
    {
    echo '<p><a href="#" class="lien">'.$row['num_telephone'].'</a>
    <span> => '.$row['prenom'].' '.$row['nom'].'</span>
    <span hidden>' .$row['id_patient'] .'</span></p>';
    }
    ?>