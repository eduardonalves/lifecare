$(document).ready(function() {

/*** Criação dos Blocos de Endereços e Dados Bancários ****************/
	var contadorBlocoEndereco = 1;
	var contadorBlocoDadosBanc = 1;

	var contadorTab = 29;

	function botaoRemoverEnd(){
		if(contadorBlocoEndereco > 1){
			$("#remove-area-endereco").css('display','block');
		}else{
			$("#remove-area-endereco").css('display','none');
		}
	}

	function botaoRemoverBanc(){
		if(contadorBlocoDadosBanc > 1){
			$("#remove-area-dadosbanc").css('display','block');
		}else{
			$("#remove-area-dadosbanc").css('display','none');
		}
	}

	$("#bt-addEndereco").click(function(){

		var cep = $("#Endereco"+ (contadorBlocoEndereco-1) +"Cep").val();
		var logradouro = $("#Endereco"+ (contadorBlocoEndereco-1) +"Logradouro").val();
		var uf = $("#Endereco"+ (contadorBlocoEndereco-1) +"Uf").val();
		var cidade = $("#Endereco"+ (contadorBlocoEndereco-1) +"Cidade").val();
		var bairro = $("#Endereco"+ (contadorBlocoEndereco-1) +"Bairro").val();

		var idUf = "Endereco"+ contadorBlocoEndereco +"Uf";
		var idCidade = "Endereco"+ contadorBlocoEndereco +"Cidade";

		if((cep) && (logradouro) && (uf) && (cidade) && (bairro)){			
			$('.area-endereco').append('<div class="bloco-area-end'+ contadorBlocoEndereco +'">\
				<hr>\
					<section class="coluna-esquerda">\
						<div class="input select">\
							<label for="Endereco'+ contadorBlocoEndereco +'Tipo">Tipo<span class="campo-obrigatorio">*</span>:</label>\
							<select name="data[Endereco]['+ contadorBlocoEndereco +'][tipo]" id="tipo'+ contadorBlocoEndereco +'" tabindex="'+ contadorTab +'">\
								<option value=""></option>\
								<option value="COBRANCA">Cobrança</option>\
								<option value="ENTREGA">Entrega</option>\
							</select>\
						</div>\
						<span id="valida'+ contadorBlocoEndereco +'Tipo" class="Msg-tooltipDireita" style="display:none">Preencha o Tipo</span>\
						\
						<div class="input text">\
							<label for="Endereco'+ contadorBlocoEndereco +'Numero">Número:</label>\
							<input name="data[Endereco]['+ contadorBlocoEndereco +'][numero]" class="tamanho-medio obrigatorio" maxlength="20" type="text" id="Endereco'+ contadorBlocoEndereco +'Numero" tabindex="'+ (contadorTab+3) +'"/>\
						</div>\
						\
						<div class="input text">\
							<label for="Endereco'+ contadorBlocoEndereco +'Bairro">Bairro<span class="campo-obrigatorio">*</span>:</label>\
							<input name="data[Endereco]['+ contadorBlocoEndereco +'][bairro]" class="tamanho-medio obrigatorio" maxlength="150" type="text" id="Endereco'+ contadorBlocoEndereco +'Bairro" tabindex="'+ (contadorTab+6) +'"/>\
						</div>\
						<span id="valida'+ contadorBlocoEndereco +'Bairro" class="Msg-tooltipDireita" style="display:none">Preencha o Bairro</span>\
					</section>\
					\
					<section class="coluna-central" >\
						<div class="input text">\
							<label for="Endereco0Cep">CEP<span class="campo-obrigatorio">*</span>:</label>\
							<input name="data[Endereco]['+ contadorBlocoEndereco +'][cep]" class="tamanho-medio maskCep" maxlength="12" type="text" id="Endereco'+ contadorBlocoEndereco +'Cep" tabindex="'+ (contadorTab+1) +'"/>\
						</div>\
						<span id="valida'+ contadorBlocoEndereco +'Cep1" class="Msg-tooltipDireita" style="display:none">Preencha o CEP</span>\
						<span id="valida'+ contadorBlocoEndereco +'Cep2" class="Msg-tooltipDireita" style="display:none">Preencha corretamente o CEP</span>\
						\
						<div class="inputCliente input text divUf">\
							<label for="Endereco'+ contadorBlocoEndereco +'Uf">UF<span class="campo-obrigatorio">*</span>:</label>\
							<select name="data[Endereco]['+ contadorBlocoEndereco +'][uf]" class="estado obrigatorio" id="Endereco'+ contadorBlocoEndereco +'Uf" tabindex="'+ (contadorTab+4) +'"></select>\
						</div>\
						<span id="valida'+ contadorBlocoEndereco +'Uf" class="Msg-tooltipDireita" style="display:none">Selecione o Estado</span>\
						\
						<div class="input text">\
							<label for="Endereco'+ contadorBlocoEndereco +'Complemento">Complemento:</label>\
							<input name="data[Endereco]['+ contadorBlocoEndereco +'][complemento]" class="tamanho-medio" maxlength="150" type="text" id="Endereco'+ contadorBlocoEndereco +'Complemento" tabindex="'+ (contadorTab+7) +'"/>\
						</div>\
					</section>\
					\
					<section class="coluna-direita" >\
						<div class="input text">\
							<label for="Endereco'+ contadorBlocoEndereco +'Logradouro">Logradouro<span class="campo-obrigatorio">*</span>:</label>\
							<input name="data[Endereco]['+ contadorBlocoEndereco +'][logradouro]" class="tamanho-medio obrigatorio" maxlength="150" type="text" id="Endereco'+ contadorBlocoEndereco +'Logradouro" tabindex="'+ (contadorTab+2) +'"/>\
						</div>\
						<span id="valida'+ contadorBlocoEndereco +'Logradouro" class="Msg-tooltipAbaixo" style="display:none">Preencha o Logradouro</span>\
						\
						<div class="input select">\
							<label for="Endereco'+ contadorBlocoEndereco +'Cidade">Cidade<span class="campo-obrigatorio">*</span>:</label>\
							<select name="data[Endereco]['+ contadorBlocoEndereco +'][cidade]" class="cidade obrigatorio" id="Endereco'+ contadorBlocoEndereco +'Cidade" tabindex="'+ (contadorTab+5) +'"></select>\
						</div>\
						<span id="valida'+ contadorBlocoEndereco +'Cidade" class="Msg-tooltipAbaixo" style="display:none">Selecione o Cidade</span>\
						<div class="input textarea">\
							<label for="Endereco'+ contadorBlocoEndereco +'PontoReferencia">Ponto de Referência:</label>\
							<textarea name="data[Endereco]['+ contadorBlocoEndereco +'][ponto_referencia]" cols="30" rows="6" id="Endereco'+ contadorBlocoEndereco +'PontoReferencia" tabindex="'+ (contadorTab+8) +'"></textarea>\
						</div>\
					</section>\
				<div>');

			$('.bloco-area-end'+ contadorBlocoEndereco).hide().fadeIn(2000);

			contadorBlocoEndereco++;
			contadorTab = contadorTab+10;
		}

		new dgCidadesEstados({
			estado: $('#'+idUf).get(0),
			cidade: $('#'+idCidade).get(0)
		});

		jQuery(function($){
			$(".maskCep").mask("99999-999");
		});

		botaoRemoverEnd();
	});

	$("#add-area-dadosbanc").click(function(){

		var agencia = $("#Dadosbancario"+ (contadorBlocoDadosBanc-1) +"NumeroAgencia").val();
		var conta = $("#DadosbancarioConta"+ (contadorBlocoDadosBanc-1)).val();

		if(conta && agencia){
			$('.area-dadosbanc').append('<div class="bloco-area-banc'+ contadorBlocoDadosBanc +'">\
					<hr>\
					<section class="coluna-esquerda">\
						<div class="input text">\
							<label for="DadosbancarioNomeBanco">Nome do Banco:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][nome_banco]" class="tamanho-medio" maxlength="15" type="text" id="Dadosbancario'+ contadorBlocoDadosBanc +'NomeBanco" tabindex="'+ (contadorTab+1) +'"/>\
						</div>\
						\
						<div class="input text">\
							<label for="DadosbancarioNumeroAgencia">Número da Agência:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][numero_agencia]" class="tamanho-pequeno" maxlength="15" type="text" id="Dadosbancario'+ contadorBlocoDadosBanc +'NumeroAgencia" tabindex="'+ (contadorTab+4) +'"/>\
						</div>\
						\
						<div class="input text">\
							<label for="DadosbancarioGerente">Gerente:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][gerente]" class="tamanho-pequeno" maxlength="100" type="text" id="Dadosbancario'+ contadorBlocoDadosBanc +'Gerente" tabindex="'+ (contadorTab+7) +'"/>\
						</div>\
					</section>\
					\
					<section class="coluna-central" >\
						<div class="input text">\
							<label for="DadosbancarioNumeroBanco">Número do Banco:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][numero_banco]" class="tamanho-medio" maxlength="100" type="text" id="Dadosbancario'+ contadorBlocoDadosBanc +'NumeroBanco" tabindex="'+ (contadorTab+2) +'"/>\
						</div>\
						\
						<div class="input text">\
							<label for="DadosbancarioConta'+ contadorBlocoDadosBanc +'">Conta:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][conta]" class="tamanho-pequeno" maxlength="110" type="text" id="DadosbancarioConta'+ contadorBlocoDadosBanc +'" tabindex="'+ (contadorTab+5) +'"/>\
						</div>\
					</section>\
					\
					<section class="coluna-direita" >\
						<div class="input text">\
							<label for="DadosbancarioNomeAgencia">Nome da Agência:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][nome_agencia]" class="tamanho-pequeno" maxlength="100" type="text" id="Dadosbancario'+ contadorBlocoDadosBanc +'NomeAgencia" tabindex="'+ (contadorTab+3) +'"/>\
						</div>\
						\
						<div class="input text">\
							<label for="DadosbancarioTelefoneBanco">Telefone:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][telefone_banco]" class="tamanho-pequeno" maxlength="30" type="text" id="Dadosbancario'+ contadorBlocoDadosBanc +'TelefoneBanco" tabindex="'+ (contadorTab+6) +'"/>\
						</div>\
					</section>\
				<div>');

			$('.bloco-area-banc'+ contadorBlocoDadosBanc).hide().fadeIn(2000);

			contadorBlocoDadosBanc++;
			contadorTab = contadorTab+10;
		}

		botaoRemoverBanc();
	});

/*** Remoção de Blocos de Endereços e Dados Bancários *****************/

	$("#remove-area-endereco").click(function(){		
		$(".bloco-area-end" + (contadorBlocoEndereco-1)).remove();

		contadorBlocoEndereco--;
		botaoRemoverEnd();
	});

	$("#remove-area-dadosbanc").click(function(){		
		$(".bloco-area-banc" + (contadorBlocoDadosBanc-1)).remove();

		contadorBlocoDadosBanc--;
		botaoRemoverBanc();
	});


/*** Visualização de Créditos *****************************************/

	if($('#ParceirodenegocioClassificacao').val() == 'CLIENTE'){
		$('.areaCliente').css('display','inline-block');
	}else{
		$('.areaCliente').css('display','none');
	}

	$('#ParceirodenegocioClassificacao').change(function(){
		if($('#ParceirodenegocioClassificacao').val() == 'CLIENTE'){
			$('.areaCliente').css('display','inline-block');
		}else{
			$('.areaCliente').css('display','none');
		}
	});


/*** Validação ********************************************************/

	$('#ParceirodenegocioAddForm, #ParceirodenegocioEditForm').submit(function(){
	    var email = $("#Contato0Email").val();
	    var emailValido=/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

		if($('#ParceirodenegocioClassificacao').val() == 0){
			$('#ParceirodenegocioClassificacao').addClass('shadow-vermelho');
			$('#validaClassificacao').css('display','block');
			return false;
		}else if($('#ParceirodenegocioNome').val() == ''){
			$('#ParceirodenegocioNome').addClass('shadow-vermelho');
			$('#ParceirodenegocioNome').on('focus',function(){
				if($('#ParceirodenegocioNome').val() == ''){
					$('#validaNome').css('display','block');
				}
			});
			$('#ParceirodenegocioNome').focus();
			$('#ParceirodenegocioNome').focusout(function(){
				$('#validaNome').css('display','none');
			});
			return false;
		}else if($('#ParceirodenegocioCpfCnpj').val() == ''){
			$('#ParceirodenegocioCpfCnpj').addClass('shadow-vermelho');
			$('#validaCPF').css('display','block');
			return false;
			
		}else if(!emailValido.test(email)){
			$('#Contato0Email').focus().css('border-color','pink');
			$('#validaEmail').css('display','block');
			$('#Contato0Email').focusout(function(){
			    $('#validaEmail').css('display','none');
			});

			return false;
		}else if(($('#ParceirodenegocioCpfCnpj').val().length != 14) && ($('#ParceirodenegocioCpfCnpj').val().length != 18)){
			$('#ParceirodenegocioCpfCnpj').focus();
			$('#validaCPFTamanho').css('display','block');
			$('#ParceirodenegocioCpfCnpj').focusout(function(){
			    $('#validaCPFTamanho').css('display','none');
			});
			return false;
		}else if($('#ParceirodenegocioTelefone1').val() == ''){
			$('#ParceirodenegocioTelefone1').addClass('shadow-vermelho');
			$('#ParceirodenegocioTelefone1').on('focus',function(){
				if($('#ParceirodenegocioTelefone1').val() == ''){
					$('#validaTelefone').css('display','block');
				}
			});
			$('#ParceirodenegocioTelefone1').focus();
			$('#ParceirodenegocioTelefone1').focusout(function(){
				$('#validaTelefone').css('display','none');
			});
			return false;
		}else if($('#tipo'+ (contadorBlocoEndereco-1) ).val() == ''){
			$('#tipo'+ (contadorBlocoEndereco-1) ).addClass('shadow-vermelho');
			$('#valida'+ (contadorBlocoEndereco-1) +'Tipo').css('display','block');
			$('#tipo'+ (contadorBlocoEndereco-1) ).on('focus',function(){
				if($('#tipo'+ (contadorBlocoEndereco-1)).val() == ''){
				    $('#valida'+ (contadorBlocoEndereco-1) +'Tipo').css('display','none');
				}
			});

			return false;
		}else if($('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').val() == ''){
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').addClass('shadow-vermelho');
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').on('focus',function(){
				if($('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').val() == ''){
					$('#valida'+ (contadorBlocoEndereco-1) +'Cep1').css('display','block');
				}
			});
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').focus();
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').focusout(function(){
				$('#valida'+ (contadorBlocoEndereco-1) +'Cep1').css('display','none');
			});
			return false;
		}else if($('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').val().length < 9){
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').focus();
			$('#valida'+ (contadorBlocoEndereco-1) +'Cep2').css('display','block');
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').focusout(function(){
				$('#valida'+ (contadorBlocoEndereco-1) +'Cep2').css('display','none');
			});
			return false;
		}else if($('#Endereco'+ (contadorBlocoEndereco-1) +'Logradouro').val() == ''){
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Logradouro').addClass('shadow-vermelho');
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Logradouro').on('focus',function(){
				if($('#Endereco'+ (contadorBlocoEndereco-1) +'Logradouro').val() == ''){
					$('#valida'+ (contadorBlocoEndereco-1) +'Logradouro').css('display','block');
				}
			});
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Logradouro').focus();
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Logradouro').focusout(function(){
				$('#valida'+ (contadorBlocoEndereco-1) +'Logradouro').css('display','none');
			});
			return false;
		}else if($('#Endereco'+ (contadorBlocoEndereco-1) +'Uf').val() == 0){
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Uf').addClass('shadow-vermelho');
			$('#valida'+ (contadorBlocoEndereco-1) +'Uf').css('display','block');
			return false;
		}else if($('#Endereco'+ (contadorBlocoEndereco-1) +'Cidade').val() == ''){
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Cidade').addClass('shadow-vermelho');
			$('#valida'+ (contadorBlocoEndereco-1) +'Cidade').css('display','block');
			return false;
		}else if($('#Endereco'+ (contadorBlocoEndereco-1) +'Bairro').val() == ''){
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Bairro').addClass('shadow-vermelho');
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Bairro').on('focus',function(){
				if($('#Endereco'+ (contadorBlocoEndereco-1) +'Bairro').val() == ''){
					$('#valida'+ (contadorBlocoEndereco-1) +'Bairro').css('display','block');
				}
			});
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Bairro').focus();
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Bairro').focusout(function(){
				$('#valida'+ (contadorBlocoEndereco-1) +'Bairro').css('display','none');
			});
			return false;
		}else if(($('#Dadoscredito0Limite').val() == '') && ($('#ParceirodenegocioClassificacao').val() == 'CLIENTE')){
			$('#Dadoscredito0Limite').addClass('shadow-vermelho');
			$('#Dadoscredito0Limite').on('focus',function(){
				if($('#Dadoscredito0Limite').val() == ''){
					$('#validaLimite').css('display','block');
				}
			});
			$('#Dadoscredito0Limite').focus();
			$('#Dadoscredito0Limite').focusout(function(){
				$('#validaLimite').css('display','none');
			});
			return false;
		}else if(($('#Dadoscredito0ValidadeLimite').val() == '') && ($('#ParceirodenegocioClassificacao').val() == 'CLIENTE')){
			$('#Dadoscredito0ValidadeLimite').addClass('shadow-vermelho');
			$('#Dadoscredito0ValidadeLimite').on('focus',function(){
				if($('#Dadoscredito0ValidadeLimite').val() == ''){
					$('#validaValidade1').css('display','block');
				}
			});
			$('#Dadoscredito0ValidadeLimite').focus();
			$('#Dadoscredito0ValidadeLimite').focusout(function(){
				$('#validaValidade1').css('display','none');
			});
			return false;
		}else if(($('#ParceirodenegociosBloqueado').val() == '') && ($('#ParceirodenegocioClassificacao').val() == 'CLIENTE')){
			$('#ParceirodenegociosBloqueado').addClass('shadow-vermelho');
			$('#validaBloqueado').css('display','block');
			return false;
		}else{
			return true;
		}
	});

	$('#Dadoscredito0ValidadeLimite').change(function(){
		var hoje = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate()).getTime();
		var selecionado = $('#Dadoscredito0ValidadeLimite').datepicker('getDate').getTime();

		if(selecionado < hoje){
			$('#Dadoscredito0ValidadeLimite').addClass('shadow-vermelho');
			$('#validaValidade2').css('display','block');
			$('#Dadoscredito0ValidadeLimite').val('');
		}
	});

	$("#Dadoscredito0ValidadeLimite").focusout(function(){
		var dfuturoSaida = $("#Dadoscredito0ValidadeLimite").val();
		var dataFutura = new Date();

		var anoDigitado = dfuturoSaida.split("/")[2];
		var mesDigitado = dfuturoSaida.split("/")[1];
		var diaDigitado = dfuturoSaida.split("/")[0];

		if(dfuturoSaida != ''){
			if( diaDigitado < 1 || diaDigitado > 31 || mesDigitado < 1 || mesDigitado > 12 || anoDigitado <1900 || dfuturoSaida.length < 6 ){
				$("#validaValidade3").css("display","block");
				$("#Dadoscredito0ValidadeLimite").addClass('shadow-vermelho');
				$("#Dadoscredito0ValidadeLimite").val("");
			}else{
				$("#Dadoscredito0ValidadeLimite").removeClass('shadow-vermelho');
				$("#validaValidade3").css("display","none");
			}
		}
    });


