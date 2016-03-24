
$(document).ready(function() {

 var editable = true;



    $('.add').click(function() {
        var newField = $(".section[field]").length + 1; // compte les div .section 
        console.log(newField);
        $('#formDetails').append('<div class="section col s6 offset-s2" field="' + newField + '"><h5><div class="edit" >Nom du champs</div></h5><div class="input-field col s4 "><select><option value="" disabled selected>Type du champ</option><option value="date">date</option><option value="text">text</option><option value="numéro">numéro</option></select></div><a href="#!" class="secondary-content"><i class="material-icons delete" field="' + newField + '">delete</i></a><div class="clear"></div><div class="divider"></div></div>');

        $('select').material_select();
    });

    $('#formDetails').on("click", '.edit', function(){
        if(editable){
            var value = $(this).html();
            $(this).html('<input type="text" value="'+value+'" class="focus">');
            editable = !editable;
        }
    });
    $('#formDetails').on('focusout', '.focus', function(){
        var value = $(this).val();
        console.info(value);
        $(this).replaceWith(value);
        editable = true; // on peut rééditer
    });
});


$("#formDetails").on("click", '.delete', function() {
    if ($(".section[field]").length > 1) { // il doit rester un champs au minimum
        var field = $(this).attr('field');
        console.log(field);
        $("[field=" + field + "]").remove(); // supprime la class field n°
    }
});