$(document).ready(function() {

	var total=0;
	var i=0;
	var total=0;

	
/********************* Campos Dinâmicos Saida Manual **************************/

	$('body').on('click','.btnRemItem', function(e){
		 e.preventDefault();
		 clone=$(this).attr('id');
		 numero=clone.substr(7);
		 valTot=$('#vlTotal'+numero).text();
		 flvalTot=parseFloat(valTot);
		 total=total-flvalTot;
		 $('#valorTotal').val(total);
		 $('#SaidaValorTotal').val(total);
		 $('.'+clone).remove();

	});


/**********************************************************/
	$("#LoteDataFabricacao").change(function(){

	  
	    var dfuturo = $("#LoteDataFabricacao").val();
	    var dataAtual = new Date();
	    var dataFormat = ( (dataAtual.getDate()) + '/' + dataAtual.getMonth()+1) + '/' + dataAtual.getFullYear();

		if(dfuturo > dataFormat){
		    $('#validaModLoteDataFabricFutu').css("display","block");
		    $("#LoteDataFabricacao").val("");
		}else{
		   $('#validaModLoteDataFabricFutu').css("display","none");
		}
	 });

/**********************************************************/

	$("#SaidaData, #SaidaData").change(function(){

	    tipoOperacao= $("#vale").val();
	    
	    var dfuturoSaida = $("#SaidaData").val();
	    var dfuturoSaida = $("#SaidaData").val();
	    var dataAtual = new Date();
	    var dataFormat = ( (dataAtual.getDate()) + '/' + dataAtual.getMonth()+1) + '/' + dataAtual.getFullYear();

	    if(tipoOperacao == 0){
		if(dfuturoSaida > dataFormat || dfuturoSaida > dataFormat){
		    //saida
		    $('<span id="spanDataFuturo" class="MsgData">Data Emissão Não Pode ser um Dia Futuro</span>').insertAfter('#SaidaData');
		    $("#SaidaData").addClass('shadow-vermelho');
		    $("#SaidaData").val("");
		    
		    //saida

		    $('<span id="spanDataFuturo" class="MsgData">Data Emissão Não Pode ser um Dia Futuro</span>').insertAfter('#SaidaData');
		    $("#SaidaData").addClass('shadow-vermelho');
		    $("#SaidaData").val("");
		}else{
		    
		    $("#SaidaData").removeClass('shadow-vermelho');
		    $("#spanDataFuturo").remove();
		}
	    }else{
		if(dfuturoSaida > dataFormat || dfuturoSaida > dataFormat){
		    //saida
		    $('<span id="spanDataFuturo" class="MsgData">Data Emissão Não Pode ser um Dia Futuro</span>').insertAfter('#SaidaData');
		    $("#SaidaData").addClass('shadow-vermelho');
		    $("#SaidaData").val("");
		    
		    //saida
		    $('<span id="spanDataFuturo" class="MsgData">Data Emissão Não Pode ser um Dia Futuro</span>').insertAfter('#SaidaData');
		    $("#SaidaData").addClass('shadow-vermelho');
		    $("#SaidaData").val("");
		}else{
		    $("#SaidaData").removeClass('shadow-vermelho');
		    $("#SaidaData").removeClass('shadow-vermelho');
		    $("#spanDataFuturo").remove();
		}
	    }
	});
	
/***************Troca vale~nota*******************************************/
	
	$('#vale').change(function(){
				
		tipoOperacao=$(this).val();		
		if(tipoOperacao == 1){
			
			$(".dadosVale").text('Dados do Vale');
			$("label[for=SaidaNotaFiscal]").html('Número do Vale<span class="campo-obrigatorio">*</span>:');
			$('#campo-direita').css('float','left');
			$("#spanValProduto").css("top","311px");
			$("#spanVaBtConf").css("margin-top","-51px");
			$("label[for=SaidaValorTotal]").text('Valor Total do Vale:');
			$("#spanSaidaNotaFiscal").text("Preencha o campo Numero do Vale");
			$(".tributoVale").text('Dados  do Vale');

			$('#tributos').fadeOut('fast');
			$('.imposto').fadeOut('fast');
			$('.imposto').attr('disabled','disabeld');
			$('.imposto').css('display', 'none');
			
			$('.imposto input').val('');
			$('input, #add-cliente, .tamanho-medio, #spanNomeProduto, #spanDescProduto').val('');
			$('#spanNomeProduto, #spanDescProduto').text('');
			$('.valbtconfimar').remove();
			$('div[class*="clonado"]').remove();
			$('input').removeAttr('required','required');

		}else{
			
			$('#tributos').fadeIn('fast');
			$('.imposto').fadeIn('fast');
			$("label[for=SaidaNotaFiscal]").html('Número NF<span class="campo-obrigatorio">*</span>:');
			$(".dadosVale").text('Dados da Nota');
			$('#campo-direita').css('float','right');
			$("#spanValProduto").css("top","367px");
			$("#spanVaBtConf").css("top","367px");
			$(".tributoVale").text('Dados Tributários da Nota');
			$("#spanSaidaNotaFiscal").text("Preencha o campo Numero NF");
			$("label[for=SaidaValorTotal]").text('Valor Total da Nota:');
			
			$('input, #add-cliente, .tamanho-medio, #spanNomeProduto, #spanDescProduto').val('');
			$('#spanNomeProduto, #spanDescProduto').text('');
			$('.valbtconfimar').remove();
			$('div[class*="clonado"]').remove();
	
		}

		

	});
	
/***************Transição do progresso*******************************************/	

	$('.avancar').bind('click', function(e){
		e.preventDefault();

		id= $(this).attr('id');
		var atual = id.substr(7);
		atualInt=parseInt(atual);
		proximo = atualInt + 1;
		if(proximo <= 3){
			$('.fase').fadeOut('slow');
			$('#fase'+proximo).fadeIn('slow');
		}

	});

	$('.voltar').bind('click', function(e){
		e.preventDefault();

		id= $(this).attr('id');
		var atual = id.substr(7);
		atualInt=parseInt(atual);
		anterior = atualInt - 1;

		if(anterior >= 0){
			$('.fase').fadeOut('slow');
			$('#fase'+anterior).fadeIn('slow');
		}

	});



/*************************** Função de add Lote *******************************/

	$('.bt-add').bind('click',function(){
		
		$('#spanAdicionarLote').css('display','none');

		if($('#ProdutoNome').val() ==''){
			$('#spanValProduto').css('display','block');
		}else{
		
			produto_id=$('#LoteProdutoId').val();
			$("#LoteEstoque").val("");	
			$("#carregaSelect").load('http://dev.lifecare.vento-consulting.com/lotes/carregalote?numero='+produto_id+'', function(){
				$('#myModal_add-lote_saida').modal('show');
			});
			
			//$('#spanProdutoLote').css('display','block');
		}

	}); 
	
	

/*************** Tabela dinâmica dados lote ***********************/

	var lote_cont = 0;
	var array_lotes = [];
	var i;
	function printElement( elem ) {
	//	console.log( elem );


	}


	$('#LoteNumeroLote').on('change', function(){

	    $('input').removeAttr('required','required');

		var numeroLote = $("#LoteNumeroLote").val();
		var produtoId= $(".selectProduto option:selected").val();
		var urlAction = "http://dev.lifecare.vento-consulting.com/Lotes/add";
		var dadosForm = $("#LoteIndexForm").serialize();

		//alert(numeroLote);
		//alert(produtoId);

		$("#loaderAjax").show();
		$("#bt-salvarLote").hide();
		$("#respostaAjax").hide();
		$("#btn-addLote").hide();

		$.ajax({
			type: "POST",
			url: urlAction,
			data:  dadosForm,
			dataType: 'json',
			success: function(data) {

				$("#loaderAjax").hide();
				if(data=="liberado"){
					$("#respostaAjax").show();
					$("#bt-salvarLote").show();
				//	console.log(data);

				}else if(data=="cadastrado"){

				}else{
					if(data != "vazio"){
						var dayFabricacao = data.Lote.data_fabricacao.slice(8,10);
						var monthFabricacao = data.Lote.data_fabricacao.slice(5,7);
						var yearFabricacao = data.Lote.data_fabricacao.slice(0,4);

						var dayValidade = data.Lote.data_validade.slice(8,10);
						var monthValidadeo = data.Lote.data_validade.slice(5,7);
						var yearValidade = data.Lote.data_validade.slice(0,4);



						$("#LoteDataFabricacao").val(dayFabricacao + '/' + monthFabricacao + '/' + yearFabricacao);
						$("#LoteDataValidade").val(dayValidade + '/' + monthValidadeo + '/' + yearValidade);
						$("#LoteParceirodenegocioId").val(data.Lote.parceirodenegocio_id);
						$("#LoteId").val(data.Lote.id);
						$("#btn-addLote").show();
						$("#bt-salvarLote").hide();

						$("#LoteDataFabricacao").attr("disabled","dissabled");
						$("#LoteDataValidade").attr("disabled","dissabled");
						$("#LoteParceirodenegocioId").attr("disabled","dissabled");


					}else{
						$("#LoteNumeroLote").val("Digite o número do lote ");
					}


				}
			}
		});

		//alert(dadosForm);

	});

	$('#LoteNumeroLote').on('input', function() {
		$("#LoteDataFabricacao").val("");
		$("#LoteDataValidade").val("");
		$("#LoteParceirodenegocioId").val("");
		$("#LoteLoteId").val("");
	});
		var lote_cont=0;


/***BTN- SALVAR LOTE***/
	$('#LoteParceirodenegocioId').prepend('<option value="add-fabricante">Cadastrar</option>');
	$('#LoteParceirodenegocioId').prepend('<option value="" selected="selected"></option>');
	$('#bt-salvarLote').click(function(event) {

		event.preventDefault();

		var numeroLote = $("#LoteNumeroLote").val();
		var produtoId= $("#LoteProdutoId").val();
		var urlAction = "http://dev.lifecare.vento-consulting.com/Lotes/add";
		var dadosForm = $("#LoteIndexForm").serialize();
		$("#bt-salvarLote").hide();
		$("#respostaAjax").hide();
		$("#loaderAjax").show();

		var fabricacao = $('#LoteDataFabricacao').val();
		var validade = $('#LoteDataValidade').val();
		var fabricante = $('#LoteParceirodenegocioId').val();
		var Quantidade = $("#LoteQuantidade").val();


		if(numeroLote == ''){
		    $('#validaModLoteNumLote').css("display","block");
		    $( "input[id='LoteNumeroLote']" ).addClass('shadow-vermelho');
		    $("#loaderAjax").hide();
		    $("#bt-salvarLote").show();
		}else if(fabricacao == ''){
		    $('#validaModLoteDataFabric').css("display","block");
		    $( "input[id='LoteDataFabricacao']" ).addClass('shadow-vermelho');
		    $("#loaderAjax").hide();
		    $("#bt-salvarLote").show();
		}else if(validade == ''){
		    $('#validaModLoteValidade').css("display","block");
		    $( "input[id='LoteDataValidade']" ).addClass('shadow-vermelho');
		    $("#loaderAjax").hide();
		    $("#bt-salvarLote").show();
		}else if(fabricante == ''){
		    $('#validaModLoteFabricante').css("display","block");
		    $( "select[id='LoteParceirodenegocioId']" ).addClass('shadow-vermelho');
		    $("#loaderAjax").hide();
		    $("#bt-salvarLote").show();
		}else if(Quantidade == ''){
		    $('#validaModLoteQTDE').css("display","block");
		    $( "input[id='LoteQuantidade']" ).addClass('shadow-vermelho');
		    $("#loaderAjax").hide();
		    $("#bt-salvarLote").show();
		}else{    
		    $.ajax({
			type: "POST",
			url: urlAction,
			data:  dadosForm,
			dataType: 'json',
			success: function(data) {
				//alert("teste");
				var numeroLoteAdd = $("#LoteNumeroLote").val();
				var quantidadeLoteAdd = $("#LoteQuantidade").val();
				var validadeLoteAdd  = $("#LoteDataValidade").val();
				var LoteId = data.Lote.id;

				$("#bt-salvarLote").hide();
				$("#loaderAjax").hide();

				if(numeroLoteAdd !=undefined){
					$('.tabela-lote').append('<tr class="apargarLotes" id="linha"><td class="val-numero-lote coluna">'+numeroLoteAdd+'</td><td><input class="tamanho-qtde soma" readonly="readonly" value="'+quantidadeLoteAdd+'"/></td><td>'+validadeLoteAdd+'</td><td><a href="" data-qtde="'+quantidadeLoteAdd+'" id=clonado'+lote_cont+' class="btnExcluir">remover</a></td></tr> ');

					$('fieldset').append('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Loteiten]['+lote_cont+'][lote_id]" step="any"  id="LoteId'+lote_cont+'lote_id" value="'+LoteId+'" type="hidden"/></div> ');
					$('fieldset').append('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Loteiten]['+lote_cont+'][qtde]" step="any" id="LoteQuantidade'+lote_cont+'qtde" value="'+quantidadeLoteAdd+'" type="hidden"/></div>');
					
					$('fieldset').append('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Loteiten]['+lote_cont+'][produto_id] step="any"  id="LoteitenProduto_id'+lote_cont+'produto_id" value="'+produtoId+'" type="hidden"></div> ');

				    if(verificarClasseSaidaManual){
					$('fieldset').append('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Loteiten]['+lote_cont+'][tipo] step="any"  id="LoteitenTipo'+lote_cont+'tipo" value="SAIDA" type="hidden"></div> ');
				    }else{
					$('fieldset').append('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Loteiten]['+lote_cont+'][tipo] step="any"  id="LoteitenTipo'+lote_cont+'tipo" value="SAIDA" type="hidden"></div> ');
				    }


					$("#bt-salvarLote").show();
					$("#myModal_add-lote").modal('hide');
				//	$('.bt-preencher').hide();

				//	console.debug(data);

				    calcular();
				}else{
					$("#LoteNumeroLote").val("Digite o número do lote ");
				}
				lote_cont=lote_cont+1;
				$("#LoteDataFabricacao").val("");
				$("#LoteDataValidade").val("");
				$("#LoteParceirodenegocioId").val("");
				$("#LoteNumeroLote").val("");
				$("#LoteQuantidade").val("");
				$("#LoteLoteId").val("");

				$("#myModal_add-lote").modal('hide');
				//console.debug(data);

			}
		});
		}
		//alert(dadosForm);

	});

/***************Adicionar lote*******************************************/

	//var lote_cont=0;
	$('body').on('click', '#btn-addLote',function() {
		
	    var temClasseLote = $('td').hasClass('val-numero-lote');

		//alert("teste");
		var numeroLoteAdd = $("#add-lote_saida option:selected").text();
		var quantidadeLoteAdd = $("#LoteQuantidade").val();
		var validadeLoteAdd  = $("#LoteDataValidade").val();
		var LoteId = $("#LoteId").val();
		var Loteiten_Tipo = $('#LoteitenTipo').val();
		var produtoid= $('#LoteProdutoId').val();
		
		if(numeroLoteAdd !=undefined){
		    if($('#LoteQuantidade').val()  == ''){
			$('#validaModLoteQTDE').css("display","block");
			$( "input[id='LoteQuantidade']" ).addClass('shadow-vermelho');
			numeroLoteAdd = $("#LoteNumeroLote").val();
		    }else{ 
			
			$('.tabela-lote').append('<tr class="apargarLotes" id="linha1"><td class="val-numero-lote coluna">'+numeroLoteAdd+'</td><td><input class="tamanho-qtde soma" readonly="readonly" value="'+quantidadeLoteAdd+'"/></td><td>'+validadeLoteAdd+'</td><td><a href="" data-qtde="'+quantidadeLoteAdd+'" id=clonado'+lote_cont+' class="btnExcluir">remover</a></td></tr> ');

			$('fieldset').append('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Loteiten]['+lote_cont+'][lote_id]" step="any"  id="LoteId'+lote_cont+'lote_id" value="'+LoteId+'" type="hidden"/></div> ');
			$('fieldset').append('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Loteiten]['+lote_cont+'][qtde]" step="any" id="LoteQuantidade'+lote_cont+'qtde" value="'+quantidadeLoteAdd+'" type="hidden"/></div>');
			$('fieldset').append('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Loteiten]['+lote_cont+'][produto_id] step="any"  id="LoteitenProduto_id'+lote_cont+'produto_id" value="'+produtoid+'" type="hidden"></div> ');
			
			if(verificarClasseSaidaManual){
			    $('fieldset').append('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Loteiten]['+lote_cont+'][tipo] step="any"  id="LoteitenTipo'+lote_cont+'tipo" value="SAIDA" type="hidden"></div> ');
			}else{
			    $('fieldset').append('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Loteiten]['+lote_cont+'][tipo] step="any"  id="LoteitenTipo'+lote_cont+'tipo" value="SAIDA" type="hidden"></div> ');
			}
			
			//apaga campos
			$("#LoteDataFabricacao").val("");
			$("#LoteDataValidade").val("");
			$("#LoteParceirodenegocioId").val("");
			$("#LoteNumeroLote").val("");
			$("#LoteQuantidade").val("");
			$("#LoteId").val("");



			//$("#bt-salvarLote").show();
			$("#myModal_add-lote_saida").modal('hide');
			
			$("#LoteDataFabricacao").removeAttr("disabled","dissabled");
			$("#LoteDataValidade").removeAttr("disabled","dissabled");
			$("#LoteParceirodenegocioId").removeAttr("disabled","dissabled");
			
			$('#btn-addLote').hide();
			$('.campo-superior-produto input').attr('readonly','readonly').addClass('autocompleteDesabilitado');
		    }

		}else{
			$("#LoteNumeroLote").val("Digite o número do lote ");
		}

		


		lote_cont=lote_cont+1;
		calcular();
	});

		$('.campo-superior-produto input').mouseenter(function(){
		    var temClasseAutoDesab = $('.campo-superior-produto input').hasClass('autocompleteDesabilitado');

		    $('span[id="spanAutocompleteDesabilitado"]').remove();

		    if(temClasseAutoDesab){
			$('<span id="spanAutocompleteDesabilitado">Adicione esse produto para selecionar outro</span>').insertAfter('.campo-superior-produto input');
		    }else{
			$('span[id="spanAutocompleteDesabilitado"]').remove();
		    }
		});

		$('.campo-superior-produto input').mouseleave(function(){
		    $('span[id="spanAutocompleteDesabilitado"]').remove();
		});


/******************** Excluir tabela lote *******************/
	$("body").on("click",'.btnExcluir', function(e){
		e.preventDefault();

		minuendo=$('#qtdTotalProduto').val();
		subtraendo=$(this).attr('data-qtde');

		if(!isNaN( minuendo)){
			var resto = 0;
			resto=minuendo-subtraendo;
		}

		$('#qtdTotalProduto').val(resto);

		id= $(this).attr('id');
		$('.'+id).remove();

		Excluir($(this));
		$(".vu").trigger("change");

		array_lotes.pop();
		i--;
	//	alert(i);

		calcularValorTotal();
	});
	
	

/******************** Valor Unitário, Valor Total(Dados do Produto) *******************/

	function calcularValorTotal(){
		var valorTotalProduto;
		var quantidadeProduto = $('#qtdTotalProduto').val();
		var valorUnitario =  $('#ProdutoitenValorUnitario').val();

		//valorUnitario = valorUnitario.replace(".", "");
		valorUnitario = parseFloat(valorUnitario);
		
		if(isNaN(valorUnitario)){
		    valorUnitario = 0;
		}
		
		valorTotalProduto = quantidadeProduto*valorUnitario;
		valorTotalProdutoAux=parseFloat(valorTotalProduto);
		
		$('#ProdutoitenValorTotal').val(valorTotalProdutoAux.toFixed(2));

	}

	$("body").on('change','#ProdutoitenValorUnitario',function(){
		calcularValorTotal();
	});


/**************** Tabela dinâmica principal **************/

var princ_cont = 0;
    var lotes = '';
  
	var acumuladorTotal;

    var verificarClasseSaidaManual;	
    
    $(".bt-adicionar").bind('click', function(e){
    
	    
	acumuladorTotal=0;

		var lotes = '';

		var table = $('.tabela-lote');

		$('.val-numero-lote').each(function() {

				lotes += $(this).text()+ ', ';
		});

		lotes = lotes.slice(0,-2) + '.';
      //  alert(ValidaCamposBtAdicionar());
	if(!ValidaCamposBtAdicionar()){
	    return false;
	}else{


	     e.preventDefault();
	     //atribuimos os valores nas variaveis

	    //Campos tabela principal

	    codigo=$('#ProdutoCodigo').val();
	    nome=$('#ProdutoNome').val();
	    unidade=$('#ProdutoUnidade').val();
	    descricao=$('#ProdutoDescricao').val();
	    qtde=$('#qtdTotalProduto').val();
	    valor_unitario=$('#ProdutoitenValorUnitario').val();
	    valor_totalAux=$('#ProdutoitenValorTotal').val();
	    cfop=$('#ProdutoitenCfop').val();
	    valor_icms=$('#ProdutoitenValorIcms').val();
	    valor_ipi=$('#ProdutoitenValorIpi').val();
	    Nota_Tipo = $('#NotaTipo').val();
	    Produtoiten_Tipo = $('#ProdutoitenTipo').val();
	    produtoId = $('#LoteProdutoId').val();
	    
	    valor_total=parseFloat(valor_totalAux);
	    
	    acumuladorTotalAux = acumuladorTotal + valor_total;
	    acumuladorTotal=parseFloat(acumuladorTotalAux);
	    
	    vlTotalProdAux= $("#SaidaValorTotalProdutos").val();
	    vlTotal= parseFloat(vlTotalProdAux);
	    
	    if(isNaN(vlTotal)){
		    vlTotal=0;
	    }
	    
	    
	    resultTotal= vlTotal  + acumuladorTotal;
	    
	    
	    $("#SaidaValorTotalProdutos").val(resultTotal.toFixed(2));
	    
	    
	    totNota= $("#SaidaValorTotal").val();
	    floatTotNota=parseFloat(totNota);
	    if(isNaN(floatTotNota)){
		    floatTotNota=0;
	    }
	    
	    
	    somarIcmsIpi();
	    
	    
	    vlTot= acumuladorTotal + floatTotNota;

	    //$("#SaidaValorTotal").val(vlTot);
	    
	    
	    
	    calcValorNota();

	    var lote;

	    if($('#Lote').val() == undefined){
		    lote = "sem lote";
	    }else{
		    lote = $('#Lote').val();
	    }


		    
		//adicionando campos a tabela
		$('#tabela-principal').append('<tr class="valbtconfimar" ><td>'+codigo+'</td><td>'+nome+'</td><td>'+unidade+'</td><td class="descricao"><span title="'+descricao+'">'+descricao+'&nbsp;</span></td><td>'+qtde+'</td><td>'+valor_unitario+'</td><td class=total_clonado'+princ_cont+'>'+valor_totalAux+'</td><td class="imposto">'+cfop+'</td><td class="imposto icms_clonado'+princ_cont+' ">'+valor_icms+'</td><td class="imposto ipi_clonado'+princ_cont+'">'+valor_ipi+'</td> <td><img rel="tooltip" title="'+lotes+'" src="img/icon-dash2.png"/></td> <td><a href="#" id=clonado'+princ_cont+' class="btnRemove">remover</a></td></tr>');

		//$("#vale").trigger("change");
		$('.apargarLotes').remove();
		$('#btn-addLote').hide();
		$('.ui-widget').removeAttr('readonly','readonly');
		$('.ui-widget').removeClass('autocompleteDesabilitado');

		//limpa campos
		$('#ProdutoCodigo').val('');
		$('#spanNomeProduto').remove();
		$('#ProdutoUnidade').val('');
		$('#spanDescProduto').remove();
		$('#qtdTotalProduto').val('');
		$('#ProdutoitenValorUnitario').val('');
		$('#ProdutoitenValorTotal').val('');
		$('#ProdutoitenCfop').val('');
		$('#ProdutoitenValorIcms').val('');
		$('#ProdutoitenValorIpi').val('');
		$('#Lote').val('');
		$('.campo-superior-produto input').val('');
		$('.selectProduto').val('');
		$('#ProdutoNome').val('');


		//Campos hidden tabela principal
		$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][produto_id] step="any"  id="ProdutoitenProduto_id'+princ_cont+'produto_id" value="'+produtoId+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][qtde] step="any"  id="ProdutoitenQtde'+princ_cont+'qtde" value="'+qtde+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][valor_total] step="any"  id="ProdutoitenValorTotal'+princ_cont+'valor_total" value="'+valor_totalAux+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][cfop] step="any"  id="ProdutoitenCfop'+princ_cont+'cfop" value="'+cfop+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][percentual_icms] step="any"  id="ProdutoitenPercentual_icms'+princ_cont+'percentual_icms" value="'+valor_icms+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][percentual_ipi] step="any"  id="ProdutoitenPercentual_ipi'+princ_cont+'percentual_ipi" value="'+valor_ipi+'" type="hidden"></div> ');
		$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][valor_unitario] step="any"  id="Produtoitenvalor_unitario'+princ_cont+'valor_unitario" value="'+valor_unitario+'" type="hidden"></div> ');
	    
		
		
		if(verificarClasseSaidaManual){
		    $('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][tipo] step="any"  id="ProdutoitenTipo'+princ_cont+'tipo" value="SAIDA" type="hidden"></div> ');
		}else{
		    $('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][tipo] step="any"  id="ProdutoitenTipo'+princ_cont+'tipo" value="SAIDA" type="hidden"></div> ');
		}

		princ_cont++;
	
	}
    });
	
