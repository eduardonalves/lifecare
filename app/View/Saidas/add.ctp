<div class="saidas form">
<?php echo $this->Form->create('Saida'); ?>
	<fieldset>
		<legend><?php echo __('Add Saida'); ?></legend>
	<?php
		echo $this->Form->input('tipo');
		echo $this->Form->input('numero_nota');
		echo $this->Form->input('codnota');
		echo $this->Form->input('tpemis');
		echo $this->Form->input('cdv');
		echo $this->Form->input('parceirodenegocio_id');
		echo $this->Form->input('data');
		echo $this->Form->input('data_entrada');
		echo $this->Form->input('data_saida');
		echo $this->Form->input('user_id');
		echo $this->Form->input('vendedor_id');
		echo $this->Form->input('natop_id');
		echo $this->Form->input('comoperacao_id');
		echo $this->Form->input('cuf_id');
		echo $this->Form->input('indpag_id');
		echo $this->Form->input('mod_id');
		echo $this->Form->input('serie_id');
		echo $this->Form->input('tpnf_id');
		echo $this->Form->input('cmunfg_id');
		echo $this->Form->input('tpimp_id');
		echo $this->Form->input('cdv_id');
		echo $this->Form->input('tpamb_id');
		echo $this->Form->input('finnfe_id');
		echo $this->Form->input('procemi_id');
		echo $this->Form->input('verproc_id');
		echo $this->Form->input('descricao');
		echo $this->Form->input('valor_total_produtos');
		echo $this->Form->input('nota_fiscal');
		echo $this->Form->input('valor_total');
		echo $this->Form->input('vb_icms');
		echo $this->Form->input('valor_icms');
		echo $this->Form->input('vb_cst');
		echo $this->Form->input('valor_st');
		echo $this->Form->input('valor_frete');
		echo $this->Form->input('valor_seguro');
		echo $this->Form->input('valor_desconto');
		echo $this->Form->input('vii');
		echo $this->Form->input('valor_ipi');
		echo $this->Form->input('valor_pis');
		echo $this->Form->input('v_cofins');
		echo $this->Form->input('valor_outros');
		echo $this->Form->input('transp_id');
		echo $this->Form->input('modfrete');
		echo $this->Form->input('freteproprio');
		echo $this->Form->input('transportadore_id');
		echo $this->Form->input('origem');
		echo $this->Form->input('chave_acesso');
		echo $this->Form->input('forma_de_entrada');
		echo $this->Form->input('parceiro');
		echo $this->Form->input('devolucao');
		echo $this->Form->input('obs');
		echo $this->Form->input('infoadic');
		echo $this->Form->input('status_estoque');
		echo $this->Form->input('status_financeiro');
		echo $this->Form->input('status_faturamento');
		echo $this->Form->input('status_geral');
		echo $this->Form->input('Produto');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Saidas'), array('action' => 'index')); ?></li>
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
