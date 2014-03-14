 $(document).ready(function() {
    
    //esconde botão editar
    $('#bt-editarConta-pagar').hide();
    
/********** Adicionar na tabela Principal ****************/
    
    var princ_cont = 0;
    var numeroParcela =1;
    var numParcela = 0;
     
    //recebe valor
    $('#ContapagarParcela').val(numeroParcela);
    
    $('#bt-adicionarConta-pagar').click(function(e){

	e.preventDefault();
	
	//recebe valores digitados
	identificacao = $('#identificacaoPagar').val();
	dataVencimento = $('#ContapagarDataVencimento').val();
	valor = $('#valorPagar').val();
	periodocritico = $('#PagarPeriodocritico').val();
	
	desconto = $('#ContapagarDesconto').val();
	agencia = $('#ContapagarAgencia').val();
	conta = $('#ContapagarConta').val();
	banco = $('#ContapagarBanco').val();
	
	//soluciona problema de apagar contagem
	princ_cont = numParcela;
	
	//adiciona a tabela
	$('#tabela-conta-pagar').append('<tr id="parcelaCont'+princ_cont+'"><td id="numParc'+princ_cont+'">'+numeroParcela+'</td><td id="ident'+princ_cont+'">'+identificacao+'</td><td id="dataVenc'+princ_cont+'">'+dataVencimento+'</td><td id="valorTabela'+princ_cont+'">'+valor+'</td><td id="periodocrit'+princ_cont+'">'+periodocritico+'</td><td id="descontoTabela'+princ_cont+'">'+desconto+'</td><td id="agenciaTabela'+princ_cont+'">'+agencia+'</td><td id="contaTabela'+princ_cont+'">'+conta+'</td><td id="bancoTabela'+princ_cont+'">'+banco+'</td><td><img title="Editar" alt="Editar" src="/lifecare/app/webroot/img/botao-tabela-editar.png" id=clonado'+princ_cont+' class="btnEditar"/> <img title="Remover" alt="Remover" src="/lifecare/app/webroot/img/lixeira.png" id=clonado'+princ_cont+' class="btnExcluir"/></td></tr>');
		
	
	//limpa campos
	$('#identificacaoPagar').val('');
	$('#ContapagarDataVencimento').val('');
	$('#valorPagar').val('');
	$('#PagarPeriodocritico').val('');
	$('#ContapagarDesconto').val('');
	$('#ContapagarAgencia').val('');
	$('#ContapagarConta').val('');
	$('#ContapagarBanco').val('');
	
	//campos hidden
	$('.fieldset-total').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Parcela]['+princ_cont+'][parcela] step="any" id="Parcela'+princ_cont+'" value="'+numeroParcela+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][identificacao_documento] step="any"  id="ParcelaIdentificacaoDocumento'+princ_cont+'" value="'+identificacao+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][data_vencimento] step="any"  id="ParceladataVencimento-receber'+princ_cont+'" value="'+dataVencimento+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][valor] step="any"  id="ParcelavalorConta-receber'+princ_cont+'" value="'+valor.replace(",", ".")+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][periodocritico] step="any"  id="ParcelaPeriodocritico'+princ_cont+'" value="'+periodocritico+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][desconto] step="any"  id="ParcelaDesconto'+princ_cont+'" value="'+desconto.replace(",", ".")+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][agencia] step="any"  id="ParcelaAgencia'+princ_cont+'" value="'+agencia+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][conta] step="any"  id="ParcelaConta'+princ_cont+'" value="'+conta+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][banco] step="any"  id="ParcelaBanco'+princ_cont+'" value="'+banco+'" type="hidden"></div>');
	
	princ_cont++;
	numeroParcela++;
	numParcela++;
	
	//incrementa 1 a parcela
	$('#ContapagarParcela').val(numeroParcela)	
	$('#ContaNumeroParcelas').val(numParcela);
    });
        
    
