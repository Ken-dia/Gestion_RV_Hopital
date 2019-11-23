<?php
require 'vendor/autoload.php';
use App\Tables\{
    User,
    Medecin,
    Patient,
    Service,
    RendezVous,
    Secretaire,
    Specialite
};
use App\Controller\{
    ControllerMedecin,
    ControllerPatient,
    ControllerService,
    ControllerRV,
    ControllerSecretaire,
    ControllerSpecialite,
    GererUser
};

try
{
    if(isset($_GET['action']))
    {
        //SECRETAIRE
        if($_GET['action'] == 'ajoutSecretaire')
        {
            require('vue/backend/viewAddSecretaire.php');
        }
        elseif($_GET['action'] == 'addSecretaire' || $_GET['action']== 'updateSecretaire')
        {
        
            $secretaire = new Secretaire([
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom'],
                'num_telephone'=> $_POST['tel'],
                'email'=> $_POST['email'],
    
            ]);
            if($_GET['action'] == 'addSecretaire')
            {
                ControllerSecretaire::addSecretaire($secretaire);
            }
            else
            {
                $secretaire->setId_secretaire($_POST['id']);
                ControllerSecretaire::updateSecretire($secretaire);
            }
            
        }
        elseif($_GET['action'] == 'listesSecretaire')
        {
            ControllerSecretaire::listesSecretaire($index = 1);
            
    
        }
        
        elseif(($_GET['action']== 'deleteSecretaire' || $_GET['action']== 'SecretaireUpdate') && isset($_GET['id']))
        {
            if($_GET['action']== 'deleteSecretaire')
            {
                require_once('lib/roleAdmin.php');
                $id = (int) $_GET['id'];
                ControllerSecretaire::deleteSecretaire($id);
            }
            else
            {
                ControllerSecretaire::listeSecretaire((int) $_GET['id']);
            }
        }
        elseif($_GET['action'] == 'searchSecretaire' && isset($_POST['mot']))
        {
            ControllerSecretaire::searchSecretaire($_POST['mot']);
        }
    
    
        //PATIENT
        elseif($_GET['action'] == 'ajoutPatient')
        {
            require('vue/backend/viewAddPatient.php');
        }
        elseif($_GET['action'] == 'addPatient' || $_GET['action'] == 'updatePatient')
        {
            $patient = new Patient([
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom'],
                'dateNaiss'=>$_POST['dateNaiss'],
                'num_telephone'=> $_POST['tel'],
                'email'=> $_POST['email'],
            ]);
            if($_GET['action'] == 'updatePatient')
            {
                $patient->setId_patient($_POST['id_patient']);
                ControllerPatient::updatePatient($patient);
            }
            else
            {
                ControllerPatient::addPatient($patient);
            }
            
        }
        elseif($_GET['action'] == 'listesPatient')
        {
            ControllerPatient::listesPatient($index = 1);
            
    
        }
        elseif(($_GET['action']== 'deletePatient' || $_GET['action']== 'patientUpdate') && isset($_GET['id']))
        {
            if($_GET['action']== 'deletePatient')
            {
                require_once('lib/roleAdmin.php');
                ControllerPatient::deletePatient($_GET['id']);
            }
            else
            {
                ControllerPatient::listePatient($_GET['id']);
            }
        }
        elseif($_GET['action'] == 'findPatient' && isset($_POST['mot']))
        {
            ControllerPatient::findPatient($_POST['mot']);
        }
        //SERVICE
        elseif($_GET['action'] == 'addService' || $_GET['action'] == 'updateService')
        {
            $service = new Service([
                'nom_service'=> $_POST['specialite'],
                'id_secretaire'=> (int)$_POST['secretaire']
            ]);
            if($_GET['action'] == 'addService')
            {
                ControllerService::addService($service);
            }
            else
            {
                $service->setId_service((int)$_POST['id_specialite']);
                ControllerService::updateService($service);
            }
           
        }
        elseif($_GET['action'] == 'ajoutService')
        {
            ControllerSecretaire::listesSecretaire($index = 2);
        }
        elseif($_GET['action'] == 'listesServices')
        {
            $listesService = ControllerService::listesService($index = 1);
        }
    
        elseif(($_GET['action'] == 'deleteService' || $_GET['action'] == 'serviceUpdate') && isset($_GET['id']))
        {
            if($_GET['action'] == 'deleteService')
            {
                //require_once('lib/roleAdmin.php');
                ControllerService::deleteService($_GET['id']);
            }
            else
            {
                ControllerService::listeService((int)$_GET['id']);
            }
        }
        elseif($_GET['action'] == 'findService' && isset($_POST['mot']))
        {
            ControllerService::findService($_POST['mot']);
        }
        //Specialite 
        elseif($_GET['action'] === 'addSpecialite' || $_GET['action'] === 'updateSpecialite')
        {
            $specialite = new Specialite([
                    'nom_specialite'=>$_POST['nom_specialite'],
                    'id_service'=>(int)$_POST['service'],
                ]
                );
                if($_GET['action'] === 'addSpecialite')
                {
                    ControllerSpecialite::addSpecialite($specialite);
                }
                else
                {
                    $specialite->setId_specialite((int)$_POST['id']);
                    ControllerSpecialite::updateSpecialite($specialite);
                }
        }
        elseif($_GET['action'] === 'deleteSpecialite' || $_GET['action'] === 'specialiteUpdate')
        {
            if($_GET['action'] === 'deleteSpecialite')
            {
             ControllerSpecialite::deleteSpecialite($_GET['id']);
            }
            else
            {
                ControllerSpecialite::listeSpecialite((int)$_GET['id']);
            }
        }
        elseif($_GET['action'] === 'listesSpecialite')
        {
            ControllerSpecialite::listesSpecialite($index=1);
        }
        elseif($_GET['action'] === 'ajoutSpecialite')
        {
            ControllerService::listesService($index = 2);
        }
        //MEDECIN
        elseif($_GET['action'] === 'ajoutMedecin')
        {
            ControllerSpecialite::listesSpecialite($index = 2);
        }
        elseif($_GET['action'] == 'addMedecin' || $_GET['action'] == 'updateMedecin')
        {
            $medecin = new Medecin([
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom'],
                'num_telephone'=>$_POST['tel'],
                'email'=>$_POST['email'],
                'id_service'=>(int)$_POST['specialite'],
    
            ]);
            if($_GET['action'] == 'updateMedecin')
            {
                $medecin->setId_medecin((int)$_POST['id_medecin']);
                ControllerMedecin::updateMedecin($medecin);

            }
            else
            {
                ControllerMedecin::addMedecin($medecin);
            }
        }
        elseif($_GET['action'] == 'listesMedecin')
        {
            ControllerMedecin::listesMedecin($index = 1);
            
        }
        elseif(($_GET['action'] == 'deleteMedecin' || $_GET['action'] == 'medecinUpdate') && isset($_GET['id']))
        {
            if($_GET['action'] == 'medecinUpdate')
            {
                ControllerMedecin::listeMedecin($_GET['id']);
            }
            else
            {
                session_start();
                if(!($_SESSION['profil']== 'Admin'))
                {
                    header("location:$_SERVER[HTTP_REFERER]");
                }
                else
                {
                    ControllerMedecin::deleteMedecin($_GET['id']);
                }
            }
        }
        elseif($_GET['action'] == 'findMedecin' && isset($_POST['mot']))
        {
            if(isset($_POST['planning']))
            {
                ControllerMedecin::findPlanningMedecin($_POST['mot'],$index = 1);
            }
            else
            {
                ControllerMedecin::findMedecin($_POST['mot']);
            }
            
        }
        //RENDEZ-VOUS
        elseif($_GET['action'] == 'ajoutRV')
        {
            $listesMedecin=ControllerMedecin::listesMedecin($index = 2);
            $listesPatient=ControllerPatient::listesPatient($index = 2);
            $listesService=ControllerService::listesService($index = 3);
            require_once('vue/backend/viewAddRV.php');
        }
        elseif($_GET['action'] == 'listesRV')
        {
            ControllerRV::listesRV();
        }
        elseif($_GET['action'] == 'addRV' || $_GET['action'] == 'updateRV')
        {
            $resultat = ControllerRV::heureMedecinValide((int)$_POST['medecin'],$_POST['date_RV'],$_POST['heure_RV']);
            if((int) $resultat[0]["count(heure_RV)"] == 1)
            {
                $messageError = 'Desolé le Medecin n\'est pas disponible à cette heure';
                header('location:index.php?action=listesRV&messageError='.$messageError);
            }
            else
            {
                $RV = new RendezVous([
                    'date_RV'=>$_POST['date_RV'],
                    'heure_RV'=>$_POST['heure_RV'],
                    'id_patient'=> (int)$_POST['patient'],
                    'id_medecin'=>(int)$_POST['medecin'],
                    'id_secretaire'=>(int)$_POST['secretaire']
                ]);

                if($_GET['action'] == 'addRV')
                {
                    ControllerRV::addRV($RV);
                }
                else
                {
                    $RV->setId_RV((int)$_POST['id_RV']);
                    ControllerRV::updateRV($RV);
                }
                
            }
                    
        }
        elseif(($_GET['action'] == 'deleteRV' || $_GET['action'] == 'RVUpdate') && isset($_GET['id']))
        {
            if($_GET['action'] == 'deleteRV')
            {
                ControllerRV::deleteRV($_GET['id']);
            }
            else
            {
                ControllerRV::listeRV((int)$_GET['id']);
            }
            
        }
        elseif($_GET['action'] == 'findRV')
        {
            if(isset($_POST['rechercher']))
            {
                if(!empty($_POST['date_RV']))
                {
                    ControllerRV::findRV($_POST['date_RV']);
                }
                else
                {
                    $message = 'la Recherche se fait sur la date seulement';
                    header('location:index.php?action=listesRV;message='.$message);
                }
            }
            
            elseif(isset($_POST['planning']))
            {
                
                if(!empty($_POST['date_RV']) && !empty($_POST['mot']))
                {
                    ControllerRV::findDatePlanningMedecin($_POST['mot'],$_POST['date_RV']);
                }
                elseif(!empty($_POST['mot']))
                {
                    ControllerRV::findPlanningMedecin($_POST['mot'],$index = 2);
                }
                else
                {
                    $message = 'le Recherche se fait soit sur la date ou le nom medecin ou les deux à la fois';
                    header('location:index.php?action=listesRV;message='.$message);
                }
            }
            else
            {
                header('location:page404.php');
            }
        }
        elseif($_GET['action'] == 'ajoutUser')
        {
            require('vue/backend/viewAddUser.php');
        }
        elseif($_GET['action'] == 'addUser' || $_GET['action'] == 'updateUser')
        {
            $user = new User([
                'profil'=> $_POST['login'],
                'password_user'=> password_hash($_POST['pass'],PASSWORD_DEFAULT)
            ]);
            if($_GET['action'] == 'addUser')
            {
               GererUser::addUser($user);
            }
            elseif($_GET['action'] == 'updateUser')
            {
                $user->setid_user((int)$_POST['id_user']);
                GererUser::updateUser($user);
            }
            else
            {
                header('location:page404.php');
            }
        }
        elseif($_GET['action']== 'listesUser')
        {
            GererUser::listesUser();
        } 
        elseif(($_GET['action'] == 'userUpdate' || $_GET['action']== 'deleteUser') && isset($_GET['id_user']))
        {
            if($_GET['action'] == 'deleteUser')
            {
                GererUser::deleteUser($_GET['id_user']);
            }
            else
            {
                GererUser::listeUser((int)$_GET['id_user']);
            }
        }
        elseif($_GET['action']=='findUser')
        {
            GererUser::findUser($_POST['mot']);
        }
        //Connexion de l'utilisateur
        elseif($_GET['action']== 'connexion')
        {
            
           $resultat = GererUser::connexionVerify($_POST['login'],$_POST['pass']);
           //Tester::echoFonction();          
        }
        //Deconnexion
        elseif($_GET['action'] == 'deconnexion')
        {
            session_start();
            session_destroy();
            header('location: index.php');
        }
        
    
    }
    else
    {
     require('vue/frontend/viewConnexion.php');
    }
}

catch(Exception $e)
{
    echo 'Erreur :'.$e->getMessage();
}
?>