$(document).ready(function() {
	var contadorBloco = 1;
	
	$("#add-area-endereco").click(function(){
		
		if($("#Endereco"+ (contadorBloco-1) +"Logradouro").val()){
			$('.area-endereço').append('<hr>\
			<div class="bloco-area-endereço">\
				<section class="coluna-esquerda">\
					<div class="input select">\
						<label for="ParceirodenegocioTipo">Tipo:</label>\
						<select name="data[Parceirodenegocio][tipo]" id="ParceirodenegocioTipo"></select>\
					</div>\
					\
					<div class="inputCliente input text divUf">\
						<label for="Endereco'+ contadorBloco +'Uf">UF<span class="campo-obrigatorio">*</span>:</label>\
						<select name="data[Endereco][0][uf]" id="Endereco'+ contadorBloco +'Uf"></select>\
					</div>\
					<span id="spanEndereco0Uf" class="Msg tooltipMensagemErroDireta" style="display:none">Selecione o Estado</span>\
					\
					<div class="input textarea">\
						<label for="Endereco'+ contadorBloco +'PontoReferencia">Ponto de Referência:</label>\
						<textarea name="data[Endereco][0][ ponto_referencia]" cols="30" rows="6" id="Endereco'+ contadorBloco +'PontoReferencia"></textarea>\
					</div>\
				</section>\
				\
				<section class="coluna-central">\
					<div class="input text">\
						<label for="Endereco'+ contadorBloco +'Logradouro">Logradouro<span class="campo-obrigatorio">*</span>:</label>\
						<input name="data[Endereco][0][logradouro]" class="tamanho-medio" maxlength="150" type="text" id="Endereco'+ contadorBloco +'Logradouro"/>\
					</div>\
					\
					<div class="input select">\
						<label for="Endereco'+ contadorBloco +'Cidade">Cidade<span class="campo-obrigatorio">*</span>:</label>\
						<select name="data[Endereco][0][cidade]" id="Endereco'+ contadorBloco +'Cidade"></select>\
					</div>\
					<span id="spanEndereco'+ contadorBloco +'Cidade" class="Msg tooltipMensagemErroDireta" style="display:none">Selecione a cidade</span>\
				</section>\
				\
				<section class="coluna-direita" >\
					<div class="input text">\
						<label for="Endereco'+ contadorBloco +'Complemento">Complemento:</label>\
						<input name="data[Endereco][0][complemento]" class="tamanho-pequeno" maxlength="150" type="text" id="Endereco'+ contadorBloco +'Complemento"/>\
					</div>\
					\
					<div class="input text">\
						<label for="Endereco'+ contadorBloco +'Bairro">Bairro<span class="campo-obrigatorio">*</span>:</label>\
						<input name="data[Endereco][0][bairro]" class="tamanho-pequeno" maxlength="150" type="text" id="Endereco'+ contadorBloco +'Bairro"/>\
					</div>\
					<span id="spanEndereco'+ contadorBloco +'Bairro" class="Msg tooltipMensagemErroDireta" style="display:none">Preencha o campo bairro</span>\
				</section>\
			<div>');
		
			contadorBloco++;
		}
	});
	
});
