$(document).ready(function() {

    var editable = true;

    $('.add').click(function() {
        var newField = $(".section[field]").length + 1; // compte les div .section 
        $('#formDetails').append('<div class="section col s6 offset-s2" field="' + newField + '"><h5><div class="edit formInput" >Nom du champ</div></h5><div class="input-field col s4 "><select class="formInput"><option value="text">text</option><option value="date">date</option><option value="nombre">nombre</option></select></div><a href="#!" class="secondary-content"><i class="material-icons delete" field="' + newField + '">delete</i></a><div class="clear"></div><div class="divider"></div></div>');

        $('select').material_select();
    });

    $('#formDetails').on("click", '.edit', function() {
        if (editable) {
            var value = $(this).html();
            $(this).html('<input type="text" value="' + value + '" class="focus">');
            editable = !editable;
        }
    });
    $('#formDetails').on('focusout', '.focus', function() {
        var value = $(this).val();
        $(this).replaceWith(value);
        editable = true; // on peut rééditer
    });
});


$("#formDetails").on("click", '.delete', function() {
    if ($(".section[field]").length > 1) { // il doit rester un champs au minimum
        var field = $(this).attr('field');
        $("[field=" + field + "]").remove(); // supprime la class field n°
    }
});

$(".submit").on("click", function() {
    var $inputs = $('div[field]');
    var fields = [];
    $inputs.each(function() {
        /* Dans chaque div field on recupere le nom et le type de champs */
       var fieldNumber = $(this).attr('field');
       var name = $(this).find('div.formInput').html();
       var type = $(this).find('select.formInput').val();
       var data = { name: name, type: type }
       console.info(name + type + data.type + data.name);
       fields.push(data);
    });
    localStorage.setItem('field', JSON.stringify(fields));
});
