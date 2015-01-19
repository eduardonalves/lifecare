<?php
	$this->start('css');
		echo $this->Html->css('table');
		echo $this->Html->css('comparecimento');
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
	<?php echo $this->Form->create('Comparecimento');  ?>
	<section>
		<table>
			<thead>
				<th>Nome</th>
				<th class="th-status">Presente</th>
				<th class="th-status">Faltoso</th>
				<th class="th-status">Atestado</th>
				<th class="th-status">Ações</th>
			</thead>
			
			<tbody>
				<?php
					$hoje = date('Y-m-d');
					$i = 0;
					foreach($funcionarios as $funcionario){
				?>
					<tr>
						<td><?php 
								echo $funcionario['Funcionario']['nome']; 
								echo $this->Form->input('Funcionario.'.$i.'.funcionario_id',array('type'=>'hidden','value'=>$funcionario['Funcionario']['id']));
								echo $this->Form->input('Funcionario.'.$i.'.date',array('type'=>'hidden','value'=>$hoje));
							?></td>
						<?php
							echo $this->Form->input('Funcionario.'.$i.'.status',array(																		
																				'label'=>false,
																				'fieldset'=>false,
																				'legend'=>false,
																				'div'=>false,
																				'type'=>'radio',	
																				'before'=>'<td class="td-status">',
																				'after'=>'</td>',
																				'between'=> '',
																				'separator'=>'</td><td class="td-status">',
																				'options'=>array('presente'=>'','faltoso'=>'','atestado'=>'')
																				));		
							

						?>
						<td></td>
					</tr>
				<?php	
						$i++;
					}
				?>				
			</tbody>
		
		</table>
		
	</section>
	
</section>
<footer>
		<?php
	    echo $this->Form->submit('botao-salvar.png',array('class'=>'bt-salvarConta','alt'=>'Salvar','title'=>'Salvar','id'=>'btn-salvarContaReceber'));
		echo $this->Form->end();
	?>
</footer>
