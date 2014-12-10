<div class="situacaotribicms view">
<h2><?php echo __('Situacaotribicm'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($situacaotribicm['Situacaotribicm']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($situacaotribicm['Situacaotribicm']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($situacaotribicm['Situacaotribicm']['codigo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Combinação'); ?></dt>
		<dd>
			<?php echo h($situacaotribicm['Situacaotribicm']['combinacao']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Situacaotribicm'), array('action' => 'edit', $situacaotribicm['Situacaotribicm']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Situacaotribicm'), array('action' => 'delete', $situacaotribicm['Situacaotribicm']['id']), null, __('Are you sure you want to delete # %s?', $situacaotribicm['Situacaotribicm']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Situacaotribicms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Situacaotribicm'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Icms'), array('controller' => 'icms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Icm'), array('controller' => 'icms', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Icms'); ?></h3>
	<?php if (!empty($situacaotribicm['Icm'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Produto Id'); ?></th>
		<th><?php echo __('Modalidadebc Id'); ?></th>
		<th><?php echo __('Modalidadebcst Id'); ?></th>
		<th><?php echo __('Situacaotribicm Id'); ?></th>
		<th><?php echo __('Aliq Icms'); ?></th>
		<th><?php echo __('Margemvaloradic'); ?></th>
		<th><?php echo __('Reducaobasecalcst'); ?></th>
		<th><?php echo __('Precounitpautast'); ?></th>
		<th><?php echo __('Alq Icmsst'); ?></th>
		<th><?php echo __('Motivodesoneracao Id'); ?></th>
		<th><?php echo __('Percentualbcoppropria'); ?></th>
		<th><?php echo __('Ufpgtoicmsst'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($situacaotribicm['Icm'] as $icm): ?>
		<tr>
			<td><?php echo $icm['id']; ?></td>
			<td><?php echo $icm['produto_id']; ?></td>
			<td><?php echo $icm['modalidadebc_id']; ?></td>
			<td><?php echo $icm['modalidadebcst_id']; ?></td>
			<td><?php echo $icm['situacaotribicm_id']; ?></td>
			<td><?php echo $icm['aliq_icms']; ?></td>
			<td><?php echo $icm['margemvaloradic']; ?></td>
			<td><?php echo $icm['reducaobasecalcst']; ?></td>
			<td><?php echo $icm['precounitpautast']; ?></td>
			<td><?php echo $icm['alq_icmsst']; ?></td>
			<td><?php echo $icm['motivodesoneracao_id']; ?></td>
			<td><?php echo $icm['percentualbcoppropria']; ?></td>
			<td><?php echo $icm['ufpgtoicmsst']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'icms', 'action' => 'view', $icm['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'icms', 'action' => 'edit', $icm['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'icms', 'action' => 'delete', $icm['id']), null, __('Are you sure you want to delete # %s?', $icm['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Icm'), array('controller' => 'icms', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
