<div class="configprodutos form">
<?php echo $this->Form->create('Configproduto'); ?>
	<fieldset>
		<legend><?php echo __('Edit Configproduto'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('nome');
		echo $this->Form->input('descricao');
		echo $this->Form->input('fabricante');
		echo $this->Form->input('composicao');
		echo $this->Form->input('unidade');
		echo $this->Form->input('dosagem');
		echo $this->Form->input('estoque');
		echo $this->Form->input('estoque_minimo');
		echo $this->Form->input('estoque_desejado');
		echo $this->Form->input('nivel');
		echo $this->Form->input('periodocriticovalidade');
		echo $this->Form->input('tags');
		echo $this->Form->input('preco_custo');
		echo $this->Form->input('preco_venda');
		echo $this->Form->input('ativo');
		echo $this->Form->input('bloqueado');
		echo $this->Form->input('codigo');
		echo $this->Form->input('codigoEan');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Configproduto.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Configproduto.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Configprodutos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
