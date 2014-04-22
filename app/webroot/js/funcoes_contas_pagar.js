 $(document).ready(function() {
	
	

    $('input').focus(function(){
	$('.ui-autocomplete-input').attr('tabindex','102');
	
    });
    
    $("body").on('focus','.ui-autocomplete-input',function(){
		$('.ui-autocomplete-input').attr({required:true});
	});


/********** INPUT HIDDEN DO TIPO DE CONTA ****************/
	
	$('#TipodecontaTipo').val("DESPESA");

    
/********** Adicionar na tabela Principal ****************/
    
    var princ_cont = 0;
    var numeroParcela =1;
    var numParcela = 0;
     
    //recebe valor
    $('#ContaspagarParcela').val(numeroParcela);
    
    $('#bt-adicionarConta-pagar').click(function(e){
	e.preventDefault();
	
	//recebe valores digitados
	identificacao = $('#identificacaoPagar').val();
	dataVencimento = $('#ContaspagarDataVencimento').val();
	valor = $('#valorPagar').val();
	periodocritico = $('#PagarPeriodocritico').val();
	
	desconto = $('#ContaspagarDesconto').val();
	agencia = $('#ContaspagarAgencia').val();
	conta = $('#ContaspagarConta').val();
	banco = $('#ContaspagarBanco').val();
	codigodebarras=$('#ContaspagarCodigodeBarras').val();

	tipoPagamento=$('#Pagamento0TipoPagamento').val();
	dataEmissao = $('[id*="DataEmissao"]').val();
	
	//soluciona problema de apagar contagem
	princ_cont = numParcela;

	if(dataEmissao == ''){
	   // $('<span id="msgDataEmissao" class="Msg-tooltipDireita">Preencha o campo Data de Emissão</span>').insertAfter('[id*="DataEmissao"]');
	    $('#msgDataEmissao').css('display','block');
	    $('[id*="DataEmissao"]').addClass('shadow-vermelho').focus();
	    $('html, body').animate({scrollTop:0}, 'slow');
	    
	}else if(tipoPagamento == ''){
	    //alert('Tipo Pagamento vazio');
	    //$('<span id="msgDataVencimento" class="DinamicaMsg-tooltipDireita">Preencha o campo Tipo Pagamento</span>').insertAfter('#Pagamento0TipoPagamento');
	    $('#msgTipoPagamento').css('display','block');
	    $('#Pagamento0TipoPagamento').addClass('shadow-vermelho').focus();
	    
	}else if(dataVencimento == ''){
	    //alert('valor vazio');
	    //$('<span id="msgDataVencimento" class="DinamicaMsg-tooltipDireita">Preencha o campo Data de Vencimento</span>').insertAfter('#ContaspagarDataVencimento');
	    $('#msgDataVencimento').css('display','block');
	    $('#ContaspagarDataVencimento').addClass('shadow-vermelho').focus();
	
	}else if(valor == ''){
	    //alert('valor vazio');
	   //$('<span id="msgContaValor" class="DinamicaMsg-tooltipDireita">Preencha o campo Valor</span>').insertAfter('#valorPagar');
	    $('#msgContaValor').css('display','block');
	    $('#valorPagar').addClass('shadow-vermelho').focus();
	    
	}else if(periodocritico == ''){
	    //alert('periodocritico vazio');
	    //$('<span id="msgPeriodoCritico" class="DinamicaMsg-tooltipDireita">Preencha o campo Periodo Critico</span>').insertAfter('#PagarPeriodocritico');
	    $('#msgPeriodoCritico').css('display','block');
	    $('#PagarPeriodocritico').addClass('shadow-vermelho').focus();

	}else{
	    
	    //adiciona a tabela
	    $('#tabela-conta-pagar').append('<tr class="valbtconfimar" id="parcelaCont'+princ_cont+'"><td id="numParc'+princ_cont+'">'+numeroParcela+'</td><td id="codbar'+princ_cont+'">'+codigodebarras+'</td><td id="dataVenc'+princ_cont+'">'+dataVencimento+'</td><td id="valorTabela'+princ_cont+'">'+valor+'</td><td id="ident'+princ_cont+'">'+identificacao+'</td><td id="periodocrit'+princ_cont+'">'+periodocritico+'</td><td id="descontoTabela'+princ_cont+'">'+desconto+'</td><td id="agenciaTabela'+princ_cont+'">'+agencia+'</td><td id="contaTabela'+princ_cont+'">'+conta+'</td><td id="bancoTabela'+princ_cont+'">'+banco+'</td><td><img title="Editar" alt="Editar" src="/lifecare/app/webroot/img/botao-tabela-editar.png" id=clonado'+princ_cont+' class="btnEditar"/> <img title="Remover" alt="Remover" src="/lifecare/app/webroot/img/lixeira.png" id=clonado'+princ_cont+' class="btnExcluir"/></td></tr>');

	    $('input').removeAttr('required');
	    
	    calcularValorConta();	
	    
	    //limpa campos
	    $('#identificacaoPagar').val('');
	    $('#ContaspagarDataVencimento').val('');
	    $('#valorPagar').val('');
	    $('#PagarPeriodocritico').val('');
	    $('#ContaspagarDesconto').val('');
	    $('#ContaspagarAgencia').val('');
	    $('#ContaspagarConta').val('');
	    $('#ContaspagarBanco').val('');
	    $('#ContaspagarCodigodeBarras').val('');
	    
	    //campos hidden
	    $('.fieldset-total').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Parcela]['+princ_cont+'][parcela] step="any" id="Parcela'+princ_cont+'" value="'+numeroParcela+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][codigodebarras] step="any"  id="ParcelaCodigodeBarras'+princ_cont+'" value="'+codigodebarras+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][identificacao_documento] step="any"  id="ParcelaIdentificacaoDocumento'+princ_cont+'" value="'+identificacao+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][data_vencimento] step="any"  id="ParceladataVencimentoPagar'+princ_cont+'" value="'+dataVencimento+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][valor] step="any"  id="ParcelavalorContaPagar'+princ_cont+'" value="'+valor.split('.').join('').replace(',','.')+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][periodocritico] step="any"  id="ParcelaPeriodocritico'+princ_cont+'" value="'+periodocritico+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][desconto] step="any"  id="ParcelaDesconto'+princ_cont+'" value="'+desconto.split('.').join('').replace(',','.')+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][agencia] step="any"  id="ParcelaAgencia'+princ_cont+'" value="'+agencia+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][conta] step="any"  id="ParcelaConta'+princ_cont+'" value="'+conta+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][banco] step="any"  id="ParcelaBanco'+princ_cont+'" value="'+banco+'" type="hidden"></div>');

	    if(tipoPagamento == 'A Vista'){
		$('.tela-resultado-field').hide();
	    }else{
		numeroParcela++;
	    }

	    princ_cont++;
	    numParcela++;		

	    //incrementa 1 a parcela
	    $('#ContaspagarParcela').val(numeroParcela)	
	    $('#Pagamento0NumeroParcela').val(numParcela);
	}    
	
    });


