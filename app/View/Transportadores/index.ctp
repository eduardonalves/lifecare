<?php

	$this->start('css');
		echo $this->Html->css('table');
		echo $this->Html->css('paginadores_estilo');
	$this->end();	

?>

<header>
	<img src="/lifecare/img/titulo-cadastrar.png" id="cadastrar-titulo" alt="Cadastrar" title="Cadastrar" />
	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption62">Transportadores</h1>  
</header>

<section>


<header>Dados para Consulta</header>
		
	<section>
		<section class="coluna-esquerda">
			<fieldset>
				<legend>Nome do Transportador:</legend>	
				<?php
					echo $this->Search->create();
				    echo $this->Search->input('transportadorNome', array('label' => array('text'=>'Nome', 'style'=>'text-align:left; width:35px;')));
				    echo $this->Form->submit('botao-filtrar.png',array('id'=>'quick-filtrar', 'class'=>'salvarUnidade'));
				    echo $this->Search->end();
			   ?>
			</fieldset>
		</section>

		<section class="coluna-direita" style="margin-left:30px; text-align:right;">
			
			<?php			
				echo $this->Html->image("botao-adicionar2.png", array(
					"alt" => "Adicionar Transportador",
					"title" => "Adicionar Transportador",
					'url' => array('controller' => 'transportadores', 'action' => 'add'),
					'style' => 'margin-top:20px;'
				));			
			?>
		</section>

	</section>

	<div class="areaTabela">	
		<?php echo $this->element('paginador_superior'); ?>
	
		<table>
			<thead>
				<th>Nome</th>
				<th>CNPJ</th>
				<th>Insc. Estadual</th>
				<th>Endereço</th>
				<th>Cidade</th>
				<th>UF</th>
				<th>Editar</th>
			</thead>

			<?php
			
			foreach ($transportadores as $transportadore):
			?>
				<tr>
					<td><?php echo $transportadore['Transportadore']['nome']; ?></td>
					<td><?php echo $transportadore['Transportadore']['cnpj']; ?></td>
					<td><?php echo $transportadore['Transportadore']['ie']; ?></td>
					<td><?php echo $transportadore['Transportadore']['endereco']; ?></td>
					<td><?php echo $transportadore['Transportadore']['cidade']; ?></td>
					<td><?php echo $transportadore['Transportadore']['uf']; ?></td>
					<td>
						<?php
						echo $this->Html->link($this->Html->image("botao-tabela-editar.png", array("title" => "Editar Transportador", "alt" => "Editar Transportador")), array('controller' => 'Transportadores', 'action' => 'edit', $transportadore['Transportadore']['id']), array('escape' => false));
						?>					
					</td>
				</tr>
			<?php			
			endforeach;			
			?>
		</table>
		
		<?php echo $this->element('paginador_inferior'); ?>
	</div>

</section>

<!--
<div class="transportadores index">
	<h2><?php echo __('Transportadores'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($transportadores as $transportadore): ?>
	<tr>
		<td><?php echo h($transportadore['Transportadore']['id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transportadore['Transportadore']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transportadore['Transportadore']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transportadore['Transportadore']['id']), null, __('Are you sure you want to delete # %s?', $transportadore['Transportadore']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Transportadore'), array('action' => 'add')); ?></li>
	</ul>
</div>
-->
