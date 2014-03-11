 $(document).ready(function() {
    
    //esconde botão editar
    $('#bt-editarConta-pagar').hide();
    
/********** Adicionar na tabela Principal ****************/
    
    var princ_cont = 0;
    var numeroParcela =1;
    var numParcela = 0;
     
    //recebe valor
    $('#ContaParcela').val(numeroParcela);
    
    $('#bt-adicionarConta-pagar').click(function(e){

	e.preventDefault();
	
	//recebe valores digitados
	identificacao = $('#identificacaoPagar').val();
	dataVencimento = $('#ContaDataVencimento').val();
	valor = $('#valorPagar').val();
	periodocritico = $('#ContaPeriodoCritico').val();
	
	desconto = $('#ContaDesconto').val();
	agencia = $('#ContaAgencia').val();
	conta = $('#ContaConta').val();
	banco = $('#ContaBanco').val();
	
	//adiciona a tabela
	$('#tabela-conta-pagar').append('<tr id="parcelaCont'+princ_cont+'"><td id="numParc'+princ_cont+'">'+numeroParcela+'</td><td id="ident'+princ_cont+'">'+identificacao+'</td><td id="dataVenc'+princ_cont+'">'+dataVencimento+'</td><td id="valorTabela'+princ_cont+'">'+valor+'</td><td id="periodocrit'+princ_cont+'">'+periodocritico+'</td><td id="descontoTabela'+princ_cont+'">'+desconto+'</td><td id="agenciaTabela'+princ_cont+'">'+agencia+'</td><td id="contaTabela'+princ_cont+'">'+conta+'</td><td id="bancoTabela'+princ_cont+'">'+banco+'</td><td><img title="Editar" alt="Editar" src="/lifecare/app/webroot/img/botao-tabela-editar.png" id=clonado'+princ_cont+' class="btnEditar"/>  <img title="Remover" alt="Editar" src="/lifecare/app/webroot/img/lixeira.png" id=clonado'+princ_cont+' class="btnExcluir"/></td></tr>');
		
	
	//limpa campos
	$('#identificacaoPagar').val('');
	$('#ContaDataVencimento').val('');
	$('#valorPagar').val('');
	$('#ContaPeriodoCritico').val('');
	$('#ContaDesconto').val('');
	$('#ContaAgencia').val('');
	$('#ContaConta').val('');
	$('#ContaBanco').val('');
	
	//campos hidden
	$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Conta]['+princ_cont+'][parcela] step="any"  id="ParcelaParcela'+princ_cont+'parcela" value="'+numeroParcela+'" type="hidden"></div> ');
	$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Conta]['+princ_cont+'][identificacao_documento] step="any"  id="ParcelaIdentificacaoDocumento'+princ_cont+'identificacao_documento" value="'+identificacao+'" type="hidden"></div> ');
	$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Conta]['+princ_cont+'][data_vencimento] step="any"  id="ParceladataVencimento-receber'+princ_cont+'data_vencimento" value="'+dataVencimento+'" type="hidden"></div> ');
	$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Conta]['+princ_cont+'][valor] step="any"  id="ParcelavalorConta-receber'+princ_cont+'valor" value="'+valor.replace(",", ".")+'" type="hidden"></div> ');
	
	$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Conta]['+princ_cont+'][periodocritico] step="any"  id="ParcelaPeriodocritico'+princ_cont+'periodocritico" value="'+periodocritico+'" type="hidden"></div> ');
	$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Conta]['+princ_cont+'][desconto] step="any"  id="ParcelaDesconto'+princ_cont+'desconto" value="'+desconto.replace(",", ".")+'" type="hidden"></div> ');
	$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Conta]['+princ_cont+'][agencia] step="any"  id="ParcelaAgencia'+princ_cont+'agencia" value="'+agencia+'" type="hidden"></div> ');
	$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Conta]['+princ_cont+'][conta] step="any"  id="ParcelaConta'+princ_cont+'conta" value="'+conta+'" type="hidden"></div> ');
	$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Conta]['+princ_cont+'][banco] step="any"  id="ParcelaBanco'+princ_cont+'banco" value="'+banco+'" type="hidden"></div> ');
	
	princ_cont++;
	numeroParcela++;
	numParcela++;
	
	//incrementa 1 a parcela
	$('#ContaParcela').val(numeroParcela)	
	$('#ContaNumeroParcelas').val(numParcela);
    });
        
    