/****************** Soma valor conta *********************/        
    var valorContaAnt=0;
    function calcularValorConta(){
	valorConta=$('#valorPagar').val().split('.').join('').replace(',','.');
	valorConta=parseFloat(valorConta);

	if(isNaN(valorConta)){
	    valorConta=0;
	}
	valorResultado= valorContaAnt+valorConta;
	
	valorContaAnt=valorResultado;

	valorResultadoAux=parseFloat(valorResultado);
	
	$('#ContaspagarValor').val(valorResultadoAux.toFixed(2))
				.priceFormat({
				    prefix: '',
				    centsSeparator: ',',
				    thousandsSeparator: '.',
	});
    };

/****************** Subtrair valor conta *********************/        
   
    function subtrairValorConta(numero){
	valorSubConta=$('#valorTabela'+numero).text().split('.').join('').replace(',','.');
	valorSubConta=parseFloat(valorSubConta);

	valorTotal=$('#ContaspagarValor').val().split('.').join('').replace(',','.');
	valorTotal=parseFloat(valorTotal);

	if(isNaN(valorSubConta)){
	    valorSubConta=0;
	}
	
	if(isNaN(valorTotal)){
	    valorTotal=valorSubConta;
	}
	valorSubResultado= valorTotal-valorSubConta;

	valorSubResultadoAux=parseFloat(valorSubResultado);

	valorContaAnt=valorSubResultadoAux;
	
	$('#ContaspagarValor').val(valorSubResultadoAux.toFixed(2))
				.priceFormat({
				    prefix: '',
				    centsSeparator: ',',
				    thousandsSeparator: '.',
	});
    };