/****************** Altera linha da tabela *********************/
    $('#bt-editarConta-pagar').click(function(){
	
	//percorre a td
	$('#numParc'+numero).each(function(){
	   
	    //recebe valores digitados
	    identificacao = $('#identificacaoPagar').val();
	    dataVencimento = $('#ContapagarDataVencimento').val();
	    valor = $('#valorPagar').val();
	    periodocritico = $('#PagarPeriodocritico').val();
	    
	    desconto = $('#ContapagarDesconto').val();
	    agencia = $('#ContapagarAgencia').val();
	    conta = $('#ContapagarConta').val();
	    banco = $('#ContapagarBanco').val();
	    
	    //certifica que parcelas são iguais
	    if($(this).text() == $('#ContapagarParcela').val()){
		
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
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][data_vencimento] step="any"  id="ParceladataVencimento-receber'+numero+'data_vencimento" value="'+dataVencimento+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][valor] step="any"  id="ParcelavalorConta-receber'+numero+'valor" value="'+valor.replace(",", ".")+'" type="hidden"></div> ');
		
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][periodocritico] step="any"  id="ParcelaPeriodocritico'+numero+'periodocritico" value="'+periodocritico+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][desconto] step="any"  id="ParcelaDesconto'+numero+'desconto" value="'+desconto.replace(",", ".")+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][agencia] step="any"  id="ParcelaAgencia'+numero+'agencia" value="'+agencia+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][conta] step="any"  id="ParcelaConta'+numero+'conta" value="'+conta+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Conta]['+numero+'][banco] step="any"  id="ParcelaBanco'+numero+'banco" value="'+banco+'" type="hidden"></div> ');

	    }
	    
	    //parcela recebe numero antigo e troca botoes
	    $('#ContapagarParcela').val(parcelaAtual);
	    $('#bt-adicionarConta-pagar').show();
	    $('#bt-editarConta-pagar').hide();
	
	    //limpa campos
	    $('#identificacaoPagar').val('');
	    $('#ContapagarDataVencimento').val('');
	    $('#valorPagar').val('');
	    $('#PagarPeriodocritico').val('');
	    $('#ContapagarDesconto').val('');
	    $('#ContapagarAgencia').val('');
	    $('#ContapagarConta').val('');
	    $('#ContapagarBanco').val('');
	   
	});
	
	//remove borda vermelha
	$('#parcelaCont'+numero).removeClass('shadow-vermelho');
    
	
    });
    
/********* Função Editar da tabela ******************/
    
    
    var numero;
    var parcelaAtual;
    var numeroAnt;
    
    $("body").on("click",'.btnEditar', function(e){
	
	//salva valor atual da parcela
	parcelaAtual=$('#ContapagarParcela').val();
	
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
	$('#ContapagarParcela').val(parcelaAnt);
	$('#identificacaoPagar').val(identificacaoAnt);
	$('#ContapagarDataVencimento').val(dataVencimentoAnt);
	$('#valorPagar').val(valorAnt);
	$('#PagarPeriodocritico').val(periodocriticoAnt);
	$('#ContapagarDesconto').val(descontoAnt);
	$('#ContapagarAgencia').val(agenciaAnt);
	$('#ContapagarConta').val(contaAnt);
	$('#ContapagarBanco').val(bancoAnt);

	//troca botoes
	$('#bt-adicionarConta-pagar').hide();
	$('#bt-editarConta-pagar').show();
	
	//remove a borda antes de adicionar
	$('#parcelaCont'+numeroAnt).removeClass('shadow-vermelho');
	
	//adicona borda vermelha
	$('#parcelaCont'+numero).addClass('shadow-vermelho');
	
	//recebe numero antigo
	numeroAnt= numero;
	
    });


