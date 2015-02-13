
$(document).ready(function() {
	var total=0;
	var i=0;
	var total=0;

	
/*** Validação de Datas ***********************************************/

$('.inputData').on("keypress",function(event){
		var charCode = event.keyCode || event.which;

	    if (!((charCode > 47) && (charCode < 58) || (charCode == 8) || (charCode == 9))){return false;} else {return true}
    });
    
    $(".inputData").focusout(function(){
		var elemento = $(this).val();

		var dia = elemento.substring(0,2);
		var mes = elemento.substring(3,5);
		var ano = elemento.substring(6,11);

		if(ano.length == 1){
			$(this).val().slice(0,-1);
			$(this).val(dia +"/"+ mes +"/200"+ ano);
		}
		
		if(ano.length == 2){
			$(this).val().slice(0,-2);
			$(this).val(dia +"/"+ mes +"/20"+ ano);
		}
		
		if(ano.length == 3){
			$(this).val().slice(0,-3);
			$(this).val(dia +"/"+ mes +"/2"+ ano);
		}

		if(dia > 31){
			$(this).val("");
		}
		
		if(mes > 12){
			$(this).val("");
		}
		
		if((dia > 29) && (mes == 2)){
			$(this).val("");
		}
	});


	
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


/****************Valida Data******************************************/
	$("#LoteDataFabricacao").focusout(function(){

	    var dfuturoSaida = $("#LoteDataFabricacao").val();
	    var dataFutura = new Date();
	   	    
	    dataFutura.setYear(dfuturoSaida.split("/")[2]);
	    dataFutura.setMonth(dfuturoSaida.split("/")[1]-1);
	    dataFutura.setDate(dfuturoSaida.split("/")[0]);
	    
	    var anoDigitado = dfuturoSaida.split("/")[2];
	    var mesDigitado = dfuturoSaida.split("/")[1];
	    var diaDigitado = dfuturoSaida.split("/")[0];
	    
	    var dataAtual = new Date();
	    var dataFormat = dataAtual.getDate() + '/' + (dataAtual.getMonth()+1) + '/' + dataAtual.getFullYear();
		

	    if(dataFutura.getTime() > dataAtual.getTime()){
		$("#validaModLoteDataFabricFutu").css("display","block");
		$("#LoteDataFabricacao").addClass('shadow-vermelho').focus();
		$("#LoteDataFabricacao").val("");
	    }else if( diaDigitado < 1 || diaDigitado > 31 || mesDigitado < 1 || mesDigitado > 12 || anoDigitado <1900 || dfuturoSaida.length < 6 ){ 
		$("#validaModLoteDataFabricInvalida").css("display","block");   
		$("#LoteDataFabricacao").addClass('shadow-vermelho').focus();
		$("#LoteDataFabricacao").val("");    
	    }else{		    
		$("#LoteDataFabricacao").removeClass('shadow-vermelho');
		$("#validaModLoteDataFabricFutu").css("display","none");
		$("#validaModLoteDataFabricInvalida").css("display","none"); 
	    }
	    
	 });
	 

/****************Valida Data******************************************/
	$("#LoteDataValidade").focusout(function(){

	    var dfuturoSaida = $("#LoteDataValidade").val();
	    var dataFutura = new Date();

	    var anoDigitado = dfuturoSaida.split("/")[2];
	    var mesDigitado = dfuturoSaida.split("/")[1];
	    var diaDigitado = dfuturoSaida.split("/")[0];


	    if( diaDigitado < 1 || diaDigitado > 31 || mesDigitado < 1 || mesDigitado > 12 || anoDigitado <1900 || dfuturoSaida.length < 6 ){ 
		$("#validaModLoteDataValInvalida").css("display","block");   
		$("#LoteDataValidade").addClass('shadow-vermelho').focus();
		$("#LoteDataValidade").val("");    
	    }else{		    
		$("#LoteDataValidade").removeClass('shadow-vermelho');
		$("#validaModLoteDataValInvalida").css("display","none");  
		
	    }
	    
	 });

/***************Valida Data*******************************************/

	$("#SaidaData").on("change",function(){


		var dfuturoSaida = $("#SaidaData").val();
	    var dataFutura = new Date();
	    
	    $("#spanSaidaData").hide();
	    
	    dataFutura.setYear(dfuturoSaida.split("/")[2]);
	    dataFutura.setMonth(dfuturoSaida.split("/")[1]-1);
	    dataFutura.setDate(dfuturoSaida.split("/")[0]);
	    
	    var anoDigitado = dfuturoSaida.split("/")[2];
	    var mesDigitado = dfuturoSaida.split("/")[1];
	    var diaDigitado = dfuturoSaida.split("/")[0];
	    
	    var dataAtual = new Date();
	    var dataFormat = dataAtual.getDate() + '/' + (dataAtual.getMonth()+1) + '/' + dataAtual.getFullYear();
					
	    if(dataFutura.getTime() > dataAtual.getTime()){
		$('#spanDataFuturoSaida').css("display","block").focus();
		$("#SaidaData").addClass('shadow-vermelho');
		$("#SaidaData").val("");
	    }else if( diaDigitado < 1 || diaDigitado > 31 || mesDigitado < 1 || mesDigitado > 12 || anoDigitado <1900 || dfuturoSaida.length < 6){ 
		$("#spanDataInvalidaSaida").css("display","block").focus();   
		$("#SaidaData").addClass('shadow-vermelho');
		$("#SaidaData").val("");   
		
	    }else{
		
		$("#SaidaData").removeClass('shadow-vermelho');
		$("#spanDataFuturoSaida").hide();
	    }
	   
	});
	
/***************Troca Vale ~ Nota*******************************************/	
	
	$('#vale').change(function(){
	
		$("#SaidaDevolucao").prop('checked', false); 
	
		tipoOperacao=$(this).val();		
		if(tipoOperacao == 1){
			
			$('#campo-direita').css('float','left');
			$("#spanValProduto").css("top","311px");
			$("#spanVaBtConf").css("margin-top","-51px");
			//$("label[for=SaidaNotaFiscal]").css("margin-left","-26px");
			$("#ajusteCampoObs.coluna-esquerda").removeClass("coluna-esquerda").addClass("coluna-direita");
			$("#ajusteNumeroVale").css("margin-left","0px");
			$("#campo-direita").css("margin-left","25px");
			$("#campo-direita").css("margin-right","0px");
			
			
			$("label[for=SaidaValorTotal]").text('Valor Total do Vale:');
			$("#spanSaidaNotaFiscal").text("Preencha o campo Numero do Vale");
			$(".tributoVale").text('Dados  do Vale');
			$(".dadosVale").text('Dados do Vale');
			$("label[for=SaidaNotaFiscal]").html('Número do Vale<span class="campo-obrigatorio">*</span>:');

			$('#tributos').fadeOut('fast');
			$('.imposto').fadeOut('fast');
			$('.imposto').attr('disabled','disabeld');
			$('.imposto').css('display', 'none');
			$('.table-none').css('display', 'none');
			$('.limpa').val('');
			$('#add-cliente, .tamanho-medio, #spanNomeProduto, #spanDescProduto').val('');
			$('#spanNomeProduto, #spanDescProduto').text('');
			$('.valbtconfimar').remove();
			$('.apargarLotes').remove();
			$('div[class*="clonado"]').remove();
			$('input').removeAttr('required','required');
			$('.ui-widget').val('');
			$('.ui-widget').removeAttr('readonly','readonly');
			$('.ui-widget').removeClass('autocompleteDesabilitado');
			$('span[class^="DinamicaMsg"]').remove();
			$('span[class*="Msg"]').css('display','none');
			$('.validacao-entrada').removeClass('shadow-vermelho');

		}else{
			
			$('#tributos').fadeIn('fast');
			$('.imposto').fadeIn('fast');			
			$('.table-none').css('display', 'block');
			$("#ajusteCampoObs.coluna-direita").removeClass("coluna-direita").addClass("coluna-esquerda");
			$("#ajusteNumeroVale").css("margin-left","25px");
			$("#campo-direita").css("margin-left","0px");
			$("#campo-direita").css("margin-right","2px");
			
			$("label[for=SaidaNotaFiscal]").html('Número NF<span class="campo-obrigatorio">*</span>:');
			$(".dadosVale").text('Dados da Nota');
			$('#campo-direita').css('float','right');
			$("#spanValProduto").css("top","367px");
			$("#spanVaBtConf").css("top","367px");
			

			$(".tributoVale").text('Dados Tributários da Nota');
			$("#spanSaidaNotaFiscal").text("Preencha o campo Numero NF");
			$("label[for=SaidaValorTotal]").text('Valor Total da Nota:');			
			$('#add-cliente, .tamanho-medio, #spanNomeProduto, #spanDescProduto').val('');
			$('#spanNomeProduto, #spanDescProduto').text('');
			$('.valbtconfimar').remove();
			$('.apargarLotes').remove();
			$('.ui-widget').val('');
			$('div[class*="clonado"]').remove();
			$('.ui-widget').removeAttr('readonly','readonly');
			$('.ui-widget').removeClass('autocompleteDesabilitado');
			$('.limpa').val('');
			$('span[class^="Msg"]').remove();
			$('span[class*="Msg"]').css('display','none');
			$('.validacao-entrada').removeClass('shadow-vermelho');
			$('.limpa').val('');
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



/*************** Tabela dinâmica dados lote ***********************/

	var lote_cont = 0;
	var array_lotes = [];
	var i;
	function printElement( elem ) {
	//	console.log( elem );
	}


	$('#LoteNumeroLote').on('change', function(){
	    
	    //$('input').removeAttr('required','required');
	    $("#LoteDataFabricacao").removeAttr("disabled","disabled");
	    $("#LoteDataValidade").removeAttr("disabled","disabled");
	    $("#LoteParceirodenegocioId").removeAttr("disabled","disabled");

		var numeroLote = $("#LoteNumeroLote").val();
		var produtoId= $(".selectProduto option:selected").val();
		var urlAction = urlInicio+"Lotes/add";
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

						$("#LoteDataFabricacao").attr("disabled","disabled");
						//$('#LoteDataFabricacao').removeAttr("required","required");
						$("#LoteDataValidade").attr("disabled","disabled");
						$("#LoteParceirodenegocioId").attr("disabled","disabled");
						$("#validaModLoteQTDE").css("display","none");
		
					}else{
						$("#LoteNumeroLote").val("Digite o número do lote ");
					}


				}
			}
		});

		//alert(dadosForm);

	});

