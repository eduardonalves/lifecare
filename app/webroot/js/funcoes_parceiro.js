$(document).ready(function() {
	
	var contadorBlocoEndereco = 1;
	var contadorBlocoDadosBanc = 1;
	var contadorTabindex = 0;

	function tabularCredito(inicioTab){
		
		$('#Dadoscredito0Limite').attr('tabindex', inicioTab + 1);
		$('#Dadoscredito0ValidadeLimite').attr('tabindex', inicioTab + 2);
		$('#ParceirodenegocioBloqueado').attr('tabindex', inicioTab + 3);
	}
	

	function tabularDadosBancarios(inicioTab, bloco){
		
		$('#Dadosbancario'+ bloco +'NomeBanco').attr('tabindex', inicioTab + 1);
		$('#Dadosbancario'+ bloco +'NumeroBanco').attr('tabindex', inicioTab + 2);
		$('#Dadosbancario'+ bloco +'NomeAgencia').attr('tabindex', inicioTab + 3);
		$('#Dadosbancario'+ bloco +'NumeroAgencia').attr('tabindex', inicioTab + 4);
		$('#DadosbancarioConta'+ bloco).attr('tabindex', inicioTab + 5);
		$('#Dadosbancario'+ bloco +'TelefoneBanco').attr('tabindex', inicioTab + 6);
		$('#Dadosbancario'+ bloco +'Gerente').attr('tabindex', inicioTab + 7);
		
		inicioTab = inicioTab + 7;
		
		tabularCredito(inicioTab)
	}
	
	
	function tabularEndereco(inicioTab){
		
		$('#tipo' + (contadorBlocoEndereco-1)).attr('tabindex', inicioTab + 1);
		$('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').attr('tabindex', inicioTab + 2);
		$('#Endereco'+ (contadorBlocoEndereco-1) +'Logradouro').attr('tabindex', inicioTab + 3);
		$('#Endereco'+ (contadorBlocoEndereco-1) +'Numero').attr('tabindex', inicioTab + 4);
		$('#Endereco'+ (contadorBlocoEndereco-1) +'Uf').attr('tabindex', inicioTab + 5);
		$('#Endereco'+ (contadorBlocoEndereco-1) +'Cidade').attr('tabindex', inicioTab + 6);
		$('#Endereco'+ (contadorBlocoEndereco-1) +'Bairro').attr('tabindex', inicioTab + 7);		
		$('#Endereco'+ (contadorBlocoEndereco-1) +'Complemento').attr('tabindex', inicioTab + 8);
		$('#Endereco'+ (contadorBlocoEndereco-1) +'PontoReferencia').attr('tabindex', inicioTab + 9);
		
		inicioTab = inicioTab + 9;
		
		tabularDadosBancarios(inicioTab, 0)
	}

	function tabularDadosGerais(inicioTab){
		
		inicioTab = 0;
		
		$('#ParceirodenegocioClassificacao').attr('tabindex', inicioTab + 1);
		$('#ParceirodenegocioNome').attr('tabindex', inicioTab + 2);
		$('#inputcpf').attr('tabindex', inicioTab + 3);
		$('#inputcnpj').attr('tabindex', inicioTab + 4);
		$('#ParceirodenegocioCpfCnpj').attr('tabindex', inicioTab + 5);
		$('#ParceirodenegocioTelefone1').attr('tabindex', inicioTab + 6);
		$('#ParceirodenegocioTelefone2').attr('tabindex', inicioTab + 7);
		$('#Contato0Telefone3').attr('tabindex', inicioTab + 8);
		$('#Contato0Fax').attr('tabindex', inicioTab + 9);
		$('#Contato0Email').attr('tabindex',inicioTab + 10);
		
		
		inicioTab = inicioTab + 11;
		
		tabularEndereco(inicioTab);
	}

	//adicionar tabindex no bloqueado parceiro
	$('input').focus(function(){
	    $('#ParceirodenegocioBloqueado').attr('tabindex','11');
	});    

/*** Busca do CEP *****************************************************/
	function findCEP(indexCep) {
		if($.trim($("#Endereco"+ indexCep +"Cep").val()) != ""){

			//adiciona o loader
			$('#loaderCep').remove();
			$("#Endereco"+ indexCep +"Cep").after('<img id="loaderCep" src="/lifecare/app/webroot/img/loaderInput.gif" style="display:block">');

			$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#Endereco"+ indexCep +"Cep").val().replace("-", ""), function(){
				if(resultadoCEP["resultado"] == 1){
				    $('#loaderCep').remove();
				    $("#Endereco"+ indexCep +"Logradouro").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
				    $("#Endereco"+ indexCep +"Bairro").val(unescape(resultadoCEP["bairro"]));
				    $("#Endereco"+ indexCep +"Cidade").val(unescape(resultadoCEP["cidade"]));
				    $("#Endereco"+ indexCep +"Uf").val(unescape(resultadoCEP["uf"]));
				    $("#Endereco"+ indexCep +"Numero").focus();
				}else{
				    $('#loaderCep').remove();
				    $('#valida'+ indexCep +'Cep3').css('display','block');
				}
			});
		}
	}
	
	//busca cep
	$('body').on('click','.buscarCEP',function(){
		var indexCep = $(this).attr('id').substr($(this).attr('id').length - 1);
		
		findCEP(indexCep);
	});

