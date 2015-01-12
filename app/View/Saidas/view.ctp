<div class="saidas view">
<h2><?php echo __('Saida'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Nota'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['numero_nota']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codnota'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['codnota']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tpemis'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['tpemis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cdv'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['cdv']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $saida['Parceirodenegocio']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['data']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Entrada'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['data_entrada']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Saida'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['data_saida']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vendedor Id'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['vendedor_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Natop'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Natop']['id'], array('controller' => 'natops', 'action' => 'view', $saida['Natop']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pedidovenda'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Pedidovenda']['id'], array('controller' => 'pedidovendas', 'action' => 'view', $saida['Pedidovenda']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cuf'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Cuf']['id'], array('controller' => 'cufs', 'action' => 'view', $saida['Cuf']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Indpag'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Indpag']['id'], array('controller' => 'indpags', 'action' => 'view', $saida['Indpag']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mod'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Mod']['id'], array('controller' => 'mods', 'action' => 'view', $saida['Mod']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Serie'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Serie']['id'], array('controller' => 'series', 'action' => 'view', $saida['Serie']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tpnf'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Tpnf']['id'], array('controller' => 'tpnfs', 'action' => 'view', $saida['Tpnf']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cmunfg'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Cmunfg']['id'], array('controller' => 'cmunfgs', 'action' => 'view', $saida['Cmunfg']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tpimp'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Tpimp']['id'], array('controller' => 'tpimps', 'action' => 'view', $saida['Tpimp']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cdv'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Cdv']['id'], array('controller' => 'cdvs', 'action' => 'view', $saida['Cdv']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tpamb'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Tpamb']['id'], array('controller' => 'tpambs', 'action' => 'view', $saida['Tpamb']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Finnfe'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Finnfe']['id'], array('controller' => 'finnves', 'action' => 'view', $saida['Finnfe']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Procemi'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Procemi']['id'], array('controller' => 'procemis', 'action' => 'view', $saida['Procemi']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Verproc'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Verproc']['id'], array('controller' => 'verprocs', 'action' => 'view', $saida['Verproc']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Total Produtos'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['valor_total_produtos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nota Fiscal'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['nota_fiscal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Total'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['valor_total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vb Icms'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['vb_icms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Icms'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['valor_icms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vb Cst'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['vb_cst']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor St'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['valor_st']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Frete'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['valor_frete']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Seguro'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['valor_seguro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Desconto'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['valor_desconto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vii'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['vii']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Ipi'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['valor_ipi']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Pis'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['valor_pis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('V Cofins'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['v_cofins']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Outros'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['valor_outros']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transp'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Transp']['id'], array('controller' => 'transps', 'action' => 'view', $saida['Transp']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modfrete'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['modfrete']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Freteproprio'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['freteproprio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transportadore'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Transportadore']['nome'], array('controller' => 'transportadores', 'action' => 'view', $saida['Transportadore']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Origem'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['origem']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Chave Acesso'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['chave_acesso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Forma De Entrada'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['forma_de_entrada']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceiro'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['parceiro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Devolucao'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['devolucao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Obs'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['obs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Infoadic'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['infoadic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status Estoque'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['status_estoque']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status Financeiro'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['status_financeiro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status Faturamento'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['status_faturamento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status Geral'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['status_geral']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Saida'), array('action' => 'edit', $saida['Saida']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Saida'), array('action' => 'delete', $saida['Saida']['id']), null, __('Are you sure you want to delete # %s?', $saida['Saida']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Saidas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Saida'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transportadores'), array('controller' => 'transportadores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transportadore'), array('controller' => 'transportadores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cufs'), array('controller' => 'cufs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuf'), array('controller' => 'cufs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pedidovendas'), array('controller' => 'pedidovendas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedidovenda'), array('controller' => 'pedidovendas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comoperacaos'), array('controller' => 'comoperacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comoperacao'), array('controller' => 'comoperacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Indpags'), array('controller' => 'indpags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Indpag'), array('controller' => 'indpags', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mods'), array('controller' => 'mods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mod'), array('controller' => 'mods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Series'), array('controller' => 'series', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Serie'), array('controller' => 'series', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tpnfs'), array('controller' => 'tpnfs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tpnf'), array('controller' => 'tpnfs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cmunfgs'), array('controller' => 'cmunfgs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cmunfg'), array('controller' => 'cmunfgs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tpimps'), array('controller' => 'tpimps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tpimp'), array('controller' => 'tpimps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cdvs'), array('controller' => 'cdvs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cdv'), array('controller' => 'cdvs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tpambs'), array('controller' => 'tpambs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tpamb'), array('controller' => 'tpambs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Finnves'), array('controller' => 'finnves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Finnfe'), array('controller' => 'finnves', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Procemis'), array('controller' => 'procemis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Procemi'), array('controller' => 'procemis', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Verprocs'), array('controller' => 'verprocs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Verproc'), array('controller' => 'verprocs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transps'), array('controller' => 'transps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transp'), array('controller' => 'transps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Natops'), array('controller' => 'natops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Natop'), array('controller' => 'natops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtoitens'), array('controller' => 'produtoitens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produtoiten'), array('controller' => 'produtoitens', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Loteitens'), array('controller' => 'loteitens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Loteiten'), array('controller' => 'loteitens', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Produtoitens'); ?></h3>
	<?php if (!empty($saida['Produtoiten'])): ?>
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
		<th><?php echo __('Valorbase Cofins'); ?></th>
		<th><?php echo __('Percentual Cofins'); ?></th>
		<th><?php echo __('Valor Cofins'); ?></th>
		<th><?php echo __('Frete'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($saida['Produtoiten'] as $produtoiten): ?>
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
			<td><?php echo $produtoiten['valorbase_cofins']; ?></td>
			<td><?php echo $produtoiten['percentual_cofins']; ?></td>
			<td><?php echo $produtoiten['valor_cofins']; ?></td>
			<td><?php echo $produtoiten['frete']; ?></td>
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
<div class="related">
	<h3><?php echo __('Related Loteitens'); ?></h3>
	<?php if (!empty($saida['Loteiten'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nota Id'); ?></th>
		<th><?php echo __('Lote Id'); ?></th>
		<th><?php echo __('Produto Id'); ?></th>
		<th><?php echo __('Produtoiten Id'); ?></th>
		<th><?php echo __('Qtde'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($saida['Loteiten'] as $loteiten): ?>
		<tr>
			<td><?php echo $loteiten['id']; ?></td>
			<td><?php echo $loteiten['nota_id']; ?></td>
			<td><?php echo $loteiten['lote_id']; ?></td>
			<td><?php echo $loteiten['produto_id']; ?></td>
			<td><?php echo $loteiten['produtoiten_id']; ?></td>
			<td><?php echo $loteiten['qtde']; ?></td>
			<td><?php echo $loteiten['tipo']; ?></td>
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
	<h3><?php echo __('Related Produtos'); ?></h3>
	<?php if (!empty($saida['Produto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Origem Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('CodigoEan'); ?></th>
		<th><?php echo __('Ncm'); ?></th>
		<th><?php echo __('Cfop'); ?></th>
		<th><?php echo __('Obs Nota'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('NomeComercial'); ?></th>
		<th><?php echo __('PrincipioAtivo'); ?></th>
		<th><?php echo __('Registro'); ?></th>
		<th><?php echo __('Corredor'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Fabricante'); ?></th>
		<th><?php echo __('Composicao'); ?></th>
		<th><?php echo __('Unidade'); ?></th>
		<th><?php echo __('Dosagem'); ?></th>
		<th><?php echo __('Estoque'); ?></th>
		<th><?php echo __('Estoque Minimo'); ?></th>
		<th><?php echo __('Estoque Desejado'); ?></th>
		<th><?php echo __('Reserva'); ?></th>
		<th><?php echo __('Disponivel'); ?></th>
		<th><?php echo __('Periodocriticovalidade'); ?></th>
		<th><?php echo __('Nivel'); ?></th>
		<th><?php echo __('Tags'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Preco Custo'); ?></th>
		<th><?php echo __('Preco Venda'); ?></th>
		<th><?php echo __('Precomax Consumidor'); ?></th>
		<th><?php echo __('Ativo'); ?></th>
		<th><?php echo __('Bloqueado'); ?></th>
		<th><?php echo __('CodigoFGV'); ?></th>
		<th><?php echo __('PrecoFGV'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($saida['Produto'] as $produto): ?>
		<tr>
			<td><?php echo $produto['id']; ?></td>
			<td><?php echo $produto['origem_id']; ?></td>
			<td><?php echo $produto['codigo']; ?></td>
			<td><?php echo $produto['codigoEan']; ?></td>
			<td><?php echo $produto['ncm']; ?></td>
			<td><?php echo $produto['cfop']; ?></td>
			<td><?php echo $produto['obs_nota']; ?></td>
			<td><?php echo $produto['nome']; ?></td>
			<td><?php echo $produto['nomeComercial']; ?></td>
			<td><?php echo $produto['principioAtivo']; ?></td>
			<td><?php echo $produto['registro']; ?></td>
			<td><?php echo $produto['corredor']; ?></td>
			<td><?php echo $produto['descricao']; ?></td>
			<td><?php echo $produto['fabricante']; ?></td>
			<td><?php echo $produto['composicao']; ?></td>
			<td><?php echo $produto['unidade']; ?></td>
			<td><?php echo $produto['dosagem']; ?></td>
			<td><?php echo $produto['estoque']; ?></td>
			<td><?php echo $produto['estoque_minimo']; ?></td>
			<td><?php echo $produto['estoque_desejado']; ?></td>
			<td><?php echo $produto['reserva']; ?></td>
			<td><?php echo $produto['disponivel']; ?></td>
			<td><?php echo $produto['periodocriticovalidade']; ?></td>
			<td><?php echo $produto['nivel']; ?></td>
			<td><?php echo $produto['tags']; ?></td>
			<td><?php echo $produto['created']; ?></td>
			<td><?php echo $produto['modified']; ?></td>
			<td><?php echo $produto['preco_custo']; ?></td>
			<td><?php echo $produto['preco_venda']; ?></td>
			<td><?php echo $produto['precomax_consumidor']; ?></td>
			<td><?php echo $produto['ativo']; ?></td>
			<td><?php echo $produto['bloqueado']; ?></td>
			<td><?php echo $produto['codigoFGV']; ?></td>
			<td><?php echo $produto['precoFGV']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'produtos', 'action' => 'view', $produto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'produtos', 'action' => 'edit', $produto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'produtos', 'action' => 'delete', $produto['id']), null, __('Are you sure you want to delete # %s?', $produto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
