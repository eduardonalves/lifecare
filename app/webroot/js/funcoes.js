$(document).ready(function() {

	var total=0;
	var i=0;
	var total=0;


/**************************** Modal Mutiplo *******************************/

	var ultimo_modal = '';
	var modal_atual = '';

	function showModal(modal)
	{

		var valor = modal;

		if(ultimo_modal!='' && modal_atual=='')
		{

			modal_atual = 1;
			$('#'+ultimo_modal).modal("hide");
			modal_atual = modal;
		}else{

		ultimo_modal = modal;

		}



		$('#'+String(modal)).modal('show');


	}


	$('.select-multiple, .bt-showmodal').bind('click',function(e){

			e.preventDefault();

			if($( this ).hasClass( "bt-showmodal" ))
			{

			valor = $(this).attr("href");


			}else{

			valor = $(this).val();
				if(valor =='add-categoria'){
					$('#myModal_add-produtos').modal('hide');
				
				}

			}


			if(String(valor).substring(0,3)=='add')
			{

				showModal('myModal_' + String(valor));


			}

	});

/************************ Modal Select *********************************/

	$('.select').bind('change',function(){

		valor = $(this).val();

		teste=String(valor).substring(0,3);
		if(String(valor).substring(0,3)=='add')
		{
			showModal('myModal_' + String(valor));
		}

	});


	$('.modal').bind('hide.bs.modal', function() {

		$(this).css("display", "none");

		if(modal_atual!='')
		{
			modal_atual = '';
			$('#'+String(ultimo_modal)).modal('show');

		}else{

			ultimo_modal = '';
		}

	});


/************************ Modal Form submit *********************************/

	$('#CategoriaAddForm.modal-form').bind('submit', function(event) {

		event.preventDefault();

		var dadosForm = $(this).serialize();
		var urlAction = $(this).attr("action");

		$('.modal-body').css("cursor","wait");
		$('.modal-form input, .modal-form select').attr('disabled', true);
		$('.bt-salvar').css('display','none');
		$('.close').css('display','none');
		$('.modal-backdrop').off('click');


		$.ajax({
			type: "POST",
			url: urlAction,
			data:  dadosForm,
			dataType: 'json',
			success: function(data) {


				//alert(data.Flashm);

				$('.modal-body').css("cursor","default");
				$('.modal-form input, .modal-form select').attr('disabled', false);
				$('.bt-salvar').css('display','inherit');
				$('.close').css('display','inherit');
				$('#'+ultimo_modal).modal("hide");
				$('.modal-backdrop').on('click');


				if(data.Categoria.id != 0)
				{
					$("#leftValues").append("<option value=\""+data.Categoria.id+"\" selected=\"selected\">"+data.Categoria.nome+"</option>");

					availableTagsCategorias.push(data.Categoria.nome);

					availableTagsCategorias.sort(function (a, b){
						a = a.toLowerCase(); b = b.toLowerCase();
						if (a>b) return 1;
						if (a <b) return -1;
						return 0; });

					$( ".nome-categoria" ).autocomplete({
					source: availableTagsCategorias
					});
				}
				/*
				$("#rightValues option").removeAttr("selected");


				var $s = $("#"+data.Controller+data.Controller);

				var optionTop = $s.find('[value="'+data.Categoria.id+'"]').offset().top;
				var selectTop = $s.offset().top;

				$s.scrollTop($s.scrollTop() + (optionTop - selectTop));
				*/
			}
		});

		//alert(dadosForm);

	});

/*********************** Consulta ***********************/

function get()
{
var get = new Object();
var parameters = window.location.toString().split("?").pop().split("&");

for (var i in parameters)
{
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

        switch(opConsulta) {
            case ('lote'):
                window.open(urlPadrao+"parametro=lotes"+limit,"_self");
                break;
            case ('es'):
                window.open(urlPadrao+"parametro=itensdoproduto"+limit,"_self");
                break;
            case ('lotees'):
				window.open(urlPadrao+"parametro=itensdolote"+limit,"_self");
                break;
            case (''):
                window.open(urlPadrao+"parametro=produtos"+limit,"_self");
                break;
        }
	};

	var get = get();
	var parametro = get.parametro;

	var urlPadrao = "/notas/index/?";
	var limit = get.limit;

	if(String(limit) != String('') && String(limit) != String('undefined')) { limit = '&limit=' + limit; } else { limit=''; }

/*(	if(parametro){
		parametro = parametro.replace("&ql", '');
	}
	*/
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


/******** Carregar filtro no select Quick link ***********************/

	$("#quick-select").bind('change', function(){

		var urlQuickLink = $(this).children('option:selected').attr('data-url')+'&ql='+$(this).children('option:selected').val();

		$("#quick-editar").css("display", "none");

		if(urlQuickLink!='')
		{
			window.location.href=urlQuickLink;
		}

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



/*********** FUNÇÃO PARA CHECK BOX DO FILTRO *************/
	var valorAux=$('#filterNotaTipoEntrada').val();
	if(valorAux  != undefined){

		var valorEntrada=valorAux.substr(0,7);
		var valorSaida1=valorAux.substr(0,5);
		var valorSaida2 =valorAux.substr(8,5);
	}


	var statusEntrada = '';
	var statusSaida= '';
	var statusEntradaSaida='';

	if(valorEntrada =='ENTRADA'){
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

/****************** Funções para cadastro de produtos *******************/

/*
	estoqueMinimo= $('#ProdutoEstoqueMinimo').val();
	estoqueDesejado= $('#estoqueIdeal').val();

		if((estoqueDesejado != '') && (estoqueMinimo != '')){

			if((estoqueMinimo - estoqueDesejado) > 0){
			    $('input[id="ProdutoEstoqueMinimo"]').html('span','Estoque Mínimo não pode ser maior do que o Estoque Ideal').addClass('spanEstoqueMinimo');
			//	alert('Estoque Mínimo não pode ser maior do que o Estoque Ideal');
				$('#estoqueIdeal').val('');
				$('#estoqueIdeal').addClass('shadow-vermelho');
				$('#ProdutoEstoqueMinimo').val('');
				$('#ProdutoEstoqueMinimo').addClass('shadow-vermelho');
			}
			else{
				$('#estoqueIdeal').removeClass('shadow-vermelho');
				$('#ProdutoEstoqueMinimo').removeClass('shadow-vermelho');
			}
		}

*/
	$('#ProdutoEstoqueMinimo, #estoqueIdeal').change(function(e){

		estoqueMinimo= $('#ProdutoEstoqueMinimo').val();
		estoqueDesejado= $('#estoqueIdeal').val();

			if((estoqueDesejado != '') &&(estoqueMinimo != '')){
				if((estoqueMinimo - estoqueDesejado) > 0){
				    $('span[id="spanEstoqueMinimo"]').remove();
				    $('<span id="spanEstoqueMinimo" class="tooltipMensagemErroDireta">Estoque Mínimo não pode ser maior do que o Estoque Ideal</span>').insertAfter('input[id="ProdutoEstoqueMinimo"]');
				  //$('input[id="ProdutoEstoqueMinimo"]').after("<span id='ProdutoEstoqueMinimo'").text('Estoque Mínimo não pode ser maior do que o Estoque Ideal');
				    //alert('Estoque Mínimo não pode ser maior do que o Estoque Ideal');
				    $('#estoqueIdeal').val('');
				    $('#estoqueIdeal').addClass('shadow-vermelho');
				    $('#ProdutoEstoqueMinimo').val('');
				    $('#ProdutoEstoqueMinimo').addClass('shadow-vermelho');
				}
				else{
					$('span[id="spanEstoqueMinimo"]').remove();
					$('#estoqueIdeal').removeClass('shadow-vermelho');
					$('#ProdutoEstoqueMinimo').removeClass('shadow-vermelho');
				}
			}
	});

/**************** PICK LIST ************************/
	$("#btnLeft").bind('click', function () {


			var selectedItem = $("#rightValues option:selected");
			var valor = selectedItem.val();

			if(String(valor).substring(0,3)!='add')
			{
				$("#leftValues").append(selectedItem);
			}

			});

	$("#btnRight").bind('click', function () {
			var selectedItem = $("#leftValues option:selected");
			$("#rightValues").append(selectedItem);
			});

	$("#rightValues").bind('click', function () {
			var selectedItem = $("#rightValues option:selected");
			$("#txtRight").val(selectedItem.text());
			});





/**************************** Função Menu *******************************/

		var width = screen.width;

		if(width<1366){
			$("#nav-lateral").css("position","absolute");
		}

		var classMenuNumber = $('h1').attr('class');

		var optionLateral = classMenuNumber[classMenuNumber.length - 1];
		var optionSuperior = classMenuNumber[classMenuNumber.length - 2];

		$(".item").removeClass("selected");
		$("#menu li").removeClass("active");

		$("ul li:nth-child(" + optionLateral + ")").addClass("selected");
		$("#menu li:nth-child(" + optionSuperior + ")").addClass("active");



/******************** Botão Upload *********************************/

	$(document).ready(function() {
	    /*
	    $('#teste').bind("click" , function () {
		var arquivo = $('input[type=file]').val();
		alert(arquivo);
	    });
	    */

	    $('#teste').bind("click" , function () {
		$('#doc_file').click();
	    });

	    $('input[type=file]').change(function(e){
	      var arquivo = $('#doc_file').val();
		$('#valor').attr('value',arquivo);
	    });

	});

/***##___FUNCOES DE MANIPULACA0 DA DATA DO FILTRO CONSULTA___##***/


	var form = $("form[id='form-filter-results']");
	form.addClass('dados-produto');

/** ................................................... **/

	$("input[id='filterDataLote-between']").addClass('forma-data1 validaLote');
	$('#filterDataLote').addClass('validaLote');

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
/*
	$('body').on('change',"input[id='LoteDataValidade'],input[id='LoteDataFabricacao']",function(){
				var dataInicialNota = $("input[id='LoteDataFabricacao']").datepicker('getDate');

				if(dataInicialNota !=0){
					var dataFinalNota = $("input[id='LoteDataValidade']").datepicker('getDate');

					if(dataFinalNota !=0){

						var daysNota = (dataFinalNota - dataInicialNota) / 1000 / 60 / 60 / 24;

						if(daysNota < 0){
							$('span[id="spanLoteDataValidade"]').remove();
							$('<span id="spanLoteDataValidade">A data de validade não pode ser menor que a data de fabricação</span>').insertAfter('input[id="LoteDataValidade"]');
							//alert('A data de validade não pode ser menor que a data de fabricação');
							$("input[id='LoteDataValidade']").val("");

						}else if(daysNota >= 0){
							$('span[id="spanLoteDataValidade"]').remove();
							$("input[id='LoteDataValidade']").removeClass('shadow-vermelho');
						}
					}
				}
		});
*/
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



/**********************************************************/
/** ................................................... **/

	var lb1 = $("label[for='filterDataNota-between']");
	lb1.text('a');
	lb1.addClass('forma-data2');

	var it1 = $("input[id='filterDataNota-between']");
	it1.addClass('forma-data1');
/** ................................................... **/


/*********** Mensagens ***********/
	//$(".error-message").addClass("tooltip" );



/*********** Mascaras ***********/

	jQuery(function($){
		$(".ncm").mask("00000000");
		$(".cfop").mask("0000");
		$(".icms").mask("000.00", {reverse: true});
		$(".s-ipi").mask("00000000");
		$(".q-ip").mask("000000000000000000000000000000000000000000000000000000000000");/** 60 numeros ***/
		$(".codigoean").mask("00000000000000000000");
		$(".ipi").mask('000.00', {reverse: true});
		$(".masc_tributos_dez").mask("0000000000");
		$(".numberMask").mask("9999999999");
	});
/*
		$('.icms , .ipi').change(function(){
			var t = $(this).val();
			if(t.length > 7){

				//alert("Valor Inválido!");
				$(this).val(" ");

			}

		});
*/
/*********** Mascara Entradas ***********/
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

	/*	$(".dinheiro").focus(function(){
			$('.dinheiro').priceFormat({
				prefix:'',
				centsSeparator:'.',
				thousandsSeparator: ''
			});
		});
	*/
	 
	});

/************* Datepicker *****************/

	$("[class*='forma-data']").datepicker({
		dateFormat: 'dd/mm/yy',
		dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
		dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		nextText: 'Próximo',
		prevText: 'Anterior'
	});

/******** Mensagem de erro Quicklink *********/
	var temClasse = $('h1').hasClass('menuOption21');

			//alert(temClasse);

			if(temClasse){
				$('.error-message').removeClass('error-message').addClass('error-message-quicklink');
			}

	$('#quick-salvar').bind('click',function(){
		$('.error-message').remove();
	});

/************* EDIT PRODUTO *****************/
	if(temClasse){
		$('input[type=text]').on('keypress',function(e){
			return e.keyCode != 13;
		});
	}

/************* ROLAGEM DA TELA DO BOTÃO SALVAR *****************/
	$('.bt-salvar').bind('click',function(){
		$('html, body').animate({scrollTop:0},0);
	});



/************* VALIDAR CONFIGURAÇÃO DO FILTRO *****************/

	/*** Modal Config Produto ***/

		$("#ConfigprodutoNome").prop('checked', true);
		$('#ConfigprodutoNome').click(false);
		$("input[id='ConfigprodutoNome']").mouseenter(function() {
			$('#msgModalProd').css('display','inherit');
		}).mouseleave(function() {
			$('#msgModalProd').css('display','none');
		});

		$("label[for='ConfigprodutoNome']").mouseenter(function() {
			$('#msgModalProd').css('display','inherit');
		}).mouseleave(function() {
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



	/*** Modal Config Lote ***/

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

	/*** Modal Config Nota ***/

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


	/****/


});
