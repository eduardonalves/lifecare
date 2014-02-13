<?php 
	$this->start('css');
	echo $this->Html->css('table.css');
	?>
	<!--[if gte IE 9]>
	  <style type="text/css">
		.gradient {
		   filter: none;
		}
	  </style>
	<![endif]-->
	<?php
	$this->end();
?>
<section><header>alalala</header></section>
<section><header>alalalasadasdsa</header></section>
<div class="entradas index">
	<h2><?php echo __('Entradas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('data_entrada'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('origem'); ?></th>
			<th><?php echo $this->Paginator->sort('fornecedore_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nota_fiscal'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_total'); ?></th>
			<th><?php echo $this->Paginator->sort('tiposmovimentacao_id'); ?></th>


			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($entradas as $entrada): ?>
	<tr>
		<td><img class="semaforo-bomba" src=""></td>
		<td><?php echo h($entrada['Entrada']['data_entrada']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($entrada['User']['id'], array('controller' => 'users', 'action' => 'view', $entrada['User']['id'])); ?>
		</td>
		<td><?php echo h($entrada['Entrada']['origem']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($entrada['Fornecedore']['nome'], array('controller' => 'fornecedores', 'action' => 'view', $entrada['Fornecedore']['id'])); ?>
		</td>
		<td><?php echo h($entrada['Entrada']['nota_fiscal']); ?>&nbsp;</td>
		<td><?php echo h($entrada['Entrada']['valor_total']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($entrada['Tiposmovimentacao']['descricao'], array('controller' => 'tiposmovimentacaos', 'action' => 'view', $entrada['Tiposmovimentacao']['id'])); ?>
		</td>
		<td><?php //echo h($entrada['Entrada']['vb_icms']); ?>&nbsp;</td>
		<td><?php //echo h($entrada['Entrada']['valor_icms']); ?>&nbsp;</td>
		<td><?php //echo h($entrada['Entrada']['vb_cst']); ?>&nbsp;</td>
		<td><?php //echo h($entrada['Entrada']['valor_st']); ?>&nbsp;</td>
		<td><?php //echo h($entrada['Entrada']['valor_frete']); ?>&nbsp;</td>
		<td><?php //echo h($entrada['Entrada']['valor_seguro']); ?>&nbsp;</td>
		<td><?php //echo h($entrada['Entrada']['valor_desconto']); ?>&nbsp;</td>
		<td><?php //echo h($entrada['Entrada']['vii']); ?>&nbsp;</td>
		<td><?php //echo h($entrada['Entrada']['valor_ipi']); ?>&nbsp;</td>
		<td><?php //echo h($entrada['Entrada']['valor_pis']); ?>&nbsp;</td>
		<td><?php //echo h($entrada['Entrada']['v_confins']); ?>&nbsp;</td>
		<td><?php //echo h($entrada['Entrada']['valor_outros']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $entrada['Entrada']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $entrada['Entrada']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $entrada['Entrada']['id']), null, __('Are you sure you want to delete # %s?', $entrada['Entrada']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p class="table-counter">
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
		<li><?php echo $this->Html->link(__('New Entrada'), array('action' => 'add')); ?></li>
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
