$(document).ready(function(){

	$('input').focus(function(){
		$('.ui-autocomplete-input').attr('tabindex','102');
	});

	$("body").on('focus','.ui-autocomplete-input',function(){
		$('.ui-autocomplete-input').attr({required:true});
	});

/********** INPUT HIDDEN DO TIPO DE CONTA ****************/	
	$('#TipodecontaTipo').val("RECEITA");

/********** Salva Parcela Quitada ************************/
	var numero_parcela = 0;

	$('body').on('click','.quitar',function(){
		$('#myModal_add_quitar').modal('show');
		id = $(this).attr('id');
		numero_parcela = id.substr(6);
		
		if($('.fieldset-total .clonadoProduto'+numero_parcela+"  input").hasClass("existe")){ //verifica se já não existe
			//Volta Valores para modal
			$('#vazioPagamento').val($('#dataPagamento'+numero_parcela).val());
			$('#vazioDescricao').val($('#descricaoPgto'+numero_parcela).val());
			$('#vazioJuros').val($('#jurosParcela'+numero_parcela).val());
		}else{					
			//Volta Valores vazio se não houver adicionado antes
			$('#vazioPagamento').val('');
			$('#vazioDescricao').val('');
			$('#vazioJuros').val('');			
		}
	});	

	$('#bt_quitaParcela').click(function(e){
		e.preventDefault();
		
		//pega valor das input's
		data_pagamento = $('#vazioPagamento').val();
		obs_pgto = $('#vazioDescricao').val();
		juros = $('#vazioJuros').val();

		if($('.fieldset-total .clonadoProduto'+numero_parcela+"  input").hasClass("existe")){ //verifica se já existe
			$('.existe').remove();
			//seta as hidden depois de remover as existentes
			$('.fieldset-total .clonadoProduto'+numero_parcela).append('<input name="data[Parcela]['+numero_parcela+'][data_pagamento]" step="any" class="existe" id="dataPagamento'+numero_parcela+'" value="'+data_pagamento+'" type="hidden"><input name="data[Parcela]['+numero_parcela+'][descricao]" step="any" class="existe" id="descricaoPgto'+numero_parcela+'" value="'+obs_pgto+'" type="hidden"><input name="data[Parcela]['+numero_parcela+'][juros]" step="any" class="existe" id="jurosParcela'+numero_parcela+'" value="'+juros+'" type="hidden">');
		}else{							
			//seta as hidden para a determinada parcela se não tiver cadastrada
			$('.fieldset-total .clonadoProduto'+numero_parcela).append('<input name="data[Parcela]['+numero_parcela+'][data_pagamento]" step="any" class="existe" id="dataPagamento'+numero_parcela+'" value="'+data_pagamento+'" type="hidden"><input name="data[Parcela]['+numero_parcela+'][descricao]" step="any" class="existe" id="descricaoPgto'+numero_parcela+'" value="'+obs_pgto+'" type="hidden"><input name="data[Parcela]['+numero_parcela+'][juros]" step="any" class="existe" id="jurosParcela'+numero_parcela+'" value="'+juros+'" type="hidden">');
		}
		//Limpa campos
		$('#vazioPagamento').val('');
		$('#vazioDescricao').val('');
		$('#vazioJuros').val('');
		
		//Fecha Modal
		$('#myModal_add_quitar').modal('hide');
	});

/********** Adicionar na tabela Principal ****************/
    var princ_cont = 0;
    var numeroParcela=1;
    var numParcela=0;
    var validaDuplicata='vazio';
     
     $('#ContasreceberDupli').change(function(){
		validaDuplicata = $('#ContasreceberDupli :selected').val();
	});

    //recebe valor
    $('#ContasreceberParcela').val(numeroParcela);
    
    $('#bt-adicionarConta-receber').click(function(e){
		e.preventDefault();
		
		//recebe valores digitados
		identificacao = $('#ContasreceberIdentificacaoDocumento').val();
		dataVencimento = $('#dataVencimento-receber').val();
		valor = $('#valorConta-receber').val();
		periodocritico = $('#ContasreceberPeriodocritico').val();
		
		desconto = $('#ContasreceberDesconto').val();
		dupliVal  = $('#ContasreceberDupli :selected').val();
		dupliText  = $('#ContasreceberDupli :selected').text();
		
		tipoPagamento=$('#Pagamento0TipoPagamento').val();
		idConta=$('#ContasreceberIdentificacaoConta').val();
		dataEmissao = $('[id*="DataEmissao"]').val();
		
		//soluciona problema de apagar contagem
		princ_cont = numParcela;
		if(idConta == ''){
			$('#msgIdentificacaoConta').css('display','block');
			$('#ContasreceberIdentificacaoConta').addClass('shadow-vermelho').focus();
		}else if(dataEmissao == ''){
			$('#msgDataEmissao').css('display','block');
			$('[id*="DataEmissao"]').addClass('shadow-vermelho').focus();
			$('html, body').animate({scrollTop:0}, 'slow');
		}else if(tipoPagamento == ''){
			$('#msgTipoPagamento').css('display','block');
			$('#Pagamento0TipoPagamento').addClass('shadow-vermelho').focus();
		}else if(identificacao == ''){
			$('#msgIdentificacaoParcela').css('display','block');
			$('#ContasreceberIdentificacaoDocumento').addClass('shadow-vermelho').focus();
		}else if(dataVencimento == ''){
			$('#msgDataVencimento').css('display','block');
			$('#dataVencimento-receber').addClass('shadow-vermelho').focus();
		}else if(valor == ''){
			$('#msgContaValor').css('display','block');
			$('#valorConta-receber').addClass('shadow-vermelho').focus();
		}else if(periodocritico == ''){
			$('#msgPeriodoCritico').css('display','block');
			$('#ContasreceberPeriodocritico').addClass('shadow-vermelho').focus();
		}else if(validaDuplicata=='vazio'){
			$('#msgDuplicata').css('display','block');
			$('#ContasreceberDupli').addClass('shadow-vermelho');
			validaDuplicata = '';
		}else{
			//adiciona a tabela
			$('#tabela-conta-receber').append('<tr class="valbtconfimar" id="parcelaCont'+princ_cont+'"><td id="numParc'+princ_cont+'">'+numeroParcela+'</td><td id="dataVenc'+princ_cont+'">'+dataVencimento+'</td><td id="valorTabela'+princ_cont+'">'+valor+'</td><td id="ident'+princ_cont+'">'+identificacao+'</td><td id="periodocrit'+princ_cont+'">'+periodocritico+'</td><td id="descontoTabela'+princ_cont+'">'+desconto+'</td><td id="dupliTabela'+princ_cont+'">'+dupliText+'</td><td><img title="Editar" alt="Editar" src="/lifecare/app/webroot/img/botao-tabela-editar.png" id=clonado'+princ_cont+' class="btnEditar"/> <img title="Remover" alt="Remover" src="/lifecare/app/webroot/img/lixeira.png" id=clonado'+princ_cont+' class="btnExcluir"/><img title="Quitar" alt="Quitar" src="/lifecare/app/webroot/img/botao-quitar2.png" id=quitar'+princ_cont+' class="quitar"/></td></tr>');
			$('input').removeAttr('required');
			
			calcularValorConta();
			
			//limpa campos
			$('#ContasreceberIdentificacaoDocumento').val('');
			$('#dataVencimento-receber').val('');
			$('#valorConta-receber').val('');
			$('#ContasreceberPeriodocritico').val('');
			$('#ContasreceberDesconto').val('');
			$('#ContasreceberAgencia').val('');
			$('#ContasreceberConta').val('');
			$('#ContasreceberBanco').val('');
			$('#ContasreceberParcelaDescricao').val('');
			$('#ContasreceberDupli :selected').removeAttr("selected");
				
			//campos hidden
			$('.fieldset-total').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Parcela]['+princ_cont+'][parcela]" step="any" id="Parcela'+princ_cont+'" value="'+numeroParcela+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][identificacao_documento]" step="any"  id="ParcelaIdentificacaoDocumento'+princ_cont+'" value="'+identificacao+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][data_vencimento]" step="any"  id="ParceladataVencimentoReceber'+princ_cont+'" value="'+dataVencimento+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][valor]" step="any"  id="ParcelavalorContaReceber'+princ_cont+'" value="'+valor.split('.').join('').replace(',','.')+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][periodocritico]" step="any"  id="ParcelaPeriodocritico'+princ_cont+'" value="'+periodocritico+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][desconto]" step="any"  id="ParcelaDesconto'+princ_cont+'" value="'+desconto.split('.').join('').replace(',','.')+'" type="hidden"><input name="data[Parcela]['+princ_cont+'][duplicata]" step="any"  id="dupliParcela'+princ_cont+'" value="'+dupliVal+'" type="hidden"></div>');

			if(tipoPagamento == 'A Vista'){
				$('.tela-resultado-field').hide();
			}else{
				numeroParcela++;
			}
			
			princ_cont++;
			numParcela++;
			
			//incrementa 1 a parcela
			$('#ContasreceberParcela').val(numeroParcela)	
			$('#Pagamento0NumeroParcela').val(numParcela);
		}
    });

