$(document).ready(function() {

	//Esconde todos os modais
	$('.modal').css("display", "none"); 
/**************************** Função Menu *******************************/
    var width = screen.width;

    if(width<1366){
	    $("#nav-lateral").css("position","absolute");
    }

    var classMenuNumber = $('h1').attr('class');
	
	if(classMenuNumber!=null){
		var optionLateral = classMenuNumber[classMenuNumber.length - 1];
		var optionSuperior = classMenuNumber[classMenuNumber.length - 2];
	}
	
    $(".item").removeClass("selected");
    $("#menu li").removeClass("active");

    $("ul li:nth-child(" + optionLateral + ")").addClass("selected");
    $("#menu li:nth-child(" + optionSuperior + ")").addClass("active");	
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
/*************************** Modal dados do lote *******************************/

	$('.bt-add').bind('click',function(){

	    $('#spanAdicionarLote').css('display','none');

	    if($('#ProdutoNome').val() ==''){
		$(".campo-superior-produto input").addClass('shadow-vermelho');
		$('#spanValProduto').css('display','block');
	    }else{
		    showModal('myModal_' + 'add-lote');
		    //$('#spanProdutoLote').css('display','block');
	    }

	});
/************************ Modal Form submit Categoria ******************************

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
			
			}
		});

		//alert(dadosForm);

	});***/
	
/***************** Focusin em Produtos *********************/	
	
	$('#ProdutoNome').focusin(function(){
	  
	    $('#ProdutoNome').attr('required','required');
	});
	
	$('#ProdutoUnidade').focusin(function(){
	    $('#ProdutoUnidade').attr('required','required');
	});
	
	$('#Tributo0Ncm').focusin(function(){
	    $('#Tributo0Ncm').attr('required','required');
	});
	
	$('#Tributo0Cfop').focusin(function(){
	    $('#Tributo0Cfop').attr('required','required');
	});
	
	$('#ProdutoEstoqueMinimo').focusin(function(){
	    $('#ProdutoEstoqueMinimo').attr('required','required');
	});
	
	$('#estoqueIdeal').focusin(function(){
	    $('#estoqueIdeal').attr('required','required');
	});
	
	$('#ProdutoUnidade').removeAttr('required','required');
	$('input[class*="valida"]').focusout(function(){
	    $('#ProdutoNome').removeAttr('required','required');
	    $('#ProdutoUnidade').removeAttr('required','required');
	    $('#Tributo0Ncm').removeAttr('required','required');
	    $('#Tributo0Cfop').removeAttr('required','required');
	    $('#ProdutoEstoqueMinimo').removeAttr('required','required');
	    $('#estoqueIdeal').removeAttr('required','required');
	});
	


/**Ajustar função abaixo para cadastro de produtos sem ser no modal****/
	$('body').on("focusin , click", "[class*=valida], #ProdutoEstoqueMinimo", function(){
			$('.validaCodigo').removeClass('shadow-vermelho');
			$('#validaCodi').css('display','none');
		
			$('.validaNome').removeClass('shadow-vermelho');
			$('#validaNome').css('display','none');
			
			$('.validaUnidade').removeClass('shadow-vermelho');
			$('#validaUnidade').css('display','none');
			
			$('span[id="spanEstoqueMinimo"]').remove();
			$('#ProdutoEstoqueMinimo').removeClass('shadow-vermelho');
			
			$('.validaNcm').removeClass('shadow-vermelho');
			$('#validaNcm').css('display','none');
			
			$('.validaCfop').removeClass('shadow-vermelho');
			$('#validaCfop').css('display','none');
			
			$('.validaEstoqueIdeal').removeClass('shadow-vermelho');
			$('#validaEstoqueIdeal').css('display','none');
			
			$('.SpanEstoqueMinimo').removeClass('shadow-vermelho');
			$('#SpanEstoqueMinimo').css('display','none');
						
	});
	
	
	$('#bt-edit-salvar').click(function(event) {
		event.preventDefault();
		    
	    if($('.validaNome').val() ==''){	    
			$('.validaNome').addClass('shadow-vermelho');
			$('#validaNome').css('display','block');
	    }else if($('.validaUnidade').val() ==''){
			$('.validaUnidade').addClass('shadow-vermelho');
			$('#validaUnidade').css('display','block');
	    }else if($('.validaNcm').val() ==''){	    
			$('.validaNcm').addClass('shadow-vermelho');
			$('#validaNcm').css('display','block');
	    }else if($('.validaCfop').val() ==''){	    
			$('.validaCfop').addClass('shadow-vermelho');
			$('#validaCfop').css('display','block');
	    }else if($('.SpanEstoqueMinimo').val() == 0){
			$('span[id="SpanEstoqueMinimo"]').remove();
			$('.SpanEstoqueMinimo').addClass('shadow-vermelho');
			$('<span id="SpanEstoqueMinimo" class="Msg-tooltipDireita">Estoque Mínimo não pode ser menor que 1</span>').insertAfter('input[id="ProdutoEstoqueMinimo"]');
	    }else if($('.valiEstoqueIdeal').val() ==''){	    
			$('.valiEstoqueIdeal').addClass('shadow-vermelho');
			$('#valiEstoqueIdeal').css('display','block');
	    }else{
			$('#FormEditSubmit').submit();
	    }
	}); 
	
	$('#btn-salvarProduto').click(function(event) {
		event.preventDefault();
	    
	    if($('.validaCodigo').val() ==''){
			$('.validaCodigo').addClass('shadow-vermelho');
			$('#validaCodi').css('display','block');
						    
	    }else if($('.validaNome').val() ==''){	    
			$('.validaNome').addClass('shadow-vermelho');
			$('#validaNome').css('display','block');
	    }else if($('.validaUnidade').val() ==''){
			$('.validaUnidade').addClass('shadow-vermelho');
			$('#validaUnid').css('display','block');
	    }else if($('.validaNcm').val() ==''){	    
			$('.validaNcm').addClass('shadow-vermelho');
			$('#validaNcm').css('display','block');
	    }else if($('.validaCfop').val() ==''){	    
			$('.validaCfop').addClass('shadow-vermelho');
			$('#validaCfop').css('display','block');
	    }else if($('#ProdutoEstoqueMinimo').val() == 0){
			$('span[id="spanEstoqueMinimo"]').remove();
			$('#ProdutoEstoqueMinimo').addClass('shadow-vermelho');
			$('<span id="spanEstoqueMinimo"  class="Msg-tooltipDireita">Estoque Mínimo não pode ser menor que 1</span>').insertAfter('input[id="ProdutoEstoqueMinimo"]');
	    }else if($('.validaEstoqueIdeal').val() ==''){	    
			$('.validaEstoqueIdeal').addClass('shadow-vermelho');
			$('#validaEstoqueIdeal').css('display','block');
	    }else{
			$('#ProdutoAddForm').submit();
	    }
	});	
/**---------------Verificação Estoque Minimo > ideal-----------------------------------**/
	$('#ProdutoEstoqueMinimo, #estoqueIdeal').change(function(e){

		estoqueMinimo= $('#ProdutoEstoqueMinimo').val();
		estoqueDesejado= $('#estoqueIdeal').val();

			if((estoqueDesejado != '') &&(estoqueMinimo != '')){
				if((estoqueMinimo - estoqueDesejado) > 0){
				    $('span[id="spanEstoqueMinimo"]').remove();
				    $('<span id="spanEstoqueMinimo" class="Msg-tooltipDireita">Estoque Mínimo não pode ser maior do que o Estoque Ideal</span>').insertAfter('input[id="ProdutoEstoqueMinimo"]');
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
		$(".tel").mask("(00) #0000-0000");
	});
	
/************* Mascara Tel ou Cel *****************/


	$(".tel").focusout(function(){
			var elemento =  $(".tel").val();
			elemento = elemento.replace("-","");
			var subEsq = elemento.substring(0,9);
			//var subMeio = elemento.substring(9,10);
			var subDir = elemento.substring(9);
			
			var telefone = subEsq+'-'+subDir;
			//alert(telefone);
			//alert(elemento.length);
			if(elemento.length == 13){
				$(".tel").val(telefone);
			}
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
/************* EDIT PRODUTO *****************/
	var temClasse;
	if(temClasse){
		$('input[type=text]').on('keypress',function(e){
			return e.keyCode != 13;
		});
	}

/************* ROLAGEM DA TELA DO BOTÃO SALVAR *****************/
	$('.bt-salvar, .bt-salvar1').bind('click',function(){
	    $('html, body').animate({scrollTop:0},0);
	});


/************* LOGIN *****************/
	$(".loginEntrar").click(function(){
		
		$("input[type=submit]").trigger("click");
	});
	
/************* Sumir com mensagem de validação *****************/
    $('input, select, div').on('focusin, focusout', function(){
	$('span[class*="Msg"]').css('display','none');
    });
	
/************* Sumir com mensagem  do controller *****************/
    $('#flashMessage').fadeOut(6000);
	
    
/************* Funcao que impede digitar letras na input *****************/
$(".Nao-Letras").on("keypress",function(event){		
		var charCode = event.keyCode || event.which;
	
		if((charCode==8) || (charCode==9) || (charCode==37) || (charCode==39) || (charCode==46)){return true}
		if (!((charCode>47)&&(charCode<58))){return false;}
	});
	
});
