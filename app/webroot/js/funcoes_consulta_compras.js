$(document).ready(function(){

/*** AJUSTAR CAMPOS AO CARREGAR PÁGINA ***************************/
	datavencimentoInicio = $('#filterDataInici').attr('value');
	if(datavencimentoInicio != undefined){
		if(datavencimentoInicio !=''){
			iniano = datavencimentoInicio.substr(0, 4);
			inimes = datavencimentoInicio.substr(5,2);
			inidia = datavencimentoInicio.substr(8,2);
			dataInicio = inidia+'/'+inimes+'/'+iniano;

			$('#filterDataInici').val(dataInicio);
		}
	}

	datavencimentoFim = $('#filterDataInici-between').attr('value');
	if(datavencimentoFim != undefined){
		if(datavencimentoFim != ''){
			fimano = datavencimentoFim.substr(0, 4);
			fimmes = datavencimentoFim.substr(5,2);
			fimdia = datavencimentoFim.substr(8,2);
			dataFim = fimdia+'/'+fimmes+'/'+fimano;

			$('#filterDataInici-between').val(dataFim);
		}
	}

	datavencimentoInicio = $('#filterDataFim').attr('value');
	if(datavencimentoInicio != undefined){
		if(datavencimentoInicio !=''){
			iniano = datavencimentoInicio.substr(0, 4);
			inimes = datavencimentoInicio.substr(5,2);
			inidia = datavencimentoInicio.substr(8,2);
			dataInicio = inidia+'/'+inimes+'/'+iniano;
			$('#filterDataFim').val(dataInicio);
		}
	}

	datavencimentoFim = $('#filterDataFim-between').attr('value');
	if(datavencimentoFim != undefined){
		if(datavencimentoFim != ''){
			fimano = datavencimentoFim.substr(0, 4);
			fimmes = datavencimentoFim.substr(5,2);
			fimdia = datavencimentoFim.substr(8,2);
			dataFim = fimdia+'/'+fimmes+'/'+fimano;
			$('#filterDataFim-between').val(dataFim);
		}
	}
	
	datavencimentoInicio = $('#filterDataResposta').attr('value');
	if(datavencimentoInicio != undefined){
		if(datavencimentoInicio !=''){
			iniano = datavencimentoInicio.substr(0, 4);
			inimes = datavencimentoInicio.substr(5,2);
			inidia = datavencimentoInicio.substr(8,2);
			dataInicio = inidia+'/'+inimes+'/'+iniano;
			$('#filterDataResposta').val(dataInicio);
		}
	}
	
	datavencimentoFim = $('#filterDataResposta-between').attr('value');
	if(datavencimentoFim != undefined){
		if(datavencimentoFim != ''){
			fimano = datavencimentoFim.substr(0, 4);
			fimmes = datavencimentoFim.substr(5,2);
			fimdia = datavencimentoFim.substr(8,2);
			dataFim = fimdia+'/'+fimmes+'/'+fimano;
			$('#filterDataResposta-between').val(dataFim);
		}
	}


/*** SUBMITAR FILTRO CONSULTA ***************************/
	$("#quick-filtrar-compras").click(function(e){
		e.preventDefault();

		if($("#filterValor").val() == "0,00" && $("#filterValor-between").val() == "0,00"){
			$("#filterValor").val("");
			$("#filterValor-between").val("");
		}

		if($('#filterDataInici').val()!='' && $('#filterDataInici-between').val()==''){
			$('#filterDataInici-between').addClass('shadow-vermelho').after('<span id="vazioDataInici" class="DinamicaMsg Msg-tooltipDireita">Preencha o campo para filtrar</span>');
		}else if($('#filterDataFim').val()!='' && $('#filterDataFim-between').val()==''){
			$('#filterDataFim-between').addClass('shadow-vermelho').after('<span id="vazioDataFim" class="DinamicaMsg Msg-tooltipDireita">Preencha o campo para filtrar</span>');
		}else if($('#filterValor').val()!='' && $('#filterValor-between').val()==''){
			$('#filterValor-between').addClass('shadow-vermelho').after('<span id="vazioFilterValor" class="DinamicaMsg Msg-tooltipDireita">Preencha o campo para filtrar</span>');
		}else{
			var usoInicioPhp = '<?php' ;
			var usoFinalPhp ='?>';
			var usoGet = '$_GET["ql"]=0';

			$('section').attr(usoInicioPhp+' '+usoGet+' '+usoFinalPhp);

			valAux=$('#filterValor').val();
			valAuxBet=$('#filterValor-between').val();

			$('#filterValor').val(valAux.split('.').join('').replace(',','.'));
			$('#filterValor-between').val(valAuxBet.split('.').join('').replace(',','.'));

			
			$('#form-filter-results').submit();
		}
	});


/*** VALIDAR FILTROS DE CONSULTO ***************************/
	
	//~ var expandido = false;
	//~ 
	//~ $('label[for="filterNomeCentroCusto"]').css('display','none');
	//~ $('#filterNomeCentroCusto').css('display','none');
	//~ 
	//~ $('label[for="filterNomeTipodeconta"]').css('display','none');
	//~ $('#filterNomeTipodeconta').css('display','none');
	//~ 
	//~ $('label[for="filterDescricao"]').css('display','none');
	//~ $('#filterDescricao').css('display','none');
	//~ 
	//~ $('#bt-expandir').css('top','160px');
	//~ 
	//~ $('#bt-expandir').click(function(){
		//~ 
		//~ if(!expandido){
			//~ expandido = true;
			//~ 
			//~ $('label[for="filterNomeCentroCusto"]').css('display','initial');
			//~ $('#filterNomeCentroCusto').css('display','initial');
			//~ 
			//~ $('label[for="filterNomeTipodeconta"]').css('display','initial');
			//~ $('#filterNomeTipodeconta').css('display','initial');
			//~ 
			//~ $('label[for="filterDescricao"]').css('display','initial');
			//~ $('#filterDescricao').css('display','initial');
			//~ 
			//~ $('#bt-expandir').css('top','215px');
			//~ 
			//~ $('#bt-expandir').css('transform','rotate(180deg)');
			//~ $('#bt-expandir').css('-ms-transform','rotate(180deg)');
			//~ $('#bt-expandir').css('-webkit-transform','rotate(180deg)');
		//~ }else{
			//~ expandido = false;
			//~ 
			//~ $('label[for="filterNomeCentroCusto"]').css('display','none');
			//~ $('#filterNomeCentroCusto').css('display','none');
			//~ 
			//~ $('label[for="filterNomeTipodeconta"]').css('display','none');
			//~ $('#filterNomeTipodeconta').css('display','none');
			//~ 
			//~ $('label[for="filterDescricao"]').css('display','none');
			//~ $('#filterDescricao').css('display','none');
				//~ 
			//~ $('#bt-expandir').css('top','160px');
			//~ 
			//~ $('#bt-expandir').css('transform','initial');
			//~ $('#bt-expandir').css('-ms-transform','initial');
			//~ $('#bt-expandir').css('-webkit-transform','initial');
		//~ }
	//~ });


/*** CONSULTA *********************************************************/
	//~ function get(){
		//~ var get = new Object();
		//~ var parameters = window.location.toString().split("?").pop().split("&");
//~ 
		//~ for (var i in parameters){
			//~ var parts = parameters[i].split("=");
//~ 
			//~ get[""+parts[0]+""] = parts[1];
		//~ }
//~ 
		//~ return get;
	//~ }
//~ 
	//~ function TrocaConsulta(){
		//~ var opConsulta = "";
		//~ 
		//~ if($("#checkparcela").prop("checked")){
			//~ opConsulta = opConsulta.concat($("#checkparcela").val());
		//~ }
//~ 
        //~ switch(opConsulta){
            //~ case ('parcelas'):
				//~ window.open(urlPadrao+"&parametro=parcelas"+limit,"_self");
                //~ break;
            //~ case (''):
                //~ window.open(urlPadrao+"&parametro=contas"+limit,"_self");
                //~ break;
        //~ }
	//~ };
//~ 
	//~ var get = get();
	//~ var parametro = get.parametro;
//~ 
	//~ var urlPadrao = urlInicio+"contas/index/?";
	//~ var limit = get.limit;
//~ 
	//~ if(String(limit) != String('') && String(limit) != String('undefined')) { limit = '&limit=' + limit; } else { limit=''; }
//~ 
	//~ if(parametro == 'contas'){
		//~ $("#filtro-parceiro").css({"background-color":"#ebebeb","border-color":"#ccc"});
//~ 
		//~ $("#filtro-parceiro input[type=text]").prop('disabled', true);
		//~ 
		//~ $("#filterFormaPagamento").prop('disabled', true);
//~ 
		//~ $("#checkparcela").prop('checked', false);
//~ 
		//~ $("#filtro-parceiro").mouseenter(function() {
			//~ $('#msgFiltroParcela').css('display','inherit');
		//~ }).mouseleave(function() {
			//~ $('#msgFiltroParcela').css('display','none');
		//~ });
//~ 
		//~ $('#filtro-parceiro #bt-configuracao').click(false);
//~ 
		//~ $("#filtro-parcela").mouseenter(function() {
			//~ $('#msgFiltroparcela').css('display','inherit');
		//~ }).mouseleave(function() {
			//~ $('#msgFiltroparcela').css('display','none');
		//~ });
	//~ }else if(parametro == 'parcelas'){
		//~ $("#checkparcela").attr('checked', true);
	//~ }
//~ 
	//~ $('#checkparcela').on('click', function(){
		//~ TrocaConsulta();
	//~ });
	
/***************************Checkboxes Pagar E Receber***********/
var valorAux=$('#filterTipoOperacao').val();
	if(valorAux != undefined){
		var valorEntrada=valorAux.substr(0,7);
		var valorSaida2 =valorAux.substr(8,5);
	}

	if(valorEntrada == 'COTACAO'){
		$('#QuicklinkNomeCOTACAO').attr('checked', true);
	}
	
	else if(valorEntrada == 'PEDIDO'){
		$('#QuicklinkNomePEDIDO').attr('checked', true);
	}
	
	if(valorSaida2 != ''){
		$('#QuicklinkNomePEDIDO').attr('checked', true);
		$('#QuicklinkNomeCOTACAO').attr('checked', true);
	}

	$("#QuicklinkNomeCOTACAO, #QuicklinkNomePEDIDO").bind('click', function(){
		if($('#QuicklinkNomeCOTACAO').is(':checked')){
			if($('#QuicklinkNomePEDIDO').is(':checked')){
				$('#filterTipoOperacao').val('PEDIDO COTACAO');
			}else{
				$('#filterTipoOperacao').val('COTACAO');
			}
		}else{
			if($('#QuicklinkNomePEDIDO').is(':checked')){
				$('#filterTipoOperacao').val('PEDIDO');
			}else{
				$('#filterTipoOperacao').val(' ');
			}
		}
	});

/**                                              **/





/**        Checkboxes Troca Consulta (PROGRAMAR)        **/
//~ 
//~ function TrocaConsulta(){
		//~ var opConsulta = "";
//~ 
		//~ if($("#checklote").prop("checked")){
			//~ opConsulta = opConsulta.concat($("#checklote").val());
		//~ }
//~ 
		//~ if($("#checkes").prop("checked")){
			//~ opConsulta = opConsulta.concat($("#checkes").val());
		//~ }
//~ 
        //~ switch(opConsulta){
            //~ case ('lote'):
				//~ window.open(urlPadrao+"&parametro=lotes"+limit,"_self");
                //~ break;
            //~ case ('es'):
				//~ window.open(urlPadrao+"&parametro=itensdoproduto"+limit,"_self");
                //~ break;
            //~ case ('lotees'):
				//~ window.open(urlPadrao+"&parametro=itensdolote"+limit,"_self");
                //~ break;
            //~ case (''):
                //~ window.open(urlPadrao+"&parametro=produtos"+limit,"_self");
                //~ break;
        //~ }
	//~ };
//~ 
	//~ var get = get();
	//~ var parametro = get.parametro;
//~ 
	//~ var urlPadrao = urlInicio+"notas/index/?";
	//~ var limit = get.limit;
//~ 
	//~ if(String(limit) != String('') && String(limit) != String('undefined')) { limit = '&limit=' + limit; } else { limit=''; }
//~ 
	//~ if(parametro == 'produtos'){
		//~ $("#filtro-lote").css({"background-color":"#ebebeb","border-color":"#ccc"});
		//~ $("#filtro-es").css({"background-color":"#ebebeb","border-color":"#ccc"});
//~ 
		//~ $("#filtro-lote input[type=text]").prop('disabled', true);
		//~ $("#filterStatusLote").prop('disabled', true);
//~ 
		//~ $("#filtro-es input[type=text]").prop('disabled', true);
		//~ $(".operacao input[type=checkbox]").prop('disabled', true);
//~ 
		//~ $("#checklote").prop('checked', false);
		//~ $("#checkes").prop('checked', false);
//~ 
		//~ $('#filtro-lote #bt-configuracao').click(false);
		//~ $('#filtro-es #bt-configuracao').click(false);
//~ 
		//~ $("#filtro-lote").mouseenter(function() {
			//~ $('#msgFiltroLote').css('display','inherit');
		//~ }).mouseleave(function() {
			//~ $('#msgFiltroLote').css('display','none');
		//~ });
//~ 
		//~ $("#filtro-es").mouseenter(function() {
			//~ $('#msgFiltroES').css('display','inherit');
		//~ }).mouseleave(function() {
			//~ $('#msgFiltroES').css('display','none');
		//~ });
	//~ }else if(parametro == 'itensdoproduto'){
		//~ $("#checkes").attr('checked', true);
		//~ $("#filtro-lote").css({"background-color":"#ebebeb","border-color":"#ccc"});
		//~ $("#filterProdutoCategoria").css('display','none');
		//~ $("label[for='filterProdutoCategoria']").css('display','none');
		//~ $("#ConfigprodutoCategoria").css('display','none');
		//~ $("label[for='ConfigprodutoCategoria']").css('display','none');
//~ 
		//~ $("#filtro-lote input[type=text]").prop('disabled', true);
		//~ $("#filterStatusLote").prop('disabled', true);
//~ 
		//~ $("#checklote").prop('checked', false);
//~ 
		//~ $('#filtro-lote #bt-configuracao').click(false);
//~ 
		//~ $("#filtro-lote").mouseenter(function() {
			//~ $('#msgFiltroLote').css('display','inherit');
		//~ }).mouseleave(function() {
			//~ $('#msgFiltroLote').css('display','none');
		//~ });
	//~ }else if(parametro == 'lotes'){
		//~ $("#checklote").attr('checked', true);
		//~ $("#filtro-es").css({"background-color":"#ebebeb","border-color":"#ccc"});
		//~ $("#filterProdutoCategoria").css('display','none');
		//~ $("label[for='filterProdutoCategoria']").css('display','none');
		//~ $("#ConfigprodutoCategoria").css('display','none');
		//~ $("label[for='ConfigprodutoCategoria']").css('display','none');
//~ 
		//~ $("#filtro-es input[type='text']").prop('disabled', true);
		//~ $(".operacao input[type='checkbox']").prop('disabled', true);
//~ 
		//~ $("#checkes").prop('checked', false);
//~ 
		//~ $('#filtro-es #bt-configuracao').click(false);
//~ 
		//~ $("#filtro-es").mouseenter(function() {
			//~ $('#msgFiltroES').css('display','inherit');
		//~ }).mouseleave(function() {
			//~ $('#msgFiltroES').css('display','none');
		//~ });
	//~ }else if(parametro == 'itensdolote'){
		//~ $("#checklote").attr('checked', true);
		//~ $("#checkes").attr('checked', true);
		//~ $("#filterProdutoCategoria").css('display','none');
		//~ $("label[for='filterProdutoCategoria']").css('display','none');
		//~ $("#filtro-lote").css({"background-color":"#FFFAE7","border-color":"#FFD42A"});
		//~ $("#ConfigprodutoCategoria").css('display','none');
		//~ $("label[for='ConfigprodutoCategoria']").css('display','none');
		//~ $("#filtro-es").css({"background-color":"#C9F0E8","border-color":"#37C8AB"});
	//~ }
//~ 
	//~ $('#checklote').on('click', function(){
		//~ TrocaConsulta();
	//~ });
//~ 
	//~ $('#checkes').on('click', function(){
		//~ TrocaConsulta();
	//~ });

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

});
