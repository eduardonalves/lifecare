<div class="dadosbancarios form">
<?php echo $this->Form->create('Dadosbancario'); ?>
	<fieldset>
		<legend><?php echo __('Add Dadosbancario'); ?></legend>
	<?php
		echo $this->Form->input('numero_banco');
		echo $this->Form->input('nome_banco');
		echo $this->Form->input('numero_agencia');
		echo $this->Form->input('nome_agencia');
		echo $this->Form->input('telefone_banco');
		echo $this->Form->input('gerente');
		echo $this->Form->input('conta');
		echo $this->Form->input('parceirodenegocio_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Dadosbancarios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
