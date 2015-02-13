<div class="dadosbancarios view">
<h2><?php echo __('Dadosbancario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dadosbancario['Dadosbancario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Banco'); ?></dt>
		<dd>
			<?php echo h($dadosbancario['Dadosbancario']['numero_banco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome Banco'); ?></dt>
		<dd>
			<?php echo h($dadosbancario['Dadosbancario']['nome_banco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Agencia'); ?></dt>
		<dd>
			<?php echo h($dadosbancario['Dadosbancario']['numero_agencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome Agencia'); ?></dt>
		<dd>
			<?php echo h($dadosbancario['Dadosbancario']['nome_agencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefone Banco'); ?></dt>
		<dd>
			<?php echo h($dadosbancario['Dadosbancario']['telefone_banco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gerente'); ?></dt>
		<dd>
			<?php echo h($dadosbancario['Dadosbancario']['gerente']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conta'); ?></dt>
		<dd>
			<?php echo h($dadosbancario['Dadosbancario']['conta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dadosbancario['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $dadosbancario['Parceirodenegocio']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dadosbancario'), array('action' => 'edit', $dadosbancario['Dadosbancario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dadosbancario'), array('action' => 'delete', $dadosbancario['Dadosbancario']['id']), null, __('Are you sure you want to delete # %s?', $dadosbancario['Dadosbancario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dadosbancarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dadosbancario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
