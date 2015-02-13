<div class="confignotas form">
<?php echo $this->Form->create('Confignota'); ?>
	<fieldset>
		<legend><?php echo __('Add Confignota'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('tipo');
		echo $this->Form->input('parceirodenegocio');
		echo $this->Form->input('data');
		echo $this->Form->input('descricao');
		echo $this->Form->input('nota_fiscal');
		echo $this->Form->input('valor_total');
		echo $this->Form->input('vb_icms');
		echo $this->Form->input('valor_icms');
		echo $this->Form->input('vb_cst');
		echo $this->Form->input('valor_st');
		echo $this->Form->input('valor_frete');
		echo $this->Form->input('valor_seguro');
		echo $this->Form->input('valor_desconto');
		echo $this->Form->input('valor_ipi');
		echo $this->Form->input('valor_pis');
		echo $this->Form->input('v_cofins');
		echo $this->Form->input('valor_outros');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Confignotas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
