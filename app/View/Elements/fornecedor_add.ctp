<?php 
	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	$this->start('css');
	echo $this->Html->css('modal_fornecedor');
	$this->end();

	$this->start('script');
	echo $this->Html->script('funcoes_modal_fornecedor-add.js');
	$this->end();
	
?>



<header id="cabecalho">
	
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'Cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	?>
	
	 <h1>Cadastrar Fornecedor</h1>
	
</header>

<section>
	<header class="header">Dados do Fornecedor</header>
	
	<section class="coluna-modal">
	 <div id="fornecedor-modal">
			
		<?php
			echo $this->Form->create('Fornecedore', array('required'=>false,'url'=>array('controller'=>'Fornecedores', 'action'=>'add'), 'class'=>'modal-form')); 
			echo $this->Form->input('Fornecedore.nome',array('type'=>'text','label'=>'Nome<span class="campo-obrigatorio">*</span>:'));
			echo "<span id='spanFornecedorNome'  class='MsgFornecedorNome Msg validaFonecedor tooltipMensagemErroDireta' style='display:none'>Preencha o campo Nome</span>";
			echo $this->Form->input('Fornecedore.cpf_cnpj',array('required'=>false,'type'=>'text','style'=>'background:#EBEAFC;','disabled'=>'disabled','label'=>'CPF / CNPJ<span class="campo-obrigatorio">*</span>:'));	
			
			echo "<span id='spanFornecedorCPF' class='MsgFornecedorCPF Msg validaFonecedor tooltipMensagemErroDireta' style='display:none'>Preencha o campo CPF / CNPJ corretamente</span>";
			
			echo "<span id='spanFornecedorCPFExistente' class='MsgFornecedorCPF Msg validaFonecedor tooltipMensagemErroDireta' style='display:none'>CPF/CNPJ já está Cadastrado</span>";
			
			echo "<span id='spanFornecedorCPFEerrado' class='MsgFornecedorCPF Msg validaFonecedor tooltipMensagemErroDireta' style='display:none'>CPF/CNPJ Não foi preenchido corretamente, certifique-se que foram digitados 14 caracteres</span>";
			
			echo "<span id='spanFornecedorDoc' style='display:none'>Escolha o tipo de Documento</span>";
			
			echo "<div id='idcpf'><input id='inputcpf' type='radio'   name='CPFCNPJ' value='cpf'><label class='label-cpf'>CPF /</label></div>	 
				  <div id='idcnpj'><input id='inputcnpj' type='radio' name='CPFCNPJ' value='cnpj'><label class='label-cnpj'>CNPJ<span class='campo-obrigatorio'>*</span>:</label></div>";
			echo $this->Form->input('Fornecedore.tipo',array('type'=>'hidden','value'=>'FORNECEDOR'));	
			
		?>
	 </div>	
	</section>
	
</section>

<footer>
	<div class="loaderAjax" style="display:none;">
		<?php
			
			echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando',
														 'title'=>'Carregando',
														 'class'=>'ajaxLoader',
														 ));
		?>
		<span>Salvando aguarde...</span>
	</div>
	<?php
		echo $this->form->submit( 'botao-salvar.png',array('class' => 'bt-salvar bt-salvar-Fornecedor', 'alt' => 'Salvar', 'title' => 'Salvar')); 
		echo $this->Form->end();
	?>			