/****************** Altera linha da tabela *********************/
    $('#bt-editarConta-pagar').click(function(){
	$('.btnEditar').show();
	
	if($('#Pagamento0TipoPagamento').val() == 'A Vista'){
	    $('.tela-resultado-field').hide();
	}
	
	//percorre a td
	$('#numParc'+numero).each(function(){
	   
	    //recebe valores digitados
	    identificacao = $('#identificacaoPagar').val();
	    dataVencimento = $('#ContaspagarDataVencimento').val();
	    valor = $('#valorPagar').val();
	    periodocritico = $('#PagarPeriodocritico').val();
	    
	    desconto = $('#ContaspagarDesconto').val();
	    agencia = $('#ContaspagarAgencia').val();
	    conta = $('#ContaspagarConta').val();
	    banco = $('#ContaspagarBanco').val();
	    codigodebarras=$('#ContaspagarCodigodeBarras').val();
	    
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
		$('#codbar'+numero).text(codigodebarras);
		
		//remove campos hidden
		$('.clonadoProduto'+numero).remove();
		
		//substitui campos hidden
		$('.fieldset-total').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Parcela]['+numero+'][parcela] step="any"  id="ParcelaParcela'+numero+'parcela" value="'+parcelaAnt+'" type="hidden"><input name="data[Parcela]['+numero+'][codigodebarras] step="any"  id="ParcelaCodigodeBarras'+numero+'codigodebarras" value="'+codigodebarras+'" type="hidden"><input name="data[Parcela]['+numero+'][identificacao_documento] step="any"  id="ParcelaIdentificacaoDocumento'+numero+'" value="'+identificacao+'" type="hidden"><input name="data[Parcela]['+numero+'][data_vencimento] step="any"  id="ParceladataVencimento-pagar'+numero+'data_vencimento" value="'+dataVencimento+'" type="hidden"><input name="data[Parcela]['+numero+'][valor] step="any"  id="ParcelavalorConta-pagar'+numero+'valor" value="'+valor.split('.').join('').replace(',','.')+'" type="hidden"><input name="data[Parcela]['+numero+'][periodocritico] step="any"  id="ParcelaPeriodocritico'+numero+'periodocritico" value="'+periodocritico+'" type="hidden"><input name="data[Parcela]['+numero+'][desconto] step="any"  id="ParcelaDesconto'+numero+'desconto" value="'+desconto.split('.').join('').replace(',','.')+'" type="hidden"><input name="data[Parcela]['+numero+'][agencia] step="any"  id="ParcelaAgencia'+numero+'agencia" value="'+agencia+'" type="hidden"><input name="data[Parcela]['+numero+'][conta] step="any"  id="ParcelaConta'+numero+'conta" value="'+conta+'" type="hidden"><input name="data[Parcela]['+numero+'][banco] step="any"  id="ParcelaBanco'+numero+'banco" value="'+banco+'" type="hidden"></div> ');

	    }

	    calcularValorConta();
	    
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
	    $('#ContaspagarCodigodeBarras').val('');
	   
	});

	if($('#Pagamento0TipoPagamento').val() == 'A Vista'){
	    $('.tela-resultado').hide();
	}

	//remove borda vermelha
	$('#parcelaCont'+numero).removeClass('shadow-vermelho');
    
	
    });
    
/********* Função Editar da tabela ******************/
    
    
    var numero;
    var parcelaAtual;
    var numeroAnt;
    
    $("body").on("click",'.btnEditar', function(e){

	$('.tela-resultado-field').show();
	$('.btnEditar').hide();
	//salva valor atual da parcela
	parcelaAtual=$('#ContaspagarParcela').val();
	
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
	codbarAnt= $('#codbar'+numero).text();
	
	//adiciona devolta na input
	$('#ContaspagarParcela').val(parcelaAnt);
	$('#identificacaoPagar').val(identificacaoAnt);
	$('#ContaspagarDataVencimento').val(dataVencimentoAnt);
	$('#valorPagar').val(valorAnt);
	$('#PagarPeriodocritico').val(periodocriticoAnt);
	$('#ContaspagarDesconto').val(descontoAnt);
	$('#ContaspagarAgencia').val(agenciaAnt);
	$('#ContaspagarConta').val(contaAnt);
	$('#ContaspagarBanco').val(bancoAnt);
	$('#ContaspagarCodigodeBarras').val(codbarAnt);

	//troca botoes
	$('#bt-adicionarConta-pagar').hide();
	$('#bt-editarConta-pagar').show();
	
	//remove a borda antes de adicionar
	$('#parcelaCont'+numeroAnt).removeClass('shadow-vermelho');
	
	//adicona borda vermelha
	$('#parcelaCont'+numero).addClass('shadow-vermelho');
	
	//recebe numero antigo
	numeroAnt= numero;

	subtrairValorConta(numero);
	
    });


