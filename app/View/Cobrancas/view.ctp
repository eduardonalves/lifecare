<div class="cobrancas view">
<h2><?php echo __('Cobranca'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cobranca['Cobranca']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parcela'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cobranca['Parcela']['id'], array('controller' => 'parcelas', 'action' => 'view', $cobranca['Parcela']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Negociacao Id'); ?></dt>
		<dd>
			<?php echo h($cobranca['Cobranca']['negociacao_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Inicio'); ?></dt>
		<dd>
			<?php echo h($cobranca['Cobranca']['data_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Fim'); ?></dt>
		<dd>
			<?php echo h($cobranca['Cobranca']['data_fim']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($cobranca['Cobranca']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cobranca'), array('action' => 'edit', $cobranca['Cobranca']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cobranca'), array('action' => 'delete', $cobranca['Cobranca']['id']), null, __('Are you sure you want to delete # %s?', $cobranca['Cobranca']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cobrancas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cobranca'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parcelas'), array('controller' => 'parcelas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parcela'), array('controller' => 'parcelas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Negociacaos'), array('controller' => 'negociacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Negociacao'), array('controller' => 'negociacaos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Negociacaos'); ?></h3>
	<?php if (!empty($cobranca['Negociacao'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('Obs'); ?></th>
		<th><?php echo __('Parceirodenegocio Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cobranca['Negociacao'] as $negociacao): ?>
		<tr>
			<td><?php echo $negociacao['id']; ?></td>
			<td><?php echo $negociacao['data']; ?></td>
			<td><?php echo $negociacao['obs']; ?></td>
			<td><?php echo $negociacao['parceirodenegocio_id']; ?></td>
			<td><?php echo $negociacao['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'negociacaos', 'action' => 'view', $negociacao['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'negociacaos', 'action' => 'edit', $negociacao['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'negociacaos', 'action' => 'delete', $negociacao['id']), null, __('Are you sure you want to delete # %s?', $negociacao['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Negociacao'), array('controller' => 'negociacaos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
