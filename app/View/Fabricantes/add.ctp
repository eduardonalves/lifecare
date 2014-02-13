<div class="fabricantes form">
<?php echo $this->Form->create('Fabricante'); ?>
	<fieldset>
		<legend><?php echo __('Add Fabricante'); ?></legend>
	<?php
		echo $this->Form->input('Fabricante.nome');
		echo $this->Form->input('Fabricante.cpf_cnpj');
		echo $this->Form->input('Fabricante.tipo', array('type'=>'hidden', 'value'=>'FABRICANTE'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Fabricantes'), array('action' => 'index')); ?></li>
	</ul>
</div>
