<div class="empresas view">
<h2><?php echo __('Empresa'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome Fantasia'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['nome_fantasia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Razao'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['razao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cnpj'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['cnpj']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['telefone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Endereco'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['endereco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Complemento'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['complemento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bairro'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['bairro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['cidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uf'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['uf']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Empresa'), array('action' => 'edit', $empresa['Empresa']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Empresa'), array('action' => 'delete', $empresa['Empresa']['id']), null, __('Are you sure you want to delete # %s?', $empresa['Empresa']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('action' => 'add')); ?> </li>
	</ul>
</div>
