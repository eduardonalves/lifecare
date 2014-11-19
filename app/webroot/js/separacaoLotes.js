$(document).ready(function(){
	
	
	$('.orglotes').click(function(){
		$('.loaderAjaxCarregarLoteDIV').show();
		var produto_id = $(this).attr('data-produtoId');
			
		$("#carregaSelect").load(urlInicio+'lotes/carregalotevalidade?numero='+produto_id+'', function(){
			$('.loaderAjaxCarregarLoteDIV').hide();
			$('#myModal_add-troca_lote').modal('show');
		});
		
		
	});
		

});
