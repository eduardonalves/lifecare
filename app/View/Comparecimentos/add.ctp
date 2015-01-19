<?php
	$this->start('css');
		echo $this->Html->css('table');
	$this->end();
?>

<header>
	<?php
		echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); 
	?>
<h1 class="menuOption52"></h1>

</header>


<section>
<header> Confirmar Presença </header>
	
	<section>
		<table>
			<thead>
				<th>Nome</th>
				<th>Presente</th>
				<th>Faltoso</th>
				<th>Atestado</th>
				<th>Ações</th>
			</thead>
			
			<tbody>
				<?php
					foreach($funcionarios as $funcionario){
				?>
					<tr>
						<?php
							echo $this->Form->input('funcionario_id',array('type'=>'hidden'));
							echo $this->Form->input('date',array('type'=>'hidden'));
							echo $this->Form->input('status',array('type'=>'hidden'));

						?>
					</tr>
				<?php	
					}
				?>				
			</tbody>
		
		</table>
		
	</section>
	<?php 
		
	
		echo $this->Form->create('Comparecimento'); 
		
			echo $this->Form->input('funcionario_id');
			echo $this->Form->input('date');
			echo $this->Form->input('status');
			
		echo $this->Form->end(__('Submit')); 
		
	?>
</section>

<pre>
<?php
	print_r($funcionarios);
?>
</pre>