/***************************** Função Validar Campos Botão Adicionar *****************************/	
	function ValidaCamposBtAdicionar(){
	    var temClasLote = $('td').hasClass('val-numero-lote');
	    	    
	    $('#spanValProduto').css('display','none');
	    
	    if($('#ProdutoNome').val() ==''){
			$(".campo-superior-produto input").addClass('shadow-vermelho');
			$('#spanValProduto').css('display','block');
			return false;
	    }else if($('#ProdutoitenValorUnitario').val() ==''){
		$("input[id='ProdutoitenValorUnitario']").addClass('shadow-vermelho');
		$('#spanProdutoitenValorUnitario').css('display','block');
		return false;
	    }else if(!temClasLote){
		$('#spanAdicionarLote').css('display','block');
		return false;		
	    }else{
		return true;
	    }
	}
	
/*********************************Calculo do valor total da nota ***************************/
var outrosValores=0;

function calcValorNota(){
		outrosAux= $("#SaidaValorOutros").val();
		outros=parseFloat(outrosAux);
		 if(isNaN(outros)){
			outros=0;
		}
		
		suguroAux = $("#SaidaValorSeguro").val();
		seguro=parseFloat(suguroAux);
		if(isNaN(seguro)){
			seguro=0;
		}
		
		freteAux = $("#SaidaValorFrete").val();
		frete=parseFloat(freteAux);
		if(isNaN(frete)){
			frete=0;
		}
		
		produtosAux = $("#SaidaValorTotalProdutos").val();
		produtos=parseFloat(produtosAux);
		if(isNaN(produtos)){
			produtos=0;
		}
		
		ipiAux = $("#SaidaValorIpi").val();
		ipi=parseFloat(ipiAux);
		if(isNaN(ipi)){
			ipi=0;
		}
		
		icmsAux = $("#SaidaValorIcms").val();
		icms=parseFloat(icmsAux);
		if(isNaN(icms)){
			icms=0;
		}

		novoTotalNota=	outros+  seguro + frete + ipi + icms +produtos;
		
		$('#SaidaValorTotal').val(novoTotalNota.toFixed(2));

}

