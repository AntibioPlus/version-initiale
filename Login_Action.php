<?php 
   session_start();
   include_once 'include/header.php'; 
 
   $nom_utilisateur="";
   $mot_de_passe="";
  
   if(isset($_POST['valider'])){
      $nom_utilisateur=htmlspecialchars($_POST['nom_utilisateur']);
      $mot_de_passe=htmlspecialchars($_POST['mot_de_passe']);
   }
   else 
   {
       if (isset($_SESSION['nom_utilisateur'])&isset($_SESSION['mot_de_passe']))  // si on est déjà connecté
        {
           if (isset($_SESSION['niveauUtilisateur'])==0) {
               header('location:Resultat.php');                 // on redirige en fonction de l'utilisateur
              }
           else {
             header('location:Etude.php');
           }
        }
       else {
           header('location:login.php');
          }
   }
   
   // Si un nom d'utilisateur et un mot de passe on été validé 
   // on vérifie leur occurence dans la base de donnée
   if (($mot_de_passe!="")&&($nom_utilisateur!=""))
   {
      $_SESSION['nom_utilisateur']="";
      $_SESSION['mot_de_passe']="";
      
      $db = new PDO("mysql:host=".Config :: SERVEUR.";dbname=".Config::BASE ,Config::UTILISATEUR ,Config::MOTDEPASSE);

      $req_sql="SELECT *FROM equipe WHERE ";        // lecture du nom
  
      $requete = $db->prepare($req_sql ." nom =:nom"); 
       
      $requete->bindParam(":nom", $nom_utilisateur);
        
      $requete->execute();
      
      $ligne = $requete->fetch();     //lecture de ligne correspondant au nom  
      
      if(!$ligne) {
          $_SESSION['erreur1']='nom utilisateur incorret';
          $_SESSION['nom_utilisateur']="";
          $_SESSION['mot_de_passe']="";
          header('location:login.php');
          var_dump($_SESSION['erreur1']);
      }
        
      else {
        
         $_SESSION['erreur1']="";                  //mise à jour message d'erreur
         $login_bdd =$ligne['email'];
         $id_bdd =$ligne['id'];
         $mot_de_passe_bdd = $ligne['password'];
         $admin_bdd=$ligne['admin'];
        
         if ($mot_de_passe!=$mot_de_passe_bdd)      // si les mots de passe sont identiques
         {
           $_SESSION['nom_utilisateur']=$nom_utilisateur;    // alors on stocke le nom utilisateur
           $_SESSION['mot_de_passe']="";
           $_SESSION['erreur2']='Mot de passe incorrect';    // dans une variable $_SESSION
           header('location:login.php');                     // retourne vers la page de login
         }
         else
         {
            $_SESSION['erreur2']="";                    //mise à jour message d'erreur
            $_SESSION['mot_de_passe']=$mot_de_passe;             //initialisation des variables de
            $_SESSION['nom_utilisateur']=$nom_utilisateur;       // session
            $_SESSION['niveauUtilisateur']=$admin_bdd;
       
            if ($admin_bdd==0)                                   //Verificatopn niveau utilisateur
                {
                  $db=null;
                  header('location: Resultat.php');              // equipe
                }
                else
                {
                  $db=null;
                  header('location:Etude.php');                  //administrateur
                  
                }
         }
      }
   }
//   else {
//     if (isset($_SESSION['nom_utilisateur'])&isset($_SESSION['mot_de_passe']))  // si on est déjà connecté
//        {
//           if (isset($_SESSION['niveauUtilisateur'])==0) {
//               header('location:Resultat.php');                 // on redirige en fonction de l'utilisateur
//              }
//           else {
//             header('location:Etude.php');
//           }
//           }
//     else {
//         header('location:login.php');
//       }
//   }
?>


