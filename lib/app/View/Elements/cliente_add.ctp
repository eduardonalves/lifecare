
<?php 
	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	$this->start('css');
	echo $this->Html->css('modal_cliente');
	$this->end();
	
?>


<header id="cabecalho">
	
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'Cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	?>
	
	 <h1>Cadastrar Cliente</h1>
	 
</header>

<section>
	<header>Dados do Cliente</header>
	
	<section class="coluna-modal">
	 <div id="cliente-modal">
			
		<?php
			echo $this->Form->create('Cliente'); 
			echo $this->Form->input('Parceirodenegocio.nome',array('type'=>'text','label'=>'Nome:'));
			echo $this->Form->input('Parceirodenegocio.cpf_cnpj',array('type'=>'text','label'=>'CPF / CPNJ:'));	
			echo $this->Form->input('Parceirodenegocio.tipo',array('type'=>'hidden','value'=>'cliente'));	
			echo $this->Form->end();
		?>
	 </div>	
	</section>
	
</section>

<footer>
	<?php
		echo $this->form->submit( 'botao-salvar.png',array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar')); 
	?>			
</footer>