function somarIcmsIpi(){

	icmsTxt=$("#ProdutoitenValorIcms").val();
	icms=parseFloat(icmsTxt);
	if(isNaN(icms)){
		icms=0;
	}
	$("#ProdutoitenValorIcms").val(icms);
	
	ipiTxt=$("#ProdutoitenValorIpi").val();
	ipi=parseFloat(ipiTxt);
	if(isNaN(ipi)){
		ipi=0;
	}
	
	
	
	vlIcmsAntigoAux= $("#SaidaValorIcms").val();
	vlIcmsAntigo=parseFloat(vlIcmsAntigoAux);
	if(isNaN(vlIcmsAntigo)){
		vlIcmsAntigo=0;
	}
	//alert(vlIcmsAntigo);
	//alert(icms);
	vlIcmsNovo=vlIcmsAntigo + icms;
	$("#SaidaValorIcms").val(vlIcmsNovo.toFixed(2));
	
	

	vlIpiAntigoAux= $("#SaidaValorIpi").val();
	vlIpiAntigo=parseFloat(vlIpiAntigoAux);
	if(isNaN(vlIpiAntigo)){
		vlIpiAntigo=0;
	}
	
	vlIpiNovo=vlIpiAntigo + ipi;
	$("#SaidaValorIpi").val(vlIpiNovo.toFixed(2));
	

}

