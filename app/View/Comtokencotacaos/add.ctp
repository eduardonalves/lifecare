<div class="comtokencotacaos form">
<?php echo $this->Form->create('Comtokencotacao'); ?>
	<fieldset>
		<legend><?php echo __('Add Comtokencotacao'); ?></legend>
	<?php
		echo $this->Form->input('comoperacao_id');
		echo $this->Form->input('parceirodenegocio_id');
		echo $this->Form->input('comresposta_id');
		echo $this->Form->input('respondido');
		echo $this->Form->input('codigoseguranca');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Comtokencotacaos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Comoperacaos'), array('controller' => 'comoperacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comoperacao'), array('controller' => 'comoperacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comrespostas'), array('controller' => 'comrespostas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comresposta'), array('controller' => 'comrespostas', 'action' => 'add')); ?> </li>
	</ul>
</div>
