<div class="empresas index">
	<h2><?php echo __('Empresas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome_fantasia'); ?></th>
			<th><?php echo $this->Paginator->sort('razao'); ?></th>
			<th><?php echo $this->Paginator->sort('cnpj'); ?></th>
			<th><?php echo $this->Paginator->sort('telefone'); ?></th>
			<th><?php echo $this->Paginator->sort('endereco'); ?></th>
			<th><?php echo $this->Paginator->sort('complemento'); ?></th>
			<th><?php echo $this->Paginator->sort('bairro'); ?></th>
			<th><?php echo $this->Paginator->sort('cidade'); ?></th>
			<th><?php echo $this->Paginator->sort('uf'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($empresas as $empresa): ?>
	<tr>
		<td><?php echo h($empresa['Empresa']['id']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['nome_fantasia']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['razao']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['cnpj']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['telefone']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['endereco']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['complemento']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['bairro']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['cidade']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['uf']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $empresa['Empresa']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $empresa['Empresa']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $empresa['Empresa']['id']), null, __('Are you sure you want to delete # %s?', $empresa['Empresa']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Empresa'), array('action' => 'add')); ?></li>
	</ul>
</div>