$('#SaidaValorOutros, #SaidaValorSeguro, #SaidaValorFrete').focusout(function(){

	intoutros=0;
	intseguro=0;
	intfrete=0;
	inttotalNotaAux=0;
	outrosValores=0;
  outros = $('#SaidaValorOutros').val();
  seguro = $('#SaidaValorSeguro').val();
  frete = $('#SaidaValorFrete').val();
  totalNotaAux = $("#SaidaValorTotal").val();
  intoutros= parseFloat(outros);
  intseguro=parseFloat(seguro);
  intfrete=parseFloat(frete);
   inttotalNotaAux=parseFloat(totalNotaAux);

   if(isNaN(intoutros)){
		intoutros=0;
	}

	  if(isNaN(intseguro)){
			intseguro=0;
		}
   if(isNaN(intfrete)){
			intfrete=0;
		}

 if(isNaN(inttotalNotaAux)){
			inttotalNotaAux=0;
		}





  outrosValores = intoutros + intseguro +intfrete;




	calcValorNota();


});

/************************** Validações Campos de Saidas ********************************/
		$('.campo-superior-produto input').removeAttr('required','required');
		$('.campo-superior-produto input').attr('title','Campo Obrigatório');
		
		$('.autocompletecliente input').removeAttr('required','required');
		$('.autocompletecliente input').attr('title','Campo Obrigatório');

		$("body").on('focusout','.validacao-saida, .ui-widget',function(){
		    $('#SaidaNotaFiscal').removeAttr('required','required');
		    $('.campo-superior-produto input').removeAttr('required','required');
		    $('#SaidaData').removeAttr('required','required');
		    $('#spanValProduto').css('display','none');
		    $('.autocompletecliente input').removeAttr('required','required');

		});

		$('.campo-superior-produto').click(function(){
		    $('.campo-superior-produto input').attr('required','required');

		    $('#spanValProduto').css('display','none');
		});
		
		$('.autocompleteCliente').click(function(){
		    $('.autocompleteCliente input').attr('required','required');

		    $('#spanValProduto').css('display','none');
		});


		$("body").on('focusin','.validacao-saida, .ui-widget',function(){

			if( $('#SaidaNotaFiscal').val() !='' ){
			    $( "input[id='SaidaNotaFiscal']" ).removeClass('shadow-vermelho');
			    $('span[id="spanSaidaNotaFiscal"]').remove();

			}else{
			    $( "input[id='SaidaNotaFiscal']" ).removeClass('shadow-vermelho');
			    $('span[id="spanSaidaNotaFiscal"]').remove();
			}

			if( $('#SaidaData').val() !='' ){
				$("input[id='SaidaData']").removeClass('shadow-vermelho');
				$('span[id="spanSaidaData"]').remove();
				$('span[id="spanDataFuturo"]').remove();
			}else{
			    $("input[id='SaidaData']").removeClass('shadow-vermelho');
			    $('span[id="spanSaidaData"]').remove();
			    $('span[id="spanDataFuturo"]').remove();
			}

			if( $('#SaidaCpfCnpj').val() !='' ){
				$(".autocompleteCliente input").removeClass('shadow-vermelho');
				$('.autocompleteCliente input').removeAttr('required','required');
				$('#spanSaidaCpfCnpj').css('display','none');
			}else{
			    $(".autocompleteCliente input").removeClass('shadow-vermelho');
			    $('#spanSaidaCpfCnpj').css('display','none');
			}

			if($('#ui-id-4').val() !=''){
			    $(".autocompleteCliente input").removeClass('shadow-vermelho');
			    $('#spanSaidaCpfCnpj').css('display','none');
			}else{
			   $(".autocompleteCliente input").removeClass('shadow-vermelho');
			    $('#spanSaidaCpfCnpj').css('display','none');
			}

			if($('.campo-superior-produto input').val() !='' ){
			    $(".campo-superior-produto input").removeClass('shadow-vermelho');
			    $('.campo-superior-produto input').removeAttr('required','required');
			    $('#spanValProduto').css('display','none');
			}else{
			    $(".campo-superior-produto input").removeClass('shadow-vermelho');
			    $('#spanValProduto').css('display','none');
			}

			if( $('#ProdutoitenValorUnitario').val() !='' ){
				$("input[id='ProdutoitenValorUnitario']").removeClass('shadow-vermelho');
				$('#spanProdutoitenValorUnitario').css('display','none');
				$('.campo-superior-produto input').removeAttr('required','required');
				calcularValorTotal();
			}else{
			   $("input[id='ProdutoitenValorUnitario']").removeClass('shadow-vermelho');
			    $('#spanProdutoitenValorUnitario').css('display','none');
			}

			if($('#LoteNumeroLote').val() !=''){
			    $('#validaModLoteNumLote').css("display","none");
			    $( "input[id='LoteNumeroLote']" ).removeClass('shadow-vermelho');
			}else{
			    $('#validaModLoteNumLote').css("display","none");
			    $( "input[id='LoteNumeroLote']" ).removeClass('shadow-vermelho');
			}

			if($('#LoteDataFabricacao').val() !=''){
			    $( "input[id='LoteDataFabricacao']" ).removeClass('shadow-vermelho');
			    $( "input[id='LoteDataFabricacao']" ).removeAttr('required','required');
			    $('#validaModLoteDataFabric').css("display","none");
			}else{
			    $( "input[id='LoteDataFabricacao']" ).removeClass('shadow-vermelho');
			    $( "input[id='LoteDataFabricacao']" ).removeAttr('required','required');
			    $('#validaModLoteDataFabric').css("display","none");
			}

			if($('#LoteDataValidade').val() != ''){
			    $( "input[id='LoteDataValidade']" ).removeClass('shadow-vermelho');
			    $( "input[id='LoteDataValidade']" ).removeAttr('required','required');
			    $('#validaModLoteValidade').css("display","none");
			}else{
			    $( "input[id='LoteDataValidade']" ).removeClass('shadow-vermelho');
			    $( "input[id='LoteDataValidade']" ).removeAttr('required','required');
			    $('#validaModLoteValidade').css("display","none");
			}

			if($('#LoteParceirodenegocioId').val() != ''){
			    $( "select[id='LoteParceirodenegocioId']" ).removeClass('shadow-vermelho');
			    $('#validaModLoteFabricante').css("display","none");
			}else{
			    $( "select[id='LoteParceirodenegocioId']" ).removeClass('shadow-vermelho');
			    $('#validaModLoteFabricante').css("display","none");
			}
			
			if($("#LoteQuantidade").val() != ''){
			    $('#validaModLoteQTDE').css("display","none");
			    $("input[id='LoteQuantidade']").removeClass('shadow-vermelho');
			}else{
			    $('#validaModLoteQTDE').css("display","none");
			    $( "input[id='LoteQuantidade']" ).removeClass('shadow-vermelho');
			}
			
		});
		
		$("body").on('focusin, click','.validacao-saida, .ui-widget',function(){
		    $('.validacao-saida').removeClass('shadow-vermelho');
		    $('span[class*="Msg"]').css("display","none");
		});	
			
		$("body").on('focusin, click','.validacao-cadastrar',function(){
		    $('.validacao-cadastrar').removeClass('shadow-vermelho');
		    $('span[id*="valida"]').css('display','none');
    
		    $('.validacao-cadastrar').removeClass('shadow-vermelho');
		    $('span[id*="spanMsgCategoria"]').css('display','none');
		    
	
		});
		
		$('span ,input').on('focusin, click','span[class*="Msg"], input',function(){
		    $('span[class*="Msg"]').css('display','none');
		    
		  //  $('span[class*="Msg"]').remove();
		    
		});
		
		$('body').on('focusin, click','#ProdutoEstoqueMinimo, #spanEstoqueMinimo', function(){
		    $('span[id="spanEstoqueMinimo"]').remove();
		});    
    
		$("body").on('click','#spanVaBtConf',function(){
		    $('#spanVaBtConf').remove();
		});

		$("body").on('click','.bt-preencher_Cliente',function(){
			if( $('#SaidaCpfCnpj').val() !='' ){
			    $(".autocompleteCliente input").removeClass('shadow-vermelho');
			    $('#spanSaidaCpfCnpj').css('display','none');
			}
		});


