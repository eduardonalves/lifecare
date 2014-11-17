<?php 
	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	$this->start('css');
	 echo $this->Html->css('modal_vendedor');
	$this->end();

	$this->start('script');
	//echo $this->Html->script('funcoes_modal_vededor-add.js');
	echo "
	
	<script>

	$(window).load(function(){

		$(\"#VendedorCpf\").mask(\"999.999.999-99\");


		$(\"#VendedorAddForm\").on('submit', function(){
			
			var \$return = true;

			$('input.campo-obrigatorio').each( function(){
				
				if ( $(this).val() == '' ) {
					
					$('#span' + $(this).attr('id')).css('display', 'inline-block');
					\$return = false;
					
				} else {
					
					$('#span' + $(this).attr('id')).css('display', 'none');
					
				}
			
				
				
			});
			
			return \$return;
		
		});


	});
	
	
	</script>";
	
	
	$this->end();
	
?>


<header id="cabecalho">
	
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'Cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	?>
	
		<h1 class="menuOption54" >Cadastrar Vendedor</h1>
	
</header>

<section>
	<header class="header">Dados do Vendedor</header>
	
	<section class="coluna-modal">
	 <div id="vendedor-modal">
			
		<?php
			echo $this->Form->create('Vendedor', array('required'=>false,'url'=>array('controller'=>'Vendedors', 'action'=>'add'), 'class'=>'modal-form')); 
			echo $this->Form->input('Vendedor.nome',array('type'=>'text', 'class'=>'campo-obrigatorio', 'label'=>'Nome<span class="campo-obrigatorio">*</span>:'));
			echo "<span id='spanVendedorNome'  class='MsgVendedorNome Msg validaVendedor tooltipMensagemErroDireta' style='display:none'>Preencha o campo Nome</span>";
			echo $this->Form->input('Vendedor.cpf',array('type'=>'text', 'class'=>'campo-obrigatorio','label'=>'Cpf do Vendedor<span class="campo-obrigatorio">*</span>:'));
			echo "<span id='spanVendedorCpf'  class='MsgVendedorCpf Msg validaCpf tooltipMensagemErroDireta' style='display:none'>Preencha o campo como o cpf</span>";
			echo $this->Form->input('Vendedor.ativo',array('type'=>'hidden','value'=>'1'));	
			
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
