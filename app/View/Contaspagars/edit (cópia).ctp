<div class="contas form">
<?php echo $this->Form->create('Conta'); ?>
	<fieldset>
		<legend><?php echo __('Edit Conta'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('identificacao');
		echo $this->Form->input('descricao');
		echo $this->Form->input('valor');
		echo $this->Form->input('data_emissao');
		echo $this->Form->input('data_quitacao');
		echo $this->Form->input('imagem');
		echo $this->Form->input('status');
		echo $this->Form->input('parceirodenegocio_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Conta.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Conta.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Contas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagamentos'), array('controller' => 'pagamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pagamento'), array('controller' => 'pagamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
