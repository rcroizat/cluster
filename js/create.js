$('#formCreate').on('submit', function(e) {
    var $inputs = $('#formCreate :input');
    $inputs.each(function() {
        localStorage.setItem(this.name, $(this).val());
    });

});

 $.get('http://vps261052.ovh.net/api/index.php/cat/0', function(categories) {
 		console.log('categories');
 		console.log(categories);
        $.each(categories, function(key, categorie) {
        	$('#categories').append('<option value="'+categorie.id+'">'+categorie.name+'</option>')
        });

        $('select').material_select();

    });