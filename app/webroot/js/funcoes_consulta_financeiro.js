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

});
