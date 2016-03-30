$(function(){

$(".send").on("click", function() {

    var  fields = JSON.parse(localStorage.getItem('field'));

    var data = {
        template: $('input[name=templateName]:checked').val(),
        category: localStorage.getItem('category'),
        description: localStorage.getItem('description'),
        name: localStorage.getItem('name'),
        type: localStorage.getItem('type'),
        url: localStorage.getItem('url')
    };

    $.post('http://vps261052.ovh.net/api/index.php/website', function(data) {
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

});