/*********** Botão excluir uma parcela da tabela ***********/	
    $("body").on("click",'.btnExcluir', function(e){
		
	//pega id da linha
	var td = $(this).parent();
        var trPar = td.parent();
        var trId = trPar.attr('id');
        var tr = trId.substr(11);
    
	$('.clonadoProduto'+tr).remove();
    
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
		
		contadortd1 = 0;
		var tabelatd1 = $('#tabela-conta-pagar tbody tr td:first-child');
		
		tabelatd1.each(function(){
		    //alert($(this).attr('id'));
		    $(this).attr('id','numParc'+contadortd1);
		    contadortd1++;
		});
		
		contadortd2 = 0;
		var tabelatd2 = $('#tabela-conta-pagar tbody tr td:nth-child(2)');
		
		tabelatd2.each(function(){
		    //alert($(this).attr('id'));
		    $(this).attr('id','ident'+contadortd2);
		    contadortd2++;
		});
		
		contadortd3 = 0;
		var tabelatd3 = $('#tabela-conta-pagar tbody tr td:nth-child(3)');
		
		tabelatd3.each(function(){
		    //alert($(this).attr('id'));
		    $(this).attr('id','dataVenc'+contadortd3);
		    contadortd3++;
		});

		contadortd4 = 0;
		var tabelatd4 = $('#tabela-conta-pagar tbody tr td:nth-child(4)');
		
		tabelatd4.each(function(){
		    //alert($(this).attr('id'));
		    $(this).attr('id','valorTabela'+contadortd4);
		    contadortd4++;
		});
		
		contadortd5 = 0;
		var tabelatd5 = $('#tabela-conta-pagar tbody tr td:nth-child(5)');
		
		tabelatd5.each(function(){
		    //alert($(this).attr('id'));
		    $(this).attr('id','periodocrit'+contadortd5);
		    contadortd5++;
		});
		
		contadortd6 = 0;
		var tabelatd6 = $('#tabela-conta-pagar tbody tr td:nth-child(6)');
		
		tabelatd6.each(function(){
		    //alert($(this).attr('id'));
		    $(this).attr('id','descontoTabela'+contadortd6);
		    contadortd6++;
		});
		
		contadortd7 = 0;
		var tabelatd7 = $('#tabela-conta-pagar tbody tr td:nth-child(7)');
		
		tabelatd7.each(function(){
		    //alert($(this).attr('id'));
		    $(this).attr('id','agenciaTabela'+contadortd7);
		    contadortd7++;
		});
		
		contadortd8 = 0;
		var tabelatd8 = $('#tabela-conta-pagar tbody tr td:nth-child(8)');
		
		tabelatd8.each(function(){
		    //alert($(this).attr('id'));
		    $(this).attr('id','contaTabela'+contadortd8);
		    contadortd8++;
		});
		
		contadortd9 = 0;
		var tabelatd9 = $('#tabela-conta-pagar tbody tr td:nth-child(9)');
		
		tabelatd9.each(function(){
		    //alert($(this).attr('id'));
		    $(this).attr('id','bancoTabela'+contadortd9);
		    contadortd9++;
		});
		
		contadortext = 0;
		var tabelatext = $('#tabela-conta-pagar tbody tr td:first-child');
		
		tabelatext.each(function(){
		    //alert($(this).attr('id'));
		    $(this).text(contadortext+1);
		    contadortext++;
		});
		
		contadorImg=0;
		var tabelaImg = $('#tabela-conta-pagar tbody tr td img:first-child');
		
		tabelaImg.each(function(){
		    //alert($(this).attr('id'));
		    $(this).attr('id','clonado'+contadorImg);
		    contadorImg++;
		});
		
		contadorImg1=0;
		var tabelaImg1 = $('#tabela-conta-pagar tbody tr td img:last-child');
		
		tabelaImg1.each(function(){
		    //alert($(this).attr('id'));
		    $(this).attr('id','clonado'+contadorImg1);
		    contadorImg1++;
		});
		
		// princ_cont = tabelatr;
		numeroParcela = contadortext+1;
		numParcela = contadortext;
		
		$('#ContapagarParcela').val(numeroParcela)	
		$('#ContaNumeroParcelas').val(numParcela);
	    });
	    
	    contadorDiv=0;
	    var div = $('div[class*="clonadoProduto"]');
	    
	    div.each(function(){	    
		$(this).attr('class','numer input clonadoProduto'+contadorDiv);
		contadorDiv++;
	    });

	    contadorInput=0;
	    var input = $('div[class*="clonadoProduto"] input:first-child');
	    
	    input.each(function(){
		$(this).attr('id','Parcela'+contadorInput);
		$(this).attr('name','data[Parcela]['+contadorInput+'][parcela]');
		contadorInput++;
	    });

	    contadorInput1=0;
	    var input1 = $('div[class*="clonadoProduto"] input:nth-child(2)');
	    
	    input1.each(function(){
		$(this).attr('id','ParcelaIdentificacaoDocumento'+contadorInput1);
		$(this).attr('name','data[Parcela]['+contadorInput1+'][identificacao_documento]');
		contadorInput1++;
	    });

	    contadorInput2=0;
	    var input2 = $('div[class*="clonadoProduto"] input:nth-child(3)');
	    
	    input2.each(function(){
		$(this).attr('id','ParceladataVencimento-receber'+contadorInput2);
		$(this).attr('name','data[Parcela]['+contadorInput2+'][data_vencimento]');
		contadorInput2++;
	    });
	    
	    contadorInput3=0;
	    var input3 = $('div[class*="clonadoProduto"] input:nth-child(4)');
	    
	    input3.each(function(){
		$(this).attr('id','ParcelavalorConta-receber'+contadorInput3);
		$(this).attr('name','data[Parcela]['+contadorInput3+'][valor]');
		contadorInput3++;
	    });
	    
	    contadorInput4=0;
	    var input4 = $('div[class*="clonadoProduto"] input:nth-child(5)');
	    
	    input4.each(function(){
		$(this).attr('id','ParcelaPeriodocritico'+contadorInput4);
		$(this).attr('name','data[Parcela]['+contadorInput4+'][periodocritico]');
		contadorInput4++;
	    });
	    
	    contadorInput5=0;
	    var input5 = $('div[class*="clonadoProduto"] input:nth-child(6)');
	    
	    input5.each(function(){
		$(this).attr('id','ParcelaDesconto'+contadorInput5);
		$(this).attr('name','data[Parcela]['+contadorInput5+'][desconto]');
		contadorInput5++;
	    });
	    
	    contadorInput6=0;
	    var input6 = $('div[class*="clonadoProduto"] input:nth-child(7)');
	    
	    input6.each(function(){
		$(this).attr('id','ParcelaAgencia'+contadorInput6);
		$(this).attr('name','data[Parcela]['+contadorInput6+'][agencia]');
		contadorInput6++;
	    });
	    
	    contadorInput7=0;
	    var input7 = $('div[class*="clonadoProduto"] input:nth-child(8)');
	    
	    input7.each(function(){
		$(this).attr('id','ParcelaConta'+contadorInput7);
		$(this).attr('name','data[Parcela]['+contadorInput7+'][conta]');
		contadorInput7++;
	    });
	    
	    contadorInput8=0;
	    var input8 = $('div[class*="clonadoProduto"] input:nth-child(9)');
	    
	    input8.each(function(){
		$(this).attr('id','ParcelaBanco'+contadorInput8);
		$(this).attr('name','data[Parcela]['+contadorInput8+'][banco]');
		contadorInput8++;
	    });
	
	//troca botões qd clicado em editar e depois remover
	$('#bt-adicionarConta-pagar').show();
	$('#bt-editarConta-pagar').hide();    
    });
    
