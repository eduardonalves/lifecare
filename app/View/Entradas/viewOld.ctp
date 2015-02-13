<?php 
	$this->start('css');
	echo $this->Html->css('table.css');
	$this->end();
?>

<div class="entradas view">
<h2><?php echo __('Entrada'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Entrada'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['data_entrada']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entrada['User']['id'], array('controller' => 'users', 'action' => 'view', $entrada['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Origem'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['origem']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fornecedore'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entrada['Fornecedore']['nome'], array('controller' => 'fornecedores', 'action' => 'view', $entrada['Fornecedore']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nota Fiscal'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['nota_fiscal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Total'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['valor_total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tiposmovimentacao'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entrada['Tiposmovimentacao']['descricao'], array('controller' => 'tiposmovimentacaos', 'action' => 'view', $entrada['Tiposmovimentacao']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vb Icms'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['vb_icms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Icms'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['valor_icms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vb Cst'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['vb_cst']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor St'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['valor_st']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Frete'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['valor_frete']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Seguro'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['valor_seguro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Desconto'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['valor_desconto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vii'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['vii']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Ipi'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['valor_ipi']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Pis'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['valor_pis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('V Confins'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['v_confins']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Outros'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['valor_outros']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Entrada'), array('action' => 'edit', $entrada['Entrada']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Entrada'), array('action' => 'delete', $entrada['Entrada']['id']), null, __('Are you sure you want to delete # %s?', $entrada['Entrada']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entrada'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fornecedores'), array('controller' => 'fornecedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fornecedore'), array('controller' => 'fornecedores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tiposmovimentacaos'), array('controller' => 'tiposmovimentacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tiposmovimentacao'), array('controller' => 'tiposmovimentacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Itensentradas'), array('controller' => 'itensentradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Itensentrada'), array('controller' => 'itensentradas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lotesentradas'), array('controller' => 'lotesentradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lotesentrada'), array('controller' => 'lotesentradas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seriaisentradas'), array('controller' => 'seriaisentradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seriaisentrada'), array('controller' => 'seriaisentradas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Itensentradas'); ?></h3>
	<?php if (!empty($entrada['Itensentrada'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Entrada Id'); ?></th>
		<th><?php echo __('Produto Id'); ?></th>
		<th><?php echo __('Valor Unitario'); ?></th>
		<th><?php echo __('Qtde'); ?></th>
		<th><?php echo __('Valor Total'); ?></th>
		<th><?php echo __('Vb Icms'); ?></th>
		<th><?php echo __('P Icms'); ?></th>
		<th><?php echo __('Valor Icms'); ?></th>
		<th><?php echo __('Valor Ipi'); ?></th>
		<th><?php echo __('Vb Ipi'); ?></th>
		<th><?php echo __('P Ipi'); ?></th>
		<th><?php echo __('Vb St'); ?></th>
		<th><?php echo __('P St'); ?></th>
		<th><?php echo __('Valor St'); ?></th>
		<th><?php echo __('Vb Confins'); ?></th>
		<th><?php echo __('P Confins'); ?></th>
		<th><?php echo __('Valor Confins'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($entrada['Itensentrada'] as $itensentrada): ?>
		<tr>
			<td><?php echo $itensentrada['id']; ?></td>
			<td><?php echo $itensentrada['entrada_id']; ?></td>
			<td><?php echo $itensentrada['produto_id']; ?></td>
			<td><?php echo $itensentrada['valor_unitario']; ?></td>
			<td><?php echo $itensentrada['qtde']; ?></td>
			<td><?php echo $itensentrada['valor_total']; ?></td>
			<td><?php echo $itensentrada['vb_icms']; ?></td>
			<td><?php echo $itensentrada['p_icms']; ?></td>
			<td><?php echo $itensentrada['valor_icms']; ?></td>
			<td><?php echo $itensentrada['valor_ipi']; ?></td>
			<td><?php echo $itensentrada['vb_ipi']; ?></td>
			<td><?php echo $itensentrada['p_ipi']; ?></td>
			<td><?php echo $itensentrada['vb_st']; ?></td>
			<td><?php echo $itensentrada['p_st']; ?></td>
			<td><?php echo $itensentrada['valor_st']; ?></td>
			<td><?php echo $itensentrada['vb_confins']; ?></td>
			<td><?php echo $itensentrada['p_confins']; ?></td>
			<td><?php echo $itensentrada['valor_confins']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'itensentradas', 'action' => 'view', $itensentrada['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'itensentradas', 'action' => 'edit', $itensentrada['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'itensentradas', 'action' => 'delete', $itensentrada['id']), null, __('Are you sure you want to delete # %s?', $itensentrada['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Itensentrada'), array('controller' => 'itensentradas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Lotesentradas'); ?></h3>
	<?php if (!empty($entrada['Lotesentrada'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Produto Id'); ?></th>
		<th><?php echo __('Entrada Id'); ?></th>
		<th><?php echo __('Numero Lote'); ?></th>
		<th><?php echo __('Q Lote'); ?></th>
		<th><?php echo __('Data Fabricacao'); ?></th>
		<th><?php echo __('Data Validade'); ?></th>
		<th><?php echo __('V Pmc'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($entrada['Lotesentrada'] as $lotesentrada): ?>
		<tr>
			<td><?php echo $lotesentrada['id']; ?></td>
			<td><?php echo $lotesentrada['produto_id']; ?></td>
			<td><?php echo $lotesentrada['entrada_id']; ?></td>
			<td><?php echo $lotesentrada['numero_lote']; ?></td>
			<td><?php echo $lotesentrada['q_lote']; ?></td>
			<td><?php echo $lotesentrada['data_fabricacao']; ?></td>
			<td><?php echo $lotesentrada['data_validade']; ?></td>
			<td><?php echo $lotesentrada['v_pmc']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'lotesentradas', 'action' => 'view', $lotesentrada['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'lotesentradas', 'action' => 'edit', $lotesentrada['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'lotesentradas', 'action' => 'delete', $lotesentrada['id']), null, __('Are you sure you want to delete # %s?', $lotesentrada['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Lotesentrada'), array('controller' => 'lotesentradas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Seriaisentradas'); ?></h3>
	<?php if (!empty($entrada['Seriaisentrada'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Entrada Id'); ?></th>
		<th><?php echo __('Produto Id'); ?></th>
		<th><?php echo __('Serial'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($entrada['Seriaisentrada'] as $seriaisentrada): ?>
		<tr>
			<td><?php echo $seriaisentrada['id']; ?></td>
			<td><?php echo $seriaisentrada['entrada_id']; ?></td>
			<td><?php echo $seriaisentrada['produto_id']; ?></td>
			<td><?php echo $seriaisentrada['serial']; ?></td>
			<td><?php echo $seriaisentrada['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'seriaisentradas', 'action' => 'view', $seriaisentrada['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'seriaisentradas', 'action' => 'edit', $seriaisentrada['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'seriaisentradas', 'action' => 'delete', $seriaisentrada['id']), null, __('Are you sure you want to delete # %s?', $seriaisentrada['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Seriaisentrada'), array('controller' => 'seriaisentradas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
