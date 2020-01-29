  function add(boton,campo,entidades) {				
		$(boton).click(function() {
			var lista = $(campo);
			// grab the prototype template
			var newWidget = lista.attr('data-prototype');
			// replace the "$$name$$" used in the id and name of the prototype
			// with a number that's unique to your emails
			// end name attribute looks like name="contact[emails][2]"
			
			newWidget = newWidget.replace(/__name__label__/g, "Insumo "+(++entidades));
			newWidget = newWidget.replace(/__name__/g, entidades);
		   

			// create a new list element and add it to the list
			var newLi = $('<li></li>').html(newWidget);
			newLi.appendTo($(campo));

			return false;
		});
	}
  
	function Ajax(uri,datos,respuesta){	
	$.ajax({
			url: uri,
			method: 'POST',
			data: datos,
			success: respuesta,
			error: function() { alert('Se ha producido un error'); }
			});
	};