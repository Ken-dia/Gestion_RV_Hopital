<?php
require_once('lib/autoload.php');
require_once('controller/frontend.php');
require_once('controller/backend.php');
try
{
    if(isset($_GET['action']))
    {
        //SECRETAIRE
        if($_GET['action'] == 'ajoutSecretaire')
        {
            require('vue/backend/viewAddSecretaire.php');
        }
        elseif($_GET['action'] == 'addSecretaire')
        {
        
            $secretaire = new Secretaire([
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom'],
                'num_telephone'=> $_POST['tel'],
                'email'=> $_POST['email'],
                'pass_secretaire'=> $_POST['pass']
    
            ]);
            addSecretaire($secretaire);
            
           //echo 'Secretaire a ajouté est :id_secretaire:'.$secretaire->id_secretaire().', nom :'.$secretaire->nom().', prenom :'.$secretaire->prenom().', email:'.$secretaire->email().', numero de telephone:'.$secretaire->num_telephone().',mot de passe :'.$secretaire->pass_secretaire();
            
        }
        elseif($_GET['action'] == 'listesSecretaire')
        {
            listesSecretaire($index = 1);
            //require('vue/backend/viewListesSecretaire.php');
            
    
        }
        
        elseif($_GET['action']== 'deleteSecretaire' && isset($_GET['id']))
        {
            $id = (int) $_GET['id'];
            deleteSecretaire($id);
    
        }
        elseif($_GET['action']== 'SecretaireUpdate' && isset($_GET['id']))
        {
            listeSecretaire((int) $_GET['id']);
    
        }
        elseif($_GET['action']== 'updateSecretaire')
        {
            $secretaire = new Secretaire([
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom'],
                'num_telephone'=> $_POST['tel'],
                'email'=> $_POST['email'],
                'pass_secretaire'=> $_POST['pass'],
                'id_secretaire' => $_POST['id']
    
            ]);
            updateSecretire($secretaire);
    
        }
        elseif($_GET['action'] == 'searchSecretaire' && isset($_POST['mot']))
        {
            searchSecretaire($_POST['mot']);
        }
    
    
        //PATIENT
        elseif($_GET['action'] == 'ajoutPatient')
        {
            require('vue/backend/viewAddPatient.php');
        }
        elseif($_GET['action'] == 'addPatient')
        {
            $patient = new Patient([
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom'],
                'dateNaiss'=>$_POST['dateNaiss'],
                'num_telephone'=> $_POST['tel'],
                'email'=> $_POST['email'],
            ]);
            addPatient($patient);
        }
        elseif($_GET['action'] == 'listesPatient')
        {
            listesPatient($index = 1);
            
    
        }
        elseif($_GET['action']== 'deletePatient' && isset($_GET['id']))
        {
            deletePatient($_GET['id']);
    
        }
    
        elseif($_GET['action']== 'patientUpdate' && isset($_GET['id']))
        {
            listePatient($_GET['id']);
    
        }
        elseif($_GET['action'] == 'updatePatient' && isset($_GET['id']))
        {
            $patient = new Patient([
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom'],
                'dateNaiss'=>$_POST['dateNaiss'],
                'num_telephone'=> $_POST['tel'],
                'email'=> $_POST['email'],
                'id_patient'=> $_POST['id_patient'],
            ]);
            updatePatient($patient);
        }
        elseif($_GET['action'] == 'findPatient' && isset($_POST['mot']))
        {
            findPatient($_POST['mot']);
        }
        //SERVICE
        elseif($_GET['action'] == 'addService')
        {
            $service = new Service([
                'nom_service'=> $_POST['specialite'],
                'id_secretaire'=> (int)$_POST['secretaire']
            ]);
            addService($service);
        }
        elseif($_GET['action'] == 'ajoutService')
        {
            listesSecretaire($index = 2);
        }
        elseif($_GET['action'] == 'listesServices')
        {
            $listesService = listesService($index = 1);
        }
    
        elseif($_GET['action'] == 'deleteService' && isset($_GET['id']))
        {
            deleteService($_GET['id']);
        }
        elseif($_GET['action'] == 'serviceUpdate' && isset($_GET['id']))
        {
            listeService((int)$_GET['id']);
        }
        elseif($_GET['action'] == 'updateService')
        {
            $service = new Service([
                'nom_service'=> $_POST['specialite'],
                'id_secretaire'=> (int)$_POST['secretaire'],
                'id_service'=> (int)$_POST['id_specialite']
            ]);
            updateService($service);
        }
        elseif($_GET['action'] == 'findService' && isset($_POST['mot']))
        {
            findService($_POST['mot']);
        }
        //MEDECIN
        elseif($_GET['action'] == 'ajoutMedecin')
        {
            listesService($index = 2);
        }
        elseif($_GET['action'] == 'addMedecin')
        {
            $medecin = new Medecin([
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom'],
                'num_telephone'=>$_POST['tel'],
                'email'=>$_POST['email'],
                'id_service'=>(int)$_POST['service'],
    
            ]);
            addMedecin($medecin);
        }
        elseif($_GET['action'] == 'listesMedecin')
        {
            listesMedecin($index = 1);
            
        }
        elseif($_GET['action'] == 'deleteMedecin' && isset($_GET['id']))
        {
            deleteMedecin($_GET['id']);
        }
        elseif($_GET['action'] == 'medecinUpdate' && isset($_GET['id']))
        {
            listeMedecin($_GET['id']);
        }
        elseif($_GET['action'] == 'updateMedecin')
        {
            $medecin = new Medecin([
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom'],
                'num_telephone'=>$_POST['tel'],
                'email'=>$_POST['email'],
                'id_service'=>(int)$_POST['service'],
                'id_medecin'=>(int)$_POST['id_medecin']
            ]);
            updateMedecin($medecin);
        }
        elseif($_GET['action'] == 'findMedecin' && isset($_POST['mot']))
        {
            findPlanningMedecin($_POST['mot'],$index = 1);
            
            /*if(isset($_POST['rechercher']))
            {
                findMedecin($_POST['mot']);
    
            }
            elseif(isset($_POST['planning']))
            {
                
            }
            else
            {
                header('location : page404.php');
            }
            */
        }
        //RENDEZ-VOUS
        elseif($_GET['action'] == 'ajoutRV')
        {
            $listesMedecin=listesMedecin($index = 2);
            $listesPatient=listesPatient($index = 2);
            $listesSecretaire=listesSecretaire($index = 4);
            require_once('vue/backend/viewAddRV.php');
        }
        elseif($_GET['action'] == 'listesRV')
        {
            listesRV();
        }
        elseif($_GET['action'] == 'addRV' && isset($_POST['submit']))
        {
            $resultat = heureMedecinValide((int)$_POST['medecin'],$_POST['date_RV'],$_POST['heure_RV']);
            if((int) $resultat[0]["count(heure_RV)"] == 1)
            {
                $messageError = 'Desolé le Medecin n\'est pas disponible à cette heure';
                header('location:index.php?action=ajoutRV&messageError='.$messageError);
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
                addRV($RV);
            }
                    
        }
        elseif($_GET['action'] == 'deleteRV' && isset($_GET['id']))
        {
            deleteRV($_GET['id']);
        }
        elseif($_GET['action'] == 'RVUpdate' && isset($_GET['id']))
        {
           listeRV((int)$_GET['id']);
    
        }
        elseif($_GET['action'] == 'updateRV')
        {
            $resultat = heureMedecinValide((int)$_POST['medecin'],$_POST['date_RV'],$_POST['heure_RV']);
            if((int) $resultat[0]["count(heure_RV)"] == 1)
            {
                $messageError = 'Desolé le Medecin n\'est pas disponible à cette heure';
                header('location:index.php?action=RVUpdate&messageError='.$messageError);
            }
            else
            {
                $RV = new RendezVous([
                    'date_RV'=>$_POST['date_RV'],
                    'heure_RV'=>$_POST['heure_RV'],
                    'id_patient'=> (int)$_POST['patient'],
                    'id_medecin'=>(int)$_POST['medecin'],
                    'id_secretaire'=>(int)$_POST['secretaire'],
                    'id_RV'=>(int)$_POST['id_RV']
                ]);
                updateRV($RV);
            }
        }
        elseif($_GET['action'] == 'findRV')
        {
            if(isset($_POST['rechercher']))
            {
                if(!empty($_POST['date_RV']))
                {
                   findRV($_POST['date_RV']);
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
                    findDatePlanningMedecin($_POST['mot'],$_POST['date_RV']);
                }
                elseif(!empty($_POST['mot']))
                {
                    findPlanningMedecin($_POST['mot'],$index = 2);
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
        //USERS
        elseif($_GET['action'] == 'ajoutUser')
        {
            require('vue/backend/viewAddUser.php');
        }
        elseif($_GET['action'] == 'addUser' || $_GET['action'] == 'updateUser')
        {
            $user = new User([
                'profil'=> $_POST['login'],
                'password_user'=> crypt($_POST['pass'])
            ]);
            if($_GET['action'] == 'addUser')
            {
                addUser($user);
            }
            elseif($_GET['action'] == 'updateUser')
            {
                $user->setid_user((int)$_POST['id_user']);
                updateUser($user);
            }
            else
            {
                header('location:page404.php');
            }
        }
        elseif($_GET['action']== 'listesUser')
        {
            listesUser();
        } 
        elseif($_GET['action']== 'deleteUser' && isset($_GET['id_user']))
        {
            deleteUser($_GET['id_user']);
        }
        elseif($_GET['action']== 'userUpdate' && isset($_GET['id_user']))
        {
            listeUser((int)$_GET['id_user']);
        }
        elseif($_GET['action']== 'connexion')
        {
            
            $resultat = connexionVerify($_POST['login'],$_POST['pass']);
            //var_dump(password_verify($_POST['pass'],$resultat[1]));
            
        }
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