<?php
	$this->start('css');
		echo $this->Html->css('consulta_financeiro');
		echo $this->Html->css('table');
		echo $this->Html->css('jquery-ui/jquery-ui.css');
		echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	$this->end();

	$this->start('script');
		echo $this->Html->script('users.js');
	$this->end();

	$this->start('modais');
	$this->end();
?>

<header> <!---header--->

	<?php echo $this->Html->image('titulo-consultar.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar')); ?>

	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->	
	<h1 class="menuOption41">Consultar Usuários</h1>
</header> <!---Fim header--->

<div class="areaTabela">

	<?php echo $this->element('paginador_superior');?>

<div class="tabelas" id="users">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="actions colunaConta"><?php echo __('Actions'); ?></th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('id'); ?></th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('funcionario_id'); ?></th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('username'); ?></th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('password'); ?></th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('role_id'); ?></th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('acesso'); ?></th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('modified'); ?></th>
	</tr>
	
	<?php foreach ($users as $user): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Usuario','title'=>'Visualizar Usuário','url'=>array('controller' => 'users','action' => 'view', $user['User']['id']))); ?>
			<?php echo "<hr />"; ?>
			<?php echo $this->Html->image('botao-tabela-editar.png',array('alt'=>'Editar Usuario','title'=>'Editar Usuário','url'=>array('controller' => 'users','action' => 'edit', $user['User']['id']))); ?>
			<?php echo "<hr />"; ?>
			<?php echo $this->Form->postLink($this->Html->image('cancelar.png',array('id'=>'delete_user','alt' =>__('Delete'),'title' => 'Excluir Usuário')), array('controller' => 'users','action' => 'delete', $user['User']['id']),array('escape' => false, 'confirm' => __('Deseja realmente excluir o Usuário '.$user['User']['id'].'?'))); ?>
		</td>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['Funcionario']['id'], array('controller' => 'funcionarios', 'action' => 'view', $user['Funcionario']['id'])); ?>
		</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['Role']['id'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?>
		</td>
		<td><?php echo h($user['User']['acesso']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
	</tr>
	<?php endforeach; ?>
	</table>
	<?php echo $this->element('paginador_inferior');?>
	</div>
</div>
