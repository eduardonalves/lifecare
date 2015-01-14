<div class="produtoitens form">
<?php echo $this->Form->create('Produtoiten'); ?>
	<fieldset>
		<legend><?php echo __('Add Produtoiten'); ?></legend>
	<?php
		echo $this->Form->input('nota_id');
		echo $this->Form->input('produto_id');
		echo $this->Form->input('ncm_sh');
		echo $this->Form->input('cst');
		echo $this->Form->input('cfop');
		echo $this->Form->input('unidade');
		echo $this->Form->input('valor_unitario');
		echo $this->Form->input('qtde');
		echo $this->Form->input('valor_total');
		echo $this->Form->input('valorbase_icms');
		echo $this->Form->input('percentual_icms');
		echo $this->Form->input('valor_icms');
		echo $this->Form->input('valorbase_st');
		echo $this->Form->input('percentual_st');
		echo $this->Form->input('valor_st');
		echo $this->Form->input('percentual_ipi');
		echo $this->Form->input('valor_ipi');
		echo $this->Form->input('tipo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Produtoitens'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Notas'), array('controller' => 'notas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nota'), array('controller' => 'notas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>
