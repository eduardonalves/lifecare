<?php
	
	$this->start('css');
		echo $this->Html->css('table');
	$this->end();	

?>

<header>

<?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

<h1 class="menuOption23">Gerenciar Unidades Comerciais</h1>

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
						echo $this->Form->input('abriviacao',array('label'=>'Abreviação:','class'=>'tamanho-pequeno'));	
						echo $this->form->submit('botao-salvar.png',array('class'=>'salvarUnidade')); 
					echo $this->Form->end();
				?>	
			</fieldset>
		</section>	
	</section>
	
	<section>
		<table>
			<thead>
				<th>Nome</th>
				<th>Abreviação</th>
				<th>Deletar</th>
				<th>Editar</th>
			</thead>

			<?php foreach ($unidades as $unidade): ?>
			<tr>
				<td>
					<?php echo $unidade['Unidade']['nome'];?>
				</td>
				<td>
					<?php echo $unidade['Unidade']['abriviacao'];?>
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
