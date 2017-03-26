<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 

include_once 'Config.php';
include_once 'classes/Equipe.php';
include_once 'classes/Bacterie.php';
include_once 'classes/Antibiotique.php';
include_once 'classes/Etude.php';
include_once 'classes/Molecule.php';
include_once 'classes/Resultat.php';

if (!isset($titre)) {
    $titre = "Sans titre...?";
}

?>

<html>
   <head>
        <meta charset="utf-8">
        <meta name="description" content="Test HTML5">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title><?php echo $titre ?></title>

        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 
    </head>

    <body>
        <img id="fond" src="img/boitePetri3.png" alt="l'image de fond" title="l'image de fond" />
        <div id="conteneur">
            <div id="tete">
                <img id="entete" src="img/bandeau4.png" alt="bandeau" title="bandeau" />
            </div>
     
