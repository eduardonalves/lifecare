$(document).ready(function() {
	
	$('#previsao_entrega').mask('99/99/9999');
	
	function insereCredito(valor){
		$('#creditoClienteHide').val(valor);
		$('#creditoCliente').val('R$ ' + valor);
		//$("#creditoCliente").val(valor);
	}
    
	function calculaCredito(total,credito){
		sobra = credito - total ;
		return sobra.toFixed(2);
	}
	
	function calculaDesconto(valor,desconto,mensagem){
		desconto = parseFloat(desconto.split('.').join('').replace(',','.'));
		if(desconto > 0 && desconto < valor){
			novo_total = valor - desconto;
			//alert(novo_total);
			$('#totalProdutoHide').val(novo_total);
			$('#valorPedido').val(novo_total);
			$('#totalProduto').val('R$ '+float2moeda(novo_total));
		}else if(desconto == 0 || desconto == ''){
			$('#totalProdutoHide').val($('#ValorOriginal').val());
			$('#valorPedido').val($('#ValorOriginal').val());
			$('#totalProduto').val('R$ '+float2moeda($('#ValorOriginal').val()));
		}else if(valor > 0 && desconto > valor){
			$(mensagem).show();
			$('#valorDescontoHide').val('');
			$('#valorDesconto').val('');
		}
		
		
	}
/*** AUTO COMPLETE VENDEDOR *******************************************/	
	$('#valorDesconto').focusout(function(){
		desc = $("#valorDesconto").val();
		$('#valorDescontoHide').val(desc);
		total = $('#totalProdutoHide').val();
		calculaDesconto(total,desc,'#spanMensagemDescontoFocus');	
	});


/*** AUTO COMPLETE VENDEDOR *******************************************/	
	
	$(function() {
		$( "#add-vendedor" ).combobox();
    });
    
    $("#bt-preencherVendedor").click(function(){

		$("#msgValidaParceiro").hide();
		
		valorVendedor =	$("#add-vendedor option:selected" ).val();
		valorNome= $("#add-vendedor option:selected" ).attr('id');

		if(!valorVendedor == ""){
			if(valorVendedor=="add-preencherVendedor"){

			}else{
				$(".autocompleteVendedor input").val('');
				$(".autocompleteVendedor input").removeAttr('required','required');
				$("#vendedorId_hidden").val(valorVendedor);
				$("#nome_vendedor").text(valorNome);
				$('.hideMsg').hide();
			}
		}else{
			$('#msgVendedorVazio').show();		
		}
		
		
    });
	
/*** AUTO COMPLETE CLIENTE*********************************************/	

	$(function() {
		$( "#add-cliente" ).combobox();
    });
    
   $("#bt-preencher_Cliente").click(function(){
	   
	 
		
		valorCliente =	$("#add-cliente option:selected" ).val();
		valorCpfCnpj= $("#add-cliente option:selected" ).attr('class');
		valorNome= $("#add-cliente option:selected" ).attr('id');
		valorLimiteCredito = parseFloat($("#add-cliente option:selected").attr('data-limite'));
		totalLimiteCredito = parseFloat(valorLimiteCredito).toFixed(2);
		
		if($('#totalProdutoHide').val() == ''){
			if(totalLimiteCredito != ''){  //VERIFICA CREDITO
				insereCredito(totalLimiteCredito);		
			}else{
				insereCredito(0.00);		
			}			
		}else{
			if(valorLimiteCredito != ''){
				var credito = calculaCredito( parseFloat($('#totalProdutoHide').val()),valorLimiteCredito);
				insereCredito(credito);
			}else{
				credito = calculaCredito( parseFloat($('#totalProdutoHide').val()),0.00);
				insereCredito(credito);
			}	
		}

		
		if(!valorCliente==""){
			if(valorCliente=="add-Cliente"){
				}else{
					$(".autocompleteCliente input").val('');
					$(".autocompleteCliente input").removeAttr('required','required');
				
					$("#parceiro_id").val(valorCliente);
					$("#cpfcnpj_parceiro").text(valorCpfCnpj);
					$("#nome_parceiro").text(valorNome);
					$("#valorCreditoClienteAux").val(totalLimiteCredito).priceFormat({
							prefix: '',
							centsSeparator: ',',
							centsLimit: 2,
							thousandsSeparator: '.',
						});
						
					valorCreditoClienteAux = $("#valorCreditoClienteAux").val();
					$("#credito_cliente").text(valorCreditoClienteAux);
					$('.hideMsg').hide();
				}
				
		}else{
			$('#msgClienteVazio').show();			
		}
	});
	
	$('body').on('click', '#ui-id-2 a',function(){
		valorCad= $(this).text();
		if(valorCad=="Cadastrar"){
			$(".autocompleteCliente input").val('');
			$("#myModal_add-parceiroFornecedor").modal('show');
			$("#spanClienteCPFExistente").hide();
		}
	});


/**** FUNÇÔES **/

	function float2moeda(num){
		
		if(num>0){
			num = Math.abs(num);
			x = 1;
		}
		
		if(isNaN(num)){	num = 0; }
		
		cents = Math.floor((num*100+0.5)%100); 2,005
		num = Math.floor((num*100+0.5)/100).toString(); 2,005
		
		if(cents < 10) { cents = "0" + cents; }
									
		for(var i = 0; i < Math.floor((num.length - (1+i))/3); i++){
			num = num.substring(0,num.length - (4*i+3)) + '.' + num.substring(num.length - (4*i+3));
		}
		
		ret = num + ',' + cents;
		return ret;
	}
 

/********************* Autocomplete Produtos *********************/
    $(function(){
		$("#add-produtos").combobox();
	});
	
	var bloqueia = function(){
		 $('#add-produtos option').each(function(){
			status = $(this).attr('data-bloq');
			texto = $(this).text();
			if(status == "bloqueado"){
				$('#ui-id-3 li a').each(function(){
					if($(this).text() == texto){
						$(this).css('background','#ccc');
						$(this).addClass('bloqueado');
					}
				});
			}
		});
	};
	
	$('body').on('keyup','.autocompleteProduto input',function(){ bloqueia(); });	
	$('body').on('click','.autocompleteProduto .custom-combobox-toggle',function(){ bloqueia(); });

/**************** Modal Produtos *****************/
    $('body').on('click', '#ui-id-3 a',function(){
		valorCad= $(this).text();
		if(valorCad=="Cadastrar"){
		    $(".autocompleteProduto input").val('');
		    $("#myModal_add-produtos").modal('show');
		}else if($(this).hasClass('bloqueado')){
			alert('Produto Bloqueado!');
			$(".autocompleteProduto input").val('');			
		}else{
			valorUnid = $("#add-produtos option:selected" ).attr('data-unidade');
			valorVenda = $("#add-produtos option:selected" ).attr('data-preVenda');
			$("#valorNormal").val(float2moeda(valorVenda));
			$('#produtoUnid').val(valorUnid);			

			if($("#add-produtos option:selected" ).attr('data-estoque') != ''){
				estoque = parseInt($("#add-produtos option:selected" ).attr('data-estoque'));
			}else{ estoque = 0;	}
			if($("#add-produtos option:selected" ).attr('data-reversa') != ''){
				reserva = parseInt($("#add-produtos option:selected" ).attr('data-reserva'));
			}else{ reserva = 0; }
			
			visualDisponivel = estoque - reserva;
			
			if(visualDisponivel>0){
				$("#qtd_dispo_prod").val(visualDisponivel);	
			}else{				
				$("#qtd_dispo_prod").val(0);	
			}
		}
	});
	

/********************* Preencher Dados Fornecedor *********************/    
	var in_fornecedor = 0;
    $("#bt-adicionarFornecedor").click(function(){		

		if($(".autocompleteFornecedor input").val() == ''){
			$('#msgValidaFor').show();
		}else{
			valorForncedor = $("#add-fornecedor option:selected").attr('id');
			valorCpfCnpj = $("#add-fornecedor option:selected").attr('data-cpf');
			valorNome = $("#add-fornecedor option:selected").attr('data-nome');
	
			//Adiciona os valores na tabela pra visualização
			$('#tbl_fornecedores').append('<tr class="fornecedorTr_'+in_fornecedor+'"><td>'+valorNome+'</td> <td>'+valorCpfCnpj+'</td> <td class="confirma"><img title="Remover" alt="Remover" src="/app/webroot/img/lixeira.png" id=excluir_'+in_fornecedor+' class="btnRemoveForne"/></td></tr>');
			
			//SETA AS INPUT HIDDEN	
			$('#area_inputHidden').append('<section id="fornecedor_'+in_fornecedor+'"><input name="data[Parceirodenegocio]['+in_fornecedor+'][parceirodenegocio_id]" step="any" class="existe" id="fornecedor'+in_fornecedor+'" value="'+valorForncedor+'" type="hidden"></section>');
			
			//Limpa as Input's
			$("#add-fornecedor").val('');
			$(".autocompleteFornecedor input").val('');
			
			if($(this).hasClass('pedidosLimite')){
				$(this).hide();
				$(".autocompleteFornecedor").hide();
				$("#tblPedido").css('margin-top','10px');
			}

			in_fornecedor++;			
		}
    }); 
    
/********************* Preencher Dados Produtos *********************/    
    var in_produto = 0;
    var valorTotal = 0;

    
    $("body").on('click','#bt-adicionarProduto',function(){		
			
		if($(".autocompleteProduto input").val() == ''){
			$('#msgValidaProduto').show();
		}else if($("#produtoQtd").val() == ''){
			$('#msgQtdVazia').show();
/*
		}else if($("#produtoQtd").val() > $("#qtd_dispo_prod").val()){
			$('#msgQtdVazia1').show();
*/
		}else if (parseInt($("#add-produtos option:selected" ).attr('data-quantidade-valida')) < parseInt($("#produtoQtd").val())) {

			$('#msgQtdIndisponivel').show();


		}else{
			valorNome = $("#add-produtos option:selected" ).attr('data-nome');
			valorId = $("#add-produtos option:selected" ).attr('id');
			valorUnid = $("#add-produtos option:selected" ).attr('data-unidade');
			valorQtd = $("#produtoQtd").val();
			valorObs = $("#produtoObs").val();	
			valorUnit = $("#produtoValor").val();		
			
			valorNormal = parseFloat($("#valorNormal").val().split('.').join('').replace(',','.'));	
			valorVenda = parseFloat($("#produtoValor").val().split('.').join('').replace(',','.'));
			if(isNaN(valorVenda) || valorVenda == 0){
				$('#spanVendaMenor2').show();
			}else if(valorVenda < valorNormal){
				$('#spanVendaMenor').show();
			}else{				
				//CALCULA O VALOR TOTAL 
				valorTotal = 0;
				if($("#produtoValor").val() != ''){
					qtd = parseInt(valorQtd);
					valor = $("#produtoValor").val().split('.').join('').replace(',','.');
					valor = parseFloat(valor);
					valorTotal = valor*qtd;
					valorMoeda = float2moeda(valorTotal);
					valorUnit = float2moeda(parseFloat(valorUnit));
					
					if($('#creditoClienteHide').val() != ''){
						var credito = calculaCredito(valorTotal,parseFloat($('#creditoClienteHide').val()));
						insereCredito(credito);
					}else{
						$("#totalProdutoHide").val(valorTotal);		
						$("#totalProduto").val(valorTotal);	
						$("#totalProduto").priceFormat({
							allowNegative: true,
							prefix: 'R$ ',
							centsSeparator: ',',
							thousandsSeparator: '.',
							limit: 15
						});		
					}
					
				}else{
					valorMoeda = '0,00';
					valorUnit = '0,00';
					valorTotal = '0,00';
				}
				
				valorVendaAux = valorVenda;
				
				//Adiciona os valores na tabela pra visualização
				$('#tbl_produtos').append('<tr class="produtoTr_'+in_produto+'">\
						\
						<td class="whiteSpace">\
								<span title="'+valorNome+'">'+valorNome+'</span>\
								<input name="data[Comitensdaoperacao]['+in_produto+'][produto_id]" step="any" class="existe" value="'+valorId+'" type="hidden">\
							\
						</td>\
						\
						<td>\
							<input name="data[Comitensdaoperacao]['+in_produto+'][qtde]" step="any" class="inputEditavel'+in_produto+' qtdE existe tamanho-pequeno borderZero" id="itenQtd'+in_produto+'" value="'+valorQtd+'" type="text" readonly="readonly" onfocus="this.blur();" style="text-align:center;">\
							<span id="msgValidaQtde'+in_produto+'" class="Msg-tooltipDireita" style="display:none;left: 350px;">Preencha a Quantidade do Produto</span>\
						</td>\
						\
						<td>'+valorUnid+'</td>\
						<td>\
							<input step="any" id="vuVisible'+in_produto+'"  class="valorUnit existe tamanho-medio borderZero" value="'+valorVenda+'" type="text" readonly="readonly" onfocus="this.blur();" style="text-align:center;">\
							<input name="data[Comitensdaoperacao]['+in_produto+'][valor_unit]" id="vU'+in_produto+'" step="any" class="valorUnit existe tamanho-medio borderZero" value="'+valorVenda+'" type="hidden" readonly="readonly" onfocus="this.blur();" style="text-align:center;">\
						</td>\
						<td><span id="spanValTotal'+in_produto+'">R$ '+valorMoeda+'</span>\
							<input name="data[Comitensdaoperacao]['+in_produto+'][valor_total]" step="any" class="existe TotalPedido" id="valorTotal'+in_produto+'" value="'+valorMoeda+'" type="hidden">\
						</td>\
						<td><input name="data[Comitensdaoperacao]['+in_produto+'][obs]" step="any" class="inputEditavel'+in_produto+' existe tamanho-medio borderZero" value="'+valorObs+'" type="text" readonly="readonly" onfocus="this.blur();" style="text-align:center;"></td>\
						\
						<td class="confirma">\
							<span id="spanStatus'+in_produto+'" class="fechado" style="display:none;"></span>\
							<img title="Editar" alt="Editar" src="/app/webroot/img/botao-tabela-editar.png" id="editi'+in_produto+'" class="btnEditi" />\
							<img title="Confirmar" alt="Confirmar" src="/app/webroot/img/bt-confirm.png" id="confir'+in_produto+'" class="btnConfirm" style="display:none;"  />\
							<img title="Remover" alt="Remover" src="/app/webroot/img/lixeira.png" id="excluirP_'+in_produto+'" class="btnRemoveProdu"/>\
						</td>\
					</tr>');
					
					$("#vuVisible"+in_produto).priceFormat({
						prefix: 'R$ ',
						centsSeparator: ',',
						thousandsSeparator: '.',
						limit: 15
					});
					
					$("#vU"+in_produto).priceFormat({
						prefix: '',
						centsSeparator: ',',
						thousandsSeparator: '.',
						limit: 15
					});	
				
				//Limpa as Input's
				$("#add-produtos").val('');
				$(".autocompleteProduto input").val('');
				$("#produtoUnit").val('');
				$("#produtoQtd").val('').removeAttr('required');
				$("#produtoObs").val('');	
				$('#produtoUnid').val('');
				$("#produtoValor").val('');
				$("#valorNormal").val('');
				$("#qtd_dispo_prod").val('');
				in_produto++;
				
				calculaTotal('TotalPedido');
				calculaDesconto($('#totalProdutoHide').val(),$('#valorDesconto').val(),'#spanMensagemDescontoFocus');
			}
		}
	});


/********************* REMOVER Produtos *************************/    
	var inicio = 0;
	var fim = 0;
	$('body').on('click','.btnRemoveProdu',function(){
		id = $(this).attr('id');
		atual = id.substr(9);
		$('#tbl_produtos .produtoTr_'+atual).remove();
		$('#area_inputHidden_Produto #produtoHi_'+atual).remove();
		calculaTotal('TotalPedido');
	
		classTR = $('#tbl_produtos tr[class*=produtoTr_]').last().attr('class');
		if(classTR == undefined){
			in_produto = 0;
		}else{
			nTr = classTR.substr(10);
			nTr = parseInt(nTr) + 1;
			in_produto = nTr;
		}
	});
	
/********************* REMOVER Fornecedor *********************/    
	var inicio = 0;
	var fim = 0;
	$('body').on('click','.btnRemoveForne',function(){
		id = $(this).attr('id');
		atual = id.substr(8);
		$('#tbl_fornecedores .fornecedorTr_'+atual).remove();
		$('#area_inputHidden #fornecedor_'+atual).remove();
		
		$('.pedidosLimite').show();
		$(".autocompleteFornecedor").show();
		$("#tblPedido").css('margin-top','25px');
		in_fornecedor = 0;
	
	});
	
	
/**************Valor Pedido*****************/

/******** TELA DE CONFIRMACAO   ************/
	$('#confirmaDados').click(function(){
		var valorTot= $("#totalProdutoHide").val();
		$('#valorPedido').val(valorTot);
		if($('.dataInicio').val() == ''){
			$('#msgDataInicial').show();
			
		}else if($('#vendedorId_hidden').val() == ''){
			
			$('#msgVendedorVazio').show();
			
		}else if($('#parceiro_id').val() == ''){
			
			$('#msgClienteVazio').show();
			
		}else if(in_produto <= 0){
			$('#msgValidaProduto').show();
		}else{
			if($('span[id*=spanStatus]').hasClass('aberto')){
				$('#msgValidaConfirmaProduto').show();
			}else{
								
				$('#inputNormais').hide();
				if($('#normalVale  option:selected').val() == 0){
					$('#tipoVale').val('Comum');
				}else{
					$('#tipoVale').val('Vale');
				}
				$('#frmPgto').val($('#normalFrm  option:selected').val());
				$('#inputConfirma').show();
				
				//
				$('span[id*="msg"]').hide();
				$('.confirmaInput').attr('readonly','readonly');
				$('.confirmaInput').attr('onfocus','this.blur();');
				//$('.confirmaInput').attr('disabled','disabled');
				$('.confirmaInput').addClass('borderZero');
				$('#confirmaDados').hide();
				$('.confirma').hide();
				$('.bt-salvar').show();
				$('#voltar').show();
			}
		}	
		
	});

/******** VOLTAR DA CONFIRMACAO   ************/
	$('#voltar').click(function(){
		$('#inputNormais').show();
		$('#inputConfirma').hide();
		$('span[id*="msg"').hide();
		$('.confirmaInput').removeAttr('readonly','readonly');
		$('.confirmaInput').removeAttr('onfocus','this.blur();');
		$('.confirmaInput').removeAttr('disabled','disabled');
		$('.confirmaInput').removeClass('borderZero');
		$('#confirmaDados').show();
		$('.confirma').show();
		$('.bt-salvar').hide();
		$('#voltar').hide();
	});
	
	$('#PedidoAddForm').submit(function(){	
		$('.confirmaInput').removeAttr('disabled','disabled');
	});
	
	$('#PedidoAddForm').bind("keyup keypress", function(e) {
	  var code = e.keyCode || e.which; 
		if (code  == 13) {               
			e.preventDefault();
			return false;
		}
	});
	
/******** FUNCAO CONFIRMAR  ***********************/	
	$('body').on('click','.btnConfirm',function(){
		id = $(this).attr('id');
		nId = id.substring(6);
		
		$('.Msg').hide();

		if($('#itenQtd'+nId).val() == ''){
			$('#msgValidaQtde'+nId).show();			
		}else{			
			
			$('#spanStatus'+nId).removeClass('aberto');	
			$('#spanStatus'+nId).addClass('fechado');
		
			$('#editi'+nId).show();
			$('#excluirP_'+nId).show();
			$('.produtoTr_'+nId+' input').attr('readonly','readonly');
			$('.produtoTr_'+nId+' input').attr('onfocus','this.blur();');
			$('.produtoTr_'+nId+' input').addClass('borderZero');
			$(this).hide();
			
			calculaTotal('TotalPedido');
			
			if($('#creditoClienteHide').val() != ''){
				$('#creditoClienteHide').val('');
				var credito = calculaCredito(parseFloat($('#totalProdutoHide').val()),parseFloat($('#creditoClienteHide').val()));
				insereCredito(credito);
			}
		}
	});
	
/******** FUNCAO EDITAR   **************************/
	$('body').on('click','.btnEditi',function(){
		id = $(this).attr('id');
		nId = id.substring(5);	
		
		$(this).hide();
		$('#excluirP_'+nId).hide();
		$('#confir'+nId).show();
		
		$('#spanStatus'+nId).removeClass('fechado');	
		$('#spanStatus'+nId).addClass('aberto');	
		
		$('.Msg').hide();			
		
		$('.inputEditavel'+nId).removeAttr('readonly','readonly');
		$('.inputEditavel'+nId).removeAttr('onfocus','this.blur();');
		$('.inputEditavel'+nId).removeClass('borderZero');		
	});

	function calculaTotal(classe){
		var totalPedido = 0;
		$('.'+classe).each(function(){			
			valor = $(this).val().split('.').join('').replace(',','.');
			valor = parseFloat(valor);		
			totalPedido += valor;
		});
		$('#totalProduto').val('R$ '+float2moeda(totalPedido));
		$('#totalProdutoHide').val(totalPedido);
		$('#valorPedido').val(totalPedido);
		$('#ValorOriginal').val(totalPedido);
		
	}

/******** CALCULO VALOR UNITARIO   **************************/
	$('body').on('focusout','.valorUnit',function(){
		id = $(this).attr('id');
		nId = id.substring(2);		
		
		itenQtd = $('#itenQtd'+nId).val();
		qtd = parseInt(itenQtd);
		
		valor = $(this).val().split('.').join('').replace(',','.');
		valor = parseFloat(valor);
		
		total = valor*qtd;
		
		$('#valorTotal'+nId).val(float2moeda(total));
		if(total != '' && total != 'undefined' && total){
			$('#spanValTotal'+nId).text("R$ "+float2moeda(total));
		}else{
			$('#spanValTotal'+nId).text("R$ 0,00");
		}		
	});
	

	$('body').on('focusout','.qtdE',function(){
		id = $(this).attr('id');
		nId = id.substring(7);	
		
		itenQtd = $(this).val();
		qtd = parseInt(itenQtd);
		
		valor = $('#vU'+nId).val().split('.').join('').replace(',','.');
		valor = parseFloat(valor);
		
		total = valor*qtd;
		
		$('#valorTotal'+nId).val(float2moeda(total));
		
		if(total != '' && total != 'undefined' && total){
			$('#spanValTotal'+nId).text("R$ "+float2moeda(total));
		}else{
			$('#spanValTotal'+nId).text("R$ 0,00");
		}		
	});	
});