/*** Criação dos Blocos de Endereços e Dados Bancários ****************/
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
			$('.area-endereco').append('<div class="enderecoLength bloco-area-end'+ contadorBlocoEndereco +'" style="clear:both;margin-bottom:120px;"">\
				<br />\
				<hr>\
					<section class="coluna-esquerda">\
						<div class="input select">\
							<label for="Endereco'+ contadorBlocoEndereco +'Tipo">Tipo<span class="campo-obrigatorio">*</span>:</label>\
							<select name="data[Endereco]['+ contadorBlocoEndereco +'][tipo]" id="tipo'+ contadorBlocoEndereco +'" >\
								<option value=""></option>\
								<option value="COBRANCA">Cobrança</option>\
								<option value="ENTREGA">Entrega</option>\
							</select>\
						</div>\
						<span id="valida'+ contadorBlocoEndereco +'Tipo" class="Msg-tooltipDireita" style="display:none">Preencha o Tipo</span>\
						\
						<div class="input text">\
							<label for="Endereco'+ contadorBlocoEndereco +'Numero">Número:</label>\
							<input name="data[Endereco]['+ contadorBlocoEndereco +'][numero]" class="tamanho-medio obrigatorio" maxlength="20" type="text" id="Endereco'+ contadorBlocoEndereco +'Numero" />\
						</div>\
						\
						<div class="input text">\
							<label for="Endereco'+ contadorBlocoEndereco +'Bairro">Bairro<span class="campo-obrigatorio">*</span>:</label>\
							<input name="data[Endereco]['+ contadorBlocoEndereco +'][bairro]" class="tamanho-medio obrigatorio" maxlength="50" type="text" id="Endereco'+ contadorBlocoEndereco +'Bairro" />\
						</div>\
						<span id="valida'+ contadorBlocoEndereco +'Bairro" class="Msg-tooltipDireita" style="display:none">Preencha o Bairro</span>\
					</section>\
					\
					<section class="coluna-central" >\
						<div class="input text">\
							<label for="Endereco'+ contadorBlocoEndereco +'Cep">CEP<span class="campo-obrigatorio">*</span>:</label>\
							<input name="data[Endereco]['+ contadorBlocoEndereco +'][cep]" class="tamanho-medio maskCep" maxlength="12" type="text" id="Endereco'+ contadorBlocoEndereco +'Cep" />\
						</div>\
						<img src="/lifecare/app/webroot/img/consultas.png" id="consultaCEP'+ contadorBlocoEndereco +'" class="buscarCEP" style="margin-left:10px;cursor:pointer;" alt="" />\
						<span id="valida'+ contadorBlocoEndereco +'Cep1" class="Msg-tooltipDireita" style="display:none">Preencha o CEP</span>\
						<span id="valida'+ contadorBlocoEndereco +'Cep2" class="Msg-tooltipDireita" style="display:none">Preencha corretamente o CEP</span>\
						<span id="valida'+ contadorBlocoEndereco +'Cep3" class="Msg-tooltipDireita" style="display: none;">Endereço não encontrado para o cep digitado.</span>\
						\
						<div class="inputCliente input text divUf">\
							<label for="Endereco'+ contadorBlocoEndereco +'Uf">UF<span class="campo-obrigatorio">*</span>:</label>\
							<input name="data[Endereco]['+ contadorBlocoEndereco +'][uf]" class="obrigatorio tamanho-medio" type="text" id="Endereco'+ contadorBlocoEndereco +'Uf"/>\
						</div>\
						<span id="valida'+ contadorBlocoEndereco +'Uf" class="Msg-tooltipDireita" style="display:none">Selecione o Estado</span>\
						\
						<div class="input text">\
							<label for="Endereco'+ contadorBlocoEndereco +'Complemento">Complemento:</label>\
							<input name="data[Endereco]['+ contadorBlocoEndereco +'][complemento]" class="tamanho-medio" maxlength="150" type="text" id="Endereco'+ contadorBlocoEndereco +'Complemento" />\
						</div>\
					</section>\
					\
					<section class="coluna-direita" >\
						<div class="input text">\
							<label for="Endereco'+ contadorBlocoEndereco +'Logradouro">Logradouro<span class="campo-obrigatorio">*</span>:</label>\
							<input name="data[Endereco]['+ contadorBlocoEndereco +'][logradouro]" class="tamanho-medio obrigatorio" maxlength="150" type="text" id="Endereco'+ contadorBlocoEndereco +'Logradouro" />\
						</div>\
						<span id="valida'+ contadorBlocoEndereco +'Logradouro" class="Msg-tooltipAbaixo" style="display:none">Preencha o Logradouro</span>\
						\
						<div class="input select">\
							<label for="Endereco'+ contadorBlocoEndereco +'Cidade">Cidade<span class="campo-obrigatorio">*</span>:</label>\
							<input name="data[Endereco]['+ contadorBlocoEndereco +'][cidade]" class="obrigatorio tamanho-medio" type="text" id="Endereco'+ contadorBlocoEndereco +'Cidade">\
						</div>\
						<span id="valida'+ contadorBlocoEndereco +'Cidade" class="Msg-tooltipAbaixo" style="display:none">Selecione o Cidade</span>\
						<div class="input textarea">\
							<label for="Endereco'+ contadorBlocoEndereco +'PontoReferencia">Ponto de Referência:</label>\
							<textarea name="data[Endereco]['+ contadorBlocoEndereco +'][ponto_referencia]" cols="30" rows="6" id="Endereco'+ contadorBlocoEndereco +'PontoReferencia" ></textarea>\
						</div>\
					</section>\
				<div>');

			$('.bloco-area-end'+ contadorBlocoEndereco).hide().fadeIn(2000);
			
			contadorBlocoEndereco++;
				
			tabularEndereco(parseInt($('#Endereco'+ (contadorBlocoEndereco-2) +'PontoReferencia').attr("tabindex")));
			for(var i=0; i<=(contadorBlocoDadosBanc-1); i++){
				if(i == 0){
					tabularDadosBancarios((parseInt($('#Endereco'+ (contadorBlocoEndereco-1) +'PontoReferencia').attr("tabindex"))),(i-1));
				}else{
					tabularDadosBancarios((parseInt($('#Dadosbancario'+ (i-1) +'Gerente').attr("tabindex"))),i);
				}
			}
		}else{
			$('#validaEndBloco').css('display','block');
		}

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
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][nome_banco]" class="tamanho-medio" maxlength="15" type="text" id="Dadosbancario'+ contadorBlocoDadosBanc +'NomeBanco" />\
						</div>\
						\
						<div class="input text">\
							<label for="DadosbancarioNumeroAgencia">Número da Agência:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][numero_agencia]" class="tamanho-pequeno" maxlength="15" type="text" id="Dadosbancario'+ contadorBlocoDadosBanc +'NumeroAgencia" />\
						</div>\
						\
						<div class="input text">\
							<label for="DadosbancarioGerente">Gerente:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][gerente]" class="tamanho-pequeno" maxlength="50" type="text" id="Dadosbancario'+ contadorBlocoDadosBanc +'Gerente" />\
						</div>\
					</section>\
					\
					<section class="coluna-central" >\
						<div class="input text">\
							<label for="DadosbancarioNumeroBanco">Número do Banco:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][numero_banco]" class="tamanho-medio" maxlength="25" type="text" id="Dadosbancario'+ contadorBlocoDadosBanc +'NumeroBanco" />\
						</div>\
						\
						<div class="input text">\
							<label for="DadosbancarioConta'+ contadorBlocoDadosBanc +'">Conta:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][conta]" class="tamanho-pequeno" maxlength="25" type="text" id="DadosbancarioConta'+ contadorBlocoDadosBanc +'" />\
						</div>\
					</section>\
					\
					<section class="coluna-direita" >\
						<div class="input text">\
							<label for="DadosbancarioNomeAgencia">Nome da Agência:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][nome_agencia]" class="tamanho-pequeno" maxlength="50" type="text" id="Dadosbancario'+ contadorBlocoDadosBanc +'NomeAgencia" />\
						</div>\
						\
						<div class="input text">\
							<label for="DadosbancarioTelefoneBanco">Telefone:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][telefone_banco]" class="tamanho-pequeno maskTel" maxlength="15" type="text" id="Dadosbancario'+ contadorBlocoDadosBanc +'TelefoneBanco" />\
						</div>\
					</section>\
				<div>');

			$('.bloco-area-banc'+ contadorBlocoDadosBanc).hide().fadeIn(2000);

			contadorBlocoDadosBanc++;
			for(var i=0; i<=(contadorBlocoDadosBanc-1); i++){
				if(i == 0){
					tabularDadosBancarios((parseInt($('#Endereco'+ (contadorBlocoEndereco-1) +'PontoReferencia').attr("tabindex"))),(i-1));
				}else{
					tabularDadosBancarios((parseInt($('#Dadosbancario'+ (i-1) +'Gerente').attr("tabindex"))),i);
				}
			}
		}else{
			$('#validaBancBloco').css('display','block');
		}

		botaoRemoverBanc();
	});