/****************** Soma valor conta *********************/
    var valorContaAnt=0;
    function calcularValorConta(){
		valorConta = $('#valorConta-receber').val().split('.').join('').replace(',','.');

		valorConta = parseFloat(valorConta);

		if(isNaN(valorConta)){
			valorConta = 0;
		}
		
		valorResultado = valorContaAnt+valorConta;

		valorResultadoAux = parseFloat(valorResultado);

		valorContaAnt = valorResultadoAux;
		
		$('.ContasreceberValor').val(valorResultadoAux.toFixed(2)).priceFormat({
			prefix: '',
			centsSeparator: ',',
			thousandsSeparator: '.',
		});
    };
    

/****************** Subtrair valor conta *********************/
    function subtrairValorConta(numero){
		valorSubConta = $('#valorTabela'+numero).text().split('.').join('').replace(',','.');
		valorSubConta = parseFloat(valorSubConta);

		valorTotal = $('.ContasreceberValor').val().split('.').join('').replace(',','.');
		valorTotal = parseFloat(valorTotal);

		if(isNaN(valorSubConta)){
			valorSubConta = 0;
		}
		
		if(isNaN(valorTotal)){
			valorTotal = valorSubConta;
		}
		
		valorSubResultado = valorTotal-valorSubConta;

		valorSubResultadoAux = parseFloat(valorSubResultado);

		valorContaAnt = valorSubResultadoAux;

		$('.ContasreceberValor').val(valorSubResultadoAux.toFixed(2)).priceFormat({
			prefix: '',
			centsSeparator: ',',
			thousandsSeparator: '.',
		});
    };
    