/******************** Excluir tabela principal *******************/
	$("body").on("click",'.btnRemove', function(e){
	
		
		var novoVal=0;
		acumuladorTotal=0;
		e.preventDefault();

		id= $(this).attr('id');
		numero= id.substr(7);
		txtVal=$('.total_clonado'+numero).text();
		icmsClonado=$('.icms_clonado'+numero).text();
		ipiClonado=$('.ipi_clonado'+numero).text();

		$('fieldset .'+id).remove();
		Excluir($(this));





		intVAl=parseFloat(txtVal);
		 if(isNaN(intVAl)){
			intVAl=0;
		}
		
		icms=parseFloat(icmsClonado);
		 if(isNaN(icms)){
			icms=0;
		}
		
		ipi=parseFloat(ipiClonado);
		 if(isNaN(ipi)){
			ipi=0;
		}
		
		acumuladorTotalAux = $("#SaidaValorTotalProdutos").val();
		acumuladorTotal=parseFloat(acumuladorTotalAux);
		
		 if(isNaN(acumuladorTotal)){
			acumuladorTotal=0;
		}
		
		novoVal= acumuladorTotal - intVAl;
		$("#SaidaValorTotalProdutos").val(novoVal.toFixed(2));
		
		
		
		
		
		acumuladorIpiAux = $("#SaidaValorIpi").val();
		acumuladorIpiTotal=parseFloat(acumuladorIpiAux);
		
		 if(isNaN(acumuladorIpiTotal)){
			acumuladorIpiTotal=0;
		}
		
		novoValIpi= acumuladorIpiTotal - ipi;
		$("#SaidaValorIpi").val(novoValIpi.toFixed(2));
		
		acumuladorIcmsAux = $("#SaidaValorIcms").val();
		acumuladorIcmsTotal=parseFloat(acumuladorIcmsAux);
		
		 if(isNaN(acumuladorIcmsTotal)){
			acumuladorIcmsTotal=0;
		}
		
		novoValIcms= acumuladorIcmsTotal - icms;
		$("#SaidaValorIcms").val(novoValIcms.toFixed(2));		
		
		

		calcValorNota();
		
		
	});


