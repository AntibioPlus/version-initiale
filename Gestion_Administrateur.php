<?php 
     include 'include/header.php';  

     $titre = "AntbioPlus - Gestion Administrateur";
     session_start();
    
    if (!empty($_POST["reset"])) {
             $_SESSION["libelle"] = "";
             $_SESSION["dateDebut"] = "";
             $_SESSION["dateFin"] = "";        
    }    
    
    $etudes=Etude::getEtudes();
    $etudesTerminées=[];
    
    $isFinish = 1;
    foreach ($etudes as $etude) {
       //Etude en cours
       if ($etude->getIsFinish() == '0') {
          $libelle = $etude->getLibelle();
          $dateDebut = $etude->getDateDebut();
          $dateFin = $etude->getDateFin();
          $isFinish = 0;
       } else {
           $etudesTerminée = new Etude($etude->getlibelle(), $etude->getDateDebut(),$etude->getDateFin(), $etude->getIsFinish());
           $etudesTerminée->setId($etude->getId());
           $etudesTerminées[]=$etudesTerminée;
       }
    }
            
    
?>
        
<div class="clear"></div>
    <div id="deconnexion">
        <a href="index.php">Deconnexion</a>	
    </div>
    <div class="clear"></div>
    <br>
    <!-- Si aucune étude est en cours, saisie nouvelle étude -->
    <?php if ($isFinish != 0 ) { ?>
    <div class="nouvelleEtude">
        <h2>Nouvelle étude</h2>
        <form action="newEtude.php" method="post" class="form-horizontal" onsubmit="return controleDate()">
         <div class ="nom">
            <label class="nom1">Nom de l'étude</label>
             <!-- Si libellé renseigné et que reset non demandé-->
               <?php if (!empty($_SESSION["libelle"]) && empty($_POST["reset"])) { ?>
                   <input class = "etude" required value ="<?php echo $_SESSION["libelle"] ?>" name ="libelle" type ="text" size="80px" >
               <?php } else {  ?> 
                   <input class = "etude" required name ="libelle" type ="text" size="80px" >
               <?php } ?>
        </div>
        <div class="date">
            <label class="nom1">Date de début</label>
             <!-- Si dateDebut renseignée et que reset non demandé--> 
              <?php if ((!empty($_SESSION["dateDebut"]) & empty($_POST["reset"]))) { ?>
                <input class = "etude" required name ="dateDebut" value ="<?php echo $_SESSION["dateDebut"]?>" type="date" size="70px" >
              <?php } else {  ?> 
                <input class = "etude" required name ="dateDebut" type="date" size="70px">
              <?php } ?>
            <label class="nom1">Date de fin</label>
            <!-- Si datefin renseignée et que reset non demandé-->
             <?php if ((!empty($_SESSION["dateFin"]) & empty($_POST["reset"]))) { ?>
                <input class = "etude" required type="date" value ="<?php echo $_SESSION["dateFin"]?>" name="dateFin" size="70px" >
             <?php } else {  ?> 
                <input class = "etude" required type="date" name="dateFin" size="70px" >
             <?php } ?>       
        </div>
       
            <input type="submit" class="btn-default" value="Suivant" >
         <input type="button" name="reset" value="Réinitialiser" onclick="this.forms.reset()">
         
    </form>
       
    </div>
    <br>
    <?php } else { ?>    
    <!-- Si une étude est en cours, affichage de l'étude en cours -->
    <div class="nouvelleEtude">
        <?php  ?>
        <h2>Etude en cours</h2>
        <form action="newEtude.php" method="post" class="form-horizontal" >
            <div class ="nom">
                <label class="nom1">Nom de l'étude</label>
                <input class = "etude" value ="<?php echo $libelle ?>" name ="libelle" type ="text" size="80px" readOnly="readOnly" >
                
            </div>
            <div class="date">
                <label class="nom1">Date de début</label>
                <input class = "etude" required name ="dateDebut" value ="<?php echo $dateDebut?>" type="date" size="70px" readOnly="readOnly" >
      
               <label class="nom1">Date de fin</label>
               <input class = "etude" required type="date" value ="<?php echo $dateFin?>" name="dateFin" size="70px" >    
            </div>
        </form>
        <input type="submit" class="btn-default" value="Visualiser">
    </div>
    <?php } ?>
    <br>
    <div class="nouvelleEtude tailleTerminee">
        <h2>Etudes terminées</h2>
        
        <form action="" method="post" class="form-horizontal">
            <div class="scroll">
             <?php  foreach ($etudesTerminées as $etude) {?>    
                <div class="etudeTerminée">
                    <a href="" name="etude[]" value="<?php echo $etude->getLibelle() ?>"><?php echo $etude->getLibelle()?></a>
                </div>
             <?php } ?> 
            </div>
        </form>
        
    </div> 
    <script src="js/controleNouvelleEtude.js" type="text/javascript"></script>
<?php include_once 'include/footer.php'; ?>
