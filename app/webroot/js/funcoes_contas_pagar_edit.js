 $(document).ready(function() {

    $('input').focus(function(){
		$('.ui-autocomplete-input').attr('tabindex','3');
    });
    
    $("body").on('focus','.ui-autocomplete-input',function(){
		$('.ui-autocomplete-input').attr({required:true});
	});


/********* Função Editar da tabela ******************/    
    
	var id=0;
	var flag =0;
    $("body").on("click",'.btnEditar', function(e){
		flag = 1;
		$('span[id*="msg"').hide();
		var id = $(this).attr('id');
		id = id.substr(9);
		$('.linhaParcela'+id).each(function(){			
			$('.linhaParcela'+id+' input, #dupli'+id+'').removeAttr("allowEmpty");
			$('.linhaParcela'+id+' input, #dupli'+id+'').removeAttr("readonly");
			$('.linhaParcela'+id+' input, #dupli'+id+'').removeAttr("onFocus");
			$('.linhaParcela'+id+' #dupli'+id+'').removeAttr("disabled");
			$('.linhaParcela'+id+' input, #dupli'+id+'').removeClass("borderZero");	
		});	
		
		$('#btnEditar'+id).hide();
		$("#btnEditarOk"+id).show();
		$('span[id*="msg"').hide();
    });

//FINALIZA EDIÇÂO DA PARCELA NA TABELA
	$("body").on("click",'.btnEditarOk', function(e){
		
		flag=0
		var id = $(this).attr('id');
		id = id.substr(11);
		
		$('span[id*="msg"').hide();
				
		//VALIDAÇÂO DA EDIÇÂO
		if($('.vencimento'+id).val() ==''){ //VERIFICA DATA DE VENCIMENTO VAZIA
			$('#msgDataVazia'+id).show();
		}else if(validacaoEntreDatas($('.Emissao').val(),$('.vencimento'+id).val(),"#msgValidaDataVencimento"+id)){//VERIFICA DATA DE VENCIMENTO < EMISSAO
			$('.vencimento'+id).val('');
			$('.vencimento'+id).addClass('shadow-vermelho');
		}else if($('#valorPagar'+id).val() == '' || $('#valorPagar'+id).val() == "0,00"){ //VERIFICA VALOR A PAGAR VAZIO ou IGUAL A ZERO
			$('#msgValorVazia'+id).show();
		}else{		// DESABILITA A EDIÇÂO DAS INPUTSSS
			$('.linhaParcela'+id).each(function(){			
				$('.linhaParcela'+id+' input, #dupli'+id+'').attr("allowEmpty","false");
				$('.linhaParcela'+id+' input, #dupli'+id+'').attr("readonly","readonly");
				$('.linhaParcela'+id+' input, #dupli'+id+'').attr("onFocus","this.blur();");
				$('.linhaParcela'+id+' #dupli'+id+'').attr("disabled","disabled");
				$('.linhaParcela'+id+' input, #dupli'+id+'').addClass("borderZero");
				var dupliVal = $('.linhaParcela'+id+' #dupli'+id+' :selected').val();	
				var dupliText = $('.linhaParcela'+id+' #dupli'+id+' :selected').text();	
				$('#duplica'+id).val(dupliVal);
			});	
			$('#btnEditar'+id).show();
			$("#btnEditarOk"+id).hide();
		}
		
	
		//CALCULO PARCELAs
		var valorTotal = 0;
		$('.valorParcelaSoma').each(function(){
			valorAux = $(this).val().split('.').join('').replace(',','.');
			valorAux = parseFloat(valorAux);
			valorTotal += valorAux;		
		});
		
		//CALCULO JUROS
		var valorJuros = 0;
		$('.valorJurosSoma').each(function(){
			valorAux = $(this).val().split('.').join('').replace(',','.');
			valorAux = parseFloat(valorAux);
			valorJuros += valorAux;		
		});
		
		//CALCULO DESCONTO
		var valorDesconto = 0;
		$('.valorDesconto').each(function(){
			valorAux = $(this).val().split('.').join('').replace(',','.');
			valorAux = parseFloat(valorAux);
			valorDesconto += valorAux;		
		});
		
		var valorFinal = valorTotal+valorJuros;
		
		if($('#TipodecontaTipo').val()=="RECEITA"){
			
			$('#ContasreceberValor').val(valorFinal.toFixed(2)).priceFormat({
							prefix: '',
							centsSeparator: ',',
							thousandsSeparator: '.',
						});
			
			
		}else{
			
			$('#ContaspagarValor').val(valorFinal.toFixed(2)).priceFormat({
							prefix: '',
							centsSeparator: ',',
							thousandsSeparator: '.',
						});
		}
		flag = 0;
		
    });

/**************** FORM SUBMIT *****************/

	$("#ContaspagarEditForm, #ContaspagarEditForm").submit(function(){
		
		var erroData=0; 	var erroValor=0;
		
		$('.vencimento').each(function(){ 
				if($(this).val()==''){erroData++;	}
		});		
		
		$('.valorParcelaSoma').each(function(){
			if($(this).val()=='' || $(this).val()== '0,00'){erroValor++;}
		});
		
		if($('#ContaspagarDataEmissao').val() == ''){
			$("#msgDataEmissao").show();
			$('#ContaspagarDataEmissao').focus();			
			return false;
		}else if(flag==1){
			$("#msgFlag").show();
			return false;
		}else if(erroData!=0){
			alert('alguma data vazia!');
			return false;
		}else if(erroValor!=0){
			alert('alguma valor vazio!');
			return false;
		}else{
			return true;
		}			
	});



/**************** Modal Parceiro de negocio tipo cliente *****************/
    $('body').on('click', '#ui-id-1 a',function(){
	valorCad= $(this).text();
	if(valorCad=="Cadastrar"){
	    $(".autocompleteFornecedor input").val('');
	    $("#myModal_add-parceiroFornecedor").modal('show');
	}

    });
    
  /**************** Modal Tipo Conta *****************/
    $('body').on('click', '#ui-id-2 a',function(){
	valorCad= $(this).text();
	if(valorCad=="Cadastrar"){
	    $(".autocompleteTipoConta input").val('');
	    $("#myModal_add-tipodeConta").modal('show');
	  //$("#spanClienteCPFExistente").hide();
	}

    });
    
/**************** Modal Centro Custo *****************/
    $('body').on('click', '#ui-id-3 a',function(){
	valorCad= $(this).text();
	if(valorCad=="Cadastrar"){
	    $(".autocompleteCentroCusto input").val('');
	    $("#myModal_add-centro_custo").modal('show');
	  //$("#spanClienteCPFExistente").hide();
	}

    });
    

    
/********************* Preencher tipo de conta *********************/

     $("#bt-preencherTipoConta").click(function(){
	valorNome = $("#add-tipoConta option:selected" ).val();
	valortipoconta = $("#add-tipoConta option:selected" ).attr('id');

	if(!valortipoconta==""){
		if(valortipoconta=="add-tipodeConta"){
			//chama modal cliente
			//$("#myModal_add-cliente").modal('show');
		}else{
		    $(".autocompleteTipoConta input").val('');
		    $(".autocompleteTipoConta input").removeAttr('required','required');
		    
		    $("#ContaspagarTipodecontaId").val(valortipoconta);
		    $("#tipoConta").val(valorNome);
		}
	}

    });
    
    
/********************* Preencher Dados Custo *********************/
  $("#bt-preencherCentreCusto").click(function(){
	valorCusto =	$("#add-custo option:selected" ).attr('id');
	limiteCusto = $("#add-custo option:selected" ).attr('data-limite');
	nomeCusto = $("#add-custo option:selected" ).val();

	if(!valorCusto==""){
		if(valorCusto=="add-centroCusto"){
			//chama modal cliente
			//$("#myModal_add-centro_custo").modal('show');
		}else{
		    $(".autocompleteCentroCusto input").val('');
		    $(".autocompleteCentroCusto input").removeAttr('required','required');
		    
		    $("#ContaspagarCentrocustoId").val(valorCusto);
		    $("#nomeCusto").val(nomeCusto);
		    $("#limitecusto").val(limiteCusto);
		}
	}

    });

/********************* Preencher Dados Fornecedor *********************/    
    $("#bt-preencherFornecedor").click(function(){
		
		$("#msgValidaParceiro").hide();
		valorForncedor=	$("#add-fornecedor option:selected" ).val();
		valorCpfCnpj= $("#add-fornecedor option:selected" ).attr('class');
		valorNome= $("#add-fornecedor option:selected" ).attr('id');

		if(!valorForncedor==""){
			if(valorForncedor=="add-Fornecedor"){
				//chama modal fornecedor
				//$("#myModal_add-fornecedor").modal('show');
			}else{
				$(".autocompleteFornecedor input").val('');
				$(".autocompleteFornecedor input").removeAttr('required','required');
				
				$("#ContaspagarParceirodenegocioId").val(valorForncedor);
				$("#ContaspagarCpfCnpj").val(valorCpfCnpj);
				$("#ContaspagarNome").val(valorNome);
			}
	}

    });
    
/********************* Autocomplete Cliente *********************/
    $(function() {
	$( "#add-fornecedor" ).combobox();

  });
  
/********************* Autocomplete Tipo de Conta *********************/
    $(function() {
	$( "#add-tipoConta" ).combobox();

    });
 
/********************* Autocomplete Centro Custo *********************/
    $(function() {
	$( "#add-custo" ).combobox();

    });

/****************Valida Data Emissão******************************************/
    $("#ContaspagarDataEmissao").focusout(function(){

	var dfuturoSaida = $("#ContaspagarDataEmissao").val();
	var dataFutura = new Date();

	var anoDigitado = dfuturoSaida.split("/")[2];
	var mesDigitado = dfuturoSaida.split("/")[1];
	var diaDigitado = dfuturoSaida.split("/")[0];

	if(dfuturoSaida != ''){
	    if( diaDigitado < 1 || diaDigitado > 31 || mesDigitado < 1 || mesDigitado > 12 || anoDigitado <1900 || dfuturoSaida.length < 6 ){ 
		$("#msgDataEmissaoInvalida").css("display","block");   
		$("#ContaspagarDataEmissao").addClass('shadow-vermelho');
		$("#ContaspagarDataEmissao").val("");    
	    }else{		    
		$("#ContaspagarDataEmissao").removeClass('shadow-vermelho');
		$("#msgDataEmissaoInvalida").css("display","none");  
		
	    }
	}
	
    });
    
/****************Valida Data Vencimento******************************************/
    $("#ContaspagarDataVencimento").focusout(function(){
	
	var dfuturoSaida = $("#ContaspagarDataVencimento").val();
	var dataFutura = new Date();
	
	var anoDigitado = dfuturoSaida.split("/")[2];
	var mesDigitado = dfuturoSaida.split("/")[1];
	var diaDigitado = dfuturoSaida.split("/")[0];

	if(dfuturoSaida != ''){
	    if( diaDigitado < 1 || diaDigitado > 31 || mesDigitado < 1 || mesDigitado > 12 || anoDigitado <1900 || dfuturoSaida.length < 6 ){ 
		$("#msgDataVencimentoInvalida").css("display","block");   
		$("#ContaspagarDataVencimento").addClass('shadow-vermelho');
		$("#ContaspagarDataVencimento").val("");    
	    }else{		    
		$("#ContaspagarDataVencimento").removeClass('shadow-vermelho');
		$("#msgDataVencimentoInvalida").css("display","none");  
		
	    }
	}
	
    });

/****************** Tipo de pagamento *************************/
    $('#Pagamento0TipoPagamento').change(function(){
	    $('input[name*="parcela"]').val('');
	    $('#Pagamento0FormaPagamento').val('');
	    $('[id*="editarConta"]').hide();
	    $('[id*="bt-adicionarConta"]').show();
	    $('.tela-resultado-field').show();
	    $('#Pagamento0NumeroParcela').val(0);
	    $('#ContaspagarParcela').val(1);
	    $('.btnExcluir').trigger('click');
	    
    });    
	    
    

/*********** Tira virgula e coloca ponto antes do submit ***********/	
	$('#btn-salvarContaPagar').click(function(){
	    
	    //pega valor
	    ContaValorAux = $('#ContaspagarValor').val();
	    
	    //retira a virgula
	    $('input[id="ContaspagarValor"]').val(ContaValorAux.split('.').join('').replace(',','.'));
	    
	    $('#ContaspagarDataEmissao').prop('disabled', false);
	});

});
