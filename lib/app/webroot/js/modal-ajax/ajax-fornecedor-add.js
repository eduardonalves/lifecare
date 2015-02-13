$(document).ready( function() {
	
	
	$('.modal-form').bind('submit', function(event) {
		
		event.preventDefault();
		
		var dadosForm = $(this).serialize();
		var urlAction = $(this).attr("action");
		
		$('.modal-body').css("cursor","wait");
		$('.modal-form input, .modal-form select').attr('disabled', true);
		$('.bt-salvar').css('display','none');
		$('.close').css('display','none');
		$('.modal-backdrop').off('click');


		$.ajax({
			type: "POST",
			url: urlAction,
			data:  dadosForm,
			dataType: 'json',
			success: function(data) {
				
				//alert("#"+data.Categoria.nome);
				//alert("<option value=\""+data.Categoria.id+"\">"+data.Categoria.nome+"</option>");
				alert(data.Flashm);
				$('.modal-body').css("cursor","default");
				$('.modal-form input, .modal-form select').attr('disabled', false);
				$('.bt-salvar').css('display','inherit');
				$('.close').css('display','inherit');
				$('#'+ultimo_modal).modal("hide");
				$('.modal-backdrop').on('click');

				
				//data.Categorias.sort();
     				
				if(data.Categoria.id != 0)
				{
					$("#leftValues").append("<option value=\""+data.Categoria.id+"\" selected=\"selected\">"+data.Categoria.nome+"</option>");
				}
				
				$("#rightValues option").removeAttr("selected");
				
				
				var $s = $("#"+data.Controller+data.Controller);

				var optionTop = $s.find('[value="'+data.Categoria.id+'"]').offset().top;
				var selectTop = $s.offset().top;

				$s.scrollTop($s.scrollTop() + (optionTop - selectTop));
			}
		});
		
		//alert(dadosForm);
	
	});

});
