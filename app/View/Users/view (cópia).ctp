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
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Role']['id'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comoperacaos'), array('controller' => 'comoperacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comoperacao'), array('controller' => 'comoperacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Configcobrancas'), array('controller' => 'configcobrancas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configcobranca'), array('controller' => 'configcobrancas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Configcontas'), array('controller' => 'configcontas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configconta'), array('controller' => 'configcontas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Configlotes'), array('controller' => 'configlotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configlote'), array('controller' => 'configlotes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Confignotas'), array('controller' => 'confignotas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Confignota'), array('controller' => 'confignotas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Configparceiros'), array('controller' => 'configparceiros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configparceiro'), array('controller' => 'configparceiros', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Configparcelas'), array('controller' => 'configparcelas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configparcela'), array('controller' => 'configparcelas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Configprodutos'), array('controller' => 'configprodutos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configproduto'), array('controller' => 'configprodutos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Consultarprodutos'), array('controller' => 'consultarprodutos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Consultarproduto'), array('controller' => 'consultarprodutos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contas'), array('controller' => 'contas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta'), array('controller' => 'contas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dadoscreditos'), array('controller' => 'dadoscreditos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dadoscredito'), array('controller' => 'dadoscreditos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Negociacaos'), array('controller' => 'negociacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Negociacao'), array('controller' => 'negociacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notas'), array('controller' => 'notas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nota'), array('controller' => 'notas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Obs Cobrancas'), array('controller' => 'obs_cobrancas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obs Cobranca'), array('controller' => 'obs_cobrancas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parcelas'), array('controller' => 'parcelas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parcela'), array('controller' => 'parcelas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quicklinks'), array('controller' => 'quicklinks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quicklink'), array('controller' => 'quicklinks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Comoperacaos'); ?></h3>
	<?php if (!empty($user['Comoperacao'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Data Inici'); ?></th>
		<th><?php echo __('Data Fim'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Prazo Entrega'); ?></th>
		<th><?php echo __('Forma Pagamento'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Comoperacao'] as $comoperacao): ?>
		<tr>
			<td><?php echo $comoperacao['id']; ?></td>
			<td><?php echo $comoperacao['data_inici']; ?></td>
			<td><?php echo $comoperacao['data_fim']; ?></td>
			<td><?php echo $comoperacao['user_id']; ?></td>
			<td><?php echo $comoperacao['valor']; ?></td>
			<td><?php echo $comoperacao['prazo_entrega']; ?></td>
			<td><?php echo $comoperacao['forma_pagamento']; ?></td>
			<td><?php echo $comoperacao['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'comoperacaos', 'action' => 'view', $comoperacao['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'comoperacaos', 'action' => 'edit', $comoperacao['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comoperacaos', 'action' => 'delete', $comoperacao['id']), null, __('Are you sure you want to delete # %s?', $comoperacao['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comoperacao'), array('controller' => 'comoperacaos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Configcobrancas'); ?></h3>
	<?php if (!empty($user['Configcobranca'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Data Inicio'); ?></th>
		<th><?php echo __('Data Fim'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Configcobranca'] as $configcobranca): ?>
		<tr>
			<td><?php echo $configcobranca['id']; ?></td>
			<td><?php echo $configcobranca['user_id']; ?></td>
			<td><?php echo $configcobranca['data_inicio']; ?></td>
			<td><?php echo $configcobranca['data_fim']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'configcobrancas', 'action' => 'view', $configcobranca['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'configcobrancas', 'action' => 'edit', $configcobranca['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'configcobrancas', 'action' => 'delete', $configcobranca['id']), null, __('Are you sure you want to delete # %s?', $configcobranca['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Configcobranca'), array('controller' => 'configcobrancas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Configcontas'); ?></h3>
	<?php if (!empty($user['Configconta'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Identificacao'); ?></th>
		<th><?php echo __('Data Emissao'); ?></th>
		<th><?php echo __('Data Quitacao'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Parcelas'); ?></th>
		<th><?php echo __('Parceirodenegocio Id'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Nome Parceiro'); ?></th>
		<th><?php echo __('Cnpj Parceiro'); ?></th>
		<th><?php echo __('Status Parceiro'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Pagamento Forma'); ?></th>
		<th><?php echo __('Pagamento Tipo'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Centrocusto Id'); ?></th>
		<th><?php echo __('Tipodeconta Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Configconta'] as $configconta): ?>
		<tr>
			<td><?php echo $configconta['id']; ?></td>
			<td><?php echo $configconta['identificacao']; ?></td>
			<td><?php echo $configconta['data_emissao']; ?></td>
			<td><?php echo $configconta['data_quitacao']; ?></td>
			<td><?php echo $configconta['valor']; ?></td>
			<td><?php echo $configconta['parcelas']; ?></td>
			<td><?php echo $configconta['parceirodenegocio_id']; ?></td>
			<td><?php echo $configconta['descricao']; ?></td>
			<td><?php echo $configconta['nome_parceiro']; ?></td>
			<td><?php echo $configconta['cnpj_parceiro']; ?></td>
			<td><?php echo $configconta['status_parceiro']; ?></td>
			<td><?php echo $configconta['status']; ?></td>
			<td><?php echo $configconta['tipo']; ?></td>
			<td><?php echo $configconta['pagamento_forma']; ?></td>
			<td><?php echo $configconta['pagamento_tipo']; ?></td>
			<td><?php echo $configconta['user_id']; ?></td>
			<td><?php echo $configconta['centrocusto_id']; ?></td>
			<td><?php echo $configconta['tipodeconta_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'configcontas', 'action' => 'view', $configconta['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'configcontas', 'action' => 'edit', $configconta['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'configcontas', 'action' => 'delete', $configconta['id']), null, __('Are you sure you want to delete # %s?', $configconta['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Configconta'), array('controller' => 'configcontas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
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
		<th><?php echo __('Parceirodenegocio Id'); ?></th>
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
		<th><?php echo __('Obs'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Confignota'] as $confignota): ?>
		<tr>
			<td><?php echo $confignota['id']; ?></td>
			<td><?php echo $confignota['user_id']; ?></td>
			<td><?php echo $confignota['tipo']; ?></td>
			<td><?php echo $confignota['parceirodenegocio_id']; ?></td>
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
			<td><?php echo $confignota['obs']; ?></td>
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
	<h3><?php echo __('Related Configparceiros'); ?></h3>
	<?php if (!empty($user['Configparceiro'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Cnpj'); ?></th>
		<th><?php echo __('Endereco'); ?></th>
		<th><?php echo __('Telefone'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Configparceiro'] as $configparceiro): ?>
		<tr>
			<td><?php echo $configparceiro['id']; ?></td>
			<td><?php echo $configparceiro['nome']; ?></td>
			<td><?php echo $configparceiro['cnpj']; ?></td>
			<td><?php echo $configparceiro['endereco']; ?></td>
			<td><?php echo $configparceiro['telefone']; ?></td>
			<td><?php echo $configparceiro['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'configparceiros', 'action' => 'view', $configparceiro['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'configparceiros', 'action' => 'edit', $configparceiro['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'configparceiros', 'action' => 'delete', $configparceiro['id']), null, __('Are you sure you want to delete # %s?', $configparceiro['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Configparceiro'), array('controller' => 'configparceiros', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Configparcelas'); ?></h3>
	<?php if (!empty($user['Configparcela'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Parcela'); ?></th>
		<th><?php echo __('Identificacao Documento'); ?></th>
		<th><?php echo __('Data Vencimento'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Periodocritico'); ?></th>
		<th><?php echo __('Desconto'); ?></th>
		<th><?php echo __('Banco'); ?></th>
		<th><?php echo __('Agencia'); ?></th>
		<th><?php echo __('Conta'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Configparcela'] as $configparcela): ?>
		<tr>
			<td><?php echo $configparcela['id']; ?></td>
			<td><?php echo $configparcela['user_id']; ?></td>
			<td><?php echo $configparcela['parcela']; ?></td>
			<td><?php echo $configparcela['identificacao_documento']; ?></td>
			<td><?php echo $configparcela['data_vencimento']; ?></td>
			<td><?php echo $configparcela['valor']; ?></td>
			<td><?php echo $configparcela['periodocritico']; ?></td>
			<td><?php echo $configparcela['desconto']; ?></td>
			<td><?php echo $configparcela['banco']; ?></td>
			<td><?php echo $configparcela['agencia']; ?></td>
			<td><?php echo $configparcela['conta']; ?></td>
			<td><?php echo $configparcela['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'configparcelas', 'action' => 'view', $configparcela['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'configparcelas', 'action' => 'edit', $configparcela['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'configparcelas', 'action' => 'delete', $configparcela['id']), null, __('Are you sure you want to delete # %s?', $configparcela['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Configparcela'), array('controller' => 'configparcelas', 'action' => 'add')); ?> </li>
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
		<th><?php echo __('Categoria'); ?></th>
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
			<td><?php echo $configproduto['categoria']; ?></td>
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
	<h3><?php echo __('Related Consultarprodutos'); ?></h3>
	<?php if (!empty($user['Consultarproduto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Produto Id'); ?></th>
		<th><?php echo __('Lote Id'); ?></th>
		<th><?php echo __('Produtoiten Id'); ?></th>
		<th><?php echo __('Loteiten Id'); ?></th>
		<th><?php echo __('Nota Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Consultarproduto'] as $consultarproduto): ?>
		<tr>
			<td><?php echo $consultarproduto['id']; ?></td>
			<td><?php echo $consultarproduto['produto_id']; ?></td>
			<td><?php echo $consultarproduto['lote_id']; ?></td>
			<td><?php echo $consultarproduto['produtoiten_id']; ?></td>
			<td><?php echo $consultarproduto['loteiten_id']; ?></td>
			<td><?php echo $consultarproduto['nota_id']; ?></td>
			<td><?php echo $consultarproduto['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'consultarprodutos', 'action' => 'view', $consultarproduto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'consultarprodutos', 'action' => 'edit', $consultarproduto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'consultarprodutos', 'action' => 'delete', $consultarproduto['id']), null, __('Are you sure you want to delete # %s?', $consultarproduto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Consultarproduto'), array('controller' => 'consultarprodutos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Contas'); ?></h3>
	<?php if (!empty($user['Conta'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Identificacao'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Data Emissao'); ?></th>
		<th><?php echo __('Data Quitacao'); ?></th>
		<th><?php echo __('Imagem'); ?></th>
		<th><?php echo __('Parcelas Atraso'); ?></th>
		<th><?php echo __('Parcelas Aberto'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Canceladopor'); ?></th>
		<th><?php echo __('Data Cancelamento'); ?></th>
		<th><?php echo __('Parceirodenegocio Id'); ?></th>
		<th><?php echo __('Centrocusto Id'); ?></th>
		<th><?php echo __('Tipodeconta Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Conta'] as $conta): ?>
		<tr>
			<td><?php echo $conta['id']; ?></td>
			<td><?php echo $conta['user_id']; ?></td>
			<td><?php echo $conta['identificacao']; ?></td>
			<td><?php echo $conta['descricao']; ?></td>
			<td><?php echo $conta['valor']; ?></td>
			<td><?php echo $conta['data_emissao']; ?></td>
			<td><?php echo $conta['data_quitacao']; ?></td>
			<td><?php echo $conta['imagem']; ?></td>
			<td><?php echo $conta['parcelas_atraso']; ?></td>
			<td><?php echo $conta['parcelas_aberto']; ?></td>
			<td><?php echo $conta['tipo']; ?></td>
			<td><?php echo $conta['status']; ?></td>
			<td><?php echo $conta['canceladopor']; ?></td>
			<td><?php echo $conta['data_cancelamento']; ?></td>
			<td><?php echo $conta['parceirodenegocio_id']; ?></td>
			<td><?php echo $conta['centrocusto_id']; ?></td>
			<td><?php echo $conta['tipodeconta_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'contas', 'action' => 'view', $conta['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'contas', 'action' => 'edit', $conta['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'contas', 'action' => 'delete', $conta['id']), null, __('Are you sure you want to delete # %s?', $conta['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Conta'), array('controller' => 'contas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Dadoscreditos'); ?></h3>
	<?php if (!empty($user['Dadoscredito'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parceirodenegocio Id'); ?></th>
		<th><?php echo __('Limite'); ?></th>
		<th><?php echo __('Limite Usado'); ?></th>
		<th><?php echo __('Data Liberacao'); ?></th>
		<th><?php echo __('Validade Limite'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Bloqueado'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Dadoscredito'] as $dadoscredito): ?>
		<tr>
			<td><?php echo $dadoscredito['id']; ?></td>
			<td><?php echo $dadoscredito['parceirodenegocio_id']; ?></td>
			<td><?php echo $dadoscredito['limite']; ?></td>
			<td><?php echo $dadoscredito['limite_usado']; ?></td>
			<td><?php echo $dadoscredito['data_liberacao']; ?></td>
			<td><?php echo $dadoscredito['validade_limite']; ?></td>
			<td><?php echo $dadoscredito['status']; ?></td>
			<td><?php echo $dadoscredito['bloqueado']; ?></td>
			<td><?php echo $dadoscredito['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'dadoscreditos', 'action' => 'view', $dadoscredito['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'dadoscreditos', 'action' => 'edit', $dadoscredito['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'dadoscreditos', 'action' => 'delete', $dadoscredito['id']), null, __('Are you sure you want to delete # %s?', $dadoscredito['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Dadoscredito'), array('controller' => 'dadoscreditos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Negociacaos'); ?></h3>
	<?php if (!empty($user['Negociacao'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Conta Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Numero Parcela'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('Obs'); ?></th>
		<th><?php echo __('Tipo Pagamento'); ?></th>
		<th><?php echo __('Forma Pagamento'); ?></th>
		<th><?php echo __('Parceirodenegocio Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Negociacao'] as $negociacao): ?>
		<tr>
			<td><?php echo $negociacao['id']; ?></td>
			<td><?php echo $negociacao['conta_id']; ?></td>
			<td><?php echo $negociacao['user_id']; ?></td>
			<td><?php echo $negociacao['valor']; ?></td>
			<td><?php echo $negociacao['numero_parcela']; ?></td>
			<td><?php echo $negociacao['data']; ?></td>
			<td><?php echo $negociacao['obs']; ?></td>
			<td><?php echo $negociacao['tipo_pagamento']; ?></td>
			<td><?php echo $negociacao['forma_pagamento']; ?></td>
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
		<th><?php echo __('Valor Total Produtos'); ?></th>
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
		<th><?php echo __('Transp Id'); ?></th>
		<th><?php echo __('Origem'); ?></th>
		<th><?php echo __('Chave Acesso'); ?></th>
		<th><?php echo __('Forma De Entrada'); ?></th>
		<th><?php echo __('Parceiro'); ?></th>
		<th><?php echo __('Devolucao'); ?></th>
		<th><?php echo __('Obs'); ?></th>
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
			<td><?php echo $nota['valor_total_produtos']; ?></td>
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
			<td><?php echo $nota['transp_id']; ?></td>
			<td><?php echo $nota['origem']; ?></td>
			<td><?php echo $nota['chave_acesso']; ?></td>
			<td><?php echo $nota['forma_de_entrada']; ?></td>
			<td><?php echo $nota['parceiro']; ?></td>
			<td><?php echo $nota['devolucao']; ?></td>
			<td><?php echo $nota['obs']; ?></td>
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
<div class="related">
	<h3><?php echo __('Related Obs Cobrancas'); ?></h3>
	<?php if (!empty($user['ObsCobranca'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Conta Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('Obs'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['ObsCobranca'] as $obsCobranca): ?>
		<tr>
			<td><?php echo $obsCobranca['id']; ?></td>
			<td><?php echo $obsCobranca['conta_id']; ?></td>
			<td><?php echo $obsCobranca['user_id']; ?></td>
			<td><?php echo $obsCobranca['data']; ?></td>
			<td><?php echo $obsCobranca['obs']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'obs_cobrancas', 'action' => 'view', $obsCobranca['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'obs_cobrancas', 'action' => 'edit', $obsCobranca['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'obs_cobrancas', 'action' => 'delete', $obsCobranca['id']), null, __('Are you sure you want to delete # %s?', $obsCobranca['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Obs Cobranca'), array('controller' => 'obs_cobrancas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Parcelas'); ?></h3>
	<?php if (!empty($user['Parcela'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Identificacao Documento'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Data Vencimento'); ?></th>
		<th><?php echo __('Data Pagamento'); ?></th>
		<th><?php echo __('Periodocritico'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Desconto'); ?></th>
		<th><?php echo __('Juros'); ?></th>
		<th><?php echo __('Codigodebarras'); ?></th>
		<th><?php echo __('Duplicatas'); ?></th>
		<th><?php echo __('Parcela'); ?></th>
		<th><?php echo __('Banco'); ?></th>
		<th><?php echo __('Agencia'); ?></th>
		<th><?php echo __('Conta'); ?></th>
		<th><?php echo __('Obs'); ?></th>
		<th><?php echo __('Comprovante'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Negociacao Id'); ?></th>
		<th><?php echo __('Parceirodenegocio Id'); ?></th>
		<th><?php echo __('Pagamento Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Parcela'] as $parcela): ?>
		<tr>
			<td><?php echo $parcela['id']; ?></td>
			<td><?php echo $parcela['identificacao_documento']; ?></td>
			<td><?php echo $parcela['descricao']; ?></td>
			<td><?php echo $parcela['data_vencimento']; ?></td>
			<td><?php echo $parcela['data_pagamento']; ?></td>
			<td><?php echo $parcela['periodocritico']; ?></td>
			<td><?php echo $parcela['valor']; ?></td>
			<td><?php echo $parcela['desconto']; ?></td>
			<td><?php echo $parcela['juros']; ?></td>
			<td><?php echo $parcela['codigodebarras']; ?></td>
			<td><?php echo $parcela['duplicatas']; ?></td>
			<td><?php echo $parcela['parcela']; ?></td>
			<td><?php echo $parcela['banco']; ?></td>
			<td><?php echo $parcela['agencia']; ?></td>
			<td><?php echo $parcela['conta']; ?></td>
			<td><?php echo $parcela['obs']; ?></td>
			<td><?php echo $parcela['comprovante']; ?></td>
			<td><?php echo $parcela['status']; ?></td>
			<td><?php echo $parcela['user_id']; ?></td>
			<td><?php echo $parcela['negociacao_id']; ?></td>
			<td><?php echo $parcela['parceirodenegocio_id']; ?></td>
			<td><?php echo $parcela['pagamento_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'parcelas', 'action' => 'view', $parcela['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'parcelas', 'action' => 'edit', $parcela['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'parcelas', 'action' => 'delete', $parcela['id']), null, __('Are you sure you want to delete # %s?', $parcela['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Parcela'), array('controller' => 'parcelas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Quicklinks'); ?></h3>
	<?php if (!empty($user['Quicklink'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Quicklink'] as $quicklink): ?>
		<tr>
			<td><?php echo $quicklink['id']; ?></td>
			<td><?php echo $quicklink['user_id']; ?></td>
			<td><?php echo $quicklink['nome']; ?></td>
			<td><?php echo $quicklink['url']; ?></td>
			<td><?php echo $quicklink['tipo']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'quicklinks', 'action' => 'view', $quicklink['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'quicklinks', 'action' => 'edit', $quicklink['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'quicklinks', 'action' => 'delete', $quicklink['id']), null, __('Are you sure you want to delete # %s?', $quicklink['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Quicklink'), array('controller' => 'quicklinks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
