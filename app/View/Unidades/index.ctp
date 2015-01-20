<?php
	
	$this->start('css');
		echo $this->Html->css('table');
	$this->end();	

?>

<header>

<?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

<h1 class="menuOption23">Cadastrar Produto</h1>

</header>


<section>
<header> Unidades Comerciais </header>
		
	<section>
		<section class="coluna-esquerda">
			<fieldset class="fieldSetUnidade">
				<legend>Adicionar Nova</legend>	
				<?php
					echo $this->Form->create('Unidade');
					echo $this->Form->input('nome',array('label'=>'Nome:','class'=>'tamanho-medio'));	
					echo $this->form->submit('botao-salvar.png',array('class'=>'salvarUnidade')); 
					echo $this->Form->end();
				?>	
			</fieldset>
		</section>	
	</section>
	
	<section>
		<table>
			<thead>
				<th>Id</th>
				<th>Nome</th>
				<th>Deletar</th>
				<th>Editar</th>
			</thead>

			<?php foreach ($unidades as $unidade): ?>
			<tr>
				<td><?php echo $unidade['Unidade']['id']; ?></td>
				<td>
				<?php echo $this->Html->link($unidade['Unidade']['nome'], array('action' => 'view', $unidade['Unidade']['id']));?>
				</td>
				<td>
				<?php echo $this->Html->link(
						   $this->Html->image('lixeira.png', array('alt' => 'Remover Unidade Comercial')),
															 array(
																'controller' => 'Unidades',
																'action' => 'delete', $unidade['Unidade']['id']),
															 array(
																'escape' => false,
																'confirm' => 'Deletar Está Unidade?'
															));
				?>
				</td>
				<td>
				<?php echo $this->Html->link(
						   $this->Html->image('botao-tabela-editar.png', array('alt' => 'Remover Unidade Comercial')),
															 array(
																'controller' => 'Unidades',
																'action' => 'edit', $unidade['Unidade']['id']),
															 array(
																'escape' => false,
																'confirm' => 'Editar Está Unidade?'
															));
					
				?>
				</td>
			</tr>
			<?php endforeach; ?>

		</table>
	</section>
</section>
