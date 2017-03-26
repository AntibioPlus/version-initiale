
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of action
 *
 * @author Lacoste
 */
session_start();
include_once 'include/header.php';
//$_SESSION['erreur1']='jkklllklkl';
//$equipe=new Equipe();
?>

<div id="formulaire">
    <form name="connexion" action="Login_Action.php" method="post">
        <fieldset>
        <?php 
        if (isset($_SESSION['erreur1']))
        { ?>
            <p> <?php echo $_SESSION['erreur1']; ?></p> 
        <?php }?>
        
        <p>UserName : <input type="text" name="nom_utilisateur" value="<?php echo $_SESSION['nom_utilisateur'];?>" /></p>
        <?php
        if (isset($_SESSION['erreur2']))       
        { ?>
        <p> <?php echo $_SESSION['erreur2']; ?></p>
        <?php } ?>
        
        <p>Password : <input type="password" name="mot_de_passe" value="<?php echo $_SESSION['mot_de_passe']; ?>" /></p>
                
        </fieldset>
                
     <p><input type="submit" name="valider" value="Valider" />
           
  </form>

<div>  
     
<?php include_once  'include/footer.php';
?>
    
   
   