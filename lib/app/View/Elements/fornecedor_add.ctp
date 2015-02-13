
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
	//echo $this->Html->script('modal-ajax/ajax-fornecedor-add.js');
	$this->end();
	
?>



<header id="cabecalho">
	
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'Cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	?>
	
	 <h1>Cadastrar Fornecedor</h1>
	 
</header>

<section>
	<header>Dados do Fornecedor</header>
	
	<section class="coluna-modal">
	 <div id="fornecedor-modal">
			
		<?php
			echo $this->Form->create('Fornecedore', array('url'=>array('controller'=>'Fornecedores', 'action'=>'add'), 'class'=>'modal-form')); 
			echo $this->Form->input('Fornecedore.nome',array('type'=>'text','label'=>'Nome:'));
			echo $this->Form->input('Fornecedore.cpf_cnpj',array('type'=>'text','label'=>'CPF / CPNJ:'));	
			echo $this->Form->input('Fornecedore.tipo',array('type'=>'hidden','value'=>'FORNECEDOR'));	
			
		?>
	 </div>	
	</section>
	
</section>

<footer>
	<?php
		echo $this->form->submit( 'botao-salvar.png',array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar')); 
		echo $this->Form->end();
	?>			
</footer>
