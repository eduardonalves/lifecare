$(document).ready(function(){
	
	$('.valorUnit').focusout(function(){
			id = $(this).attr('id');
			nId = id.substring(9,10);
	
			itenQtd = $('.itenQtd'+nId).text();
			qtd = parseInt(itenQtd);
			
			valor = $(this).val();
			
			valor = parseFloat(valor.split('.').replace(',','.'));
			alert(valor);
			
	});
	
});

