$(document).ready(function() {

    $('.delete').click(function() {

        var field = $(this).attr('field');
        $("[field=" + field + "]").remove();
    });


    $('.edit').click(function() {
        var field = $(this).attr('field');
        console.log(field);
        $("[field=" + field + "] .editeur").css("display", "block");
        $("[field=" + field + "] .editable").css("display", "none");
    });
    $('.add').click(function() {
        var field = $(this).attr('field');
        console.log(field);
    });
});


$(".send").on("click", function() {

    var  fields = JSON.parse(localStorage.getItem('field'));
/*    var data = {
        template: $('input[name=templateName]:checked').val(),
        category: localStorage.getItem('category'),
        description: localStorage.getItem('description'),
        name: localStorage.getItem('name'),
        type: localStorage.getItem('type'),
        url: localStorage.getItem('url')
    };   */ 

    var data = {
        template: 1,
        category: 2,
        description: 'DESCRIPTION TEST lLALALDFEG',
        name: localStorage.getItem('name'),
        type: 2,
        url: 'TESTURL'
    };


    $.post('http://vps261052.ovh.net/1/website/', function(data) {
        $.each(fields, function(key, field) {
                $.post('1/input/', function({idWebSite : data, type : field.type, val : field.val}){
                    alert('good');
                    });
        });

    });


});

