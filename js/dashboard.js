

 $.get('http://vps261052.ovh.net/api/index.php/website/7', function(website) {
 	
        $.each(website, function(key, website) {
        	$('#title').append(website.name);
        	$('#description').append(website.description);

	         $.get('http://vps261052.ovh.net/api/index.php/theme/'+website.id_theme, function(theme) {
	         		console.log('theme');
 		console.log(theme);
 		console.log(theme.name);
				$('#imageTemplate').attr("src",'./templates/'+theme.name+'/preview.png');
				$('#link').attr("href",'./templates/'+theme.name+'/index.html');
				$('#linkEdit').attr("href",'./templates/'+theme.name+'/index.html');
				$('#link').append("Editer");
				
	        });
        });


    });