/*********** Botão excluir uma parcela da tabela ***********/	
     $("body").on("click",'.btnExcluir', function(e){
	
	$('.tela-resultado-field').show();
	
	//pega id da linha
	var td = $(this).parent();
        var trPar = td.parent();
        var trId = trPar.attr('id');
        var tr = trId.substr(11);

	numero=tr;
	subtrairValorConta(numero);
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
		$(this).attr('id','codbar'+contadortd2);
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
		$(this).attr('id','ident'+contadortd5);
		contadortd5++;
	    });
	    
	    contadortd6 = 0;
	    var tabelatd6 = $('#tabela-conta-pagar tbody tr td:nth-child(6)');
	    
	    tabelatd6.each(function(){
		//alert($(this).attr('id'));
		$(this).attr('id','periodocrit'+contadortd6);
		contadortd6++;
	    });
	    
	    contadortd7 = 0;
	    var tabelatd7 = $('#tabela-conta-pagar tbody tr td:nth-child(7)');
	    
	    tabelatd7.each(function(){
		//alert($(this).attr('id'));
		$(this).attr('id','descontoTabela'+contadortd7);
		contadortd7++;
	    });
	    
	    contadortd8 = 0;
	    var tabelatd8 = $('#tabela-conta-pagar tbody tr td:nth-child(8)');
	    
	    tabelatd8.each(function(){
		//alert($(this).attr('id'));
		$(this).attr('id','agenciaTabela'+contadortd8);
		contadortd8++;
	    });
	    
	    contadortd9 = 0;
	    var tabelatd9 = $('#tabela-conta-pagar tbody tr td:nth-child(9)');
	    
	    tabelatd9.each(function(){
		//alert($(this).attr('id'));
		$(this).attr('id','contaTabela'+contadortd9);
		contadortd9++;
	    });
	    
	    contadortd10 = 0;
	    var tabelatd10 = $('#tabela-conta-pagar tbody tr td:nth-child(10)');
	    
	    tabelatd10.each(function(){
		//alert($(this).attr('id'));
		$(this).attr('id','bancoTabela'+contadortd10);
		contadortd10++;
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
	    
	    $('#ContaspagarParcela').val(numeroParcela)	
	    $('#Pagamento0NumeroParcela').val(numParcela);
	
		if($('#parcelaCont0').length){
			$('#ContaspagarDataEmissao').prop('readonly',true);
			$('#ContaspagarDataEmissao').addClass('borderZero');
			$('#ContaspagarDataEmissao').prop('disabled', true);
		}else{
			$('#ContaspagarDataEmissao').prop('readonly',false);
			$('#ContaspagarDataEmissao').removeClass('borderZero');
			$('#ContaspagarDataEmissao').prop('disabled', false);
		}
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
	    $(this).attr('id','ParcelaCodigodeBarras'+contadorInput1);
	    $(this).attr('name','data[Parcela]['+contadorInput1+'][codigodebarras]');
	    contadorInput1++;
	});

	contadorInput2=0;
	var input2 = $('div[class*="clonadoProduto"] input:nth-child(3)');
	
	input2.each(function(){
	    $(this).attr('id','ParcelaIdentificacaoDocumento'+contadorInput2);
	    $(this).attr('name','data[Parcela]['+contadorInput2+'][identificacao_documento]');
	    contadorInput2++;
	});

	contadorInput3=0;
	var input3 = $('div[class*="clonadoProduto"] input:nth-child(4)');
	
	input3.each(function(){
	    $(this).attr('id','ParceladataVencimento-pagar'+contadorInput3);
	    $(this).attr('name','data[Parcela]['+contadorInput3+'][data_vencimento]');
	    contadorInput3++;
	});
	
	contadorInput4=0;
	var input4 = $('div[class*="clonadoProduto"] input:nth-child(5)');
	
	input4.each(function(){
	    $(this).attr('id','ParcelavalorConta-pagar'+contadorInput4);
	    $(this).attr('name','data[Parcela]['+contadorInput4+'][valor]');
	    contadorInput4++;
	});
	
	contadorInput5=0;
	var input5 = $('div[class*="clonadoProduto"] input:nth-child(6)');
	
	input5.each(function(){
	    $(this).attr('id','ParcelaPeriodocritico'+contadorInput5);
	    $(this).attr('name','data[Parcela]['+contadorInput5+'][periodocritico]');
	    contadorInput5++;
	});
	
	contadorInput6=0;
	var input6 = $('div[class*="clonadoProduto"] input:nth-child(7)');
	
	input6.each(function(){
	    $(this).attr('id','ParcelaDesconto'+contadorInput6);
	    $(this).attr('name','data[Parcela]['+contadorInput6+'][desconto]');
	    contadorInput6++;
	});
	
	contadorInput7=0;
	var input7 = $('div[class*="clonadoProduto"] input:nth-child(8)');
	
	input7.each(function(){
	    $(this).attr('id','ParcelaAgencia'+contadorInput7);
	    $(this).attr('name','data[Parcela]['+contadorInput7+'][agencia]');
	    contadorInput7++;
	});
	
	contadorInput8=0;
	var input8 = $('div[class*="clonadoProduto"] input:nth-child(9)');
	
	input8.each(function(){
	    $(this).attr('id','ParcelaConta'+contadorInput8);
	    $(this).attr('name','data[Parcela]['+contadorInput8+'][conta]');
	    contadorInput8++;
	});
	
	contadorInput9=0;
	var input9 = $('div[class*="clonadoProduto"] input:nth-child(10)');
	
	input9.each(function(){
	    $(this).attr('id','ParcelaBanco'+contadorInput9);
	    $(this).attr('name','data[Parcela]['+contadorInput9+'][banco]');
	    contadorInput9++;
	});

	
	//troca botões qd clicado em editar e depois remover
	$('#bt-editarConta-pagar').hide();
	$('#bt-adicionarConta-pagar').show();     

    });
    
