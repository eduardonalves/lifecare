 $(document).ready(function() {

/**** FUNÇÔES **/

	function float2moeda(num){
		x = 0;
		
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
		if (x == 1){
			 return ret;
		 }
	}
 
/********************* Autocomplete Fornecedor *********************/
    $(function(){
		$("#add-fornecedor").combobox();
	});
	
/********************* Autocomplete Produtos *********************/
    $(function(){
		$("#add-produtos").combobox();
	});

/**************** Modal Parceiro de negocio tipo Fornecedor *****************/
    $('body').on('click', '#ui-id-1 a',function(){
		valorCad= $(this).text();
		if(valorCad=="Cadastrar"){
			$(".autocompleteFornecedor input").val('');
			$("#myModal_add-parceiroFornecedor").modal('show');
		}

    });
    
/**************** Modal Produtos *****************/
    $('body').on('click', '#ui-id-2 a',function(){
		valorCad= $(this).text();
		if(valorCad=="Cadastrar"){
		    $(".autocompleteProduto input").val('');
		    $("#myModal_add-produtos").modal('show');
		}else{
			valorUnid = $("#add-produtos option:selected" ).attr('data-unidade');
			$('#produtoUnid').val(valorUnid);
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
			$('#tbl_fornecedores').append('<tr class="fornecedorTr_'+in_fornecedor+'"><td>'+valorNome+'</td> <td>'+valorCpfCnpj+'</td> <td class="confirma"><img title="Remover" alt="Remover" src="/lifecare/app/webroot/img/lixeira.png" id=excluir_'+in_fornecedor+' class="btnRemoveForne"/></td></tr>');
			
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
		}else{
			valorNome = $("#add-produtos option:selected" ).attr('data-nome');
			valorId = $("#add-produtos option:selected" ).attr('id');
			valorUnid = $("#add-produtos option:selected" ).attr('data-unidade');
			valorQtd = $("#produtoQtd").val();
			valorObs = $("#produtoObs").val();		
			valorUnit = $("#produtoValor").val();		
		
			//CALCULA O VALOR TOTAL 
			valorTotal = 0;
			if($("#produtoValor").val() != ''){
				qtd = parseInt(valorQtd);
				valor = $("#produtoValor").val().split('.').join('').replace(',','.');
				valor = parseFloat(valor);
			
				valorTotal = valor*qtd;
				valorMoeda = float2moeda(valorTotal);
			}else{
				valorMoeda = '0,00';
				valorUnit = '0,00';
			}
			
			
			
			//Adiciona os valores na tabela pra visualização
			$('#tbl_produtos').append('<tr class="produtoTr_'+in_produto+'" data-existe="existe"><td class="whiteSpace"><span title="'+valorNome+'">'+valorNome+'</span></td><td>'+valorQtd+'</td><td>'+valorUnid+'</td><td>R$ '+valorUnit+'</td><td>R$ '+valorMoeda+'</td><td>'+valorObs+'</td> <td class="confirma"><img title="Remover" alt="Remover" src="/lifecare/app/webroot/img/lixeira.png" id=excluir_'+in_produto+' class="btnRemoveProdu"/></td></tr>');
			
			//SETA AS INPUT HIDDEN	
			$('#area_inputHidden_Produto').append('<section class="section_produto" id="produtoHi_'+in_produto+'"><input name="data[Comitensdaoperacao]['+in_produto+'][produto_id]" step="any" class="existe" id="produto_id_'+in_produto+'" value="'+valorId+'" type="hidden"><input name="data[Comitensdaoperacao]['+in_produto+'][qtde]" step="any" class="existe" id="produto_qtd_'+in_produto+'" value="'+valorQtd+'" type="hidden"> <input name="data[Comitensdaoperacao]['+in_produto+'][valor_unit]" step="any" class="existe" id="produto_unit_'+in_produto+'" value="'+valorUnit+'" type="hidden"><input name="data[Comitensdaoperacao]['+in_produto+'][valor_total]" step="any" class="existe" id="produto_total_'+in_produto+'" value="'+valorMoeda+'" type="hidden"><input name="data[Comitensdaoperacao]['+in_produto+'][obs]" step="any" class="existe" id="produto_obs_'+in_produto+'" value="'+valorObs+'" type="hidden"></section>');
			
			//Limpa as Input's
			$("#add-produtos").val('');
			$(".autocompleteProduto input").val('');
			$("#produtoUnit").val('');
			$("#produtoQtd").val('').removeAttr('required');
			$("#produtoObs").val('');	
			$('#produtoUnid').val('');
			$("#produtoValor").val('')
			in_produto++;
		}
	});


/********************* REMOVER Produtos *************************/    
	var inicio = 0;
	var fim = 0;
	$('body').on('click','.btnRemoveProdu',function(){
		id = $(this).attr('id');
		atual = id.substr(8);
		$('#tbl_produtos .produtoTr_'+atual).remove();
		$('#area_inputHidden_Produto #produtoHi_'+atual).remove();
		in_produto = in_produto - 1;
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
	
	

/******** TELA DE CONFIRMACAO   ************/
	$('#confirmaDados').click(function(){
		alert(in_fornecedor+'\n'+$('#validaProd').val());
		if($('.dataInicio').val() == ''){
			$('#msgDataInicial').show();
			
		}else if(in_fornecedor == 0 && $('#validaProd').val() == 0){
			$('#msgValidaFor').show();			
			
		}else if(in_produto == 0){
			$('#msgValidaProduto').show();
						
		}else{
			$('span[id*="msg"').hide();
			$('.confirmaInput').attr('readonly','readonly');
			$('.confirmaInput').attr('onfocus','this.blur();');
			$('.confirmaInput').attr('disabled','disabled');
			$('.confirmaInput').addClass('borderZero');
			$('#confirmaDados').hide();
			$('.confirma').hide();
			$('.bt-salvar').show();
			$('#voltar').show();
		}	
		
	});

/******** VOLTAR DA CONFIRMACAO   ************/
	$('#voltar').click(function(){
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
	
	$('#CotacaoAddForm').submit(function(){	
		$('.confirmaInput').removeAttr('disabled','disabled');
	});

});






















