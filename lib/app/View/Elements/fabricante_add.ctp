
<?php 
	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	$this->start('css');
	echo $this->Html->css('modal_fabricante');
	$this->end();
	
?>


<header id="cabecalho">
	
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'Cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	?>
	
	 <h1>Cadastrar Fabricante</h1>
	 
</header>

<section>
	<header>Dados do Fabricante</header>
	
	<section class="coluna-modal">
	 <div id="fabricante-modal">
			
		<?php
			echo $this->Form->create('Fabricante'); 
			echo $this->Form->input('Produto.fabricante',array('type'=>'text','label'=>'Nome:'));		
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