/*** Mascara **********************************************************/
	jQuery(function($){
		$(".maskCep").mask("99999-999");
	});


/*** Validar CPF ******************************************************/
	$("#ParceirodenegocioCpfCnpj").on("keypress",function(event){		
		var charCode = event.keyCode || event.which;

		if((charCode==8) || (charCode==9) || (charCode==37) || (charCode==39) || (charCode==46)){return true}
		if (!((charCode>47)&&(charCode<58))){return false;}
	});

	$('#inputcpf, #inputcnpj').attr("enabled","enabled");
	$("#ParceirodenegocioCpfCnpj").mask("99.999.999/9999-99");
	$("#Dadoscredito0ValidadeLimite").mask("99/99/9999");

	$('#inputcpf, #inputcnpj').click(function(){
		$("#ParceirodenegocioCpfCnpj").val('');

		valorCpfCnpj = $(this).attr('id'); 

		if(valorCpfCnpj == 'inputcpf'){
			$("#ParceirodenegocioCpfCnpj").removeAttr("disabled");
			$("#ParceirodenegocioCpfCnpj").css("background-color","#FFFFFF;");
			$("#ParceirodenegocioCpfCnpj").mask("999.999.999-99");//cpf
		}else{
			$("#ParceirodenegocioCpfCnpj").removeAttr("disabled");
			$("#ParceirodenegocioCpfCnpj").css("background-color","#FFFFFF;");
			$("#ParceirodenegocioCpfCnpj").mask("99.999.999/9999-99");//cnpj
		}
	});


