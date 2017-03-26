<?php 

     
    include 'include/header.php';  

    $titre = "AntbioPlus - Nouvelle étude";
    session_start();
    
    if (!empty($_POST["reset"])) {
             $_SESSION["libelle"] = "";
             $_SESSION["dateDebut"] = "";
             $_SESSION["dateFin"] = "";
             header("Location: Gestion_Administrateur.php"); 
             die();
    }
    
    $libelle = $_POST["libelle"];
    $dateDebut = $_POST["dateDebut"];
    $dateFin = $_POST["dateFin"];

?>
        
    
        <div class="clear"></div>
        <div id="deconnexion">
            <a href="index.php">Deconnexion</a>	   
        </div>
        <div class="clear"></div>
        <br>
        <div class="nouvelleEtude grand">
            <h2 class="titreNouvelleEtude"><center><?php echo $libelle ?></center></h2>
    <form action="nouvelle_etude_action.php" method="post" class="form-horizontal" name = "form" onsubmit="return verifDonnees()">
        <div class="date">
            <div class="input-append date">
                <label class="date" value="<?php echo $dateDebut ?>">DATE DE DEBUT :   </label>  <?php echo strftime('%d/%m/%Y', strtotime($dateDebut))?>       
                <label class="date" value="<?php echo $dateFin ?>">DATE DE FIN :     </label>   <?php echo strftime('%d/%m/%Y', strtotime($dateFin))?>
            </div>
             <?php 
                  $_SESSION["libelle"] = $libelle;
                  $_SESSION["dateDebut"] = $dateDebut;
                  $_SESSION["dateFin"] = $dateFin; ?>            
        </div>
            <div class="NouvelleEtude">
        <nav > 
            <p class="type"><strong>MOLECULES</strong></p>
            <div class="choix">
                <?php                        
                    $molecules = Molecule::getMolecule();
                ?>
              
             <?php  foreach ($molecules as $molecule) {?>    
                <div class="checkbox">
                     <label><input type="checkbox" name="molecule[]" value="<?php echo $molecule->getId() ?>"><?php echo $molecule->getNom()?></label>
                </div>
             <?php } ?>        
            </div>
        </nav>
        <nav >
            <p class="type"><strong>BACTERIES</strong></p>                                            
            <div class="choix">
            <?php                        
                    $bacteries = Bacterie::getBacterie();
            ?>
            <?php  foreach ($bacteries as $bacterie) {?>    
                <div class="checkbox">
                    <label><input type="checkbox" name="bacterie[]" value="<?php echo $bacterie->getId() ?>"><?php echo $bacterie->getNom()?></label>
                </div>
             <?php } ?>
            </div>    
        </nav>
                 <div class ="clear" ></div>
        <nav>
                    <p class="type"><strong>ANTIBIOTIQUES / EQUIPES</strong></p>
                          
               <div class="choix PlusGrand">
                <?php                        
                 $antibiotiques = Antibiotique::getAntibiotique();
                 $equipes = Equipe::getEquipes();
                 $i=0;
                ?> 
                   <div class="checkbox AntibioEquipe" >
                  
               <?php  foreach ($antibiotiques as $antibiotique) {
                   $i = 0; ?>    
                <div class="checkbox AntibioEquipe" >
                    <div class="colonne1">
                        <label><input type="checkbox" name="antibiotique[]" value="<?php echo $antibiotique->getId() ?>"><?php echo $antibiotique->getNom()?></label>
                    </div>
                    <div class="colonne2">
                <select class = "option" name="option[]">
                    <option text="choix equipe" value ="" >Choix equipe</option>
                  <?php  foreach ($equipes as $equipe) {?>                    
                    <?php if ($equipe->getAdmin() != 1) { ?>
                    <option text="choix equipe" value ="<?php echo $equipe->getId() ?>" ><?php echo $equipe->getNom()?></option>
                   <?php } } ?>
                   </select> 
                    </div>
            
         
               </div>
             <?php $i++; } ?>
                     
               </div>
               </div>   
        </nav>
     
            </div>
            <div class ="clear" ></div>
            <br>  
            <div class="bouton">
            <a href="Gestion_Administrateur.php" class="btn btn-default">annuler</a>
            <input type="submit" name="bouton" value="Lancer l'étude">
            </div>
        </form>
            
        </div>

  
        
    <!-- </div>
        <br>
        <br>
        <br>
        <footer>
            <p><center>2017 Copyright AntibioPlus. Tous droits réservés.</center></p>
        </footer> -->
         <script src="js/controleNouvelleEtude.js" type="text/javascript"></script>
         
        <?php include_once 'include/footer.php';
        // put your code here        ?>