/****************** Altera linha da tabela *********************/
    $('#bt-editarConta-pagar').click(function(){
	
	//percorre a td
	$('#numParc'+numero).each(function(){
	   
	    //recebe valores digitados
	    identificacao = $('#identificacaoPagar').val();
	    dataVencimento = $('#ContaDataVencimento').val();
	    valor = $('#valorPagar').val();
	    periodocritico = $('#ContaPeriodoCritico').val();
	    
	    desconto = $('#ContaDesconto').val();
	    agencia = $('#ContaAgencia').val();
	    conta = $('#ContaConta').val();
	    banco = $('#ContaBanco').val();
	    
	    //certifica que parcelas são iguais
	    if($(this).text() == $('#ContaParcela').val()){
		
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
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][parcela] step="any"  id="ParcelaParcela'+numero+'parcela" value="'+parcelaAnt+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][identificacao_documento] step="any"  id="ParcelaIdentificacaoDocumento'+numero+'identificacao_documento" value="'+identificacao+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][data_vencimento] step="any"  id="ParceladataVencimento-receber'+numero+'data_vencimento" value="'+dataVencimento+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][valor] step="any"  id="ParcelavalorConta-receber'+numero+'valor" value="'+valor.replace(",", ".")+'" type="hidden"></div> ');
		
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][periodocritico] step="any"  id="ParcelaPeriodocritico'+numero+'periodocritico" value="'+periodocritico+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][desconto] step="any"  id="ParcelaDesconto'+numero+'desconto" value="'+desconto.replace(",", ".")+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][agencia] step="any"  id="ParcelaAgencia'+numero+'agencia" value="'+agencia+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][conta] step="any"  id="ParcelaConta'+numero+'conta" value="'+conta+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][banco] step="any"  id="ParcelaBanco'+numero+'banco" value="'+banco+'" type="hidden"></div> ');

	    }
	    
	    //parcela recebe numero antigo e troca botoes
	    $('#ContaParcela').val(parcelaAtual);
	    $('#bt-adicionarConta-pagar').show();
	    $('#bt-editarConta-pagar').hide();
	
	    //limpa campos
	    $('#identificacaoPagar').val('');
	    $('#ContaDataVencimento').val('');
	    $('#valorPagar').val('');
	    $('#ContaPeriodoCritico').val('');
	    $('#ContaDesconto').val('');
	    $('#ContaAgencia').val('');
	    $('#ContaConta').val('');
	    $('#ContaBanco').val('');
	   
	});
	
	//remove borda vermelha
	$('#parcelaCont'+numero).removeClass('shadow-vermelho');
    
	
    });
    
/********* Função Editar da tabela ******************/
    
    
    var numero;
    var parcelaAtual;
    
    $("body").on("click",'.btnEditar', function(e){
	
	//salva valor atual da parcela
	parcelaAtual=$('#ContaParcela').val();
	
	//pega id da linha
	id = $(this).attr('id');
	numero = id.substr(7);
		
	//recebe parcela antiga da linha
	parcelaAnt=$('#numParc'+numero).text();
	identificacaoAnt = $('#ident'+numero).text();
	dataVencimentoAnt = $('#dataVenc'+numero).text();
	valorAnt = $('#valorTabela'+numero).text();
	periodocriticoAnt = $('#periodocrit'+numero).text();
	descontoAnt = $('#descontoTabela'+numero).text();
	agenciaAnt = $('#agenciaTabela'+numero).text();
	contaAnt = $('#contaTabela'+numero).text();
	bancoAnt = $('#bancoTabela'+numero).text();
	
	//adiciona devolta na input
	$('#ContaParcela').val(parcelaAnt);
	$('#identificacaoPagar').val(identificacaoAnt);
	$('#ContaDataVencimento').val(dataVencimentoAnt);
	$('#valorPagar').val(valorAnt);
	$('#ContaPeriodoCritico').val(periodocriticoAnt);
	$('#ContaDesconto').val(descontoAnt);
	$('#ContaAgencia').val(agenciaAnt);
	$('#ContaConta').val(contaAnt);
	$('#ContaBanco').val(bancoAnt);

	//troca botoes
	$('#bt-adicionarConta-pagar').hide();
	$('#bt-editarConta-pagar').show();
	
	//adicona borda vermelha
	$('#parcelaCont'+numero).addClass('shadow-vermelho');
    });


/*********** Botão excluir uma parcela da tabela ***********/	
	$("body").on("click",'.btnExcluir', function(e){
		
		//pega id da linha
		var td = $(this).parent();
        var trPar = td.parent();
        var trId = trPar.attr('id');
        var tr = trId.substr(11);
        
        //alert(tr);
        
        //Remove a linha
		trPar.fadeOut(400, function(){
            trPar.remove();
            
			contadortr = 0;
			var tabelatr = $('#tabela-conta-pagar tbody tr');
			
			tabelatr.each(function(){
				//alert($(this).attr('id'));
				$(this).attr('id','parcelaCont'+contadortr);
				contadortr++;
			});
			
			contadortd = 0;
			var tabelatd = $('#tabela-conta-pagar tbody tr td:first-child');
			tabelatd.each(function(){
				//alert($(this).attr('id'));
				$(this).attr('id','numParc'+contadortd);
				contadortd++;
			});
			
			contadortext = 0;
			var tabelatext = $('#tabela-conta-pagar tbody tr td:first-child');
			tabelatext.each(function(){
				//alert($(this).attr('id'));
				$(this).text(contadortext+1);
				contadortext++;
			});
			
			princ_cont = tabelatr;
			numeroParcela = contadortext+1;
			numParcela = contadortext;
			
			$('#ContaParcela').val(numeroParcela)	
			$('#ContaNumeroParcelas').val(numParcela);
        });       
        	
        
	});
	


/*********** Tira virgula e coloca ponto antes do submit ***********/	
	$('#btn-salvarContaPagar').click(function(){
	    
	    //pega valor
	    ContaValorAux = $('#ContaValor').val();
	    
	    //retira a virgula
	    $('input[id="ContaValor"]').val(ContaValorAux.replace(',','.'));
	});
});
