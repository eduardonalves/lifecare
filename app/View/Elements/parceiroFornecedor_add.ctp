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
	
<<<<<<< HEAD
	 <h1>Cadastrar Fornecedor</h1>
	
</header>
=======
	 <h1>Cadastrar Parceiro</h1>

<script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-1.2-utf8.js"></script>
<script>
	window.onload = function(){
	  new dgCidadesEstados({
		estado: document.getElementById('Endereco0Uf'),
		cidade: document.getElementById('Endereco0Cidade')
	  });
	}
</script>

<section> <!---section superior--->

	<header>Dados GeriasParceiro</header>

	<section class="coluna-esquerda">

		<?php
			echo $this->Form->create('Parceirodenegocio');

			echo $this->Form->input('tipo',array('label' => 'Classificação:','value' =>'FORNECEDOR','type' => 'hidden'));
			echo $this->Form->input('nome',array('class' => 'tamanho-medio','label' => 'Nome:'));
			/*Corrigir Campo*/ echo $this->Form->input('telefone',array('class' => 'tamanho-medio','label' => 'Telefone 2:'));
			/*Corrigir Campo*/ echo $this->Form->input('email',array('class' => 'tamanho-medio','label' => 'Email:'));			
		?>

	</section>

	<section class="coluna-central" >
>>>>>>> Francisco

<section>
	<header class="header">Dados do Fornecedor</header>
	
	<section class="coluna-modal">
	 <div id="fornecedor-modal">
			
		<?php
<<<<<<< HEAD
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
			
=======
			echo $this->Form->input('cpf_cnpj',array('class' => 'tamanho-medio','label' => 'CPF/CNPJ:'));
			/*Corrigir Campo*/ echo $this->Form->input('celular',array('class' => 'tamanho-medio','label' => 'Celular:'));
>>>>>>> Francisco
		?>
	 </div>	
	</section>
	
</section>

<footer>
	<div class="loaderAjax" style="display:none;">
		<?php
<<<<<<< HEAD
			
			echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando',
														 'title'=>'Carregando',
														 'class'=>'ajaxLoader',
														 ));
=======
			/*Corrigir Campo*/ echo $this->Form->input('telefone',array('class' => 'tamanho-medio','label' => 'Telefone 1:'));
			/*Corrigir Campo*/ echo $this->Form->input('fax',array('class' => 'tamanho-medio','label' => 'Fax:'));
>>>>>>> Francisco
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
		
	
<<<<<<< HEAD
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
			var urlAction = "<?php echo $this->Html->url(array("controller"=>"fornecedores","action"=>"add"),true);?>";
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
=======
	<div class="fake-footer">

		<?php
			echo $this->html->image('botao-add2.png',array('alt'=>'Adicionar','title'=>'Adicionar Conta','id'=>'add-area-endereco','class'=>'bt-direita'));
		?>

	</div>
</section><!--fim Meio-->

<section class="ajusteAlignSection"> <!---section MEIO--->

	<header class="">Dados Bancários</header>
	
	<div class="area-dadosbanc">
		<div class="bloco-area-dadosbanc">
			<section class="coluna-esquerda">

				<?php 
					echo $this->Form->input('Dadosbancario.nome_banco',array('label' => 'Nome do Banco:','class' => 'tamanho-medio'));
					echo $this->Form->input('Dadosbancario.numero_agencia',array('label' => 'Númeor da Agência:','class' => 'tamanho-pequeno'));
					echo $this->Form->input('Dadosbancario.gerente',array('label' => 'Gerente:','class' => 'tamanho-pequeno'));
				?>

			</section>

			<section class="coluna-central" >

				<?php
					echo $this->Form->input('Dadosbancario.numero_banco',array('label' => 'Número do Banco:','class' => 'tamanho-medio'));
					echo $this->Form->input('Dadosbancario.conta',array('label' => 'Conta:','class' => 'tamanho-pequeno','id' => 'DadosbancarioConta0'));
				?>

			</section>

			<section class="coluna-direita" >

				<?php
					echo $this->Form->input('Dadosbancario.nome_agencia',array('label' => 'Nome da Agência:','class' => 'tamanho-pequeno'));
					echo $this->Form->input('Dadosbancario.telefone_banco',array('label' => 'Telefone:','class' => 'tamanho-pequeno'));
				?>

			</section>
		</div>
	</div>
	
	<div class="fake-footer">

		<?php
			echo $this->html->image('botao-add2.png',array('alt'=>'Adicionar','title'=>'Adicionar Conta','id'=>'add-area-dadosbanc','class'=>'bt-direita'));
		?>

	</div>
</section><!--fim Meio-->

<section class="areaCliente"> <!---section Baixo--->	

	<header class="">Dados do Crédito</header>

	<section class="coluna-esquerda">


		<?php
			echo $this->Form->input('Dadoscredito.limite',array('label' => 'Limite de Crédito:','class' => 'tamanho-medio'));
			echo $this->Form->input('Dadoscredito.bloqueado',array('label' => 'Bloqueado:','type' => 'select'));
		?>


	    <?php
			echo $this->Form->input('Dadoscredito.limite',array('label' => 'Limite de Crédito:','class' => 'tamanho-medio dinheiro_duasCasas'));
			echo $this->Form->input('Dadoscredito.bloqueado',array('label' => 'Bloqueado:','type' => 'select'));
	    ?>

	</section>

	<section class="coluna-central" >

		<?php
			echo $this->Form->input('Dadoscredito.validade_limite',array('label' => 'Validade do Limite:','type' => 'text','class' => 'tamanho-pequeno'));
		?>

	</section>

	<section class="coluna-direita" >

		<?php
			echo $this->Form->input('Dadoscredito.status',array('label' => 'Status:','type' => 'select'));
		?>

	</section>
</section>	

<footer>

    <?php
		echo $this->Form->submit('botao-salvar.png',array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar', 'id' => 'bt-salvarParceiro','controller' =>'Parceirodenegocio','action' => 'add','view' => 'add'));
		echo $this->Form->end();
    ?>

</footer>
>>>>>>> Francisco