/**************** Modal Parceiro de negocio tipo cliente *****************/
    $('body').on('click', '#ui-id-1 a',function(){
	valorCad= $(this).text();
	if(valorCad=="Cadastrar"){
	    $(".autocompleteFornecedor input").val('');
	    $("#myModal_add-parceiroFornecedor").modal('show');
	}

    });

/********************* Preencher Dados Fornecedor *********************/    
    $("#bt-preencherFornecedor").click(function(){
	valorForncedor=	$("#add-fornecedor option:selected" ).val();
	valorCpfCnpj= $("#add-fornecedor option:selected" ).attr('class');
	valorNome= $("#add-fornecedor option:selected" ).attr('id');

	if(!valorForncedor==""){
		if(valorForncedor=="add-Fornecedor"){
			//chama modal fornecedor
			//$("#myModal_add-fornecedor").modal('show');
		}else{
			$(".autocompleteFornecedor input").val('');
			$(".autocompleteFornecedor input").removeAttr('required','required');
			
			$("#EntradaParceirodenegocioId").val(valorForncedor);
			$("#ContaCpfCnpj").val(valorCpfCnpj);
			$("#ContaParceiro").val(valorNome);
		}
	}

    });
    
/********************* Autocomplete Cliente *********************/
    $(function() {
	$( "#add-fornecedor" ).combobox();

  });

/*********** Tira virgula e coloca ponto antes do submit ***********/	
	$('#btn-salvarContaPagar').click(function(){
	    
	    //pega valor
	    ContaValorAux = $('#ContaValor').val();
	    
	    //retira a virgula
	    $('input[id="ContaValor"]').val(ContaValorAux.replace(',','.'));
	});
});
