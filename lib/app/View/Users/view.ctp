<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Funcionario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Funcionario']['id'], array('controller' => 'funcionarios', 'action' => 'view', $user['Funcionario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acesso'); ?></dt>
		<dd>
			<?php echo h($user['User']['acesso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Funcionarios'), array('controller' => 'funcionarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Funcionario'), array('controller' => 'funcionarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Configlotes'), array('controller' => 'configlotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configlote'), array('controller' => 'configlotes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Confignotas'), array('controller' => 'confignotas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Confignota'), array('controller' => 'confignotas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Configprodutos'), array('controller' => 'configprodutos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configproduto'), array('controller' => 'configprodutos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notas'), array('controller' => 'notas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nota'), array('controller' => 'notas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Configlotes'); ?></h3>
	<?php if (!empty($user['Configlote'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Numero Lote'); ?></th>
		<th><?php echo __('Data Fabricacao'); ?></th>
		<th><?php echo __('Data Validade'); ?></th>
		<th><?php echo __('Fabricante'); ?></th>
		<th><?php echo __('Estoque'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Configlote'] as $configlote): ?>
		<tr>
			<td><?php echo $configlote['id']; ?></td>
			<td><?php echo $configlote['user_id']; ?></td>
			<td><?php echo $configlote['numero_lote']; ?></td>
			<td><?php echo $configlote['data_fabricacao']; ?></td>
			<td><?php echo $configlote['data_validade']; ?></td>
			<td><?php echo $configlote['fabricante']; ?></td>
			<td><?php echo $configlote['estoque']; ?></td>
			<td><?php echo $configlote['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'configlotes', 'action' => 'view', $configlote['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'configlotes', 'action' => 'edit', $configlote['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'configlotes', 'action' => 'delete', $configlote['id']), null, __('Are you sure you want to delete # %s?', $configlote['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Configlote'), array('controller' => 'configlotes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Confignotas'); ?></h3>
	<?php if (!empty($user['Confignota'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Parceirodenegocio'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Nota Fiscal'); ?></th>
		<th><?php echo __('Valor Total'); ?></th>
		<th><?php echo __('Vb Icms'); ?></th>
		<th><?php echo __('Valor Icms'); ?></th>
		<th><?php echo __('Vb Cst'); ?></th>
		<th><?php echo __('Valor St'); ?></th>
		<th><?php echo __('Valor Frete'); ?></th>
		<th><?php echo __('Valor Seguro'); ?></th>
		<th><?php echo __('Valor Desconto'); ?></th>
		<th><?php echo __('Valor Ipi'); ?></th>
		<th><?php echo __('Valor Pis'); ?></th>
		<th><?php echo __('V Cofins'); ?></th>
		<th><?php echo __('Valor Outros'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Confignota'] as $confignota): ?>
		<tr>
			<td><?php echo $confignota['id']; ?></td>
			<td><?php echo $confignota['user_id']; ?></td>
			<td><?php echo $confignota['tipo']; ?></td>
			<td><?php echo $confignota['parceirodenegocio']; ?></td>
			<td><?php echo $confignota['data']; ?></td>
			<td><?php echo $confignota['descricao']; ?></td>
			<td><?php echo $confignota['nota_fiscal']; ?></td>
			<td><?php echo $confignota['valor_total']; ?></td>
			<td><?php echo $confignota['vb_icms']; ?></td>
			<td><?php echo $confignota['valor_icms']; ?></td>
			<td><?php echo $confignota['vb_cst']; ?></td>
			<td><?php echo $confignota['valor_st']; ?></td>
			<td><?php echo $confignota['valor_frete']; ?></td>
			<td><?php echo $confignota['valor_seguro']; ?></td>
			<td><?php echo $confignota['valor_desconto']; ?></td>
			<td><?php echo $confignota['valor_ipi']; ?></td>
			<td><?php echo $confignota['valor_pis']; ?></td>
			<td><?php echo $confignota['v_cofins']; ?></td>
			<td><?php echo $confignota['valor_outros']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'confignotas', 'action' => 'view', $confignota['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'confignotas', 'action' => 'edit', $confignota['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'confignotas', 'action' => 'delete', $confignota['id']), null, __('Are you sure you want to delete # %s?', $confignota['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Confignota'), array('controller' => 'confignotas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Configprodutos'); ?></h3>
	<?php if (!empty($user['Configproduto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Fabricante'); ?></th>
		<th><?php echo __('Composicao'); ?></th>
		<th><?php echo __('Unidade'); ?></th>
		<th><?php echo __('Dosagem'); ?></th>
		<th><?php echo __('Estoque'); ?></th>
		<th><?php echo __('Estoque Minimo'); ?></th>
		<th><?php echo __('Estoque Desejado'); ?></th>
		<th><?php echo __('Nivel'); ?></th>
		<th><?php echo __('Periodocriticovalidade'); ?></th>
		<th><?php echo __('Tags'); ?></th>
		<th><?php echo __('Preco Custo'); ?></th>
		<th><?php echo __('Preco Venda'); ?></th>
		<th><?php echo __('Ativo'); ?></th>
		<th><?php echo __('Bloqueado'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('CodigoEan'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Configproduto'] as $configproduto): ?>
		<tr>
			<td><?php echo $configproduto['id']; ?></td>
			<td><?php echo $configproduto['user_id']; ?></td>
			<td><?php echo $configproduto['nome']; ?></td>
			<td><?php echo $configproduto['descricao']; ?></td>
			<td><?php echo $configproduto['fabricante']; ?></td>
			<td><?php echo $configproduto['composicao']; ?></td>
			<td><?php echo $configproduto['unidade']; ?></td>
			<td><?php echo $configproduto['dosagem']; ?></td>
			<td><?php echo $configproduto['estoque']; ?></td>
			<td><?php echo $configproduto['estoque_minimo']; ?></td>
			<td><?php echo $configproduto['estoque_desejado']; ?></td>
			<td><?php echo $configproduto['nivel']; ?></td>
			<td><?php echo $configproduto['periodocriticovalidade']; ?></td>
			<td><?php echo $configproduto['tags']; ?></td>
			<td><?php echo $configproduto['preco_custo']; ?></td>
			<td><?php echo $configproduto['preco_venda']; ?></td>
			<td><?php echo $configproduto['ativo']; ?></td>
			<td><?php echo $configproduto['bloqueado']; ?></td>
			<td><?php echo $configproduto['codigo']; ?></td>
			<td><?php echo $configproduto['codigoEan']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'configprodutos', 'action' => 'view', $configproduto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'configprodutos', 'action' => 'edit', $configproduto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'configprodutos', 'action' => 'delete', $configproduto['id']), null, __('Are you sure you want to delete # %s?', $configproduto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Configproduto'), array('controller' => 'configprodutos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Notas'); ?></h3>
	<?php if (!empty($user['Nota'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Parceirodenegocio Id'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Nota Fiscal'); ?></th>
		<th><?php echo __('Valor Total'); ?></th>
		<th><?php echo __('Vb Icms'); ?></th>
		<th><?php echo __('Valor Icms'); ?></th>
		<th><?php echo __('Vb Cst'); ?></th>
		<th><?php echo __('Valor St'); ?></th>
		<th><?php echo __('Valor Frete'); ?></th>
		<th><?php echo __('Valor Seguro'); ?></th>
		<th><?php echo __('Valor Desconto'); ?></th>
		<th><?php echo __('Vii'); ?></th>
		<th><?php echo __('Valor Ipi'); ?></th>
		<th><?php echo __('Valor Pis'); ?></th>
		<th><?php echo __('V Cofins'); ?></th>
		<th><?php echo __('Valor Outros'); ?></th>
		<th><?php echo __('Url Xml'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Nota'] as $nota): ?>
		<tr>
			<td><?php echo $nota['id']; ?></td>
			<td><?php echo $nota['tipo']; ?></td>
			<td><?php echo $nota['parceirodenegocio_id']; ?></td>
			<td><?php echo $nota['data']; ?></td>
			<td><?php echo $nota['user_id']; ?></td>
			<td><?php echo $nota['descricao']; ?></td>
			<td><?php echo $nota['nota_fiscal']; ?></td>
			<td><?php echo $nota['valor_total']; ?></td>
			<td><?php echo $nota['vb_icms']; ?></td>
			<td><?php echo $nota['valor_icms']; ?></td>
			<td><?php echo $nota['vb_cst']; ?></td>
			<td><?php echo $nota['valor_st']; ?></td>
			<td><?php echo $nota['valor_frete']; ?></td>
			<td><?php echo $nota['valor_seguro']; ?></td>
			<td><?php echo $nota['valor_desconto']; ?></td>
			<td><?php echo $nota['vii']; ?></td>
			<td><?php echo $nota['valor_ipi']; ?></td>
			<td><?php echo $nota['valor_pis']; ?></td>
			<td><?php echo $nota['v_cofins']; ?></td>
			<td><?php echo $nota['valor_outros']; ?></td>
			<td><?php echo $nota['url_xml']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'notas', 'action' => 'view', $nota['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'notas', 'action' => 'edit', $nota['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'notas', 'action' => 'delete', $nota['id']), null, __('Are you sure you want to delete # %s?', $nota['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Nota'), array('controller' => 'notas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
