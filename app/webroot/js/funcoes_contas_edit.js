$(document).ready(function(){

/**** EDITAR UMA PARCELA PARTE 1 ********************************************/
    
    var numero;
    var parcelaAtual;
    var numeroAnt;
    
    $("body").on("click",'.editarParcela', function(){
	
	//salva valor atual da parcela
	parcelaAtual=$('#idParc').val();
	
	//pega id da linha
	id = $(this).attr('id');
	numero = id.substr(9);
		
	//recebe parcela antiga da linha
	parcelaAnt=$('#idParc'+numero).text();
	identificacaoAnt = $('#docParc'+numero).text();
	dataVencimentoAnt = $('#venciParc'+numero).text();
	valorAnt = $('#valorParc'+numero).text();
	periodocriticoAnt = $('#perioParc'+numero).text();
	descontoAnt = $('#descParc'+numero).text();
	agenciaAnt = $('#agenciaParc'+numero).text();
	contaAnt = $('#contaParc'+numero).text();
	bancoAnt = $('#bancoParc'+numero).text();
	
	//adiciona devolta na input
	$('#ParcelaParcela').val(parcelaAnt);
	$('#ParcelaIdentificacao').val(identificacaoAnt);
	$('#ParcelaDataVencimento').val(dataVencimentoAnt);
	$('#ParcelaValor').val(valorAnt);
	$('#PagarPeriodocritico').val(periodocriticoAnt);
	$('#ParcelaDesconto').val(descontoAnt);
	$('#ParcelaAgencia').val(agenciaAnt);
	$('#ParcelaConta').val(contaAnt);
	$('#ParcelaBanco').val(bancoAnt);

	//troca botoes
	$('#bt-addParcela').hide();
	$('#bt-editarParcela').show();
	
	//remove a borda antes de adicionar
	$('#linhaParc'+numeroAnt).removeClass('shadow-vermelho');
	
	//adicona borda vermelha
	$('#linhaParc'+numero).addClass('shadow-vermelho');
	
	//recebe numero antigo
	numeroAnt= numero;
	
    });
    
/**** EDITAR UMA PARCELA PARTE 2 ********************************************/
    $('#bt-editarParcela').click(function(){
	
	//percorre a td
	$('#linhaParc'+numero).each(function(){
	   
	    //recebe valores digitados
	    identificacao = $('#identificacaoPagar').val();
	    dataVencimento = $('#ContaspagarDataVencimento').val();
	    valor = $('#valorPagar').val();
	    periodocritico = $('#PagarPeriodocritico').val();
	    
	    desconto = $('#ContaspagarDesconto').val();
	    agencia = $('#ContaspagarAgencia').val();
	    conta = $('#ContaspagarConta').val();
	    banco = $('#ContaspagarBanco').val();
	    
	    //certifica que parcelas são iguais
	    if($(this).text() == $('#ContaspagarParcela').val()){
		
		//substitui valor
		$('#ident'+numero).text(identificacao);
		$('#dataVenc'+numero).text(dataVencimento);
		$('#valorTabela'+numero).text(valor);
		$('#periodocrit'+numero).text(periodocritico);
		$('#descontoTabela'+numero).text(desconto);
		$('#agenciaTabela'+numero).text(agencia);
		$('#contaTabela'+numero).text(conta);
		$('#bancoTabela'+numero).text(banco);
		
		//remove campos hidden
		$('.clonadoProduto'+numero).remove();
		
		//substitui campos hidden
		$('fieldset-total').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][parcela] step="any"  id="ParcelaParcela'+numero+'parcela" value="'+parcelaAnt+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][identificacao_documento] step="any"  id="ParcelaIdentificacaoDocumento'+numero+'identificacao_documento" value="'+identificacao+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][data_vencimento] step="any"  id="ParceladataVencimentoPagar'+numero+'data_vencimento" value="'+dataVencimento+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][valor] step="any"  id="ParcelavalorContaPagar'+numero+'valor" value="'+valor.replace(",", ".")+'" type="hidden"></div> ');
		
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][periodocritico] step="any"  id="ParcelaPeriodocritico'+numero+'periodocritico" value="'+periodocritico+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][desconto] step="any"  id="ParcelaDesconto'+numero+'desconto" value="'+desconto.replace(",", ".")+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][agencia] step="any"  id="ParcelaAgencia'+numero+'agencia" value="'+agencia+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][conta] step="any"  id="ParcelaConta'+numero+'conta" value="'+conta+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][banco] step="any"  id="ParcelaBanco'+numero+'banco" value="'+banco+'" type="hidden"></div> ');

	    }
	    
	    //parcela recebe numero antigo e troca botoes
	    $('#ContaspagarParcela').val(parcelaAtual);
	    $('#bt-adicionarConta-pagar').show();
	    $('#bt-editarConta-pagar').hide();
	
	    //limpa campos
	    $('#identificacaoPagar').val('');
	    $('#ContaspagarDataVencimento').val('');
	    $('#valorPagar').val('');
	    $('#PagarPeriodocritico').val('');
	    $('#ContaspagarDesconto').val('');
	    $('#ContaspagarAgencia').val('');
	    $('#ContaspagarConta').val('');
	    $('#ContaspagarBanco').val('');
	   
	});

	
});













