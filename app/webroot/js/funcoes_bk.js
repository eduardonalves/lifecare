$(document).ready(function() {
	var total=0;
	var i=0;
	var total=0;

	$('.modal').css("display", "none");	
	$(".addItem").bind('click', function(e){
		
		 e.preventDefault();
		 //atribuimos os valores nas variaveis
		 
		 nomeProduto=$('#datalistInput').val();
		 valorUn= $('#valorUnitario').val();
		 qtde=$('#itemQtde').val();
		 valorTotal=valorUn * qtde;
		 total=total + valorTotal;
		 icms=$('#icms').val();
		 ipi=$('#ipi').val();
		 cst=$('#cst').val();
		 $('#EntradaValorTotal').val(total);
		 var codigo;
		 
		 //percorro todas as options do data list para buscar o id que corresponde ao código do produto selecionado no input
		$('#datalistnome option').each(function(index) {
			
		    var name = $(this).val();
		    var id = $(this).text();
		  
			if(nomeProduto == name){
				codigo= id;
				//alert(codigo);
			}

		});
		
		//apaga todos os campos relativos ao item de produto
	 	$('#tableItensEntradas').append('<tr class="clonado'+i+'"><td>'+codigo+'</td><td>'+nomeProduto+'</td><td>'+valorUn+'</td><td>'+qtde+'</td><td id="vlTotal'+i+'">'+valorTotal+'</td><td>'+icms+'</td> <td>'+ipi+'</td><td>'+cst+'</td><td><a href="#" id="clonado'+i+'" class="btnRemItem">remover</a></td></tr>');
		$('#datalistInput').val("");
		$('#valorUnitario').val("");
		$('#itemQtde').val("");
		$('#itemQtde').val("");
		$('#icms').val("");
		$('#ipi').val("");
		$('#cst').val("");
		$("#valorTotal").val(total);
		
		//criação de campos dinamicos dentro do form de cadastro de entradas
		$('fieldset').append('<div class="input number clonado'+i+'" style="position:absolute"><input name="data[Itensentrada]['+i+'][produto_id]" step="any"  id="Itensentrada'+i+'produto_id" value="'+codigo+'" type="hidden"></div>');
		$('fieldset').append('<div class="input number clonado'+i+'" style="position:absolute"><input name="data[Itensentrada]['+i+'][valor_unitario]" step="any"  id="Itensentrada'+i+'ValorUnitario" value="'+valorUn+'" type="hidden"></div>');
		$('fieldset').append('<div class="input number clonado'+i+'" style="position:absolute"><input name="data[Itensentrada]['+i+'][qtde]" step="any"  id="Itensentrada'+i+'qtde" value="'+qtde+'" type="hidden"></div>');
		$('fieldset').append('<div class="input number clonado'+i+'" style="position:absolute"><input name="data[Itensentrada]['+i+'][valor_total]" step="any"  id="Itensentrada'+i+'ValorTotal" value="'+valorTotal+'" type="hidden"></div>');
		$('fieldset').append('<div class="input number clonado'+i+'" style="position:absolute"><input name="data[Itensentrada]['+i+'][valor_icms]" step="any"  id="Itensentrada'+i+'ValorIcms" value="'+icms+'" type="hidden"></div>');
		$('fieldset').append('<div class="input number clonado'+i+'" style="position:absolute"><input name="data[Itensentrada]['+i+'][valor_ipi]" step="any"  id="Itensentrada'+i+'ValorIpi" value="'+ipi+'" type="hidden"></div>');
		$('fieldset').append('<div class="input number clonado'+i+'" style="position:absolute"><input name="data[Itensentrada]['+i+'][valor_st]" step="any"  id="Itensentrada'+i+'ValorSt" value="'+cst+'" type="hidden"></div>');
		i=i+1;
	});

/********************* Campos Dinâmicos Entrada Manual **************************/	
	
	$('body').on('click','.btnRemItem', function(e){
		 e.preventDefault();
		 clone=$(this).attr('id');
		 numero=clone.substr(7);
		 valTot=$('#vlTotal'+numero).text();
		 flvalTot=parseFloat(valTot);
		 total=total-flvalTot;
		 $('#valorTotal').val(total);
		 $('#EntradaValorTotal').val(total);
		 $('.'+clone).remove();

	});
	

	$('#vale').change(function(){
		tipoOperacao=$(this).val();
		if(tipoOperacao == 1){
			$('#tributos').fadeOut('fast');
			$('.imposto').fadeOut('fast');
			$('.imposto').attr('disabled','disabeld');
			$('.imposto').css('display', 'none');
			$('.imposto input').val('');
			
		}else{
			$('#tributos').fadeIn('fast');
			$('.imposto').fadeIn('fast');	
		}
	});
	
	$('#vale').val(0);
	
	$('.avancar').bind('click', function(e){
		e.preventDefault();
		
		id= $(this).attr('id');
		var atual = id.substr(7);
		atualInt=parseInt(atual);
		proximo = atualInt + 1;
		if(proximo <= 3){
			$('.fase').fadeOut('slow');
			$('#fase'+proximo).fadeIn('slow');
		}

	});
	
	$('.voltar').bind('click', function(e){
		e.preventDefault();
		
		id= $(this).attr('id');
		var atual = id.substr(7);
		atualInt=parseInt(atual);
		anterior = atualInt - 1;
		
		if(anterior >= 0){
			$('.fase').fadeOut('slow');
			$('#fase'+anterior).fadeIn('slow');
		}

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
			        
		if( $('#ProdutoCodigo').val() =='' || $('#ProdutoNome').val() =='' || $('#ProdutoUnidade').val() =='' || $('#ProdutoDescricao').val() =='' || $('#ProdutoitenValorUnitario').val() ==''){
			alert('Preencher campos do produto');
							
		}else{
			showModal('myModal_' + 'add-lote');
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
				

				alert(data.Flashm);
				
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

	var urlPadrao = "http://172.16.0.30/cakephp/notas/index/?";
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

	

/*************** Tabela dinâmica dados lote ***********************/
	
	var lote_cont = 0;
	var array_lotes = [];
	var i;
	function printElement( elem ) {
		console.log( elem );
		
		
	}
	
	
	
		$('#LoteNumeroLote').change(function( 	) {


		
		var numeroLote = $("#LoteNumeroLote").val();
		var produtoId= $("#LoteProdutoId").val();
		var urlAction = "http://172.16.0.30/cakephp/Lotes/add";
		var dadosForm = $("#LoteIndexForm").serialize();
		
		
		$("#loaderAjax").show();
		
		$("#LoteDataFabricacao").val("");
		$("#LoteDataValidade").val("");
		$("#LoteFabricante").val("");
		$("#LoteLoteId").val("");
		$("#respostaAjax").hide();
		$("#btn-addLote").hide();
		$("#bt-salvarLote").show();
		
		$.ajax({
			type: "POST",
			url: urlAction,
			data:  dadosForm,
			dataType: 'json',
			success: function(data) {
				console.debug(data);
				$("#loaderAjax").hide();
				if(data=="liberado"){
					$("#respostaAjax").show();
					
				}else if(data=="cadastrado"){
					
				}else{
					if(data != "vazio"){
						$("#LoteDataFabricacao").val(data.Lote.data_fabricacao);
						$("#LoteDataValidade").val(data.Lote.data_validade);
						$("#LoteFabricante").val(data.Lote.fabricante);
						$("#LoteId").val(data.Lote.id);
						$("#btn-addLote").show();
						$("#bt-salvarLote").hide();
					
					}else{
						$("#LoteNumeroLote").val("Digite o número do lote ");
					}

				
				}

				
		
								
				
			}
		});
		
		//alert(dadosForm);
	
	});
		var lote_cont=0;
		$('#bt-salvarLote').click(function(event) {

		event.preventDefault();
		
		var numeroLote = $("#LoteNumeroLote").val();
		var produtoId= $("#LoteProdutoId").val();
		var urlAction = "http://172.16.0.30/cakephp/Lotes/add";
		var dadosForm = $("#LoteIndexForm").serialize();
		$("#bt-salvarLote").hide();

		$("#respostaAjax").html("");
		$("#loaderAjax").show();
		$.ajax({
			type: "POST",
			url: urlAction,
			data:  dadosForm,
			dataType: 'json',
			success: function(data) {
				//alert("teste");
				var numeroLoteAdd = $("#LoteNumeroLote").val();
				var quantidadeLoteAdd = $("#LoteQuantidade").val();
				var validadeLoteAdd  = $("#LoteDataValidade").val();
				var LoteId = data.Lote.id;
	
				$("#bt-salvarLote").hide();
				$("#loaderAjax").hide();
				
				if(numeroLoteAdd !=undefined){
					$('.tabela-lote').append('<tr><td>'+numeroLoteAdd+'</td><td><input class="tamanho-qtde soma" value="'+quantidadeLoteAdd+'"/></td><td>'+validadeLoteAdd+'</td><td><a href="" data-qtde="'+quantidadeLoteAdd+'" id=clonado'+lote_cont+' class="btnExcluir">remover</a></td></tr> ');
					
					$('fieldset').append('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Lote]['+lote_cont+'][id]" step="any"  id="LoteId'+lote_cont+'lote_id" value="'+LoteId+'" type="hidden"/></div> ');
					$('fieldset').append('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Lote]['+lote_cont+'][quantidadeLoteAdd]" step="any" id="LoteQuantidade'+lote_cont+'quantidadeLoteAdd" value="'+quantidadeLoteAdd+'" type="hidden"/></div>');
					
					$("#bt-salvarLote").show();
					$("#myModal_add-lote").modal('hide');
					
					console.debug(data);
					
				}else{
					$("#LoteNumeroLote").val("Digite o número do lote ");
				}
				lote_cont=lote_cont+1;
				$("#LoteDataFabricacao").val(" ");
				$("#LoteDataValidade").val(" ");
				$("#LoteFabricante").val(" ");
				$("#LoteNumeroLote").val(" ");
				$("#LoteQuantidade").val(" ");
				$("#LoteLoteId").val("");
				
				$("#myModal_add-lote").modal('hide');
				//console.debug(data);
				
			}
		});
		
		//alert(dadosForm);
		
	});	
	
	/**Ajustar função abaixo para cadastro de produtos sem ser no modal
	$('#btn-salvarProduto').click(function(event) {

		event.preventDefault();		
		
		
		var urlAction = "http://172.16.0.30/cakephp/produtos/add";
		var dadosForm = $("#ProdutoAddForm").serialize();
		$("#btn-salvarProduto").hide();

		//$("#respostaAjax").html("");
		//$("#loaderAjax").show();
		$.ajax({
			type: "POST",
			url: urlAction,
			data:  dadosForm,
			dataType: 'json',
			success: function(data) {
				$("myModal_add-produtos").modal('hide');
				$("#btn-salvarProduto").show();
				alert("Passou");
				
			}
		});
		
		//alert(dadosForm);
	
	});	***/
		
	//var lote_cont=0;
	$('body').on('click', '#btn-addLote',function() {

		//alert("teste");
		var numeroLoteAdd = $("#LoteNumeroLote").val();
		var quantidadeLoteAdd = $("#LoteQuantidade").val();
		var validadeLoteAdd  = $("#LoteDataValidade").val();
		var LoteId = $("#LoteId").val();
		var Loteiten_Tipo = $('#LoteitenTipo').val();
		var produtoid=$('#LoteProdutoId').val();
		
		if(numeroLoteAdd !=undefined){
			$('.tabela-lote').append('<tr class="apargarLotes"><td>'+numeroLoteAdd+'</td><td><input class="tamanho-qtde soma" value="'+quantidadeLoteAdd+'"/></td><td>'+validadeLoteAdd+'</td><td><a href="" data-qtde="'+quantidadeLoteAdd+'" id=clonado'+lote_cont+' class="btnExcluir">remover</a></td></tr> ');
			
			$('fieldset').append('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Loteiten]['+lote_cont+'][lote_id]" step="any"  id="LoteId'+lote_cont+'lote_id" value="'+LoteId+'" type="hidden"/></div> ');
			$('fieldset').append('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Loteiten]['+lote_cont+'][qtde]" step="any" id="LoteQuantidade'+lote_cont+'qtde" value="'+quantidadeLoteAdd+'" type="hidden"/></div>');
			$('fieldset').append('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Loteiten]['+lote_cont+'][tipo] step="any"  id="LoteitenTipo'+lote_cont+'tipo" value="'+Loteiten_Tipo+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Loteiten]['+lote_cont+'][produto_id] step="any"  id="LoteinteProduto_id'+lote_cont+'produto_id" value="'+produtoid+'" type="hidden"></div> ');
			
			$("#bt-salvarLote").show();
			$("#myModal_add-lote").modal('hide');
			
		}else{
			$("#LoteNumeroLote").val("Digite o número do lote ");
		}
		
		lote_cont=lote_cont+1;
		calcular(); 

	});
	
	
/*
	$(".bt-add").bind('click', function(e){
		
		e.preventDefault();
		
		//atribuimos os valores nas variaveis
		 
		var lista_de_lotes;
		
				
		qtde=$('#LoteQtde').val();
		data_validade=$('#data_validade').val();
		
		
		if($('#Lote').val() == undefined){
			lista_de_lotes= "sem lote";
		}else{
			lista_de_lotes = $('#Lote').val();
		}
		
		
		$('.tabela-lote').append('<tr class="apargarLotes" id="linha"><td class="coluna">'+lista_de_lotes+'</td><td><input class="tamanho-qtde soma" value="'+qtde+'"/></td><td>'+data_validade+'</td><td><a href="" data-qtde="'+qtde+'" id=clonado'+lote_cont+' class="btnExcluir">remover</a></td></tr> ');
		
					
		if(i != null){
			array_lotes[i]= lista_de_lotes;
		//	alert(array_lotes[i]);
		//	alert(i);
			i++;
		}
		
		
		$('#LoteQtde').val('');
		$('#data_validade').val('');
		$('#Lote').val('');
		
		$('fieldset').append('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Lote]['+lote_cont+'][numero_lote]" step="any"  id="Lote'+lote_cont+'numero_lote" value="'+lista_de_lotes+'" type="hidden"/></div> ');
		$('fieldset').append('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Lote]['+lote_cont+'][qtde]" step="any" id="LoteQtde'+lote_cont+'" value="'+qtde+'" type="hidden"/></div>');
		$('fieldset').append('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Lote]['+lote_cont+'][data_validade]" step="any" id="data_validade'+lote_cont+'" value="'+data_validade+'" type="hidden"/></div>');
		
		
		//alert('<div class="input number clonado'+lote_cont+'" style="position:absolute"><input name="data[Lote]['+lote_cont+'][numero_lote]" step="any"  id="Lote'+lote_cont+'numero_lote" value="'+lista_de_lotes+'" type="hidden"></div>');
		
		lote_cont++;
		calcular(); 
	
	
	});	 	

*/

/******************** Excluir tabela lote *******************/   	
	$("body").on("click",'.btnExcluir', function(e){
		e.preventDefault();			
			
		minuendo=$('#resultado').val();
		subtraendo=$(this).attr('data-qtde');
					
		if(!isNaN( minuendo)){
			var resto = 0;
			resto=minuendo-subtraendo;
		}
			
		$('#resultado').val(resto);
			
		id= $(this).attr('id');
		$('.'+id).remove();
			
		Excluir($(this));
		$(".vu").trigger("change");
		
		array_lotes.pop();
		i--;
	//	alert(i);
			
	});	


/******************** Multiplicação Valor Unitario X QTDE *******************/   	
	$(".vu").change(function(){
			qtd=$('#resultado').val();
			unit=$('.vu').val().replace('.','');
			total=qtd*unit;
			$('.vt').val(total).priceFormat({
				prefix: '',
				centsSeparator: '.',
				thousandsSeparator: '.'
			});		
			
			
	});

/*	
	$("body").on("click",'.bt-add', function(e){
			qtd=$('#resultado').val();
			unit=$('.vu').val().replace(',','');
			total=qtd*unit;
			$('.vt').val(total).priceFormat({
				prefix: '',
				centsSeparator: ',',
				thousandsSeparator: '.'
			});
	});
*/	

/**************** Tabela dinâmica principal ****************/        

var princ_cont = 0;
    var lotes = '';
    $(".bt-adicionar").bind('click', function(e){
		lotes = ''; 
		var table = $('.table-lote');
		$('#linha td.coluna').each(function() {
			
				lotes += $(this).text()+ ', ';
						
		});
		
		lotes = lotes.slice(0,-2) + '.';
		
		
         e.preventDefault();
         //atribuimos os valores nas variaveis
        
        //Campos tabela principal
       
        codigo=$('#ProdutoCodigo').val();
        nome=$('#ProdutoNome').val();
        unidade=$('#ProdutoUnidade').val();
        descricao=$('#ProdutoDescricao').val();
        qtde=$('#resultado').val();
        valor_unitario=$('#ProdutoitenValorUnitario').val();
        valor_total=$('#ProdutoitenValorTotal').val();
        cfop=$('#ProdutoitenCfop').val();
        valor_icms=$('#ProdutoitenValorIcms').val();
        valor_ipi=$('#ProdutoitenValorIpi').val();
		Nota_Tipo = $('#NotaTipo').val();
		Produtoiten_Tipo = $('#ProdutoitenTipo').val();
		produtoId = $('#LoteProdutoId').val();
		
		
				
        var lote;
       
        if($('#Lote').val() == undefined){
			lote = "sem lote";
		}else{
			lote = $('#Lote').val();
		}
			
		
		
	/*	 if(codigo =='' && nome =='' && unidade =='' &&  descricao =='' &&  qtde =='' &&  valor_unitario =='' &&  valor_total ==''){
			alert('aqui');		
		 		
				
		}else{
	*/		
			//adicionando campos a tabela
			$('#tabela-principal').append('<tr><td>'+codigo+'</td><td>'+nome+'</td><td>'+unidade+'</td><td class="descricao"><span title="'+descricao+'">'+descricao+'&nbsp;</span></td><td>'+qtde+'</td><td>'+valor_unitario+'</td><td>'+valor_total+'</td><td class="imposto">'+cfop+'</td><td class="imposto">'+valor_icms+'</td><td class="imposto">'+valor_ipi+'</td> <td><img rel="tooltip" title="'+lotes+'" src="/cakephp/img/icon-dash2.png"/></td> <td><a href="#" id=clonado'+princ_cont+' class="btnRemove">remover</a></td></tr>');
			
			$("#vale").trigger("change");
			$('.apargarLotes').remove();
			
			//limpa campos
			$('#ProdutoCodigo').val('');
			$('#spanNomeProduto').remove();
			$('#ProdutoUnidade').val('');
			$('#spanDescProduto').remove();
			$('#resultado').val('');
			$('#ProdutoitenValorUnitario').val('');
			$('#ProdutoitenValorTotal').val('');
			$('#ProdutoitenCfop').val('');
			$('#ProdutoitenValorIcms').val('');
			$('#ProdutoitenValorIpi').val('');
			$('#Lote').val('');
			$('.custom-combobox-input').val('');
			
			
			//Campos hidden tabela principal
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][produto_id] step="any"  id="ProdutoitenProduto_id'+princ_cont+'produto_id" value="'+produtoId+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][qtde] step="any"  id="ProdutoitenQtde'+princ_cont+'qtde" value="'+qtde+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][valor_total] step="any"  id="ProdutoitenValorTotal'+princ_cont+'valor_total" value="'+valor_total+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][cfop] step="any"  id="ProdutoitenCfop'+princ_cont+'cfop" value="'+cfop+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][percentual_icms] step="any"  id="ProdutoitenPercentual_icms'+princ_cont+'percentual_icms" value="'+valor_icms+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][percentual_ipi] step="any"  id="ProdutoitenPercentual_ipi'+princ_cont+'percentual_ipi" value="'+valor_ipi+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][tipo] step="any"  id="ProdutoitenTipo'+princ_cont+'tipo" value="'+Produtoiten_Tipo+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Produtoiten]['+princ_cont+'][valor_unitario] step="any"  id="Produtoitenvalor_unitario'+princ_cont+'valor_unitario" value="'+valor_unitario+'" type="hidden"></div> ');
			
							
		
			
			//todos os campos excluindo produtos
			chave_acesso=$('#NotaChaveAcesso').val();
			nota_fiscal=$('#NotaNotaFiscal').val()
			data=$('#NotaData').val()
			cpf_cnpj=$('#parceirodenegocioCpfCnpj').val()
			nome_parceirodenegocio=$('#parceirodenegocioNome').val()
			valor_total_produtos=$('#EntradaValorTotalProdutos').val()
			valor_ipi_nota=$('#NotaValorIpi').val()
			valor_outros=$('#NotaValorOutros').val()
			valor_total_produto=$('#NotaValorTotal').val()
			valor_seguro=$('#NotaValorSeguro').val()
			valor_icms_nota=$('#NotaValorIcms').val()
			valor_frete=$('#NotaValorFrete').val()
			
			//campos hidden
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Nota]['+princ_cont+'][chave_acesso] step="any"  id="NotaChaveAcesso	'+princ_cont+'chave_acesso" value="'+chave_acesso+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Nota]['+princ_cont+'][[nota_fiscal]] step="any"  id="NotaNotaFiscal'+princ_cont+'nota_fiscal" value="'+nota_fiscal+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Nota]['+princ_cont+'][data] step="any"  id="NotaData'+princ_cont+'data" value="'+[data]+'" type="hidden"></div> ');
		//	$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[parceirodenegocio]['+princ_cont+'][cpf_cnpj] step="any"  id="parceirodenegocioCpfCnpj'+princ_cont+'cpf_cnpj" value="'+cpf_cnpj+'" type="hidden"></div> ');
		//	$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[parceirodenegocio]['+princ_cont+'][nome] step="any"  id="parceirodenegocioNome'+princ_cont+'nome" value="'+nome_parceirodenegocio+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Nota]['+princ_cont+'][valor_total_produtos] step="any"  id="NotaValorTotalProdutos'+princ_cont+'valor_total_produtos" value="'+valor_total_produtos+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Nota]['+princ_cont+'][valor_ipi] step="any"  id="NotaValorIpi'+princ_cont+'valor_ipi" value="'+valor_ipi_nota+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Nota]['+princ_cont+'][valor_outros] step="any"  id="NotaValorOutros'+princ_cont+'valor_outros" value="'+valor_outros+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Nota]['+princ_cont+'][valor_total] step="any"  id="NotaValorTotal'+princ_cont+'valor_total" value="'+valor_total_produto+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Nota]['+princ_cont+'][valor_seguro] step="any"  id="NotaValorSeguro	'+princ_cont+'valor_seguro" value="'+valor_seguro+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Nota]['+princ_cont+'][valor_icms] step="any"  id="NotaValorIcms'+princ_cont+'valor_icms" value="'+valor_icms_nota+'" type="hidden"></div> ');
			$('fieldset').append('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Nota]['+princ_cont+'][valor_frete] step="any"  id="NotaValorFrete'+princ_cont+'valor_frete" value="'+valor_frete+'" type="hidden"></div> ');
			 
							
			//alert('<div class="input number clonado'+princ_cont+'" style="position:absolute"><input name="data[Produto][codigo]['+princ_cont+'][codigo]" step="any"  id="ProdutoCodigo'+princ_cont+'codigo" value="'+codigo+'" type="hidden"></div> '    );
		
			princ_cont++;
		//}
		
		
		
    });	 


