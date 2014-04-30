$(document).ready(function() {
	$('#bt-salvarCentroCustoEdit').click(function(e){
				e.preventDefault();
				
				var i, erro = 0;
				if($('#nome').val() == ''){
					$('#nome').addClass('shadow-vermelho');
					$('#validaNome').css('display','block');
					erro++;
					}
				for(i=0;i<11;i++){ // Percorre os meses para verificar todas as inputs
					if($('#Orcamentocentro'+i+'limite').val() == '' && !($('#Orcamentocentro'+i+'limite').is(':hidden'))){
						$('#Orcamentocentro'+i+'limite').addClass('shadow-vermelho');
						$('#validaAddLimite').css('display','block');
						erro++;
						}
					else if($('#inputLimite'+i).val() == '' && !($('#inputLimite'+i).is(':hidden'))){
						$('#inputLimite'+i).addClass('shadow-vermelho');
						$('#validaEditLimite').css('display','block');
						erro++;
						}
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
		if(mes < 10){
			mes="0"+mes;
		}
		$('#limite'+numero).html('<input name="data[Orcamentocentro]['+numero+'][periodo_final]" value="'+$('#CentrocustoGetY').val()+'-'+mes+'-'+'01" type="hidden" id="Orcamentocentro'+numero+'PeriodoFinal">');
		
		$('#limite'+numero).append('<span id="validaAddLimite" class="Msg-tooltipDireita" style="display:none">Preencha o Limite</span>');
		$('#limite'+numero).append('<input type="text" name="data[Orcamentocentro]['+numero+'][limite]" value="0.00" id="Orcamentocentro'+numero+'Id" class="tamanho-medio">');

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