/********* Função Excluir da tabela dinâmica ***********************/
	function Excluir(e){

		var par = e.parent().parent();
		par.remove();

	};


/******************* Soma QTDE ************************************/

	function calcular(){

		var soma = 0;

		$(".soma").each(function(indice,item){
			var valor = parseFloat($(item).val());
			console.log(valor);
			if(!isNaN( valor)){
				soma += valor;
			}

		});

		$("#qtdTotalProduto").val(soma);
		//$(".resultado-qtde").val(soma);

		calcularValorTotal();
	}


/********************* Barra de Progresso *****************************/

   /**** Avançar Saida/Saida Manual ***/
	$('.avancar').click(function(){

		var atual = id.substr(7);

	//	alert(atual);

		id= $(this).attr('id');
		atualInt=parseInt(atual);

		if(atual <= 2){
			$('#fase'+atual).fadeOut('fast',function(){
				$('.DivRecurso').fadeIn('slow',function(){
						$('none').fadeIn("slow");
						$('.bt-voltar').attr('id', 'voltar2');

				});
			});

		}
	});


/***************************** Função Validar Campos Botão Confirmar *****************************/
	function ValidaCamposBtConfirmar(){
		var temclasvalbtconf = $('tr').hasClass('valbtconfimar');
		
		$('#spanValProduto').css('display','none');

		if( $('#SaidaNotaFiscal').val() =='' || $('#SaidaNotaFiscal').val() ==''){
		    //saida
		    $('span[id="spanSaidaNotaFiscal"]').remove();
		    $("input[id='SaidaNotaFiscal']").addClass('shadow-vermelho');
		    $('<span id="spanSaidaNotaFiscal" class="MsgNotaFiscal">Preencha o campo Numero NF</span>').insertAfter('input[id="SaidaNotaFiscal"]');
		    
		    //saida
		    $('span[id="spanSaidaNotaFiscal"]').remove();
		    $("input[id='SaidaNotaFiscal']").addClass('shadow-vermelho');
		    $('<span id="spanSaidaNotaFiscal" class="MsgNotaFiscal">Preencha o campo Numero NF</span>').insertAfter('input[id="SaidaNotaFiscal"]');
		    
		    $('html, body').animate({scrollTop:0}, 'slow');
		    return false;
		}else if( $('#SaidaData').val() =='' ||$('#SaidaData').val() ==''  ){
		    $('span[id="spanSaidaData"]').remove();
		    $('span[id="spanSaidaData"]').remove();
		    $('span[id="spanDataFuturo"]').remove();
		    
		    //saida
		    $('<span id="spanSaidaData" class="MsgData">Preencha o campo Data Emissão</span>').insertAfter('input[id="SaidaData"]');
		    $("input[id='SaidaData']").addClass('shadow-vermelho');
		    
		    //saida
		    $('<span id="spanSaidaData" class="MsgData">Preencha o campo Data Emissão</span>').insertAfter('input[id="SaidaData"]');
		    $("input[id='SaidaData']").addClass('shadow-vermelho');
		    
		    $('html, body').animate({scrollTop:0}, 'slow');
		    return false;
		}else if( $('#SaidaCpfCnpj').val() =='' || $('#SaidaCpfCnpj').val() ==''){
		    $(".autocompleteCliente input").addClass('shadow-vermelho');
		    
		    //saida
		    $('#spanSaidaCpfCnpj').css('display','block');
		    
		    //saida
		    $('#spanSaidaCpfCnpj').css('display','block');
		    
		    $('html, body').animate({scrollTop:0}, 'slow');
		    return false;
		}else if(!temclasvalbtconf){
		    $('#spanVaBtConf').remove();
		    $('<span id="spanVaBtConf" class="MsgVaBtConf">Adicione produtos e lotes a tabela.</span>').insertAfter('.campo-superior-produto').css('float','left');
		    return false;
		}else{
		    return true;
		}
	}

  /*** Avançar Tela resultado ***/
	$('.bt-confirmar').bind('click',function(e){
		

		//alert(ValidaCamposBtConfirmar());
		if(!ValidaCamposBtConfirmar()){
		    ValidaCamposBtConfirmar();
		    return false;
		}else{
			id= $(this).attr('id');
			var atual_saida = id.substr(7);

			proximo_saida=parseInt(atual_saida);
			$('.desabilita').attr('readonly', 'readonly');
			$('.ui-widget').attr('readonly','readonly');
			$("[class*='ui-button']").css('display','none');
			$('.dados-produto').hide();
			$('.tela-resultado').hide();
			$('#titulo-header').html('Visualizar e Salvar');
			$('#visualizar-circulo').addClass('complete');
			$('#visualizar-linha').addClass('complete');
			$('#visualizar-escrita').html('Visualizar e Salvar');
			$('.saidas td:nth-last-child(1), th:nth-last-child(1)').hide();
			$('.bt-confirmar').hide();
			$('.bt-salvar').show();
			$('.bt-voltar').attr('id', 'voltar3');
			$('html, body').animate({scrollTop:0}, 'slow');
		}
	}); 

	/*** Voltar Saida/Saída Manual ***/
		$('.voltar').bind('click', function(e){
			e.preventDefault();

			id= $(this).attr('id');

			var atual_saida = id.substr(6);

			proximo_saida=parseInt(atual_saida);

		//	alert(proximo_saida);

			nova_saida=proximo_saida - 1;

		//	alert(nova_saida);

			if(proximo_saida==3){

				$('.desabilita').removeAttr('readonly','readonly');
				$('.ui-widget').removeAttr('readonly','readonly');
				$("[class*='ui-button']").css('display','inherit');
				$('.dados-produto').show();
				$('.tela-resultado').show();
				$('#titulo-header').html('Saida Manual');
				$('#visualizar-circulo').removeClass('complete');
				$('#visualizar-linha').removeClass('complete');
				$('#visualizar-escrita').html('');
				$('.saidas td:nth-last-child(1), th:nth-last-child(1)').show();
				$('.bt-confirmar').show();
			//	$('.bt-confirmar').css('float','right');
				$('.bt-salvar').hide();
				$('.bt-voltar').attr('id', 'voltar2');
				$('html, body').animate({scrollTop:0}, 'slow');


			}else{
			//	alert(nova_saida);

				$('.fase').fadeOut('fast');
				$('#fase'+nova_saida).fadeIn('slow');
				$('.bt-voltar').attr('id', 'voltar0');
				$('html, body').animate({scrollTop:0}, 'slow');
			}

		});