/***************Limpa Dados do Lote no Modal*******************************************/
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
		var urlAction = urlInicio+"Lotes/add";
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
		    $( "input[id='LoteNumeroLote']" ).addClass('shadow-vermelho').focus();
		    $("#loaderAjax").hide();
		    $("#bt-salvarLote").show();
		}else if(fabricacao == ''){
		    $('#validaModLoteDataFabric').css("display","block");
		    $( "input[id='LoteDataFabricacao']" ).addClass('shadow-vermelho').focus();
		    $("#loaderAjax").hide();
		    $("#bt-salvarLote").show();
		}else if(validade == ''){
		    $('#validaModLoteValidade').css("display","block");
		    $( "input[id='LoteDataValidade']" ).addClass('shadow-vermelho').focus();
		    $("#loaderAjax").hide();
		    $("#bt-salvarLote").show();
		}else if(fabricante == ''){
		    $('#validaModLoteFabricante').css("display","block");
		    $( "select[id='LoteParceirodenegocioId']" ).addClass('shadow-vermelho').focus();
		    $("#loaderAjax").hide();
		    $("#bt-salvarLote").show();
		}else if(Quantidade == ''){
		    $('#validaModLoteQTDE').css("display","block");
		    $( "input[id='LoteQuantidade']" ).addClass('shadow-vermelho').focus();
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
					$('.tabela-lote').append('<tr class="apargarLotes" id="linha"><td class="val-numero-lote coluna">'+numeroLoteAdd+'</td><td><input class="tamanho-qtde soma" readonly="readonly" value="'+quantidadeLoteAdd+'"/></td><td>'+validadeLoteAdd+'</td><td><img title="Remover" alt="Remover" src="../app/webroot/img/lixeira.png" data-qtde="'+quantidadeLoteAdd+'" id=clonado'+lote_cont+' class="btnExcluir"/></td></tr> ');

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

/***************- Limpar Campos ao Fechar Modal Lote -*******************************************/

	
/***************Adicionar lote*******************************************/
	//var lote_cont=0;
	
    $('.botao-addLote').bind('click', function(){
		
	estoqueQtd=0;
	LotQtd=0;
	statusAdd = 0;
	estoqueQtd = $('#LoteEstoque').val();
	LotQtd = $('#LoteQuantidade').val();
	
	var numeroLoteAdd = $("#add-lote_saida option:selected").text();
	   
	$(".tabela-lote .val-numero-lote").each(function(){
	    if(numeroLoteAdd == $(this).html()){
		    statusAdd = 1; //1 para já adicionado
	    }else{
		    statusAdd = 0; //0 para Nao já adicionado
	    }	
	});	
	
	
	if(numeroLoteAdd == ''){
	    $('#LoteVazio').css("display","block");					
	}else{
	    $('#LoteVazio').css("display","none");
	    if(statusAdd == 1){
	       // alert('ja tem na tabela');
		$('#LoteAddicionado').css("display","block");
	    }else{
		
		LotQtdAux= parseInt(LotQtd);
		estoqueQtdAux= parseInt(estoqueQtd);
		
				    
		
		if(estoqueQtdAux < LotQtdAux){
		  //  alert('estoque menor');
		    
		    $('#LoteAddicionado').css("display","none");
		    $('#validaQtdEsto').css("display","block");
				
		}else{
		    $('#validaQtdEsto').css("display","none");
		    //	alert('pronto pra cadastro');
	    
		    var temClasseLote = $('td').hasClass('val-numero-lote');

		    //alert("teste");
		    
		    var quantidadeLoteAdd = $("#LoteQuantidade").val();
		    var validadeLoteAdd  = $("#LoteDataValidade").val();
		    var LoteId = $("#add-lote_saida option:selected").val();
		    var Loteiten_Tipo = $('#LoteitenTipo').val();
		    var produtoid= $('#LoteProdutoId').val();
		
		    if(numeroLoteAdd !=undefined){
			if($('#LoteQuantidade').val()  == ''){
			    $('#validaModLoteQTDE').css("display","block");
			    $( "input[id='LoteQuantidade']" ).addClass('shadow-vermelho').focus();
			    numeroLoteAdd = $("#LoteNumeroLote").val();
			}else{ 			
			    $('.tabela-lote').append('<tr class="apargarLotes  clonadoProduto'+princ_cont+'" id="linha1"><td class="val-numero-lote coluna">'+numeroLoteAdd+'</td><td><input class="tamanho-qtde soma" readonly="readonly" value="'+quantidadeLoteAdd+'"/></td><td>'+validadeLoteAdd+'</td><td><img title="Remover" alt="Remover" src="../app/webroot/img/lixeira.png" data-qtde="'+quantidadeLoteAdd+'" id=clonado'+lote_cont+' class="btnExcluir"/></td></tr> ');

			    $('fieldset').append('<div class="input number clonado'+lote_cont+' clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Loteiten]['+lote_cont+'][lote_id]" step="any"  id="LoteId'+lote_cont+'lote_id" value="'+LoteId+'" type="hidden"/></div> ');
			    $('fieldset').append('<div class="input number clonado'+lote_cont+' clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Loteiten]['+lote_cont+'][qtde]" step="any" id="LoteQuantidade'+lote_cont+'qtde" value="'+quantidadeLoteAdd+'" type="hidden"/></div>');
			    $('fieldset').append('<div class="input number clonado'+lote_cont+' clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Loteiten]['+lote_cont+'][produto_id] step="any"  id="LoteitenProduto_id'+lote_cont+'produto_id" value="'+produtoid+'" type="hidden"></div> ');
			    $('fieldset').append('<div class="input number clonado'+lote_cont+' clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Loteiten]['+lote_cont+'][tipo] step="any"  id="LoteitenTipo'+lote_cont+'tipo" value="SAIDA" type="hidden"></div> ');
			    
			    
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
		}
	
		lote_cont=lote_cont+1;
		calcular();
	    }
	}    	
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

		minuendo=$('#qtdTotalProduto').val().split('.').join('').replace(',','.');
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
		var quantidadeProduto = $('#qtdTotalProduto').val().split('.').join('').replace(',','.');
		var valorUnitario =  $('#ProdutoitenValorUnitario').val().split('.').join('').replace(',','.');

	//	valorUnitario = valorUnitario.split('.').join('').replace(',','.');
		valorUnitario = parseFloat(valorUnitario);
		
		if(isNaN(valorUnitario)){
		    valorUnitario = 0;
		}
		
		valorTotalProduto = quantidadeProduto*valorUnitario;
		valorTotalProdutoAux=parseFloat(valorTotalProduto);
		
		$('#ProdutoitenValorTotal').val(valorTotalProdutoAux.toFixed(5)).priceFormat({
		    prefix: '',
		    centsSeparator: ',',
			centsLimit: 5,
			thousandsSeparator: '',
		});
	    
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
	    valor_totalAux=$('#ProdutoitenValorTotal').val().split('.').join('').replace(',','.');
	    cfop=$('#ProdutoitenCfop').val();
	    valor_icms=$('#ProdutoitenValorIcms').val();
	    valor_ipi=$('#ProdutoitenValorIpi').val();
	    Nota_Tipo = $('#NotaTipo').val();
	    Produtoiten_Tipo = $('#ProdutoitenTipo').val();
	    produtoId = $('#LoteProdutoId').val();
	    
	    valor_total=parseFloat(valor_totalAux);
	    
	    acumuladorTotalAux = acumuladorTotal + valor_total;
	    acumuladorTotal=parseFloat(acumuladorTotalAux);
	    
	    vlTotalProdAux= $("#SaidaValorTotalProdutos").val().split('.').join('').replace(',','.');
	    vlTotal= parseFloat(vlTotalProdAux);
	    
	    if(isNaN(vlTotal)){
		    vlTotal=0;
	    }
	    
	    
	    resultTotal= vlTotal  + acumuladorTotal;
	    
	    
	    $("#SaidaValorTotalProdutos").val(resultTotal.toFixed(5)).priceFormat({
			prefix: '',
			centsSeparator: ',',
			centsLimit: 5,
			thousandsSeparator: '',
	    });;
	    
	    
	    totNota= $("#SaidaValorTotal").val().split('.').join('').replace(',','.');
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
		auxtipodoc=$('#vale option:selected').text();
		
		if(auxtipodoc=="Nota"){
			
			$('#tabela-principal').append('<tr class="valbtconfimar" ><td>'+codigo+'</td><td class="whiteSpace"><span>'+nome+'</span></td><td>'+unidade+'</td><td class="descricao"><span title="'+descricao+'">'+descricao+'&nbsp;</span></td><td>'+qtde+'</td><td>'+valor_unitario+'</td><td class=total_clonado'+princ_cont+'>'+valor_totalAux+'</td><td class="table-none">'+cfop+'</td><td class="table-none icms_clonado'+princ_cont+' ">'+valor_icms+'</td><td class="table-none ipi_clonado'+princ_cont+'">'+valor_ipi+'</td> <td><img rel="tooltip" title="'+lotes+'" src="../app/webroot/img/icon-dash2.png"/></td> <td><img title="Remover" alt="Remover" src="../app/webroot/img/lixeira.png" id=clonado'+princ_cont+' class="btnRemove"/></td></tr>');
		}else{
			$('#tabela-principal').append('<tr class="valbtconfimar" ><td>'+codigo+'</td><td class="whiteSpace"><span>'+nome+'</span></td><td>'+unidade+'</td><td class="descricao"><span title="'+descricao+'">'+descricao+'&nbsp;</span></td><td>'+qtde+'</td><td>'+valor_unitario+'</td><td class=total_clonado'+princ_cont+'>'+valor_totalAux+'</td> <td><img rel="tooltip" title="'+lotes+'" src="../app/webroot/img/icon-dash2.png"/></td> <td><img title="Remover" alt="Remover" src="../app/webroot/img/lixeira.png" id=clonado'+princ_cont+' class="btnRemove"/></td></tr>');
		}
		
		
		
		

		//$("#vale").trigger("change");
		$('.apargarLotes').remove();
	//	$('.apargarLotes').hide();
		$('#btn-addLote').hide();
		$('.ui-widget').removeAttr('readonly','readonly');
		$('.ui-widget').removeClass('autocompleteDesabilitado');
		$('.campo-superior-produto a').css('display','inherit');

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

	/*	$('#tabela-hiddenLote').append('<tr style="display:none"><td class="val-numero-lote">'+numeroLoteAdd+'</td></tr>'); */
		
		//Campos hidden tabela principal
		if(auxtipodoc=="Nota"){
			$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][produto_id] step="any"  id="ProdutoitenProduto_id'+princ_cont+'produto_id" value="'+produtoId+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][qtde] step="any"  id="ProdutoitenQtde'+princ_cont+'qtde" value="'+qtde+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][valor_total] step="any"  id="ProdutoitenValorTotal'+princ_cont+'valor_total" value="'+valor_totalAux.split('.').join('').replace(',','.')+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][cfop] step="any"  id="ProdutoitenCfop'+princ_cont+'cfop" value="'+cfop+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][percentual_icms] step="any"  id="ProdutoitenPercentual_icms'+princ_cont+'percentual_icms" value="'+valor_icms.split('.').join('').replace(',','.')+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][percentual_ipi] step="any"  id="ProdutoitenPercentual_ipi'+princ_cont+'percentual_ipi" value="'+valor_ipi.split('.').join('').replace(',','.')+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][valor_unitario] step="any"  id="Produtoitenvalor_unitario'+princ_cont+'valor_unitario" value="'+valor_unitario.split('.').join('').replace(',','.')+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][tipo] step="any"  id="ProdutoitenTipo'+princ_cont+'tipo" value="SAIDA" type="hidden"></div> ');
		}else{
			$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][produto_id] step="any"  id="ProdutoitenProduto_id'+princ_cont+'produto_id" value="'+produtoId+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][qtde] step="any"  id="ProdutoitenQtde'+princ_cont+'qtde" value="'+qtde+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][valor_total] step="any"  id="ProdutoitenValorTotal'+princ_cont+'valor_total" value="'+valor_totalAux.split('.').join('').replace(',','.')+'" type="hidden"></div> ');
			
			$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][valor_unitario] step="any"  id="Produtoitenvalor_unitario'+princ_cont+'valor_unitario" value="'+valor_unitario.split('.').join('').replace(',','.')+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonadoProduto'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][tipo] step="any"  id="ProdutoitenTipo'+princ_cont+'tipo" value="SAIDA" type="hidden"></div> ');		
		
		}
		princ_cont++;

	}
    });
	
