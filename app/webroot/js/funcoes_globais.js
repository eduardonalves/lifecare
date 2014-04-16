$(document).ready(function(){

/************* Inicio Seta de Ordenação da tabela *****************/
	$(".colunaConta a.asc + div").addClass("seta-cima");
	$(".colunaConta a.desc + div").addClass("seta-baixo");
	
	var idcol = $(".colunaConta a.asc ,  .colunaConta a.desc").parent().attr('id');
	$("td."+idcol).addClass("highlight");
	
	$(".setaOrdena a.asc + div").addClass("seta-cima");
	$(".setaOrdena a.desc + div").addClass("seta-baixo");
	
	var idcol = $(".setaOrdena a.asc ,  .setaOrdena a.desc").parent().attr('id');
	$("td."+idcol).addClass("highlight");
	

/** MÁSCARA DE DINHEIRO ***********************************************/
	$('.dinheiro').priceFormat({
		prefix: '',
		centsSeparator: ',',
		thousandsSeparator: '.',
		centsLimit: 5,
	    limit: 15

	});
	
	$(".dinheiro_duasCasas").priceFormat({
	    prefix: '',
	    centsSeparator: ',',
	    thousandsSeparator: '.',
	    limit: 15
	});

/** PREÇO VENDA *******************************************************/
	$('#btn-salvarProduto, #btn-salvarProdutoModal, #bt-edit-salvar').click(function(){
		precoVenda = $('#ProdutoPrecoVenda').val(); 
		$('input[id="ProdutoPrecoVenda"]').val(precoVenda.replace(',','.'));
	});

	//Esconde todos os modais
	$('.modal').css("display", "none");


/** FUNÇÃO MENU *******************************************************/
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


/** PICK LIST *********************************************************/
	$("#btnLeft").bind('click', function(){
		var selectedItem = $("#rightValues option:selected");
		var valor = selectedItem.val();

		if(String(valor).substring(0,3)!='add'){
			$("#leftValues").append(selectedItem);
		}
	});

	$("#btnRight").bind('click', function(){
		var selectedItem = $("#leftValues option:selected");
		$("#rightValues").append(selectedItem);
	});

	$("#rightValues").bind('click', function(){
		var selectedItem = $("#rightValues option:selected");
		$("#txtRight").val(selectedItem.text());
	});


/** MODAL MULTIPLO ****************************************************/
	var ultimo_modal = '';
	var modal_atual = '';

	function showModal(modal){
		var valor = modal;

		if(ultimo_modal!='' && modal_atual==''){
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

		if($( this ).hasClass( "bt-showmodal" )){
			valor = $(this).attr("href");
		}else{
			valor = $(this).val();
			
			if(valor =='add-categoria'){
				$('#myModal_add-produtos').modal('hide');
			}
		}

		if(String(valor).substring(0,3)=='add'){
			showModal('myModal_' + String(valor));
		}
	});


/** MODAL SELECT ******************************************************/
	$('.select').bind('change',function(){
		valor = $(this).val();
		teste = String(valor).substring(0,3);
		
		if(String(valor).substring(0,3)=='add'){
			showModal('myModal_' + String(valor));
		}
	});

	$('.modal').bind('hide.bs.modal', function() {
		$(this).css("display", "none");

		if(modal_atual!=''){
			modal_atual = '';
			$('#'+String(ultimo_modal)).modal('show');
		}else{
			ultimo_modal = '';
		}
	});


/** MODAL DADOS DO LOTE ***********************************************/
	$('.bt-add').bind('click',function(){
	    $('#spanAdicionarLote').css('display','none');

	    if($('#ProdutoNome').val() ==''){
			$(".campo-superior-produto input").addClass('shadow-vermelho').focus();
			$('#spanValProduto').css('display','block');
	    }else{
		    showModal('myModal_' + 'add-lote');
	    }
	});


/** FOCUS-IN EM PRODUTOS **********************************************/	
	//$('#ProdutoNome').focusin(function(){
	    //$('#ProdutoNome').attr('required','required');
	//});

	//$('#ProdutoUnidade').focusin(function(){
	    //$('#ProdutoUnidade').attr('required','required');
	//});

	//$('[id*=Ncm]').focusin(function(){
	    //$('[id*=Ncm]').attr('required','required');
	//});

	//$('[id*=Cfop]').focusin(function(){
	    //$('[id*=Cfop]').attr('required','required');
	//});

	//$('#ProdutoEstoqueMinimo').focusin(function(){
	    //$('#ProdutoEstoqueMinimo').attr('required','required');
	//});

	//$('#estoqueIdeal').focusin(function(){
	    //$('#estoqueIdeal').attr('required','required');
	//});

	//$('#ProdutoUnidade').removeAttr('required','required');
	//$('input[class*="valida"]').focusout(function(){
	    //$('#ProdutoNome').removeAttr('required','required');
	    //$('#ProdutoUnidade').removeAttr('required','required');
	    //$('[id*=Ncm]').removeAttr('required','required');
	    //$('[id*=Cfop]').removeAttr('required','required');
	    //$('#ProdutoEstoqueMinimo').removeAttr('required','required');
	    //$('#estoqueIdeal').removeAttr('required','required');
	//});


/** AJUSTAR FUNÇÃO ABAIXO PARA CADASTRO DE PRODUTOS SEM SER NO MODAL **/
	//$('body').on("focusin , click", "[class*=valida], #ProdutoEstoqueMinimo", function(){
		//$('.validaCodigo').removeClass('shadow-vermelho');
		//$('#validaCodi').css('display','none');

		//$('.validaNome').removeClass('shadow-vermelho');
		//$('#validaNome').css('display','none');

		//$('.validaUnidade').removeClass('shadow-vermelho');
		//$('#validaUnidade').css('display','none');

		//$('span[id="spanEstoqueMinimo"]').css('display','none');
		//$('span[id="spanEstoqueMinimoZero"]').css('display','none');
		//$('#ProdutoEstoqueMinimo').removeClass('shadow-vermelho');
		//$('.SpanEstoqueMinimo').removeClass('shadow-vermelho');

		//$('.validaNcm').removeClass('shadow-vermelho');
		//$('#validaNcm').css('display','none');

		//$('.validaCfop').removeClass('shadow-vermelho');
		//$('#validaCfop').css('display','none');

		//$('.validaEstoqueIdeal').removeClass('shadow-vermelho');
		//$('#validaEstoqueIdeal').css('display','none');
	//});

	$('#bt-edit-salvar').click(function(event) {
		event.preventDefault();

	    if($('.validaNome').val() ==''){	    
			$('.validaNome').addClass('shadow-vermelho').focus();
			$('#validaNome').css('display','block');
	    }else if($('.validaUnidade').val() ==''){
			$('.validaUnidade').addClass('shadow-vermelho').focus();
			$('#validaUnidade').css('display','block');
	    }else if($('.validaNcm').val() ==''){	    
			$('.validaNcm').addClass('shadow-vermelho').focus();
			$('#validaNcm').css('display','block');
	    }else if($('.validaCfop').val() ==''){	    
			$('.validaCfop').addClass('shadow-vermelho').focus();
			$('#validaCfop').css('display','block');
	    }else if($('.SpanEstoqueMinimo').val() == 0){
			$('span[id="spanEstoqueMinimoZero"]').css('display','none');
			$('.SpanEstoqueMinimo').addClass('shadow-vermelho').focus();
			$('#spanEstoqueMinimo').css('display:block');
			$('<span id="SpanEstoqueMinimo" class="DinamicaMsg-tooltipDireita">Estoque Mínimo não pode ser menor que 1</span>').insertAfter('input[id="ProdutoEstoqueMinimo"]');
	    }else if($('.valiEstoqueIdeal').val() ==''){	    
			$('.valiEstoqueIdeal').addClass('shadow-vermelho').focus();
			$('#valiEstoqueIdeal').css('display','block');
	    }else{
			$('#FormEditSubmit').submit();
	    }
	}); 

	$('#btn-salvarProduto').click(function(event) {
		event.preventDefault();

	    if($('.validaCodigo').val() ==''){
			$('.validaCodigo').addClass('shadow-vermelho').focus();
			$('#validaCodi').css('display','block');
	    }else if($('.validaNome').val() ==''){	    
			$('.validaNome').addClass('shadow-vermelho').focus();
			$('#validaNome').css('display','block');
	    }else if($('.validaUnidade').val() ==''){
			$('.validaUnidade').addClass('shadow-vermelho').focus();
			$('#validaUnid').css('display','block');
	    }else if($('.validaNcm').val() ==''){	    
			$('.validaNcm').addClass('shadow-vermelho').focus();
			$('#validaNcm').css('display','block');
	    }else if($('.validaCfop').val() ==''){	    
			$('.validaCfop').addClass('shadow-vermelho').focus();
			$('#validaCfop').css('display','block');
	    }else if($('#ProdutoEstoqueMinimo').val() == 0){
			$('span[id="spanEstoqueMinimoZero"]').css('display','none');
			$('#ProdutoEstoqueMinimo').addClass('shadow-vermelho').focus();
			$('#spanEstoqueMinimo').css('display:block');
			$('<span id="spanEstoqueMinimo"  class="DinamicaMsg-tooltipDireita">Estoque Mínimo não pode ser menor que 1</span>').insertAfter('input[id="ProdutoEstoqueMinimo"]');
			$('<span id="spanEstoqueMinimoZero"  class="Msg-tooltipDireita">Estoque Mínimo não pode ser menor que 1</span>').insertAfter('input[id="ProdutoEstoqueMinimo"]');
	    }else if($('.validaEstoqueIdeal').val() ==''){	    
			$('.validaEstoqueIdeal').addClass('shadow-vermelho').focus();
			$('#validaEstoqueIdeal').css('display','block');
	    }else{
			$('#ProdutoAddForm').submit();
	    }
	});


/** VERIFICAÇÃO ESTOQUE MÍNIMO MAIOR QUE ESTOQUE IDEAL ****************/
	$('#ProdutoEstoqueMinimo, #estoqueIdeal').on("change, focusin, focusout",function(){
		estoqueMinimo= $('#ProdutoEstoqueMinimo').val();
		estoqueDesejado= $('#estoqueIdeal').val();

			if((estoqueDesejado != '') &&(estoqueMinimo != '')){

				if((estoqueMinimo - estoqueDesejado) > 0){
				    $('span[id="spanEstoqueMinimo"]').remove();
				    $('#spanEstoqueMinimo').css('display:block');
				    $('<span id="spanEstoqueMinimo" class="DinamicaMsg-tooltipDireita">Estoque Mínimo não pode ser maior do que o Estoque Ideal</span>').insertAfter('input[id="ProdutoEstoqueMinimo"]');
				    $('#estoqueIdeal').val('');
				    $('#estoqueIdeal').addClass('shadow-vermelho').focus();
				    $('#ProdutoEstoqueMinimo').val('');
				    $('#ProdutoEstoqueMinimo').addClass('shadow-vermelho').focus();
				if((estoqueMinimo > estoqueDesejado) > 0){
				    $('span[id="spanEstoqueMinimo"]').css("display","block");
				    $('#estoqueIdeal, #ProdutoEstoqueMinimo').val('');
				    $('#estoqueIdeal, #ProdutoEstoqueMinimo').addClass('shadow-vermelho').focus();
				}
				else{
					$('span[id="spanEstoqueMinimo"]').css("display","none");
					$('#estoqueIdeal, #ProdutoEstoqueMinimo').removeClass('shadow-vermelho').focus();
				}
			}
		}
	});


/** BOTÃO UPLOAD ******************************************************/
	$('#teste').bind("click" , function () {
		$('#doc_file').click();
	});

	$('input[type=file]').change(function(e){
		var arquivo = $('#doc_file').val();

		$('#valor').attr('value',arquivo);
	});

/** MÁSCARAS **********************************************************/
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


/** MÁSCARA TELEFONE OU CELULAR ***************************************/
	$(".tel").focusout(function(){
		var elemento =  $(".tel").val();

		elemento = elemento.replace("-","");

		var subEsq = elemento.substring(0,9);
		var subDir = elemento.substring(9);
		var telefone = subEsq+'-'+subDir;

		if(elemento.length == 13){
			$(".tel").val(telefone);
		}
	});


/** DATEPICKER ********************************************************/
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


/** EDIT PRODUTO ******************************************************/
	var temClasse;

	if(temClasse){
		$('input[type=text]').on('keypress',function(e){
			return e.keyCode != 13;
		});
	}

/** ROLAGEM DA TELA DO BOTÃO SALVAR ***********************************/
	$('.bt-salvar, .bt-salvar1').bind('click',function(){
		$('html, body').animate({scrollTop:0},0);
	});

/** LOGIN *************************************************************/
	$(".loginEntrar").click(function(){
		$("input[type=submit]").trigger("click");
	});

/** SUMIR COM MENSAGEM DE VALIDAÇÃO ***********************************/
    $('input, select, div').on('focusout', function(){
	if($(this).val() !=''){
	    $('span[class*="Msg"]').css('display','none');
	    $('span[class*="DinamicaMsg"]').remove();
	    $('input,select').removeClass('shadow-vermelho');
	    $('.ui-widget').removeClass('shadow-vermelho');
	}
    });

    $('[class*="Msg"]').on('click', function(){
	$('span[class*="Msg"]').css('display','none');
	$('span[class*="DinamicaMsg"]').remove();
	$('input,select').removeClass('shadow-vermelho');
	$('.ui-widget').removeClass('shadow-vermelho');
    });

    $('input').keydown(function(){
	valrInput=$('input').val();
	if(valrInput!=''){
	    $('span[class*="Msg"]').css('display','none');
	    $('span[class*="DinamicaMsg"]').remove();
	    $('input,select').removeClass('shadow-vermelho');
	    $('.ui-widget').removeClass('shadow-vermelho');
	}
    });
    
/****************** Marca em vermelho o campo ***********/
    $('.campo-obrigatorio').parent().siblings().focusin(function(){
	$(this).attr('required','required');
    }).focusout(function(){
	if($(this).val()==''){
	    $(this).removeAttr('required','required');
	}
    });

  

    $('[class*="autocomplete"]').focusin(function(){
	$(this).attr('required',true);
    }).focusout(function(){
	if($(this).val()==''){
	    $(this).removeAttr('required');
	    
	}
    });

/** SUMIR COM MENSAGEM DO CONTROLLER **********************************/
    $('#flashMessage').fadeOut(7000);

/** FUNÇÃO QUE IMPEDE DIGITAR LETRAS NA INPUT *************************/
    $(".Nao-Letras").on("keypress",function(event){
	    var charCode = event.keyCode || event.which;

	    if (!((charCode>47)&&(charCode<58) || (charCode==8) || (charCode==9))){return false;}else{return true}
    });

});
