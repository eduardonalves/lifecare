$(document).ready(function(){
	
	
/**********VALIDAÇÂO DO CAMPO CPF/CNPJ********/
	$("#FornecedoreCpfCnpj").on("keypress",function(event){		
		var charCode = event.keyCode || event.which;
	
		if((charCode==8) || (charCode==9) || (charCode==37) || (charCode==39) || (charCode==46)){return true}
		if (!((charCode>47)&&(charCode<58))){return false;}
	});
	
	$('#inputcpf, #inputcnpj').attr("enabled","enabled");
	$("#FornecedoreCpfCnpj").mask("99.999.999/9999-99");

	$('#inputcpf, #inputcnpj').click(function(){
		
		$("#FornecedoreCpfCnpj").val('');
		$("#FornecedoreCpfCnpj").unmask('#FornecedoreCpfCnpj');
		
		valorCpfCnpj = $(this).attr('id'); 

		if(valorCpfCnpj == 'inputcpf'){
			$("#FornecedoreCpfCnpj").removeAttr("disabled","disabled");
			$("#FornecedoreCpfCnpj").removeAttr("style","background:#EBEAFC;");
			$("#FornecedoreCpfCnpj").mask("999.999.999-99");//cpf
		}else{
			$("#FornecedoreCpfCnpj").removeAttr("disabled","disabled");
			$("#FornecedoreCpfCnpj").removeAttr("style","background:#EBEAFC;");
			$("#FornecedoreCpfCnpj").mask("99.999.999/9999-99");//cnpj
		}
	});
	
/**********Limpa o campo depois da validação********/

		
  $('#FornecedoreNome, #FornecedoreCpfCnpj').on("focusin, click",function(){
		if($('#FornecedoreNome').val() !=''){
			$('#FornecedoreNome').removeClass('shadow-vermelho');
			$('#spanFornecedorNome').css('display','none');
		}
		if($('#FornecedoreCpfCnpj').val() != ''){	
			$('#FornecedoreCpfCnpj').removeClass('shadow-vermelho');
			$('#spanFornecedorCPF').css('display','none');
			$('#spanFornecedorCPFExistente').css('display','none');
			
		}
	});
	

	
/**********BOTÂO PARA FECHAR O MODAL********/
	$(".close").click(function(){
			$("#FornecedoreNome").val('');
			$("#FornecedoreCpfCnpj").val('');
			$("input[type=radio]").removeAttr("checked","checked");
			$("#FornecedoreCpfCnpj").attr("disabled","disabled");
			$("#FornecedoreCpfCnpj").attr("style","background:#EBEAFC;");
			$('#FornecedoreCpfCnpj').removeClass('shadow-vermelho');
			$('#FornecedoreNome').removeClass('shadow-vermelho');
	});








});
