(function($) {
  $(function() {

    $('.button-collapse').sideNav();

    $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15 // Creates a dropdown of 15 years to control year
    });


    $('select').material_select();

    $('.suppr_product').click(function() {
      $(this).parent().remove();
    });



      

      setTimeout(function(){ $.get('http://vps261052.ovh.net/api/index.php/valTheme/7', function(valThemes) {
        console.log('valThemes');
        console.log(valThemes);
        $.each(valThemes, function(key, valTheme) {
          $('#' + valTheme.name).text(valTheme.value);
        });

      }); }, 500);


  }); // end of document ready


})(jQuery); // end of jQuery name space

var slider = document.getElementById('price_slider');
noUiSlider.create(slider, {
  start: [20, 80],
  connect: true,
  margin: 1,
  step: 1,
  range: {
    'min': 0,
    'max': 100
  }
});



var valueMin = document.getElementById('value-min'),
  valueMax = document.getElementById('value-max');

slider.noUiSlider.on('update', function(values, handle) {
  if (handle) {
    valueMax.innerHTML = values[handle];
  } else {
    valueMin.innerHTML = values[handle];
  }
});


$(".sendText").on("click", function() {
  var editableElements = $('[contenteditable]');

  $.each(editableElements, function(key, element) {
    var content = $(element).text();
    var id = element.id;

    $.ajax({
      url: 'http://vps261052.ovh.net/api/index.php/valTheme/',
      type: 'POST',
      data: JSON.stringify({
        'id_website': 7,
        'name': id,
        'value': content
      }),
      contentType: 'application/json; charset=utf-8',
      dataType: 'json',
      async: false,
      success: function(msg) {
        console.log(msg);
      }
    });
  });

});

