<div class="empresas form">
<?php echo $this->Form->create('Empresa'); ?>
	<fieldset>
		<legend><?php echo __('Add Empresa'); ?></legend>
	<?php
		echo $this->Form->input('nome_fantasia');
		echo $this->Form->input('razao');
		echo $this->Form->input('cnpj');
		echo $this->Form->input('telefone');
		echo $this->Form->input('endereco');
		echo $this->Form->input('complemento');
		echo $this->Form->input('bairro');
		echo $this->Form->input('cidade');
		echo $this->Form->input('uf');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Empresas'), array('action' => 'index')); ?></li>
	</ul>
</div>
