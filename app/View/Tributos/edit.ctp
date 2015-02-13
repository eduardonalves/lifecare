<div class="tributos form">
<?php echo $this->Form->create('Tributo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tributo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ncm');
		echo $this->Form->input('cfop');
		echo $this->Form->input('al_icms');
		echo $this->Form->input('al_ipi');
		echo $this->Form->input('al_cst');
		echo $this->Form->input('al_pis');
		echo $this->Form->input('al_confins');
		echo $this->Form->input('codigo_selo_ipi');
		echo $this->Form->input('qtde_selo_ipi');
		echo $this->Form->input('Produto');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tributo.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Tributo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tributos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>
