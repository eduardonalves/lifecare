<div class="parceirodenegocios view">
<h2><?php echo __('Parceirodenegocio'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($parceirodenegocio['Parceirodenegocio']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($parceirodenegocio['Parceirodenegocio']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cpf Cnpj'); ?></dt>
		<dd>
			<?php echo h($parceirodenegocio['Parceirodenegocio']['cpf_cnpj']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($parceirodenegocio['Parceirodenegocio']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria'); ?></dt>
		<dd>
			<?php echo h($parceirodenegocio['Parceirodenegocio']['categoria']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($parceirodenegocio['Parceirodenegocio']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($parceirodenegocio['Parceirodenegocio']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Parceirodenegocio'), array('action' => 'edit', $parceirodenegocio['Parceirodenegocio']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Parceirodenegocio'), array('action' => 'delete', $parceirodenegocio['Parceirodenegocio']['id']), null, __('Are you sure you want to delete # %s?', $parceirodenegocio['Parceirodenegocio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contatos'), array('controller' => 'contatos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contato'), array('controller' => 'contatos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enderecos'), array('controller' => 'enderecos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Endereco'), array('controller' => 'enderecos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas'), array('controller' => 'entradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entrada'), array('controller' => 'entradas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notas'), array('controller' => 'notas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nota'), array('controller' => 'notas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Saidas'), array('controller' => 'saidas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Saida'), array('controller' => 'saidas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Contatos'); ?></h3>
	<?php if (!empty($parceirodenegocio['Contato'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parceirodenegocio Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Telefone1'); ?></th>
		<th><?php echo __('Telefone2'); ?></th>
		<th><?php echo __('Telfefone3'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('RedesSociais1'); ?></th>
		<th><?php echo __('RedesSociais2'); ?></th>
		<th><?php echo __('RedesSociais3'); ?></th>
		<th><?php echo __('RedesSociais4'); ?></th>
		<th><?php echo __('RedesSociais5'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($parceirodenegocio['Contato'] as $contato): ?>
		<tr>
			<td><?php echo $contato['id']; ?></td>
			<td><?php echo $contato['parceirodenegocio_id']; ?></td>
			<td><?php echo $contato['nome']; ?></td>
			<td><?php echo $contato['telefone1']; ?></td>
			<td><?php echo $contato['telefone2']; ?></td>
			<td><?php echo $contato['telfefone3']; ?></td>
			<td><?php echo $contato['email']; ?></td>
			<td><?php echo $contato['redesSociais1']; ?></td>
			<td><?php echo $contato['redesSociais2']; ?></td>
			<td><?php echo $contato['redesSociais3']; ?></td>
			<td><?php echo $contato['redesSociais4']; ?></td>
			<td><?php echo $contato['redesSociais5']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'contatos', 'action' => 'view', $contato['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'contatos', 'action' => 'edit', $contato['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'contatos', 'action' => 'delete', $contato['id']), null, __('Are you sure you want to delete # %s?', $contato['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Contato'), array('controller' => 'contatos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Enderecos'); ?></h3>
	<?php if (!empty($parceirodenegocio['Endereco'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parceirodenegocio Id'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Logradouro'); ?></th>
		<th><?php echo __('Complemento'); ?></th>
		<th><?php echo __('Bairro'); ?></th>
		<th><?php echo __('Cidade'); ?></th>
		<th><?php echo __('Uf'); ?></th>
		<th><?php echo __('Longitude'); ?></th>
		<th><?php echo __('Altitude'); ?></th>
		<th><?php echo __('Ponto Referencia'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($parceirodenegocio['Endereco'] as $endereco): ?>
		<tr>
			<td><?php echo $endereco['id']; ?></td>
			<td><?php echo $endereco['parceirodenegocio_id']; ?></td>
			<td><?php echo $endereco['tipo']; ?></td>
			<td><?php echo $endereco['logradouro']; ?></td>
			<td><?php echo $endereco['complemento']; ?></td>
			<td><?php echo $endereco['bairro']; ?></td>
			<td><?php echo $endereco['cidade']; ?></td>
			<td><?php echo $endereco['uf']; ?></td>
			<td><?php echo $endereco['longitude']; ?></td>
			<td><?php echo $endereco['altitude']; ?></td>
			<td><?php echo $endereco['ponto_referencia']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'enderecos', 'action' => 'view', $endereco['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'enderecos', 'action' => 'edit', $endereco['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'enderecos', 'action' => 'delete', $endereco['id']), null, __('Are you sure you want to delete # %s?', $endereco['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Endereco'), array('controller' => 'enderecos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Entradas'); ?></h3>
	<?php if (!empty($parceirodenegocio['Entrada'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parceirodenegocio Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($parceirodenegocio['Entrada'] as $entrada): ?>
		<tr>
			<td><?php echo $entrada['id']; ?></td>
			<td><?php echo $entrada['parceirodenegocio_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'entradas', 'action' => 'view', $entrada['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'entradas', 'action' => 'edit', $entrada['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'entradas', 'action' => 'delete', $entrada['id']), null, __('Are you sure you want to delete # %s?', $entrada['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Entrada'), array('controller' => 'entradas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Notas'); ?></h3>
	<?php if (!empty($parceirodenegocio['Nota'])): ?>
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
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($parceirodenegocio['Nota'] as $nota): ?>
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
	<h3><?php echo __('Related Saidas'); ?></h3>
	<?php if (!empty($parceirodenegocio['Saida'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Parceirodenegocio Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($parceirodenegocio['Saida'] as $saida): ?>
		<tr>
			<td><?php echo $saida['id']; ?></td>
			<td><?php echo $saida['cliente_id']; ?></td>
			<td><?php echo $saida['parceirodenegocio_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'saidas', 'action' => 'view', $saida['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'saidas', 'action' => 'edit', $saida['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'saidas', 'action' => 'delete', $saida['id']), null, __('Are you sure you want to delete # %s?', $saida['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Saida'), array('controller' => 'saidas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
