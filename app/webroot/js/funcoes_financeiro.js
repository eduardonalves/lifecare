$(document).ready(function() {

/***Input text com datePicker Para datas no estilo " De X a Z**/	
	$(".inputSearchData input[id*='between']").before("<span>a</span>");
	
	$(".inputSearchData input[type='text']").datepicker({
		dateFormat: 'dd/mm/yy',
		dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
		dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		nextText: 'Próximo',
		prevText: 'Anterior'
	});

/*** Validação de Datas ****************************************/
	
$("#filterDataEmissao-between").change(function(){
		
		var data_inicial = $("#filterDataEmissao").val();
		var data_final = $("#filterDataEmissao-between").val();
		
		var Compara01 = parseInt(data_inicial.split("/")[2].toString() + data_inicial.split("/")[1].toString() + data_inicial.split("/")[0].toString());
		var Compara02 = parseInt(data_final.split("/")[2].toString() + data_final.split("/")[1].toString() + data_final.split("/")[0].toString());
		
		if(Compara01 > Compara02){ 
			$("#filterDataEmissao, #filterDataEmissao-between").val("");
			$("#filterDataEmissao, #filterDataEmissao-between").addClass("shadow-vermelho");
		}else{
			$("#filterDataEmissao, #filterDataEmissao-between").removeClass("shadow-vermelho");

		}			
	});
	
	
$("#filterDataQuitacao-between").change(function(){
		
		var data_inicial = $("#filterDataQuitacao").val();
		var data_final = $("#filterDataQuitacao-between").val();
		
		var Compara01 = parseInt(data_inicial.split("/")[2].toString() + data_inicial.split("/")[1].toString() + data_inicial.split("/")[0].toString());
		var Compara02 = parseInt(data_final.split("/")[2].toString() + data_final.split("/")[1].toString() + data_final.split("/")[0].toString());
		
		if(Compara01 > Compara02){ 
			$("#filterDataQuitacao, #filterDataQuitacao-between").val("");
			$("#filterDataQuitacao, #filterDataQuitacao-between").addClass("shadow-vermelho");
		}else{
			$("#filterDataQuitacao, #filterDataQuitacao-between").removeClass("shadow-vermelho");

		}			
	});
	
$("#filterDataVencimento-between").change(function(){
		
		var data_inicial = $("#filterDataVencimento").val();
		var data_final = $("#filterDataVencimento-between").val();
		
		var Compara01 = parseInt(data_inicial.split("/")[2].toString() + data_inicial.split("/")[1].toString() + data_inicial.split("/")[0].toString());
		var Compara02 = parseInt(data_final.split("/")[2].toString() + data_final.split("/")[1].toString() + data_final.split("/")[0].toString());
		
		if(Compara01 > Compara02){ 
			$("#filterDataVencimento, #filterDataVencimento-between").val("");
			$("#filterDataVencimento, #filterDataVencimento-between").addClass("shadow-vermelho");
		}else{
			$("#filterDataVencimento, #filterDataVencimento-between").removeClass("shadow-vermelho");


		}			
	});
	
$("#filterValor-between").focusout(function(){
		
		var valor_inicial = $("#filterValor").val();
		var valor_final = $("#filterValor-between").val();

		if(valor_inicial > valor_final){ 
			$("#filterValor, #filterValor-between").val(' ');
			$("#filterValor, #filterValor-between").addClass("shadow-vermelho");
		}else{
			$("#filterValor, #filterValor-between").removeClass("shadow-vermelho");

		}			
	});
	
/***Input Search Para valores *****************************************/
	$(".inputSearchValor input[id*='between']").before("<span>a</span>");


/******** Carregar filtro no select Quick link ***********************/

	$("#quick-select").change(function(){
		var urlQuickLink = $(this).children('option:selected').attr('data-url')+'&ql='+$(this).children('option:selected').val();

		$("#quick-editar").css("display", "none");
		
		if(urlQuickLink !='')
		{
		    window.location.href=urlQuickLink;
		    $("#quick-select option").text($(this).children('option:selected').text());
		}

		

	});

	$("#quick-filtrar").click(function(){
	    var usoInicioPhp = '<?php' ;
	    var usoFinalPhp ='?>';
	    var usoGet = '$_GET["ql"]=0';

	    $('section').attr(usoInicioPhp+' '+usoGet+' '+usoFinalPhp);
	});
	
/************************ Salvar Quicklink******************************************/
    $("#bt-salvar-quicklink").click(function(event){
	event.preventDefault();
	
	nomequick = $('.nome-quicklink').val();
	
	if(nomequick  !=''){
		$("#formCadQuicklink").submit();
		$("#quick-select").val(nomequick);
		$('#quick-select').find('option[text="'+nomequick+'"]').val();
	}else{
		 $('#spanQuicklink').show();
	}
    });
    
/************************************ Limpa QuickLink *********************************/		
	$('input, select').on('focusin',function(){
	    $('#quick-select').val('');
	    $("#quick-editar").css("display", "none");
	   
	});
	
	//alert($("#quick-select option:selected").val());

	$("#quick-filtrar").click(function(){
	 /* 
		var urlQuickLink = $(this).children('option:selected').attr('data-url').val();

		$("#quick-editar").css("display", "none");
		
		if(urlQuickLink!='')
		{
		    window.location.href=urlQuickLink;
		}
	*/
	});
/********** Avançar tela de resultado Contas ****************/


    $('.bt-confirmar').click(function(e){
	e.preventDefault();

	var temclasvalbtconf = $('tr').hasClass('valbtconfimar');
	dataEmissao = $('[id*="DataEmissao"]').val();
	CpfCnpj = $('[id*="CpfCnpj"]').val();
	
	if(dataEmissao == ''){
	   // $('<span id="msgDataEmissao" class="Msg-tooltipDireita">Preencha o campo Data de Emissão</span>').insertAfter('[id*="DataEmissao"]');
	    $('#msgDataEmissao').css('display','block');
	    $('[id*="DataEmissao"]').addClass('shadow-vermelho');
	    $('html, body').animate({scrollTop:0}, 'slow');
	    
	}else if(CpfCnpj ==''){
	   // $('<span id="msgAutoComplete" class="Msg tooltipMensagemErroTopo">Preencha o campo Fornecedor</span>').insertAfter('.ui-widget');
	    $('#msgAutoComplete').css('display','block');
	    $('.ui-widget').addClass('shadow-vermelho');
	    $('html, body').animate({scrollTop:0}, 'slow');
	    
	}else if(!temclasvalbtconf){
	  //  $('<span id="msgCpfCnpj" class="Msg-tooltipDireita">Adicione parcelas a tabela</span>').insertAfter('.bt-direita');
	    $('#msgCpfCnpj').css('display','block');
	    $('html, body').animate({scrollTop:0}, 'slow');
	    
	}else{    	
	    $('.tela-resultado').hide();
	    $('.desabilita').attr({readonly:'readonly',onfocus:'this.blur()'}).addClass('borderZero').unbind();
	    $('select[class*="desabilita"]').attr('disabled','disabled').css('display','none');
	    $('.forma-data').attr('disabled','disabled')
	    $('.bt-preencherConta').hide();
	    $('.ui-widget').attr('readonly','readonly').addClass('borderZero');
	    $("[class*='ui-button']").css('display','none');
	    $('html, body').animate({scrollTop:0}, 'slow');
	    $('.bt-salvarConta').show();
	    $('.bt-voltar').show();
	    $('.bt-confirmar').hide();
	    $('table td:nth-last-child(1), th:nth-last-child(1)').hide();

	    //percorre as select e transforma em input
	    $('select[class*="desabilita"]').each(function(){
		valorSelecionado = $(this).find('option:selected').text();
		id=$(this).attr('id');

		//insere input depois do select
		$('<input id="'+id+'"" class="tamanho-medio borderZero" readonly="readonly" onfocus="this.blur()" value="'+valorSelecionado+'">').insertAfter($(this));
	    });

	    //substitui textarea por span
	    valTextArea= $('textarea[id*="Descricao"]').val();

	    $('.textAreaConta').hide();
	    $('<span id="spanTextArea">'+valTextArea+'</span>').insertAfter('.textAreaConta');

	    $('.forma-data').each(function(){
		valorFormaData=$(this).val();
		id=$(this).attr('id');

		$('<input id="'+id+'" type="hidden" value="'+valorFormaData+'"/>').insertAfter($(this));
	    });
	}    

    });
    
/********** Avançar tela de resultado Contas ****************/

    $('.bt-voltar').click(function(){
	$('.tela-resultado').show();
	$('.desabilita').removeAttr('readonly').removeAttr('onfocus').removeClass('borderZero');
	$('select[class*="desabilita"]').removeAttr('disabled','disabled').css('display','block');
	$('.forma-data').removeAttr('disabled','disabled')
	$('select[class*="desabilita"] + input ').remove();
	$('#spanTextArea').remove();
	$('.textAreaConta').show();
	$('.bt-preencherConta').show();
	$('.ui-widget').removeAttr('readonly','readonly').removeClass('borderZero');
	$("[class*='ui-button']").css('display','inherit');
	$('html, body').animate({scrollTop:0}, 'slow');
	$('.bt-salvarConta').hide();
	$('.bt-voltar').hide();
	$('.bt-confirmar').show();
	$('table td:nth-last-child(1), th:nth-last-child(1)').show();
    });	

});
