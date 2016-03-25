(function($){
  $(function(){

    $('.button-collapse').sideNav();

    $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  	});


    $('select').material_select();

    $('.suppr_product').click(function() {
      $(this).parent().remove();
    });

        
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

slider.noUiSlider.on('update', function ( values, handle ) {
	if ( handle ) {
		valueMax.innerHTML = values[handle];
	} else {
		valueMin.innerHTML = values[handle];
	}
});

import whatwg-fetch;
import restful, { fetchBackend } from 'restful.js';

const api = restful('http://vps261052.ovh.net/api/index.php', fetchBackend(fetch));
