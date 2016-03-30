$('#formCreate').on('submit', function(e) {
    var $inputs = $('#formCreate :input');
    $inputs.each(function() {
        localStorage.setItem(this.name, $(this).val());
    });

});

 $.get('http://vps261052.ovh.net/1/cat/0', function(data) {
        var id = data;
        $.each(fields, function(key, field) {
            var type = field.type;
            var val = field.val;
                $.post('1/input/', 
                    function({
                        idWebSite : id, 
                        type : type, 
                        val : val}){
                    alert('good');
                    });
        });

    });