$(document).ready(function(){

	var total = 0;
	var i = 0;
	
/*** CONSULTA *********************************************************/
	function get(){
		var get = new Object();
		var parameters = window.location.toString().split("?").pop().split("&");

		for (var i in parameters){
			var parts = parameters[i].split("=");

			get[""+parts[0]+""] = parts[1];
		}

		return get;
	}

	function TrocaConsulta(){
		var opConsulta = "";

		if($("#checklote").prop("checked")){
			opConsulta = opConsulta.concat($("#checklote").val());
		}

		if($("#checkes").prop("checked")){
			opConsulta = opConsulta.concat($("#checkes").val());
		}

        switch(opConsulta){
            case ('lote'):
				window.open(urlPadrao+"&parametro=lotes"+limit,"_self");
                break;
            case ('es'):
				window.open(urlPadrao+"&parametro=itensdoproduto"+limit,"_self");
                break;
            case ('lotees'):
				window.open(urlPadrao+"&parametro=itensdolote"+limit,"_self");
                break;
            case (''):
                window.open(urlPadrao+"&parametro=produtos"+limit,"_self");
                break;
        }
	};

	var get = get();
	var parametro = get.parametro;

	var urlPadrao = urlInicio+"notas/index/?";
	var limit = get.limit;

	if(String(limit) != String('') && String(limit) != String('undefined')) { limit = '&limit=' + limit; } else { limit=''; }

	if(parametro == 'produtos'){
		$("#filtro-lote").css({"background-color":"#ebebeb","border-color":"#ccc"});
		$("#filtro-es").css({"background-color":"#ebebeb","border-color":"#ccc"});

		$("#filtro-lote input[type=text]").prop('disabled', true);
		$("#filterStatusLote").prop('disabled', true);

		$("#filtro-es input[type=text]").prop('disabled', true);
		$(".operacao input[type=checkbox]").prop('disabled', true);

		$("#checklote").prop('checked', false);
		$("#checkes").prop('checked', false);

		$('#filtro-lote #bt-configuracao').click(false);
		$('#filtro-es #bt-configuracao').click(false);

		$("#filtro-lote").mouseenter(function() {
			$('#msgFiltroLote').css('display','inherit');
		}).mouseleave(function() {
			$('#msgFiltroLote').css('display','none');
		});

		$("#filtro-es").mouseenter(function() {
			$('#msgFiltroES').css('display','inherit');
		}).mouseleave(function() {
			$('#msgFiltroES').css('display','none');
		});
	}else if(parametro == 'itensdoproduto'){
		$("#checkes").attr('checked', true);
		$("#filtro-lote").css({"background-color":"#ebebeb","border-color":"#ccc"});
		$("#filterProdutoCategoria").css('display','none');
		$("label[for='filterProdutoCategoria']").css('display','none');
		$("#ConfigprodutoCategoria").css('display','none');
		$("label[for='ConfigprodutoCategoria']").css('display','none');

		$("#filtro-lote input[type=text]").prop('disabled', true);
		$("#filterStatusLote").prop('disabled', true);

		$("#checklote").prop('checked', false);

		$('#filtro-lote #bt-configuracao').click(false);

		$("#filtro-lote").mouseenter(function() {
			$('#msgFiltroLote').css('display','inherit');
		}).mouseleave(function() {
			$('#msgFiltroLote').css('display','none');
		});
	}else if(parametro == 'lotes'){
		$("#checklote").attr('checked', true);
		$("#filtro-es").css({"background-color":"#ebebeb","border-color":"#ccc"});
		$("#filterProdutoCategoria").css('display','none');
		$("label[for='filterProdutoCategoria']").css('display','none');
		$("#ConfigprodutoCategoria").css('display','none');
		$("label[for='ConfigprodutoCategoria']").css('display','none');

		$("#filtro-es input[type='text']").prop('disabled', true);
		$(".operacao input[type='checkbox']").prop('disabled', true);

		$("#checkes").prop('checked', false);

		$('#filtro-es #bt-configuracao').click(false);

		$("#filtro-es").mouseenter(function() {
			$('#msgFiltroES').css('display','inherit');
		}).mouseleave(function() {
			$('#msgFiltroES').css('display','none');
		});
	}else if(parametro == 'itensdolote'){
		$("#checklote").attr('checked', true);
		$("#checkes").attr('checked', true);
		$("#filterProdutoCategoria").css('display','none');
		$("label[for='filterProdutoCategoria']").css('display','none');
		$("#filtro-lote").css({"background-color":"#FFFAE7","border-color":"#FFD42A"});
		$("#ConfigprodutoCategoria").css('display','none');
		$("label[for='ConfigprodutoCategoria']").css('display','none');
		$("#filtro-es").css({"background-color":"#C9F0E8","border-color":"#37C8AB"});
	}

	$('#checklote').on('click', function(){
		TrocaConsulta();
	});

	$('#checkes').on('click', function(){
		TrocaConsulta();
	});

/*** CARREGAR FILTRO NO SELECT QUICK LINK *****************************/
	$("#quick-select").change(function(){
		var urlQuickLink = $(this).children('option:selected').attr('data-url')+'&ql='+$(this).children('option:selected').val();

		$("#quick-editar").css("display", "none");
		
		if(urlQuickLink!=''){
		    window.location.href = urlQuickLink;
		    $("#quick-select option").text($(this).children('option:selected').text());
		}
	});

/*** SALVAR QUICKLINK *************************************************/
    $("#bt-salvar-quicklink").click(function(event){
		event.preventDefault();
		
		nomequick = $('.nome-quicklink').val();
		
		if(nomequick != ''){
			$("#formCadQuicklink").submit();
			$("#quick-select").val(nomequick);
			$('#quick-select').find('option[text="'+nomequick+'"]').val();
		}else{
			$('#QuicklinkNome').focus();
			$('#spanQuicklink').show();
		}
    });
    
/************************************ Limpa QuickLink *********************************/		
	$('input, select').on('focusin',function(){
	    $('#quick-select').val('');
	    $("#quick-editar").css("display", "none"); 
	});

/*********** FUNÇÃO PARA CHECK BOX DO FILTRO *************/
	var valorAux=$('#filterNotaTipoEntrada').val();
	
	if(valorAux != undefined){
		var valorEntrada=valorAux.substr(0,7);
		var valorSaida1=valorAux.substr(0,5);
		var valorSaida2 =valorAux.substr(8,5);
	}

	var statusEntrada = '';
	var statusSaida = '';
	var statusEntradaSaida = '';

	if(valorEntrada == 'ENTRADA'){
		$('#NotaTipoEntradaENTRADA').attr('checked', true);
	}
	
	if(valorSaida1 == 'SAIDA'){
		$('#NotaTipoEntradaSAIDA').attr('checked', true);
	}
	
	if(valorSaida2 == 'SAIDA'){
		$('#NotaTipoEntradaSAIDA').attr('checked', true);
	}

	$("#NotaTipoEntradaENTRADA, #NotaTipoEntradaSAIDA").bind('click', function(){
		if($('#NotaTipoEntradaENTRADA').is(':checked')){
			if($('#NotaTipoEntradaSAIDA').is(':checked')){
				$('#filterNotaTipoEntrada').val('ENTRADA SAIDA');
			}else{
				$('#filterNotaTipoEntrada').val('ENTRADA');
			}
		}else{
			if($('#NotaTipoEntradaSAIDA').is(':checked')){
				$('#filterNotaTipoEntrada').val('SAIDA');
			}else{
				$('#filterNotaTipoEntrada').val(' ');
			}
		}
	});

/*** FUNCOES DE MANIPULACA0 DA DATA DO FILTRO CONSULTA ****************/
	var form = $("form[id='form-filter-results']");
	form.addClass('dados-produto');

/*** MENSAGEM DE ERRO QUICKLINK ***************************************/
	var temClasse = $('h1').hasClass('menuOption21');

	if(temClasse){
		$('.error-message').removeClass('error-message').addClass('error-message-quicklink');
	}

	$('#quick-salvar').bind('click',function(){
		$('.error-message').remove();
	});

/*** VALIDAR CONFIGURAÇÃO DO FILTRO ***********************************/
	/*** MODAL CONFIG PRODUTO ***/
	$("#ConfigprodutoNome").prop('checked', true);
	$('#ConfigprodutoNome').click(false);
	$("input[id='ConfigprodutoNome']").mouseenter(function(){
		$('#msgModalProd').css('display','inherit');
	}).mouseleave(function() {
		$('#msgModalProd').css('display','none');
	});

	$("label[for='ConfigprodutoNome']").mouseenter(function() {
		$('#msgModalProd').css('display','inherit');
	}).mouseleave(function(){
		$('#msgModalProd').css('display','none');
	});

	$("#ConfigprodutoCodigo").prop('checked', true);
	$('#ConfigprodutoCodigo').click(false);
	$("input[id='ConfigprodutoCodigo']").mouseenter(function() {
		$('#msgModalProd').css('display','inherit');
	}).mouseleave(function() {
		$('#msgModalProd').css('display','none');
	});

	$("label[for='ConfigprodutoCodigo']").mouseenter(function() {
		$('#msgModalProd').css('display','inherit');
	}).mouseleave(function() {
		$('#msgModalProd').css('display','none');
	});

	/*** MODAL CONFIG LOTE ***/
	$("#ConfigloteNumeroLote").prop('checked', true);
	$('#ConfigloteNumeroLote').click(false);
	$("input[id='ConfigloteNumeroLote']").mouseenter(function() {
		$('#msgModalLot').css('display','inherit').css('top','200px');
	}).mouseleave(function() {
		$('#msgModalLot').css('display','none').css('top','200px');
	});

	$("label[for='ConfigloteNumeroLote']").mouseenter(function() {
		$('#msgModalLot').css('display','inherit').css('top','200px');
	}).mouseleave(function() {
		$('#msgModalLot').css('display','none').css('top','200px');
	});

	$("#ConfigloteDataValidade").prop('checked', true);
	$('#ConfigloteDataValidade').click(false);
	$("input[id='ConfigloteDataValidade']").mouseenter(function() {
		$('#msgModalLot').css('display','inherit').css('top','200px');
	}).mouseleave(function() {
		$('#msgModalLot').css('display','none').css('top','200px');
	});

	$("label[for='ConfigloteDataValidade']").mouseenter(function() {
		$('#msgModalLot').css('display','inherit').css('top','200px');
	}).mouseleave(function() {
		$('#msgModalLot').css('display','none').css('top','200px');
	});

	/*** MODAL CONFIG NOTA ***/
	$("#ConfignotaTipo").prop('checked', true);
	$('#ConfignotaTipo').click(false);
	$("input[id='ConfignotaTipo']").mouseenter(function() {
		$('#msgModalNot').css('display','inherit');
	}).mouseleave(function() {
		$('#msgModalNot').css('display','none');
	});

	$("label[for='ConfignotaTipo']").mouseenter(function() {
		$('#msgModalNot').css('display','inherit');
	}).mouseleave(function() {
		$('#msgModalNot').css('display','none');
	});
	
	$("#ConfignotaData").prop('checked', true);
	$('#ConfignotaData').click(false);
	$("input[id='ConfignotaData']").mouseenter(function() {
		$('#msgModalNot').css('display','inherit');
	}).mouseleave(function() {
		$('#msgModalNot').css('display','none');
	});

	$("label[for='ConfignotaData']").mouseenter(function() {
		$('#msgModalNot').css('display','inherit');
	}).mouseleave(function() {
		$('#msgModalNot').css('display','none');
	});

	$("#ConfignotaNotaFiscal").prop('checked', true);
	$('#ConfignotaNotaFiscal').click(false);
	$("input[id='ConfignotaNotaFiscal']").mouseenter(function() {
		$('#msgModalNot').css('display','inherit');
	}).mouseleave(function() {
		$('#msgModalNot').css('display','none');
	});

	$("label[for='ConfignotaNotaFiscal']").mouseenter(function() {
		$('#msgModalNot').css('display','inherit');
	}).mouseleave(function() {
		$('#msgModalNot').css('display','none');
	});

/*** INICIO SETA DE ORDENAÇÃO DA TABELA *******************************/
	$(".colunaProduto a.asc + div").addClass("seta-cima");
	$(".colunaProduto a.desc + div").addClass("seta-baixo");
	
	var idcol = $(".colunaProduto a.asc ,  .colunaProduto a.desc").parent().attr('id');
	alert(idcol);
	$("td."+idcol).addClass("highlight");
	
	$(".setaOrdena a.asc + div").addClass("seta-cima");
	$(".setaOrdena a.desc + div").addClass("seta-baixo");
	
	var idcol = $(".setaOrdena a.asc ,  .setaOrdena a.desc").parent().attr('id');
	$("td."+idcol).addClass("highlight");	

	
/*** DATA VALIDAÇÃO DADOS DA NOTA *************************************/
    $("input[id*='filterDataLote']").addClass('inputData validaLote');

	/*** DATA LOTE ***/
	$(".validaLote").focusout(function(){
	    var texto = $(this).val();
		
		if(texto.length == 0){
			$( "input[id='filterDataLote-between']" ).addClass('shadow-vermelho');
		}else{
			$( "input[id='filterDataLote-between']" ).removeClass('shadow-vermelho');
		}
	});

	$(".validaLote").change(function(){
	    var dataInicialLote = $("input[id='filterDataLote']").datepicker('getDate');
	    var dataFinalLote = $("input[id='filterDataLote-between']").datepicker('getDate');
	    var daysLote = (dataFinalLote - dataInicialLote) / 1000 / 60 / 60 / 24;

	    if(daysLote < 0){
			if(dataFinalLote != null){
				$('span[id="spanDataInicialLote"]').remove();
				$('<span id="spanDataInicialLote" class="DinamicaMsg">A data Final não pode ser menor que a inicial</span>').insertAfter('input[id="filterDataLote-between"]');
				$("input[id='filterDataLote-between']").val(" ");
				$( "input[id='filterDataLote-between']" ).addClass('shadow-vermelho');
			}
		}else{
			$('span[id="spanDataInicialLote"]').remove();
	    }
	});

	/*** DATA NOTA ***/
	$("input[id='filterDataNota-between']").addClass('validaNota');
	$("input[id='filterDataNota']").addClass('validaNota');

	$(".validaNota").focusout(function(){
		var texto = $(this).val();
		
		if(texto.length == 0){
			$( "input[id='filterDataNota-between']" ).addClass('shadow-vermelho');
		}else{
			$( "input[id='filterDataNota-between']" ).removeClass('shadow-vermelho');
		}
	});

	$("#filterDataNota-between").focusout(function(){
		var dataInicialNota = $("input[id='filterDataNota']").datepicker('getDate');
		var dataFinalNota = $("input[id='filterDataNota-between']").datepicker('getDate');
		var daysNota = (dataFinalNota - dataInicialNota) / 1000 / 60 / 60 / 24;

		if(validacaoEntreDatas($("input[id='filterDataNota']").val(),$("input[id='filterDataNota-between']").val(),spanDataInicialNota)){
			$("input[id='filterDataNota-between']").val("");
			$("input[id='filterDataNota-between']").addClass('shadow-vermelho');
		}
		
		/*
		if(daysNota < 0){
			$('span[id="spanDataInicialNota"]').remove();
			
			if(dataFinalNota != null){
			    $('<span id="spanDataInicialNota" class="DinamicaMsg">A data Final não pode ser menor que a inicial</span>').insertAfter('input[id="filterDataNota-between"]');
			    $("input[id='filterDataNota-between']").val("");
			    $("input[id='filterDataNota-between']").addClass('shadow-vermelho');
			}    
		}else{
		    $('span[id="spanDataInicialNota"]').remove();
		}*/
	});
	
/** VALIDAÇÃO PARA DATA ***********************************************/
	$("#filterDataLote-between").addClass('inputData');
	$("#filterDataNota-between").addClass('inputData');
	
	$('.inputData').mask('00/00/0000');
	
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

/** Placeholder ***********************************************/

	$('#filterDataLote-between').attr('placeholder','dd/mm/aaaa');
	$('#filterDataNota-between').attr('placeholder','dd/mm/aaaa');

});