/***************************** Função Validar Campos Botão Adicionar *****************************/	
	function ValidaCamposBtAdicionar(){
	    var temClasLote = $('td').hasClass('val-numero-lote');
	    	    
	    $('#spanValProduto').css('display','none');
	    
	    if($('#ProdutoNome').val() ==''){
			$(".campo-superior-produto input").addClass('shadow-vermelho').focus();
			$('#spanValProduto').css('display','block');
			return false;
	    }else if($('#ProdutoitenValorUnitario').val() ==''){
		$("input[id='ProdutoitenValorUnitario']").addClass('shadow-vermelho').focus();
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
 
		outrosAux= $("#SaidaValorOutros").val().split('.').join('').replace(',','.');
		outros=parseFloat(outrosAux);
		 if(isNaN(outros)){
			outros=0;
		}
		
		suguroAux = $("#SaidaValorSeguro").val().split('.').join('').replace(',','.');
		seguro=parseFloat(suguroAux);
		if(isNaN(seguro)){
			seguro=0;
		}
		
		freteAux = $("#SaidaValorFrete").val().split('.').join('').replace(',','.');
		frete=parseFloat(freteAux);
		if(isNaN(frete)){
			frete=0;
		}
		
		produtosAux = $("#SaidaValorTotalProdutos").val().split('.').join('').replace(',','.');
		produtos=parseFloat(produtosAux);
		if(isNaN(produtos)){
			produtos=0;
		}
		
		ipiAux = $("#SaidaValorIpi").val().split('.').join('').replace(',','.');
		ipi=parseFloat(ipiAux);
		if(isNaN(ipi)){
			ipi=0;
		}
		
		icmsAux = $("#SaidaValorIcms").val().split('.').join('').replace(',','.');
		icms=parseFloat(icmsAux);
		if(isNaN(icms)){
			icms=0;
		}
		
		
		
		novoTotalNota=	outros+  seguro + frete + produtos;
		
		$('#SaidaValorTotal').val(novoTotalNota.toFixed(5)).priceFormat({
		    prefix: '',
		    centsSeparator: ',',
			centsLimit: 5,
			thousandsSeparator: '',
		});
		
    }

    function somarIcmsIpi(){

	icmsTxt=$("#ProdutoitenValorIcms").val().split('.').join('').replace(',','.');
	icms=parseFloat(icmsTxt);
	if(isNaN(icms)){
		icms=0;
	}
	$("#ProdutoitenValorIcms").val(icms);
	
	ipiTxt=$("#ProdutoitenValorIpi").val().split('.').join('').replace(',','.');
	ipi=parseFloat(ipiTxt);
	if(isNaN(ipi)){
		ipi=0;
	}
	
	
	
	vlIcmsAntigoAux= $("#SaidaValorIcms").val().split('.').join('').replace(',','.');
	vlIcmsAntigo=parseFloat(vlIcmsAntigoAux);
	if(isNaN(vlIcmsAntigo)){
		vlIcmsAntigo=0;
	}
	//alert(vlIcmsAntigo);
	//alert(icms);
	vlIcmsNovo=vlIcmsAntigo + icms;
	$("#SaidaValorIcms").val(vlIcmsNovo.toFixed(5)).priceFormat({
	    prefix: '',
	    centsSeparator: ',',
		centsLimit: 5,
		thousandsSeparator: '',
	});
	
	

	vlIpiAntigoAux= $("#SaidaValorIpi").val().split('.').join('').replace(',','.');
	vlIpiAntigo=parseFloat(vlIpiAntigoAux);
	if(isNaN(vlIpiAntigo)){
		vlIpiAntigo=0;
	}
	
	vlIpiNovo=vlIpiAntigo + ipi;
	$("#SaidaValorIpi").val(vlIpiNovo.toFixed(5)).priceFormat({
	    prefix: '',
	    centsSeparator: ',',
		centsLimit: 5,
		thousandsSeparator: '',
	});
	

    }

$('#SaidaValorOutros, #SaidaValorSeguro, #SaidaValorFrete').focusout(function(){

	intoutros=0;
	intseguro=0;
	intfrete=0;
	inttotalNotaAux=0;
	outrosValores=0;
  outros = $('#SaidaValorOutros').val().split('.').join('').replace(',','.');
  seguro = $('#SaidaValorSeguro').val().split('.').join('').replace(',','.');
  frete = $('#SaidaValorFrete').val().split('.').join('').replace(',','.');
  totalNotaAux = $("#SaidaValorTotal").val().split('.').join('').replace(',','.');
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
     $('.autocompleteCliente,ui-autocomplete-input').keydown(function(){
	$('span[class^="Msg"]').css('display','none');
	$('span[class^="DinamicaMsg"]').remove();
	$('input,select').removeClass('shadow-vermelho');
	$('.ui-widget').removeClass('shadow-vermelho');
    });

    $('.autocompleteCliente').click(function(){
	$('.autocompleteCliente .ui-widget').attr('required',true);
	
    }).focusout(function(){
	if($('input[class*="ui-widget"]').val()==''){
	    $('.ui-widget').removeAttr('required');
	    
	}
    });
		
/******************** marcação dos campos modal cliente ******************************/	    

		$('#ClienteNome').focusin(function(){
		    $('#ClienteNome').attr('required','required');
		}).focusout(function(){
		    $('#ClienteNome').removeAttr('required','required');
		});   
		
		$('#ClienteCpfCnpj').focusin(function(){
		    $('#ClienteCpfCnpj').attr('required','required');
		}).focusout(function(){
		    $('#ClienteCpfCnpj').removeAttr('required','required');
		});   
		
		$('#Endereco0Logradouro').focusin(function(){
		    $('#Endereco0Logradouro').attr('required','required');
		}).focusout(function(){
		    $('#Endereco0Logradouro').removeAttr('required','required');
		});   
		
		$('#Endereco0Bairro').focusin(function(){
		    $('#Endereco0Bairro').attr('required','required');
		}).focusout(function(){
		    $('#Endereco0Bairro').removeAttr('required','required');
		});   
		
		$('#Endereco0Uf').focusin(function(){
		    $('#Endereco0Uf').attr('required','required');
		}).focusout(function(){
		    $('#Endereco0Uf').removeAttr('required','required');
		});   
		
		$('#Endereco0Cidade').focusin(function(){
		    $('#Endereco0Cidade').attr('required','required');
		}).focusout(function(){
		    $('#Endereco0Cidade').removeAttr('required','required');
		});   
		
		$('#Contato0Telefone1').focusin(function(){
		    $('#Contato0Telefone1').attr('required','required');
		}).focusout(function(){
		    $('#Contato0Telefone1').removeAttr('required','required');
		});   


/******************** Excluir tabela principal *******************/
	$("body").on("click",'.btnRemove', function(e){

		
		var novoVal=0;
		acumuladorTotal=0;
		e.preventDefault();

		id= $(this).attr('id');
		numero= id.substr(7);
		txtVal=$('.total_clonado'+numero).text().split('.').join('').replace(',','.');
		icmsClonado=$('.icms_clonado'+numero).text().split('.').join('').replace(',','.');
		ipiClonado=$('.ipi_clonado'+numero).text().split('.').join('').replace(',','.');

		//$('div[class*="clonado"]').remove();
		$('.clonadoProduto'+numero).remove();
		
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
		
		acumuladorTotalAux = $("#SaidaValorTotalProdutos").val().split('.').join('').replace(',','.');
		acumuladorTotal=parseFloat(acumuladorTotalAux);
		
		 if(isNaN(acumuladorTotal)){
			acumuladorTotal=0;
		}
		
		novoVal= acumuladorTotal - intVAl;
		$("#SaidaValorTotalProdutos").val(novoVal.toFixed(5)).priceFormat({
		    prefix: '',
		    centsSeparator: ',',
			centsLimit: 5,
			thousandsSeparator: '',
		});
		
		
		
		
		
		acumuladorIpiAux = $("#SaidaValorIpi").val().split('.').join('').replace(',','.');
		acumuladorIpiTotal=parseFloat(acumuladorIpiAux);
		
		 if(isNaN(acumuladorIpiTotal)){
			acumuladorIpiTotal=0;
		}
		
		novoValIpi= acumuladorIpiTotal - ipi;
		$("#SaidaValorIpi").val(novoValIpi.toFixed(2));
		
		acumuladorIcmsAux = $("#SaidaValorIcms").val().split('.').join('').replace(',','.');
		acumuladorIcmsTotal=parseFloat(acumuladorIcmsAux);
		
		 if(isNaN(acumuladorIcmsTotal)){
			acumuladorIcmsTotal=0;
		}
		
		novoValIcms= acumuladorIcmsTotal - icms;
		$("#SaidaValorIcms").val(novoValIcms.toFixed(5)).priceFormat({
		    prefix: '',
		    centsSeparator: ',',
			centsLimit: 5,
			thousandsSeparator: '',
		});;		
		
		

		calcValorNota();
		
		
	});
	
/********* Função Limpar Campos de Produto ***********************/
    $('#bt-limparSaida').click(function(){
	$('.apargarLotes').remove();
	$('.ui-widget').removeAttr('readonly','readonly');
	$('.ui-widget').removeClass('autocompleteDesabilitado');
	$('.campo-superior-produto a').css('display','inherit');
	
	$('input[id^="Produto"]').val('');
	$('#qtdTotalProduto').val('');
	$('#spanNomeProduto').remove();
	$('#spanDescProduto').remove();
	$('.selectProduto').val('');
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
		    $("input[id='SaidaNotaFiscal']").addClass('shadow-vermelho').focus();
		    $('<span id="spanSaidaNotaFiscal" class="MsgNotaFiscal">Preencha o campo Numero NF</span>').insertAfter('input[id="SaidaNotaFiscal"]');
		    
		    //saida
		    $('span[id="spanSaidaNotaFiscal"]').remove();
		    $("input[id='SaidaNotaFiscal']").addClass('shadow-vermelho').focus();
		    $('<span id="spanSaidaNotaFiscal" class="MsgNotaFiscal">Preencha o campo Numero NF</span>').insertAfter('input[id="SaidaNotaFiscal"]');
		    
		    $('html, body').animate({scrollTop:0}, 'slow');
		    return false;
		}else if( $('#SaidaData').val() =='' ||$('#SaidaData').val() ==''  ){
		    $('span[id="spanSaidaData"]').remove();
		    $('span[id="spanSaidaData"]').remove();
		    $('span[id="spanDataFuturo"]').remove();
		    
		    //saida
		    $('<span id="spanSaidaData" class="MsgData tooltipMensagemErroDireta">Preencha o campo Data Emissão</span>').insertAfter('input[id="SaidaData"]');
		    $("input[id='SaidaData']").addClass('shadow-vermelho').focus();
		    
		    //saida
		    $('<span id="spanSaidaData" class="MsgData">Preencha o campo Data Emissão</span>').insertAfter('input[id="SaidaData"]');
		    $("input[id='SaidaData']").addClass('shadow-vermelho').focus();
		    
		    $('html, body').animate({scrollTop:0}, 'slow');
		    return false;
		}else if( $('#SaidaCpfCnpj').val() =='' || $('#SaidaCpfCnpj').val() ==''){
		    $(".autocompleteCliente input").addClass('shadow-vermelho').focus();
		    
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
		$('.campo-obrigatorio').hide();
		$( "#SaidaNotaFiscal, #SaidaData" ).removeAttr( "title" );
		$('.desabilita').attr('readonly', 'readonly');
		$('.ui-widget').attr('readonly','readonly');
		$("[class*='ui-button']").css('display','none');
		$('#campo-SaidaCnpj').css('float','left').css('margin-left','25px');
		$('#campoSaidaNome').css('margin-left','0');
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
		$('input').addClass("border-none");
		$('#SaidaData').attr('disabled','disabled');
		$('input').attr('onfocus','this.blur()');
		
		var obsConteudo = $("#SaidaObs").val();
		$("#hideObsSaida").val(obsConteudo);
		$("#SaidaObs").css("display","none");
		$("#SaidaObs").attr("disabled","disabled");
		$(".texto-obs").append("<span class=\"spanTextoObs\">"+obsConteudo+"</span>");
		 
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
				$('#campo-SaidaCnpj').css('float','right').css('margin-left','0');
				$('#campoSaidaNome').css('margin-left','25px');
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
				$('input').removeClass("border-none");
				
				
				$("#SaidaObs").css("display","block");
				$("#SaidaObs").removeAttr("disabled","disabled");
				$('#SaidaData').removeAttr('disabled','disabled');
				$("span[class='spanTextoObs']").remove();
				$('input').removeAttr('onfocus','this.blur()');
				
				$('.campo-obrigatorio').show();
				$( "#SaidaNotaFiscal, #SaidaData" ).attr( "title","Campo Obrigatório" );
			

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
	nomeCod = $(".selectProduto option:selected").attr('value');
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
	    $(".campo-superior-produto input").val('');
	    $(".campo-superior-produto input").removeAttr('required','required');
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
					$( "input[id='filterDataLote-between']" ).addClass('shadow-vermelho').focus();
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
				    $( "input[id='filterDataLote-between']" ).addClass('shadow-vermelho').focus();
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
					$( "input[id='filterDataNota-between']" ).addClass('shadow-vermelho').focus();
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
					$("input[id='filterDataNota-between']").addClass('shadow-vermelho').focus();
				}else{
				    $('span[id="spanDataInicialNota"]').remove();
				}

		});

/**********************************************************/


	$("input[id='LoteDataFabricacao']").focusout(function(){
		var texto = $(this).val();
			if(texto.length == 0){
					$( "input[id='LoteDataFabricacao']" ).addClass('shadow-vermelho').focus();
				}
			else{
					$( "input[id='LoteDataFabricacao']" ).removeClass('shadow-vermelho');
				}
		});

	$("input[id='LoteDataFabricacao']").change(function(){
		var texto = $(this).val();
			if(texto.length == 0){
					$( "input[id='LoteDataFabricacao']" ).addClass('shadow-vermelho').focus();
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
						$("input[id='LoteDataFabricacao']").addClass('shadow-vermelho').focus();
						$("input[id='LoteDataValidade']").addClass('shadow-vermelho').focus();


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
		
	/*	$(".dinheiro").attr("maxlength","20");
		jQuery(function($){
		    $(".dinheiro").mask("#0.00", {reverse: true, maxlength: false});
		});
	*/	
		$('.dinheiro').priceFormat({
		    prefix: '',
		    centsSeparator: ',',
			thousandsSeparator: '',
			centsLimit: 5
		});
		
		$('#SaidaData, #LoteDataFabricacao, #LoteDataValidade').mask('99/99/9999');
	 
	});
	

/*********** Tira virgula e coloca ponto antes do submit ***********/	
	$('#bt-salvar-saida-manual').click(function(){
	    EntValorTotProd = $('#SaidaValorTotalProdutos').val();
	    EntValorIpi = $('#SaidaValorIpi').val();
	    EntValorOut = $('#SaidaValorOutros').val();;
	    EntValorTot = $('#SaidaValorTotal').val();
	    EntValorIcms = $('#SaidaValorIcms').val();
	    EntValorFrete = $('#SaidaValorFrete').val();
	    
	    $('input[id="SaidaValorTotalProdutos"]').val(EntValorTotProd.replace(',','.'));
	    $('input[id="SaidaValorIpi"]').val(EntValorIpi.replace(',','.'));
	    
	    $('input[id="SaidaValorOutros"]').val(EntValorOut.replace(',','.'));
	    $('input[id="SaidaValorTotal"]').val(EntValorTot.replace(',','.'));
	    
	    $('input[id="SaidaValorIcms"]').val(EntValorIcms.replace(',','.'));
	    $('input[id="SaidaValorFrete"]').val(EntValorFrete.replace(',','.'));
	    
	    $('#SaidaData').removeAttr('disabled','disabled');
	    
	    $('#SaidaAddForm').submit();
	    
	});
/*************************** Função de add Lote *******************************/

	$('.bt-add').bind('click',function(){
	    $('input[id*="LoteData"]').val('');
	    $('#LoteParceirodenegocioId').val('');
	    $('#LoteQuantidade').val('');
		
		$('#spanAdicionarLote').css('display','none');
		
		$('.loaderAjaxCarregarLoteDIV').show();

		if($('#ProdutoNome').val() ==''){
			$('#spanValProduto').css('display','block');
		}else{
		
			produto_id = $('#LoteProdutoId').val();
			
			$("#LoteEstoque").val("");	
			$("#carregaSelect").load(urlInicio+'lotes/carregalote?numero='+produto_id+'', function(){
				$('.loaderAjaxCarregarLoteDIV').hide();
				$('#myModal_add-lote_saida').modal('show');
			});
			
			//$('#spanProdutoLote').css('display','block');
		}

	}); 
	

});
