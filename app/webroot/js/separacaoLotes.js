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
		var encontradaInput = parseInt($('#encontradaInput'+nid).val());
		var qtd_achada = parseInt($('#vazio-qtd_achada'+nid).val());
		
		if(encontradaInput >= 0 && encontradaInput < qtd_achada){
		
			
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
		}else{
			alert('Valor Maior que a Quantidade no Estoque.');
		}
				
	});
		
	//lote_venda
		

});
