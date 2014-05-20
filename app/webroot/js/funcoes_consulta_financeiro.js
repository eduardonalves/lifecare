$(document).ready(function(){

	var total = 0;
	var i = 0;

/*** EXPANDIR FILTRO **************************************************/
	
	var expandido = false;
	
	$('label[for="filterNomeCentroCusto"]').css('display','none');
	$('#filterNomeCentroCusto').css('display','none');
	
	$('label[for="filterNomeTipodeconta"]').css('display','none');
	$('#filterNomeTipodeconta').css('display','none');
	
	$('label[for="filterDescricao"]').css('display','none');
	$('#filterDescricao').css('display','none');
	
	$('#bt-expandir').css('top','160px');
	
	$('#bt-expandir').click(function(){
		
		if(!expandido){
			expandido = true;
			
			$('label[for="filterNomeCentroCusto"]').css('display','initial');
			$('#filterNomeCentroCusto').css('display','initial');
			
			$('label[for="filterNomeTipodeconta"]').css('display','initial');
			$('#filterNomeTipodeconta').css('display','initial');
			
			$('label[for="filterDescricao"]').css('display','initial');
			$('#filterDescricao').css('display','initial');
			
			$('#bt-expandir').css('top','215px');
			
			$('#bt-expandir').css('transform','rotate(180deg)');
			$('#bt-expandir').css('-ms-transform','rotate(180deg)');
			$('#bt-expandir').css('-webkit-transform','rotate(180deg)');
		}else{
			expandido = false;
			
			$('label[for="filterNomeCentroCusto"]').css('display','none');
			$('#filterNomeCentroCusto').css('display','none');
			
			$('label[for="filterNomeTipodeconta"]').css('display','none');
			$('#filterNomeTipodeconta').css('display','none');
			
			$('label[for="filterDescricao"]').css('display','none');
			$('#filterDescricao').css('display','none');
				
			$('#bt-expandir').css('top','160px');
			
			$('#bt-expandir').css('transform','initial');
			$('#bt-expandir').css('-ms-transform','initial');
			$('#bt-expandir').css('-webkit-transform','initial');
		}
	});


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
		
		if($("#checkparcela").prop("checked")){
			opConsulta = opConsulta.concat($("#checkparcela").val());
		}

        switch(opConsulta){
            case ('parcelas'):
				window.open(urlPadrao+"&parametro=parcelas"+limit,"_self");
                break;
            case (''):
                window.open(urlPadrao+"&parametro=contas"+limit,"_self");
                break;
        }
	};

	var get = get();
	var parametro = get.parametro;

	var urlPadrao = urlInicio+"contas/index/?";
	var limit = get.limit;

	if(String(limit) != String('') && String(limit) != String('undefined')) { limit = '&limit=' + limit; } else { limit=''; }

	if(parametro == 'contas'){
		$("#filtro-parceiro").css({"background-color":"#ebebeb","border-color":"#ccc"});

		$("#filtro-parceiro input[type=text]").prop('disabled', true);
		
		$("#filterFormaPagamento").prop('disabled', true);

		$("#checkparcela").prop('checked', false);

		$("#filtro-parceiro").mouseenter(function() {
			$('#msgFiltroParcela').css('display','inherit');
		}).mouseleave(function() {
			$('#msgFiltroParcela').css('display','none');
		});

		$('#filtro-parceiro #bt-configuracao').click(false);

		$("#filtro-parcela").mouseenter(function() {
			$('#msgFiltroparcela').css('display','inherit');
		}).mouseleave(function() {
			$('#msgFiltroparcela').css('display','none');
		});
	}
	else if(parametro == 'parcelas'){
		$("#checkparcela").attr('checked', true);
	}

	$('#checkparcela').on('click', function(){
		TrocaConsulta();
	});
	
/***************************Checkbobx Pagar E Receber***********/
var valorAux=$('#filterTipoMovimentacao').val();
	if(valorAux  != undefined){
		var valorEntrada=valorAux.substr(0,7);
		var valorSaida1=valorAux.substr(0,5);
		var valorSaida2 =valorAux.substr(8,5);
	}

	var statusEntrada = '';
	var statusSaida = '';
	var statusEntradaSaida = '';

	if(valorEntrada == 'RECEBER'){
		$('#QuicklinkNomeREECEBER').attr('checked', true);
	}
	
	if(valorSaida1 == 'PAGAR'){
		$('#QuicklinkNomePAGAR').attr('checked', true);
	}
	
	if(valorSaida2 != ''){
		$('#QuicklinkNomePAGAR').attr('checked', true);
		$('#QuicklinkNomeREECEBER').attr('checked', true);
	}

	$("#QuicklinkNomeREECEBER, #QuicklinkNomePAGAR").bind('click', function(){
		if($('#QuicklinkNomeREECEBER').is(':checked')){
			if($('#QuicklinkNomePAGAR').is(':checked')){
				$('#filterTipoMovimentacao').val('A PAGAR  A RECEBER');
			}else{
				$('#filterTipoMovimentacao').val('RECEBER');
			}
		}else{
			if($('#QuicklinkNomePAGAR').is(':checked')){
				$('#filterTipoMovimentacao').val('PAGAR');
			}else{
				$('#filterTipoMovimentacao').val(' ');
			}
		}
	});


});
