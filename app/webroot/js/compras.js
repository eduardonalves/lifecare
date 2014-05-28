 $(document).ready(function() {

 
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
		$('#tbl_fornecedores').append('<tr><td>'+valorNome+'</td> <td>'+valorCpfCnpj+'</td> <td>'+valorStatus+'</td> <td></td></tr>');
		
		//SETA AS INPUT HIDDEN	
		$('#area_inputHidden').append('<section class="fornecedor.'+in_fornecedor+'"><input name="data[Comitensdaoperacaos]['+in_fornecedor+'][parceirodenegocio_id]" step="any" class="existe" id="fornecedor'+in_fornecedor+'" value="'+valorForncedor+'" type="hidden"></section>');

		
		in_fornecedor++;
    }); 
    
/********************* Preencher Dados Produtos *********************/    
    $("#bt-adicionarProduto").click(function(){		
		$("#msgValidaParceiro").hide();
		
		valorId = $("#add-produtos option:selected" ).val();
		valorNome = $("#add-produtos option:selected" ).attr('data-nome');
		valorQtd = $("#produtoQtd").val();
		valorObs = $("#produtoObs").val();		
		

		//Adiciona os valores na tabela pra visualização
		$('#tbl_produtos').append('<tr><td>'+valorNome+'</td> <td>'+valorQtd+'</td> <td>'+valorObs+'</td> <td> </td></tr>');
	});
	
});

















