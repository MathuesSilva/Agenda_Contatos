<?php
include_once("templates/header.php");
?>
  
  <div class="container" id="view-contact-container">
    <?php include_once("templates/backbtn.html");?>
    <h1 id="main-tilte"><?= $contact["name"] ?></h1>
    <p class="body">Telefone:</p>
    <p><?= $contact["phone"] ?></p>
    <p class="body">Observações:</p>
    <p><?= $contact["observation"] ?></p>
  </div>


 <?php
 include_once("templates/footer.php");
 ?>