/****************** Altera linha da tabela(Cloncluir edição) *********************/
    $('#bt-editarConta-receber').click(function(){
		$('.btnEditar').show();
		$('.quitar').show();

		if($('#Pagamento0TipoPagamento').val() == 'A Vista'){
			$('.tela-resultado-field').hide();
		}
	
	//percorre a td
	$('#numParc'+numero).each(function(){
	   
	    //recebe valores digitados
	    identificacao = $('#ContasreceberIdentificacaoDocumento').val();
	    dataVencimento = $('#dataVencimento-receber').val();
	    valor = $('#valorConta-receber').val();
	    periodocritico = $('#ContasreceberPeriodocritico').val();
	    desconto = $('#ContasreceberDesconto').val();
	    dupliVal  = $('#ContasreceberDupli :selected').val();
		dupliText  = $('#ContasreceberDupli :selected').text();
	    
	    //certifica que parcelas são iguais
	    if($(this).text() == $('#ContasreceberParcela').val()){
			//substitui valor
			$('#ident'+numero).text(identificacao);
			$('#dataVenc'+numero).text(dataVencimento);
			$('#valorTabela'+numero).text(valor);
			$('#periodocrit'+numero).text(periodocritico);
			$('#descontoTabela'+numero).text(desconto);
			$('#dupliTabela'+numero).text(dupliText);
		}
	    
	  	if($('.fieldset-total .clonadoProduto'+numero+"  input").hasClass("existe")){ //verifica se já não existe
			//pega valor das input's hidden
			data_pagamento = $('#dataPagamento'+numero).val();
			obs_pgto = $('#descricaoPgto'+numero).val();
			juros = $('#jurosParcela'+numero).val();
		
			//remove campos hidden
			$('.clonadoProduto'+numero).remove();
			
			//substitui campos hidden
			$('.fieldset-total').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Parcela]['+numero+'][parcela]" step="any"  id="ParcelaParcela'+numero+'parcela" value="'+parcelaAnt+'" type="hidden"><input name="data[Parcela]['+numero+'][identificacao_documento]" step="any"  id="ParcelaIdentificacaoDocumento'+numero+'" value="'+identificacao+'" type="hidden"><input name="data[Parcela]['+numero+'][data_vencimento]" step="any"  id="ParceladataVencimento-receber'+numero+'data_vencimento" value="'+dataVencimento+'" type="hidden"><input name="data[Parcela]['+numero+'][valor]" step="any"  id="ParcelavalorConta-receber'+numero+'valor" value="'+valor.split('.').join('').replace(',','.')+'" type="hidden"><input name="data[Parcela]['+numero+'][periodocritico]" step="any"  id="ParcelaPeriodocritico'+numero+'periodocritico" value="'+periodocritico+'" type="hidden"><input name="data[Parcela]['+numero+'][desconto]" step="any"  id="ParcelaDesconto'+numero+'desconto" value="'+desconto.split('.').join('').replace(',','.')+'" type="hidden"><input name="data[Parcela]['+numero+'][duplicata]" step="any"  id="dupliParcela'+numero+'" value="'+dupliVal+'" type="hidden"><input name="data[Parcela]['+numero+'][data_pagamento]" step="any" class="existe" id="dataPagamento'+numero+'" value="'+data_pagamento+'" type="hidden"><input name="data[Parcela]['+numero+'][descricao]" step="any" class="existe" id="descricaoPgto'+numero+'" value="'+obs_pgto+'" type="hidden"><input name="data[Parcela]['+numero+'][juros]" step="any" class="existe" id="jurosParcela'+numero+'" value="'+juros+'" type="hidden"></div> ');
		}else{					
			//Volta Valores vazio se não houver adicionado antes
			$('#vazioPagamento').val('');
			$('#vazioDescricao').val('');
			$('#vazioJuros').val('');
			
			//remove campos hidden
			$('.clonadoProduto'+numero).remove();
			
			//substitui campos hidden
			$('.fieldset-total').append('<div class="input number clonadoProduto'+numero+'" style="position:absolute"><input name="data[Parcela]['+numero+'][parcela]" step="any"  id="ParcelaParcela'+numero+'parcela" value="'+parcelaAnt+'" type="hidden"><input name="data[Parcela]['+numero+'][identificacao_documento]" step="any"  id="ParcelaIdentificacaoDocumento'+numero+'" value="'+identificacao+'" type="hidden"><input name="data[Parcela]['+numero+'][data_vencimento]" step="any"  id="ParceladataVencimento-receber'+numero+'data_vencimento" value="'+dataVencimento+'" type="hidden"><input name="data[Parcela]['+numero+'][valor]" step="any"  id="ParcelavalorConta-receber'+numero+'valor" value="'+valor.split('.').join('').replace(',','.')+'" type="hidden"><input name="data[Parcela]['+numero+'][periodocritico]" step="any"  id="ParcelaPeriodocritico'+numero+'periodocritico" value="'+periodocritico+'" type="hidden"><input name="data[Parcela]['+numero+'][desconto]" step="any"  id="ParcelaDesconto'+numero+'desconto" value="'+desconto.split('.').join('').replace(',','.')+'" type="hidden"><input name="data[Parcela]['+numero+'][duplicata]" step="any"  id="dupliParcela'+numero+'" value="'+dupliVal+'" type="hidden"></div> ');
		}

	    calcularValorConta();
	    
	    $('#bt-adicionarConta-receber').show();
	    $('#bt-editarConta-receber').hide();
	
	    //limpa campos
	    $('#ContasreceberIdentificacaoDocumento').val('');
	    $('#dataVencimento-receber').val('');
	    $('#valorConta-receber').val('');
	    $('#ContasreceberPeriodocritico').val('');
	    $('#ContasreceberDesconto').val('');
	    $('#ContasreceberAgencia').val('');
	    $('#ContasreceberConta').val('');
	    $('#ContasreceberBanco').val('');
	    $('#ContasreceberParcelaDescricao').val('');
	    $('#ContasreceberDupli :selected').removeAttr("selected");
	});
	
	//remove borda vermelha
	$('#parcelaCont'+numero).removeClass('shadow-vermelho');
	    if(tipoPagamento == 'A Vista'){
			$('.tela-resultado-field').hide();
	    }
    });
    
