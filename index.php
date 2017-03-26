
<?php 
     include 'include/header.php';  
     session_start();
     $titre = "AntbioPlus - Connexion";
     
     $_SESSION["libelle"] = "";
     $_SESSION["dateDebut"] = "";
     $_SESSION["dateFin"] = "";
     //initialisation erreur utilisateur inconnu
     $erreur2 = "";
     
     //Si saisie bouton initialiser
     if (isset($_POST["initialiser"]) AND $_POST["initialiser"] == 'Initialiser') {
         $_POST["nom_utilisateur"] = "";
         $_POST["mot_de_passe"] = "";
         goto AFFICHAGE;
     }
     
     //Si saisi utlisateur et/ou mot de passe
     if (isset($_POST["nom_utilisateur"]) AND isset($_POST["mot_de_passe"])) {
    
         if ( !empty($_POST["mot_de_passe"]) && !empty($_POST["nom_utilisateur"])) {         
              
             include_once 'classes/Equipe.php';
              $nom = $_POST["nom_utilisateur"];
              $password = $_POST["mot_de_passe"];
             
              $equipe = Equipe::getEquipe($nom,$password); 
              
              if (!empty($equipe)) {
                   $_SESSION["admin"] = $equipe["admin"]; 
                   $_SESSION["email"] = $equipe["email"];
                  if ($_SESSION["admin"] == '1') {
                      header("Location: Gestion_Administrateur.php");
                      die();
                  } else {
                      header("Location: equipeEtude.php");
                      die();
                  }            
              } else {
                    $erreur2 = "Utilisateur inconnu";
                    goto AFFICHAGE;
              }
        }
     }
     
AFFICHAGE:
?>

         <!--corps de la page-->
        
        <div id="formulaire">
             
            <form name="connexion" method="post"]>
                <div class="form-group">
                    <fieldset>
                    <label for="usr">Name:</label>
                    <input type="text" required class="form-control" id="usr" name = "nom_utilisateur" value = <?php 
                     if (isset($_POST["nom_utilisateur"])){ echo ($_POST["nom_utilisateur"]);}?> >
                    
                    <label for="pwd">Password:</label>
                    <input type="password" required class="form-control" id="pwd" name = "mot_de_passe" value = <?php 
                     if (isset($_POST["mot_de_passe"])){ echo ($_POST["mot_de_passe"]);}?> >
                    <br>
                   <input type="submit" name="valider" class="btn btn-primary" class="bouton" value="Connexion" />
                   <input type="reset" name="initialiser" class="btn btn-primary" class="bouton" value="Initialiser">
                    </fieldset>
                </div>
                
                <?php echo $erreur2; ?>
            </form>  
            
        </div>
        <?php
        
        // put your code here
        ?>
        
        
        <!--pied de page-->
          <?php include 'include/footer.php';
        // put your code here        ?>