/******************** Excluir tabela principal *******************/    
	$("body").on("click",'.btnRemove', function(e){
		e.preventDefault();	
		
		id= $(this).attr('id');
		$('fieldset .'+id).remove();
		
		Excluir($(this));
	});
	
	
/********* Função Excluir da tabela dinâmica ***********************/
	function Excluir(e){
		
		var par = e.parent().parent(); 
		par.remove();

	};
	
	
/******************* Soma QTDE ************************************/

	function calcular(){
		
		var soma = 0;
		
		$(".soma").each(function(indice,item){
			var valor = parseFloat($(item).val());
			console.log(valor);
			if(!isNaN( valor)){
				soma += valor;
			}

		});
		
		$(".resultado-qtde").val(soma);
		
	}
	
	
/********************* Barra de Progresso *****************************/
   
   /**** Avançar Entrada/Saida Manual ***/
   
	$('.avancar').click(function(){ 
		
		var atual = id.substr(7);
	
	//	alert(atual);
	
		id= $(this).attr('id');		
		atualInt=parseInt(atual);
		
		if(atual <= 2){
			$('#fase'+atual).fadeOut('fast',function(){				
				$('.DivRecurso').fadeIn('slow',function(){ 
						$('none').fadeIn("slow"); 
						$('.bt-voltar').attr('id', 'voltar2');
						
				});
			});
			
		}			 
	});	
	
  /*** Avançar Tela resultado ***/
	$('.resultado').bind('click', function(e){
		e.preventDefault();
			
		id= $(this).attr('id');
		var atual_saida = id.substr(7);
		
		proximo_saida=parseInt(atual_saida);
		
	  	 	
	  	$('.desabilita').attr('disabled','disabled');
	  	
	  	$('.dados-produto').css('display','none');
	  	$('#titulo-header').html('Visualizar e Salvar');
	  	$('#visualizar-circulo').addClass('complete');
	  	$('#visualizar-linha').addClass('complete');
	  	$('#visualizar-escrita').html('Visualizar e Salvar');
	  	$('.entradas td:nth-last-child(1), th:nth-last-child(1)').hide();
	  	$('.bt-confirmar').css('display','none'); 
		$('.bt-salvar').css('display','block'); 
		$('.bt-voltar').attr('id', 'voltar3');  
		$('html, body').animate({scrollTop:0}, 'slow');

	
		
	});	
	
	/*** Voltar Entrada/Saída Manual ***/	
		$('.voltar').bind('click', function(e){
			e.preventDefault();
			
			id= $(this).attr('id');
			
			var atual_saida = id.substr(6);
			
			proximo_saida=parseInt(atual_saida);

		//	alert(proximo_saida);
			
			nova_saida=proximo_saida - 1;
			
		//	alert(nova_saida);	
									
			if(proximo_saida==3){
							
				$('.desabilita').removeAttr('disabled','disabled');
				$('.dados-produto').css('display','block');
				$('#titulo-header').html('Entrada Manual');
				$('#visualizar-circulo').removeClass('complete');
				$('#visualizar-linha').removeClass('complete');
				$('#visualizar-escrita').html('');
				$('.entradas td:nth-last-child(1), th:nth-last-child(1)').show();
				$('.bt-confirmar').css('display', 'block'); 
				$('.bt-confirmar').css('float','right');
				$('.bt-salvar').css('display','none');
				$('.bt-voltar').attr('id', 'voltar2'); 
				$('html, body').animate({scrollTop:0}, 'slow');
			

			}else{				
			//	alert(nova_saida);			
			
				$('.fase').fadeOut('fast');		
				$('#fase'+nova_saida).fadeIn('slow');
				$('.bt-voltar').attr('id', 'voltar0');	
				$('html, body').animate({scrollTop:0}, 'slow');
			}
					
		});	
		
