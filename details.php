<?php 
$title = "Détails du formulaire";
require('include/header.php'); 
?>

    <div class="container">
        <div class="section">
            <div class="row" id="formDetails">
                <h4>Fiche produit</h4>
                <div class="section col s6 offset-s2" field="1">
                    <h5><div class="edit formInput">Nom du champ</div></h5>
                    <div class="input-field col s4 ">
                        <select class="formInput">
                            <option value="text">text</option>
                            <option value="date">date</option>
                            <option value="nombre">nombre</option>
                        </select>
                    </div>
                    <a href="#!" class="secondary-content"><i class="material-icons delete" field="1">delete</i></a>
                    <div class="clear"></div>
                    <div class="divider"></div>
                </div>
                <div class="section col s6 offset-s2" field="2">
                    <h5><div class="edit formInput">Nom du champ</div></h5>
                    <div class="input-field col s4 ">
                        <select class="formInput">
                            <option value="text">text</option>
                            <option value="date">date</option>
                            <option value="nombre">nombre</option>
                        </select>
                    </div>
                    <a href="#!" class="secondary-content"><i class="material-icons delete" field="2">delete</i></a>
                    <div class="clear"></div>
                    <div class="divider"></div>
                </div>
                <div class="section col s6 offset-s2" field="3">
                    <h5><div class="edit formInput" >Nom du champ</div></h5>
                    <div class="input-field col s4 ">
                        <select class="formInput">
                            <option value="text">text</option>
                            <option value="date">date</option>
                            <option value="nombre">nombre</option>
                        </select>
                    </div>
                    <a href="#!" class="secondary-content"><i class="material-icons delete" field="3">delete</i></a>
                    <div class="clear"></div>
                    <div class="divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col s6 offset-s2">
                    <a class="btn-floating btn-large waves-effect waves-light"><i class="material-icons add">add</i></a>
                </div>
            </div>
            <div class="row">
                <div class="col l6 m6 s12 offset-l2 offset-s2">
                    <a href="template.php" class="waves-effect waves-light btn submit">Choisir un template <i class="material-icons right">send</i></a>
                </div>
            </div>
        </div>
    </div>

<?php 
require('include/footer.php'); 
?>
<script src="js/details.js"></script>