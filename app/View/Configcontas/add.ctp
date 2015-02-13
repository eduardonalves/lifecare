<div class="configcontas form">
<?php echo $this->Form->create('Configconta'); ?>
	<fieldset>
		<legend><?php echo __('Add Configconta'); ?></legend>
	<?php
		echo $this->Form->input('identificacao');
		echo $this->Form->input('data_emissao');
		echo $this->Form->input('data_quitacao');
		echo $this->Form->input('valor');
		echo $this->Form->input('parceirodenegocio_id');
		echo $this->Form->input('descricao');
		echo $this->Form->input('status');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Configcontas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
