<?php 
$title = "Thème";
require('include/header.php'); 
?>

    <div class="container">
        <div class="section">

            <div class="row">
            <?php
$dir    = './templates';
$templates = scandir($dir);


foreach($templates as $key => $name){
    if($name != '..' && $name != '.'){
    echo ' <div class="card small col l3 m5 s12 offset-l1 offset-m1 offset-s1">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator materialboxed" src="./templates/'.$name.'/preview.png">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">'.$name.'<i class="material-icons right">more_vert</i></span>
                        <p><a href="./templates/'.$name.'/index.html">Demo</a></p>
                        <input name="templateName" value="'.$name.'" type="radio" id="'.$name.'/" />
                        <label for="'.$name.'/">Choisir ce template</label>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Aerial<i class="material-icons right">close</i></span>
                        <p>Auteur : Cluster Team</p>
                        <p>Prix : 50€</p>
                        <p>License : 2 000€</p>
                    </div>
                </div>';
    }
}
?>
            </div>
            <div class="row">
                <a class="waves-effect waves-light btn send">Terminer <i class="material-icons right">send</i></a>
            </div>
        </div>
    </div>

<?php 
require('include/footer.php'); 
?>

<script src="js/template.js"></script>