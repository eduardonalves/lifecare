<?php 
	if(isset($modal)){	
		$this->extend('/Common/modal');
		$this->assign('modal',$modal);
?>

<?php	    
	}	
	
	$this->start('css');
	//echo $this->Html->css('');
	$this->end();	
?>

<header>

    <?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>
     
    <!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
    <h1 class="menuOption32">Cadastrar Parceiro</h1>

</header>

<section> <!---section superior--->

	<header>Parceiro</header>

	<section class="coluna-esquerda">
	</section>

	<section class="coluna-central" >
	</section>

	<section class="coluna-direita" >
	</section>

</section><!---Fim section superior--->


<section> <!---section MEIO--->

	<!--
	    <header class=""></header>
	-->
	
	<section class="coluna-esquerda">
	</section>

	<section class="coluna-central" >
	</section>

	<section class="coluna-direita" >
	</section>
	
</section><!--fim Meio-->

<section> <!---section Baixo--->	
	
	<!--
	    <header class=""></header>
	-->
	
	<section class="coluna-esquerda">
	</section>

	<section class="coluna-central" >
	</section>

	<section class="coluna-direita" >
	</section>

</section>	

<footer>
</footer>

<!--
<div class="parceirodenegocios form">
<?php //echo $this->Form->create('Parceirodenegocio'); ?>
	<fieldset>
		<legend><?php //echo __('Add Parceirodenegocio'); ?></legend>
	<?php
		//echo $this->Form->input('nome');
		//echo $this->Form->input('cpf_cnpj');
		//echo $this->Form->input('tipo');
		//echo $this->Form->input('categoria');
	?>
	</fieldset>
<?php //echo $this->Form->end(__('Submit')); ?>
</div>

-->
