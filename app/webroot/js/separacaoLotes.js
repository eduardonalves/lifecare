$(document).ready(function(){
	
	$('.orglotes').click(function(){
		$('.loaderAjaxCarregarLoteDIV').show();
		var produto_id = $(this).attr('data-produtoId');
		var nid = $(this).attr('id');
		nid = nid.substring(7);
		
		$("#carregaSelect").load(urlInicio+'lotes/carregalotevalidade?numero='+produto_id+'', function(){
			$('.loaderAjaxCarregarLoteDIV').hide();
			$('#myModal_add-troca_lote').modal('show');
			$('#identificacao').val(nid);
		});		
	});
		
	//lote_venda
		

});
