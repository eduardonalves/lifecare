$(document).ready(function() {

/*** Criação dos Blocos de Endereços e Dados Bancários ****************/

	var contadorBlocoEndereco = 1;
	var contadorBlocoDadosBanc = 1;

	$("#add-area-endereco").click(function(){
		
		var logradouro = $("#Endereco"+ (contadorBlocoEndereco-1) +"Logradouro").val();
		var uf = $("#Endereco"+ (contadorBlocoEndereco-1) +"Uf").val();
		var municipio = $("#Endereco"+ (contadorBlocoEndereco-1) +"Cidade").val();
		var bairro = $("#Endereco"+ (contadorBlocoEndereco-1) +"Bairro").val();
		
		var idUf = "Endereco"+ contadorBlocoEndereco +"Uf";
		var idCidade = "Endereco"+ contadorBlocoEndereco +"Cidade";
		
		if(logradouro && uf && municipio && bairro){
			$('.area-endereço').append('<hr>\
				<div class="bloco-area">\
					<section class="coluna-esquerda">\
						<div class="input select">\
							<label for="ParceirodenegocioTipo">Tipo:</label>\
							<select name="data[Parceirodenegocio][tipo]" id="ParceirodenegocioTipo"></select>\
						</div>\
						\
						<div class="inputCliente input text divUf">\
							<label for="Endereco'+ contadorBlocoEndereco +'Uf">UF<span class="campo-obrigatorio">*</span>:</label>\
							<select name="data[Endereco][0][uf]" id="Endereco'+ contadorBlocoEndereco +'Uf"></select>\
						</div>\
						<span id="spanEndereco0Uf" class="Msg tooltipMensagemErroDireta" style="display:none">Selecione o Estado</span>\
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
						\
						<div class="input select">\
							<label for="Endereco'+ contadorBlocoEndereco +'Cidade">Cidade<span class="campo-obrigatorio">*</span>:</label>\
							<select name="data[Endereco]['+ contadorBlocoEndereco +'][cidade]" id="Endereco'+ contadorBlocoEndereco +'Cidade"></select>\
						</div>\
						<span id="spanEndereco'+ contadorBlocoEndereco +'Cidade" class="Msg tooltipMensagemErroDireta" style="display:none">Selecione a cidade</span>\
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
						<span id="spanEndereco'+ contadorBlocoEndereco +'Bairro" class="Msg tooltipMensagemErroDireta" style="display:none">Preencha o campo bairro</span>\
					</section>\
				<div>');

			contadorBlocoEndereco++;
		}

		new dgCidadesEstados({
			estado: $('#'+idUf).get(0),
			cidade: $('#'+idCidade).get(0)
		});
		
	});
	
	$("#add-area-dadosbanc").click(function(){
		
		var agencia = $("#Dadosbancario"+ (contadorBlocoDadosBanc-1) +"NumeroAgencia").val();
		var conta = $("#DadosbancarioConta"+ (contadorBlocoDadosBanc-1) +"").val();
		
		alert(agencia +' '+ conta);
		
		if(conta && agencia){
			$('.area-dadosbanc').append('<hr>\
				<div class="bloco-area">\
					<section class="coluna-esquerda">\
						<div class="input text">\
							<label for="DadosbancarioNomeBanco">Nome do Banco:</label>\
							<input name="data[Dadosbancario][nome_banco]" class="tamanho-medio" maxlength="15" type="text" id="DadosbancarioNomeBanco"/>\
						</div>\
						\
						<div class="input text">\
							<label for="DadosbancarioNumeroAgencia">Númeor da Agência:</label>\
							<input name="data[Dadosbancario][numero_agencia]" class="tamanho-pequeno" maxlength="15" type="text" id="DadosbancarioNumeroAgencia"/>\
						</div>\
						\
						<div class="input text">\
							<label for="DadosbancarioGerente">Gerente:</label>\
							<input name="data[Dadosbancario][gerente]" class="tamanho-pequeno" maxlength="100" type="text" id="DadosbancarioGerente"/>\
						</div>\
					</section>\
					\
					<section class="coluna-central" >\
						<div class="input text">\
							<label for="DadosbancarioNumeroBanco">Número do Banco:</label>\
							<input name="data[Dadosbancario][numero_banco]" class="tamanho-medio" maxlength="100" type="text" id="DadosbancarioNumeroBanco"/>\
						</div>\
						\
						<div class="input text">\
							<label for="DadosbancarioConta">Conta:</label>\
							<input name="data[Dadosbancario][conta]" class="tamanho-pequeno" maxlength="110" type="text" id="DadosbancarioConta'+ contadorBlocoDadosBanc +'"/>\
						</div>\
					</section>\
					\
					<section class="coluna-direita" >\
						<div class="input text">\
							<label for="DadosbancarioNomeAgencia">Nome da Agência:</label>\
							<input name="data[Dadosbancario][nome_agencia]" class="tamanho-pequeno" maxlength="100" type="text" id="DadosbancarioNomeAgencia"/>\
						</div>\
						\
						<div class="input text">\
							<label for="DadosbancarioTelefoneBanco">Telefone:</label>\
							<input name="data[Dadosbancario][telefone_banco]" class="tamanho-pequeno" maxlength="30" type="text" id="DadosbancarioTelefoneBanco"/>\
						</div>\
					</section>\
				<div>');

			contadorBlocoDadosBanc++;
		}
	});


/*** Visualização de Créditos *****************************************/

	if(($('#ParceirodenegocioTipo').val() == 1) || ($('#ParceirodenegocioTipo').val() == 'CLIENTE')){
		$('.areaCliente').css('display','inline-block');
	}else{
		$('.areaCliente').css('display','none');
	}

	$('#ParceirodenegocioTipo').change(function(){
		if($('#ParceirodenegocioTipo').val() == 1){
			$('.areaCliente').css('display','inline-block');
		}else{
			$('.areaCliente').css('display','none');
		}
	});


/*** Validação ********************************************************/
	$('#ParceirodenegocioAddForm').submit(function(event){
		event.preventDefault();
	});
});



























