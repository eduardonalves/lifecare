<div class="situacaotribcofins view">
<h2><?php echo __('Situacaotribcofin'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($situacaotribcofin['Situacaotribcofin']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($situacaotribcofin['Situacaotribcofin']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($situacaotribcofin['Situacaotribcofin']['codigo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Situacaotribcofin'), array('action' => 'edit', $situacaotribcofin['Situacaotribcofin']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Situacaotribcofin'), array('action' => 'delete', $situacaotribcofin['Situacaotribcofin']['id']), null, __('Are you sure you want to delete # %s?', $situacaotribcofin['Situacaotribcofin']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Situacaotribcofins'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Situacaotribcofin'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cofins'), array('controller' => 'cofins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cofin'), array('controller' => 'cofins', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cofins'); ?></h3>
	<?php if (!empty($situacaotribcofin['Cofin'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Produto Id'); ?></th>
		<th><?php echo __('Situacaotribcofin Id'); ?></th>
		<th><?php echo __('Tipodecalculo'); ?></th>
		<th><?php echo __('Valorunitcofins'); ?></th>
		<th><?php echo __('Aliq Cofins'); ?></th>
		<th><?php echo __('Aliq Cofinsst'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($situacaotribcofin['Cofin'] as $cofin): ?>
		<tr>
			<td><?php echo $cofin['id']; ?></td>
			<td><?php echo $cofin['produto_id']; ?></td>
			<td><?php echo $cofin['situacaotribcofin_id']; ?></td>
			<td><?php echo $cofin['tipodecalculo']; ?></td>
			<td><?php echo $cofin['valorunitcofins']; ?></td>
			<td><?php echo $cofin['aliq_cofins']; ?></td>
			<td><?php echo $cofin['aliq_cofinsst']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cofins', 'action' => 'view', $cofin['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cofins', 'action' => 'edit', $cofin['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cofins', 'action' => 'delete', $cofin['id']), null, __('Are you sure you want to delete # %s?', $cofin['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cofin'), array('controller' => 'cofins', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