/**************** Modal Parceiro de negocio tipo cliente *****************/
    $('body').on('click', '#ui-id-1 a',function(){
	valorCad= $(this).text();
	if(valorCad=="Cadastrar"){
	    $(".autocompleteFornecedor input").val('');
	    $("#myModal_add-parceiroFornecedor").modal('show');
	}

    });
    
  /**************** Modal Tipo Conta *****************/
    $('body').on('click', '#ui-id-2 a',function(){
	valorCad= $(this).text();
	if(valorCad=="Cadastrar"){
	    $(".autocompleteTipoConta input").val('');
	    $("#myModal_add-tipodeConta").modal('show');
	  //$("#spanClienteCPFExistente").hide();
	}

    });
    
/**************** Modal Centro Custo *****************/
    $('body').on('click', '#ui-id-3 a',function(){
	valorCad= $(this).text();
	if(valorCad=="Cadastrar"){
	    $(".autocompleteCentroCusto input").val('');
	    $("#myModal_add-centro_custo").modal('show');
	  //$("#spanClienteCPFExistente").hide();
	}

    });
    

    
/********************* Preencher tipo de conta *********************/

     $("#bt-preencherTipoConta").click(function(){
	valorNome = $("#add-tipoConta option:selected" ).val();
	valortipoconta = $("#add-tipoConta option:selected" ).attr('id');

	if(!valortipoconta==""){
		if(valortipoconta=="add-tipodeConta"){
			//chama modal cliente
			//$("#myModal_add-cliente").modal('show');
		}else{
		    $(".autocompleteTipoConta input").val('');
		    $(".autocompleteTipoConta input").removeAttr('required','required');
		    
		    $("#ContaspagarTipodecontaId").val(valortipoconta);
		    $("#tipoConta").val(valorNome);
		}
	}

    });
    
    
/********************* Preencher Dados Custo *********************/
  $("#bt-preencherCentreCusto").click(function(){
	valorCusto =	$("#add-custo option:selected" ).attr('id');
	limiteCusto = $("#add-custo option:selected" ).attr('data-limite');
	nomeCusto = $("#add-custo option:selected" ).val();

	if(!valorCusto==""){
		if(valorCusto=="add-centroCusto"){
			//chama modal cliente
			//$("#myModal_add-centro_custo").modal('show');
		}else{
		    $(".autocompleteCentroCusto input").val('');
		    $(".autocompleteCentroCusto input").removeAttr('required','required');
		    
		    $("#ContaspagarCentrocustoId").val(valorCusto);
		    $("#nomeCusto").val(nomeCusto);
		    $("#limitecusto").val(limiteCusto);
		}
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
			
			$("#ContaspagarParceirodenegocioId").val(valorForncedor);
			$("#ContaspagarCpfCnpj").val(valorCpfCnpj);
			$("#ContaspagarParceiro").val(valorNome);
		}
	}

    });
    
