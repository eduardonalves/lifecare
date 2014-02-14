<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('funcionario_id');
		echo $this->Form->input('username');
		 echo $this->Form->input('password');
		//echo $this->Form->input('acesso');
		
		
		//echo $this->Form->input('Configlote.0.numero_lote ', array('value' => 1, 'type' => 'text'));
		//echo $this->Form->input('Configlote.0.data_validade', array('value' => 1, 'type' => 'text'));
		//echo $this->Form->input('Confignota.0.data', array('value' => 1, 'type' => 'text'));
		//echo $this->Form->input('Confignota.0.tipo ', array('value' => 1, 'type' => 'text'));
		//echo $this->Form->input('Confignota.0.nota_fiscal  ', array('value' => 1, 'type' => 'text'));
		//echo $this->Form->input('Configproduto.0.nome', array('value' => 1, 'type' => 'text'));
		//echo $this->Form->input('Configproduto.0.codigo', array('value' => 1, 'type' => 'text'));
		
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Funcionarios'), array('controller' => 'funcionarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Funcionario'), array('controller' => 'funcionarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Configlotes'), array('controller' => 'configlotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configlote'), array('controller' => 'configlotes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Confignotas'), array('controller' => 'confignotas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Confignota'), array('controller' => 'confignotas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Configprodutos'), array('controller' => 'configprodutos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configproduto'), array('controller' => 'configprodutos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notas'), array('controller' => 'notas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nota'), array('controller' => 'notas', 'action' => 'add')); ?> </li>
	</ul>
</div>








<!-- Comentario Francisco -->

<!-- teste wagner-->
