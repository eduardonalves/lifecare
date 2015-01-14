<div class="icms form">
<?php echo $this->Form->create('Icm'); ?>
	<fieldset>
		<legend><?php echo __('Edit Icm'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('produto_id');
		echo $this->Form->input('modalidadebc_id');
		echo $this->Form->input('modalidadebcst_id');
		echo $this->Form->input('situacaotribicm_id');
		echo $this->Form->input('aliq_icms');
		echo $this->Form->input('margemvaloradic');
		echo $this->Form->input('reducaobasecalcst');
		echo $this->Form->input('precounitpautast');
		echo $this->Form->input('alq_icmsst');
		echo $this->Form->input('motivodesoneracao_id');
		echo $this->Form->input('percentualbcoppropria');
		echo $this->Form->input('ufpgtoicmsst');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Icm.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Icm.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Icms'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modalidadebcs'), array('controller' => 'modalidadebcs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modalidadebc'), array('controller' => 'modalidadebcs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modalidadebcsts'), array('controller' => 'modalidadebcsts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modalidadebcst'), array('controller' => 'modalidadebcsts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Situacaotribicms'), array('controller' => 'situacaotribicms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Situacaotribicm'), array('controller' => 'situacaotribicms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Motivodesoneracaos'), array('controller' => 'motivodesoneracaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Motivodesoneracao'), array('controller' => 'motivodesoneracaos', 'action' => 'add')); ?> </li>
	</ul>
</div>
