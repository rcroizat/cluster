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

    var data = {
        template: $('input[name=templateName]:checked').val(),
        category: localStorage.getItem('category'),
        description: localStorage.getItem('description'),
        name: localStorage.getItem('name'),
        type: localStorage.getItem('type'),
        url: localStorage.getItem('url')
    };    
/*    var data = {
        template: 1,
        category: 2,
        description: 'DESCRIPTION TEST lLALALDFEG',
        name: localStorage.getItem('name'),
        type: 2,
        url: 'TESTURL'
    };*//*
  $.each(fields, function(key, field) {
           console.log(field.val);

        });*/

    $.post('http://vps261052.ovh.net/api/index.php/website', function(data) {
        var id = data;
        $.each(fields, function(key, field) {
            var type = field.type;
            var val = field.val;
                $.post('1/input/', 
                    function({idWebSite : id, type : type,  val : val}){
                    alert('good');
                    });
        });

    });


});

