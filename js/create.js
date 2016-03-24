$('#formCreate').on('submit', function(e) {
    var $inputs = $('#formCreate :input');
    $inputs.each(function() {
        localStorage.setItem(this.name, $(this).val());
    });

});
