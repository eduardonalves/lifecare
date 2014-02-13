<div class="enderecos form">
<?php echo $this->Form->create('Endereco'); ?>
	<fieldset>
		<legend><?php echo __('Add Endereco'); ?></legend>
	<?php
		echo $this->Form->input('parceirodenegocio_id');
		echo $this->Form->input('tipo');
		echo $this->Form->input('logradouro');
		echo $this->Form->input('complemento');
		echo $this->Form->input('bairro');
		echo $this->Form->input('cidade');
		echo $this->Form->input('uf');
		echo $this->Form->input('longitude');
		echo $this->Form->input('altitude');
		echo $this->Form->input('ponto_referencia');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Enderecos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
