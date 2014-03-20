$(document).ready(function() {

/*** Criação dos Blocos de Endereços e Dados Bancários ****************/

	var contadorBlocoEndereco = 1;
	var contadorBlocoDadosBanc = 1;

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

	$("#add-area-endereco").click(function(){
		
		var logradouro = $("#Endereco"+ (contadorBlocoEndereco-1) +"Logradouro").val();
		var uf = $("#Endereco"+ (contadorBlocoEndereco-1) +"Uf").val();
		var municipio = $("#Endereco"+ (contadorBlocoEndereco-1) +"Cidade").val();
		var bairro = $("#Endereco"+ (contadorBlocoEndereco-1) +"Bairro").val();
		
		var idUf = "Endereco"+ contadorBlocoEndereco +"Uf";
		var idCidade = "Endereco"+ contadorBlocoEndereco +"Cidade";
		
		if(logradouro && uf && municipio && bairro){
			$('.area-endereco').append('<div class="bloco-area-end'+ contadorBlocoEndereco +'">\
				<hr>\
					<section class="coluna-esquerda">\
						<div class="input select">\
							<label for="ParceirodenegocioTipo">Tipo:</label>\
							<select name="data[Parceirodenegocio][tipo]" id="ParceirodenegocioTipo">\
								<option value="1">Cobrança</option>\
								<option value="2">Entrega</option>\
							</select>\
						</div>\
						\
						<div class="inputCliente input text divUf">\
							<label for="Endereco'+ contadorBlocoEndereco +'Uf">UF<span class="campo-obrigatorio">*</span>:</label>\
							<select name="data[Endereco]['+ contadorBlocoEndereco +'][uf]" id="Endereco'+ contadorBlocoEndereco +'Uf"></select>\
						</div>\
						<span id="valida'+ contadorBlocoEndereco +'Uf" class="Msg-tooltipDireita" style="display:none">Selecione o Estado</span>\
						\
						<div class="input textarea">\
							<label for="Endereco'+ contadorBlocoEndereco +'PontoReferencia">Ponto de Referência:</label>\
							<textarea name="data[Endereco]['+ contadorBlocoEndereco +'][ ponto_referencia]" cols="30" rows="6" id="Endereco'+ contadorBlocoEndereco +'PontoReferencia"></textarea>\
						</div>\
					</section>\
					\
					<section class="coluna-central">\
						<div class="input text">\
							<label for="Endereco'+ contadorBlocoEndereco +'Logradouro">Logradouro<span class="campo-obrigatorio">*</span>:</label>\
							<input name="data[Endereco]['+ contadorBlocoEndereco +'][logradouro]" class="tamanho-medio" maxlength="150" type="text" id="Endereco'+ contadorBlocoEndereco +'Logradouro"/>\
						</div>\
						<span id="valida'+ contadorBlocoEndereco +'Logradouro" class="Msg-tooltipDireita" style="display:none">Preencha o Logradouro</span>\
						\
						<div class="input select">\
							<label for="Endereco'+ contadorBlocoEndereco +'Cidade">Cidade<span class="campo-obrigatorio">*</span>:</label>\
							<select name="data[Endereco]['+ contadorBlocoEndereco +'][cidade]" id="Endereco'+ contadorBlocoEndereco +'Cidade"></select>\
						</div>\
						<span id="valida'+ contadorBlocoEndereco +'Cidade" class="Msg-tooltipDireita" style="display:none">Selecione o Cidade</span>\
					</section>\
					\
					<section class="coluna-direita" >\
						<div class="input text">\
							<label for="Endereco'+ contadorBlocoEndereco +'Complemento">Complemento:</label>\
							<input name="data[Endereco]['+ contadorBlocoEndereco +'][complemento]" class="tamanho-pequeno" maxlength="150" type="text" id="Endereco'+ contadorBlocoEndereco +'Complemento"/>\
						</div>\
						\
						<div class="input text">\
							<label for="Endereco'+ contadorBlocoEndereco +'Bairro">Bairro<span class="campo-obrigatorio">*</span>:</label>\
							<input name="data[Endereco]['+ contadorBlocoEndereco +'][bairro]" class="tamanho-pequeno" maxlength="150" type="text" id="Endereco'+ contadorBlocoEndereco +'Bairro"/>\
						</div>\
						<span id="valida'+ contadorBlocoEndereco +'Bairro" class="Msg-tooltipAbaixo" style="display:none">Preencha o Bairro</span>\
					</section>\
				<div>');
				
			$('.bloco-area-end'+ contadorBlocoEndereco).hide().fadeIn(2000);
			
			contadorBlocoEndereco++;
		}

		new dgCidadesEstados({
			estado: $('#'+idUf).get(0),
			cidade: $('#'+idCidade).get(0)
		});
			
		botaoRemoverEnd();
	});
	
	$("#add-area-dadosbanc").click(function(){
		
		var agencia = $("#Dadosbancario"+ (contadorBlocoDadosBanc-1) +"NumeroAgencia").val();
		var conta = $("#DadosbancarioConta"+ (contadorBlocoDadosBanc-1)).val();
		
		alert(agencia +' '+ conta);
		
		if(conta && agencia){
			$('.area-dadosbanc').append('<div class="bloco-area-banc'+ contadorBlocoDadosBanc +'">\
					<hr>\
					<section class="coluna-esquerda">\
						<div class="input text">\
							<label for="DadosbancarioNomeBanco">Nome do Banco:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][nome_banco]" class="tamanho-medio" maxlength="15" type="text" id="Dadosbancario'+ contadorBlocoDadosBanc +'NomeBanco"/>\
						</div>\
						\
						<div class="input text">\
							<label for="DadosbancarioNumeroAgencia">Número da Agência:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][numero_agencia]" class="tamanho-pequeno" maxlength="15" type="text" id="Dadosbancario'+ contadorBlocoDadosBanc +'NumeroAgencia"/>\
						</div>\
						\
						<div class="input text">\
							<label for="DadosbancarioGerente">Gerente:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][gerente]" class="tamanho-pequeno" maxlength="100" type="text" id="Dadosbancario'+ contadorBlocoDadosBanc +'Gerente"/>\
						</div>\
					</section>\
					\
					<section class="coluna-central" >\
						<div class="input text">\
							<label for="DadosbancarioNumeroBanco">Número do Banco:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][numero_banco]" class="tamanho-medio" maxlength="100" type="text" id="Dadosbancario'+ contadorBlocoDadosBanc +'NumeroBanco"/>\
						</div>\
						\
						<div class="input text">\
							<label for="DadosbancarioConta'+ contadorBlocoDadosBanc +'">Conta:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][conta]" class="tamanho-pequeno" maxlength="110" type="text" id="DadosbancarioConta'+ contadorBlocoDadosBanc +'"/>\
						</div>\
					</section>\
					\
					<section class="coluna-direita" >\
						<div class="input text">\
							<label for="DadosbancarioNomeAgencia">Nome da Agência:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][nome_agencia]" class="tamanho-pequeno" maxlength="100" type="text" id="Dadosbancario'+ contadorBlocoDadosBanc +'NomeAgencia"/>\
						</div>\
						\
						<div class="input text">\
							<label for="DadosbancarioTelefoneBanco">Telefone:</label>\
							<input name="data[Dadosbancario]['+ contadorBlocoDadosBanc +'][telefone_banco]" class="tamanho-pequeno" maxlength="30" type="text" id="Dadosbancario'+ contadorBlocoDadosBanc +'TelefoneBanco"/>\
						</div>\
					</section>\
				<div>');
				
			$('.bloco-area-banc'+ contadorBlocoDadosBanc).hide().fadeIn(2000);

			contadorBlocoDadosBanc++;
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
		
		if($('#ParceirodenegocioClassificacao').val() == 0){
			$('#ParceirodenegocioClassificacao').addClass('shadow-vermelho');
			$('#validaClassificacao').css('display','block');
			return false;
		}else if($('#ParceirodenegocioNome').val() == ''){
			$('#ParceirodenegocioNome').addClass('shadow-vermelho');
			$('#validaNome').css('display','block');
			return false;
		}else if(($('#ParceirodenegocioCpfCnpj').val().length != 14) && ($('#ParceirodenegocioCpfCnpj').val().length != 18)){
			$('#ParceirodenegocioCpfCnpj').addClass('shadow-vermelho');
			$('#validaCPFTamanho').css('display','block');
			return false;
		}else if($('#ParceirodenegocioCpfCnpj').val() == ''){
			$('#ParceirodenegocioCpfCnpj').addClass('shadow-vermelho');
			$('#validaCPF').css('display','block');
			return false;
		}else if($('#ParceirodenegocioTelefone1').val() == ''){
			$('#ParceirodenegocioTelefone1').addClass('shadow-vermelho');
			$('#validaTelefone').css('display','block');
			return false;
		}else if($('#Endereco'+ (contadorBlocoEndereco-1) +'Logradouro').val() == ''){
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Logradouro').addClass('shadow-vermelho');
			$('#valida'+ (contadorBlocoEndereco-1) +'Logradouro').css('display','block');
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
			$('#valida'+ (contadorBlocoEndereco-1) +'Bairro').css('display','block');
			return false;
		}else if(($('#Dadoscredito0Limite').val() == '') && ($('#ParceirodenegocioClassificacao').val() == 'CLIENTE')){
			$('#Dadoscredito0Limite').addClass('shadow-vermelho');
			$('#validaLimite').css('display','block');
			return false;
		}else if(($('#Dadoscredito0ValidadeLimite').val() == '') && ($('#ParceirodenegocioClassificacao').val() == 'CLIENTE')){
			$('#Dadoscredito0ValidadeLimite').addClass('shadow-vermelho');
			$('#validaValidade').css('display','block');
			return false;
		}else if(($('#Dadoscredito0Status').val() == 0) && ($('#ParceirodenegocioClassificacao').val() == 'CLIENTE')){
			$('#Dadoscredito0Status').addClass('shadow-vermelho');
			$('#validaStatus').css('display','block');
			return false;
		}else if(($('#Dadoscredito0Bloqueado').val() == '') && ($('#ParceirodenegocioClassificacao').val() == 'CLIENTE')){
			$('#Dadoscredito0Bloqueado').addClass('shadow-vermelho');
			$('#validaBloqueado').css('display','block');
			return false;
		}else{
			return true;
		}

	});

/*** Máscara **********************************************************/
	jQuery(function($){
		$(".agencia").mask("9999-9");
		$(".maskTelefone").mask("(99) 9999-9999")
	});	
	
	$('.maskcpf').focusout(function(){
	
		var digitos = this.value;
		
		if($(".maskcpf").val().length == 11 ){
			var parte1 = digitos.substring(0,3);
			var parte2 = digitos.substring(3,6);
			var parte3 = digitos.substring(6,9);
			var parte4 = digitos.substring(9,11);
			$(".maskcpf").val(parte1+'.'+parte2+'.'+parte3+'-'+parte4);
		}else if(($(".maskcpf").val().length == 14) && (($(".maskcpf").val().indexOf('/') != -1) || ($(".maskcpf").val().indexOf('.') == -1))){
			var parte1 = digitos.substring(0,2);
			var parte2 = digitos.substring(2,5);
			var parte3 = digitos.substring(5,8);
			var parte4 = digitos.substring(8,12);
			var parte5 = digitos.substring(12,14);
			$(".maskcpf").val(parte1+'.'+parte2+'.'+parte3+'/'+parte4+'-'+parte5);
		}else if ($(".maskcpf").val().length == 18){
			$(".maskcpf").val();
		}
	});	

});
