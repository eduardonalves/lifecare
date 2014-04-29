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
});

function editLimite(){
	$('#textLimite').hide();
	$('#inputLimite').show();
	}
