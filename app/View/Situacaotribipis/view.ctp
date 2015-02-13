<div class="situacaotribipis view">
<h2><?php echo __('Situacaotribipi'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($situacaotribipi['Situacaotribipi']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($situacaotribipi['Situacaotribipi']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($situacaotribipi['Situacaotribipi']['codigo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Situacaotribipi'), array('action' => 'edit', $situacaotribipi['Situacaotribipi']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Situacaotribipi'), array('action' => 'delete', $situacaotribipi['Situacaotribipi']['id']), null, __('Are you sure you want to delete # %s?', $situacaotribipi['Situacaotribipi']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Situacaotribipis'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Situacaotribipi'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ipis'), array('controller' => 'ipis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ipi'), array('controller' => 'ipis', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Ipis'); ?></h3>
	<?php if (!empty($situacaotribipi['Ipi'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Produto Id'); ?></th>
		<th><?php echo __('Situacaotribipi Id'); ?></th>
		<th><?php echo __('Classe Enquadramento'); ?></th>
		<th><?php echo __('Cnpj Produtor'); ?></th>
		<th><?php echo __('Codigo Selo'); ?></th>
		<th><?php echo __('Qtd Selo'); ?></th>
		<th><?php echo __('Tipodecalculo'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($situacaotribipi['Ipi'] as $ipi): ?>
		<tr>
			<td><?php echo $ipi['id']; ?></td>
			<td><?php echo $ipi['produto_id']; ?></td>
			<td><?php echo $ipi['situacaotribipi_id']; ?></td>
			<td><?php echo $ipi['classe_enquadramento']; ?></td>
			<td><?php echo $ipi['cnpj_produtor']; ?></td>
			<td><?php echo $ipi['codigo_selo']; ?></td>
			<td><?php echo $ipi['qtd_selo']; ?></td>
			<td><?php echo $ipi['tipodecalculo']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ipis', 'action' => 'view', $ipi['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ipis', 'action' => 'edit', $ipi['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ipis', 'action' => 'delete', $ipi['id']), null, __('Are you sure you want to delete # %s?', $ipi['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ipi'), array('controller' => 'ipis', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