/********************* Autocomplete Cliente *********************/
    $(function() {
	$( "#add-fornecedor" ).combobox();

  });
  
/********************* Autocomplete Tipo de Conta *********************/
    $(function() {
	$( "#add-tipoConta" ).combobox();

    });
 
/********************* Autocomplete Centro Custo *********************/
    $(function() {
	$( "#add-custo" ).combobox();

    });

/****************Valida Data Emissão******************************************/
    $("#ContaspagarDataEmissao").focusout(function(){

	var dfuturoSaida = $("#ContaspagarDataEmissao").val();
	var dataFutura = new Date();

	var anoDigitado = dfuturoSaida.split("/")[2];
	var mesDigitado = dfuturoSaida.split("/")[1];
	var diaDigitado = dfuturoSaida.split("/")[0];

	if(dfuturoSaida != ''){
	    if( diaDigitado < 1 || diaDigitado > 31 || mesDigitado < 1 || mesDigitado > 12 || anoDigitado <1900 || dfuturoSaida.length < 6 ){ 
		$("#msgDataEmissaoInvalida").css("display","block");   
		$("#ContaspagarDataEmissao").addClass('shadow-vermelho');
		$("#ContaspagarDataEmissao").val("");    
	    }else{		    
		$("#ContaspagarDataEmissao").removeClass('shadow-vermelho');
		$("#msgDataEmissaoInvalida").css("display","none");  
		
	    }
	}
	
    });
    
/****************Valida Data Vencimento******************************************/
    $("#ContaspagarDataVencimento").focusout(function(){
	
	var dfuturoSaida = $("#ContaspagarDataVencimento").val();
	var dataFutura = new Date();
	
	var anoDigitado = dfuturoSaida.split("/")[2];
	var mesDigitado = dfuturoSaida.split("/")[1];
	var diaDigitado = dfuturoSaida.split("/")[0];

	if(dfuturoSaida != ''){
	    if( diaDigitado < 1 || diaDigitado > 31 || mesDigitado < 1 || mesDigitado > 12 || anoDigitado <1900 || dfuturoSaida.length < 6 ){ 
		$("#msgDataVencimentoInvalida").css("display","block");   
		$("#ContaspagarDataVencimento").addClass('shadow-vermelho');
		$("#ContaspagarDataVencimento").val("");    
	    }else{		    
		$("#ContaspagarDataVencimento").removeClass('shadow-vermelho');
		$("#msgDataVencimentoInvalida").css("display","none");  
		
	    }
	}
	
    });

/****************** Tipo de pagamento *************************/
    $('#Pagamento0TipoPagamento').change(function(){
	    $('input[name*="parcela"]').val('');
	    $('#Pagamento0FormaPagamento').val('');
	    $('[id*="editarConta"]').hide();
	    $('[id*="bt-adicionarConta"]').show();
	    $('.tela-resultado-field').show();
	    $('#Pagamento0NumeroParcela').val(0);
	    $('#ContaspagarParcela').val(1);
	    $('.btnExcluir').trigger('click');
	    
    });    
	    
    

/*********** Tira virgula e coloca ponto antes do submit ***********/	
	$('#btn-salvarContaPagar').click(function(){
	    
	    //pega valor
	    ContaValorAux = $('#ContaspagarValor').val();
	    
	    //retira a virgula
	    $('input[id="ContaspagarValor"]').val(ContaValorAux.split('.').join('').replace(',','.'));
	    
	    $('#ContaspagarDataEmissao').prop('disabled', false);
	});
	
/*********** Desabilitar Data de Emissão ***********/	
	$('#bt-adicionarConta-pagar').on('click',function(){		
		
		if($('#ContaspagarDataEmissao').val() == ''){
			$('#msgDataEmissao').css('display','block');
			$('[id*="DataEmissao"]').addClass('shadow-vermelho').focus();
			$('html, body').animate({scrollTop:0}, 'slow');
		}else if($('#parcelaCont0').length){
			$('#ContaspagarDataEmissao').prop('readonly',true);
			$('#ContaspagarDataEmissao').addClass('borderZero');
			$('#ContaspagarDataEmissao').prop('disabled', true);
		}else{
			$('#ContaspagarDataEmissao').prop('readonly',false);
			$('#ContaspagarDataEmissao').removeClass('borderZero');
			$('#ContaspagarDataEmissao').prop('disabled', false);
		}
	});
});
