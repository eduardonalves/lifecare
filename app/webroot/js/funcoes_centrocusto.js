$(document).ready(function() {
	$('#bt-salvarCentroCustoEdit').click(function(e){
				e.preventDefault();
				
				var erro = 0;
				
				if($('#CentroCustoNome').val() == ''){
					$('#CentroCustoNome').addClass('shadow-vermelho');
					$('#validaNome').css('display','block');
					erro = erro + 1;
					}
				else if($('#CentroCustoLimite').val() == ''){
					$('#CentroCustoLimite').addClass('shadow-vermelho');
					$('#validaLimite').css('display','block');
					erro = erro + 1;
					}
				else if($('#CentroCustoLimiteUsado').val() == ''){
					$('#CentroCustoLimiteUsado').addClass('shadow-vermelho');
					$('#validaLimiteUsado').css('display','block');
					erro = erro + 1;
					}
				if(erro==0){
						$('#CentrocustoEditForm').submit();
					}
			});
			
	$('.btnadd').click(function(e){
		e.preventDefault();
		
		var id=  $(this).attr('id');
		var expReg01 = /\D+/gi;
		numero = id.replace(expReg01,'');
		var mes = parseInt(numero) + 1;
		mes = mes.toString();
		$('#limite'+numero).html('<input type="hidden" name="data[Orcamentocentro]['+numero+'][periodo_final]" value="'+$('#CentrocustoGetY').val()+'-'+mes+'-'+'30" id="periodo_final" >');
		$('#limite'+numero).append('<input type="text" name="data[Orcamentocentro]['+numero+'][limite]" value="0.00" id="Orcamentocentro'+numero+'Id" class="tamanho-medio dinheiro_duasCasas Nao-Letras">');
		
		$(".dinheiro_duasCasas").priceFormat({
	    prefix: '',
	    centsSeparator: ',',
	    thousandsSeparator: '.',
	    limit: 15
	});
	
	});
	
	$('.btneditar').click(function(e){
		e.preventDefault();
		
		var id=  $(this).attr('id');
		var expReg01 = /\D+/gi;
		numero = id.replace(expReg01,'');
		
		$('#textLimite'+numero).hide();
		$('#inputLimite'+numero).show();
	});
});

function editLimite(){
	}
