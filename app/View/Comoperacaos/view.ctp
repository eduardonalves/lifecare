<div class="comoperacaos view">
<h2><?php echo __('Comoperacao'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($comoperacao['Comoperacao']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Inici'); ?></dt>
		<dd>
			<?php echo h($comoperacao['Comoperacao']['data_inici']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Fim'); ?></dt>
		<dd>
			<?php echo h($comoperacao['Comoperacao']['data_fim']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comoperacao['User']['id'], array('controller' => 'users', 'action' => 'view', $comoperacao['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($comoperacao['Comoperacao']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prazo Entrega'); ?></dt>
		<dd>
			<?php echo h($comoperacao['Comoperacao']['prazo_entrega']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Forma Pagamento'); ?></dt>
		<dd>
			<?php echo h($comoperacao['Comoperacao']['forma_pagamento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($comoperacao['Comoperacao']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Comoperacao'), array('action' => 'edit', $comoperacao['Comoperacao']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Comoperacao'), array('action' => 'delete', $comoperacao['Comoperacao']['id']), null, __('Are you sure you want to delete # %s?', $comoperacao['Comoperacao']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Comoperacaos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comoperacao'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comitensdaoperacaos'), array('controller' => 'comitensdaoperacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comitensdaoperacao'), array('controller' => 'comitensdaoperacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comrespostas'), array('controller' => 'comrespostas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comresposta'), array('controller' => 'comrespostas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comtokencotacaos'), array('controller' => 'comtokencotacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comtokencotacao'), array('controller' => 'comtokencotacaos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Comitensdaoperacaos'); ?></h3>
	<?php if (!empty($comoperacao['Comitensdaoperacao'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Comoperacao Id'); ?></th>
		<th><?php echo __('Produto Id'); ?></th>
		<th><?php echo __('Valor Unit'); ?></th>
		<th><?php echo __('Qtde'); ?></th>
		<th><?php echo __('Valor Total'); ?></th>
		<th><?php echo __('Parceirodenegocio Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($comoperacao['Comitensdaoperacao'] as $comitensdaoperacao): ?>
		<tr>
			<td><?php echo $comitensdaoperacao['id']; ?></td>
			<td><?php echo $comitensdaoperacao['comoperacao_id']; ?></td>
			<td><?php echo $comitensdaoperacao['produto_id']; ?></td>
			<td><?php echo $comitensdaoperacao['valor_unit']; ?></td>
			<td><?php echo $comitensdaoperacao['qtde']; ?></td>
			<td><?php echo $comitensdaoperacao['valor_total']; ?></td>
			<td><?php echo $comitensdaoperacao['parceirodenegocio_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'comitensdaoperacaos', 'action' => 'view', $comitensdaoperacao['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'comitensdaoperacaos', 'action' => 'edit', $comitensdaoperacao['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comitensdaoperacaos', 'action' => 'delete', $comitensdaoperacao['id']), null, __('Are you sure you want to delete # %s?', $comitensdaoperacao['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comitensdaoperacao'), array('controller' => 'comitensdaoperacaos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Comrespostas'); ?></h3>
	<?php if (!empty($comoperacao['Comresposta'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Comoperacao Id'); ?></th>
		<th><?php echo __('Data Resposta'); ?></th>
		<th><?php echo __('Parceirodenegocio Id'); ?></th>
		<th><?php echo __('Forma Pagamento'); ?></th>
		<th><?php echo __('Prazo Entrega'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Obs'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($comoperacao['Comresposta'] as $comresposta): ?>
		<tr>
			<td><?php echo $comresposta['id']; ?></td>
			<td><?php echo $comresposta['comoperacao_id']; ?></td>
			<td><?php echo $comresposta['data_resposta']; ?></td>
			<td><?php echo $comresposta['parceirodenegocio_id']; ?></td>
			<td><?php echo $comresposta['forma_pagamento']; ?></td>
			<td><?php echo $comresposta['prazo_entrega']; ?></td>
			<td><?php echo $comresposta['valor']; ?></td>
			<td><?php echo $comresposta['obs']; ?></td>
			<td><?php echo $comresposta['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'comrespostas', 'action' => 'view', $comresposta['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'comrespostas', 'action' => 'edit', $comresposta['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comrespostas', 'action' => 'delete', $comresposta['id']), null, __('Are you sure you want to delete # %s?', $comresposta['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comresposta'), array('controller' => 'comrespostas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Comtokencotacaos'); ?></h3>
	<?php if (!empty($comoperacao['Comtokencotacao'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Comoperacao Id'); ?></th>
		<th><?php echo __('Parceirodenegocio Id'); ?></th>
		<th><?php echo __('Comresposta Id'); ?></th>
		<th><?php echo __('Respondido'); ?></th>
		<th><?php echo __('Codigoseguranca'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($comoperacao['Comtokencotacao'] as $comtokencotacao): ?>
		<tr>
			<td><?php echo $comtokencotacao['id']; ?></td>
			<td><?php echo $comtokencotacao['comoperacao_id']; ?></td>
			<td><?php echo $comtokencotacao['parceirodenegocio_id']; ?></td>
			<td><?php echo $comtokencotacao['comresposta_id']; ?></td>
			<td><?php echo $comtokencotacao['respondido']; ?></td>
			<td><?php echo $comtokencotacao['codigoseguranca']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'comtokencotacaos', 'action' => 'view', $comtokencotacao['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'comtokencotacaos', 'action' => 'edit', $comtokencotacao['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comtokencotacaos', 'action' => 'delete', $comtokencotacao['id']), null, __('Are you sure you want to delete # %s?', $comtokencotacao['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comtokencotacao'), array('controller' => 'comtokencotacaos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
