<div class="itenstransps form">
<?php echo $this->Form->create('Itenstransp'); ?>
	<fieldset>
		<legend><?php echo __('Edit Itenstransp'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('qVol');
		echo $this->Form->input('mod_frete');
		echo $this->Form->input('peso_liq');
		echo $this->Form->input('peso_bruto');
		echo $this->Form->input('parceirodenegocio_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Itenstransp.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Itenstransp.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Itenstransps'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
