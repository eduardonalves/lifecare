<div class="orcamentocentros form">
<?php echo $this->Form->create('Orcamentocentro'); ?>
	<fieldset>
		<legend><?php echo __('Edit Orcamentocentro'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('limite');
		echo $this->Form->input('limite_usado');
		echo $this->Form->input('periodo_inicial');
		echo $this->Form->input('periodo_final');
		echo $this->Form->input('centrocusto_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Orcamentocentro.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Orcamentocentro.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Orcamentocentros'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Centrocustos'), array('controller' => 'centrocustos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Centrocusto'), array('controller' => 'centrocustos', 'action' => 'add')); ?> </li>
	</ul>
</div>
