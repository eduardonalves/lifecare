$(document).ready(function(){
	
	$('.cancelCompleta').click(function(){
		var nid = $(this).attr('id');
		nid = nid.substring(14);		
		$('#encontradaInput'+nid).val('');
		$('#encontrada'+nid+' ').hide();
		$('#completar'+nid).show();
	});
	
	$('.completar').click(function(){
		var nid = $(this).attr('id');
		nid = nid.substring(9);		
		$(this).hide();
		$('#encontrada'+nid).show();		
	});
	
	$('.orglotes').click(function(){
		var produto_id = $(this).attr('data-produtoId');
		var nid = $(this).attr('id');
		nid = nid.substring(7);
		
		$('.loaderAjaxCarregarLoteDIV').show();
	
		var encontradaInput = $('#encontradaInput'+nid).val();
		var qtd_operacao = $('#vazio-qtd_operacao'+nid).val();
	
		var falta = qtd_operacao - encontradaInput;
		
		if(falta<0){
			//Não falta Produtos
			falta = 0;
		}
		
		$("#carregaSelect").load(urlInicio+'lotes/carregalotevalidade?numero='+produto_id+'', function(){
			$('.loaderAjaxCarregarLoteDIV').hide();
			$('#myModal_add-troca_lote').modal('show');
			$('#identificacao').val(nid);
			$('#quantidadeEncontrada').val(encontradaInput);
			$('#quantidadeEncontradaForm').val(encontradaInput);
			$('#quantidadeFalta').val(falta);
		});
				
	});
		
	//lote_venda
		

});