/*** Remoção de Blocos de Endereços e Dados Bancários *****************/

	$("#remove-area-endereco").click(function(){		
		$(".bloco-area-end" + (contadorBlocoEndereco-1)).remove();
			
		contadorBlocoEndereco--;
		
		for(var i=0; i<=(contadorBlocoEndereco-1); i++){
			if(i == 0){
				tabularEndereco(10);
			}else{
				tabularEndereco(parseInt($('#Endereco'+ (contadorBlocoEndereco-1) +'PontoReferencia').attr("tabindex")));
			}
		}
		
		for(var i=0; i<=(contadorBlocoDadosBanc-1); i++){
			if(i == 0){
				tabularDadosBancarios((parseInt($('#Endereco'+ (contadorBlocoEndereco-1) +'PontoReferencia').attr("tabindex"))),(i-1));
			}else{
				tabularDadosBancarios((parseInt($('#Dadosbancario'+ (i-1) +'Gerente').attr("tabindex"))),i);
			}
		}
		
		botaoRemoverEnd();
	});

	$("#remove-area-dadosbanc").click(function(){		
		$(".bloco-area-banc" + (contadorBlocoDadosBanc-1)).remove();

		contadorBlocoDadosBanc--;
		
		for(var i=0; i<=(contadorBlocoEndereco-1); i++){
			if(i == 0){
				tabularEndereco(10);
			}else{
				tabularEndereco(parseInt($('#Endereco'+ (contadorBlocoEndereco-1) +'PontoReferencia').attr("tabindex")));
			}
		}
		
		for(var i=0; i<=(contadorBlocoDadosBanc-1); i++){
			if(i == 0){
				tabularDadosBancarios((parseInt($('#Endereco'+ (contadorBlocoEndereco-1) +'PontoReferencia').attr("tabindex"))),(i-1));
			}else{
				tabularDadosBancarios((parseInt($('#Dadosbancario'+ (i-1) +'Gerente').attr("tabindex"))),i);
			}
		}
		
		botaoRemoverBanc();
	});
	

