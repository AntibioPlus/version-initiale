function nombreBacterie (bacterie) {
    var n = 0 ;
    
    
    for (var i=0; i<bacterie.length; i++) {
         if (bacterie[i].checked) {
             n++;
         }
    }
    
    return n ;
}
function nombreMolecule (molecule) {
    var n = 0 ;
     
    for (var i=0; i<molecule.length; i++) {
         if (molecule[i].checked) {
             n++;
         }
    }
    return n ;
}
function nombreAntibiotique (antibiotique) {
    var n = 0 ;
  
    
    for (var i=0; i<antibiotique.length; i++) {
         if (antibiotique[i].checked) {
             n++;
         }
    }
    return n ;
}

function nombreEquipe (equipe) {
    var n = 0 ;
  
    for (var i=0; i<equipe.length; i++) {
         if (equipe[i].value != "") {
             n++;
         }
    }
    return n ;
}
function doublonEquipe(equipe) {
    var doublon = false;
    for (var i=1; i<equipe.length; i++) {
         if (equipe[i-1].value != "" & equipe[i].value != "" & equipe[i-1].value == equipe[i].value) {
             doublon = true;
         }          
    }
    return doublon ;
}
    
function verifDonnees()
{ 
    var molecules = document.getElementsByName('molecule[]') ;
    var bacteries = document.getElementsByName('bacterie[]') ;
    var antibiotiques = document.getElementsByName('antibiotique[]');
    var equipes = document.getElementsByName('option[]');
    
   var n = 0 ;

   nbMolecules= nombreMolecule(molecules);
   nbBacteries= nombreBacterie(bacteries);
   nbAntibiotiques = nombreAntibiotique(antibiotiques);
   nbEquipes = nombreEquipe(equipes);
  
  //Au moins une molecule doit être selectionnée
  if (nbMolecules == 0 ){
      alert("Vous devez saisir au moins une molécule");
      return false;
  }
  //Au moins une bactérie doit être selectionnée
  if (nbBacteries == 0 ){
      alert("Vous devez saisir au moins une bactérie");
      return false;
  }
  //Au moins un antibiotique doit être selectionnée
  if (nbAntibiotiques == 0 ){
      alert("Vous devez saisir au moins un antibiotique");
      return false;
  }
    
   //nb Antibiotique doit etre égale à nombre équipe
   if(nbAntibiotiques != nbEquipes) {
        alert("Incohérence entre le nombre d'antibiotique et le nombre d'équipe ");
        return false;
    }
    
    //Test doublon equipe
    var doublonEq = doublonEquipe(equipes);   
    if (doublonEq) {
        alert ("Vous avez selectionné plusieurs fois la même équipe");
        return false;
    } else {
        return true;
    }
}
function controleDateDebut() {
    var dateDebut = document.getElementsByName('dateDebut')[0].value ;
    var today = new Date();
    var dateMonth = ""+(today.getMonth()+1)+"";
    if (dateMonth.length == 1) {
        dateMonth = '0'+ dateMonth;
    }   
    var dateJour = ""+today.getDate()+"";
    if (dateJour.length == 1) {
        dateJour = '0'+ dateJour;
    }   
    var jour = today.getFullYear() +"-"+ dateMonth +"-"+ dateJour ; 
    
    dateDebut = dateDebut.split("-").join("");
    jour = jour.split("-").join("");        
    
    if( dateDebut < jour) {
        alert ('La date de début ne peut pas être antérieure à la date du jour.');
        return false;
    } else {
        return true;
    }
}
function controleDateFin() {
    var dateFin = document.getElementsByName('dateFin')[0].value ;
    var dateDebut = document.getElementsByName('dateDebut')[0].value ;
    
    dateDebut = dateDebut.split("-").join("");
    dateFin = dateFin.split("-").join("");
           
    if ( dateFin <= dateDebut) {
        alert ('La date de fin ne peut pas être inférieure ou égale à la date de début.');
        return false;
    } else {
        return true;
    }    
}
function controleDate() {
    var dateDebutOK = controleDateDebut();
    var dateFinOK = controleDateFin();
    
    if (!dateDebutOK) {
       // alert ('La date de début ne peut pas être antérieure à la date du jour.');
        return false;
    }
    if (!dateFinOK) {
        //alert ('La date de fin ne peut inférieure ou égale à la date de début.');
        return false;
    } 
    if (dateDebutOK && dateFinOK){
        return true;
    }
}