</footer>
<script>
	$(document).ready(function(){
	
	$('#FornecedoreNome').removeAttr('required','required');
	
        function ordenarSelectFornecedor(){   
	    
			
			//var options = $('#add-fornecedor option');
			//var arr = options.map(function(_, o) { return { t: $(o).text(), v: o.value }; }).get();
			//arr.sort(function(o1, o2) { return o1.t > o2.t ? 1 : o1.t < o2.t ? -1 : 0; });
			//options.each(function(i, o) {
			  //o.value = arr[i].v;
			  //$(o).text(arr[i].t);
			//});
			 var cl = document.getElementById('add-fornecedor');
			 var clTexts = new Array();

			 for(i = 2; i < cl.length; i++){
				clTexts[i-2] =
					cl.options[i].text.toUpperCase() + "," +
					cl.options[i].text + "," +
					cl.options[i].value;
			 }

			 clTexts.sort();

			 for(i = 2; i < cl.length; i++){
				var parts = clTexts[i-2].split(',');

				cl.options[i].text = parts[1];
				cl.options[i].value = parts[2];
			 }

			
        }	
     
    $('#FornecedoreNome').focusin(function(){
	$('#FornecedoreNome').addClass('shadow-vermelho');
    
    });
    
    $('#FornecedoreCpfCnpj').focusin(function(){
	$('#FornecedoreCpfCnpj').addClass('shadow-vermelho');
    
    });
    
    $('#FornecedoreNome, #FornecedoreCpfCnpj').focusout(function(){
	$('#FornecedoreNome').removeClass('shadow-vermelho');
	$('#spanFornecedorNome').css('display','none');
	$('#FornecedoreCpfCnpj').removeClass('shadow-vermelho');
	$('#spanFornecedorCPF').css('display','none');
    
    });
    
    
     
    $('#FornecedoreNome, #FornecedoreCpfCnpj').change(function(){
		if($('#FornecedoreNome').val() !=''){
			$('#FornecedoreNome').removeClass('shadow-vermelho');
			$('#spanFornecedorNome').css('display','none');
		}
		
		if($('#FornecedoreCpfCnpj').val() != ''){	
			$('#FornecedoreCpfCnpj').removeClass('shadow-vermelho');
			$('#spanFornecedorCPF').css('display','none');
		}
		
	
	});

    var tamanho_cpf_cnpj = 0;
    var total_cpf_cnpj = 0;
    var ok = 0;
   
    $('input:radio[name=CPFCNPJ]').click(function(){
				$("#spanFornecedorDoc").hide();
	});   
         
	 	
	$('#FornecedoreIndexForm').submit(function(event){
		event.preventDefault();
			
		$('input:radio[name=CPFCNPJ]').each(function() {	                
               if ($(this).is(':checked')){
					ok = $(this).val();
						
				}
		});
		
		t =  $("#FornecedoreCpfCnpj").val();
		tamanho_cpf_cnpj = t.length;
		
		radioId = $('input:radio[name=CPFCNPJ]:checked').val();
		if(radioId == 'cpf'){
				total_cpf_cnpj = 14;
				//alert(tamanho_cpf_cnpj);
			}
		if(radioId == 'cnpj'){
				total_cpf_cnpj = 18;				
				//alert(tamanho_cpf_cnpj);
		}
			
				
		if($('#FornecedoreNome').val() ==''){
			$('#FornecedoreNome').addClass('shadow-vermelho');
			$('#spanFornecedorNome').css('display','block');		
		
		}else if(ok == 0){				
			
			$('#spanFornecedorDoc').css('display','block');
										
		}else if($('#FornecedoreCpfCnpj').val() == '' || tamanho_cpf_cnpj < total_cpf_cnpj ){	
			$('#FornecedoreCpfCnpj').addClass('shadow-vermelho');
			$('#spanFornecedorCPF').css('display','block');
		}else{	
			var urlAction = "<?php echo $this->Html->url(array('controller'=>'fornecedores', 'action'=>'add'), true); ?>";
			var dadosForm = $("#FornecedoreIndexForm").serialize();
			
			$(".loaderAjax").show();
			$(".bt-salvar-Fornecedor").hide();
		
			$('#FornecedoreNome').removeClass('shadow-vermelho');
			$('#spanFornecedorNome').css('display','none');
							
		    $('#FornecedoreCpfCnpj').removeClass('shadow-vermelho');
			$("#spanFornecedorCPFExistente").css("display","none");
			$("#spanFornecedorCPFEerrado").css("display","none");
			$('#spanFornecedorCPF').css('display','none');
				
		    $.ajax({
				type: "POST",
				url: urlAction,
				data:  dadosForm,
				dataType: 'json',
				success: function(data) {
					console.debug(data);
					
					cpf=data.Fornecedore.cpf_cnpj;
					
					if(data.Fornecedore.id == 0){
						$(".loaderAjax").hide();						
						$("#spanFornecedorCPFExistente").show();
						$(".bt-salvar-Fornecedor").show();
						
					}else{					
							
						$("#add-fornecedor").prepend("<option value='"+data.Fornecedore.id+"' id='"+data.Fornecedore.nome+"' class='"+data.Fornecedore.cpf_cnpj+"' rel='FORNECEDOR'  >"+data.Fornecedore.nome+"</option>");
						$("#add-fornecedor option[value='add-Fornecedor']").remove();
						$('#add-fornecedor').prepend('<option value="add-Fornecedor">Cadastrar</option>');
						
						//ordenarSelectFornecedor();
						$("#add-fornecedor").val(data.Fornecedore.id);
						$('#EntradaParceiro').val(data.Fornecedore.nome);
						$('#EntradaParceirodenegocioId').val(data.Fornecedore.id);
						$('#EntradaCpfCnpj').val(data.Fornecedore.cpf_cnpj);
						$("#myModal_add-fornecedor").modal('hide');
						$(".loaderAjax").hide();
						$(".bt-salvar-Fornecedor").show();
						
						//limpa campos apos salvar
						$('#FornecedoreNome').val('');
						$('#FornecedoreCpfCnpj').val('');
						
						//desmarca input radio e desabilita o campo cnp/cnpj
						$("#FornecedoreNome").val('');
						$("#FornecedoreCpfCnpj").val('');
						$("input[type=radio]").removeAttr("checked","checked");
						$("#FornecedoreCpfCnpj").attr("disabled","disabled");
						$("#FornecedoreCpfCnpj").attr("style","background:#EBEAFC;");
						$('#FornecedoreCpfCnpj').removeClass('shadow-vermelho');
						$('#FornecedoreNome').removeClass('shadow-vermelho');
						ok = 0;
					}					
				}
			});
		}
	});
	    
    });
    
</script>