/*** Validação Parceiro EDIT ******************************************/
	
	$('#bt-salvarParceiroEdit').on('click',function(e){
		e.preventDefault();
		fieldLength = 0;
		$(".enderecoLength").each(function(){
			fieldLength = fieldLength + 1;
		});
		
		var erro = 0;
		for(i=0; i < fieldLength; i++){
				
				valorCep =$('#Endereco'+i+'Cep').val();
				valorLogradouro = $('#Endereco'+i+'Logradouro').val();
				valorUf = $('#Endereco'+i+'Uf').val();
				valorCidade = $('#Endereco'+i+'Cidade').val();
				valorBairro = $('#Endereco'+i+'Bairro').val();
				
				if($('#ParceirodenegocioNome').val() == ''){
					$('#ParceirodenegocioNome').addClass('shadow-vermelho');
					$('#validaNome').css('display','block');
					erro = erro + 1;
					break;
				}else if($('#ParceirodenegocioCpfCnpj').val() == ''){
					$('#ParceirodenegocioCpfCnpj').addClass('shadow-vermelho');
					$('#validaCPF').css('display','block');
					erro = erro + 1;
					break;
				}else if(($('#ParceirodenegocioCpfCnpj').val().length != 14) && ($('#ParceirodenegocioCpfCnpj').val().length != 18)){
					$('#ParceirodenegocioCpfCnpj').focus();
					$('#validaCPFTamanho').css('display','block');
					erro = erro + 1;
					alert('ParceirodenegocioCpfCnpj');
					break;
				}else if($('#ParceirodenegocioTelefone1').val() == ''){
					$('#ParceirodenegocioTelefone1').addClass('shadow-vermelho');
					$('#validaTelefone').css('display','block');
					erro = erro + 1;
					
					break;
				}else if(valorCep== ''){
					idval= $('#Endereco'+i+'Cep').attr('id');
					$('#'+idval).addClass('shadow-vermelho');
					$('#valida'+i+'Cep1').css('display','block');
					erro = erro + 1;
					break;					
				}else if(valorCep.length < 9){
					idval= $('#Endereco'+i+'Cep').attr('id');
					$('#'+idval).addClass('shadow-vermelho');
					$('#valida'+i+'Cep2').css('display','block');
					erro = erro + 1;
					break;
					
				}else if(valorLogradouro == ''){
					idval= $('#Endereco'+i+'Logradouro').attr('id');
					$('#'+idval).addClass('shadow-vermelho');
					$('#valida'+i+'Logradouro').css('display','block');
					erro = erro + 1;
					break;
				
				}else if(valorUf == ''){
					idval= $('#Endereco'+i+'Uf').attr('id');
					$('#'+idval).addClass('shadow-vermelho');
					$('#valida'+i+'Uf').css('display','block');
					erro = erro + 1;
					break;
				}else if(valorCidade == ''){
					idval= $('#Endereco'+i+'Cidade').attr('id');
					$('#'+idval).addClass('shadow-vermelho');
					$('#valida'+i+'Cidade').css('display','block');
					erro = erro + 1;
					break;
				}else if(valorBairro == ''){
					idval= $('#Endereco'+i+'Bairro').attr('id');
					$('#'+idval).addClass('shadow-vermelho');
					$('#valida'+i+'Bairro').css('display','block');
					erro = erro + 1;
					break;
				}				
		}
			if(erro==0){
				$('#ParceirodenegocioEditForm').submit();
			}

	});



