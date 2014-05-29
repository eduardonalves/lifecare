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
			    $("#myModal_add-produtos_add").modal('show');
			}
	});


/********************* Preencher Dados Fornecedor *********************/    
	var in_fornecedor = 0;
    $("#bt-adicionarFornecedor").click(function(){		
		$("#msgValidaParceiro").hide();
		
		valorForncedor = $("#add-fornecedor option:selected").attr('id');
		valorCpfCnpj = $("#add-fornecedor option:selected").attr('data-cpf');
		valorNome = $("#add-fornecedor option:selected").attr('data-nome');
		valorStatus = $("#add-fornecedor option:selected").attr('data-status');

		//Adiciona os valores na tabela pra visualização
		$('#tbl_fornecedores').append('<tr class="fornecedorTr_'+in_fornecedor+'"><td>'+valorNome+'</td> <td>'+valorCpfCnpj+'</td> <td>'+valorStatus+'</td> <td><img title="Remover" alt="Remover" src="/lifecare/app/webroot/img/lixeira.png" id=excluir_'+in_fornecedor+' class="btnRemoveForne"/></td></tr>');
		
		//SETA AS INPUT HIDDEN	
		$('#area_inputHidden').append('<section id="fornecedor_'+in_fornecedor+'"><input name="data[ComoperacaosParceirodenegocio]['+in_fornecedor+'][parceirodenegocio_id]" step="any" class="existe" id="fornecedor'+in_fornecedor+'" value="'+valorForncedor+'" type="hidden"></section>');

		in_fornecedor++;
    }); 
    
/********************* Preencher Dados Produtos *********************/    
    var in_produto = 0;
    var valorTotal = 0;
    
    $("#bt-adicionarProduto").click(function(){		
		
		if($(".autocompleteProduto input").val() == ''){
			alert('');
		}else if($("#produtoQtd").val() == ''){
			alert('');
		}else{
			valorNome = $("#add-produtos option:selected" ).val();
			valorId = $("#add-produtos option:selected" ).attr('id');
			valorQtd = $("#produtoQtd").val();
			valorObs = $("#produtoObs").val();		
			
				
			//Adiciona os valores na tabela pra visualização
			$('#tbl_produtos').append('<tr class="produtoTr_'+in_produto+'"><td>'+valorNome+'</td> <td>'+valorQtd+'</td> <td>'+valorObs+'</td> <td><img title="Remover" alt="Remover" src="/lifecare/app/webroot/img/lixeira.png" id=excluir_'+in_produto+' class="btnRemoveProdu"/></td></tr>');
			
			//SETA AS INPUT HIDDEN	
			$('#area_inputHidden_Produto').append('<section class="section_produto" id="produtoHi_'+in_produto+'"><input name="data[Comitensdaoperacao]['+in_produto+'][produto_id]" step="any" class="existe" id="produto_id_'+in_produto+'" value="'+valorId+'" type="hidden"><input name="data[Comitensdaoperacao]['+in_produto+'][qtde]" step="any" class="existe" id="produto_qtd_'+in_produto+'" value="'+valorQtd+'" type="hidden"> <input name="data[Comitensdaoperacao]['+in_produto+'][obs]" step="any" class="existe" id="produto_obs_'+in_produto+'" value="'+valorObs+'" type="hidden"></section>');
			
			//Limpa as Input's
			$("#add-produtos").val('');
			$(".autocompleteProduto input").val('');
			$("#produtoUnit").val('');
			$("#produtoQtd").val('');
			$("#produtoObs").val('');		
			
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
	});
	
/********************* REMOVER Fornecedor *********************/    
	var inicio = 0;
	var fim = 0;
	$('body').on('click','.btnRemoveForne',function(){
		id = $(this).attr('id');
		atual = id.substr(8);
		$('#tbl_fornecedores .fornecedorTr_'+atual).remove();
		$('#area_inputHidden #fornecedor_'+atual).remove();
	});
	
	
/**** VALIDAÇÔES *****/
	
	// DATA INICIO E FIM
	$("#ComoperacaoDataFim").focusout(function(){
		if(validacaoEntreDatas($("#ComoperacaoDataInic").val(),$("#ComoperacaoDataFim").val(),"#msgDataVencimentoInvalida")){
			$("#ComoperacaoDataFim").val("");
			$("#ComoperacaoDataFim").addClass('shadow-vermelho');
		}
		
	});




});

















