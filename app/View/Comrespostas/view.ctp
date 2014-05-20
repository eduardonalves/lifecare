<div class="comrespostas view">
<h2><?php echo __('Comresposta'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($comresposta['Comresposta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comoperacao'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comresposta['Comoperacao']['id'], array('controller' => 'comoperacaos', 'action' => 'view', $comresposta['Comoperacao']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Resposta'); ?></dt>
		<dd>
			<?php echo h($comresposta['Comresposta']['data_resposta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comresposta['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $comresposta['Parceirodenegocio']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Forma Pagamento'); ?></dt>
		<dd>
			<?php echo h($comresposta['Comresposta']['forma_pagamento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prazo Entrega'); ?></dt>
		<dd>
			<?php echo h($comresposta['Comresposta']['prazo_entrega']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($comresposta['Comresposta']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Obs'); ?></dt>
		<dd>
			<?php echo h($comresposta['Comresposta']['obs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($comresposta['Comresposta']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Comresposta'), array('action' => 'edit', $comresposta['Comresposta']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Comresposta'), array('action' => 'delete', $comresposta['Comresposta']['id']), null, __('Are you sure you want to delete # %s?', $comresposta['Comresposta']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Comrespostas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comresposta'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comoperacaos'), array('controller' => 'comoperacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comoperacao'), array('controller' => 'comoperacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comtokencotacaos'), array('controller' => 'comtokencotacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comtokencotacao'), array('controller' => 'comtokencotacaos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Comtokencotacaos'); ?></h3>
	<?php if (!empty($comresposta['Comtokencotacao'])): ?>
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
	<?php foreach ($comresposta['Comtokencotacao'] as $comtokencotacao): ?>
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