/*************Funcões para Saida Manual*******************/
 $('.bt-preencher').bind('click', function(){
	nomeProd = $(".selectProduto option:selected").text();
	nomeUnidade = $(".selectProduto option:selected").attr('class');
	nomeDesc = $(".selectProduto option:selected").attr('rel');
	nomeCod = $(".selectProduto option:selected").attr('id');
	produtoCfop = $(".selectProduto option:selected").attr('data-cfop');
	produtoid = $(".selectProduto option:selected").val();
	

	$("#LoteProdutoId").val(produtoid);

	if(nomeProd=="Cadastrar"){//$(".selectProduto").trigger("change");
			nomeUnidade = '';
	}
	if( nomeProd==undefined || nomeProd=="Cadastrar" ){nomeProd=""}
	if( nomeUnidade==undefined){nomeUnidade=""}
	if( nomeDesc==undefined){nomeDesc=""}
	if( nomeCod==undefined){nomeCod=""}
	if( produtoCfop==undefined){produtoCfop=""}
	

	if(nomeProd!=""){
	    $('#ProdutoCodigo').val(nomeCod);
	    $('#ProdutoNome').val(nomeProd);
	    $('#divNomeProduto').html('<span id="spanNomeProduto" class="dadosSaida">' + nomeProd + '</span>')
	    $('#ProdutoUnidade').val(nomeUnidade);
	    $('#ProdutoDescricao').val(nomeDesc);
	    $('#ProdutoitenCfop').val(produtoCfop);
	    $('#divDescProduto').html('<span id="spanDescProduto"  class="dadosSaida">' + nomeDesc + '</span>')
	    
	}
 });


	/**Data Lote**/

	$(".validaLote").focusout(function(){
		 var texto = $(this).val();
			if(texto.length == 0){
					$( "input[id='filterDataLote-between']" ).addClass('shadow-vermelho');
				}
			else{
					$( "input[id='filterDataLote-between']" ).removeClass('shadow-vermelho');
			}
		});


	$(".validaLote").change(function(){
				var dataInicialLote = $("input[id='filterDataLote']").datepicker('getDate');
				var dataFinalLote = $("input[id='filterDataLote-between']").datepicker('getDate');

				var daysLote = (dataFinalLote - dataInicialLote) / 1000 / 60 / 60 / 24;

				if(daysLote < 0){
				    $('span[id="spanDataInicialLote"]').remove();
				    $('<span id="spanDataInicialLote">A data Final não pode ser menor que a inicial</span>').insertAfter('input[id="filterDataLote-between"]');
				    //alert('A data Final não pode ser menor que a inicial');
				    $("input[id='filterDataLote-between']").val(" ");
				    $( "input[id='filterDataLote-between']" ).addClass('shadow-vermelho');
				}else{
				    $('span[id="spanDataInicialLote"]').remove();
				}
		});

		/**Data Nota**/

	$("input[id='filterDataNota-between']").addClass('validaNota');
	$("input[id='filterDataNota']").addClass('validaNota');

	$(".validaNota").focusout(function(){
		 var texto = $(this).val();
			if(texto.length == 0){
					$( "input[id='filterDataNota-between']" ).addClass('shadow-vermelho');
				}
			else{
					$( "input[id='filterDataNota-between']" ).removeClass('shadow-vermelho');
				}
		});

	$(".validaNota").change(function(){

				var dataInicialNota = $("input[id='filterDataNota']").datepicker('getDate');
				var dataFinalNota = $("input[id='filterDataNota-between']").datepicker('getDate');

				var daysNota = (dataFinalNota - dataInicialNota) / 1000 / 60 / 60 / 24;

				if(daysNota < 0){
					$('span[id="spanDataInicialNota"]').remove();
					$('<span id="spanDataInicialNota">A data Final não pode ser menor que a inicial</span>').insertAfter('input[id="filterDataNota-between"]');
					//alert('A data Final não pode ser menor que a inicial');
					$("input[id='filterDataNota-between']").val("");
					$("input[id='filterDataNota-between']").addClass('shadow-vermelho');
				}else{
				    $('span[id="spanDataInicialNota"]').remove();
				}

		});

