<div class="dadoscreditos form">
<?php echo $this->Form->create('Dadoscredito'); ?>
	<fieldset>
		<legend><?php echo __('Add Dadoscredito'); ?></legend>
	<?php
		echo $this->Form->input('parceirodenegocio_id');
		echo $this->Form->input('limite');
		echo $this->Form->input('limite_usado');
		echo $this->Form->input('data_liberacao');
		echo $this->Form->input('validade_limite');
		echo $this->Form->input('status');
		echo $this->Form->input('bloqueado');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Dadoscreditos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