/*** Mascara Telefone/Celular *************************************************/
	$(".maskTel,maskCel").on('focusin',function(){
		var numeroTel = $(this).val().replace(/[^0-9]/gi, '');
		
		$(this).val(numeroTel);
	});

	$(".maskTel").on('focusout',function(){
		var numeroTel;
		var telPart1;
		var telPart2;
		var telPart3;		
		
		numeroTel = $(this).val().replace(/[^0-9]/gi, '');
		
		if(numeroTel.length == 5){
			telPart1 = numeroTel.substring(0,3);
			telPart2 = numeroTel.substring(3,5);
			
			$(this).val(telPart1 +' '+ telPart2);
		}else if((numeroTel.charAt(0) == '0') && (numeroTel.length = 11)){
			telPart1 = numeroTel.substring(0,4);
			telPart2 = numeroTel.substring(4,7);
			telPart3 = numeroTel.substring(7,11);
			
			$(this).val(telPart1 +' '+ telPart2 +' '+ telPart3);
		}else if((numeroTel.charAt(0) == '4') && (numeroTel.charAt(1) == '0') && (numeroTel.length = 8)){
			telPart1 = numeroTel.substring(0,4);
			telPart2 = numeroTel.substring(4,8);
			
			$(this).val(telPart1 +' '+ telPart2);
		}else if(numeroTel == ''){
			$(this).val('');
		}else{
			telPart1 = numeroTel.substring(0,2);
			telPart2 = numeroTel.substring(2,6);
			telPart3 = numeroTel.substring(6,10);
			
			$(this).val('('+ telPart1 +') '+ telPart2 +'-'+ telPart3);
		}
		
	});
	
	$(".maskCel").on('focusout',function(){
		var numeroTel;
		var telPart1;
		var telPart2;
		var telPart3;		
		
		numeroTel = $(this).val().replace(/[^0-9]/gi, '');
		
		if(numeroTel.length == 11){
			telPart1 = numeroTel.substring(0,2);
			telPart2 = numeroTel.substring(2,7);
			telPart3 = numeroTel.substring(7,11);
			
			$(this).val('('+ telPart1 +') '+ telPart2 +'-'+ telPart3);
		}else{
			$(this).val(numeroTel);
		}
		
	});
});
