<?php 
$title = "Tableau de bord";
require('include/header.php'); 
?>

    <div class="container">
        <div class="section">
            <ul class="collection" id="websites">
            <li class="collection-item avatar">
              <img  alt="" id="imageTemplate" class="circle">
              <span class="title" id="title"></span>
              <p id="description">
              </p>
              <a id="link"></a></p>
              <a id="linkEdit" class="secondary-content"><i class="material-icons">edit</i></a>
            </li>
          
            </ul>
        </div>
    </div>
   


       <?php require('include/footer.php'); ?>
    <script src="js/dashboard.js"></script>

