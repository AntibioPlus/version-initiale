<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once 'include/header.php';

?>

<p><?php if (isset($_SESSION['nom_utilisateur'])) {echo $_SESSION['nom_utilisateur'];}?></p>
<h2>Bravo creer vos équipes</h2>

<?php

include_once 'include/footer.php';

