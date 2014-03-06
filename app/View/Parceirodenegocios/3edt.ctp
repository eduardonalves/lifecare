<div class="parceirodenegocios form">
<?php echo $this->Form->create('Parceirodenegocio'); ?>
	<fieldset>
		<legend><?php echo __('Edit Parceirodenegocio'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('cpf_cnpj');
		echo $this->Form->input('tipo');
		echo $this->Form->input('categoria');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Parceirodenegocio.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Parceirodenegocio.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Contatos'), array('controller' => 'contatos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contato'), array('controller' => 'contatos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enderecos'), array('controller' => 'enderecos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Endereco'), array('controller' => 'enderecos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas'), array('controller' => 'entradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entrada'), array('controller' => 'entradas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notas'), array('controller' => 'notas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nota'), array('controller' => 'notas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Saidas'), array('controller' => 'saidas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Saida'), array('controller' => 'saidas', 'action' => 'add')); ?> </li>
	</ul>
</div>