/*** Validação Parceiro ADD *******************************************/
		var email = $("#Contato0Email").val();
		var emailValido=/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			
	$('#bt-salvarParceiroAdd').on('click',function(event){
			 event.preventDefault();
		fieldLength = 0 ;	
		$(".enderecoLength").each(function(){
			fieldLength = fieldLength + 1;
		});
		
		var erro = 0;
		for(i=0; i < fieldLength; i++){
			
				valorTipo = $('#tipo'+i).val();
				valorCep =$('#Endereco'+i+'Cep').val();
				valorLogradouro = $('#Endereco'+i+'Logradouro').val();
				valorUf = $('#Endereco'+i+'Uf').val();
				valorCidade = $('#Endereco'+i+'Cidade').val();
				valorBairro = $('#Endereco'+i+'Bairro').val();				
				
				if($('#ParceirodenegocioClassificacao').val() == ''){
					$('#ParceirodenegocioClassificacao').addClass('shadow-vermelho');
					$('#ParceirodenegocioClassificacao').focus();
					$('#validaClassificacao').css('display','block');
					erro = erro + 1;
					break;
				}else if($('#ParceirodenegocioNome').val() == ''){
					$('#ParceirodenegocioNome').addClass('shadow-vermelho');
					$('#ParceirodenegocioNome').focus();
					$('#validaNome').css('display','block');
					erro = erro + 1;
					break;
				}else if($('#ParceirodenegocioCpfCnpj').val() == ''){
					$('#ParceirodenegocioCpfCnpj').addClass('shadow-vermelho');
					$('#ParceirodenegocioCpfCnpj').focus();
					$('#validaCPF').css('display','block');
					erro = erro + 1;
					break;
				}else if(!emailValido.test(email)){
					$('#Contato0Email').focus().css('border-color','pink');
					$('#Contato0Email').focus();
					$('#validaEmail').css('display','block');
					erro = erro + 1;
					break;
				}else if(($('#ParceirodenegocioCpfCnpj').val().length != 14) && ($('#ParceirodenegocioCpfCnpj').val().length != 18)){
					$('#ParceirodenegocioCpfCnpj').focus();
					$('#validaCPFTamanho').css('display','block');
					erro = erro + 1;
					break;
				}else if($('#ParceirodenegocioTelefone1').val() == ''){
					$('#ParceirodenegocioTelefone1').addClass('shadow-vermelho');
					$('#ParceirodenegocioTelefone1').focus();
					$('#validaTelefone').css('display','block');
					erro = erro + 1;
					break;
				}else if(valorTipo== ''){
					$('#tipo'+i).addClass('shadow-vermelho');
					$('#tipo'+i).focus();
					$('#valida'+i+'Tipo').css('display','block');
					erro = erro + 1;
					break;
				}else if(valorCep== ''){
					idval= $('#Endereco'+i+'Cep').attr('id');
					$('#'+idval).addClass('shadow-vermelho');
					$('#'+idval).focus();
					$('#valida'+i+'Cep1').css('display','block');
					erro = erro + 1;
					break;					
				}else if(valorCep.length < 9){
					idval= $('#Endereco'+i+'Cep').attr('id');
					$('#'+idval).addClass('shadow-vermelho');
					$('#'+idval).focus();
					$('#valida'+i+'Cep2').css('display','block');
					erro = erro + 1;
					break;					
				}else if(valorLogradouro == ''){
					idval= $('#Endereco'+i+'Logradouro').attr('id');
					$('#'+idval).addClass('shadow-vermelho');
					$('#'+idval).focus();
					$('#valida'+i+'Logradouro').css('display','block');
					erro = erro + 1;
					break;				
				}else if(valorUf == ''){
					idval= $('#Endereco'+i+'Uf').attr('id');
					$('#'+idval).addClass('shadow-vermelho');
					$('#'+idval).focus();
					$('#valida'+i+'Uf').css('display','block');
					erro = erro + 1;
					break;
				}else if(valorCidade == ''){
					idval= $('#Endereco'+i+'Cidade').attr('id');
					$('#'+idval).addClass('shadow-vermelho');
					$('#'+idval).focus();
					$('#valida'+i+'Cidade').css('display','block');
					erro = erro + 1;
					break;
				}else if(valorBairro == ''){
					idval= $('#Endereco'+i+'Bairro').attr('id');
					$('#'+idval).addClass('shadow-vermelho');
					$('#'+idval).focus();
					$('#valida'+i+'Bairro').css('display','block');
					erro = erro + 1;
					break;
				}else if($('#Dadoscredito0Limite').val() == '' || $('#Dadoscredito0Limite').val() == '0,00'){
					$('#Dadoscredito0Limite').addClass('shadow-vermelho');
					$('#Dadoscredito0Limite').focus();
					$('#validaLimite').css('display','block');
					erro = erro + 1;
					break;
				}else if($('#Dadoscredito0ValidadeLimite').val() == ''){
					$('#Dadoscredito0ValidadeLimite').addClass('shadow-vermelho');
					$('#Dadoscredito0ValidadeLimite').focus();
					$('#validaValidade1').css('display','block');
					erro = erro + 1;
					break;
				}else if($('#ParceirodenegociosBloqueado').val() == ''){
					$('#ParceirodenegociosBloqueado').addClass('shadow-vermelho');
					$('#ParceirodenegociosBloqueado').focus();
					$('#validaBloqueado').css('display','block');
					erro = erro + 1;
					break;
				}
		}
		if(erro==0){
			$('#ParceirodenegocioAddForm').submit();
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
    
    $("#DadoscreditoValidadeLimite").focusout(function(){
		var dfuturoSaida = $("#DadoscreditoValidadeLimite").val();
		var dataFutura = new Date();

		var anoDigitado = dfuturoSaida.split("/")[2];
		var mesDigitado = dfuturoSaida.split("/")[1];
		var diaDigitado = dfuturoSaida.split("/")[0];

		if(dfuturoSaida != ''){
			if( diaDigitado < 1 || diaDigitado > 31 || mesDigitado < 1 || mesDigitado > 12 || anoDigitado <1900 || dfuturoSaida.length < 6 ){
				$("#validaValidade3").css("display","block");
				$("input[id='DadoscreditoValidadeLimite']").addClass('shadow-vermelho');
				$("#DadoscreditoValidadeLimite").val("");
			}else{
				$("#DadoscreditoValidadeLimite").removeClass('shadow-vermelho');
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
			$("#ParceirodenegocioCpfCnpj").removeAttr("readonly");
			$("#ParceirodenegocioCpfCnpj").css("background-color","#FFFFFF;");
			$("#ParceirodenegocioCpfCnpj").mask("999.999.999-99");//cpf
		}else{
			$("#ParceirodenegocioCpfCnpj").removeAttr("disabled");
			$("#ParceirodenegocioCpfCnpj").removeAttr("readonly");
			$("#ParceirodenegocioCpfCnpj").css("background-color","#FFFFFF;");
			$("#ParceirodenegocioCpfCnpj").mask("99.999.999/9999-99");//cnpj
		}
	});


/*** Mascara Telefone/Celular *************************************************/
	$(".maskTel,.maskCel").on('focusin',function(){
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
		
		if(numeroTel.charAt(0) == '0'){
			$(this).val('');
		}else if(numeroTel.length == 11){
			telPart1 = numeroTel.substring(0,2);
			telPart2 = numeroTel.substring(2,7);
			telPart3 = numeroTel.substring(7,11);
			
			$(this).val('('+ telPart1 +') '+ telPart2 +'-'+ telPart3);
		}else{
			$(this).val(numeroTel);
		}
		
	});

	
	$('#Contato0Email').focusout(function(email){
	    var email = $("#Contato0Email").val();
	    var emailValido=/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

	    if(!emailValido.test(email)){
		$('#Contato0Email').focus().addClass('shadow-vermelho');
		$('#validaEmail').css('display','block');
		return false
	    }
	    
	});
	
/*** Função Tabualção *************************************************/	
	
	tabularDadosGerais();

/*** TESTE SALVAR EDIT *************************************************/	
	var testeTrue = 0;
	$(".mudancaInput").change(function(){
		testeTrue = 1;
	});
	
	$("#bt-addLimite").click(function(){
		if(testeTrue == 0){
			$("#myModal_add-novo_limite").modal('show');
		}else{
			$("#salvarAntes").show();

		}
		
	});
	
		
	
	
});
