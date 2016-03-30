<?php 
$title = "Création";
require('include/header.php'); 
?>
    <div class="container">
        <div class="section">
            <form class="col l6 m6 s12" action="details.php" id="formCreate">
                <div class="row">
                    <div class="input-field col l6 m6 s12">
                        <i class="material-icons prefix">http</i>
                        <input required id="url" type="text" class="validate" name="url">
                        <label for="url">Lien du site (il sera suivi de .cluster.com)</label>
                    </div>
                    <div class="input-field col l6 m6 s12">
                        <i class="material-icons prefix">label</i>
                        <input required id="name" type="text" class="validate" name="name">
                        <label for="name">Titre</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col l6 m6 s12">
                        <select  name="type">
                            <option value="" disabled selected>Choisissez le type des offres</option>
                            <option value="1">Bien</option>
                            <option disabled value="service">Service (à venir)</option>
                        </select>
                        <label>Type</label>
                    </div>
                    <div class="input-field col l6 m6 s12">
                        <select multiple  name="category" id="categories">
                            <option value="" disabled selected>Sélectionnez la catégorie de votre platforme</option>
                        </select>
                        <label>Catégorie</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">description</i>
                        <textarea required data-error="wrong" name="description" id="description" id="description" class="materialize-textarea validate" length="150"></textarea>
                        <label for="description">Description</label>
                    </div>
                </div>

            <button class="btn waves-effect waves-light" type="submit" form="formCreate">Suivant
                <i class="material-icons right">send</i>
            </button>
            </form>
        </div>
    </div>
    
<?php require('include/footer.php'); ?>

 <script src="js/create.js"></script>