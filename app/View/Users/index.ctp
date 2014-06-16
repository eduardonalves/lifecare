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
	
	function formatDateTimeToView(&$data){
		$dataAux = explode('-', $data);
		if(isset($dataAux[2])){
			if(isset($dataAux[1])){
				if(isset($dataAux[0])){
					$dataAux[2] = explode(' ', $dataAux[2]);
					$data = $dataAux[2][0]."/".$dataAux[1]."/".$dataAux[0]." ".$dataAux[2][1];
				}
			}
		}
		return $data;
	}
?>

<header> <!---header--->

	<?php echo $this->Html->image('titulo-consultar.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar')); ?>

	<h1 class="menuOption51">Consultar Usuários</h1>
</header> <!---Fim header--->

<section> <!---section superior--->
	<header>Consulta por Nome/Tipo de Usuário</header>

	<fieldset class="filtros">
		<section class = "coluna-esquerda">
		<?php echo $this->Search->create(); ?>
		
		<div class="">
		<?php
			echo $this->Search->input('nome',array('required'=>'false','type'=>'text','label'=>'Nome:','id'=>'filtro-nome', 'class' => 'tamanho-medio'));
		?>
		</div>
		
		</section>
		
		<section class="coluna-central" style="margin-left:-70px;">
		
		<div class="">
		<?php
			echo $this->Search->input('role',array('required'=>'false','type'=>'select','label'=>'Tipo de Usuário:','id'=>'filtro-role','class' => 'tamanho-medio'));
		?>
		</div>
		
		<?php
			echo $this->Form->submit('botao-filtrar.png',array('id'=>'quick-filtrar-users', 'style' => 'margin-left:50px;margin-top:-20px;'));
		?>
		</section>
		
		<section class="coluna-direita">
		</section>
		
		<?php echo $this->Form->end(); ?>
		
	</fieldset>
	</header>
</section>
<div class="areaTabela">

	<?php echo $this->element('paginador_superior');?>

<div class="tabelas" id="users">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="actions colunaConta">Ações</th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('id'); ?></th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('username', 'Login'); ?></th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('role_id', 'Tipo de Usuário'); ?></th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('acesso', 'Acesso'); ?></th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('created', 'Data/Hora Criação'); ?></th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('modified', 'Última Modificação'); ?></th>
	</tr>
	
	<?php foreach ($users as $user): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Usuario','title'=>'Visualizar Usuário','url'=>array('controller' => 'users','action' => 'view', $user['User']['id']))); 
				echo "<hr />";
				echo $this->Html->image('botao-tabela-editar.png',array('alt'=>'Editar Usuario','class'=>'img-lista','title'=>'Editar Usuário','url'=>array('controller' => 'users','action' => 'edit', $user['User']['id']))); 
				echo "<hr />"; 
				echo $this->Form->postLink($this->Html->image('cancelar.png',array('id'=>'delete_user','class'=>'img-excluir','alt' =>__('Delete'),'title' => 'Excluir Usuário')), array('controller' => 'users','action' => 'delete', $user['User']['id']),array('escape' => false, 'confirm' => __('Deseja realmente excluir o Usuário '.$user['User']['id'].'?'))); 
			?>
		</td>
		<td><?php echo h($user['User']['id']); ?></td>
		<td><?php echo h($user['User']['username']); ?></td>
		<td><?php echo h($listaRoles[$user['User']['role_id']]); ?></td>
		<td><?php echo h($user['User']['acesso']); ?></td>
		<td>
			<?php
				formatDateTimeToView($user['User']['created']);
				echo $user['User']['created']; 
			?>
		</td>
		<td>
			<?php
				formatDateTimeToView($user['User']['modified']);
				echo $user['User']['modified']; 
			?>
		</td>				
	</tr>
	<?php endforeach; ?>
	</table>
	<?php echo $this->element('paginador_inferior');?>
	</div>
</div>
