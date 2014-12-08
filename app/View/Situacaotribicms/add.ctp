<div class="situacaotribicms form">
<?php echo $this->Form->create('Situacaotribicm'); ?>
	<fieldset>
		<legend><?php echo __('Add Situacaotribicm'); ?></legend>
	<?php
		echo $this->Form->input('descricao',array('maxlength'=>'150'));
		echo $this->Form->input('codigo',array('type'=>'text','maxlength'=>'150'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Situacaotribicms'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Icms'), array('controller' => 'icms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Icm'), array('controller' => 'icms', 'action' => 'add')); ?> </li>
	</ul>
</div>
