<div class="contatos form">
<?php echo $this->Form->create('Contato'); ?>
	<fieldset>
		<legend><?php echo __('Add Contato'); ?></legend>
	<?php
		echo $this->Form->input('parceirodenegocio_id');
		echo $this->Form->input('nome');
		echo $this->Form->input('telefone1');
		echo $this->Form->input('telefone2');
		echo $this->Form->input('telfefone3');
		echo $this->Form->input('email');
		echo $this->Form->input('redesSociais1');
		echo $this->Form->input('redesSociais2');
		echo $this->Form->input('redesSociais3');
		echo $this->Form->input('redesSociais4');
		echo $this->Form->input('redesSociais5');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Contatos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