/*************Funcões para Entrada Manual*******************/
 $('.bt-preencher').bind('click', function(){
	nomeProd = $(".combo-autocomplete option:selected").text();
	nomeUnidade = $(".combo-autocomplete option:selected").attr('class');
	nomeDesc = $(".combo-autocomplete option:selected").attr('rel');
	nomeCod = $(".combo-autocomplete option:selected").attr('id');
	produtoid = $(".combo-autocomplete option:selected").val();

	$("#LoteProdutoId").val(produtoid);

	if(nomeProd=="Cadastrar"){$(".combo-autocomplete").trigger("change");}
	if( nomeProd==undefined || nomeProd=="Cadastrar" ){nomeProd=""}
	if( nomeUnidade==undefined){nomeUnidade=""}
	if( nomeDesc==undefined){nomeDesc=""}
	if( nomeCod==undefined){nomeCod=""}
	
	$('#ProdutoCodigo').val(nomeCod);
	$('#ProdutoNome').val(nomeProd);
	$('#divNomeProduto').html('<span id="spanNomeProduto" class="dadosEntrada">' + nomeProd + '</span>')
	$('#ProdutoUnidade').val(nomeUnidade);
	$('#ProdutoDescricao').val(nomeDesc);
	$('#divDescProduto').html('<span id="spanDescProduto"  class="dadosEntrada">' + nomeDesc + '</span>')

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
	
//Funções para cadastro de produtos
	
	estoqueMinimo= $('#ProdutoEstoqueMinimo').val();
	estoqueDesejado= $('#estoqueIdeal').val();

		if((estoqueDesejado != '') && (estoqueMinimo != '')){
			if((estoqueMinimo - estoqueDesejado) > 0){
				alert('Estoque Mínimo não pode ser maior do que o Estoque Ideal');
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
	
	
	$('#ProdutoEstoqueMinimo, #estoqueIdeal').change(function(e){
		
		estoqueMinimo= $('#ProdutoEstoqueMinimo').val();
		estoqueDesejado= $('#estoqueIdeal').val();

			if((estoqueDesejado != '') &&(estoqueMinimo != '')){
				if((estoqueMinimo - estoqueDesejado) > 0){
					alert('Estoque Mínimo não pode ser maior do que o Estoque Ideal');
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

	var it = $("input[id='filterDataLote-between']");
	it.addClass('forma-data1');
	it.addClass('validaLote')
	
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
					alert('A data Final não pode ser menor que a inicial');
					$("input[id='filterDataLote-between']").val(" ");
					$( "input[id='filterDataLote-between']" ).addClass('shadow-vermelho');
				}
		});
		
		/**Data Nota**/
		
	var not = $("input[id='filterDataNota-between']");
	not.addClass('validaNota');	
		
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
					alert('A data Final não pode ser menor que a inicial');
					$("input[id='filterDataNota-between']").val(" ");
					$("input[id='filterDataNota-between']").addClass('shadow-vermelho');
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
	
	$("input[id='LoteDataValidade']").change(function(){	
				var dataInicialNota = $("input[id='LoteDataFabricacao']").datepicker('getDate');
				
				if(dataInicialNota !=0){
					var dataFinalNota = $("input[id='LoteDataValidade']").datepicker('getDate');
					
					if(dataFinalNota !=0){
													
						var daysNota = (dataFinalNota - dataInicialNota) / 1000 / 60 / 60 / 24;
					
						if(daysNota < 0){
							alert('A data de validade não pode ser menor que a data de fabricação');
							$("input[id='LoteDataValidade']").val(" ");
							$("input[id='LoteDataValidade']").addClass('shadow-vermelho');
						}
						
						if(daysNota >= 0){
							$("input[id='LoteDataValidade']").removeClass('shadow-vermelho');
						}
					}
				}
		});
		
	$("input[id='LoteDataFabricacao']").change(function(){	
				var fab = $(this).val();
							
				if(fab.length != 0){
						var dataInicialNota = $("input[id='LoteDataFabricacao']").datepicker('getDate');
						var dataFinalNota = $("input[id='LoteDataValidade']").datepicker('getDate');
						if(dataFinalNota > 0){
									var daysNota = (dataFinalNota - dataInicialNota) / 1000 / 60 / 60 / 24;
								}
				}
				
				if(daysNota < 0){
							alert('A data de validade não pode ser menor que a data de fabricação');
							$("input[id='LoteDataFabricacao']").val(" ");
							$("input[id='LoteDataFabricacao']").addClass('shadow-vermelho');
						}
						
				if(daysNota > 0){
							$("input[id='LoteDataFabricacao']").removeClass('shadow-vermelho');
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
	
		$('.icms , .ipi').change(function(){
			var t = $(this).val();
			if(t.length > 7){
				alert("Valor Inválido!");
				$(this).val(" ");
			
			}				
			
		});

/*********** Mascara Entradas ***********/			
	jQuery(function(){
		
		$(".nfiscal").focus(function(){
			$( ".nfiscal" ).mask("99999999");
		});

		$(".cnpj").focus(function(){
			$(".cnpj").mask("99999999999999");
		});
		
		$(".cfo").focus(function(){
			$(".cfo").mask("9999");
		});
		
		$(".dinheiro").focus(function(){
			$('.dinheiro').priceFormat({
				prefix: '',
				centsSeparator: 	'.',
				thousandsSeparator: '.'
			});
		});
		
		
		
		$(".vipi").mask("000.00", {reverse: true});
		$(".vicms").mask("000.00", {reverse: true});
		
		
		
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
