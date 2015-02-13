<div class="saidas index">
	<h2><?php echo __('Saidas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo'); ?></th>
			<th><?php echo $this->Paginator->sort('numero_nota'); ?></th>
			<th><?php echo $this->Paginator->sort('codnota'); ?></th>
			<th><?php echo $this->Paginator->sort('tpemis'); ?></th>
			<th><?php echo $this->Paginator->sort('cdv'); ?></th>
			<th><?php echo $this->Paginator->sort('parceirodenegocio_id'); ?></th>
			<th><?php echo $this->Paginator->sort('data'); ?></th>
			<th><?php echo $this->Paginator->sort('data_entrada'); ?></th>
			<th><?php echo $this->Paginator->sort('data_saida'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('vendedor_id'); ?></th>
			<th><?php echo $this->Paginator->sort('natop_id'); ?></th>
			<th><?php echo $this->Paginator->sort('comoperacao_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cuf_id'); ?></th>
			<th><?php echo $this->Paginator->sort('indpag_id'); ?></th>
			<th><?php echo $this->Paginator->sort('mod_id'); ?></th>
			<th><?php echo $this->Paginator->sort('serie_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tpnf_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cmunfg_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tpimp_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cdv_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tpamb_id'); ?></th>
			<th><?php echo $this->Paginator->sort('finnfe_id'); ?></th>
			<th><?php echo $this->Paginator->sort('procemi_id'); ?></th>
			<th><?php echo $this->Paginator->sort('verproc_id'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_total_produtos'); ?></th>
			<th><?php echo $this->Paginator->sort('nota_fiscal'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_total'); ?></th>
			<th><?php echo $this->Paginator->sort('vb_icms'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_icms'); ?></th>
			<th><?php echo $this->Paginator->sort('vb_cst'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_st'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_frete'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_seguro'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_desconto'); ?></th>
			<th><?php echo $this->Paginator->sort('vii'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_ipi'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_pis'); ?></th>
			<th><?php echo $this->Paginator->sort('v_cofins'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_outros'); ?></th>
			<th><?php echo $this->Paginator->sort('transp_id'); ?></th>
			<th><?php echo $this->Paginator->sort('modfrete'); ?></th>
			<th><?php echo $this->Paginator->sort('freteproprio'); ?></th>
			<th><?php echo $this->Paginator->sort('transportadore_id'); ?></th>
			<th><?php echo $this->Paginator->sort('origem'); ?></th>
			<th><?php echo $this->Paginator->sort('chave_acesso'); ?></th>
			<th><?php echo $this->Paginator->sort('forma_de_entrada'); ?></th>
			<th><?php echo $this->Paginator->sort('parceiro'); ?></th>
			<th><?php echo $this->Paginator->sort('devolucao'); ?></th>
			<th><?php echo $this->Paginator->sort('obs'); ?></th>
			<th><?php echo $this->Paginator->sort('infoadic'); ?></th>
			<th><?php echo $this->Paginator->sort('status_estoque'); ?></th>
			<th><?php echo $this->Paginator->sort('status_financeiro'); ?></th>
			<th><?php echo $this->Paginator->sort('status_faturamento'); ?></th>
			<th><?php echo $this->Paginator->sort('status_geral'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($saidas as $saida): ?>
	<tr>
		<td><?php echo h($saida['Saida']['id']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['tipo']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['numero_nota']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['codnota']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['tpemis']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['cdv']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($saida['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $saida['Parceirodenegocio']['id'])); ?>
		</td>
		<td><?php echo h($saida['Saida']['data']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['data_entrada']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['data_saida']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['vendedor_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($saida['Natop']['id'], array('controller' => 'natops', 'action' => 'view', $saida['Natop']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($saida['Pedidovenda']['id'], array('controller' => 'pedidovendas', 'action' => 'view', $saida['Pedidovenda']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($saida['Cuf']['id'], array('controller' => 'cufs', 'action' => 'view', $saida['Cuf']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($saida['Indpag']['id'], array('controller' => 'indpags', 'action' => 'view', $saida['Indpag']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($saida['Mod']['id'], array('controller' => 'mods', 'action' => 'view', $saida['Mod']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($saida['Serie']['id'], array('controller' => 'series', 'action' => 'view', $saida['Serie']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($saida['Tpnf']['id'], array('controller' => 'tpnfs', 'action' => 'view', $saida['Tpnf']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($saida['Cmunfg']['id'], array('controller' => 'cmunfgs', 'action' => 'view', $saida['Cmunfg']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($saida['Tpimp']['id'], array('controller' => 'tpimps', 'action' => 'view', $saida['Tpimp']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($saida['Cdv']['id'], array('controller' => 'cdvs', 'action' => 'view', $saida['Cdv']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($saida['Tpamb']['id'], array('controller' => 'tpambs', 'action' => 'view', $saida['Tpamb']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($saida['Finnfe']['id'], array('controller' => 'finnves', 'action' => 'view', $saida['Finnfe']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($saida['Procemi']['id'], array('controller' => 'procemis', 'action' => 'view', $saida['Procemi']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($saida['Verproc']['id'], array('controller' => 'verprocs', 'action' => 'view', $saida['Verproc']['id'])); ?>
		</td>
		<td><?php echo h($saida['Saida']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['valor_total_produtos']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['nota_fiscal']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['valor_total']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['vb_icms']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['valor_icms']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['vb_cst']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['valor_st']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['valor_frete']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['valor_seguro']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['valor_desconto']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['vii']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['valor_ipi']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['valor_pis']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['v_cofins']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['valor_outros']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($saida['Transp']['id'], array('controller' => 'transps', 'action' => 'view', $saida['Transp']['id'])); ?>
		</td>
		<td><?php echo h($saida['Saida']['modfrete']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['freteproprio']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($saida['Transportadore']['nome'], array('controller' => 'transportadores', 'action' => 'view', $saida['Transportadore']['id'])); ?>
		</td>
		<td><?php echo h($saida['Saida']['origem']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['chave_acesso']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['forma_de_entrada']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['parceiro']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['devolucao']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['obs']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['infoadic']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['status_estoque']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['status_financeiro']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['status_faturamento']); ?>&nbsp;</td>
		<td><?php echo h($saida['Saida']['status_geral']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $saida['Saida']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $saida['Saida']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $saida['Saida']['id']), null, __('Are you sure you want to delete # %s?', $saida['Saida']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Saida'), array('action' => 'add')); ?></li>
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
