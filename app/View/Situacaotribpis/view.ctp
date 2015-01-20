<div class="situacaotribpis view">
<h2><?php echo __('Situacaotribpi'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($situacaotribpi['Situacaotribpi']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($situacaotribpi['Situacaotribpi']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($situacaotribpi['Situacaotribpi']['codigo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Situacaotribpi'), array('action' => 'edit', $situacaotribpi['Situacaotribpi']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Situacaotribpi'), array('action' => 'delete', $situacaotribpi['Situacaotribpi']['id']), null, __('Are you sure you want to delete # %s?', $situacaotribpi['Situacaotribpi']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Situacaotribpis'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Situacaotribpi'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pis'), array('controller' => 'pis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pi'), array('controller' => 'pis', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Pis'); ?></h3>
	<?php if (!empty($situacaotribpi['Pi'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Situacaotribpi Id'); ?></th>
		<th><?php echo __('Alq Pis'); ?></th>
		<th><?php echo __('Tipodecalculo'); ?></th>
		<th><?php echo __('Produto Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($situacaotribpi['Pi'] as $pi): ?>
		<tr>
			<td><?php echo $pi['id']; ?></td>
			<td><?php echo $pi['situacaotribpi_id']; ?></td>
			<td><?php echo $pi['alq_pis']; ?></td>
			<td><?php echo $pi['tipodecalculo']; ?></td>
			<td><?php echo $pi['produto_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pis', 'action' => 'view', $pi['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pis', 'action' => 'edit', $pi['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pis', 'action' => 'delete', $pi['id']), null, __('Are you sure you want to delete # %s?', $pi['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pi'), array('controller' => 'pis', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
