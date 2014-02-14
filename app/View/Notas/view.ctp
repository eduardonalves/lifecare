<div class="notas view">
<h2><?php echo __('Nota'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($nota['Parceirodenegocio']['id'], array('controller' => 'parceirodenegocios', 'action' => 'view', $nota['Parceirodenegocio']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['data']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($nota['User']['id'], array('controller' => 'users', 'action' => 'view', $nota['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nota Fiscal'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['nota_fiscal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Total'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['valor_total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vb Icms'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['vb_icms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Icms'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['valor_icms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vb Cst'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['vb_cst']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor St'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['valor_st']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Frete'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['valor_frete']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Seguro'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['valor_seguro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Desconto'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['valor_desconto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vii'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['vii']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Ipi'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['valor_ipi']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Pis'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['valor_pis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('V Cofins'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['v_cofins']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Outros'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['valor_outros']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Nota'), array('action' => 'edit', $nota['Nota']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Nota'), array('action' => 'delete', $nota['Nota']['id']), null, __('Are you sure you want to delete # %s?', $nota['Nota']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Notas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nota'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Loteitens'), array('controller' => 'loteitens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Loteiten'), array('controller' => 'loteitens', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtoitens'), array('controller' => 'produtoitens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produtoiten'), array('controller' => 'produtoitens', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Loteitens'); ?></h3>
	<?php if (!empty($nota['Loteiten'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nota Id'); ?></th>
		<th><?php echo __('Lote Id'); ?></th>
		<th><?php echo __('Qtde'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($nota['Loteiten'] as $loteiten): ?>
		<tr>
			<td><?php echo $loteiten['id']; ?></td>
			<td><?php echo $loteiten['nota_id']; ?></td>
			<td><?php echo $loteiten['lote_id']; ?></td>
			<td><?php echo $loteiten['qtde']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'loteitens', 'action' => 'view', $loteiten['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'loteitens', 'action' => 'edit', $loteiten['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'loteitens', 'action' => 'delete', $loteiten['id']), null, __('Are you sure you want to delete # %s?', $loteiten['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Loteiten'), array('controller' => 'loteitens', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Produtoitens'); ?></h3>
	<?php if (!empty($nota['Produtoiten'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nota Id'); ?></th>
		<th><?php echo __('Produto Id'); ?></th>
		<th><?php echo __('Ncm Sh'); ?></th>
		<th><?php echo __('Cst'); ?></th>
		<th><?php echo __('Cfop'); ?></th>
		<th><?php echo __('Unidade'); ?></th>
		<th><?php echo __('Valor Unitario'); ?></th>
		<th><?php echo __('Qtde'); ?></th>
		<th><?php echo __('Valor Total'); ?></th>
		<th><?php echo __('Valorbase Icms'); ?></th>
		<th><?php echo __('Percentual Icms'); ?></th>
		<th><?php echo __('Valor Icms'); ?></th>
		<th><?php echo __('Valorbase St'); ?></th>
		<th><?php echo __('Percentual St'); ?></th>
		<th><?php echo __('Valor St'); ?></th>
		<th><?php echo __('Percentual Ipi'); ?></th>
		<th><?php echo __('Valor Ipi'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($nota['Produtoiten'] as $produtoiten): ?>
		<tr>
			<td><?php echo $produtoiten['id']; ?></td>
			<td><?php echo $produtoiten['nota_id']; ?></td>
			<td><?php echo $produtoiten['produto_id']; ?></td>
			<td><?php echo $produtoiten['ncm_sh']; ?></td>
			<td><?php echo $produtoiten['cst']; ?></td>
			<td><?php echo $produtoiten['cfop']; ?></td>
			<td><?php echo $produtoiten['unidade']; ?></td>
			<td><?php echo $produtoiten['valor_unitario']; ?></td>
			<td><?php echo $produtoiten['qtde']; ?></td>
			<td><?php echo $produtoiten['valor_total']; ?></td>
			<td><?php echo $produtoiten['valorbase_icms']; ?></td>
			<td><?php echo $produtoiten['percentual_icms']; ?></td>
			<td><?php echo $produtoiten['valor_icms']; ?></td>
			<td><?php echo $produtoiten['valorbase_st']; ?></td>
			<td><?php echo $produtoiten['percentual_st']; ?></td>
			<td><?php echo $produtoiten['valor_st']; ?></td>
			<td><?php echo $produtoiten['percentual_ipi']; ?></td>
			<td><?php echo $produtoiten['valor_ipi']; ?></td>
			<td><?php echo $produtoiten['tipo']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'produtoitens', 'action' => 'view', $produtoiten['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'produtoitens', 'action' => 'edit', $produtoiten['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'produtoitens', 'action' => 'delete', $produtoiten['id']), null, __('Are you sure you want to delete # %s?', $produtoiten['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Produtoiten'), array('controller' => 'produtoitens', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