/********* Função Editar da tabela (lapis tabela)******************/
    var parcelaAtual;
    var numeroAnt;
    
    $("body").on("click",'.btnEditar', function(e){

		$('.tela-resultado-field').show();
		$('.btnEditar').hide();
		$('.quitar').hide();
		
		//salva valor atual da parcela
		parcelaAtual = $('#ContasreceberParcela').val();
		
		//pega id da linha
		id = $(this).attr('id');
		numero = id.substr(7);
		
		//recebe parcela antiga da linha
		parcelaAnt = $('#numParc'+numero).text();
		identificacaoAnt = $('#ident'+numero).text();
		dataVencimentoAnt = $('#dataVenc'+numero).text();
		valorAnt = $('#valorTabela'+numero).text();
		periodocriticoAnt = $('#periodocrit'+numero).text();
		descontoAnt = $('#descontoTabela'+numero).text();
		
		//adiciona devolta na input
		$('#ContasreceberParcela').val(parcelaAnt);
		$('#ContasreceberIdentificacaoDocumento').val(identificacaoAnt);
		$('#dataVencimento-receber').val(dataVencimentoAnt);
		$('#valorConta-receber').val(valorAnt);
		$('#ContasreceberPeriodocritico').val(periodocriticoAnt);
		$('#ContasreceberDesconto').val(descontoAnt);
		
		dupliTextAnt = $('#dupliTabela'+numero).text();
		
		if(dupliTextAnt == 'Ok'){
			dupliValAnt = 1;
			$('#ContasreceberDupli option[value="1"]').attr('selected', true);
		}else if(dupliTextAnt == 'Dupli'){
			dupliValAnt = 0;
			$('#ContasreceberDupli option[value="0"]').attr('selected', true);
		}
		
		//troca botoes
		$('#bt-adicionarConta-receber').hide();
		$('#bt-editarConta-receber').show();
		
		//remove a borda antes de adicionar
		$('#parcelaCont'+numeroAnt).removeClass('shadow-vermelho');
		
		//adicona borda vermelha
		$('#parcelaCont'+numero).addClass('shadow-vermelho');
		
		//recebe numero antigo
		numeroAnt = numero;

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
			var tabelatr = $('#tabela-conta-receber tbody tr');
			tabelatr.each(function(){
				$(this).attr('id','parcelaCont'+contadortr);
				contadortr++;
			});

			contadortd1 = 0;
			var tabelatd1 = $('#tabela-conta-receber tbody tr td:first-child');
			tabelatd1.each(function(){
				$(this).val(contadortd1);
				contadortd1++;
			});
	    
			contadortd3 = 0;
			var tabelatd3 = $('#tabela-conta-receber tbody tr td:nth-child(3)');
			tabelatd3.each(function(){
				$(this).attr('id','dataVenc'+contadortd3);
				contadortd3++;
			});

			contadortd4 = 0;
			var tabelatd4 = $('#tabela-conta-receber tbody tr td:nth-child(4)');
			tabelatd4.each(function(){
				$(this).attr('id','valorTabela'+contadortd4);
				contadortd4++;
			});
	    
			contadortd5 = 0;
			var tabelatd5 = $('#tabela-conta-receber tbody tr td:nth-child(5)');
			tabelatd5.each(function(){
				$(this).attr('id','ident'+contadortd5);
				contadortd5++;
			});
	    
			contadortd6 = 0;
			var tabelatd6 = $('#tabela-conta-receber tbody tr td:nth-child(6)');
			tabelatd6.each(function(){
				$(this).attr('id','periodocrit'+contadortd6);
				contadortd6++;
			});
	    
			contadortd7 = 0;
			var tabelatd7 = $('#tabela-conta-receber tbody tr td:nth-child(7)');
			tabelatd7.each(function(){
				$(this).attr('id','descontoTabela'+contadortd7);
				contadortd7++;
			});
	    
			contadortd8 = 0;
			var tabelatd8 = $('#tabela-conta-receber tbody tr td:nth-child(8)');
			tabelatd8.each(function(){
				$(this).attr('id','agenciaTabela'+contadortd8);
				contadortd8++;
			});
	    
			contadortd9 = 0;
			var tabelatd9 = $('#tabela-conta-receber tbody tr td:nth-child(9)');
			tabelatd9.each(function(){
				$(this).attr('id','contaTabela'+contadortd9);
				contadortd9++;
			});
	    
			contadortd10 = 0;
			var tabelatd10 = $('#tabela-conta-receber tbody tr td:nth-child(10)');
			tabelatd10.each(function(){
				$(this).attr('id','bancoTabela'+contadortd10);
				contadortd10++;
			});
	    
			contadortext = 0;
			var tabelatext = $('#tabela-conta-receber tbody tr td:first-child');
			tabelatext.each(function(){
				$(this).text(contadortext+1);
				contadortext++;
			});
	    
			contadorImg=0;
			var tabelaImg = $('#tabela-conta-receber tbody tr td img:first-child');
			tabelaImg.each(function(){
				$(this).attr('id','clonado'+contadorImg);
				contadorImg++;
			});
			
			contadorImg1=0;
			var tabelaImg1 = $('#tabela-conta-receber tbody tr td img:last-child');
			tabelaImg1.each(function(){
				$(this).attr('id','clonado'+contadorImg1);
				contadorImg1++;
			});
	    
			numeroParcela = contadortext+1;
			numParcela = contadortext;
	    
			$('#ContasreceberParcela').val(numeroParcela)	
			$('#Pagamento0NumeroParcela').val(numParcela);
	    
			if($('#parcelaCont0').length){
				$('#ContasreceberDataEmissao').prop('readonly',true);
				$('#ContasreceberDataEmissao').addClass('borderZero');
				$('#ContasreceberDataEmissao').prop('disabled', true);
			}else{
				$('#ContasreceberDataEmissao').prop('readonly',false);
				$('#ContasreceberDataEmissao').removeClass('borderZero');
				$('#ContasreceberDataEmissao').prop('disabled', false);
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
			$(this).attr('id','ParceladataVencimento-receber'+contadorInput3);
			$(this).attr('name','data[Parcela]['+contadorInput3+'][data_vencimento]');
			contadorInput3++;
		});
		
		contadorInput4=0;
		var input4 = $('div[class*="clonadoProduto"] input:nth-child(5)');
		input4.each(function(){
			$(this).attr('id','ParcelavalorConta-receber'+contadorInput4);
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
		$('#bt-editarConta-receber').hide();
		$('#bt-adicionarConta-receber').show();     

    });

/**************** Modal Parceiro de negocio tipo cliente *****************/
    $('body').on('click', '#ui-id-1 a',function(){
		valorCad= $(this).text();
		
		if(valorCad=="Cadastrar"){
			$(".autocompleteCliente input").val('');
			$("#myModal_add-parceiroCliente").modal('show');
		}
    });
    
  /**************** Modal Tipo Conta *****************/
    $('body').on('click', '#ui-id-2 a',function(){
		valorCad= $(this).text();
		
		if(valorCad=="Cadastrar"){
			$(".autocompleteTipoConta input").val('');
			$("#myModal_add-tipodeConta").modal('show');
		}
    });
    
/**************** Modal Centro Custo *****************/
    $('body').on('click', '#ui-id-3 a',function(){
		valorCad= $(this).text();
		
		if(valorCad=="Cadastrar"){
			$(".autocompleteCentroCusto input").val('');
			$("#myModal_add-centro_custo").modal('show');
		}
    });
    
/********************* Preencher Dados Cliente *********************/
    $("#bt-preencherCliente").click(function(){
		$("#msgValidaParceiro").hide();
		
		valorForncedor=	$("#add-cliente option:selected" ).val();
		valorCpfCnpj= $("#add-cliente option:selected" ).attr('class');
		valorNome= $("#add-cliente option:selected" ).attr('id');

		if(!valorForncedor==""){
			if(valorForncedor=="add-parceiroCliente"){

			}else{
				$(".autocompleteCliente input").val('');
				$(".autocompleteCliente input").removeAttr('required','required');
				
				$("#ContasreceberParceirodenegocioId").val(valorForncedor);
				$("#ContasreceberCpfCnpj").val(valorCpfCnpj);
				$("#ContasreceberParceiro").val(valorNome);
			}
		}
    });
    
/********************* Preencher tipo de conta *********************/
    $("#bt-preencherTipoConta").click(function(){
		valorNome = $("#add-tipoConta option:selected" ).val();
		valortipoconta = $("#add-tipoConta option:selected" ).attr('id');

		if(!valortipoconta == ""){
			if(valortipoconta == "add-tipodeConta"){

			}else{
				$(".autocompleteTipoConta input").val('');
				$(".autocompleteTipoConta input").removeAttr('required','required');
				
				$("#ContasreceberTipodecontaId").val(valortipoconta);
				$("#tipoConta").val(valorNome);
			}
		}
    });
    
/********************* Preencher Dados Custo *********************/
    $("#bt-preencherCentreCusto").click(function(){
		valorCusto = $("#add-custo option:selected" ).attr('id');
		limiteCusto = $("#add-custo option:selected" ).attr('data-limite');
		nomeCusto = $("#add-custo option:selected" ).val();

		if(!valorCusto == ""){
			if(valorCusto == "add-centroCusto"){

			}else{
				$(".autocompleteCentroCusto input").val('');
				$(".autocompleteCentroCusto input").removeAttr('required','required');
				
				$("#ContasreceberCentrocustoId").val(valorCusto);
				$("#nomeCusto").val(nomeCusto);
				$("#limitecusto").val(limiteCusto);
			}
		}
    });
    

/********************* Autocomplete Cliente *********************/
    $(function() {
		$( "#add-cliente" ).combobox();
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
    $("#ContasreceberDataEmissao").focusout(function(){
		var dfuturoEmissao = $("#ContasreceberDataEmissao").val();
		var dataFutura = new Date();

		var anoDigitadoEmissao = dfuturoEmissao.split("/")[2];
		var mesDigitadoEmissao = dfuturoEmissao.split("/")[1];
		var diaDigitadoEmissao = dfuturoEmissao.split("/")[0];

		if(dfuturoEmissao != ''){
			if( diaDigitadoEmissao < 1 || diaDigitadoEmissao > 31 || mesDigitadoEmissao < 1 || mesDigitadoEmissao > 12 || anoDigitadoEmissao <1900 || dfuturoEmissao.length < 6){ 
				$("#msgDataEmissaoInvalida").css("display","block");   
				$("#ContasreceberDataEmissao").addClass('shadow-vermelho');
				$("#ContasreceberDataEmissao").val("");    
			}else{		    
				$("#ContasreceberDataEmissao").removeClass('shadow-vermelho');
				$("#msgDataEmissaoInvalida").css("display","none");  
			}
		}
    });
    
/****************Valida Data Vencimento******************************************/
    $("#dataVencimento-receber").focusout(function(){
		var dfuturoVencimento = $("#dataVencimento-receber").val();
		
		var anoDigitadoVencimento = dfuturoVencimento.split("/")[2];
		var mesDigitadoVencimento = dfuturoVencimento.split("/")[1];
		var diaDigitadoVencimento = dfuturoVencimento.split("/")[0];

		if(dfuturoVencimento != ''){
			if( diaDigitadoVencimento < 1 || diaDigitadoVencimento > 31 || mesDigitadoVencimento < 1 || mesDigitadoVencimento > 12 || anoDigitadoVencimento <1900 || dfuturoVencimento.length < 6){ 
				$("#msgDataVencimentoInvalida").css("display","block");   
				$("#dataVencimento-receber").addClass('shadow-vermelho');
				$("#dataVencimento-receber").val("");    
			}else{		    
				$("#dataVencimento-receber").removeClass('shadow-vermelho');
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
		$('#ContasreceberParcela').val(1);
		$('.btnExcluir').trigger('click');
    });    

/*********** Tira virgula e coloca ponto antes do submit ***********/	
	$('#btn-salvarContaReceber').click(function(){
	    //pega valor
	    ContaValorAux = $('.ContasreceberValor').val();
	    
	    //retira a virgula
	    $('input[class="ContasreceberValor"]').val(ContaValorAux.split('.').join('').replace(',','.'));
	    
	    $('#ContasreceberDataEmissao').prop('disabled', false);
	});
	
/*********** Desabilitar Data de Emissão ***********/	
	$('#bt-adicionarConta-receber').on('click',function(){
		if($('#ContasreceberDataEmissao').val() == ''){
			$('#msgDataEmissao').css('display','block');
			$('[id*="DataEmissao"]').addClass('shadow-vermelho').focus();
			$('html, body').animate({scrollTop:0}, 'slow');
		}else if($('#parcelaCont0').length){
			$('#ContasreceberDataEmissao').prop('readonly',true);
			$('#ContasreceberDataEmissao').addClass('borderZero');
			$('#ContasreceberDataEmissao').prop('disabled', true);
		}else{
			$('#ContasreceberDataEmissao').prop('readonly',false);
			$('#ContasreceberDataEmissao').removeClass('borderZero');
			$('#ContasreceberDataEmissao').prop('disabled', false);
		}
	});
	
/*** Validação entre datas ***/
	$("#dataVencimento-receber").focusout(function(){
		if(validacaoEntreDatas($("#ContasreceberDataEmissao").val(),$("#dataVencimento-receber").val(),"#msgDataVencimentoInvalida")){
			$("#dataVencimento-receber").val("");
			$("#dataVencimento-receber").addClass('shadow-vermelho');
		}
		
	});
	
});