/**********************************************************/


	$("input[id='LoteDataFabricacao']").focusout(function(){
		var texto = $(this).val();
			if(texto.length == 0){
					$( "input[id='LoteDataFabricacao']" ).addClass('shadow-vermelho');
				}
			else{
					$( "input[id='LoteDataFabricacao']" ).removeClass('shadow-vermelho');
				}
		});

	$("input[id='LoteDataFabricacao']").change(function(){
		var texto = $(this).val();
			if(texto.length == 0){
					$( "input[id='LoteDataFabricacao']" ).addClass('shadow-vermelho');
				}
			else{
					$( "input[id='LoteDataFabricacao']" ).removeClass('shadow-vermelho');
				}
		});

	$('body').on('change',"input[id='LoteDataFabricacao'],input[id='LoteDataValidade']",function(){
				var fab = $(this).val();

				if(fab.length != 0){
						var dataInicialNota = $("input[id='LoteDataFabricacao']").datepicker('getDate');
						var dataFinalNota = $("input[id='LoteDataValidade']").datepicker('getDate');
						if(dataFinalNota > 0){
									var daysNota = (dataFinalNota - dataInicialNota) / 1000 / 60 / 60 / 24;
								}
				}

				if(daysNota < 0){
						$('span[id="spanLoteDataFabricacao"]').remove();
						$('<span id="spanLoteDataFabricacao">A data de validade não pode ser menor que a data de fabricação</span>').insertAfter('input[id="LoteDataFabricacao"]');

						//alert('A data de validade não pode ser menor que a data de fabricação');
						$("input[id='LoteDataFabricacao']").val("");
						$("input[id='LoteDataValidade']").val("");
						$("input[id='LoteDataFabricacao']").addClass('shadow-vermelho');
						$("input[id='LoteDataValidade']").addClass('shadow-vermelho');


					    }

				if(daysNota > 0){
						    $('span[id="spanLoteDataFabricacao"]').remove();
						    $("input[id='LoteDataFabricacao']").removeClass('shadow-vermelho');
						    $("input[id='LoteDataValidade']").removeClass('shadow-vermelho');
						}

		});



/*********** Mascara Saidas ***********/
	jQuery(function(){

		$(".nfiscal").focus(function(){
			$( ".nfiscal" ).mask("99999999");
		});
		
		$(".numeroQtde").focus(function(){
		    $( ".numeroQtde" ).mask("999999999999999");
		});
		
		$(".dinheiro").attr("maxlength","20");
		jQuery(function($){
		    $(".dinheiro").mask("#0.00", {reverse: true, maxlength: false});
		});

	 
	});

});
