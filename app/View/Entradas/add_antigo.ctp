<section class="lateral a-esquerda">
<div class="entradas form">
<?php echo $this->Form->create('Entrada'); ?>
	<fieldset>
		<legend><?php echo __('Add Entrada'); ?></legend>
	<?php
		echo $this->Form->input('data_entrada');
		echo $this->Form->input('user_id');
		echo $this->Form->input('origem');
		echo $this->Form->input('fornecedore_id');
		echo $this->Form->input('nota_fiscal');
		echo $this->Form->input('valor_total');
		echo $this->Form->input('tiposmovimentacao_id');
		echo $this->Form->input('vb_icms');
		echo $this->Form->input('valor_icms', array("class"=>"tamanho-pequeno"));
		echo $this->Form->input('vb_cst');
		echo $this->Form->input('valor_st', array("class"=>"tamanho-medio"));
		echo $this->Form->input('valor_frete', array("class"=>"pq"));
		echo $this->Form->input('valor_seguro');
		echo $this->Form->input('valor_desconto');
		echo $this->Form->input('vii');
		echo $this->Form->input('valor_ipi');
		echo $this->Form->input('valor_pis');
		echo $this->Form->input('v_confins');
		echo $this->Form->input('valor_outros');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</section>
<section class="lateral a-direita">
<div class="entradas form">
<?php echo $this->Form->create('Entrada'); ?>
	<fieldset>
		<legend><?php echo __('Add Entrada'); ?></legend>
	<?php
		echo $this->Form->input('data_entrada');
		echo $this->Form->input('user_id');
		echo $this->Form->input('origem');
		echo $this->Form->input('fornecedore_id');
		echo $this->Form->input('nota_fiscal');
		echo $this->Form->input('valor_total');
		echo $this->Form->input('tiposmovimentacao_id');
		echo $this->Form->input('vb_icms');
		echo $this->Form->input('valor_icms', array("class"=>"tamanho-pequeno"));
		echo $this->Form->input('vb_cst');
		echo $this->Form->input('valor_st', array("class"=>"tamanho-medio"));
		echo $this->Form->input('valor_frete');
		echo $this->Form->input('valor_seguro');
		echo $this->Form->input('valor_desconto');
		echo $this->Form->input('vii');
		echo $this->Form->input('valor_ipi');
		echo $this->Form->input('valor_pis');
		echo $this->Form->input('v_confins');
		echo $this->Form->input('valor_outros');

	?>
	</fieldset>

</div>
</section>
<section>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Entradas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fornecedores'), array('controller' => 'fornecedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fornecedore'), array('controller' => 'fornecedores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tiposmovimentacaos'), array('controller' => 'tiposmovimentacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tiposmovimentacao'), array('controller' => 'tiposmovimentacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Itensentradas'), array('controller' => 'itensentradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Itensentrada'), array('controller' => 'itensentradas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lotesentradas'), array('controller' => 'lotesentradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lotesentrada'), array('controller' => 'lotesentradas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seriaisentradas'), array('controller' => 'seriaisentradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seriaisentrada'), array('controller' => 'seriaisentradas', 'action' => 'add')); ?> </li>
	</ul>
</div>
</section>

<footer>
<?php echo $this->Html->link(
    $this->Html->image("botao-voltar.png", array("alt" => "Brownies", "class"=>"bt-voltar")),
    array('controller' => 'recipes', 'action' => 'view', 'id' => 6, 'comments' => false), array("escape"=>false)
);
?>
<?php echo $this->Html->link(
    $this->Html->image("botao-editar.png", array("alt" => "Brownies", "class"=>"bt-editar")),
    array('controller' => 'recipes', 'action' => 'view', 'id' => 6, 'comments' => false), array("escape"=>false)
);
?>
<?php echo $this->Form->end('botao-salvar.png', array("class"=>"bt-salvar")); ?>

</footer>
